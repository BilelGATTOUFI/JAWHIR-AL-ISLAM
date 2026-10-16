<?php
if (!defined("CALLER"))
    die("oops! Something went wrong !");
?>
<!DOCTYPE html>
<html lang="ar">
<?php include("head.inc.php"); ?>

<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-28034519-4', 'auto');
    ga('send', 'pageview');

</script>
<?php include("topnav.inc.php"); ?>

    <?= $content ?>

<?php include("footer.inc.php"); ?>
<?php include("js.inc.php"); ?>
</body>
</html>
