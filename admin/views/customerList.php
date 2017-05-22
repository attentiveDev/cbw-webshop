<?php
# view customerList.php

include ("_head.php");
?>
<table>
    <tr>
        <th><a href="index.php?module=customer&action=list&sort=id">#</a></th>
        <th><a href="index.php?module=customer&action=list&sort=salutation">Anrede</a></th>
        <th><a href="index.php?module=customer&action=list&sort=firstname">Vorname</a></th>
        <th><a href="index.php?module=customer&action=list&sort=lastname">Nachname</a></th>
        <th><a href="index.php?module=customer&action=list&sort=email">E-Mail</a></th>
        <th><a href="index.php?module=customer&action=list&sort=zipcode">Postleitzahl</a></th>
        <th><a href="index.php?module=customer&action=list&sort=city">Stadt</a></th>
        <th></th>
    </tr>
    <?php foreach ($allCustomers as $customer) { ?>
        <tr>
            <td><?php echo $customer["id"]; ?></td>
            <td><?php echo $customer["salutation"]; ?></td>
            <td><?php echo $customer["firstname"]; ?></td>
            <td><?php echo $customer["lastname"]; ?></td>
            <td><?php echo $customer["email"]; ?></td>
            <td><?php echo $customer["zipcode"]; ?></td>
            <td><?php echo $customer["city"]; ?></td>
            <td><a class="shop-button" href="index.php?module=customer&action=edit&id=<?php echo $customer["id"]; ?>">Bearbeiten</a></td>
        </tr>	
    <?php } ?>
</table>
<br>
<a class="shop-button" href="index.php?module=customer&action=edit">Neuer Kunde</a>

<?php
include ("_footer.php");
?>