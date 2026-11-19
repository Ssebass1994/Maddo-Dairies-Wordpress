MADDO DAIRIES WORDPRESS THEME
============================

Included:
- All 8 supplied HTML pages converted into WordPress page templates/content.
- Shared WordPress header, navigation and footer.
- Original maddo.css and page-specific inline CSS.
- JavaScript for the home-page slideshow and responsive mobile navigation.
- Login page uses WordPress' native login form.
- On theme activation, the theme creates these pages if they do not already exist:
  Home, About Us, Our Products, Partnership Logistics, Contact Us & Feedback,
  Login, Order Products, Send Suggestions.

INSTALLATION
1. In WordPress Dashboard go to Appearance > Themes > Add New > Upload Theme.
2. Upload maddo-dairies-wordpress-theme.zip and click Install Now.
3. Activate the theme.
4. Visit Settings > Permalinks and click Save Changes.
5. Check the pages under Pages > All Pages. The theme creates them on activation.
6. Under Appearance > Menus, create a menu and assign it to Main Navigation if desired.
   If no menu is assigned, the theme displays a fallback menu.

IMAGES
All images live in assets/images/ and are referenced through get_theme_file_uri(),
so they work on any domain/subfolder. Keep the filenames exactly as they are (they are
case-sensitive on Linux hosting).

CSS
maddo.css loads first, then every other .css file in assets/css/ is loaded automatically.
Each page file is scoped to its own page via the body class maddo-page-<page-slug>
(e.g. body.maddo-page-login), so styles no longer clash. If you add a new page CSS file,
prefix its selectors with "body.maddo-page-<slug> .site-main".

FORMS
The supplied HTML pages include visual forms, but several forms have no server-side
submission destination and the order page has no actual order form. Those are not
made operational merely by converting HTML to WordPress. Configure a WordPress form
plugin (for example, a contact form plugin) or request a follow-up implementation
with the exact fields, recipient email and order workflow.
