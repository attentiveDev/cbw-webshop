<?php
# view articlegroupList.php

include ("_head.php");
?>
<table>
    <tr>
        <th><a href="index.php?module=articlegroup&action=list&sort=id">#</a></th>
        <th><a href="index.php?module=articlegroup&action=list&sort=groupname">Artikelgruppe</a></th>
        <th><a href="index.php?module=articlegroup&action=list&sort=description">Beschreibung</a></th>
        <th></th>
    </tr>
    <?php foreach ($allArticlegroups as $articlegroup) { ?>
        <tr>
            <td><?php echo $articlegroup["id"]; ?></td>
            <td><?php echo $articlegroup["groupname"]; ?></td>
            <td><?php echo getShortText($articlegroup["description"]); ?></td>
            <td><a class="shop-button" href="index.php?module=articlegroup&action=edit&id=<?php echo $articlegroup["id"]; ?>">Bearbeiten</a></td>
        </tr>	
    <?php } ?>
</table>
<br>
<a class="shop-button" href="index.php?module=articlegroup&action=edit">Neue Artikelgruppe</a>

<?php
include ("_footer.php");
?>