
# 📚 Fantadu Theme – README

Willkommen beim **Fantadu WordPress-Theme**.  
Dieses Theme wurde speziell für den **Kinderladen Fantadu e.V.** entwickelt.  
Es legt Wert auf ein kindgerechtes, freundliches Design, volle Kontrolle über Logos & Bilder im Customizer und ist bewusst ohne Blog-Funktion aufgebaut.

## 🚀 Überblick – was macht das Theme besonders?
- **Helle Farben & kindgerechte Schriften**  
  - Himmelblau (#E7F3FF) mit dunkelblauem Text (#005672)  
  - Orange (#eda500) für Highlights & Hover
  - Handschrift-Look für Überschriften (Caveat), runde Sans-Serif für Fließtext (Comfortaa)

- **Volle Customizer-Steuerung**:
  - Logo-Upload inkl. Größenanpassung
  - Zwei fixe Bilder mit Link & Toggle
  - Partnerlogos mit Links (bis zu 4 Stück)

- **Keine Blog-Posts!**  
  - Beiträge sind im WordPress-Backend ausgeblendet.  
  - Das Theme ist für statische Seiten gedacht.

- **Widgets & Menüs:**
  - Hauptmenü (Header) & Footer-Menü
  - Sidebar + 3 Footer-Widget-Bereiche

- **DSGVO-freundlich:**  
  - Alle Fonts lokal eingebunden. Keine Google Fonts, kein externer Traffic.

## 🗂 Theme-Struktur

| Datei              | Zweck |
|--------------------|-------|
| `style.css`         | Theme-Header (Name, Author, Version etc.), alle Styles inkl. Fonts, Navigation, Footer, Responsive Design, Partnerlogos |
| `functions.php`     | Registriert Menüs, Widgets, Customizer-Felder, schaltet Posts ab |
| `header.php`        | Lädt Logo, Navigation, ggf. fixierte Bilder |
| `footer.php`        | Footer-Menü, Footer-Widgets, Partnerlogos |
| `index.php` / `page.php` | Generelles Template für Seiten |
| `screenshot.png`    | Vorschaubild im WordPress-Backend |

## 🎨 Style-Highlights & Helferklassen
### Farben & Schriftarten
- Hintergrund: `#E7F3FF` (hellblau)
- Texte: `#005672` (dunkelblau)
- Highlights: `#eda500` (orange)

**Fonts:**
- `Caveat` für Überschriften (`h1`, `h2`, `h3`) → handschriftlich
- `Comfortaa` für Fließtexte & Menüs → modern, rund

### CSS-Klassen, die du überall einsetzen kannst
| Klasse                | Effekt                          |
|------------------------|--------------------------------|
| `.text-color-orange`   | Text orange färben             |
| `.text-links`          | linksbündig                    |
| `.text-rechts`         | rechtsbündig                   |
| `.text-zentriert`      | zentriert                      |
| `.text-block`          | Blocksatz                      |
| `.weniger-abstand-oben`| Abstand nach oben reduzieren  |
| `.weniger-abstand-unten`| Abstand nach unten anpassen  |
| `.zitat`               | spezielles Zitat-Layout mit Linie & größerem Text |

## ⚙️ Funktionen & Einstellungen im Theme

### `functions.php` im Detail
✅ **Theme-Support aktiviert:**
- `title-tag` für Seitentitel
- `post-thumbnails` für Beitragsbilder

✅ **Menüs registriert:**
- `main_menu` → Header
- `footer_menu` → Footer

✅ **Widgets registriert:**
- `main_sidebar`
- `footer_widget_1` bis `footer_widget_3`

✅ **Customizer-Features:**
- Logo-Upload
- Zwei fixe Bilder inkl. Link & Ein/Aus-Checkbox
- Bis zu 4 Partnerlogos inkl. Link

✅ **Backend-Aufräumen:**
- `Posts` komplett ausgeblendet.

## 🖼 Fixe Bilder (Customizer)
Im Customizer unter  
**„Jobs und Kinder Einstellungen“**:
- Upload für Bild unten rechts & links
- Link + Checkbox zum Anzeigen

## 🤝 Partnerlogos
Unter **„Partnerlogos im Footer“** im Customizer:
- Bis zu 4 Logos + eigener Link
- Hover-Effekt: leichtes Zoomen

## 🧩 Widgets
- Sidebar für Seiten
- Footer mit 3 Widget-Spalten

## 🗄 Navigation
- Header-Menü mit Dropdowns & Pfeilen
- Footer-Menü simple Links
- Mobil: Hamburger-Menü ab 768px

## 🚀 Entwickler-Extras & Tipps
- Fonts lokal gehostet (DSGVO)
- `.page-title`, `.single-title` sind via CSS `display: none`
- `remove_menu_page('edit.php');` entfernt Posts im Admin

## 📝 ToDo / Hinweise
- Logo-Größe kann im Customizer ausgebaut werden (Schieberegler vorbereitet)
- Mehr als 4 Partner erfordern Anpassungen in der `functions.php`
- Für Animationen: besser `transform` statt `margin` verwenden.

## 🤝 Kontakt & Credits
Theme entwickelt von **Boy Ruehling**  
👉 https://ankercode.de

---

🎉 Viel Spaß mit Fantadu! Wenn Fragen sind, einfach reinschauen oder Boy anfunken.

---

## 📈 Tracking via Umami

Dieses Theme verwendet kein integriertes Tracking. 
Das Tracking wird stattdessen sauber über das Plugin **WPCode** eingebunden, 
in dem der Tracking-Code von **Umami** (https://umami.is) hinterlegt ist. 
So bleibt das Theme selbst schlank und Updatesicher.

Du findest den Umami-Tracking-Code im WPCode Plugin innerhalb des WordPress Dashboards 
unter „Code Snippets“. Dadurch ist das Tracking unabhängig vom Theme und kann jederzeit 
angepasst oder deaktiviert werden, ohne das Theme zu ändern.
