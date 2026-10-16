<div class="container hidden-xs hidden-sm">
    <div class="row">
        <div class="col-md-2">
            <a href="#" class="btn btn-success btn-xs">عربي</a>
            <a href="#" class="btn btn-primary btn-xs hidden-md">Français</a>
            <a href="#" class="btn btn-primary btn-xs visible-md">FR</a>
            <a href="#" class="btn btn-primary btn-xs hidden-md">English</a>
            <a href="#" class="btn btn-primary btn-xs visible-md">EN</a>
        </div>
        <div class="col-md-8" style="padding-right: 0px;">
            <ul id="newsScroll">
                <?php
                $articles = articleController::latestArticles(4, 0);
                foreach ($articles as $article) {
                    ?>
                    <li><span><?= $article->article_date ?></span><a href="<?=articleController::link($article->article_title,$article->article_id)?>"><?= $article->article_title ?></a></li>
                <?php } ?>
            </ul>

        </div>
        <div class="col-md-2" style="padding-left: 0px;"><div class="btn btn-md btn-primary">آخر الأخبار</div> </div>
    </div>
</div>
<div id="sticky-anchor"></div>
<div id="sticky">
<div class="navbar yamm navbar-default"  dir="rtl">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="container">
        <div id="navbar-collapse-1" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" dir="rtl">
                <?php
                $categories = categoryController::listCategoriesByParent(0);
                $categories = array_reverse($categories);
                foreach ($categories as $category) {
                    $categoriesChild = categoryController::listCategoriesByParent($category->category_id);
                    $caret="";
                    if(count($categoriesChild)){
                        $caret = '<b class="caret"></b>';
                    }
                    ?>
                <!-- Classic list -->
                 <li>
                    <a href="jawahir-islam.html">مجلة جوهر الإسلام الاصدارات </a>
                </li>
                <li class="dropdown yamm-fw"><a href="<?=categoryController::link($category->label,$category->category_id);?>" <?php if(count($categoriesChild)){?>data-toggle="dropdown"<?php }?> class="dropdown-toggle"><?=$caret?><?= $category->label ?></a>
                    <?php
                    if(count($categoriesChild)){
                    ?>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- Content container to add padding -->
                            <div class="yamm-content">
                                <div class="row">
                    <?php
                    $col = ceil(12/count($categoriesChild));
                    foreach($categoriesChild as $categoryC){
                    ?>
                                <div class="col-sm-<?=$col?>">
                                    <ul class="list-unstyled" dir="rtl" style="text-align: right;">
                                        <li>
                                            <p><a href="<?=categoryController::link($categoryC->label,$categoryC->category_id);?>"><strong><?= $categoryC->label ?> </strong></a></p>
                                        </li>
                                        <?php
                                        $articles = articleController::latestArticlesByCategory($categoryC->category_id,6);
                                        foreach($articles as $article){
                                        ?>
                                        <li><a href="<?=articleController::link($article->article_title,$article->article_id)?>"> <?=$article->article_title?></a></li>
                                        <?php }?>
                                    </ul>
                                </div>

                    <?php } ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <?php } } ?>

            </ul>
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand">الصفحة الرئيسية</a>
            </div>
        </div>

    </div>
</div>
</div>