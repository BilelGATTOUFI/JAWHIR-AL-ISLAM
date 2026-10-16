<section id="title" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <h1><?=___("Site map");?></h1>
            </div>
            <div class="col-sm-3">

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
                                      <div class="blog-content">
                        <h3>Site map</h3>
                        <?=categoryController::renderCategory(0);?>
                    </div>
                </div>
                <!--/.blog-item-->
            </div>
        </div>

        <div class="col-md-3" dir="rtl">
            <?php include("tpl_sidebar.inc.php"); ?>
        </div>
    </div>
    <!--/.row-->
</section><!--/#blog-->
</div>