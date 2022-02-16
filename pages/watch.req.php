<?php

// pages/watch.req.php - Mononoke

$aid = mysqli_real_escape_string($conn, $_GET["id"]);
$ep = mysqli_real_escape_string($conn, $_GET["ep"]);

$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$aid' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);
$episode = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `episode`='$ep' LIMIT 1");
$episode = mysqli_fetch_assoc($episode);

if(empty($anime["id"]) || empty($episode["id"]) || ($anime["public"]==0 && ($user["level"]==20) || $user["level"]==30 || $user["level"]==50) || ($episode["deleted"]==1 && ($user["level"]==20) || $user["level"]==30 || $user["level"]==50)) {

?>

<title><?= $lang["error"] ?> (<?= $lang["watch"]["title2"] ?>) | <?= $config["name"] ?></title>
<p><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["watch"]["wrong"] ?></p>

<?php } else { ?>

<title><?= $lang["watch"]["title2"] ?> <?= $anime["name"] ?> <?= $lang["episode"]["name"] ?> <?= $ep ?> | <?= $config["name"] ?></title>
<h3><?= $lang["watch"]["title2"] ?> <b><?= $anime["name"] ?></b> - <?= $lang["episode"]["name"] ?> <?= $ep ?> <?php if($user["level"]==10 || $user["level"]==0) { ?><small><a href="<?= $config["url"] ?>edit_episode/<?= $ep ?>"><?= $lang["watch"]["edit"] ?></a></small><?php } ?></h3>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">External Player</h3>
    </div>
    <?= convert_player($episode["host"], $episode["url"]) ?>
</div>

<?php } ?>