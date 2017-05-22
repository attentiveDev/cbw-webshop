<?php
# view articleList.php

include ("_head.php");
?>
<div class="row">
    <div class="nine columns">
        <h4><?php echo $group->getGroupname(); ?></h4>
        <p><?php echo nl2br($group->getDescription()); ?></p>
    </div>
    <div class="three columns" id="webshop-basket"></div>
</div>

<?php foreach ($articles as $article) { ?>
    <hr>
    <div class="row">
        <div class="three columns">
            <a href="img/<?php echo $article["image_url"]; ?>" data-lightbox="image-<?php echo $article["id"]; ?>" data-title="<?php echo $article["name"] ?>">
                <img class="shop-picture" src="img/<?php echo $article["image_url"]; ?>" alt="Kein Bild vorhanden">
            </a>
        </div>
        <div class="nine columns">
            <h5><?php echo $article["name"] ?></h5>
            <p><?php echo $article["description"] ?></p>
            <p class="shop-price">Preis: <?php echo number_format($article["price_gross"], 2,',', '.'); ?> EUR</p>
            <button class="button-primary" onclick="$('#webshop-basket').load('index.php?module=basket&action=add&id=<?php echo $article['id']; ?>');$('html, body').animate({scrollTop:0}, 'slow');">Zum Warenkorb hinzufügen</button>
        </div>
    </div>
<?php } ?>
<p>&nbsp;</p>
<script>
    $(document).ready(function () {
        $("#webshop-basket").load("index.php?module=basket&action=view");
    });
</script>
<script src="js/lightbox.js"></script>
<?php
include ("_footer.php");
?>
