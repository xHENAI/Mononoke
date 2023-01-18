<div id="wrapper">
    <div class="postbody">
        <div class="bixbox bixboxarc bbnofrm">
            <div class="releases">
                <h1><span><?= $lang["users"] ?> - <?= $lang["page"] . " " . $pagination ?></span></h1>
            </div>
            <div class="mrgn">
                <div class="listupd">
                    <?php if (!empty($users)) { ?>
                        <?php foreach ($users as $usr) { ?>
                            <?php $usr = new User($usr["id"]); ?>
                            <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                                <div class="bsx" style="background: transparent;">
                                    <a href="<?= $config["url"] ?>fan/<?= $usr->getName() ?>" itemprop="url" title="<?= $usr->getName() ?>" class="tip">
                                        <!-- <div class="limit"> -->
                                            <img src="<?= $usr->getImage() ?>" style="border-radius: 50%" class="loading" loading="lazy" itemprop="image" title="<?= $usr->getName() ?>" width="100%" height="100px" alt="<?= $usr->getName() ?>'s <?= $lang["avatar"] ?>">
                                        <!-- </div> -->
                                        <div class="tt">
                                            <?= $usr->getName() ?><h2 itemprop="headline"><?= $usr->getName() ?></h2>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        <?php }
                    } else { ?>
                        <p>There are no Users on this page!</p>
                    <?php } ?>
                </div>
                <div class="hpage">
                    <a href="<?= $config["url"] ?>users/page/1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                    <a href="<?= $config["url"] ?>users/page/<?= $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                    <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                    <a href="<?= $config["url"] ?>users/page/<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                    <a href="<?= $config["url"] ?>users/page/<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>