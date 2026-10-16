<div class="container">
    <hr>
    <?php include("tpl_homeslider.inc.php"); ?>
    <hr>
    <section id="services" class="wet-asphalt border6" dir="rtl">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pull-right">
                        <img class="img-responsive img-thumbnail img-circle" height="120" width="100"
                             src="theme/front/img/team1.jpg" alt="االشيخ صلاح الدين المستاوي" style="margin-top: 19px;">
                    </div>
                    <div class="col-md-9" dir="rtl">
                        <h3>الشيخ صلاح الدين المستاوي</h3>

                        <p>خريج جامعة الزيتونة كلية الشريعة قسم الفقه وأصول الفقه : الليسانس وشهادة الدراسات المعمقة في
                            موضوع : شروح الموطأ</p>

                        <p>باحث بجامعة أكسان برفانس مرسيليا فرنسا من 2001-2002 إلى 2008-2009</p>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 pull-right">
                        <img class="img-responsive img-thumbnail img-circle" height="120" width="100"
                             src="theme/front/img/team2.jpg" alt="" style="margin-top: 19px;">
                    </div>
                    <div class="col-md-9" dir="rtl">
                        <h3>الشيخ الحبيب المستاوي</h3>

                        <p>من الناس من لا يزيد توالي السنوات وتعاقبها العقد بعد العقد أسماءهم إلا ذكرا وثناءا وترحما
                            عليهم نظرا لما تركوه من أعمال صالحة ومواقف مشرفة تتصل بالشؤون العامة والقضايا المصيرية التي
                            تهم الأمة بمختلف أجيالها وفئاتها على </p>
                    </div>

                </div>
            </div>
            <!--/.col-md-4-->
        </div>

    </section>


        <div class="row">
            <div class="col-md-9">

            </div>
            <div class="col-md-3" dir="rtl">
                <!-- Controls -->
                <div class="controls pull-left hidden-xs">
                    <a
                        class="right glyphicon glyphicon-chevron-right btn btn-success  btn-xs"
                        href="#carousel-example"
                        data-slide="next"></a>
                    <a class="left glyphicon glyphicon-chevron-left btn-xs btn btn-success" href="#carousel-example"
                       data-slide="prev"></a>
                </div>
                <h3>أحدث المقالات</h3>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <?php
                    $articles = articleController::latestArticles(4, 0);
                    foreach ($articles as $article) {
                        ?>
                        <div class="col-sm-3" dir="rtl">
                            <a href="<?=articleController::link($article->article_title,$article->article_id)?>">
                            <div class="col-item">
                                <div class="photo">
                                    <img src="upload/files/thumbnail/<?= $article->article_picture ?>"
                                         class="img-responsive"
                                         alt="<?= myTruncate($article->article_title, 200) ?>"/>
                                </div>
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5><?= myTruncate($article->article_title, 200) ?></h5>
                                            <h5 class="price-text-color"><?= $article->article_date ?></h5>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="item">
                    <div class="row">
                        <?php
                        $articles = articleController::latestArticles(4, 4);
                        foreach ($articles as $article) {
                            ?>
                            <div class="col-sm-3" dir="rtl">
							<a href="<?=articleController::link($article->article_title,$article->article_id)?>">
                                <div class="col-item">
                                    <div class="photo">
                                        <img src="upload/files/thumbnail/<?= $article->article_picture ?>"
                                             class="img-responsive"
                                             alt="<?= myTruncate($article->article_title, 200) ?>"/>
                                    </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5><?= myTruncate($article->article_title, 200) ?></h5>
                                                <h5 class="price-text-color"><?= $article->article_date ?></h5>
                                            </div>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
							</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" dir="rtl" id="newsfeed">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-eye-open"></span><b>جديد المسائل الفقهية</b></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="newsVerticalUp">

                                    <?php
                                    $articles = articleController::latestArticlesByCategory(12, 6);
                                    foreach ($articles as $article) {
                                        ?>
                                        <li class="news-item">
                                            <a href="<?=articleController::link($article->article_title,$article->article_id)?>"><?= $article->article_title ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#27ae60;"><span class="glyphicon glyphicon-bullhorn"></span><b>جديد علوم القرآن و التفسير</b>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="newsVerticalDown">

                                    <?php
                                    $articles = articleController::latestArticlesByCategory(14, 6);
                                    foreach ($articles as $article) {
                                        ?>
                                        <li class="news-item">
                                            <a href="<?=articleController::link($article->article_title,$article->article_id)?>"><?= $article->article_title ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="background-color:#27ae60;"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                       <div class="panel-heading"><span class="glyphicon glyphicon-book"></span><b>جديد هدي الاسلام</b></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="newsVerticalUp">

                                    <?php
                                    $articles = articleController::latestArticlesByCategory(29, 6);
                                    foreach ($articles as $article) {
                                        ?>
                                        <li class="news-item">
                                            <a href="<?=articleController::link($article->article_title,$article->article_id)?>"><?= $article->article_title ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>

        <?php
        /* cache youtube*/
$filename = "cache/youtube.php";
$lasttime = filemtime($filename);
$now = mktime();
if($now>($lasttime+3600)){
        $youtube = new _youtube();
          $result = $youtube->getUser("UCU2jogQjKP7VGB6mk_1ADyQ");
          $result = $youtube->getUserVideos($result->uploadPlayListId);
          file_put_contents("cache/youtube.php",json_encode($result));
}
        $result = json_decode(file_get_contents("cache/youtube.php"));
        // print_r($result);

        ?>
            <div class="row" dir="rtl">
               <a href="videos.html"><h2>المكتبة المرئية</h2></a>
            </div>
            <div class='row' dir="rtl">
                <div class='col-md-12'>
                    <div class="carousel slide media-carousel" id="media">
                        <div class="carousel-inner">
                            <?php
                            $blocs = ceil(count($result) / 4);
                            for ($i = 0; $i < $blocs; $i++) {
                                ?>
                                <div class="item <?= ($i == 0) ? "active" : "" ?>">
                                    <div class="row">
                                        <?php
                                        for ($j = $i * 4; $j < ($i + 1) * 4; $j++) {
                                            if (!empty($result[$j])) {
                                                ?>
                                                <div class="col-md-3">
                                                    <a class="thumbnail" href="video_<?= $result[$j]->id?>.html"><img alt="" src="<?= $result[$j]->thumbnail->url ?>"></a>

                                                    <p><a href="video_<?= $result[$j]->id?>.html"><?= $result[$j]->title ?></a></p>

                                                    <p class="small"><?= $result[$j]->description ?></p>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                        <a data-slide="next" href="#media" class="right carousel-control">‹</a>
                        <a data-slide="prev" href="#media" class="left carousel-control">›</a>
                    </div>
                </div>
            </div>
</div>
