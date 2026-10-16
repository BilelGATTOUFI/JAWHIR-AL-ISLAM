    <div class="row">
        <div class="col-md-4">
            <div class="widget search">
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                            </span>
                    </div>
                </form>
            </div><!--/.search-->

            <div class="widget ads">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad1.png" alt=""></a>
                    </div>

                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad2.png" alt=""></a>
                    </div>
                </div>
                <p> </p>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad3.png" alt=""></a>
                    </div>

                    <div class="col-xs-6">
                        <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad4.png" alt=""></a>
                    </div>
                </div>
            </div><!--/.ads-->

            <div class="widget categories">
                <h3>Blog Categories</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="arrow">
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Updates</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="arrow">
                            <li><a href="#">Joomla</a></li>
                            <li><a href="#">Wordpress</a></li>
                            <li><a href="#">Drupal</a></li>
                            <li><a href="#">Magento</a></li>
                            <li><a href="#">Bootstrap</a></li>
                        </ul>
                    </div>
                </div>
            </div><!--/.categories-->
            <div class="widget tags">
                <h3>Tag Cloud</h3>
                <ul class="tag-cloud">
                    <li><a class="btn btn-xs btn-primary" href="#">CSS3</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">HTML5</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">WordPress</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Joomla</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Drupal</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Bootstrap</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">jQuery</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Tutorial</a></li>
                    <li><a class="btn btn-xs btn-primary" href="#">Update</a></li>
                </ul>
            </div><!--/.tags-->

            <div class="widget facebook-fanpage">
                <h3>Facebook Fanpage</h3>
                <div class="widget-content">
                    <div class="fb-like-box" data-href="https://www.facebook.com/shapebootstrap" data-width="292" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                </div>
            </div>
        </div>
        <div class="col-md-8">

                <?php
                //$data["articles"]=array();
                foreach($data["articles"] as $article){
                ?>
                <div class="blog-item" dir="rtl">
                    <img class="img-responsive img-blog" src="images/blog/blog1.jpg" width="100%" alt="" />
                    <div class="blog-content">
                        <a href="<?=articleController::link($article->article_title,$article->article_id)?>"><h3><?=$article->article_title?></h3></a>
                        <div class="entry-meta">
                            <span><i class="icon-user"></i> <a href="#"><?=$article->author?></a></span>
                            <span><i class="icon-folder-close"></i> <a href="#"><?=$article->category?></a></span>
                            <span><i class="icon-calendar"></i><?=$article->date?></span>
                        </div>
                        <p><?=myTruncate($article->article_texte,800)?></p>
                        <a class="btn btn-default" href="<?=articleController::link($article->article_title,$article->article_id)?>"> إقرأ المزيد <i class="icon-angle-right"></i></a>
                    </div>
                </div>
                <?php }?>
                <ul class="pagination pagination-lg">
                    <li><a href="<?=categoryController::link($data["category"]->label,$data["category"]->category_id)?>?c=<?=$data["pagination"]["previous"]?>"><i class="icon-angle-left"></i></a></li>
                    <?php
                    for($i=$data["pagination"]["start"];$i<=$data["pagination"]["end"];$i++){
                        $active="";
                        if($i==$data["pagination"]["current"])
                            $active=" class=\"active\"";


                    ?>
                    <li <?=$active?>><a href="<?=categoryController::link($data["category"]->label,$data["category"]->category_id)?>?c=<?=$i?>"><?=$i?></a></li>
                    <?php }?>
                    <li><a href="<?=categoryController::link($data["category"]->label,$data["category"]->category_id)?>?c=<?=$data["pagination"]["next"]?>"><i class="icon-angle-right"></i></a></li>
                </ul><!--/.pagination-->

        </div><!--/.col-md-8-->
    </div><!--/.row-->
