<div id="wrapper">
    <div class="postbody">
        <div class="bixbox">
            <div class="releases">
                <h1><span><?= $lang["studios"] ?></span></h1>
            </div>
            <div class="page">
                <ul class="taxindex">
                    <?php if (!empty($studios)) { ?>
                        <?php foreach ($studios as $studio) { ?>
                            <?php $studio = new Studio($studio["id"]); ?>
                            <li><a href="<?= $config["url"] ?>studio/<?= $studio->getSlug() ?>/" rel="tab"><span class="name"><?= $studio->getName() ?></span> <span class="count"><?= $studio->countAnimes() ?></span></a></li>
                        <?php } ?>
                    <?php } else { ?>
                        <?= $lang["there_are_no_studios_at_the_moment"] ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>