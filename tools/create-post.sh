#!/usr/bin/env bash
#
# create-post.sh — Create a WordPress post through the REST API.
#
# Usage:
#   ./tools/create-post.sh "<title>" "<content>" [status]
#
#   title    required — the post title
#   content  required — the post body
#   status   optional — publish (default) | draft | pending | private | future
#
# The site URL and username are defined below; the application password is
# read from LOCAL_API_PASSWORD in the .env file at the site root so no secret
# is ever stored in this script.

set -uo pipefail

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
ENV_FILE="$SCRIPT_DIR/../.env"

# --- Configuration ----------------------------------------------------------
SITE_URL="http://admin.local"
USERNAME="admin"
PASSWORD=""                      # filled in from .env below

# --- Read values out of .env -------------------------------------------------
if [ ! -f "$ENV_FILE" ]; then
  echo "Error: .env file not found at $ENV_FILE" >&2
  exit 1
fi

# Print the value of KEY from .env, with surrounding quotes stripped.
read_env() {
  local key="$1" line value
  line=$(grep -m1 "^[[:space:]]*${key}=" "$ENV_FILE" || true)
  value="${line#*=}"
  value="${value%\"}"; value="${value#\"}"
  value="${value%\'}"; value="${value#\'}"
  value="${value%$'\r'}"
  printf '%s' "$value"
}

PASSWORD=$(read_env LOCAL_API_PASSWORD)
env_user=$(read_env LOCAL_API_USER)
env_url=$(read_env WP_SITE_URL)
[ -n "$env_user" ] && USERNAME="$env_user"
[ -n "$env_url" ]  && SITE_URL="$env_url"

if [ -z "$PASSWORD" ]; then
  echo "Error: LOCAL_API_PASSWORD is not set in $ENV_FILE" >&2
  exit 1
fi

# --- Arguments ---------------------------------------------------------------
if [ "$#" -lt 2 ]; then
  echo "Usage: $0 \"<title>\" \"<content>\" [status]" >&2
  echo "  status defaults to 'publish'" >&2
  exit 1
fi

TITLE="$1"
CONTENT="$2"
STATUS="${3:-publish}"

# --- Build the JSON payload --------------------------------------------------
# Escape a string for use as a JSON value (pure bash, no jq/python needed).
json_escape() {
  local s="$1"
  s="${s//\/\\}"         # backslashes first
  s="${s//\"/\\\"}"         # double quotes
  s="${s//$'\r'/}"          # drop CR
  s="${s//$'\t'/\t}"       # tabs
  s="${s//$'\n'/\n}"       # newlines
  printf '"%s"' "$s"
}

PAYLOAD="{\"title\":$(json_escape "$TITLE"),\"content\":$(json_escape "$CONTENT"),\"status\":$(json_escape "$STATUS")}"

# --- Send the request --------------------------------------------------------
ENDPOINT="${SITE_URL%/}/wp-json/wp/v2/posts"
echo "POST $ENDPOINT  (status: $STATUS)"

RESPONSE=$(curl -sS -w $'\n%{http_code}' -X POST "$ENDPOINT" \
  -u "$USERNAME:$PASSWORD" \
  -H "Content-Type: application/json" \
  -d "$PAYLOAD")

HTTP_CODE=$(printf '%s' "$RESPONSE" | tail -n 1)
BODY=$(printf '%s' "$RESPONSE" | sed '$d')

if [ "$HTTP_CODE" = "201" ]; then
  POST_ID=$(printf '%s' "$BODY" | sed -n 's/.*"id":\([0-9]*\).*/\1/p' | head -n 1)
  POST_LINK=$(printf '%s' "$BODY" | sed -n 's/.*"link":"\([^"]*\)".*/\1/p' | head -n 1)
  echo "Created post ID ${POST_ID}"
  echo "Link: $(printf '%s' "$POST_LINK" | sed 's|\\/|/|g')"
else
  echo "Request failed (HTTP $HTTP_CODE)" >&2
  echo "$BODY" >&2
  exit 1
fi
