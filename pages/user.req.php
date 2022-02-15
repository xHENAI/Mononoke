<?php

// pages/user.req.php - Mononoke

$id = mysqli_real_escape_string($conn, $_GET["id"]);
$vuser = $conn->query("SELECT * FROM `user` WHERE `id`='$id' LIMIT 1");
$vuser = mysqli_fetch_assoc($vuser);

if(!empty($vuser["id"])) {
    $comments1 = $conn->query("SELECT COUNT(*) AS total FROM `anime_comments` WHERE `user`='$id'");
    $comments1 = mysqli_fetch_assoc($comments1);
    $comments2 = $conn->query("SELECT COUNT(*) AS total FROM `episode_comments` WHERE `user`='$id'");
    $comments2 = mysqli_fetch_assoc($comments2);
    $comments3 = $comments1["total"] + $comments2["total"];
    
    $forumposts1 = $conn->query("SELECT COUNT(*) AS total FROM `forum_posts` WHERE `user`='$id'");
    $forumposts1 = mysqli_fetch_assoc($forumposts1);
    $forumposts2 = $conn->query("SELECT COUNT(*) AS total FROM `forum_threads` WHERE `user`='$id'");
    $forumposts2 = mysqli_fetch_assoc($forumposts2);
    $forumposts3 = $forumposts1["total"]+$forumposts2["total"];
?>

<?php if($vuser["public_profile"]==1) { ?>

<title><?= $vuser["username"] ?> (<?= $lang["profile"]["title"] ?>) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("education","User") ?> <?= $vuser["username"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="150px" rowspan="5"><img src='<?= $vuser["image"] ?>' width='100%' title='Logo of <?= $vuser["username"] ?>' alt='Logo of <?= $vuser["Username"] ?>' /></td>
            <th width="105px"><?= $lang["profile"]["level"] ?></th>
            <td><?= convert_level($vuser["level"]) ?></td>
        </tr>
        <tr>
            <th><?= $lang["profile"]["theme"] ?></th>
            <td><?= convert_theme($vuser["theme"]) ?></td>
        </tr>
        <tr>
            <th><?= $lang["profile"]["watchlist"] ?></th>
            <td><?php if($vuser["public_watchlist"]==1) { ?><a href="<?= $config["url"] ?>watchlist/<?= $vuser["id"] ?>"><?= $lang["profile"]["watchlist_1"] ?></a><?php } else { ?><?= $lang["profile"]["watchlist_2"] ?><?php } ?></td>
        </tr>
        <tr>
            <th><?= $lang["profile"]["stats"] ?></th>
            <td><?= glyph("comment",$lang["profile"]["stats_comments"]) ?> <?= $comments3 ?>
                , <?= glyph("text-size",$lang["profile"]["stats_forum"]) ?> <?= $forumposts3 ?>
            </td>
        </tr>
    </table>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("comment",$lang["profile"]["comments"]) ?> <?= $lang["profile"]["comments"] ?> <span class="badge"><?= $comments3 ?></span></h3>
    </div>
    <div class="panel-body">
        <?php if($comments3==0) { ?>
        <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["profile"]["no_comments"] ?>
        <?php } else { ?>
        Kommentare kommen hier hin
        <?php } ?>
    </div>
</div>

<?php } else { ?>

<title><?= $vuser["username"] ?> (<?= $lang["profile"]["title"] ?>) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("education","User") ?> <?= $vuser["username"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="150px" rowspan="5"><img src='<?= $vuser["image"] ?>' width='100%' title='Logo des Nutzers' alt='Logo des Nutzers' /></td>
            <td><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["profile"]["private"] ?></td>
        </tr>
    </table>
</div>

<?php } ?>

<?php } else { ?>

<title><?= $lang["error"] ?> (<?= $lang["profile"]["title"] ?>) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["error"] ?> </h3>
    </div>
    <div class="panel-body">
        <?= $lang["profile"]["none"] ?>
    </div>
</div>

<?php } ?>
