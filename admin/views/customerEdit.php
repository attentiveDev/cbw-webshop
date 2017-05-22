<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include ("_head.php");
?>
<a class="shop-button" href="index.php?module=customer&action=list">Zurück zur Liste</a>
<br><br>
<form action="index.php?module=customer&action=edit&id=<?php echo $customer->getId(); ?>" method="POST">
    <fieldset>
        <legend>Kunde "<?php echo $customer; ?>" bearbeiten</legend>
        <input type="hidden" name="id" value="<?php echo $customer->getId(); ?>">

        <label for="salutation">Anrede:</label>
        <select name="salutation">
            <option value="Frau" <?php if ($customer->getSalutation() == "Frau") {
    echo "selected";
} ?>>Frau</option>
            <option value="Herr" <?php if ($customer->getSalutation() == "Herr") {
    echo "selected";
} ?>>Herr</option>
            <option value="Famillie" <?php if ($customer->getSalutation() == "Famillie") {
    echo "selected";
} ?>>Famillie</option>
        </select>

        <label for="firstname">Vorname:</label>
        <input type="text" name="firstname" value="<?php echo $customer->getFirstname(); ?>">

        <label for="lastname">Nachname:</label>
        <input type="text" name="lastname" value="<?php echo $customer->getLastname(); ?>">

        <label for="address">Adresse:</label>
        <input type="text" name="address" value="<?php echo $customer->getAddress(); ?>">

        <label for="zipcode">Postleitzahl:</label>
        <input type="text" name="zipcode" value="<?php echo $customer->getZipcode(); ?>">

        <label for="city">Stadt:</label>
        <input type="text" name="city" value="<?php echo $customer->getCity(); ?>">

        <label for="phone">Telefon:</label>
        <input type="text" name="phone" value="<?php echo $customer->getPhone(); ?>">

        <label for="email">E-Mail Adresse (Login):</label>
        <input type="email" name="email" value="<?php echo $customer->getEmail(); ?>" required>

        <label for="password">Passwort:</label>
        <input type="password" name="password" value="<?php echo $customer->getPassword(); ?>" required>

        <input type="submit" name="submit" value="Speichern">
    </fieldset>
</form>
<br>
<a class="shop-button" href="index.php?module=customer&action=list">Zurück zur Liste</a>

<?php
include ("_footer.php");
?>