# PixeSaaS theme — template architecture & content guide

A reference for anyone building or editing pages with this theme. The examples
throughout use **Oyela**, a fictional online shopping store, so you can see the
kind of content each field expects before you write your own.

**Contents**

1. [How a page is built](#1-how-a-page-is-built)
2. [Template structure](#2-template-structure)
3. [Field types in plain English](#3-field-types-in-plain-english)
4. [Images and media](#4-images-and-media)
5. [Design settings (on every section)](#5-design-settings-on-every-section)
6. [Field group: Page sections](#6-field-group-page-sections)
7. [Field group: Project details](#7-field-group-project-details)
8. [Field group: Header, branding & footer](#8-field-group-header-branding--footer)
9. [Sections that pull in live content](#9-sections-that-pull-in-live-content)

---

## 1. How a page is built

There is no fixed "home page" in this theme. A page is a **stack of sections**
you assemble yourself, in any order, as many times as you like.

```
Page  →  Template: "Page sections (Flexible)"
         │
         ├── Section 1   Hero
         ├── Section 2   Hero showcase
         ├── Section 3   Feature split
         ├── …           (13 section types to choose from)
         └── Section n   Footer
```

**To build a page**

1. **Pages → Add New**, give it a title.
2. In the sidebar set **Template** to **Page sections (Flexible)**, then save.
   The normal content editor disappears and a **Sections** panel takes its place.
3. Click **Add section** and pick a section type.
4. Fill in the fields. Drag the row handles to reorder. Click a row header to
   collapse it.
5. **Update**.

Every piece of text and every image on the page comes from these fields — nothing
is baked into the code, so you never need a developer to change wording or
imagery.

> **One caution.** The whole section stack is saved in one go. If you leave the
> page editor open in a tab while someone else edits the same page, pressing
> **Update** will overwrite their changes with what your tab loaded. Reload the
> editor before saving if it has been sitting open.

---

## 2. Template structure

Each section type is one PHP template part and one stylesheet partial, named
consistently. Underscores in the section name become hyphens in the filenames.

| # | Section (as shown in wp-admin) | Internal name | Template part | Stylesheet |
|---|---|---|---|---|
| 1 | Hero | `hero` | `template-parts/sections/hero.php` | `sass/sections/_hero.scss` |
| 2 | Hero showcase (illustration + cards) | `hero_showcase` | `hero-showcase.php` | `_hero-showcase.scss` |
| 3 | Feature split (app mock + features) | `feature_split` | `feature-split.php` | `_feature-split.scss` |
| 4 | Stats + media | `stats_media` | `stats-media.php` | `_stats-media.scss` |
| 5 | World map + counters | `world_map` | `world-map.php` | `_world-map.scss` |
| 6 | Steps | `steps` | `steps.php` | `_steps.scss` |
| 7 | Pricing | `pricing` | `pricing.php` | `_pricing.scss` |
| 8 | Testimonials | `testimonials` | `testimonials.php` | `_testimonials.scss` |
| 9 | Logo wall | `logo_wall` | `logo-wall.php` | `_logo-wall.scss` |
| 10 | Free-trial CTA | `cta_signup` | `cta-signup.php` | `_cta-signup.scss` |
| 11 | Latest projects (dynamic) | `latest_projects` | `latest-projects.php` | `_latest-projects.scss` |
| 12 | Latest posts (dynamic) | `blog_cards` | `blog-cards.php` | `_blog-cards.scss` |
| 13 | Footer | `footer_cta` | `footer-cta.php` | `_footer-cta.scss` |

### Supporting files

| File | What it does |
|---|---|
| `page-templates/page-sections.php` | The page template. Loops the sections and loads each part. |
| `inc/sections.php` | The loop itself plus shared helpers (images, links, buttons, section headings). |
| `inc/acf-setup.php` | Points ACF at the `acf-json/` folder, registers the settings page, allows SVG uploads. |
| `inc/cpt-project.php` | Registers the **Projects** post type and the **Project types** taxonomy. |
| `header.php` / `footer.php` | Site-wide navbar and closing markup. |
| `js/sections.js` | Mobile menu toggle and the monthly/annual pricing switch. |
| `sass/sections/_foundation.scss` | Shared pieces: containers, buttons, section headings, grids, empty states. |
| `acf-json/*.json` | The field definitions themselves, version-controlled with the theme. |

### Shared styling foundations

- Content column **1120px**, with page margins of 160px on desktop, 40px on
  tablet, 20px on mobile.
- Default vertical breathing room per section: **80px** desktop, **56px** mobile.
- Typeface: **Inter** throughout. Headings scale smoothly between mobile and
  desktop rather than jumping at fixed breakpoints.

---

## 3. Field types in plain English

| Type | What you see in wp-admin | Notes |
|---|---|---|
| **Text** | A single-line box | Plain text only — no bold, links or line breaks |
| **Text area** | A multi-line box | Line breaks are kept; no formatting buttons |
| **Image** | *Add Image* button opening the Media Library | See [Images and media](#4-images-and-media) |
| **Link** | *Select Link* opening the WordPress link picker | Three parts: the visible **text**, the **URL**, and an **Open in a new tab** checkbox. Leave it empty and the button or link simply doesn't appear |
| **Repeater** | A list you can **Add Row** to, reorder by dragging, and delete from | Used for anything that repeats: buttons, logos, plans, links |
| **Group** | A labelled cluster of related fields | Always present, never repeats — e.g. the mock app card |
| **Select** | A dropdown with fixed options | You cannot type your own value |
| **True / False** | An on/off switch | |
| **Taxonomy** | A picker listing existing categories or project types | Leave empty to mean "all" |
| **Colour picker** | A swatch with a colour wheel and a hex box | |
| **Email** | A single-line box | Rejects anything that isn't a valid address |
| **URL** | A single-line box | Rejects anything that isn't a valid web address |
| **Number** | A spinner box | Has a minimum and maximum |
| **Tab** | The grey tabs across the top of a section | Purely for organisation — holds no content |

**Empty fields are safe.** Every optional field is guarded: leave it blank and
that element is left out of the page entirely. You never get an empty box, a
broken image icon, or a button with no label.

---

## 4. Images and media

All image fields open the standard Media Library, accept any image the library
holds, and store a reference rather than a fixed size — so the theme can serve
the right size for each screen automatically.

### Sizes the theme prepares

| Size | Dimensions | Used for |
|---|---|---|
| `pixesaas-card` | 704 × 500, cropped | Project cards, blog cards |
| `pixesaas-wide` | 1120px wide, height free | Full-width section imagery |

### What happens if an image is the wrong shape

Card images sit in fixed-ratio frames and **crop** to fill — they are never
squashed or stretched. A tall portrait photo in a wide card slot will be centre-
cropped. Free-standing images (the world map, the CTA image) are capped in height
and letterboxed instead, so an unusually tall upload can't stretch the page.

You still get the best result by supplying roughly the right shape.

### Recommended sizes

| Slot | Suggested upload |
|---|---|
| Logo mark (header) | Square or wide, at least 84px tall, SVG or transparent PNG |
| Hero illustration | 1400px wide or more |
| Card / post thumbnails | 1408 × 1000 (double the card size, for sharp screens) |
| Brand logos, app badges | Transparent PNG or SVG |
| Icons, tick marks, arrows | SVG preferred |
| Avatars, photos | Square, at least 200 × 200 |

### SVG uploads

SVG is enabled, but only for **Administrators and Editors**, and every uploaded
SVG is scanned first — files containing scripts or embedded frames are rejected.
This is deliberate: SVG can carry executable code, so it isn't opened up to all
roles.

---

## 5. Design settings (on every section)

Every section type ends with a **Design** tab carrying the same three controls.

| Field | Type | Options | What it does |
|---|---|---|---|
| **Background** | Select | White *(default)* · Grey · Black | Grey is the soft `#F9F9FB` used to separate a band from its neighbours. Black flips the text to white automatically. |
| **Vertical spacing** | Select | Default · Tight · Flush top · Flush bottom · None | **Default** 80px above and below (56px on mobile). **Tight** halves it to 40px. **Flush top / bottom** removes the space on that side so two sections sit flush — useful when a section should read as a continuation of the one above. **None** removes both. |
| **Anchor ID** | Text | — | Optional. Give the section a name like `pricing`, and any menu item or button pointing at `#pricing` will jump to it. Use lowercase letters and hyphens only. |

**Oyela example** — the "Shop by category" band is set to **Grey** with **Default**
spacing, and the pricing band is given the anchor `seller-plans` so the navbar's
"Sell on Oyela" item can link to `#seller-plans`.

---

## 6. Field group: Page sections

| | |
|---|---|
| **Where it appears** | Pages using the **Page sections (Flexible)** template |
| **Panel name** | Sections |
| **Button** | Add section |

Thirteen section types follow. Design settings are omitted from each table since
they are identical everywhere — see [section 5](#5-design-settings-on-every-section).

---

### 6.1 Hero

The opening statement: one big headline, a short paragraph, and up to three
buttons.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading **(required)** | Text | The single clearest sentence about what you offer | `Everything you love, delivered by Thursday` |
| Intro text | Text area | Two lines expanding on the heading | `Over 40,000 independent sellers, one basket, and free returns on everything. Oyela is shopping without the small print.` |
| **Buttons** | Repeater, up to 3 | | |
| › Link | Link | Button text and destination | Text `Start shopping`, URL `/shop/` |
| › Style | Select — Primary / Outline / Light | Primary is a solid black button, Outline is bordered, Light is for dark backgrounds | Button 1 `Primary`, button 2 `Outline` (`Become a seller` → `#seller-plans`) |

---

### 6.2 Hero showcase (illustration + cards)

The large product visual under the hero, with a "trusted by" strip, a customer
counter and a floating highlight card.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Illustration | Image | The main artwork or product shot | A flat-lay of an Oyela parcel with clothing and homeware |
| Tagline — light part | Text | First half of the caption, in regular weight | `Hand-picked pieces from ` |
| Tagline — emphasised part | Text | Second half, shown bold | `12,000 small brands` |
| Trusted-by label | Text | Short lead-in before the logos | `As seen in` |
| **Trusted-by logos** | Repeater | | |
| › Logo | Image | One press or partner logo | Vogue, Stylist, TechCrunch marks |
| **Avatars** | Repeater, up to 5 | Overlapping face photos next to the counter | |
| › Avatar | Image | A square customer photo | Three shopper headshots |
| Counter value | Text | The headline number | `1.2M+` |
| Counter label | Text | What the number counts | `happy shoppers this year` |
| **Earnings card** | Group | The floating highlight card over the artwork | |
| › Brand icon | Image | Small logo shown on the card | The Oyela mark |
| › Brand name | Text | Card title | `Oyela Plus` |
| › Period label | Text | Small label, top right | `This month` |
| › Amount | Text | The large figure | `£248.60` |
| › Amount label | Text | What the figure means | `Saved on delivery` |
| › Note | Text area | One supporting sentence | `Free next-day delivery on every order, plus early access to seasonal drops.` |
| › Footer amount | Text | Smaller figure along the bottom | `£4.99` |
| › Footer period | Text | Suffix for it | `/ month` |
| › Pill label | Text | Small badge on the right | `Most popular` |

---

### 6.3 Feature split (app mock + features)

A two-column band: a visual on one side, a short feature list on the other. The
visual is either your own image or a built-in mock app card.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `Shopping that keeps up with you` |
| **Feature items** | Repeater | | |
| › Icon | Image | Small icon, ideally SVG | A delivery-van glyph |
| › Title | Text | Feature name | `Track every parcel in one place` |
| › Text | Text area | One or two supporting lines | `Orders from every seller land in a single timeline, with live updates from the courier.` |
| Button | Link | Optional link under the list | `See how it works` → `#how-it-works` |
| Media position | Select — Left / Right | Which side the visual sits on | `Left` |
| Media type | Select — Mock app card / Image | Choose which visual to show | `Mock app card` |
| Image | Image | Used only when Media type is **Image** | — |
| **Mock app card** | Group | Used only when Media type is **Mock app card** | |
| › Avatar | Image | Profile photo in the card header | A shopper's photo |
| › Name | Text | Name in the header | `Amara Nwosu` |
| › Status | Text | Small status line | `Oyela Plus member` |
| › Timestamp | Text | Right-hand time label | `2h ago` |
| › Message | Text area | The quoted line inside the card | `Three parcels arriving today — all tracked in one place.` |
| › Badge | Text | Small circular badge | `3` |
| › Tab 1 label | Text | Left tab | `Orders` |
| › Tab 2 label | Text | Right tab | `Saved` |
| › Sort label | Text | Right-aligned control label | `Sort by` |
| › Sort icon | Image | Icon beside it | A chevron |
| › **Transactions** | Repeater | The rows inside the card | |
| ›› Icon | Image | Row icon or seller logo | Brand marks |
| ›› Icon background | Colour picker | Tint behind the icon | `#f4fcda` |
| ›› Title | Text | Row title | `Linen midi dress` |
| ›› Subtitle | Text | Row category | `Studio Marlow` |
| ›› Amount | Text | Figure on the right | `−£68.00` |
| ›› Type | Select — Debit / Credit | Debit shows red, credit shows green | `Debit` |
| ›› Date | Text | Date under the amount | `14 Sept 2024` |

---

### 6.4 Stats + media

A headline and short paragraph beside an image, with one to three numbers
highlighted on a coloured card.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `Sellers grow faster on Oyela` |
| Text | Text area | Supporting paragraph | `We handle payments, delivery labels and returns, so you can spend your time on the product instead of the paperwork.` |
| Button | Link | Optional call to action | `Open a shop` → `/sell/` |
| Image | Image | The supporting visual | A seller packing orders |
| **Stats** | Repeater, up to 3 | | |
| › Value | Text | The number itself | `3.4` |
| › Suffix | Text | Unit shown after it | `X` |
| › Label | Text | What it measures | `Average sales in year one` |

---

### 6.5 World map + counters

A full-width map illustration with a row of up to four counters beneath it.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `We ship to 94 countries, and counting.` |
| Map illustration | Image | The map graphic — SVG recommended | A dotted world map |
| **Counters** | Repeater, up to 4 | | |
| › Value | Text | The number | `94` |
| › Suffix | Text | Unit after it | `+` |
| › Label | Text | What it counts | `Countries served` |

*Oyela's four counters:* `94+ Countries served` · `40k+ Independent sellers` ·
`4.8/5 Average review` · `48h Average delivery`

---

### 6.6 Steps

A "how it works" band: one wide featured card followed by a row of smaller ones.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `Start selling in four steps` |
| Intro text | Text area | Supporting line | `No listing fees, no monthly minimum, and your first payout within a week.` |
| **Featured step (wide card)** | Group | The wide card at the top | |
| › Icon | Image | Step marker or icon | A circled `01` |
| › Title | Text | Step name | `Create your shop` |
| › Text | Text area | What happens at this step | `Pick a name, add your logo, and tell shoppers what you make. It takes about ten minutes.` |
| › Link | Link | Optional link | `Learn more` → `/sell/setup/` |
| › Image | Image | Illustration on the right | A shop-setup illustration |
| › Accent | Select — Green / Blue / Pink / Yellow / Grey | Card tint | `Green` |
| **Steps** | Repeater | The smaller cards | |
| › Icon | Image | Step marker | `02`, `03`, `04` |
| › Title | Text | Step name | `List your first products` |
| › Text | Text area | What happens | `Upload photos, set your prices, and we will write the delivery options for you.` |
| › Link | Link | Optional link | `Learn more` |
| › Accent | Select | Card tint | `Blue`, `Pink`, `Yellow` |

---

### 6.7 Pricing

Plan cards with an optional monthly/annual switch. The switch only appears when
at least one plan has **both** prices filled in *and* at least one toggle label is
set — otherwise the single price shows on its own.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `Seller plans that scale with you` |
| Monthly label | Text | Left side of the switch | `Monthly` |
| Annual label | Text | Right side of the switch | `Annual` |
| Savings badge | Text | Small badge beside the switch | `Save 20%` |
| Savings badge arrow | Image | Optional decorative arrow | A hand-drawn arrow |
| Feature tick icon | Image | The bullet used on every feature line | A black tick circle |
| **Plans** | Repeater | | |
| › Card artwork | Image | Decorative graphic overlapping the card top | A card illustration per tier |
| › Plan name | Text | Tier name | `Starter` |
| › Monthly price | Text | Price when the switch is off | `£12` |
| › Annual price | Text | Price when the switch is on | `£9` |
| › Period suffix | Text | Shown after the price | `/ per month` |
| › **Features** | Repeater | | |
| ›› Feature | Text | One benefit per row | `Up to 50 listings` |
| › Description | Text area | Who the plan suits | `For makers testing the water with a small first collection.` |
| › Button | Link | The plan's call to action | `Choose Starter` → `/sell/starter/` |

*Oyela's three tiers:* **Starter** £12 · **Growth** £29 · **Pro** £59.

---

### 6.8 Testimonials

Quote cards with a photo and attribution.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `What our shoppers say` |
| Quote mark icon | Image | The decorative quote glyph | A green quotation mark |
| **Testimonials** | Repeater | | |
| › Quote | Text area | The quote itself, 1–3 sentences | `I found three small brands I now buy from monthly. Returns were painless the one time I needed them.` |
| › Photo | Image | Square headshot | A customer photo |
| › Name | Text | Who said it | `Dean M. Nazario` |
| › Role | Text | Their context | `Shopper since 2022` |

---

### 6.9 Logo wall

A grid of brand logos with a single line of text above.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | One line introducing the logos | `40,000+ independent brands sell on Oyela.` |
| **Logos** | Repeater | | |
| › Logo | Image | One brand mark per row | Studio Marlow, Ferne & Co, Hallow Goods… |
| › Link (optional) | Link | Where the logo goes when clicked | `/brands/studio-marlow/` |

Logos are shown inside equal frames and scaled to fit, so mixed shapes and sizes
still line up.

---

### 6.10 Free-trial CTA

An email capture band with an image, reassurance notes and optional app badges.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Image | Image | Visual beside the form | The Oyela app on a phone |
| Heading | Text | The offer | `Get £10 off your first order` |
| Text | Text area | One supporting line | `Join the Oyela newsletter for early access to drops and seasonal sales.` |
| Email placeholder | Text | Grey hint text inside the input | `Your email address` |
| Button label | Text | The submit button | `Sign me up` |
| Form action URL | URL | Where the form submits. **Leave blank and the form is display-only** | Your newsletter provider's endpoint |
| **Reassurance notes** | Repeater | Small ticked lines under the form | |
| › Icon | Image | Tick or check mark | A black tick |
| › Text | Text | The reassurance | `No spam, one email a week` |
| **App store badges** | Repeater | | |
| › Badge | Image | The official store badge | App Store / Google Play |
| › Link | Link | The store listing | `https://apps.apple.com/…` |

> If you leave **Form action URL** empty the form still renders but does nothing
> when submitted — useful while you're waiting on a newsletter account.

---

### 6.11 Latest projects (dynamic)

Pulls live entries from the **Projects** post type. See
[section 9](#9-sections-that-pull-in-live-content).

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `This season's collections` |
| Intro text | Text area | Supporting line | `Curated drops from the brands our buying team is watching right now.` |
| Button | Link | Link to the full archive | `View all collections` → `/projects/` |
| How many to show | Number, 1–12 | Card count | `3` |
| Limit to project types | Taxonomy | Restrict to chosen types. **Empty means all** | `Autumn 25` |
| Order by | Select — Date / Title / Menu order / Random | Sort order | `Date` (newest first) |
| Show excerpt | True / False | Show the summary line on each card | On |
| Show client / year meta | True / False | Show the Client and Year labels | On |
| Empty state message | Text | Shown when nothing matches | `New collections land every Thursday — check back soon.` |
| Card arrow icon | Image | The arrow in each card's corner | An arrow SVG |

---

### 6.12 Latest posts (dynamic)

The same idea for ordinary blog posts.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | Section headline | `Style notes & shopping guides` |
| How many to show | Number, 1–12 | Card count | `3` |
| Limit to categories | Taxonomy | Restrict to chosen categories. **Empty means all** | `Guides` |
| Empty state message | Text | Shown when nothing matches | `No guides published yet.` |
| Card arrow icon | Image | The arrow in each card's corner | An arrow SVG |

---

### 6.13 Footer

The closing band plus the black copyright bar beneath it. Add this as the last
section; pages that include it don't print the theme's default footer.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Heading | Text | The closing call to action | `Ready to find your next favourite thing?` |
| Button | Link | The action | `Start shopping` → `/shop/` |
| **Link columns** | Repeater, up to 3 | | |
| › Column title | Text | The column heading | `Company`, `Help`, `Sell` |
| › **Links** | Repeater | | |
| ›› Link | Link | One menu entry | `About Oyela` → `/about/` |
| Contact column title | Text | Heading for the contact column | `Contact Us` |
| Email address | Email | Shown as a clickable `mailto:` link | `hello@oyela.com` |
| **Social icons** | Repeater | | |
| › Icon | Image | The platform glyph | Instagram, TikTok, Pinterest, X |
| › Link | Link | Your profile. The link text becomes the accessible label | Text `Instagram`, URL `https://instagram.com/oyela` |
| Copyright text | Text | The line in the black bar | `Copyright © 2026 Oyela. All rights reserved.` |
| **Legal links** | Repeater | The links on the right of the black bar | |
| › Link | Link | One legal page | `Delivery & Returns`, `Terms`, `Privacy` |

*Oyela's three columns:* **Company** (About · Careers · Press · Sustainability) ·
**Help** (Delivery · Returns · Track an order · FAQs) · **Sell** (Open a shop ·
Seller plans · Seller handbook · Fees).

---

## 7. Field group: Project details

| | |
|---|---|
| **Where it appears** | Every **Project** entry (Projects → Add New) |
| **Purpose** | Extra data shown on the cards in the *Latest projects* section |

A "project" is whatever a portfolio item means for your site. For Oyela, each one
is a **seasonal collection**.

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Client | Text | Who it was for | `Studio Marlow` |
| Year | Text | When it ran | `2026` |
| Project URL | URL | Link to the live thing | `https://oyela.com/collections/autumn-linen` |
| Card summary | Text area | Short blurb for the card. **Falls back to the post excerpt if empty** | `Twelve linen pieces made in Portugal, cut for real wardrobes and priced under £120.` |

Also set, using the standard WordPress fields:

- **Title** — the collection name, e.g. `Autumn Linen — Studio Marlow`
- **Featured image** — the card thumbnail (ideally 1408 × 1000)
- **Project types** — the taxonomy used by the section's filter, e.g.
  `Autumn 25`, `Homeware`, `Menswear`
- **Excerpt** — used if Card summary is blank

---

## 8. Field group: Header, branding & footer

| | |
|---|---|
| **Where it appears** | **PixeSaaS** in the wp-admin sidebar → settings page |
| **Applies to** | Every page on the site |

| Field | Type | What goes here | Oyela example |
|---|---|---|---|
| Brand name | Text | The wordmark beside the logo. **Falls back to the site title if empty** | `Oyela` |
| Logo mark | Image | The symbol before the wordmark. SVG or transparent PNG | The Oyela `O` mark |
| Login link | Link | The plain text link in the navbar | Text `Sign in`, URL `/my-account/` |
| Header button | Link | The solid button at the right of the navbar | Text `Start shopping`, URL `/shop/` |
| Fallback footer text | Text | Used on pages that **don't** include a Footer section. Empty gives `© year Site name` | `Copyright © 2026 Oyela. All rights reserved.` |

**The navbar menu itself is a normal WordPress menu** — *Appearance → Menus*,
assigned to the **Primary** location. Oyela's: `Shop` · `Brands` · `Sell on
Oyela` · `Help`.

On screens narrower than 1024px the menu collapses behind a toggle, while the
login link and button stay visible in the bar.

---

## 9. Sections that pull in live content

Two sections show real entries rather than content typed into the section. You
manage the entries in their own place; the section decides how many appear and in
what order.

| Section | Reads from | Where you add entries |
|---|---|---|
| Latest projects | **Projects** post type | Projects → Add New |
| Latest posts | Ordinary **Posts** | Posts → Add New |

**What this means day to day.** Publish a new collection under Projects and it
appears on the home page automatically — you never edit the home page to add it.
The oldest one drops off the end once you pass the card count.

Each card shows:

- the **featured image** (or a tinted placeholder with the first letter of the
  title if there isn't one)
- the first **Project type** / **category** as a small tag
- the **title**, linked to the full entry
- the **summary** and the **client/year** meta, if you switched those on
- the **publish date** and an arrow link

If nothing matches your filter, the **Empty state message** shows instead of an
empty gap — so write one that makes sense to a visitor, not `TBC`.
