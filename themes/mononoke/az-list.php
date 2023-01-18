<div id="wrapper">
    <div class="postbody">
        <div class="bixbox">
            <div class="releases">
                <h1><span><?= $lang["az-list"] ?></span></h1>
            </div>
            <div class="page">
                <div class="lista">
                    <a href="<?= $config["url"] ?>az-list/A" rel="tab">A</a>
                    <a href="<?= $config["url"] ?>az-list/B" rel="tab">B</a>
                    <a href="<?= $config["url"] ?>az-list/C" rel="tab">C</a>
                    <a href="<?= $config["url"] ?>az-list/D" rel="tab">D</a>
                    <a href="<?= $config["url"] ?>az-list/E" rel="tab">E</a>
                    <a href="<?= $config["url"] ?>az-list/F" rel="tab">F</a>
                    <a href="<?= $config["url"] ?>az-list/G" rel="tab">G</a>
                    <a href="<?= $config["url"] ?>az-list/H" rel="tab">H</a>
                    <a href="<?= $config["url"] ?>az-list/I" rel="tab">I</a>
                    <a href="<?= $config["url"] ?>az-list/J" rel="tab">J</a>
                    <a href="<?= $config["url"] ?>az-list/K" rel="tab">K</a>
                    <a href="<?= $config["url"] ?>az-list/L" rel="tab">L</a>
                    <a href="<?= $config["url"] ?>az-list/M" rel="tab">M</a>
                    <a href="<?= $config["url"] ?>az-list/N" rel="tab">N</a>
                    <a href="<?= $config["url"] ?>az-list/O" rel="tab">O</a>
                    <a href="<?= $config["url"] ?>az-list/P" rel="tab">P</a>
                    <a href="<?= $config["url"] ?>az-list/Q" rel="tab">Q</a>
                    <a href="<?= $config["url"] ?>az-list/R" rel="tab">R</a>
                    <a href="<?= $config["url"] ?>az-list/S" rel="tab">S</a>
                    <a href="<?= $config["url"] ?>az-list/T" rel="tab">T</a>
                    <a href="<?= $config["url"] ?>az-list/U" rel="tab">U</a>
                    <a href="<?= $config["url"] ?>az-list/V" rel="tab">V</a>
                    <a href="<?= $config["url"] ?>az-list/W" rel="tab">W</a>
                    <a href="<?= $config["url"] ?>az-list/X" rel="tab">X</a>
                    <a href="<?= $config["url"] ?>az-list/Y" rel="tab">Y</a>
                    <a href="<?= $config["url"] ?>az-list/Z" rel="tab">Z</a>
                    <div class="clear"></div>
                </div>
                <div class='listupd azara'>
                    <?php if (isset($animes) && !empty($animes)) { ?>
                        <?php foreach ($animes as $anime) { ?>
                            <?php $anime = new Anime($anime["id"]); ?>
                            <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                                <div class="bsx"> <a rel="tab" href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/" itemprop="url" title="<?= $anime->getName() ?>" class="tip" rel="116">
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
                                            <img src="<?= $anime->getCover() ?>" class="ts-post-image wp-post-image attachment-medium_large size-medium_large loading" loading="lazy" itemprop="image" title="<?= $anime->getName() ?>" width="247" height="350" alt="<?= $anime->getName() ?>">
                                        </div>
                                        <div class="tt">
                                            <?= $anime->getName() ?><h2 itemprop="headline"><?= $anime->getName() ?></h2>
                                        </div>
                                    </a></div>
                            </article>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="pagination">
                </div>
            </div>
        </div>
    </div>