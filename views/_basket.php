<?php ?>

<h4>Warenkorb</h4>
<?php
if ($basket) {
    foreach ($basket as $position) {
        ?>
        <p>
        <?php echo $position['amount'] . " x " . $position['articleName']; ?>
        </p>
        <p class="shop-del-icon">
            <a onclick="$('#webshop-basket').load('index.php?module=basket&action=delete&id=<?php echo $position['articleId'] ?>');" href="#">löschen</a>
        </p>
        <p class="shop-price">
        <?php echo number_format($position['articlePrice'] * $position['amount'], 2,',', '.') ?> EUR
        </p>
    <?php } ?>
    <br>

    <p class="shop-price">Summe: <?php echo number_format($priceSum, 2, ',', '.') ?> EUR</p>
    <br>
    <a class="button button-primary" href="index.php?module=basket&action=fullview">Bestellen</a>
    <button
        class="button" onclick="$('#webshop-basket').load('index.php?module=basket&action=reset');">Warenkorb löschen</button>
<?php } else { ?>
    Ihr Warenkorb ist leer
<?php } ?>
<script>
    // and the big question is: How to get the data back in the session???
    localStorage.myWebshopBasket = '<?php echo $basketJson; ?>';
</script>
