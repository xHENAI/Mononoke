<div class="wrapper">
    <div class="postbody" style="padding:0">
        <div class="newseason">
            <h1 style="text-align: center"><?= $fan->getName() ?></h1>
            <div class="listseries" style="width:350px;margin-left:auto;margin-right:auto;">
                <img style="border-radius: 50%; width: 250px; margin-left: auto; margin-right: auto" src="<?= $fan->getImage() ?>" alt="<?= $fan->getName() ?>'s Avatar" title="<?= $fan->getName() ?>'s Avatar">
                <div class="searchx topcon" style="text-align: center">
                    <?php if ($fan->getLevel() == 0) { ?>
                        <p style="color:red"><b><?= $lang["this_user_is_an_administrator"] ?></b></p>
                    <?php } elseif ($fan->getLevel() == 10) { ?>
                        <p style="color:red"><b><?= $lang["this_user_is_a_moderator"] ?></b></p>
                    <?php } ?>
                    <?php if ($fan->isPublic() == true || $fan->getId() == $user->getId()) { ?>
                        <?php if (!empty($fan->getTwitter())) { ?>
                            <p><b><?= $lang["twitter"] ?>:</b> <a href="https://twitter.com/<?= $fan->getTwitter() ?>" target="_blank">@<?= $fan->getTwitter() ?></a></p>
                        <?php } ?>
                        <?php if (!empty($fan->getDiscord())) { ?>
                            <p><b><?= $lang["discord"] ?>:</b> <?= $fan->getDiscord() ?></p>
                        <?php } ?>
                        <?php if (!empty($fan->getWebsite())) { ?>
                            <p><b><?= $lang["website"] ?>:</b> <a href="https://<?= $fan->getWebsite() ?>" target="_blank"><?= $fan->getWebsite() ?></a></p>
                        <?php } ?>
                        <p><a href="<?= $config["url"] ?>bookmarks/?user=<?= $fan->getName() ?>"><?= $fan->getName() . $lang["s_bookmarks"] ?></a></p>
                    <?php } else { ?>
                        <p><?= $lang["this_users_profile_isnt_public"] ?></p>
                    <?php } ?>
                    <p><b><?= $lang["joined"] ?>:</b> <?= convertTime($fan->getJoined()) ?></p>
                </div>
            </div>
        </div>
    </div>