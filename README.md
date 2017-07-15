# README #

Der Webshop entstand als Projektarbeit im Rahmen meiner Weiterbildung zum Web-Developer innerhalb des Kurses zum Thema "Objektorientierte Programmierung & PHP". F�r die Realisierung war eine Zeit von 2 Tagen vorgesehen.

### Online Demo ###

Unter diesem [Link](https://demo63.solution-developer.de/) finden Sie eine Online Demo des Webshops.

Der Benutzername lautet demouser und das Passwort demo13507

### Die Installation ###

1. Erstellen Sie zuerst eine Datenbank mit dem Namen "cbw-webshop" mit der Kodierung utf-8. Der Datenbankname und auch die Zugangsdaten zum SQL-Server l�sst sich ggf. in der Datei inc/config.php �ndern.
2. Importieren Sie bitte die Datei setup/webshop.sql via phpmyadmin in die erstellte Datenbank.

Nun l�sst sich der Shop benutzen und auch das Backend im Unterverzeichnis "admin" aufrufen. Die Zugangsdaten zum Backend lauten "admin" mit dem Passwort "admin".

### Aufbau ###

Die index.php Datei des Front- und des Backends stellt den Haupt-Controller. Es wird in Abh�ngigkeit der Parameter "module" und "action" der jeweilige Programmcode ausgef�hrt. Wird der Bereich des Moduls bzw. die Aktion im Modul nicht gefunden, wird das jeweilige Skript mit einer Fehlermeldung abgebrochen.

### Bedienung ###

### Datenmodel ###

### Offene Punkte ###

* Bei der Abmeldung wird die komplette Session gel�scht. Es sollte nur die Backend- oder Frontendsession gel�scht werden
* Registrierungsformular
* Controller im Front- und Backendbereich in einzelne Dateien aufteilen
* Warenkorb aus localStorage zur�cklesen, falls die Session bzw. der Warenkorb leer ist.