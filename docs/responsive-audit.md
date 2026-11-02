# Responsive-Prüfung Fantadu

Stand: 2. November 2026; Ausgangscommit: 9b969cb.

## Umfang und Grenzen

Alle Theme-Templates, Funktionen und Styles wurden gelesen. Die öffentliche Startseite https://kila-fantadu.de/ wurde bei 375 und 1440 Pixeln untersucht. Die Live-Seite enthält zusätzliche WordPress-/Customizer-Styles und ist daher keine identische Vorschau des Repository-CSS. Keine Produktionsänderung durchgeführt.

Lokal ist weder PHP noch WordPress vorhanden. Eine temporäre HTML-Testseite verwendete das geänderte Theme-CSS, den tatsächlichen Footer-JavaScript-Code und die Struktur des Hauptmenüs mit seinen zehn Unterseiten. Sie enthielt absichtlich ein 1200 Pixel breites Bild, eine lange Kontaktadresse, drei Footer-Spalten sowie optionale Hinweis- und Partnerbilder. Dies ersetzt keinen Test mit echten WordPress-Inhalten oder Plugins.

## Korrigierte Probleme

- Bis 768px: geschlossenes Offscreen-Menü wird auch mit `visibility: hidden` verborgen; Links sind damit geschlossen nicht fokussierbar.
- Mobiles Menü erhält eine begrenzte Gesamthöhe mit dynamischer Viewport-Einheit, eigenen vertikalen Scrollbereich und zurückgesetzte Desktop-Außenabstände.
- Untermenüs stehen mobil im normalen Dokumentfluss und sind ohne Hover bedienbar. Links passen einschließlich Padding in das Panel und dürfen umbrechen.
- Menübutton meldet den Zustand mit `aria-expanded`; Escape, Klick außerhalb, Linkwahl und Breakpoint-Wechsel schließen das Menü. Escape bringt den Fokus zurück zum Button.
- Inhaltsbilder/-videos, Einbettungen, Footer-Maskottchen und Partnerlogos können mobil nicht mehr allein durch ihre Breite den Bildschirm sprengen. Lange Texte dürfen umbrechen; Footer-Spalten stehen untereinander.
- Optionale fixierte Hinweisbilder stehen mobil im Footer statt über Text oder Navigation. Die vorhandenen Größen, Motive und Schließfunktionen bleiben erhalten.
- Zwischen 769 und 1000px wird ausschließlich das horizontale Navigationspadding begrenzt: Die ursprünglichen 400px zusätzlich zur Inhaltsbreite passen nicht zuverlässig in schmale Tablet-/Desktopfenster.
- Oberhalb 1000px bleiben sämtliche bestehenden CSS-Geometrien unverändert. Farben, Fonts, Logo und Inhaltsbreite wurden nicht neu gestaltet.

## Durchgeführte Prüfungen

- Browser-Messungen der lokalen Testseite bei 320, 375, 600, 768, 769, 834, 1024 und 1440px.
- Bei 320/375/600/768px: Dokumentbreite gleich Viewportbreite, trotz der absichtlichen Belastungsfälle.
- Bei 320 × 568px: offenes Menü innerhalb des Viewports (links 64px, Breite 256px, Höhe 568px), Inhalt 791px hoch und scrollbar.
- Menü öffnen/schließen, Escape mit Fokusrückgabe, Unterseitenwahl und Wechsel von Mobile zu 834px geprüft; `aria-expanded` wird zurückgesetzt.
- JavaScript-Syntax mit `node --check` und Änderungen mit `git diff --check` geprüft.
- Desktop-Stresstest enthält absichtlich überbreite Inhalte; dort bleiben die bestehenden fehlenden globalen Medienbegrenzungen sichtbar. Kein bestandener vollständiger Desktop-Regressionstest behauptet.
- PHP-Syntaxprüfung und vollständiger WordPress-/Plugin-Test mangels Laufzeit nicht möglich. Vor Installation auf einer WordPress-Stagingkopie mit echten Inhalten prüfen, insbesondere Galerie, Tabellen, Formulare, eingeloggte Adminleiste und verschachtelte Untermenüs.

## Desktop-Befunde (bewusst separat)

1. **Untermenüs nicht zuverlässig per Tastatur zugänglich:** Sichtbarkeit hängt allein von `li:hover` ab; eine `:focus-within`- bzw. Disclosure-Lösung fehlt. Unsichtbare Desktop-Untermenüs verwenden nur Opacity und bleiben grundsätzlich fokussierbar. Eine eigene Änderung sollte Tastatur und Touch an größeren Viewports berücksichtigen.
2. **Zwei `<title>`-Elemente:** `header.php` schreibt einen Titel, obwohl `functions.php` `title-tag` aktiviert. Auf der Live-Startseite wurden zwei Titel gemessen. WordPress sollte allein den Titel ausgeben.
3. **Fehlende allgemeine Desktop-Medienbegrenzung:** Inhalte aus dem Editor mit festen Breiten können überlaufen. Auf der live geprüften Startseite bei 1440px trat kein horizontaler Überlauf auf; andere Seiten/Plugins wurden nicht vollständig untersucht.
4. **Logo-Breitenoption ohne Wirkung:** `fantadu_logo_width` wird gelesen, aber nicht ausgegeben; die Steuerung im Customizer fehlt ebenfalls. Tatsächlich gilt die feste CSS-Grenze 500px.
5. **Optionale Hinweisbilder:** Desktopseitig bleiben sie fixiert und können je nach Inhalt Text überdecken; die Schließflächen sind nicht per Tastatur bedienbare `span`-Elemente. Dafür wäre eine gesonderte barrierefreie Button-Korrektur sinnvoll.

Die Korrekturen sind zur Review vorgesehen; der PR wurde nicht zusammengeführt und das WordPress-Theme nicht live installiert.
