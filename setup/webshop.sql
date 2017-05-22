USE webshop;

-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: rdbms
-- Erstellungszeit: 22. Mai 2017 um 13:14
-- Server Version: 5.6.36-log
-- PHP-Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `DB2882055`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articlegroups`
--

CREATE TABLE IF NOT EXISTS `articlegroups` (
`id` int(6) NOT NULL,
  `groupname` varchar(64) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `articlegroups`
--

INSERT INTO `articlegroups` (`id`, `groupname`, `description`) VALUES
(1, 'Mountainbike', 'Ein Mountainbike (MTB) (englisch für Bergfahrrad) oder Geländefahrrad ist ein Fahrrad, das besonders auf den Einsatz abseits befestigter Straßen ausgerichtet ist. Grundsätzlich ist das Geländerad ebenso wie das Rennrad eher Sportgerät als Verkehrsmittel, weshalb es üblicherweise nicht mit den von der in Deutschland geltenden Straßenverkehrs-Zulassungs-Ordnung (StVZO) geforderten Komponenten (wie Beleuchtung, Klingel und Rückstrahler) ausgestattet ist.'),
(2, 'Rennrad', 'Ein Rennrad (Schweiz Rennvelo) ist ein Fahrrad, das für den Gebrauch als Sportgerät bei Radrennen konstruiert wurde. Es zeichnet sich durch eine leichte Bauweise und die Reduktion auf die zum Fahren erforderlichen Teile aus (also z. B. keine Gepäckträger, Schutzbleche, Licht etc.).'),
(3, 'Cityrad', 'Ein Fahrrad das eher auf bequeme Alltagstauglichkeit ausgelegt ist als auf Sportlichkeit.'),
(4, 'Kinderrad', 'Wir führen auch Kinderräder.\r\n\r\nKinderräder berädern nicht nur Kinder - Nein, auch als Erwachsene sind wir in diesem Fall nicht selten auch gerädert...'),
(5, 'Bücher', 'Ein Buch ist nach traditionellem Verständnis eine Sammlung von bedruckten, beschriebenen, bemalten oder auch leeren Blättern aus Papier oder anderen geeigneten Materialien, die mit einer Bindung und meistens auch mit einem Bucheinband (Umschlag) versehen ist.\r\n\r\nBücher sind einfach toll!'),
(6, 'Zubehör', 'Unser großes Sortiment an Fahrradzubehör lässt Ihnen die Ohren schlackern..');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(6) NOT NULL,
  `articlegroup_id` int(6) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `price_net` decimal(6,2) DEFAULT NULL,
  `tax` int(6) DEFAULT NULL,
  `image_url` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `articles`
--

INSERT INTO `articles` (`id`, `articlegroup_id`, `name`, `description`, `price_net`, `tax`, `image_url`) VALUES
(1, 1, 'BULLS Monster FS Fatbike', 'BREITER, STÄRKER......MONSTER FS\r\n\r\nDie kraftvolle Erscheinung mag zunächst anderes vermuten lassen, doch im Monster FS steckt ein Sportler.\r\nDas Fatbike-Fully von Bulls sorgt für ein außergewöhnliches Fahrgefühl dass Kontrolle und Komfort vereint.\r\n\r\nEin echtes Monster!', 1931.93, 19, 'bulls_monster_fs_fatbike.jpg'),
(2, 1, 'Focus Whistler Evo 27 Hardtail', 'Sport ist für dich eine Selbstverständlichkeit?  Für uns auch.\r\n\r\nDeine Wege sind so weit wie deine Interessen breit. Deine Tour beginnt am Bordstein, endet aber nicht am Waldrand. Das WHISTLER vereint Sportgerät mit Alltagstauglichkeit.', 438.65, 19, 'focuswhistlerevo.jpg'),
(3, 3, 'HERA WS 611 Cityrad', 'STADT- UND SHOPPING Fahrrad\r\n\r\nDas chice Damenrad von Hera. Dieser Onlinekauf ist künftig ihre zuverlässige Shoppingbegleitung.\r\n\r\nMit kompletter Straßenausstattung und Lichtanlage wenn es in der Stadt mal länger dauert.', 217.65, 19, 'hera-28-ws611c-sw-lavendel-2016-(1).jpg'),
(4, 4, 'Bachtenkirch Ragazzi Kinderrad', 'Technische Details\r\nMaterial Aluminium\r\nGabel Starre Gabel\r\nGänge 1-Gang\r\nModelljahr 2016', 74.79, 19, 'bachtenkirch-16--ragazzi-rosa-2016-(1).jpg'),
(5, 2, 'Cannondale Supersix Evo Hi-Mod Dura Ace 2', 'ALL-NEW SUPERSIX EVO HI-MOD\r\n\r\ndie beste Allround-Straßenrennmaschine der Welt\r\n\r\nEin beeindruckender Mix aus Steifigkeit, Nachgiebigkeit, Leichtigkeit und Aerodynamik.\r\n\r\nunglaubliches Handling dank der fein abgestimmten Balance aus Steifigkeit und Flex.', 3360.50, 19, 'cannondale_super_six_evo_hi-mod_dura_ace_2_rennrad_2016.jpg'),
(6, 2, 'Bulls Nighthawk DI2', 'Das Nighthawk Carbon mit DI2. Exzellente Ausstattung auf einem hochwertigen Rahmen.', 2262.18, 19, 'bulls.jpg'),
(7, 5, 'Ultrasports Die F-AS-T-Formel das Sporternährungs-Buch', 'Mit dem Buch &quot;Die F-AS-T-Formel: Was erfolgreiche Sportler anders machen&quot; der beiden erfolgreichen Autoren Dr. Wolfgang Feil und Friederike Feil lernen Sie, wie man ein wahrer Wettkämpfer wird und wie man seine Leistung steigern kann.', 18.65, 7, 'ultrasports-die-fast-formel-buch-245250.jpg'),
(8, 6, 'Liix Ballhupe Pretty Horn Polka Dots', 'Durch die schlanke Bauart wirkt diese Ballhupe elegant und findet gut Platz am Lenker. Dabei ist sie wunderbar laut, formschön und dank der bunten Punkte wunderbar anzuschauen. Mit diesem Sound und diesem Look bekommt man sicherlich mehr Aufmerksamkeit als mit einer gewöhnlichen Fahrradklingel.\r\n\r\nLackiertes Metallhorn mit Gummiball\r\nInklusive silberner Halterung zur Montage an allen üblichen Fahrradlenkern\r\nLänge: ca. 17,5 cm\r\nDurchmesser Hupenball: ca. 5,5 cm\r\nKlemmdurchmesser: 22,2 mm', 10.00, 19, 'liix_2015_ballhupe_prettyhorn_244024.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `backendusers`
--

CREATE TABLE IF NOT EXISTS `backendusers` (
`id` int(6) NOT NULL,
  `login_name` varchar(64) NOT NULL,
  `login_password` varchar(255) DEFAULT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `backendusers`
--

INSERT INTO `backendusers` (`id`, `login_name`, `login_password`, `firstname`, `lastname`) VALUES
(1, 'admin', '$2y$10$RrZUtkJ0yb8JZ19U.Ly/w.0vMFH8aVR4lb.losnDxMLoeaY.uAl9y', 'Der', 'Admin'),
(2, 'ssonntag', '$2y$10$IwIfjs7KYyY.8izbANBqJO0qw7VYsE0Vt122.1cc3Sx8uYl4oc.0.', 'Sven', 'Sonntag'),
(3, 'fborchert', '$2y$10$UI/x9l4Yc1qsdMrZY7MQ7utQ06Z9n8rrorvmfYjkFr18KTuAG1KKG', 'Florian', 'Borchert');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(6) NOT NULL,
  `salutation` varchar(32) DEFAULT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `zipcode` varchar(12) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `customers`
--

INSERT INTO `customers` (`id`, `salutation`, `firstname`, `lastname`, `email`, `password`, `address`, `zipcode`, `city`, `phone`) VALUES
(1, 'Herr', 'Sven', 'Sonntag', 'me@aboutsven.de', '$2y$10$v5.qJTzScX0gM8dpaDX37udrvkaT7L6T0qlFq6686Y5m3HZ5k6AIC', 'Veitstraße 9', '13507', 'Berlin', '0151 / 50989206'),
(2, 'Herr', 'Florian', 'Borchert', 'pillermann@pillerhause.pe', '$2y$10$d/WlsK3I8X48ZrjYWVG9SOXIhhMCs4EjEQYhSIzc0yLCFu5z8/l4u', 'Pillermann Allee 36', '669666', 'Pillerhausen', '0540 / 454583454358'),
(3, 'Herr', 'Daniel', 'Gaul', 'daniel.gaul@mail.xyz', NULL, 'Marientalstr. 71', '66909', 'Langenbach', '06383 / 60411158'),
(4, 'Frau', 'Merle', 'Gonzales', 'merle.gonzales@mail.xyz', NULL, 'Rennbahnstr. 55', '25336', 'Elmshorn', '04121 / 52368489'),
(5, 'Frau', 'Carla', 'Allison', 'carla.allison@mail.xyz', NULL, 'Kurneystr. 71', '56244', 'Vielbach', '02626 / 30689061'),
(6, 'Herr', 'Lennard', 'Marquart', 'lennard.marquart@mail.xyz', NULL, 'Gartenstr. 73', '72419', 'Neufra', '07574 / 22726418'),
(7, 'Frau', 'Greta', 'Kirchner', 'greta.kirchner@mail.xyz', NULL, 'Lammerbach 134', '83080', 'Oberaudorf', '08033 / 49272972'),
(8, 'Frau', 'Carlotta', 'Potter', 'carlotta.potter@mail.xyz', NULL, 'Piusstr. 144', '33415', 'Verl', '05246 / 56100238'),
(9, 'Herr', 'Matti', 'Cook', 'matti.cook@mail.xyz', NULL, 'Unter Kahlenhausen 83', '37073', 'Göttingen', '0551 / 20250556'),
(10, 'Frau', 'Ruth', 'Sumpf', 'ruth.sumpf@mail.xyz', NULL, 'Kleiner Griechenmarkt 20a', '80335', 'München', '089 / 6618545'),
(11, 'Herr', 'John', 'Cook', 'j.cook@mail.xyz', NULL, 'Breul 96', '67483', 'Edesheim', '06323 / 73883282'),
(12, 'Frau', 'Juli', 'Oberle', 'j.oberle@mail.xyz', NULL, 'Gleueler Str. 87', '91583', 'Diebach', '09868 / 64051623'),
(13, 'Frau', 'Astrid', 'Kaiser', 'a.kaiser@mail.xyz', NULL, 'Im Sonnentau 62', '24797', 'Hörsten', '04337 / 90655169'),
(14, 'Herr', 'Bruno', 'Kasten', 'b.kasten@mail.xyz', NULL, 'Salzmannstr. 124a', '32689', 'Kalletal', '05264 / 60751018'),
(15, 'Frau', 'Renate', 'Busse', 'r.busse@mail.xyz', NULL, 'Dorotheenstr. 173', '10589', 'Berlin', '030 / 17727644'),
(16, 'Frau', 'Layla', 'Eckstein', 'layla.eckstein@mail.xyz', NULL, 'Hansaring 91', '21376', 'Gödenstorf', '04172 / 72498576'),
(17, 'Frau', 'Jessica', 'Keller', 'jessica.keller@mail.xyz', NULL, 'Hindenburgplatz 145', '08223', 'Falkenstein', '03745 / 33921688'),
(18, 'Frau', 'Käte', 'Junge', 'k.junge@mail.xyz', NULL, 'Theodor-Heuss-Ring 70', '24149', 'Kiel', '0431 / 38658886'),
(19, 'Frau', 'Luna', 'Hecht', 'l.hecht@mail.xyz', NULL, 'Mondstr. 77', '83620', 'Feldkirchen-Westerham', '08063 / 13430628'),
(20, 'Herr', 'Wilfried', 'Brose', 'wilfried.brose@mail.xyz', NULL, 'Willingrott 67', '37632', 'Eschershausen', '05534 / 47322766'),
(21, 'Herr', 'Gerd', 'Baran', 'gerd.baran@mail.xyz', NULL, 'Am Wigbold 186', '85586', 'Poing', '08121 / 21904654'),
(22, 'Frau', 'Helen', 'Six', 'h.six@mail.xyz', NULL, 'Neusser Str. 158', '06808', 'Holzweißig', '03493 / 66801583'),
(23, 'Frau', 'Lena', 'Sturm', 'lena.sturm@mail.xyz', NULL, 'Osthuesheide 115', '71706', 'Hardthof', '07145 / 94051744'),
(24, 'Frau', 'Sofia', 'Ziemann', 'sofia.ziemann@mail.xyz', NULL, 'Kerßenbrockstr. 33', '37079', 'Göttingen', '0551 / 30723754'),
(25, 'Frau', 'Dagmar', 'Hagedorn', 'd.hagedorn@mail.xyz', NULL, 'Kleiner Griechenmarkt 39', '14913', 'Jüterbog', '03372 / 90531800'),
(26, 'Frau', 'Ronja', 'Franklin', 'ronja.franklin@mail.xyz', NULL, 'Cheruskerstr. 113', '21775', 'Odisheim', '04756 / 95943959'),
(27, 'Frau', 'Leonie', 'Salzmann', 'leonie.salzmann@mail.xyz', NULL, 'Hüfferstr. 20a', '35390', 'Gießen', '0641 / 43088967'),
(28, 'Herr', 'Joel', 'Gilbert', 'j.gilbert@mail.xyz', NULL, 'Hogenbergstr. 161', '55768', 'Hoppstädten-Weiersbach', '06782 / 58105056'),
(29, 'Frau', 'Melina', 'McGuire', 'm.mcguire@mail.xyz', NULL, 'Stettiner Str. 28', '66706', 'Perl', '06867 / 41810128'),
(30, 'Frau', 'Anna', 'Fast', 'a.fast@mail.xyz', NULL, 'Düesbergweg 122', '91743', 'Unterschwaningen', '09836 / 37905309'),
(31, 'Herr', 'Günter', 'Krauss', 'guenter.krauss@mail.xyz', NULL, 'Uhuweg 46', '97789', 'Oberleichtersbach', '09741 / 8515396'),
(32, 'Herr', 'Connor', 'Kämper', 'connor.kaemper@mail.xyz', NULL, 'Josef-Suwelack-Weg 124a', '39638', 'Jerchel', '03907 / 95608097'),
(33, 'Frau', 'Emmily', 'Weidner', 'emmily.weidner@mail.xyz', NULL, 'Sanddornweg 129', '54570', 'Meisburg', '06592 / 62278055'),
(34, 'Frau', 'Lilli', 'Harrington', 'lilli.harrington@mail.xyz', NULL, 'Sophienstr. 190', '14641', 'Schönwalde-Glien', '03322 / 67596727'),
(35, 'Herr', 'Kilian', 'Neu', 'kilian.neu@mail.xyz', NULL, 'Landoisstr. 52', '55595', 'Allenfeld', '06756 / 70581495'),
(36, 'Herr', 'Manuel', 'Meister', 'manuel.meister@mail.xyz', NULL, 'Dahlienweg 45', '22850', 'Norderstedt', '040 / 2781915'),
(37, 'Frau', 'Waldtraut', 'Bös', 'waldtraut.boes@mail.xyz', NULL, 'Werkstattstr. 41', '14641', 'Nauen', '03321 / 99831185'),
(38, 'Frau', 'Anke', 'Wiemann', 'anke.wiemann@mail.xyz', NULL, 'Telgenweg 5', '23896', 'Walksfelde', '04543 / 85582775'),
(39, 'Herr', 'Oskar', 'Selig', 'o.selig@mail.xyz', NULL, 'Hoove 50', '66802', 'Überherrn', '06836 / 51807930'),
(40, 'Frau', 'Mina', 'Schüller', 'mina.schueller@mail.xyz', NULL, 'Am Krausen Baum 188', '55595', 'Braunweiler', '0671 / 22929301'),
(41, 'Herr', 'Herbert', 'Bösch', 'h.boesch@mail.xyz', NULL, 'Hahnenstr. 167', '27356', 'Rotenburg an der Wümme', '04261 / 62916629'),
(42, 'Frau', 'Laura', 'Bräuer', 'laura.braeuer@mail.xyz', NULL, 'Hoove 172', '85591', 'Vaterstetten', '08106 / 59830766'),
(43, 'Herr', 'Kristian', 'Brinkmann', 'kristian.brinkmann@mail.xyz', NULL, 'Cheruskerstr. 184', '78259', 'Mühlhausen-Ehingen', '07733 / 68257267'),
(44, 'Herr', 'Noah', 'Hilbig', 'n.hilbig@mail.xyz', NULL, 'Am Brook 182a', '63683', 'Ortenberg', '06046 / 49038432'),
(45, 'Frau', 'Fenja', 'Hild', 'fenja.hild@mail.xyz', NULL, 'Lammerbach 192', '24220', 'Flintbek', '04347 / 84373036'),
(46, 'Herr', 'Wilhelm', 'Quandt', 'wilhelm.quandt@mail.xyz', NULL, 'Dortmunder Str. 80', '96161', 'Gerach', '09544 / 41726436'),
(47, 'Frau', 'Marike', 'Hilbig', 'marike.hilbig@mail.xyz', NULL, 'Berrischstr. 61', '25836', 'Katharinenheerd', '04862 / 38671937'),
(48, 'Frau', 'Magdalena', 'Scheffler', 'm.scheffler@mail.xyz', NULL, 'Deutz-Kalker Str. 135', '74924', 'Neckarbischofsheim', '07263 / 9897503'),
(49, 'Herr', 'Vincent', 'Hofmeister', 'vincent.hofmeister@mail.xyz', NULL, 'Goebenstr. 174', '52064', 'Aachen', '0241 / 7547369'),
(50, 'Herr', 'Joachim', 'Jörg', 'j.joerg@mail.xyz', NULL, 'Oberschlesier Str. 65', '40225', 'Düsseldorf', '0211 / 85691147'),
(51, 'Frau', 'Zoe', 'Evers', 'zoe.evers@mail.xyz', NULL, 'Hogenbergstr. 21', '25821', 'Almdorf', '04671 / 51346184'),
(52, 'Herr', 'Erwin', 'Kaya', 'e.kaya@mail.xyz', NULL, 'Osthuesheide 16', '35452', 'Heuchelheim', '0641 / 95876101'),
(53, 'Frau', 'Gina', 'Weaver', 'g.weaver@mail.xyz', NULL, 'Bielefelder Str. 24a', '31558', 'Hagenburg', '05033 / 40937426'),
(54, 'Herr', 'Nik', 'Schäffler', 'n.schaeffler@mail.xyz', NULL, 'Im Haubenfeld 182', '55487', 'Sohrschied', '06763 / 48886591'),
(55, 'Frau', 'Lisa', 'Mössner', 'lisa.moessner@mail.xyz', '$2y$10$DOVtkbw19P4znuI7XkYob.b312TD2k/o85TUGsPNC9DYKN8nTmHjO', 'Sentmaringer Weg 33', '57518', 'Alsdorf', '02741 / 84218347'),
(56, 'Frau', 'Fabienne', 'Sohn', 'fabienne.sohn@mail.xyz', NULL, 'Telgenweg 136', '95180', 'Berg', '09293 / 8741660'),
(57, 'Herr', 'Paul', 'Schnell', 'paul.schnell@mail.xyz', NULL, 'Uhuweg 66', '61350', 'Bad Homburg vor der Höhe', '06172 / 27462606'),
(58, 'Herr', 'Gerhardt', 'Bayer', 'gerhardt.bayer@mail.xyz', NULL, 'Emdener Str. 177', '66500', 'Mauschbach', '06338 / 46411961'),
(59, 'Herr', 'Fynn', 'Lehnert', 'f.lehnert@mail.xyz', NULL, 'Sentmaringer Weg 21', '29416', 'Altensalzwedel', '03901 / 5443580'),
(60, 'Frau', 'Anne', 'Lindemann', 'a.lindemann@mail.xyz', NULL, 'Angelmodder Weg 25', '33602', 'Bielefeld', '0521 / 93879218'),
(61, 'Frau', 'Janin', 'Wiegand', 'j.wiegand@mail.xyz', NULL, 'Johann-Krane-Weg 89', '95145', 'Oberkotzau', '09286 / 69435960'),
(62, 'Frau', 'Kaja', 'Sachs', 'kaja.sachs@mail.xyz', NULL, 'Langestr. 90', '73240', 'Wendlingen am Neckar', '07024 / 72451139'),
(63, 'Herr', 'Jamie', 'Bartels', 'jamie.bartels@mail.xyz', NULL, 'Grevener Str. 151', '69190', 'Walldorf', '06227 / 6727663'),
(64, 'Frau', 'Liah', 'Röder', 'l.roeder@mail.xyz', NULL, 'Johann-Krane-Weg 105a', '44791', 'Bochum', '0234 / 65197519'),
(65, 'Herr', 'Frank', 'Techem', 'f.techem@mail.xyz', NULL, 'Zum Burgschemm 14', '21483', 'Lütau', '04153 / 2037311'),
(66, 'Frau', 'Yvonne', 'Lowe', 'yvonne.lowe@mail.xyz', NULL, 'Rincklakeweg 51', '86660', 'Tapfheim', '09070 / 85508188'),
(67, 'Frau', 'Sonja', 'Schultze', 'sonja.schultze@mail.xyz', NULL, 'Parkallee 7', '54668', 'Peffingen', '06525 / 49120019'),
(68, 'Frau', 'Sophie', 'Wassermann', 'sophie.wassermann@mail.xyz', NULL, 'Hofstr. 117', '65558', 'Langenscheid', '06432 / 78758341'),
(69, 'Frau', 'Malin', 'Haag', 'malin.haag@mail.xyz', NULL, 'Dortmunder Str. 167', '40789', 'Monheim am Rhein', '02173 / 72658066'),
(70, 'Frau', 'Hanna', 'Hagemann', 'hanna.hagemann@mail.xyz', NULL, 'Telgenweg 130', '94553', 'Mariaposching', '09906 / 37935026'),
(71, 'Herr', 'Bennett', 'Egger', 'bennett.egger@mail.xyz', NULL, 'Herdingstr. 162', '18276', 'Gutow', '03843 / 8422010'),
(72, 'Herr', 'Phillipp', 'Fauser', 'phillipp.fauser@mail.xyz', NULL, 'Enschedeweg 9', '86647', 'Buttenwiesen', '08274 / 24542901'),
(73, 'Herr', 'Jeremy', 'Kretschmann', 'j.kretschmann@mail.xyz', NULL, 'Kappenberger Damm 195', '87675', 'Rettenbach am Auerberg', '08349 / 70173578'),
(74, 'Frau', 'Emilie', 'Wagner', 'emilie.wagner@mail.xyz', NULL, 'Osthuesheide 53', '23749', 'Grube', '04364 / 50266347'),
(75, 'Herr', 'Bennet', 'Fleming', 'bennet.fleming@mail.xyz', NULL, 'Josef-Suwelack-Weg 31', '72294', 'Grömbach', '07453 / 37060730'),
(76, 'Frau', 'Lara', 'Richardson', 'l.richardson@mail.xyz', NULL, 'Lassallestr. 161', '21514', 'Göttin', '04547 / 78826022'),
(77, 'Herr', 'Lennox', 'Flowers', 'l.flowers@mail.xyz', NULL, 'Johanniterstr. 159', '55568', 'Abtweiler', '06753 / 85010642'),
(78, 'Frau', 'Alexa', 'Hill', 'a.hill@mail.xyz', NULL, 'Emdener Str. 194', '89613', 'Grundsheim', '07357 / 69493891'),
(79, 'Herr', 'Danny', 'Kunkel', 'd.kunkel@mail.xyz', NULL, 'Parkallee 29', '54673', 'Bauler', '06564 / 68900649'),
(80, 'Frau', 'Diana', 'Thies', 'd.thies@mail.xyz', NULL, 'Friedrichstr. 11', '72639', 'Neuffen', '07025 / 96111754'),
(81, 'Frau', 'Emmily', 'Merten', 'emmily.merten@mail.xyz', NULL, 'Wildpfad 184', '24241', 'Grevenkrug', '04322 / 74791494'),
(82, 'Herr', 'Matis', 'Gibbs', 'matis.gibbs@mail.xyz', NULL, 'Immelmannstr. 101', '67732', 'Hirschhorn', '06308 / 28310169'),
(83, 'Frau', 'Chantall', 'Röhrig', 'c.roehrig@mail.xyz', NULL, 'Sternstr. 120', '21483', 'Wangelau', '04153 / 21957837'),
(84, 'Herr', 'Felix', 'Reyes', 'f.reyes@mail.xyz', NULL, 'Olpener Str. 25', '42105', 'Wuppertal', '0202 / 61918001'),
(85, 'Herr', 'Klaus', 'Drake', 'klaus.drake@mail.xyz', NULL, 'Am Römerhof 38', '57520', 'Rosenheim', '02747 / 85838756'),
(86, 'Herr', 'Lorenz', 'Zell', 'l.zell@mail.xyz', NULL, 'Berrischstr. 131', '29643', 'Neuenkirchen', '05195 / 96024657'),
(87, 'Frau', 'Cornelia', 'Hofmann', 'c.hofmann@mail.xyz', NULL, 'Rüschhausweg 145', '71729', 'Erdmannhausen', '07144 / 31352009'),
(88, 'Herr', 'Timo', 'Butz', 'timo.butz@mail.xyz', NULL, 'Langeworth 19', '91580', 'Petersaurach', '09872 / 88856077'),
(89, 'Herr', 'Jan', 'Hack', 'j.hack@mail.xyz', NULL, 'Buldernweg 79', '56332', 'Burgen', '02607 / 66075235'),
(90, 'Herr', 'Andreas', 'Raür', 'a.rauer@mail.xyz', NULL, 'Drachterstr. 4', '19069', 'Klein Trebbow', '03867 / 9355543'),
(91, 'Frau', 'Edith', 'Reinhold', 'edith.reinhold@mail.xyz', NULL, 'Am Ziegelofen 147', '21710', 'Engelschoff', '04144 / 15398926'),
(92, 'Herr', 'Mirco', 'Fleck', 'mirco.fleck@mail.xyz', NULL, 'Mariendorfer Str. 9', '92447', 'Zangenstein', '09675 / 61055424'),
(93, 'Frau', 'Monika', 'Aust', 'monika.aust@mail.xyz', NULL, 'Baumberger Str. 67', '83550', 'Emmering', '08039 / 59053965'),
(94, 'Frau', 'Annabel', 'Scherer', 'a.scherer@mail.xyz', NULL, 'Goebenstr. 111a', '79689', 'Maulburg', '07622 / 59602989'),
(95, 'Frau', 'Anastasia', 'Schulte', 'anastasia.schulte@mail.xyz', NULL, 'Marktstr. 53a', '31717', 'Nordsehl', '05721 / 23400139'),
(96, 'Frau', 'Alina', 'Heilmann', 'alina.heilmann@mail.xyz', NULL, 'Ostmarkstr. 43', '67715', 'Geiselberg', '06307 / 18730741'),
(97, 'Frau', 'Julie', 'Nunez', 'j.nunez@mail.xyz', NULL, 'Langestr. 67', '56379', 'Obernhof', '02604 / 15287350'),
(98, 'Frau', 'Susanne', 'Eberhard', 's.eberhard@mail.xyz', NULL, 'Dingbängerweg 3', '24977', 'Langballig', '04636 / 32523336'),
(99, 'Herr', 'Tomas', 'Reiter', 'tomas.reiter@mail.xyz', NULL, 'Von-der-Tinnen-Str. 173', '55490', 'Mengerschied', '06761 / 17466430'),
(100, 'Herr', 'Levin', 'Löw', 'l.loew@mail.xyz', NULL, 'Am Ziegelofen 85', '52538', 'Selfkant', '02456 / 546434'),
(101, 'Herr', 'Tom', 'Brass', 't.brass@mail.xyz', NULL, 'Piusallee 139', '21379', 'Scharnebeck', '04136 / 99648717'),
(102, 'Frau', 'Joy', 'Sack', 'joy.sack@mail.xyz', NULL, 'Weserstr. 152', '92720', 'Schwarzenbach', '09644 / 28501984'),
(103, 'Frau', 'Carolin', 'Laumann', 'carolin.laumann@mail.xyz', NULL, 'Zum Burgschemm 132', '69434', 'Heddesbach', '06272 / 74370981'),
(104, 'Herr', 'Jonah', 'Rosenthal', 'j.rosenthal@mail.xyz', NULL, 'Dachsleite 40', '88605', 'Meßkirch', '07575 / 4941140'),
(105, 'Herr', 'Alexander', 'Zeller', 'alexander.zeller@mail.xyz', NULL, 'Stettiner Str. 127', '40489', 'Düsseldorf', '0211 / 15428543'),
(106, 'Frau', 'Sara', 'Bischoff', 'sara.bischoff@mail.xyz', NULL, 'Kreuzstr. 40', '71296', 'Heimsheim', '07033 / 99636387'),
(107, 'Frau', 'Annette', 'Engel', 'a.engel@mail.xyz', NULL, 'Hindenburgplatz 193', '21379', 'Rullstorf', '04136 / 12166606'),
(108, 'Herr', 'Ruben', 'Puls', 'r.puls@mail.xyz', NULL, 'Kerßenbrockstr. 128', '10557', 'Berlin', '030 / 62802489'),
(109, 'Herr', 'Leon', 'Karger', 'leon.karger@mail.xyz', NULL, 'Bohlweg 59', '66996', 'Hirschthal', '06391 / 4228781'),
(110, 'Herr', 'Jason', 'Herbst', 'j.herbst@mail.xyz', NULL, 'Hahnenstr. 155', '55595', 'Sponheim', '0671 / 53523220'),
(111, 'Herr', 'Quentin', 'Sautter', 'quentin.sautter@mail.xyz', NULL, 'Gropiusstr. 128', '67580', 'Hamm am Rhein', '06246 / 17989109'),
(112, 'Herr', 'Florian', 'Ellis', 'f.ellis@mail.xyz', NULL, 'Nieland 51', '60388', 'Frankfurt am Main', '069 / 16879782'),
(113, 'Herr', 'Henri', 'Wehner', 'h.wehner@mail.xyz', NULL, 'Eulenbergstr. 128', '83673', 'Bichl', '08857 / 91911543'),
(114, 'Herr', 'Theo', 'Bernhard', 't.bernhard@mail.xyz', NULL, 'Simon-Meister-Str. 41', '97450', 'Arnstein', '09363 / 94721936'),
(115, 'Herr', 'Bennett', 'Mathis', 'b.mathis@mail.xyz', NULL, 'An Lyskirchen 37', '82433', 'Bad Kohlgrub', '08845 / 540744'),
(116, 'Herr', 'Günther', 'Cummings', 'guenther.cummings@mail.xyz', NULL, 'Innsbruckweg 82', '97225', 'Zellingen', '09364 / 38385366'),
(117, 'Herr', 'Maurice', 'Seidl', 'm.seidl@mail.xyz', NULL, 'Handorfer Str. 101', '56754', 'Dünfus', '02672 / 58692880'),
(118, 'Herr', 'Matti', 'Price', 'm.price@mail.xyz', NULL, 'Janningsweg 109', '91617', 'Oberdachstetten', '09845 / 86985780'),
(119, 'Frau', 'Tanja', 'Krey', 't.krey@mail.xyz', NULL, 'Rosenplatz 168', '27243', 'Groß Ippener', '04224 / 63014084'),
(120, 'Frau', 'Alissa', 'Tekin', 'alissa.tekin@mail.xyz', NULL, 'Stolbergstr. 37', '94474', 'Vilshofen an der Donau', '08541 / 38431862'),
(121, 'Frau', 'Anouk', 'Pesch', 'anouk.pesch@mail.xyz', NULL, 'Mariendorfer Str. 130', '86919', 'Utting am Ammersee', '08806 / 95839156'),
(122, 'Frau', 'Inga', 'Herzig', 'i.herzig@mail.xyz', NULL, 'Klinkkampweg 44', '75177', 'Pforzheim', '07231 / 20758839'),
(123, 'Frau', 'Clara', 'Salomon', 'clara.salomon@mail.xyz', NULL, 'Schmittingheide 121', '92676', 'Speinshart', '09645 / 44512299'),
(124, 'Frau', 'Nelli', 'Peitz', 'n.peitz@mail.xyz', NULL, 'Carossastr. 19', '12587', 'Treptow-Köpenick', '030 / 26022061'),
(125, 'Frau', 'Irmgart', 'Dittmann', 'i.dittmann@mail.xyz', NULL, 'Goldregenweg 120', '21635', 'Jork', '04162 / 77039723'),
(126, 'Frau', 'Xenia', 'Wehrmann', 'x.wehrmann@mail.xyz', NULL, 'Goebenstr. 137', '56305', 'Puderbach', '02684 / 8060454'),
(127, 'Frau', 'Amelie', 'Jaschke', 'amelie.jaschke@mail.xyz', NULL, 'Wollinstr. 28', '27243', 'Beckeln', '04434 / 84816882'),
(128, 'Herr', 'Dominik', 'Halle', 'dominik.halle@mail.xyz', NULL, 'Piusstr. 167', '76831', 'Göcklingen', '06341 / 72127768'),
(129, 'Frau', 'Anna', 'Marr', 'anna@cbw.de', '$2y$10$.4BTHx0/BT70ru5.1j/Tr.I9s6cyvSPfQ2yjrhvLTGaBTlJP3gkWm', 'Musterstraße 22', '12347', 'Berlin', '030 / 123 456 789');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(6) NOT NULL,
  `customer_id` int(6) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `status`, `order_date`) VALUES
(1, 55, '1', '2017-01-03'),
(2, 2, '2', '2016-12-05'),
(11, 1, '1', '2017-01-03'),
(12, 1, '1', '2017-01-03'),
(13, 129, '1', '2017-01-03'),
(14, 129, '3', '2017-01-03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `order_id` int(6) DEFAULT NULL,
  `amount` int(6) DEFAULT NULL,
  `article_id` int(6) DEFAULT NULL,
  `article_price_net` decimal(6,2) DEFAULT NULL,
  `article_tax` int(6) DEFAULT NULL,
`id` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `positions`
--

INSERT INTO `positions` (`order_id`, `amount`, `article_id`, `article_price_net`, `article_tax`, `id`) VALUES
(1, 1, 6, 2262.18, 19, 1),
(1, 2, 8, 10.00, 19, 2),
(2, 2, 4, 74.79, 19, 3),
(11, 1, 7, 19.96, 7, 4),
(11, 2, 8, 11.90, 19, 5),
(11, 1, 2, 521.99, 19, 6),
(12, 1, 3, 217.65, 19, 7),
(12, 1, 7, 18.65, 7, 8),
(13, 1, 4, 74.79, 19, 9),
(14, 1, 7, 18.65, 7, 10);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `articlegroups`
--
ALTER TABLE `articlegroups`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `backendusers`
--
ALTER TABLE `backendusers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login_name` (`login_name`);

--
-- Indizes für die Tabelle `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `positions`
--
ALTER TABLE `positions`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `articlegroups`
--
ALTER TABLE `articlegroups`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `backendusers`
--
ALTER TABLE `backendusers`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT für Tabelle `positions`
--
ALTER TABLE `positions`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
