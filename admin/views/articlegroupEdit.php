<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("_head.php");
?>
<a class="shop-button" href="index.php?module=articlegroup&action=list">Zurück zur Liste</a>
<br><br>
<form action="index.php?module=articlegroup&action=edit&id=<?php echo $articlegroup->getId(); ?>" method="POST">
    <fieldset>
        <legend>Artikelgruppe "<?php echo $articlegroup; ?>" bearbeiten</legend>
        <input type="hidden" name="id" value="<?php echo $articlegroup->getId(); ?>">
        <label for="groupname">Artikelgruppe:</label>
        <input type="text" name="groupname" value="<?php echo $articlegroup->getGroupname(); ?>" required>
        <label for="description">Beschreibung:</label>
        <textarea name="description" rows="10" cols="70"><?php echo $articlegroup->getDescription(); ?></textarea>
        <input type="submit" name="submit" value="Speichern">
    </fieldset>
</form>
<br>
<a class="shop-button" href="index.php?module=articlegroup&action=list">Zurück zur Liste</a>

<?php
include ("_footer.php");
?>