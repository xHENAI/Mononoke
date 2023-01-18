<div id="wrapper">
    <div class="postbody">
        <div class="slidtop">
        </div>
        <div class="bixbox bbnofrm">
            <div class="releases hothome">
                <h3><?= $lang["random_anime"] ?></h3>
            </div>
            <div class="listupd normal">
                <div class="excstf">
                    <?php foreach ($random_anime as $anime) { ?>
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
            </div>
        </div>
        <div class="bixbox bbnofrm">
            <div class="releases latesthome">
                <h3><?= $lang["latest_episodes_page"] ?> <?= $pagination ?></h3>
            </div>
            <div class="listupd normal">
                <div class="excstf">
                    <?php
                    if (!empty($latest_episodes)) {
                        foreach ($latest_episodes as $episode) { ?>
                            <?php $anime = new Anime($episode["anime_id"]); ?>
                            <?php $episode = new Episode($episode["id"]); ?>
                            <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                                <div class="bsx">
                                    <a href="<?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $episode->getEpisode() . "-" . $episode->getType(); ?>" itemprop="url" title="<?= $anime->getName() . " " . $lang["episode"] . " " . $episode->getEpisode() ?>" class="tip" rel="18">
                                        <div class="limit">
                                            <?php if ($anime->getStatus() == 2) { ?>
                                                <div class="status Completed"><?= $lang["completed"] ?></div>
                                            <?php } ?>
                                            <div class="typez TV"><?= $anime->convertType() ?></div>
                                            <div class="ply"><i class="far fa-play-circle"></i></div>
                                            <div class="bt">
                                                <span class="epx">
                                                    <?= $lang["ep"] ?> <?= $episode->getEpisode() ?>
                                                </span>
                                                <span class="sb Sub">
                                                    <?= $episode->convertType() ?>
                                                </span>
                                            </div>
                                            <img src="<?= $anime->getCover() ?>" class="ts-post-image wp-post-image attachment-medium_large size-medium_large loading" loading="lazy" itemprop="image" title="<?= $anime->getName() . " " . $lang["episode"] . " " . $episode->getEpisode() ?>" alt="<?= $anime->getName() . " " . $lang["episode"] . " " . $episode->getEpisode() ?>" width="247" height="350" />
                                        </div>
                                        <div class="tt"><?= $anime->getName() . " " . $lang["episode"] . " " . $episode->getEpisode() ?><h2 itemprop="headline"><?= $anime->getName() . " " . $lang["episode"] . " " . $episode->getEpisode() ?></h2>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        <?php }
                    } else { ?>
                        <p><?= $lang["there_are_no_episodes_on_this_page"] ?></p>
                    <?php } ?>
                </div>
                <div class="hpage">
                    <a href="<?= $config["url"] ?>page/1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                    <a href="<?= $config["url"] . "page/" . $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                    <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                    <a href="<?= $config["url"] ?>page/<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                    <a href="<?= $config["url"] ?>page/<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="bixbox bbnofrm">
            <div class="releases">
                <h3><?= $lang["latest_animes"] ?></h3> <a class="vl" href="<?= $config["url"] ?>animes?status=&type=&sub=&order=ADDED+DESC"><?= $lang["view_all"] ?></a>
            </div>
            <div class="listupd">
                <div class="excstf">
                    <?php foreach ($latest_anime as $anime) { ?>
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
                <div class="clear"></div>
                <div class="bvlcen"><a class="bvl" href="<?= $config["url"] ?>animes?status=&type=&sub=&order=ADDED+DESC"><?= $lang["view_all"] ?></a></div>
            </div>
        </div>
    </div>