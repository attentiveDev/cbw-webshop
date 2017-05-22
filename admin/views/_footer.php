<footer>
    <hr>
    <p>Copyright &copy;<span id="currentyear"></span> Sven Sonntag für das CBW Collage Berufliche Weiterbildung</p>
</footer>
<?php
if ($config["debug"]) {
    ?>
    <div class="debug">
        <pre>REQUEST: <?php var_dump($_REQUEST); ?></pre>
        <hr>
        <pre>SESSION: <?php var_dump($_SESSION); ?></pre>
    </div>
<?php } ?>
</div>
</body>
</html>