# Robustness pass — what broke and what was done

Every Flexible Content layout was rendered a second time on a throwaway page
(`/robustness-test/`, page ID 267) with three abuses applied at once:

- a heading roughly **twice** the length of the one in the Figma frame
- **optional fields left empty** (no image, no button, no icon, no second column,
  a taxonomy filter that matches nothing)
- **wrongly-proportioned images**: a 200 × 1600 sliver, a 2400 × 180 letterbox and
  a 1200 × 1200 square, each drawn with a 50 px grid so any stretch is obvious

Checked at 320, 360, 390, 480, 600, 768, 834, 1024, 1280 and 1440 px, measuring
`document.scrollWidth` against the viewport and listing every element whose box
crosses the viewport edge.

---

## Broke — and the fix

### 1. World map blew the page up to ~9,000 px

`.ps-worldmap__map img` was `width: 100%; height: auto`. Given the 200 × 1600
sliver it scaled to the full 1120 px column and became roughly 8,960 px tall, so
the section pushed every layout below it off the screen.

**Fix** — `sass/sections/_world-map.scss`: `max-height: 560px` plus
`object-fit: contain`, so a portrait upload letterboxes inside the band instead
of setting the section height.

### 2. Free-trial CTA kept an empty column when no image was set

`.ps-signup__inner` is a two-column grid at `lg`. With the image field empty the
copy was squeezed into the left half — a seven-line heading beside 500 px of
nothing.

**Fix** — `template-parts/sections/cta-signup.php` adds a `ps-signup--no-media`
modifier when the image is empty, and `_cta-signup.scss` collapses the grid to a
single column for it. The same guard was added to `feature_split`
(`ps-split--no-media`), which has the same shape.

### 3. A very long unbroken word pushed a step card past the viewport at 320 px

`ps-safe-text` used `overflow-wrap: break-word`. That breaks the line but does
**not** reduce the element's min-content width, so a 44-character word still
forced the grid track 52 px wider than the screen.

**Fix** — `sass/abstracts/mixins/_responsive.scss`: added
`overflow-wrap: anywhere` after the `break-word` declaration (older browsers keep
the fallback). Min-content now shrinks and the sweep reports zero overflow at
every width on both pages.

### 4. Pricing amount rendered at body size in grey

Not a stress-test find, but caught in the side-by-side. `.ps-pricing__price span`
matched the `.ps-pricing__amount` span nested inside the `<strong>`, so the 49 px
price inherited the 16 px grey period style.

**Fix** — `_pricing.scss`: scoped that rule to `> span` (the period label only).

### 5. Featured-image filenames containing an em dash 404'd

`media_handle_sideload()` was given the post title as the file name; the project
titles contain an em dash, which survived into the upload path and some servers
would not serve it.

**Fix** — the seeder now names covers from the post slug
(`northwind-card-launch-cover.png`).

---

## Held up without changes

- **Double-length headings** everywhere: fluid `clamp()` sizing plus
  `overflow-wrap` means they wrap and the section grows. Nothing clips, nothing
  overlaps.
- **Empty optional fields**: every template part guards each field individually
  and returns early when a layout has no content at all, so an empty field emits
  no markup rather than an empty box. A button with no label renders nothing; a
  missing arrow icon falls back to a text `→`; a missing tick icon just drops the
  bullet glyph.
- **Wrongly-proportioned images inside cards**: project, blog, logo and feature
  media all sit in `ps-media-box()` — `aspect-ratio` + `object-fit: cover`
  (`contain` for logos). The 50 px test grid stays square in every card, i.e. the
  images crop rather than distort.
- **Projects with no featured image**: `latest-projects.php` renders a tinted
  placeholder carrying the project's initial instead of a broken frame.
- **A taxonomy filter that matches nothing**: the section falls back to the
  editor-supplied empty-state message.
- **Very large numbers** (`$1,234,567,890.00`) in the hero showcase card: the
  card grows and the figure wraps inside it.

## Known cosmetic residue (not fixed on purpose)

- A section given a single item in a three-column grid leaves the other two
  tracks empty. That is the grid doing what it was told; auto-fitting would change
  the design's rhythm when the content *is* complete.
- The free-trial heading still wraps to a narrow measure when the image is absent,
  because `.ps-signup__title` keeps a reading-width cap. Full-bleed headlines read
  worse than a capped measure, so the cap stays.
