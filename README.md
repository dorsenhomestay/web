# Dorsen Homestay

A responsive static website for Dorsen Homestay in Shillong and its travel partner, Romel Compass Tours & Travels.

## Preview

From this directory, run:

```sh
python3 -m http.server 4173
```

Open `http://localhost:4173`. No build step or dependency installation is needed. Deploy the directory to a static web host, preserving the page folders and relative asset paths.

## Pages and assets

- `index.html`: homepage, featured rooms, tours, gallery preview, stay policies, and location. The original `#policy` link is supported.
- `rooms/index.html`: all seven rooms, rates, filters, and four photographs per room. Existing `#room-1` through `#room-7` links are supported.
- `tours/index.html`: destinations, travel services, and Romel Compass contact details.
- `gallery/index.html`: property photographs with category filters and a keyboard-accessible gallery.
- `contact/index.html`: separate stay and travel enquiry panels, phone numbers, directions, and a map.
- `res/css/site.css` and `res/js/site.js`: shared styles and interactions for all pages.
- `res/media/optimized/`: responsive WebP copies of the existing photographs. Original media is retained.

Typography uses Literata for headings and Poppins for body text. The shared type scale is defined in `res/css/site.css`, with compact heading sizes below 1000px.

The earlier `main.css` and `index.js` are retained but are no longer loaded by the redesigned pages. Existing local edits to `main.css` have been preserved.

## Enquiries

The stay form prepares a draft in the visitor’s email app; the visitor sends it themselves. It does not submit to a server, reserve a room, or confirm a booking. Room links preselect the requested room using `?interest=stay&room=room-7#enquiry`, for example.

Tour enquiries go to the travel partner’s published phone numbers. Destination links pass the chosen place to the contact page using `?interest=tours&destination=Wari%20Chora#enquiry`.

Google Fonts and the embedded Google Map require an internet connection. Typography has local fallback fonts, and direct contact and directions links remain available.

## Editing

Edit the HTML pages directly. Keep shared header/footer links consistent across pages. If changing a room rate, update the room listing, any corresponding homepage feature, and the contact form option. Room rates and contact details were carried forward from the previous site.

Stay policies are maintained in the homepage’s `#policy` section, with links from every footer, the room listing, and the stay enquiry form.

Interactive controls support keyboard navigation. Motion respects `prefers-reduced-motion`, and core navigation, photographs, phone links, and email links remain usable without JavaScript.
