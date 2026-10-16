<!-- start: PAGE TITLE -->
<section id="page-title">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h1 class="mainTitle"><?=$data["title"]?></h1>
        </div>
        <div class="col-sm-4 col-xs-12 ">
            <a class="btn btn-wide btn-primary col-sm-pull-0" href="?module=<?=$data["module"];?>&view=insert"><i class="fa fa-plus"></i> Nouveau</a>
        </div>
    </div>
</section>
<!-- end: PAGE TITLE -->
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive tabbable">
                <ul id="myTab1" class="nav nav-tabs">
                    <?php foreach ($data["tabs"]->tabs as $tab) { ?>
                    <li class="<?=($tab["active"] ? "active" : "");?>">
                        <a aria-expanded="true" href="#tab-<?=$tab["id"]?>" data-toggle="tab">
                            <?=$tab["label"]?>
                        </a>
                    </li>
                    <?php }?>

                </ul>
                <div class="tab-content">
                    <?php foreach ($data["tabs"]->tabs as $tab) { ?>
                    <div class="tab-pane fade <?=($tab["active"] ? "active in" : "");?>" id="tab-<?=$tab["id"]?>">
                        <table class="table v-middle  table-hover                                                                                                                                                                                                                                                                                                                                                                                                                                   ">
                            <thead>
                            <tr>
                                <?php foreach ($tab["content"]->header as $header) { ?>
                                    <th><?= $header ?></th><?php } ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($tab["content"]->data)) {
                                foreach ($tab["content"]->data as $row) { ?>
                                    <tr>
                                        <?php foreach ($row as $column) { ?>
                                            <td><?= $column ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php }?>
                </div>




            </div>
        </div>
    </div>
</div>