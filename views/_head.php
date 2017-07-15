<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title><?php echo $appTitle; ?> - derRADLER</title>
        <meta name="description" content="">
        <meta name="author" content="Sven Sonntag">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/webshop.js"></script>
        <link rel="stylesheet" href="css/font.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/lightbox.css">
        <link rel="icon" type="image/png" href="images/favicon.png">
    </head>
    <body>
        <div class="container">
            <div class="row" id="div-head">
                <header>
                    <img src="img/shoplogo.gif" alt="Store Logo Bike">
                    <h1>derRadler - Yet Another Bicycle Store!</h1>
                </header>
            </div>
            <div class="row">
                <nav>
                    <ul>
                        <?php foreach ($navItems as $navItem) { ?>
                        <li><a href="<?php echo $navItem['url']; ?>"><?php echo $navItem['name']; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            <div class="row">
                <h6 style="text-align: center; color: red;"><strong>Achtung: Es handelt sich hier um eine Demonstration eines Webshops. Es sind keine Käufe möglich!</strong></h4>
            </div>