<?php
if(!defined("CALLER"))
    die("oops! Something went wrong !");
?>
<!DOCTYPE html>
<html lang="fr">
<!-- start: HEAD -->
<?php include("head.inc.php"); ?>
<!-- end: HEAD -->
<body>
<div id="app">
    <!-- sidebar -->
    <?php include("sidebar.inc.php"); ?>
    <!-- / sidebar -->
    <div class="app-content">
        <!-- start: TOP NAVBAR -->
        <?php include("topnav.inc.php"); ?>
        <!-- end: TOP NAVBAR -->
        <div class="main-content">
            <div class="wrap-content container" id="container">
                <?= $content ?>
            </div>
        </div>
    </div>
    <!-- start: FOOTER -->
    <?php include("footer.inc.php"); ?>
    <!-- end: FOOTER -->
</div>
<?php include("js.inc.php"); ?>
</body>
</html>
