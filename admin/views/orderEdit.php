<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("_head.php");
?>
<a class="shop-button" href="index.php?module=order&action=list">Zurück zur Liste</a>
<br><br>
<form action="index.php?module=order&action=edit&id=<?php echo $order->getId(); ?>" method="POST">
    <fieldset>
        <legend>Bestellung "<?php echo $order; ?>" bearbeiten</legend>
        <input type="hidden" name="id" value="<?php echo $order->getId(); ?>">
        
        <label for="orderDate">Bestelldatum:</label>
        <input type="text" name="orderDate" value="<?php echo $order->getOrderDate(); ?>" required>

        <label for="customerId">Kunden ID:</label>
        <input type="text" name="customerId" value="<?php echo $order->getCustomerId(); ?>" required>

        <label for="salutation">Anrede:</label>
        <input type="text" name="salutation" value="<?php echo $order->getSalutation(); ?>" disabled>

        <label for="firstname">Vorname:</label>
        <input type="text" name="firstname" value="<?php echo $order->getFirstname(); ?>" disabled>

        <label for="lastname">Nachname:</label>
        <input type="text" name="lastname" value="<?php echo $order->getLastname(); ?>" disabled>

        <label for="status">Status:</label>

        <select name="status">
            <?php foreach (Order::getStatusList() as $key => $value) { ?>
                <option value="<?php echo $key; ?>" <?php
                if ($key == $order->getStatus()) {
                    echo "selected";
                }
                ?>><?php echo $value; ?></option>
                    <?php } ?>
        </select>



        <input type="submit" name="submit" value="Speichern">
    </fieldset>
    <fieldset>
        <legend>Warenkorb:</legend>
        <table>
            <tr>
                <th>#</th>
                <th>Anzahl</th>
                <th>Artikel</th>
                <th>Summe Brutto</th>
                <th>Bild</th>
            </tr>
            <?php foreach ($orderpositions as $article) { ?>
                <tr>
                    <td><?php echo $article["id"]; ?></td>
                    <td><?php echo $article["amount"]; ?></td>
                    <td><?php echo $article["name"]; ?></td>
                    <td class="shop-eur"><?php echo $article["price_gross"]; ?> &euro;</td>
                    <td><img class="shop-picture-small" src="../img/<?php echo $article["image_url"]; ?>" alt="Kein Bild vorhanden"></td>
                </tr>	
            <?php } ?>
        </table>
        <br>
        <label for="sumTotalGross">Summe Brutto:</label>
        <input type="text" name="sumTotalGross" value="<?php echo $orderPriceTotal[0]["price_sum_gross"]; ?>" disabled>
    </fieldset>

</form>
<br>
<a class="shop-button" href="index.php?module=order&action=list">Zurück zur Liste</a>

<?php
include ("_footer.php");
?>