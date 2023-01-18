<div id="wrapper">
    <div class="postbody">
        <div class="bixbox">
            <div class="releases">
                <h1><span><?= $lang["seasons"] ?></span></h1>
            </div>
            <div class="page">
                <ul class="taxindex">
                    <?php if (!empty($seasons)) { ?>
                        <?php foreach ($seasons as $season) { ?>
                            <?php $season = new Season($season["id"]); ?>
                            <li><a href="<?= $config["url"] ?>season/<?= $season->getSlug() ?>/" rel="tab"><span class="name"><?= $season->getName() ?></span> <span class="count"><?= $season->countAnimes() ?></span></a></li>
                        <?php } ?>
                    <?php } else { ?>
                        <?= $lang["there_are_no_seasons_at_the_moment"] ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>