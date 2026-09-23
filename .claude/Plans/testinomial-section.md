# Add a "Testimonials" section to the `project` CPT (practice-theme)

## Context
Project pages in practice-theme are built from the ACF Flexible Content field `page_sections`
(field group `group_6a9e9cd29862d`, location `post_type == project`, `show_in_rest: 1`).
`single-project.php` renders each row with
`get_template_part( 'template-parts/sections/' . $layout )`, so a new layout only needs
(1) a layout in the field group JSON and (2) a matching template part named exactly after the
layout name. Goal: editors can add a "Testimonials" block (heading + list of quotes) to a project.

## Changes

### 1. `wp-content/themes/practice-theme/acf-json/group_6a9e9cd29862d.json`
Add a new entry to `page_sections.layouts` (after `gallery`):

- Layout: key `layout_6ab1a0000000a`, name `testimonials`, label `Testimonials`, display `block`.
- Sub fields:
  - `testimonials` — repeater, layout `block`, button "Add Testimonial", min 1, containing
    (each with `parent_repeater` set to the repeater key):
    - `quote` — textarea, required, `new_lines: ""` (we wrap it ourselves).
    - `author_name` — text, required.
    - `author_role` — text, optional (e.g. "CEO, Acme").
    - `author_photo` — image, `return_format: array`, `preview_size: thumbnail`, optional.
    - `rating` — number, min 1 / max 5, optional.
- Use unique hex keys in the same style (`field_6ab1a0000000b` … `field_6ab1a0000000h`).
- Bump the group's `"modified"` timestamp so ACF flags "Sync available".

(`inc/acf-fields.php` is not loaded — its `require` is commented out in `functions.php` — so it is left untouched.)

### 2. New `wp-content/themes/practice-theme/template-parts/sections/testimonials.php`
Same style as `stats_section.php` (plain `get_sub_field` / `have_rows`, escape at output):

```php
<?php
$section_title = get_sub_field( 'section_title' );

if ( ! have_rows( 'testimonials' ) ) {
    return;
}
?>
<section class="section-testimonials">
    <div class="container">
        <?php if ( $section_title ) : ?><h2>…esc_html…</h2><?php endif; ?>
        <div class="testimonials-grid">
            <?php while ( have_rows( 'testimonials' ) ) : the_row(); … ?>
                <figure class="testimonial-card">
                    [rating → "★" x n with aria-label "Rated n out of 5"]
                    <blockquote class="testimonial-quote"><?php echo wp_kses_post( wpautop( $quote ) ); ?></blockquote>
                    <figcaption class="testimonial-author">
                        [photo → wp_get_attachment_image( $photo['ID'], 'thumbnail', false, [ 'class' => 'testimonial-photo' ] )]
                        <cite>author_name</cite> [<span class="testimonial-role">author_role</span>]
                    </figcaption>
                </figure>
            <?php endwhile; ?>
        </div>
    </div>
</section>
```
Each optional field (title, role, photo, rating) guarded individually; skip a row with no quote.

### 3. Styles (minimal)
No section currently has styles in `sass/`. Add `wp-content\themes\practice-theme\sass\components\_testimonials.scss` 
(responsive grid: 1 col mobile → 2–3 cols, card padding/border, round 64px photo) and
`@import` it from `sass/components/_components.scss`, then `npm run compile:css`.

### Not in scope (noted only)
- Existing bug: `stats_section.php` reads `section_title` but the field is named `section-name`.
- `gallery` layout has no template part and a nameless text sub-field.
Can fix separately if wanted.

## Verification
1. Start the site in Local. In wp-admin → ACF → Field Groups, click **Sync** on "Page Sections" if shown.
2. Edit a project → Page Sections → Add Row → **Testimonials**; add 2–3 entries (one without photo/role/rating).
3. View the project at `http://admin.local/…` — confirm heading, quotes, optional parts hidden when empty,
   and layout at 320px / desktop widths.
4. `GET /wp-json/wp/v2/project/<id>` — confirm `acf.page_sections` includes the `testimonials` row.
5. From theme dir: `composer lint:php`, `npm run lint:scss`; check `wp-content/debug.log` for notices.
