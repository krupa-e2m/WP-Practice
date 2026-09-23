# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Repository overview

A WordPress site root running under Local (by Flywheel), served at `http://admin.local`. The DB is `local` on `localhost` (`root`/`root`). `WP_DEBUG_LOG` is on, so PHP errors go to `wp-content/debug.log`. A `mysqli_real_connect ... refused` entry there just means the Local site wasn't running.

 The custom code:

- `wp-content/themes/pixesaas/pixesaas/`: **PixeSaaS**, the main custom theme (Figma-to-ACF landing page build). The theme directory is nested one level (`pixesaas/pixesaas`), and `pixesaas.zip` beside it is a packaged copy.
- `wp-content/themes/practice-theme/`: an earlier `_s`-based training theme with a `project` CPT.
- `wp-content/plugins/module7/register-custom-route.php`: REST route `GET /wp-json/e2m/v1/projects/count` (needs `edit_posts`). It depends on a theme registering the `project` CPT and returns 404 if none does.
- `wp-content/plugins/krupat-module3/`: hook-experiment training plugin (content filter, footer output, a `Books` CPT). Treat it as scratch code.
- `tools/`: CLI scripts for the REST API (see below).
- Third-party and unmodified: `advanced-custom-fields(-pro)`, `elementor`, `fakerpress`, `query-monitor`, and the `twentytwenty*` themes.

## Coding rules

These apply to all custom theme and plugin code.

- **Prefix every global function with `e2m_<theme_slug>_`** so it can't clash with plugins or other themes. Use the theme's lowercase slug in snake_case, e.g. `e2m_practice_render_hero()` for the Practice theme. Use the same prefix for hooks, constants and global variables (constants in uppercase: `E2M_PRACTICE_`). Existing `pixesaas_*` / `_s` functions are legacy. Don't rename them unless asked, but give all new functions the new prefix.
- **Keep ACF field groups in local JSON.** Every field group must lives in `<active-theme>/acf-json/` . If `acf-json/` doesn't exist, create it, and register it as ACF's save/load path. Don't define field groups in PHP or leave them only in the database.
- **Each ACF layout gets its own template part and stylesheet:** `template-parts/sections/<layout-slug>.php` for the markup and `sass/sections/_<layout-slug>.scss` for the styles, `@import`ed in `sass/style.scss`. Don't put layout markup or styles inline or in shared files.
- **Never modify WordPress core:** `wp-admin/`, `wp-includes/` and the root `wp-*.php` files. Use hooks, filters, the theme or a plugin instead.


## PixeSaaS theme architecture

Pages are built entirely from one ACF Flexible Content field named **`sections`**, rendered by the page template `page-templates/page-sections.php` ("Page sections (Flexible)").

- `inc/sections.php`: `pixesaas_render_sections()` loops the rows and maps each layout name to a template part by turning underscores into hyphens (`hero_showcase` → `template-parts/sections/hero-showcase.php`). It also holds the shared helpers that template parts must use: `pixesaas_sub()` (`get_sub_field` with a default), `pixesaas_image()`/`pixesaas_get_image()` (accept an ID, an ACF array or a URL), `pixesaas_button()`, `pixesaas_link()`, `pixesaas_section_atts()`, `pixesaas_section_head()` and `pixesaas_option()` (options page). Missing ACF, empty sections and missing template parts all show a notice to logged-in editors only.
- **Adding or changing a layout needs three parts that stay in sync:** the layout in `acf-json/group_pixesaas_page_sections.json`, `template-parts/sections/<slug>.php`, and `sass/sections/_<slug>.scss`. The new partial must also be `@import`ed in `sass/style.scss`.
- `inc/acf-setup.php` sets `acf-json/` as ACF's local-JSON save and load point, so field edits made in wp-admin are written back to those JSON files. It also registers the header/branding/footer options page and allows sanitised SVG uploads.
- `inc/cpt-project.php` registers the `project` CPT and taxonomy and flushes rewrites once per `_S_VERSION` change. Bump `_S_VERSION` in `functions.php` to force a re-flush and to cache-bust assets.
- `js/sections.js` handles the mobile menu toggle and the pricing monthly/annual switch.
- Template-part conventions: prefix local variables with `$ps_`, guard every optional field on its own, `return` early when a layout has no content, and escape at the point of output. CSS classes use the BEM-style `ps-<block>__<element>` / `ps-<block>--<modifier>` pattern. Add a `--no-media` modifier when an optional image column is empty.
- `CONTENT-GUIDE.md` documents every layout and field for editors. `ROBUSTNESS.md` records the layout stress tests (long headings, empty fields, badly proportioned images at 320–1440px) and the fixes they led to. Keep new layouts to the same standard.
- `_s` scaffolding is still in place: `_S_VERSION`, `bundle` writes `../_s.zip`, and `make-pot` writes `languages/_s.pot` even though the text domain is `pixesaas`. `404 copy.php` is a stray file.

## Practice-theme architecture

- `inc/cpt-project.php` registers `project` and `project_type` with REST enabled.
- Its ACF Flexible Content field is **`page_sections`** (layouts `hero`, `text_block`, `stats_section`), loaded from `acf-json/`. `inc/acf-fields.php` defines the same fields in PHP, but its `require` is commented out in `functions.php`, so the JSON is what's live.
- `single-project.php` renders layouts with `get_template_part( 'template-parts/sections/' . $layout )`. `archive-projects.php` hard-codes a `tax_query` on the `web-design` term.
- `inc/project-generator.php` runs on `admin_init` and creates a demo project with `update_field()` if one doesn't already exist.

## Commands

WP-CLI isn't on the PATH in a plain shell. Run `wp` and the `tools/` scripts from Local's **"Open site shell"**, which sets up PHP, MySQL and WP-CLI.

Theme build and lint commands are the same in both themes. Run them from the theme directory, since the site root has no `package.json`:

```sh
composer install && npm install   # one-time
npm run watch          # sass/ -> style.css on change
npm run compile:css    # one-off Sass compile
npm run compile:rtl    # style.css -> style-rtl.css
npm run lint:scss      # stylelint (@wordpress config)
npm run lint:js        # eslint on js/*.js
composer lint:php      # php-parallel-lint syntax check
composer lint:wpcs     # PHPCS, WordPress standards (phpcs.xml.dist)
composer make-pot
npm run bundle         # distributable zip
```

`style.css` is compiled output, so edit `sass/` instead. Neither theme has an automated test suite. You verify changes by linting and by checking pages in the browser at `http://admin.local`.

### tools/ (REST API scripts)

Credentials live in the gitignored site-root `.env`. `WP_SITE_URL`, `LOCAL_API_USER` and `LOCAL_API_PASSWORD` are what `create-post` reads.

```sh
php tools/generate-app-password.php [--user=admin|all] [--name="Local_API"] [--force] [--print-only] [--env-prefix=...]
php tools/create-post.php "<title>" "<content>" [publish|draft|pending|private|future]
./tools/create-post.sh   "<title>" "<content>" [status]
```

- `generate-app-password.php` loads WordPress in-process through `wp-load.php` because the REST API can't create a user's *first* application password. It writes `<USER>_<NAME>_USER` / `_PASSWORD` keys to `.env`.
- `create-post.*` deliberately does **not** load WordPress. It calls `/wp/v2/posts` over HTTP with Basic auth, the way an external client would. `create-post.php` can also be `require`d for `wp_create_post_via_rest()`.
- `tools/payloads/project-sections.json` is a sample `project` create body that writes the practice-theme `page_sections` Flexible Content through the REST API's `acf` key. This only works when the field group has "Show in REST" on and its location rules match the post type.
