# Contao4Dsgvo

Dieses Modul erzeugt eine neue Checkbox mit dem Namen "dsgvo". Ein Javascript im Frontend versteckt die Checkbox und fügt stattdessen ein Modal ein. Das Modal erscheit sobald alle Required-Felder ausgefüllt wurden und der Senden-Button geklickt wird.

Das Formular wird allerdings erst abgesendet, nachdem der Benutzer im Modal den Datenschutz zur Kentniss genommen hat.

## Installation im Contao Manager

- Suche nach `sioweb/dsgvo`
- Füge im Seitenlayout das Template `j_dsgvo.html5` hinzu
- Lege das Eingabefeld `DSGVO Feld` an 
- Testen
