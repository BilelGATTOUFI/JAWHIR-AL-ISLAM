<!-- start: PAGE TITLE -->
<section id="page-title">
    <div class="row">
        <div class="col-sm-8">
            <h1 class="mainTitle"><?= $data["title"] ?></h1>
        </div>
    </div>
</section>
<!-- end: PAGE TITLE -->
<div class="container-fluid container-fullw bg-white">
    <div class="row mt">
        <div class="col-lg-12">
            <div id="alertDiv"></div>
            <p>Etes vous sûr de vouloir supprimer cet élément ?</p>
            <form role="form" class="form-horizontal style-form" method="post" action="ajax.php" id="ajaxform">
                <?php foreach ($data["forms"] as $element) {
                    echo $element;
                } ?>
                <input type="submit" value="Supprimer" class="btn btn-red" name="btn-delete">
                <a href="?module=<?=$data["module"]?>&view=table" class="btn btn-o btn-blue pull-right">Annuler</a>
            </form>
        </div>
    </div>
</div>