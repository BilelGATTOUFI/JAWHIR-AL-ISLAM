<section id="title" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1>Video player</h1>
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
                            <h3><?=$data["podcast"]->podcast_title?></h3>
                            code du plugin
                            <p>
                                <?=$data["podcast"]->podcast_description?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" dir="rtl">
                <?php include("tpl_sidebar.inc.php"); ?>
            </div>
        </div>

    </section>
</div>