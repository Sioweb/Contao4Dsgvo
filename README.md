# Contao4Dsgvo

Dieses Modul erzeugt eine neue Checkbox mit dem Namen "dsgvo". Ein Javascript im Frontend versteckt die Checkbox und fügt stattdessen ein Modal ein. Das Modal erscheit sobald alle Required-Felder ausgefüllt wurden und der Senden-Button geklickt wird.

Das Formular wird allerdings erst abgesendet, nachdem der Benutzer im Modal den Datenschutz zur Kentniss genommen hat.

## Installation

- (Contao Manager) Suche nach `sioweb/dsgvo`
- (Oder über Console) `composer require sioweb/dsgvo`
- Lege das Eingabefeld `DSGVO Feld` an
- Fülle die DSGVO-Einstellungen aus (Es sind inserttags erlaubt!)
- Testen (Es müssen alle Pflichtfelder aktiviert werden!)
    - GGf. funktioniert die Validierung nicht mehr richtig
