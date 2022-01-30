<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Navigation</h3>
    </div>
    <?php if($loggedin==true) { ?>
    <div class="list-group">
        <a href="<?= $config["url"] ?>user/<?= $user["id"] ?>" class="list-group-item"><?= glyph("user","My Profile") ?> My Profile</a>
        <a href="<?= $config["url"] ?>watchlist/<?= $user["id"] ?>" class="list-group-item"><?= glyph("bookmark","My Watchlist") ?> My Watchlist</a>
        <a href="<?= $config["url"] ?>follows" class="list-group-item"><?= glyph("bookmark","My Follows") ?> My Follows</a>
        <a href="<?= $config["url"] ?>settings" class="list-group-item"><?= glyph("cog","Settings") ?> Settings</a>
        <a href="<?= $config["url"] ?>signout" class="list-group-item"><?= glyph("log-out","Signou") ?> Signout</a>
    </div>
    <?php } else { ?>
    <div class="panel-body">
        <?= glyph("info-sign","Error") ?> You are not logged in!
    </div>
    <div class="list-group">
        <a href="<?= $config["url"] ?>signin" class="list-group-item "><?= glyph("log-in","Signin") ?> Signin</a>
        <a href="<?= $config["url"] ?>signup" class="list-group-item"><?= glyph("log-in","Signup") ?> Signup</a>
    </div>
    <?php } ?>
</div>
