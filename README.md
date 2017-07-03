# README #

Der Webshop entstand als Projektarbeit innerhalb meiner Weiterbildung zum Web-Developer 2016 innerhalb des Kurses zum Thema Objektorientierte Programmierung & PHP.

### Online Demo ###

Unter diesem [Link](https://demo26.solution-developer.de/) finden Sie eine Online Demo des Webshops.

Der Benutzername lautet demouser und das Passwort demo13507

### Die Installation ###

1. Erstellen Sie eine Datenbank mit dem Namen "webshop" mit der Kollation "utf8_general_ci"
2. Importieren Sie das SQL-Backup mit der Bezeichnung "webshop.sql" aus dem Verzeichnis "setup".

Nun lässt sich der Shop benutzen und auch das Backend im Unterverzeichnis "admin" aufrufen.

### Aufbau ###

Die index.php Datei des Front- und des Backends stellt den Haupt-Controller. Es wird im Abhängigkeit der Parameter module und action der jeweilige Programcode ausgeführt. Wird der Bereich des Moduls bzw. der Aktion im Modul nicht gefunden wird das jeweilige Skript mit einer Fehlermeldung abgebrochen.

### Bedienung ###

### Datenmodel ###

### Offene Punkte ###

* Bei der Abmeldung wird die komplette Session gelöscht. Es sollte nur die Backend- oder Frontendsession gelöscht werden
* Registrierungsformular
* Controller im Front- und Backendbereich in einzelne Dateien aufteilern
* Meine Bestellungen anzeigen
* Warenkorb aus localStorage zurücklesen falls Session leer