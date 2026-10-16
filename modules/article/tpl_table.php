<!-- start: PAGE TITLE -->
<section id="page-title">
    <div class="row">
        <div class="col-sm-8 col-xs-12">
            <h1 class="mainTitle"><?=$data["title"]?></h1>
        </div>
        <div class="col-sm-4 col-xs-12 ">
            <a class="btn btn-wide btn-primary col-sm-pull-0" href="?module=<?=$data["module"];?>&action=insert"><i class="fa fa-plus"></i> Nouveau</a>
        </div>
    </div>
</section>
<!-- end: PAGE TITLE -->
<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="table_id" class="table v-middle  table-hover ">
                    <thead>
                    <tr>
                        <?php foreach ($data["table"]->header as $header) { ?>
                            <th><?= $header ?></th><?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($data["table"]->data)) {
                        foreach ($data["table"]->data as $row) { ?>
                            <tr>
                                <?php foreach ($row as $column) { ?>
                                    <td><?= $column ?></td>
                                <?php } ?>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>

                <?php if($data["pagination"]["number_pages"]){?>

                    <div class="pages">

                        <ul class="pagination">
                            <li>
                                <a href="?module=article&action=table&offset=<?= $data["pagination"]["previous"] ?>">&laquo;</a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $data["pagination"]["number_pages"]; $i++) {
                                ?>
                                <li<?= ($i == $data["pagination"]["current"]) ? " class='active'" : '' ?>>
									<a href="?module=article&action=table&offset=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php } ?>

                            <li>
                                <a href="?module=article&action=table&offset=<?= $data["pagination"]["next"] ?>">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>


            </div>
        </div>
    </div>
</div>
