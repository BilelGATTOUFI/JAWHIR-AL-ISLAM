<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="#" class="btn btn-success btn-xs">عربي</a>
            <a href="#" class="btn btn-primary btn-xs">Français</a>
            <a href="#" class="btn btn-primary btn-xs">English</a>
        </div>
        <div class="col-md-8" style="padding-right: 0px;">
            <ul id="newsScroll">
                <?php
                $articles = articleController::latestArticles(4, 0);
                foreach ($articles as $article) {
                    ?>
                    <li><span><?= $article->article_date ?></span><a href="#"><?= $article->article_title ?></a></li>
                <?php } ?>
            </ul>

        </div>
        <div class="col-md-2" style="padding-left: 0px;"><div class="btn btn-md btn-warning">آخر الأخبار</div> </div>
    </div>
</div>
<!-- Navigation -->
<header class="cd-main-header navbar" role="banner" dir="rtl">
    <a href="#0" id="logo"></a>
    <ul class="cd-header-buttons">
        <li><a class="cd-nav-trigger" href="#cd-primary-nav">Menu<span></span></a></li>
    </ul>
    <!-- cd-header-buttons -->
</header>
<div class="cd-overlay" dir="rtl"></div>
<nav class="cd-nav">
    <ul id="cd-primary-nav" class="cd-primary-nav is-fixed">
        <li class="has-children">
            <a href="jawahir-islam.html">مجلة جوهر الإسلام</a>
        </li>
        <?php
        $categories = categoryController::listCategoriesByParent(0);
        foreach ($categories as $category) {
            ?>
            <li class="has-children">
                <a href="#"><?= $category->label ?></a>
                <ul class="cd-secondary-nav is-hidden">
                    <li class="go-back"><a href="#">Menu</a></li>
                    <li class="see-all"><a href="#">آخر الموضوعات / المقالات </a></li>

                    <?php
                    $categoriesChild = categoryController::listCategoriesByParent($category->category_id);
                    foreach ($categoriesChild as $category) {
                        ?>
                        <li class="has-children">
                            <a href="#"><?= $category->label ?></a>

                            <ul class="is-hidden" dir="rtl">
                                <?php
                                $categoriesChild2 = categoryController::listCategoriesByParent($category->category_id);
                                foreach ($categoriesChild2 as $category) {
                                    ?>
                                    <li class="has-children">
                                        <a href="#"><?= $category->label ?></a>

                                        <ul class="is-hidden" dir="rtl">
                                            <?php
                                            $categoriesChild2 = categoryController::listCategoriesByParent($category->category_id);
                                            foreach ($categoriesChild2 as $category) {
                                                ?>
                                                <li><a href="#"><?= $category->label ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
    <!-- primary-nav -->
</nav>
<!-- cd-nav -->
