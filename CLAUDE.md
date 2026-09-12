# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Repository overview

This is a WordPress site root (a Local by Flywheel install, not a git repository). Core WordPress files (`wp-admin/`, `wp-includes/`, root `wp-*.php`) are stock WordPress and should not be modified. All custom work lives under `wp-content/`:

- `wp-content/themes/practice-theme/` — the active custom theme (based on the `_s`/Underscores starter theme). This is where almost all real development happens.
- `wp-content/plugins/krupat-day2/` — a small custom learning/demo plugin (`krupat-day2.php`) illustrating WordPress hooks (`add_filter`, `add_action`, custom hooks via `do_action`). Treat it as scratch/example code, not production logic.
- `wp-content/plugins/advanced-custom-fields`, `advanced-custom-fields-pro`, `fakerpress`, `query-monitor` — third-party plugins, unmodified.
- `wp-content/themes/twentytwentythree`, `twentytwentyfour`, `twentytwentyfive` — stock WordPress default themes, unused/inactive, present as fallback.

Database credentials in `wp-config.php` (`root`/`root` on `localhost`, DB name `local`) confirm this is a local dev environment.

## Practice-theme architecture

`practice-theme` implements a custom "Project" showcase built on ACF (Advanced Custom Fields) Flexible Content:

- **`inc/cpt-project.php`** — registers the `project` custom post type and the `project_type` hierarchical taxonomy on `init`. REST API support is enabled (`show_in_rest`) for both.
- **`inc/acf-fields.php`** — programmatically registers the ACF field group `page_sections` (a Flexible Content field) via `acf_add_local_field_group()`, with three layouts: `hero`, `text_block`, `stats_section` (stats layout includes a repeater sub-field). **Note:** this file's `require` is currently commented out in `functions.php` — field group definitions are instead loaded from the JSON files in `acf-json/` (ACF's local JSON auto-sync). If you edit ACF fields in wp-admin, ACF will write the changes back to `acf-json/`; if you edit `acf-fields.php` directly, you likely need to re-enable its `require` in `functions.php` or keep it in sync with the JSON.
- **`inc/project-generator.php`** — `automatic_project_generator()`, hooked to `admin_init`, idempotently creates a demo "Automated Showcase Project" post and populates its `page_sections` field via `update_field()` — a reference example for programmatic ACF population.
- **`template-parts/sections/{hero,text_block,stats_section}.php`** — one template part per Flexible Content layout. `single-project.php` loops ACF rows with `have_rows( 'page_sections' )` / `get_row_layout()` and calls `get_template_part( 'template-parts/sections/' . $layout )` to render each section dynamically.
- **`archive-projects.php`** — a custom archive template that queries `project` posts filtered by the `project_type` taxonomy via `tax_query` (currently hardcoded to the `web-design` term).
- Everything else (`header.php`, `footer.php`, `sidebar.php`, `comments.php`, `functions.php`, `inc/custom-header.php`, `inc/customizer.php`, `inc/jetpack.php`, `inc/template-functions.php`, `inc/template-tags.php`) is largely unmodified `_s` starter-theme boilerplate.

### Styling

Styles are authored in Sass under `sass/` (organized `abstracts/`, `base/`, `components/`, `generic/`, `layouts/`, `plugins/`, `utilities/`, entry point `sass/style.scss`) and compiled to the theme root `style.css` / `style-rtl.css`. Don't hand-edit `style.css` directly — edit the Sass source and recompile.

## Common commands

Run from `wp-content/themes/practice-theme/` (this theme has its own `package.json`/`composer.json`; the site root does not).

```sh
# one-time setup
composer install
npm install

# Sass -> CSS
npm run watch          # watch & recompile sass/ to style.css on change
npm run compile:css    # one-off compile + stylelint --fix
npm run compile:rtl    # generate style-rtl.css from style.css

# linting
npm run lint:scss      # stylelint on sass/**/*.scss (@wordpress/stylelint-config)
npm run lint:js        # eslint on js/*.js (@wordpress/eslint-plugin)
composer lint:php      # php-parallel-lint syntax check across the theme
composer lint:wpcs     # PHPCS against WordPress + WPThemeReview coding standards (phpcs.xml.dist)

# i18n
composer make-pot      # regenerate languages/practice-theme.pot

# packaging
npm run bundle         # zip the theme for distribution (excludes dev files)
```

There is no automated PHPUnit/JS test suite in this theme — verification is via linting (`lint:php`, `lint:wpcs`, `lint:scss`, `lint:js`) and manual checking in the browser against the local WordPress site.

The `krupat-day2` plugin has no build/lint tooling of its own; it's a single plain PHP file.
