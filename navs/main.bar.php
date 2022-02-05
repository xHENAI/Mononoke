<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang["nav-main"]["title"] ?></h3>
    </div>
    <?php if($loggedin==true) { ?>
    <div class="list-group">
        <a href="<?= $config["url"] ?>user/<?= $user["id"] ?>" class="list-group-item"><?= glyph("user",$lang["nav-main"]["profile"]) ?> <?= $lang["nav-main"]["profile"] ?></a>
        <a href="<?= $config["url"] ?>watchlist/<?= $user["id"] ?>" class="list-group-item"><?= glyph("bookmark",$lang["nav-main"]["watchlist"]) ?> <?= $lang["nav-main"]["watchlist"] ?></a>
        <a href="<?= $config["url"] ?>follows" class="list-group-item"><?= glyph("bookmark",$lang["nav-main"]["follows"]) ?> <?= $lang["nav-main"]["follows"] ?></a>
        <a href="<?= $config["url"] ?>settings" class="list-group-item"><?= glyph("cog",$lang["nav-main"]["settings"]) ?> <?= $lang["nav-main"]["settings"] ?></a>
        <a href="<?= $config["url"] ?>signout" class="list-group-item"><?= glyph("log-out",$lang["nav-main"]["bye"]) ?> <?= $lang["nav-main"]["bye"] ?></a>
    </div>
    <?php } else { ?>
    <div class="panel-body">
        <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["nav-main"]["error"] ?>
    </div>
    <div class="list-group">
        <a href="<?= $config["url"] ?>signin" class="list-group-item "><?= glyph("log-in",$lang["nav-main"]["signin"]) ?> <?= $lang["nav-main"]["signin"] ?></a>
        <a href="<?= $config["url"] ?>signup" class="list-group-item"><?= glyph("log-in",$lang["nav-main"]["signup"]) ?> <?= $lang["nav-main"]["signup"] ?></a>
    </div>
    <?php } ?>
</div>
