<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("_head.php");
?>
<a class="shop-button" href="index.php?module=article&action=list">Zurück zur Liste</a>
<br><br>
<form action="index.php?module=article&action=edit&id=<?php echo $article->getId(); ?>" method="POST">
    <fieldset>
        <legend>Artikel "<?php echo $article; ?>" bearbeiten</legend>
        <input type="hidden" name="id" value="<?php echo $article->getId(); ?>">

        <label for="name">Artikel:</label>
        <input type="text" name="name" value="<?php echo $article->getName(); ?>" required>

        <label for="articlegroupId">Artikelgruppe:</label>
        <select name="articlegroupId">
<?php foreach ($allArticleGroups as $articlegroup) { ?>
                <option value="<?php echo $articlegroup["id"]; ?>" <?php if ($articlegroup["id"] == $article->getArticlegroupId()) {
        echo "selected";
    } ?>><?php echo $articlegroup["groupname"]; ?></option>
            <?php } ?>
        </select>

        <label for="description">Beschreibung:</label>
        <textarea name="description" rows="10" cols="70"><?php echo $article->getDescription(); ?></textarea>

        <label for="priceNet">Preis Netto:</label>
        <input type="text" name="priceNet" value="<?php echo $article->getPriceNet(); ?>">

        <label for="tax">Mehrwertssteuer %:</label>
        <input type="text" name="tax" value="<?php echo $article->getTax(); ?>">

        <label for="imageUrl">Bildname(Datei):</label>
        <input type="text" name="imageUrl" value="<?php echo $article->getImageUrl(); ?>">

        <input type="submit" name="submit" value="Speichern">
    </fieldset>
</form>
<br>
<a class="shop-button" href="index.php?module=article&action=list">Zurück zur Liste</a>

<?php
include ("_footer.php");
?>