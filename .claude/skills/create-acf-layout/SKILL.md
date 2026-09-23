---
name: create-acf-layout
description: Scaffolds a new ACF Flexible Content layout end-to-end for the PixeSaaS or Practice theme in this WordPress repo — the ACF field group JSON, the template-parts/sections/<slug>.php markup, the sass/sections/_<slug>.scss partial (imported into style.scss), and correctly-escaped output for every field. Use this whenever the user asks to add a new section/layout/block to a page-builder field, says "/create-acf-layout", or describes a set of fields they want turned into a new Flexible Content layout (e.g. "add a testimonial grid layout with heading, quote, avatar"). Always use this instead of hand-editing acf-json files directly, since it keeps the JSON, template part, and SCSS in sync the way CLAUDE.md requires.
---

# Create ACF layout

Scaffolds one new Flexible Content layout across the three files CLAUDE.md says must stay in sync: the ACF field group JSON, the template part, and the SCSS partial. Do all three in the same turn — a layout added to the JSON with no template part (or vice versa) leaves the theme broken until someone notices.

## Input format

Invoked as `/create-acf-layout <field group title> | <layout name> | <field list>`, or described in prose. Parse out three things:

1. **Field group title** — the ACF field group's human `title`, e.g. `Page sections` or `Page Sections`. Matched case-insensitively.
2. **Layout name** — becomes the ACF layout `name` (snake_case) and the file slug (hyphenated). `hero_showcase` and `hero-showcase` both mean the same layout.
3. **Field list** — comma-separated `field-name-[field-type]` tokens, e.g. `heading-text, intro-textarea, cards-repeater, logo-image`. The type suffix is optional — when absent, infer it (see below). Field names are snake_case; when the type suffix is present it's the last hyphen-delimited token and must be a recognized ACF type keyword (see the table), otherwise treat the whole token as a name to infer.

## Step 1 — Resolve the target theme and field group

Search `wp-content/themes/*/acf-json/*.json` for a file whose `"title"` matches the given field group title case-insensitively (`Grep -i` for `"title"` across that glob, then confirm). That file's directory tells you the theme, which tells you:

