<div class="row">
    <footer>
        Copyright <span id="currentyear"></span> by Sven Sonntag
        (<a href="https://www.solution-developer.de" target="_blank">www.solution-developer.de</a>) || 
        <a href="documentation.html" target="_blank">Dokumentation</a> || 
        <a href="admin/index.php" target="_blank">zum Backend</a>
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
</div>
</body>
</html>
