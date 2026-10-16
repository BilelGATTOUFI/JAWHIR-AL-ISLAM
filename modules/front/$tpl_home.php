<?php include("tpl_homeslider.inc.php");?>
<section id="services" class="emerald" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="media">
                    <div class="pull-right">
                        <img class="img-responsive img-thumbnail img-circle" height="120" width="100" src="theme/FLAT/images/team1.jpg" alt="">
                        <!--/ <i class="icon-twitter icon-md"></i> -->
                    </div>
                    <div class="media-body" dir="rtl">
                        <h3 class="media-heading">الشيخ صلاح الدين المستاوي</h3>
                        <p>خريج جامعة الزيتونة كلية الشريعة قسم الفقه وأصول الفقه : الليسانس وشهادة الدراسات المعمقة في موضوع : شروح الموطأ</p>
                        <p>باحث بجامعة أكسان برفانس مرسيليا فرنسا من 2001-2002 إلى 2008-2009</p>
                    </div>

                </div>
            </div><!--/.col-md-4-->
            <div class="col-md-6 col-sm-6">
                <div class="media">
                    <div class="pull-right">
                        <img class="img-responsive img-thumbnail img-circle" height="120" width="100" src="theme/FLAT/images/team2.jpg" alt="">
                        <!-- <i class="icon-facebook icon-md"></i> -->

                    </div>
                    <div class="media-body" dir="rtl">
                        <h3 class="media-heading">الشيخ الحبيب المستاوي</h3>
                        <p>من الناس من لا يزيد توالي السنوات وتعاقبها العقد بعد العقد أسماءهم إلا ذكرا وثناءا وترحما عليهم نظرا لما تركوه من أعمال صالحة ومواقف مشرفة تتصل بالشؤون العامة والقضايا المصيرية التي تهم الأمة بمختلف أجيالها وفئاتها على </p>
                    </div>
                </div>
            </div><!--/.col-md-4-->
        </div>
    </div>
</section><!--/#services-->

<section id="recent-works" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div id="scroller" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <?php
                                $articles = articleController::latestArticles(3,0);
                                foreach($articles as $article){
                                ?>
                                <div class="col-xs-4">
                                    <div class="portfolio-item">
                                        <div class="item-inner">
                                            <h5>
                                                <?=$article->article_title?>
                                            </h5>
                                            <p><?=myTruncate($article->article_texte,300)?></p>
                                            <div class="overlay">
                                                <a class="preview btn btn-danger" title="Malesuada fames ac turpis egestas" href="images/portfolio/full/item1.jpg" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </div><!--/.row-->
                        </div><!--/.item-->
                        <div class="item">
                            <div class="row">
                                <?php
                                $articles = articleController::latestArticles(3,3);
                                foreach($articles as $article){
                                    ?>
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <h5>
                                                    <?=$article->article_title?>
                                                </h5>
                                                <p><?=myTruncate($article->article_texte,300)?></p>
                                                <div class="overlay">
                                                    <a class="preview btn btn-danger" title="Malesuada fames ac turpis egestas" href="images/portfolio/full/item1.jpg" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div><!--/.item-->
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h3>أحدث المقالات</h3>
                <p></p>
                <div class="btn-group">
                    <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                    <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                </div>
                <p class="gap"></p>
            </div>
        </div><!--/.row-->
    </div>
</section><!--/#recent-works-->

<section id="testimonial" class="alizarin" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="center">
                    <h2>أحدث الندوات و الملتقيات</h2>
                    <p>مؤسسة الحبيب المستاوي للبحوث والدراسات العلمية والتكوين</p>
                    <p>ندوات ومحاضرات وملتقيات علمية</p>

                </div>
                <div class="gap"></div>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $articles = articleController::latestArticlesByCategory(5,2);
                        foreach ($articles as $article){
                            ?>

                            <blockquote>
                                <p><a href="<?= articleController::link($article->article_title,$article->article_id) ?>"><?= $article->article_title ?></a></p>
                                <small><a href="<?= articleController::link($article->article_title,$article->article_id) ?>"><?=myTruncate($article->article_texte,300)?></a></small>
                            </blockquote>

                            <?php
                        }
                        ?>

                    </div>
                    <div class="col-md-6">
                        <?php
                        $articles = articleController::latestArticlesByCategory(5,2,2);
                        foreach ($articles as $article){
                            ?>

                            <blockquote>
                                <p><a href="<?= articleController::link($article->article_title,$article->article_id) ?>"><?= $article->article_title ?></a></p>
                                <small><a href="<?= articleController::link($article->article_title,$article->article_id) ?>"><?=myTruncate($article->article_texte,300)?></a></small>
                            </blockquote>

                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#testimonial-->


