<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <!-- start: SEARCH FORM -->
            <div class="search-form">
                <a class="s-open" href="#">
                    <i class="ti-search"></i>
                </a>

                <form class="navbar-form" role="search">
                    <a class="s-remove" href="#" target=".navbar-form">
                        <i class="ti-close"></i>
                    </a>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button class="btn search-button" type="submit">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!-- end: SEARCH FORM -->
            <!-- start: MAIN NAVIGATION MENU -->
            <ul class="main-navigation-menu">
                <?php
                global $cfg_menu;
                foreach ($cfg_menu["items"] as $item) {
                    if (!empty($item["submenu"])) {
                        ?>
                        <li<?=($cfg_menu["default"]==$item["label"])?" class='active'":""?>>
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="<?= $item["icon"] ?>"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> <?= $item["label"] ?> </span><i class="icon-arrow"></i>
                                    </div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <?php
                                foreach ($item["submenu"] as $subitem) {
                                    ?>
                                    <li<?=($cfg_menu["subdefault"]==$subitem["label"])?" class='active'":""?>>
                                        <a href="<?= $subitem["link"] ?>">
                                            <span class="title"> <?= $subitem["label"] ?> </span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php
                    } else {
                        ?>
                        <li<?=($cfg_menu["default"]==$item["label"])?" class='active'":""?>>
                            <a href="<?= $item["link"] ?>">
                                <div class="item-content">
                                    <div class="item-media">
                                        <i class="<?= $item["icon"] ?>"></i>
                                    </div>
                                    <div class="item-inner">
                                        <span class="title"> <?= $item["label"] ?> </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php
                    }

                }
                ?>


            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
        </nav>
    </div>
</div>