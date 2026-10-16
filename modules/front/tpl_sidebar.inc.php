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
		<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.8&appId=356100108083124";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" data-href="https://www.facebook.com/mestaouiirpm/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/mestaouiirpm/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/mestaouiirpm/">‎الاسلام : حقائق وأعلام ومعالم‎</a></blockquote></div>


    
</div>