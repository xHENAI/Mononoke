<?php

$id = $_GET["id"];
$user = $conn->query("SELECT * FROM `user` WHERE `id`='$id' LIMIT 1");
$user = mysqli_fetch_assoc($user);

if(!empty($user["id"])) {
    $comments1 = $conn->query("SELECT COUNT(*) AS total FROM `anime_comments` WHERE `user`='$id'");
    $comments2 = $conn->query("SELECT COUNT(*) AS total FROM `episode_comments` WHERE `user`='$id'");
    $comments3 = $comments1["total"]+$comments2["total"];
?>

<?php if($user["public_profile"]==1) { ?>

<title><?= $user["username"] ?> (User) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("education","User") ?> <?= $user["username"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="150px" rowspan="5"><img src='<?= $user["image"] ?>' width='100%' title='Logo of <?= $user["username"] ?>' alt='Logo of <?= $user["Username"] ?>' /></td>
            <th width="105px">Level:</th>
            <td><?= convert_level($user["level"]) ?></td>
        </tr>
        <tr>
            <th>Uses Theme:</th>
            <td><?= convert_theme($user["theme"]) ?></td>
        </tr>
        <tr>
            <th>Watchlist:</th>
            <td><?php if($user["public_watchlist"]==1) { ?><a href="<?= $config["url"] ?>watchlist/<?= $user["id"] ?>">View it here! (Public)</a><?php } else { ?>This user's Watchlist ist private!<?php } ?></td>
        </tr>
    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("comment","Comments") ?> Comments <span class="badge"><?= $comments3 ?></span></h3>
    </div>
    <div class="panel-body">
        <?php if($comments3==0) { ?>
        <?= glyph("info-sign","Error") ?> This user didn't comment on anything yet!
        <?php } else { ?>

        <?php } ?>
    </div>
</div>

<?php } else { ?>

<title><?= $user["username"] ?> (User) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("education","User") ?> <?= $user["username"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="150px" rowspan="5"><img src='<?= $user["image"] ?>' width='100%' title='Logo des Nutzers' alt='Logo des Nutzers' /></td>
            <td><?= glyph("info-sign","Error") ?> This user's profile isn't public!</td>
        </tr>
    </table>
</div>

<?php } ?>

<?php } else { ?>

<title>Error (User) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("info-sign","Error") ?> Error</h3>
    </div>
    <div class="panel-body">
        User not found!
    </div>
</div>

<?php } ?>
