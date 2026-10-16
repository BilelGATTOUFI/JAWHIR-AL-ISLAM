<section id="title" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1><?=___("Recherche");?></h1>


            </div>
            <div class="col-sm-3">

            </div>

        </div>
    </div>
</section>
<div id="page">
    <div class="container" dir="rtl">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-9 ">
                <div class="blog">
                    <div class="blog-item">


                        <div class="blog-content">

                            <?php
                            foreach ($data["result"]["articles"] as $article) {
                            ?>
                            <div>
                                <div class="img-responsive img-blog-listing"
                                     style="background:url('upload/files/<?= $article->article_picture ?>') no-repeat; background-size: cover; <?= (empty($article->article_picture)) ? "display:none;" : "" ?>"
                                     width="100%" alt=""/>
                            </div>
                            <h3><a href="<?= articleController::link($article->article_title, $article->article_id) ?>"><?= $article->article_title ?></a></h3>

                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <a href="#"><?= $article->author ?></a></span>
                                <span><i class="icon-folder-close"></i> <a href="#"><?= $article->category ?></a></span>
                                <span><i class="icon-calendar"></i><?= $article->date ?></span>
                            </div>
                            <p><?= myTruncate($article->article_texte, 800) ?></p>
                            <a class="btn btn-primary btn-xs listing"
                               href="<?= articleController::link($article->article_title, $article->article_id) ?>">إقرأ المزيد <span class="glyphicon glyphicon-chevron-left"></span></a>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3" dir="rtl">
            <?php include("modules/front/tpl_sidebar.inc.php"); ?>
        </div>
    </div>
</div>
</div>