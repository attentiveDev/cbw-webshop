<?php
# view orderList.php

include ("_head.php");
?>
<table>
    <tr>
        <th><a href="index.php?module=order&action=list&sort=id">#</a></th>
        <th><a href="index.php?module=order&action=list&sort=order_date">Bestelldatum</a></th>
        <th><a href="index.php?module=order&action=list&sort=customer_id">Kunde</a></th>
        <th><a href="index.php?module=order&action=list&sort=salutation">Anrede</a></th>
        <th><a href="index.php?module=order&action=list&sort=firstname">Vorname</a></th>
        <th><a href="index.php?module=order&action=list&sort=lastname">Nachname</a></th>
        <th><a href="index.php?module=order&action=list&sort=status">Status</a></th>
        <th></th>
    </tr>
    <?php foreach ($allOrders as $order) { ?>
        <tr>
            <td><?php echo $order["id"]; ?></td>
            <td><?php echo $order["order_date"]; ?></td>
            <td><?php echo $order["customer_id"]; ?></td>
            <td><?php echo $order["salutation"]; ?></td>
            <td><?php echo $order["firstname"]; ?></td>
            <td><?php echo $order["lastname"]; ?></td>
            <td><?php echo Order::status2String($order["status"]); ?></td>
            <td><a class="shop-button" href="index.php?module=order&action=edit&id=<?php echo $order["id"]; ?>">Bearbeiten</a></td>
        </tr>	
    <?php } ?>
</table>
<br>

<?php
include ("_footer.php");
?>