<?php if ($mode != "text") { ?>
    <div id="wrapper">
        <div class="postbody">
            <div class="bixbox bixboxarc bbnofrm">
                <div class="releases">
                    <h1><span>All Animes</span></h1>
                </div>
                <div class="mrgn">
                    <div class="advancedsearch">
                        <div class="quickfilter">
                            <form action="<?= $config["url"] ?>animes" class="filters" method="GET" rel="tab">
                                <span class="sec1">
                                    <div class="filter dropdown">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown"> <?= $lang["genre"] ?> <span id="filtercount"><?= $lang["all"] ?></span> <i class="fa fa-angle-down" aria-hidden="true"></i> </button>
                                        <ul class="dropdown-menu c4 scrollz">
                                            <?php foreach ($genres as $gnre) { ?>
                                                <li><input type="checkbox" id="genre-<?= $gnre["slug"] ?>" name="genre[]" value="<?= $gnre["id"] ?>"> <label for="genre-<?= $gnre["slug"] ?>"><?= $gnre["name"] ?></label></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="filter dropdown">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown"> <?= $lang["season"] ?> <span id="filtercount"><?= $lang["all"] ?></span> <i class="fa fa-angle-down" aria-hidden="true"></i> </button>
                                        <ul class="dropdown-menu c4 scrollz">
                                            <?php foreach ($seasons as $ssn) { ?>
                                                <li><input type="radio" id="season-<?= $ssn["slug"] ?>" name="season" value="<?= $ssn["id"] ?>"> <label for="season-<?= $ssn["slug"] ?>"><?= $ssn["name"] ?></label></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="filter dropdown">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown"> <?= $lang["studio"] ?> <span id="filtercount"><?= $lang["all"] ?></span> <i class="fa fa-angle-down" aria-hidden="true"></i> </button>
                                        <ul class="dropdown-menu c4 scrollz">
                                            <?php foreach ($studios as $stdio) { ?>
                                                <li><input type="radio" id="studio-<?= $stdio["slug"] ?>" name="studio[]" value="<?= $stdio["id"] ?>"> <label for="studio-<?= $stdio["slug"] ?>"><?= $stdio["name"] ?></label></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="filter dropdown">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown"> <?= $lang["status"] ?> <span id="filtercount"><?= $lang["all"] ?></span> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <ul class="dropdown-menu c1">
                                            <li><input type="radio" id="anime_status-all" name="status" value="" checked=""> <label for="anime_status-all"><?= $lang["all"] ?></label></li>
                                            <li><input type="radio" id="anime_status-announced" name="status" value="0"> <label for="anime_status-announced"><?= $lang["announced"] ?></label></li>
                                            <li><input type="radio" id="anime_status-ongoing" name="status" value="1"> <label for="anime_status-ongoing"><?= $lang["ongoing"] ?></label></li>
                                            <li><input type="radio" id="anime_status-completed" name="status" value="2"> <label for="anime_status-completed"><?= $lang["completed"] ?></label></li>
                                            <li><input type="radio" id="anime_status-hiatus" name="status" value="3"> <label for="anime_status-hiatus"><?= $lang["hiatus"] ?></label></li>
                                            <li><input type="radio" id="anime_status-canceled" name="status" value="4"> <label for="anime_status-canceled"><?= $lang["cancelled"] ?></label></li>
                                        </ul>
                                    </div>
                                    <div class="filter dropdown">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown"> <?= $lang["type"] ?> <span id="filtercount"><?= $lang["all"] ?></span> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <ul class="dropdown-menu c1">
                                            <li><input type="radio" id="type-all" name="type" value="" checked=""> <label for="type-all"><?= $lang["all"] ?></label></li>
                                            <?php foreach ($types as $tpe) { ?>
                                                <li><input type="radio" id="type-<?= $tpe["slug"] ?>" name="type" value="<?= $tpe["id"] ?>"> <label for="type-<?= $tpe["slug"] ?>"><?= $tpe["name"] ?></label></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="filter dropdown">
                                        <button type="button" class="dropdown-toggle" data-toggle="dropdown"> <?= $lang["order_by"] ?> <span id="filtercount">Default</span> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                                        <ul class="dropdown-menu c1">
                                            <li><input type="radio" id="sort_by-" name="order" value="" checked=""> <label for="sort_by-">Default</label></li>
                                            <li><input type="radio" id="sort_by-name_a-z" name="order" value="NAME ASC"> <label for="sort_by-name_a-z">A-Z</label></li>
                                            <li><input type="radio" id="sort_by-name_z-a" name="order" value="NAME DESC"> <label for="sort_by-name_z-a">Z-A</label></li>
                                            <li><input type="radio" id="sort_by-latest" name="order" value="ADDED DESC"> <label for="sort_by-latest">Latest Added</label></li>
                                            <li><input type="radio" id="sort_by-popular" name="order" value="" disabled> <label for="sort_by-popular">Popular (In work)</label></li>
                                        </ul>
                                    </div>
                                    <span class="sec2">
                                        <div class="filter submit"><button type="submit" class="btn btn-custom-search" rel="tab"><i class="fa fa-search" aria-hidden="true"></i> Search</button></div>
                                    </span>
                                    <div class="filter">
                                        <div class="modex"> <a rel="tab" href="<?= $config["url"] ?>animes/text-mode/">Switch to Text Mode</a></div>
                                    </div>
                                </span>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="listupd">
                        <?php if (!empty($animes)) { ?>
                            <?php foreach ($animes as $anime) { ?>
                                <?php $anime = new Anime($anime["id"]); ?>
                                <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                                    <div class="bsx">
                                        <a rel="tab" href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/" itemprop="url" title="<?= $anime->getName() ?>" class="tip" rel="116">
                                            <div class="limit">
                                                <?php if ($anime->getStatus() == 2) { ?>
                                                    <div class="status Completed">Completed</div>
                                                <?php } ?>
                                                <div class="typez TV"><?= $anime->convertType() ?></div>
                                                <div class="ply"><i class="far fa-play-circle"></i></div>
                                                <div class="bt">
                                                    <span class="epx">
                                                        <?= $anime->convertStatus() ?>
                                                    </span>
                                                    <!--<span class="sb Sub">Sub</span>-->
                                                </div>
                                                <img src="<?= $anime->getCover() ?>" class="ts-post-image wp-post-image attachment-medium_large size-medium_large loading" loading="lazy" itemprop="image" title="<?= $anime->getName() ?>" width="247" height="350" alt="">
                                            </div>
                                            <div class="tt">
                                                <?= $anime->getName() ?><h2 itemprop="headline"><?= $anime->getName() ?></h2>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            <?php }
                        } else { ?>
                            <p>There are no Animes on this page!</p>
                        <?php } ?>
                    </div>
                    <div class="hpage">
                        <?php if ($yolo == true) { ?>
                            <a href="<?= $config["url"] ?>animes?genre[]=<?= cat(mysqli_real_escape_string($conn, $_GET["genre"]), "clean") ?>&season=<?= cat(mysqli_real_escape_string($conn, $_GET["season"]), "clean") ?>&studio=<?= cat(mysqli_real_escape_string($conn, $_GET["studio"]), "clean") ?>&status=<?= cat(mysqli_real_escape_string($conn, $_GET["status"]), "clean") ?>&type=<?= cat(mysqli_real_escape_string($conn, $_GET["type"]), "clean") ?>&order=<?= cat(mysqli_real_escape_string($conn, $_GET["order"]), "clean") ?>&page=1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                            <a href="<?= $config["url"] ?>animes?genre=<?= cat(mysqli_real_escape_string($conn, $_GET["genre"]), "clean") ?>&season=<?= cat(mysqli_real_escape_string($conn, $_GET["season"]), "clean") ?>&studio=<?= cat(mysqli_real_escape_string($conn, $_GET["studio"]), "clean") ?>&status=<?= cat(mysqli_real_escape_string($conn, $_GET["status"]), "clean") ?>&type=<?= cat(mysqli_real_escape_string($conn, $_GET["type"]), "clean") ?>&order=<?= cat(mysqli_real_escape_string($conn, $_GET["order"]), "clean") ?>&page=<?= $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                            <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                            <a href="<?= $config["url"] ?>animes?genre=<?= cat(mysqli_real_escape_string($conn, $_GET["genre"]), "clean") ?>&season=<?= cat(mysqli_real_escape_string($conn, $_GET["season"]), "clean") ?>&studio=<?= cat(mysqli_real_escape_string($conn, $_GET["studio"]), "clean") ?>&status=<?= cat(mysqli_real_escape_string($conn, $_GET["status"]), "clean") ?>&type=<?= cat(mysqli_real_escape_string($conn, $_GET["type"]), "clean") ?>&order=<?= cat(mysqli_real_escape_string($conn, $_GET["order"]), "clean") ?>&page=<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                            <a href="<?= $config["url"] ?>animes?genre=<?= cat(mysqli_real_escape_string($conn, $_GET["genre"]), "clean") ?>&season=<?= cat(mysqli_real_escape_string($conn, $_GET["season"]), "clean") ?>&studio=<?= cat(mysqli_real_escape_string($conn, $_GET["studio"]), "clean") ?>&status=<?= cat(mysqli_real_escape_string($conn, $_GET["status"]), "clean") ?>&type=<?= cat(mysqli_real_escape_string($conn, $_GET["type"]), "clean") ?>&order=<?= cat(mysqli_real_escape_string($conn, $_GET["order"]), "clean") ?>&page=<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                        <?php } else { ?>
                            <a href="<?= $config["url"] ?>animes?page=1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                            <a href="<?= $config["url"] ?>animes?page=<?= $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                            <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                            <a href="<?= $config["url"] ?>animes?page=<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                            <a href="<?= $config["url"] ?>animes?page=<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    <?php } elseif ($mode == "text") { ?>

        <div id="wrapper">
            <div class="postbody">
                <div class="bixbox bixboxarc bbnofrm">
                    <div class="releases">
                        <h1><span><?= $lang["all_animes"] ?></span></h1>
                    </div>
                    <div class="mrgn">
                        <div class="advancedsearch">
                            <div class="clear"></div>
                            <br>
                        </div>
                        <div class="other-opts">
                            <div class="modex"> <a rel="tab" href="<?= $config["url"] ?>animes/"><?= $lang["switch_to_image_mode"] ?></a></div>
                        </div>
                        <div class="clear"></div>
                        <div class="soralist">
                            <div class="lxx">
                            </div>
                            <?php foreach ($initials as $initial) { ?>
                                <div class="blix">
                                    <span><?= $initial ?></span>
                                    <?php //displayAnimelist($initial) 
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        <?php } ?>