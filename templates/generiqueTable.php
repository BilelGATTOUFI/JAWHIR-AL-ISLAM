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
                <table class="table v-middle  table-hover ">
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
            </div>
        </div>
    </div>
</div>