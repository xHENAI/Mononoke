<div id="wrapper">
    <div class="postbody">
        <div class="bixbox bbnofrm">
            <div class="releases">
                <h1><span><?= $lang["genre"] . ": " . $genre->getName() ?></span></h1>
            </div>
            <?php if (!empty($animes)) { ?>
                <div class="listupd">
                    <?php foreach ($animes as $anime) { ?>
                        <?php $anime = new Anime($anime["id"]); ?>
                        <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                            <div class="bsx"> <a rel="tab" href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>" itemprop="url" title="<?= $anime->getName() ?>" class="tip" rel="116">
                                    <div class="limit">
                                        <?php if ($anime->getStatus() == 2) { ?>
                                            <div class="status Completed"><?= $lang["completed"] ?></div>
                                        <?php } ?>
                                        <div class="typez TV"><?= $anime->convertType() ?></div>
                                        <div class="ply"><i class="far fa-play-circle"></i></div>
                                        <div class="bt">
                                            <span class="epx">
                                                <?= $anime->convertStatus() ?>
                                            </span>
                                            <!--<span class="sb Sub">Sub</span>-->
                                        </div>
                                        <img src="<?= $anime->getCover() ?>" class="ts-post-image wp-post-image attachment-medium_large size-medium_large loading" loading="lazy" itemprop="image" title="<?= $anime->getName() ?>" width="247" height="350" alt="<?= $anime->getName() ?>">
                                    </div>
                                    <div class="tt"> <?= $anime->getName() ?><h2 itemprop="headline"><?= $anime->getName() ?></h2>
                                    </div>
                                </a>
                            </div>
                        </article>
                    <?php } ?>
                </div>
                <div class="pagination"></div>
            <?php } else { ?>
                <p style="padding-left:10px"><?= $lang["there_are_no_animes_with_that_genre_at_the_moment"] ?></p>
            <?php } ?>
            <div class="hpage">
                <a href="<?= $config["url"] ?>genre/<?= $genre->getSlug() ?>/page/1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                <a href="<?= $config["url"] ?>genre/<?= $genre->getSlug() ?>/page/<?= $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                <a href="<?= $config["url"] ?>genre/<?= $genre->getSlug() ?>/page/<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                <a href="<?= $config["url"] ?>genre/<?= $genre->getSlug() ?>/page/<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>