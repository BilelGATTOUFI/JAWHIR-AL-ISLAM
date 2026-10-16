<section id="title" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>المكتبة المرئية</h1>
            </div>
            <div class="col-sm-3">

            </div>

        </div>
    </div>
</section>
<div id="page">
    <section class="container" dir="rtl">
        <div class="row">
            <div class="col-md-9">
                <div class="blog">
                    <div class="blog-item">
                        <div class="blog-content">
                            <h3>عرض جميع الأشرطة</h3>

                            <div class="row">
                                <?php
                                $i = 1;
                                $videos = json_decode(file_get_contents("cache/youtube.php"));
                                foreach ($videos as $video) {
                                ?>
                                <div class="col-md-3">
                                    <a class="thumbnail" href="video_<?= $video->id ?>.html"><img alt=""
                                                                                                  src="<?= $video->thumbnail->url ?>"></a>
                                    <a href="video_<?= $video->id ?>.html">
                                        <p><?= $video->title ?></p>

                                        <p class="small"><?= $video->description ?></p>
                                    </a>
                                </div>
                                <?php
                                if ($i++ % 4 == 0){
                                ?></div>
                            <div class="row">
                                <?php
                                }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--/.blog-item-->
                </div>
            </div>
            <div class="col-md-3" dir="rtl">
                <?php include("tpl_sidebar.inc.php"); ?>
            </div>
        </div>
    </section>
</div>