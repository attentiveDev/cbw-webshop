<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("_head.php");
?>
<form action="index.php?module=login&action=do" method="POST">
    <fieldset>
        <legend>Benutzeranmeldung</legend>
        <label for="loginName">Benutzername:</label>
        <input type="text" name="loginName" value="" required>
        <label for="loginPassword">Passwort:</label>
        <input type="password" name="loginPassword" value="" required>
        <input type="submit" name="submit" value="Anmelden">
    </fieldset>
</form>
<br>

<?php
include ("_footer.php");
?>