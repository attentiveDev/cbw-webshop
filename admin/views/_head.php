<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $appTitle; ?></title>
        <link rel="stylesheet" href="../css/backend_style.css">
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/webshop.js"></script>
    </head>
    <body>
        <div id="main-div">
            <header>
                <h1>Webshop - Backend</h1>
            </header>
            <?php if (isset($_SESSION["backendUserVerified"]) && $_SESSION["backendUserVerified"] == true) { ?>
            <hr>
            <nav>
                <a class="shop-button" href="index.php?module=backenduser&action=list">Benutzer</a>
                <a class="shop-button" href="index.php?module=order&action=list">Bestellungen</a>
                <a class="shop-button" href="index.php?module=customer&action=list">Kunden</a>
                <a class="shop-button" href="index.php?module=article&action=list">Artikel</a>
                <a class="shop-button" href="index.php?module=articlegroup&action=list">Artikelgruppen</a>
                <a class="shop-button" href="index.php?module=login&action=exit">Abmeldung</a>
            </nav>
            <?php } ?>
            <hr>
            <h2><?php echo $appTitle; ?></h2>