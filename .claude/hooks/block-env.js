#!/usr/bin/env node
// PreToolUse guard: refuse any tool call that references a .env file.
// Exit code 2 blocks the call and feeds stderr back to Claude.

const ENV_FILE = /(^|[\s\\/"'`=:;|&<>()*])\.env(\.(?!example\b|sample\b|template\b|dist\b)[\w.-]+)?(?![\w.-])/i;

let raw = '';
process.stdin.on('data', (chunk) => (raw += chunk));
process.stdin.on('end', () => {
  let payload;
  try {
    payload = JSON.parse(raw);
  } catch {
    process.exit(0);
  }

  const input = payload.tool_input || {};

  // Shell tools: inspect the command. File tools: inspect only path-like fields,
  // so editing a doc that merely mentions ".env" in its content stays allowed.
  const candidates = ['Bash', 'PowerShell'].includes(payload.tool_name)
    ? [input.command]
    : [
        input.file_path,
        input.notebook_path,
        input.path,
        input.glob,
        payload.tool_name === 'Glob' ? input.pattern : undefined,
      ];

  const hit = candidates.find((value) => typeof value === 'string' && ENV_FILE.test(value));

  if (hit) {
    process.stderr.write(
      `Blocked: ${payload.tool_name} call references a .env file, which holds credentials and is off-limits.\n` +
        'Ask the user to make any .env change themselves.\n'
    );
    process.exit(2);
  }

  process.exit(0);
});
