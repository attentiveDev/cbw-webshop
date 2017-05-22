<?php
# view articleList.php

include ("_head.php");
?>
<table>
    <tr>
        <th><a href="index.php?module=article&action=list&sort=id">#</a></th>
        <th><a href="index.php?module=article&action=list&sort=articlegroup_name">Artikelgruppe</a></th>
        <th><a href="index.php?module=article&action=list&sort=name">Artikel</a></th>
        <th><a href="index.php?module=article&action=list&sort=price_gross">Preis Brutto</a></th>
        <th><a href="index.php?module=article&action=list&sort=image_url">Bild</a></th>
        <th><a href="index.php?module=article&action=list&sort=description">Beschreibung</a></th>
        <th></th>
    </tr>
    <?php foreach ($allArticles as $article) { ?>
        <tr>
            <td><?php echo $article["id"]; ?></td>
            <td><?php echo $article["articlegroup_name"]; ?></td>
            <td><?php echo $article["name"]; ?></td>
            <td class="shop-eur"><?php echo $article["price_gross"]; ?> &euro;</td>
            <td><img class="shop-picture-small" src="../img/<?php echo $article["image_url"]; ?>" alt="Kein Bild vorhanden"></td>
            <td><?php echo getShortText($article["description"]); ?></td>
            <td><a class="shop-button" href="index.php?module=article&action=edit&id=<?php echo $article["id"]; ?>">Bearbeiten</a></td>
        </tr>	
    <?php } ?>
</table>
<br>
<a class="shop-button" href="index.php?module=article&action=edit">Neuer Artikel</a>

<?php
include ("_footer.php");
?>