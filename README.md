# README #

Der Webshop entstand als Projektarbeit im Rahmen meiner Weiterbildung zum Web-Developer innerhalb des Kurses zum Thema "Objektorientierte Programmierung & PHP". Für die Realisierung war eine Zeit von 2 Tagen vorgesehen.

### Online Demo ###

Unter diesem [Link](https://demo63.solution-developer.de/) finden Sie eine Online Demo des Webshops.

Der Benutzername lautet demouser und das Passwort demo13507

### Die Installation ###

1. Erstellen Sie zuerst eine Datenbank mit dem Namen "cbw-webshop" mit der Kodierung utf-8. Der Datenbankname und auch die Zugangsdaten zum SQL-Server lässt sich ggf. in der Datei inc/config.php ändern.
2. Nun importieren Sie bitte die Datei setup/webshop.sql via phpmyadmin in die erstellte Datenbank.

Nun lässt sich der Shop benutzen und auch das Backend im Unterverzeichnis "admin" aufrufen. Die Zugangsdaten zum Backend lauten "admin" mit dem Passwort "admin".

### Aufbau ###

Die index.php Datei des Front- und des Backends stellt den Haupt-Controller. Es wird im Abhängigkeit der Parameter module und action der jeweilige Programcode ausgeführt. Wird der Bereich des Moduls bzw. der Aktion im Modul nicht gefunden wird das jeweilige Skript mit einer Fehlermeldung abgebrochen.

### Bedienung ###

### Datenmodel ###

### Offene Punkte ###

* Bei der Abmeldung wird die komplette Session gelöscht. Es sollte nur die Backend- oder Frontendsession gelöscht werden
* Registrierungsformular
* Controller im Front- und Backendbereich in einzelne Dateien aufteilern
* Warenkorb aus localStorage zurücklesen falls Session leer