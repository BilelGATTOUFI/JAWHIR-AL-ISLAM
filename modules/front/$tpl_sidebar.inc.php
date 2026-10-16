<div class="widget search">
    <form role="form" action="search.html">
        <div class="input-group">

            <input type="text" class="form-control" autocomplete="off" placeholder="" name="q">
            <div class="input-group-btn">
                <button class="btn btn-danger" type="submit"><i class="icon-search"></i></button>
            </div>
        </div>
    </form>
</div>
<!--/.search-->

<div class="widget categories">
    <h3><?= ___("Categories");?></h3>

    <div class="row">
        <div class="col-sm-12">
            <ul class="arrow">
                <?php
                foreach ($data["categories"] as $category) {
                    ?>
                    <li><a href="<?=categoryController::link($category->label,$category->category_id)?>"><?= $category->label ?></a></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</div>
<!--/.categories-->
<div class="widget tags">
    <h3><?= ___("Tags"); ?></h3>
    <ul class="tag-cloud">
        <?php
        foreach ($data["tags"] as $tag) {
            ?>
            <li><a class="btn btn-xs btn-primary" href="<?=tagController::link($tag->tag_label,$tag->tag_id)?>"><?= $tag->tag_label ?></a></li>
        <?php } ?>
    </ul>
</div>
<!--/.tags-->

<div class="widget facebook-fanpage">
    <h3><?= ___("Facebook Fanpage");?></h3>

    <div class="widget-content">
        <div class="fb-page" data-href="https://www.facebook.com/%D8%A7%D9%84%D8%A7%D8%B3%D9%84%D8%A7%D9%85-%D8%AD%D9%82%D8%A7%D8%A6%D9%82-%D9%88%D8%A3%D8%B9%D9%84%D8%A7%D9%85-%D9%88%D9%85%D8%B9%D8%A7%D9%84%D9%85-1074924159186222/?ref=bookmarks" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
    </div>
</div>