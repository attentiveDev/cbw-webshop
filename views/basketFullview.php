<?php
# view basketFullview.php

include ("_head.php");
?>

<div class="row">
    <div class="twelve columns">
        <h4>Ihr Warenkorb</h4>
        <?php
        if ($basket) {
            foreach ($basket as $position) {
                ?>
                <p>
                    <?php echo $position['amount'] . " x " . $position['articleName']; ?>
                </p>
                <p class="shop-price">
                    <?php echo number_format($position['articlePrice'] * $position['amount'], 2, ',', '.') ?> EUR
                </p>
            <?php } ?>
            <br>
            <p class="shop-price">Summe: <?php echo number_format($priceSum, 2, ',', '.') ?> EUR</p>
            <br>
            <?php if (isVerifiedCustomer()) { ?>
                <p>Mit der Bestellung akzeptieren Sie unsere nicht vorhandenen AGB´s...</p>
                <br>
                <div style="text-align: right;">
                    <a class="button button-primary" href="index.php?module=basket&action=order">Jetzt kostenpflichtig bestellen</a>
                </div>
            <?php } else { ?>
                <p>Um Artikel zu Bestellen müssen Sie angemeldet sein.</p>
                <br>
            <?php } ?>
        <?php } else { ?>
            Ihr Warenkorb ist leer
        <?php } ?>
    </div>
</div>

<?php include ("_footer.php"); ?>