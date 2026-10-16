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
            <form role="form" class="form-horizontal style-form" method="post" action="ajax.php" id="ajaxform">
                <?php foreach ($data["forms"] as $element) {
                    echo $element;
                } ?>
                <?php
                if(!empty($data["buttons"])){
                    foreach($data["buttons"] as $button){
                        echo $button;
                    }
                }else{
                ?>
                <?php } ?>
            </form>
        </div>
    </div>
</div>