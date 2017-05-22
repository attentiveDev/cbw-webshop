<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("_head.php");
?>
<a class="shop-button" href="index.php?module=backenduser&action=list">Zurück zur Liste</a>
<br><br>
<form action="index.php?module=backenduser&action=edit&id=<?php echo $user->getId(); ?>" method="POST">
    <fieldset>
        <legend>Benutzer "<?php echo $user; ?>" bearbeiten</legend>
        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>">
        <label for="loginName">Benutzername:</label>
        <input type="text" name="loginName" value="<?php echo $user->getLoginName(); ?>" required>
        <label for="loginPassword">Passwort:</label>
        <input type="password" name="loginPassword" value="<?php echo $user->getLoginPassword(); ?>" required>
        <label for="firstname">Vorname:</label>
        <input type="text" name="firstname" value="<?php echo $user->getFirstname(); ?>">
        <label for="lastname">Nachname:</label>
        <input type="text" name="lastname" value="<?php echo $user->getLastname(); ?>">
        <input type="submit" name="submit" value="Speichern">
    </fieldset>
</form>
<br>
<a class="shop-button" href="index.php?module=backenduser&action=list">Zurück zur Liste</a>

<?php
include ("_footer.php");
?>