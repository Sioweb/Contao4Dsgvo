# Contao4Dsgvo

Dieses Modul erzeugt eine neue Checkbox mit dem Namen "dsgvo". Ein Javascript im Frontend versteckt die Checkbox und fügt stattdessen ein Modal ein. Das Modal erscheit sobald alle Required-Felder ausgefüllt wurden und der Senden-Button geklickt wird.

Das Formular wird allerdings erst abgesendet, nachdem der Benutzer im Modal den Datenschutz zur Kentniss genommen hat.

## Installation

- (Contao Manager) Suche nach `sioweb/dsgvo`
- (Oder über Console) `composer require sioweb/dsgvo`
- Lege das Eingabefeld `DSGVO Feld` in deinem Formular an
- Name kann/darf nicht geändert werden
- Pflichtfeld-Checkbox muss aktiviert werden (Wird ohne Javascript ausgegeben)
- In das erste Optionen-Feld [JA] und [DATENSCHUTZTEXT EINFÜGEN] einfügen
- Fülle die DSGVO-Einstellungen aus (Es sind inserttags erlaubt!)
- Den Absende-Button des Formulares umbenennen in z.B. `Prüfen und Absenden`
- Testen (Es müssen alle Pflichtfelder aktiviert werden!)
    - GGf. funktioniert die Validierung nicht mehr richtig
    
## Hintergrund

Die DSGVO setzt vorraus, dass der Absender ausreichend über Zweck und Dauer der Aufbewahrung aufgeklärt wird. Idealerweise sollte die Einwilligung zu Beweiszwecken dokumentiert werden. Dieses Modul verhindert, dass der Benutzer das Formular ohne Einwilligung absenden kann und weist den Absender in einem zweiten Schritt explizit auf den Datenschutz hin, bevor das Formular tatsächlich abgesendet wird.

Die Checkbox wird im Hintergrund vor dem Absenden aktiv gesetzt und kann im E-Mail-Template hinterlegt und somit auch dokumentiert werden.

Sollte `kein Javascript` aktiviert sein, wird die Checkbox ausgegeben. Daher ist es Ratsam das Formular mit Javascript und einmal mit deaktiviertem Javascript (Developer Tools) zu testen.

## Hinweis

Es wird keine Gewährleistung gegeben, dass dieses Modul rechtssicher eingesetzt werden kann. Jeder Benutzer ist selbst, für die Rechtsicherheit verantwortlich und muss sich durch einen Rechtsexperten / Berater beraten und absichern lassen.
