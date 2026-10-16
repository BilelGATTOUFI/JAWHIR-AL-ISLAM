<section id="bottom" class="wet-asphalt"  dir="rtl">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6">
                <h4>العنوان</h4>
                <address>
                    <span><strong>28 نهج جمال عبد الناصر –تونس</strong></span><br>
                        <span dir="ltr">+216 71 43 21 33 <i class="glyphicon glyphicon-phone"></i> </span><br>
                        <span dir="ltr">+216 71 32 71 30 <i class="glyphicon glyphicon-print"></i> </span>
                </address>
            </div> <!--/.col-md-3-->


            <div class="col-md-3 col-sm-6">
                <h4>المكتبـة</h4>
                <div>
                    <ul class="arrow">
                        <?php
                        $categories = categoryController::listCategoriesByParent(0);
                        foreach($categories as $category){
                            ?>
                            <li><a href="<?=categoryController::link($category->label,$category->category_id)?>"><?= $category->label ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <h4>أحدث المقالات</h4>
                <div>
                    <?php
                    $articles = articleController::latestArticles();
                    foreach($articles as $article){
                        ?>
                        <div class="media">
                            <div class="pull-right">
                                <a href="<?= articleController::link($article->article_title,$article->article_id) ?>"><img src="upload/files/thumbnail/<?=$article->article_picture?>" alt="" class="img-rounded"></a>
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="<?= articleController::link($article->article_title,$article->article_id) ?>"><?= $article->article_title ?></a></span>
                                <small class="muted"><?= $article->article_date ?></small>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div><!--/.col-md-3-->



            <div class="col-md-3 col-sm-6">
                <h4>الاسلام: حقائق وأعلام ومعالم</h4>
                <p>موقع الشيخ محمد صلاح الدين المستاوي عضو المجلس الإسلامي بتونس وخريج جامعة الزيتونة (كلية الشريعة وأصول الدين) يتضمن تعريفا بالشيخ والده الحبيب المستاوي رحمه الله وهو احد علماء الزيتونة ودعاة الإسلام حيث سيجد المتصفح لهذا الموقع فقرات من أعماله.</p>
            </div><!--/.col-md-3-->

        </div>
    </div>
</section><!--/#bottom-->
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.ar" accesskey="8"><img alt="Creative Commons License" style="border: 0;" src="#http://i.creativecommons.org/l/by-sa/3.0/88x31.png"></a>
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="sitemap.html">باختصار</a></li>
                    <li><a href="sitemap.html">خريطة الموقع</a></li>
                    <li><a href="contact.html">الاتصال</a></li>
                    <li><a href="index.html">الصفحة الأساسية</a></li>
                    <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->