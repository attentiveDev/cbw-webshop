<?php
# view backendusersList.php

include ("_head.php");
?>
<table>
    <tr>
        <th><a href="index.php?module=backenduser&action=list&sort=id">#</a></th>
        <th><a href="index.php?module=backenduser&action=list&sort=login_name">Benutzername</a></th>
        <th><a href="index.php?module=backenduser&action=list&sort=firstname">Vorname</a></th>
        <th><a href="index.php?module=backenduser&action=list&sort=lastname">Nachname</a></th>
        <th></th>
    </tr>
    <?php foreach ($allBackendUsers as $user) { ?>
        <tr>
            <td><?php echo $user["id"]; ?></td>
            <td><?php echo $user["login_name"]; ?></td>
            <td><?php echo $user["firstname"]; ?></td>
            <td><?php echo $user["lastname"]; ?></td>
            <td><a class="shop-button" href="index.php?module=backenduser&action=edit&id=<?php echo $user["id"]; ?>">Bearbeiten</a></td>
        </tr>	
    <?php } ?>
</table>
<br>
<a class="shop-button" href="index.php?module=backenduser&action=edit">Neuer Benutzer</a>

<?php
include ("_footer.php");
?>