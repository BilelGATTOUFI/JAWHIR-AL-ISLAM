<section id="title" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1><?= $data["article"]->article_title ?></h1>


            </div>
            <div class="col-sm-3">
                <ul class="breadcrumb pull-right">
                    <?=categoryController::breadcrumb($data["article"]->article_category); ?>
                </ul>
            </div>

        </div>
    </div>
</section>
<div id="page">
<section class="container" dir="rtl">
    <div class="row">
        <div class="col-sm-9">
            <div class="blog">
                <div class="blog-item">
                    <div class="img-responsive img-blog" style="background:url('upload/files/<?=$data["article"]->article_picture?>') no-repeat; background-position:center; background-size: cover; <?=(empty($data["article"]->article_picture))?"display:none;":""?>" width="100%" alt=""/></div>

                    <div class="blog-content">
                        <h3><?= $data["article"]->article_title ?></h3>

                        <div class="entry-meta">
                            <span><i class="icon-user"></i> <a href="#"><?= $data["author"]->name ?></a></span>
                            <span><i class="icon-calendar"></i> <?= $data["article"]->article_date ?></span>
                        </div>
                        <hr>
                        <?= $data["article"]->article_texte ?>
                        <hr>

                        <div class="tags">
                            <i class="icon-tags"></i> الكلمات الشائعة
                            <?php
                            foreach ($data["tags"] as $tag) {
                                ?>
                                <a class="btn btn-xs btn-primary" href="#"><?= $tag->tag_label ?></a>
                            <?php } ?>
                        </div>

                        <p>&nbsp;</p>


                        <div class="author well">
                            <div class="media">
                                <div class="pull-left">
                                    <!--<img class="avatar img-thumbnail  img-circle" src="theme/front/img/team1.jpg" alt="" width="100">-->
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <strong><?= $data["author"]->name ?></strong>
                                        <p><?= $data["author"]->bio ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.author-->


                    </div>
                </div>
                <!--/.blog-item-->
            </div>
        </div>
        <div class="col-sm-3">
            <?php include("tpl_sidebar.inc.php");?>
        </div>
        <!--/.col-md-8-->
    </div>
    <!--/.row-->
</section>
</div>