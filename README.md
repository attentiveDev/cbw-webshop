# README #

Der Webshop entstand als Projektarbeit innerhalb meiner Weiterbildung zum Web-Developer 2016 innerhalb des Kurses zum Thema Objektorientierte Programmierung & PHP.

### Online Demo ###

Unter diesem [Link](https://demo63.solution-developer.de/) finden Sie eine Online Demo des Webshops.

Der Benutzername lautet demouser und das Passwort demo13507

### Die Installation ###

1. Erstellen Sie zuerst eine Datenbank mit dem Namen "webshop" mit der Kodierung utf-8. Der Datenbankname und auch die Zugangsdaten zum SQL-Server l�sst sich ggf. in der Datei inc/config.php �ndern.
2. Nun importieren Sie bitte die Datei setup/01_setup_database.sql via phpmyadmin in die erstellte Datenbank. Dies erstellt die Datenbankstruktur.
3. Abschlie�end importieren Sie die Datei setup/02_insert_demodata.sql in die selbe Datenbank um Musterdaten zu erstellen.

Nun l�sst sich der Shop benutzen und auch das Backend im Unterverzeichnis "admin" aufrufen. Die Zugangsdaten zum Backend lauten "admin" mit dem Passwort "admin".

### Aufbau ###

Die index.php Datei des Front- und des Backends stellt den Haupt-Controller. Es wird im Abh�ngigkeit der Parameter module und action der jeweilige Programcode ausgef�hrt. Wird der Bereich des Moduls bzw. der Aktion im Modul nicht gefunden wird das jeweilige Skript mit einer Fehlermeldung abgebrochen.

### Bedienung ###

### Datenmodel ###

### Offene Punkte ###

* Bei der Abmeldung wird die komplette Session gel�scht. Es sollte nur die Backend- oder Frontendsession gel�scht werden
* Registrierungsformular
* Controller im Front- und Backendbereich in einzelne Dateien aufteilern
* Meine Bestellungen anzeigen
* Warenkorb aus localStorage zur�cklesen falls Session leer