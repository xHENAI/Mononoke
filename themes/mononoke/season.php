<div id="wrapper">
    <div class="postbody">
        <div class="newseason">
            <h1><?= $lang["season"] . ": " . $season->getName() ?></h1>
            <div class="listseries">
                <?php foreach ($animes as $anime) { ?>
                    <?php $anime = new Anime($anime["id"]); ?>
                    <?php $genre = $anime->convertTags($anime->getGenres()); ?>
                    <?php $colorxd = randomColor(); ?>
                    <div class="card">
                        <div class="card-box"> <a href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/" title="<?= $anime->getName() ?>" rel="tab">
                                <div class="card-thumb"> <img width="225" height="318" src="<?= $anime->getCover() ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?= $anime->getName() ?>">
                                    <div class="card-title">
                                        <h2><?= $anime->getName() ?></h2>
                                        <!-- <span class="studio <?= $colorxd ?>"> -->
                                        <!-- </span> -->
                                    </div>
                                </div>
                            </a>
                            <div class="card-info">
                                <div class="card-info-top">
                                    <div class="stats">
                                        <div class="left"> <span><?= $anime->countEpisodes() ?> <?= $lang["episodes"] ?> · <?= $anime->convertType() ?></span> <span class="status"><?= $anime->convertStatus() ?></span> <span class="alternative"><?= $anime->getOtherNames() ?></span></div>
                                        <div class="right <?= $colorxd ?>"> <span>-.--</span></div>
                                    </div>
                                    <div class="desc">
                                        <p><?= $anime->getSynopsis() ?></p>
                                    </div>
                                </div>
                                <div class="card-info-bottom <?= $colorxd ?>">
                                    <?php foreach ($genre as $gnr) { ?>
                                        <a href="<?= $config["url"] ?>genre/<?= $gnr["slug"] ?>/">
                                            <?= $gnr["name"] ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="hpage">
                <a href="<?= $config["url"] ?>season/<?= $season->getSlug() ?>/page/1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                <a href="<?= $config["url"] ?>season/<?= $season->getSlug() ?>/page/<?= $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                <a href="<?= $config["url"] ?>season/<?= $season->getSlug() ?>/page/<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                <a href="<?= $config["url"] ?>season/<?= $season->getSlug() ?>/page/<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>