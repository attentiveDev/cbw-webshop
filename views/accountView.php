<?php
# view articleWelcome.php

include ("_head.php");
?>
<div class="row">
    <div class="nine columns">
        <h4>Mein Account</h4>
        <h5>Meine Daten</h5>
        <table class="hiddentable">
            <tr class="hiddentable">
                <td class="hiddentable"><strong>Anrede: </strong></td>
                <td class="hiddentable"><?php echo htmlentities($customer->getSalutation()); ?></td>
            </tr>
            <tr class="hiddentable">
                <td class="hiddentable"><strong>Vorname: </strong></td>
                <td class="hiddentable"><?php echo htmlentities($customer->getFirstname()); ?></td>
            </tr>
            <tr class="hiddentable">
                <td class="hiddentable"><strong>Nachname: </strong></td>
                <td class="hiddentable"><?php echo htmlentities($customer->getLastname()); ?></td>
            </tr>
            <tr class="hiddentable">
                <td class="hiddentable"><strong>Adresse: </strong></td>
                <td class="hiddentable"><?php echo htmlentities($customer->getAddress()); ?></td>
            </tr>
            <tr class="hiddentable">
                <td class="hiddentable"><strong>Ort: </strong></td>
                <td class="hiddentable"><?php echo htmlentities($customer->getZipcode()) . ' ' . htmlentities($customer->getCity()); ?></td>
            </tr>
            <tr class="hiddentable">
                <td class="hiddentable"><strong>Telefon: </strong></td>
                <td class="hiddentable"><?php echo htmlentities($customer->getPhone()); ?></td>
            </tr>
            <tr class="hiddentable">
                <td class="hiddentable"><strong>E-Mail: </strong></td>
                <td class="hiddentable"><?php echo htmlentities($customer->getEmail()); ?></td>
            </tr> 
        </table>
        <br>
        <h5>Meine Bestellungen</h5>
        <table class="hiddentable" style="width: 100%">
            <?php
            $currentOrderId = -1;
            foreach ($orders as $order) {
                if ($order['order_id'] != $currentOrderId) {
                    $currentOrderId = $order['order_id'];
                    $date = new DateTime($order['order_date'])
                    ?>
                    <tr>
                        <th class="hiddentable" colspan="2">Bestellung vom <?php echo $date->format('d.m.Y'); ?></th>
                        <th class="hiddentable">Einzelpreis</th>
                        <th class="hiddentable">Summe</th>
                        <th class="hiddentable">Status</th>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="hiddentable"><?php echo $order['amount'] . ' x'; ?></td>
                    <td class="hiddentable"><?php echo $order['name']; ?></td>
                    <td class="hiddentable" style="text-align: right;"><?php echo number_format($order['article_price_net'] + $order['article_price_net'] / 100 * $order['article_tax'], 2, ',', '.') . ' EUR'; ?></td>
                    <td class="hiddentable" style="text-align: right;"><?php echo number_format(($order['article_price_net'] + $order['article_price_net'] / 100 * $order['article_tax']) * $order['amount'], 2, ',', '.') . ' EUR'; ?></td>
                    <td class="hiddentable"><?php echo Order::status2String($order['status']); ?></td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <h5>Sonstiges</h5>
        <p>Sie sind ein guter Kunde und jedes Anliegen ist uns wichtig.</p>
        <br>
        <a class="button" href="index.php?module=login&action=exit">Abmelden</a>
    </div>
    <div class="three columns" id="webshop-basket"></div>
</div>
<p>&nbsp;</p>
<script>
    $(document).ready(function () {
        $("#webshop-basket").load("index.php?module=basket&action=view");
    });
</script>
<?php include ("_footer.php"); ?>