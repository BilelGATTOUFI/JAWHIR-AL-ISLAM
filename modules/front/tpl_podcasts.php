<section id="title" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>المكتبة السمعية</h1>
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
                            <h3>عرض جميع التسجيلات</h3>

                            <div class="row">
                                <?php
                                foreach ($data["podcasts"] as $podcast) {
                                ?>
                                    <h4><?= $podcast->podcast_title ?></h4>
                                    <p><?= $podcast->podcast_description ?></p>
                                    <audio controls>
                                        <source src="upload/files/<?= $podcast->podcast_file ?>" type="audio/mpeg" />
                                        <a href="podcast_<?= $podcast->podcast_id ?>.html"><?= $podcast->podcast_title ?></a>
                                        An html5-capable browser is required to play this audio.
                                    </audio>
                                <?php

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