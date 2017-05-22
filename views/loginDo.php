<?php
# view articleWelcome.php

include ("_head.php");
?>
<div class="row">
    <div class="nine columns">
        <h4>Anmeldung</h4>
        <p>Melden Sie Sich hier mit Ihren Benutzerdaten an:<br><br></p>
        <form action="index.php?module=login&action=do" method="POST">
            <label for="loginName">Benutzername:</label>
            <input class="u-full-width" type="text" name="loginName" value="" required>
            <label for="loginPassword">Passwort:</label>
            <input class="u-full-width" type="password" name="loginPassword" value="" required>
            <br>
            <input type="submit" name="submit" value="Anmelden">
        </form>
    </div>
    <div class="three columns" id="webshop-basket"></div>
</div>
<p>&nbsp;</p>
<script>
    $(document).ready(function () {
        $("#webshop-basket").load("index.php?module=basket&action=view");
    });
</script>
<?php
include ("_footer.php");
?>