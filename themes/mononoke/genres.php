<div id="wrapper">
    <div class="postbody">
        <div class="bixbox">
            <div class="releases">
                <h1><span><?= $lang["genres"] ?></span></h1>
            </div>
            <div class="page">
                <ul class="taxindex">
                    <?php foreach ($genres as $genre) { ?>
                        <?php $genre = new Genre($genre["id"]); ?>
                        <li><a href="<?= $config["url"] ?>genre/<?= $genre->getSlug() ?>/" title="<?= $genre->getName() ?>"><span class="name"><?= $genre->getName() ?></span> <span class="count"><?= $genre->countAnimes() ?></span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>