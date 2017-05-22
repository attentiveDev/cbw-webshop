<?php

# view articleWelcome.php

include ("_head.php");
?>
<div class="row">
    <div class="nine columns">
        <h4>Wilkommen beim Radler</h4>
        <p>
            Es freut mich das Du diesen Shop entdeckt hast.<br>
            Bedenke bitte das es sich hier nur um eine Projektarbeit einer PHP OOP Entwicklung handelt 
            und keine Artikel bestellt werden können!<br><br>
            Sollten hier Fehlermeldungen auftauchen lies bitte die 
            <a href="documentation.html" target="_blank">Dokumentation</a>.
        </p>
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