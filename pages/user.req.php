<?php

// pages/user.req.php - Mononoke

$id = $_GET["id"];
$vuser = $conn->query("SELECT * FROM `user` WHERE `id`='$id' LIMIT 1");
$vuser = mysqli_fetch_assoc($vuser);

if(!empty($user["id"])) {
    $comments1 = $conn->query("SELECT COUNT(*) AS total FROM `anime_comments` WHERE `user`='$id'");
    $comments2 = $conn->query("SELECT COUNT(*) AS total FROM `episode_comments` WHERE `user`='$id'");
    $comments3 = $comments1["total"]+$comments2["total"];
    
    //errors for literally no reason :( $forumposts1 = $conn->query("SELECT COUNT(*) AS total FROM `forum_posts` WHERE `user`='$id'");
    //$forumposts2 = $conn->query("SELECT COUNT(*) AS total FROM `forum_threads` WHERE `user`='$id'");
    //$forumposts3 = $forumposts1["total"]+$forumposts2["total"];
    //$forumposts3 = 0;
?>

<?php if($vuser["public_profile"]==1) { ?>

<title><?= $vuser["username"] ?> (User) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("education","User") ?> <?= $vuser["username"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="150px" rowspan="5"><img src='<?= $vuser["image"] ?>' width='100%' title='Logo of <?= $vuser["username"] ?>' alt='Logo of <?= $vuser["Username"] ?>' /></td>
            <th width="105px">Level:</th>
            <td><?= convert_level($vuser["level"]) ?></td>
        </tr>
        <tr>
            <th>Uses Theme:</th>
            <td><?= convert_theme($vuser["theme"]) ?></td>
        </tr>
        <tr>
            <th>Watchlist:</th>
            <td><?php if($vuser["public_watchlist"]==1) { ?><a href="<?= $config["url"] ?>watchlist/<?= $vuser["id"] ?>">View it here! (Public)</a><?php } else { ?>This user's Watchlist ist private!<?php } ?></td>
        </tr>
        <tr>
            <th>Statistics:</th>
            <td><?= glyph("comment","Anime & Episode Comments") ?> <?= $comments3 ?>
                <!--, <?= glyph("text-size","Forum Posts") ?> <?= $forumposts3 ?>-->
            </td>
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
        Kommentare kommen hier hin
        <?php } ?>
    </div>
</div>

<?php } else { ?>

<title><?= $vuser["username"] ?> (User) | <?= $config["name"] ?></title>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("education","User") ?> <?= $vuser["username"] ?></h3>
    </div>
    <table class="table table-condensed">
        <tr>
            <td width="150px" rowspan="5"><img src='<?= $vuser["image"] ?>' width='100%' title='Logo des Nutzers' alt='Logo des Nutzers' /></td>
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