- The function/hook prefix to use for any new PHP (`pixesaas_*` for legacy-styled PixeSaaS code — the theme's own convention already deviates from `e2m_<slug>_`, so match what's already in the file you're extending rather than introducing a second prefix; `e2m_practice_*` for genuinely new Practice-theme functions per CLAUDE.md).
- Whether shared render helpers exist. PixeSaaS has `inc/sections.php` with `pixesaas_sub()`, `pixesaas_image()`/`pixesaas_get_image()`, `pixesaas_button()`, `pixesaas_link()`, `pixesaas_text_link()`, `pixesaas_section_atts()`, `pixesaas_section_head()`, `pixesaas_counter()` — use these instead of raw `get_sub_field()` calls. Practice-theme's `single-project.php` has no such helpers; its template parts call `get_sub_field()` directly (see `template-parts/sections/hero.php` for the pattern: guard each field, `echo esc_html( $x )` / `esc_url( $x['url'] ?? '' )` inline). Check `inc/*.php` in the resolved theme before assuming which style applies.
- Whether the field group is the page-level Flexible Content field (`sections` in PixeSaaS, `page_sections` in Practice-theme) versus some other, unrelated field group. If the matched group has no `flexible_content` field in its top-level `fields`, stop and tell the user this skill only adds layouts to a Flexible Content field — it's the wrong group.

If no file matches, or more than one does, list the candidates (title + path) and ask the user to disambiguate rather than guessing.

## Step 2 — Work out each field's ACF type

For every field in the list, if a type suffix was given and it's a valid ACF field type, use it. Otherwise infer from the name against this table (checked in order, first match wins):

| Name pattern | Inferred type |
|---|---|
| `*image*`, `*icon*`, `*logo*`, `*avatar*`, `*photo*`, `*artwork*`, `*thumbnail*`, `*badge_image*` | `image` |
| `*gallery*`, `*photos*`, `*screenshots*` (plural media) | `gallery` |
| `*email*` | `email` |
| `*date*` | `date_picker` |
| `*color*`, `*colour*` | `color_picker` |
| `heading`, `title`, `label`, `name`, `eyebrow`, `tagline`, `badge`, `tag`, `brand`, `period`, `status`, `time`, `anchor`, `pill` | `text` |
| `text`, `description`, `desc`, `summary`, `intro`, `note`, `notes`, `message`, `subtitle`, `caption` | `textarea` (matches the pattern already used across every existing PixeSaaS layout: single-line labels are `text`, longer copy is `textarea`) |
| `content`, `body`, `rich_text` | `wysiwyg` |
| plural collection nouns — `items`, `cards`, `features`, `steps`, `logos`, `stats`, `apps`, `rows`, `links`, `testimonials`, `avatars`, `transactions` | `repeater` |
| `enabled`, `show_*`, `is_*`, `has_*`, `hide_*` | `true_false` |
| `*_url` alone (not paired with a visible label) | `url` |
| `*count*`, `*number*` (and clearly numeric, not a display value like a stat's `value`) | `number` |

**Genuinely ambiguous names — ask, don't guess.** These come up constantly and the wrong pick either loses data (plain `url` instead of ACF `link`, which also carries the label/target) or forces a rebuild later:

- `link`, `button`, `cta` — could be ACF's `link` type (returns url/title/target, used everywhere for buttons in this codebase — see `field_ps_hero_button_link`) or a plain `url`. Default assumption: if the name suggests something clickable with visible text (`button`, `cta`), it's `link`; ask when it's ambiguous.
- `background`, `spacing`, `style`, `position`, `variant`, `type` — these are almost always `select` with a fixed set of choices, but the choices themselves can't be inferred from the name. Ask the user for the choice list (or propose the theme's existing convention — PixeSaaS layouts already standardize on a `background` select with `white/grey/black` and a `spacing` select with `default/tight/flush_top/flush_bottom/none` — offer to reuse those verbatim if the field name matches).
- Any name with no confident match in the table above.

Use `AskUserQuestion` for these — batch every ambiguous field into one question set rather than asking one at a time.

## Step 3 — Update the ACF field group JSON

Read the whole matched JSON file first (it can be large — use `offset`/`limit` or `Grep` to jump to the `"layouts"` object rather than dumping it all into context if it's big). Then:

1. **Match the file's existing key style.** PixeSaaS uses semantic keys (`field_ps_<layout>_<field>`, `layout_ps_<layout>`); Practice-theme uses opaque hex keys (`field_6a9e9cfebb6b5`, `layout_6a9e9ce6df123`) generated by the ACF UI. Look at the sibling layouts already in the file and follow the same style — for hex-style files, generate a 13-hex-digit suffix after `field_`/`layout_` (any random lowercase hex works; ACF only requires uniqueness within the group, verify none collide with existing keys in the file). For semantic-style files, base the key on the theme's field prefix + layout slug + field name.
2. **Reuse the layout's shared scaffolding.** If every existing layout in this group has a `background`/`spacing`/`anchor` design trio (PixeSaaS does — see any `layout_ps_*`), add the same three sub-fields to the new layout with identical `choices` so `pixesaas_section_atts()` keeps working on it. Don't invent a different shape.
3. **Add the new layout object** to the `layouts` map (key = the layout's own key, not to be confused with the `"name"` value used for routing — `get_row_layout()` returns `"name"`, and `pixesaas_render_sections()` turns underscores in `"name"` into hyphens for the file lookup, so the `"name"` value here must exactly match the layout slug with underscores).
4. **Preserve every other key in the file untouched** — `location`, `menu_order`, `active`, `show_in_rest`, etc. If the file has a trailing `"modified"` unix timestamp, update it to the current time; if it doesn't, don't add one.
5. Write the file back with the same 4-space indentation the file already uses (ACF's own JSON export style — don't reformat unrelated parts of the file).

## Step 4 — Create the template part

`template-parts/sections/<layout-slug>.php` (underscores in the layout name become hyphens in the filename, matching `pixesaas_render_sections()`'s lookup). Follow the conventions CLAUDE.md and the existing layouts (e.g. `cta-signup.php`) already establish:

- Prefix local variables `$ps_` (PixeSaaS) or the equivalent theme convention.
- Pull every sub-field near the top via the theme's sub-field helper (`pixesaas_sub( 'name' )` or `get_sub_field( 'name' )`), one line per field, defaulting arrays to `array()`.
- `return;` early if the fields that make the layout meaningful are all empty — don't render an empty shell. Look at what a comparable existing layout treats as "nothing to show" (e.g. `cta-signup.php` returns when heading, text, and image are all empty) and apply the same judgment to the new layout's own required-feeling fields.
- Guard every optional field independently with its own `if` — one missing field must not hide a sibling section.
- For a missing optional image, add a `--no-media` BEM modifier on the section wrapper (see `ps-signup--no-media` in `cta-signup.php`) so the SCSS can collapse the layout to one column.
- Build the wrapper attributes with `pixesaas_section_atts( 'ps-<layout>', $extra_modifiers )` when that helper exists in the theme — it wires up the background/spacing/anchor fields from Step 3 automatically.
- CSS classes follow `ps-<block>__<element>` / `ps-<block>--<modifier>` BEM, where `<block>` is a short new name for this layout (look at existing blocks like `ps-signup`, `ps-hero` for the naming register — short, not literally the layout slug if that's unwieldy).

## Step 5 — Escape every field at the point of output

This is the part most likely to introduce a real vulnerability if rushed — match the escaping function to where the value actually lands, not to the field's ACF type:

| Output context | Function | Example |
|---|---|---|
| Inside HTML body text (a heading, paragraph, label) | `esc_html()` | `esc_html( $ps_heading )` |
| Inside an HTML attribute (`class`, `id`, `placeholder`, `data-*`, `style` fragments) | `esc_attr()` | `esc_attr( $ps_field_id )` |
| A URL — `href`, `src`, `action`, `style="background-image:url(...)"` | `esc_url()` | `esc_url( $ps_link['url'] )` |
| WYSIWYG / rich-text field allowed to contain safe HTML (bold, links, lists) | `wp_kses_post()` | `wp_kses_post( $ps_body )` |
| An image, via the theme's image helper (already escapes internally) | `pixesaas_image()` / `pixesaas_get_image()` | no separate escaping needed |
| A link/button, via the theme's link helper | `pixesaas_button()` / `pixesaas_link()` + `esc_url()`/`esc_html()` inside it | already escaped by the helper |

Never `echo` a sub-field value raw, and never choose `esc_html()` for something that's actually being placed in an attribute or URL just because it "is text" — the surrounding markup decides the function, not the field.

## Step 6 — Create the SCSS partial and wire it into the build

`sass/sections/_<layout-slug>.scss`, prefixed with a one-line comment naming the layout (see the `// Layout: cta_signup — Figma "Container 11" (1:3852)` convention at the top of existing partials — omit the Figma reference if there's no frame to cite). Use the theme's existing abstractions rather than hardcoding values: breakpoint mixins (`ps-from()`/`ps-until()`), color/spacing/radius variables (`$ps-black`, `$ps-radius`, etc. — check `sass/abstracts/` for the full list), and the `ps-type()` mixin for typography. Style the same BEM block used in the template part.

Then add `@import "sections/<layout-slug>";` to `sass/style.scss` in the `# Sections` block (the theme lists every layout partial there, one `@import` per line — append the new one, and update the table-of-contents comment at the top of the file to match if the theme keeps one).

Compiled `style.css` is build output — don't hand-edit it. After writing the partial and the import, run `npm run compile:css` from the theme directory if `node_modules` is already installed there; otherwise tell the user to run `npm install && npm run compile:css` themselves before the styles show up.

## Step 7 — Verify before calling it done

- Re-read the written JSON to confirm it's valid (a JSON parse error here breaks ACF for the whole field group, not just the new layout).
- Confirm the layout's `"name"` in the JSON, the `get_row_layout()` value, and the template-part filename all agree once underscores are hyphenated.
- Run `composer lint:php` (syntax) and `npm run lint:scss` from the theme directory if available; report failures rather than silently ignoring them.
- If the theme has a `CONTENT-GUIDE.md` documenting each layout and field for editors (PixeSaaS does), add a short entry for the new layout in the same format as its neighbors — CLAUDE.md calls this file out as living documentation that new layouts should keep up to date.
- Tell the user to check the layout by adding it to a page's Flexible Content field in wp-admin at `http://admin.local` and viewing the front end — this skill can generate correct files but can't verify the rendered result without a browser.
