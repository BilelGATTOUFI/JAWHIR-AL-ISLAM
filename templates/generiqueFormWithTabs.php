<!-- start: PAGE TITLE -->
<section id="page-title">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h1 class="mainTitle"><?=$data["title"]?></h1>
        </div>
        <div class="col-sm-4 col-xs-12 ">
        </div>
    </div>
</section>
<!-- end: PAGE TITLE -->
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div id="alertDiv"></div>
            <form role="form" class="form-horizontal style-form" method="post" action="ajax.php" id="ajaxform">
            <div class="table-responsive tabbable">
                <ul id="myTab1" class="nav nav-tabs">
                    <?php foreach ($data["tabs"]->tabs as $tab) { ?>
                    <li class="<?=($tab["active"] ? "active" : "");?> <?=($tab["style"] ? $tab["style"] : "");?>">
                        <a   style="color:black; font-weight: bold;" aria-expanded="true" href="#tab-<?=$tab["id"]?>" data-toggle="tab">
                            <?=$tab["label"]?>
                        </a>
                    </li>
                    <?php }?>

                </ul>
                <div class="tab-content">
                    <?php foreach ($data["tabs"]->tabs as $tab) { ?>
                    <div class="tab-pane fade <?=($tab["active"] ? "active in" : "");?>" id="tab-<?=$tab["id"]?>">
                        <?php
                        foreach ($tab["forms"] as $element) {
                            echo $element;
                        } ?>
                    </div>
                    <?php }?>
                </div>




            </div>
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