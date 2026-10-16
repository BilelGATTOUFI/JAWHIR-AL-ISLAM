<section id="main-slider" class="no-margin">
    <div id="aslider" class="carousel slide wet-asphalt"  data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $i=0;
            $active = "active";
            $slides = articleController::sliderArticles();
            foreach($slides as $slide){
            ?>
            <li data-target="#aslider" data-slide-to="<?=$i++?>" class="<?=$active?>"></li>
            <?php
            $active = "";
            }?>
        </ol>
        <div class="carousel-inner" dir="rtl">
            <?php
            $active = "active";
            $slides = articleController::sliderArticles();
            foreach($slides as $slide){
                $i=rand(1,3);
            ?>
            <div class="item <?=$active?>" style="background-image: url('upload/files/<?=$slide->article_picture?>'); background-position: center; background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content centered">
                                <h2 class="boxed animation animated-item-1"><?=$slide->article_title?></h2>
                                <h5 class="boxed animation animated-item-2"> <?=myTruncate(strip_tags($slide->article_texte),300)?> </h5>
                                <a class="btn btn-md animation animated-item-3" href="<?= articleController::link($slide->article_title,$slide->article_id) ?>">إقرأ المزيد..</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.item-->
            <?php
                $active = "";
            }?>
        </div>
        <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
    <a class="prev hidden-xs" href="#aslider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#aslider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section><!--/#main-slider-->
