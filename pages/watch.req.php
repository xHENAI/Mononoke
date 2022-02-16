<?php

// pages/watch.req.php - Mononoke

$aid = mysqli_real_escape_string($conn, $_GET["id"]);
$ep = mysqli_real_escape_string($conn, $_GET["ep"]);
$type = mysqli_real_escape_string($conn, $_GET["type"]);

$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$aid' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);
$episode = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `episode`='$ep' AND `type`='$type' LIMIT 1");
$episode = mysqli_fetch_assoc($episode);

if($user["level"]==10 || $user["level"]==0) {
    $episodes_sub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `type`='sub' ORDER BY `episode` ASC");
    $episodes_dub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `type`='dub' ORDER BY `episode` ASC");
    $episodes_raw = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `type`='raw' ORDER BY `episode` ASC");
    $next_episode = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `type`='$type' AND `episode` > $ep LIMIT 1");
    $prev_episode = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `type`='$type' AND `episode` < $ep ORDER BY `episode` DESC LIMIT 1");
} else {
    $episodes_sub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `deleted`='0' AND `type`='sub' ORDER BY `episode` ASC");
    $episodes_dub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `deleted`='0' AND `type`='dub' ORDER BY `episode` ASC");
    $episodes_raw = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `deleted`='0' AND `type`='raw' ORDER BY `episode` ASC");
    $next_episode = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `deleted`='0' AND `type`='$type' AND `episode` > $ep LIMIT 1");
    $prev_episode = $conn->query("SELECT * FROM `episode` WHERE `anime`='$aid' AND `deleted`='0' AND `type`='$type' AND `episode` < $ep ORDER BY `episode` DESC LIMIT 1");
}

$next_episode = mysqli_fetch_assoc($next_episode);
$prev_episode = mysqli_fetch_assoc($prev_episode);

$comments_total = $conn->query("SELECT COUNT(*) AS total FROM `episode_comments` WHERE `episode`='".$episode["id"]."' AND `deleted`='0'");
$comments_total = mysqli_fetch_assoc($comments_total);

if(empty($anime["id"]) || empty($episode["id"]) || ($anime["public"]==0 && ($user["level"]==20) || $user["level"]==30 || $user["level"]==50) || ($episode["deleted"]==1 && ($user["level"]==20) || $user["level"]==30 || $user["level"]==50)) {

?>

<title><?= $lang["error"] ?> (<?= $lang["watch"]["title2"] ?>) | <?= $config["name"] ?></title>
<p><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["watch"]["wrong"] ?></p>

<?php } else { ?>

<title><?= $lang["watch"]["title2"] ?> <?= $anime["name"] ?> <?= $lang["episode"]["name"] ?> <?= $ep ?> (<?= $type ?>) | <?= $config["name"] ?></title>
<h3><?= $lang["watch"]["title2"] ?> <a href="<?= $config["url"] ?>anime/<?= $aid ?>"><b><?= $anime["name"] ?></b></a> - <?= $lang["episode"]["name"] ?> <?= $ep ?> (<?= $type ?>) <?php if($user["level"]==10 || $user["level"]==0) { ?><small>(<a href="<?= $config["url"] ?>edit_episode/<?= $ep ?>"><?= $lang["watch"]["edit"] ?></a>)</small><?php } ?></h3>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">External Player</h3>
    </div>
    <?= convert_player($episode["host"], $episode["url"]) ?>
    <div class="text-center panel-heading">
        <a href="#" onclick="skipIntro()" class="label label-primary"><?= glyph("forward",$lang["watch"]["skip"]) ?> <?= $lang["watch"]["skip"] ?></a>
        <a href="#" onclick="toggleDimLights()" class="label label-info"><?= glyph("sunglasses",$lang["watch"]["lights"]) ?> <?= $lang["watch"]["lights"] ?></a>
        <a href="<?= $episode["url"] ?>" target="_blank" class="label label-info"><?= glyph("new-window",$lang["watch"]["open"]) ?> <?= $lang["watch"]["open"] ?></a>
        <?php if(!empty($prev_episode["episode"])) { ?>
        <a href="<?= $config["url"]."watch/".$aid."-".$prev_episode["episode"]."-".$type ?>" class="label label-primary"><?= glyph("fast-backward",$lang["watch"]["prev_ep"]) ?> <?= $lang["watch"]["prev_ep"] ?></a>
        <?php } else { ?>
        <a href="#" class="label label-danger"><?= glyph("fast-backward",$lang["watch"]["prev_ep"]) ?> <?= $lang["watch"]["prev_ep"] ?></a>
        <?php } ?>
        <?php if(!empty($next_episode["episode"])) { ?>
        <a href="<?= $config["url"]."watch/".$aid."-".$next_episode["episode"]."-".$type ?>" class="label label-primary"><?= glyph("fast-forward",$lang["watch"]["next_ep"]) ?> <?= $lang["watch"]["next_ep"] ?></a>
        <?php } else { ?>
        <a href="#" class="label label-danger"><?= glyph("fast-forward",$lang["watch"]["next_ep"]) ?> <?= $lang["watch"]["next_ep"] ?></a>
        <?php } ?>
    </div>
</div>

<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" <?php if($episode["type"]=="sub") { ?>class="active" <?php } ?>><a href="#sub" aria-controls="sub" role="tab" data-toggle="tab"><?= glyph("subtitles",$lang["add_episode"]["type_sub"]) ?> <?= $lang["add_episode"]["type_sub"] ?></a></li>
        <li role="presentation" <?php if($episode["type"]=="dub") { ?>class="active" <?php } ?>><a href="#dub" aria-controls="dub" role="tab" data-toggle="tab"><?= glyph("sound-dolby",$lang["add_episode"]["type_dub"]) ?> <?= $lang["add_episode"]["type_dub"] ?></a></li>
        <li role="presentation" <?php if($episode["type"]=="raw") { ?>class="active" <?php } ?>><a href="#raw" aria-controls="raw" role="tab" data-toggle="tab"><?= glyph("jpy",$lang["add_episode"]["type_raw"]) ?> <?= $lang["add_episode"]["type_raw"] ?></a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in <?php if($episode["type"]=="sub") { ?>active<?php } ?>" id="sub">
            <?php if(mysqli_num_rows($episodes_sub)!==0) { ?>
            <ul class="pagination" style="margin-top: 0">
                <?php while ($row = $episodes_sub->fetch_assoc()): ?>
                <li <?php if($row["episode"]==$ep && $row["type"]==$type) echo 'class="active"'; ?>>
                    <?php if($row["deleted"]==1) { ?><?= glyph("trash","Deleted") ?><?php } ?>
                    <a href="<?= $config["url"] ?>watch/<?= $aid ?>-<?= $row["episode"] ?>-sub"><?php if($row["episode"]>=$ep) { ?><?= glyph("play","Watch") ?><?php } ?> <?= $row["episode"] ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php } else { ?>
            <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["anime"]["no_ep"] ?>
            <?php } ?>
        </div>
        <div role="tabpanel" class="tab-pane fade in <?php if($episode["type"]=="dub") { ?>active<?php } ?>" id="dub">
            <?php if(mysqli_num_rows($episodes_dub)!==0) { ?>
            <ul class="pagination" style="margin-top: 0">
                <?php while ($row = $episodes_dub->fetch_assoc()): ?>
                <li <?php if($row["episode"]==$ep && $row["type"]==$type) echo 'class="active"'; ?>>
                    <?php if($row["deleted"]==1) { ?><?= glyph("trash","Deleted") ?><?php } ?>
                    <a href="<?= $config["url"] ?>watch/<?= $aid ?>-<?= $row["episode"] ?>-dub"><?php if($row["episode"]>=$ep) { ?><?= glyph("play","Watch") ?><?php } ?> <?= $row["episode"] ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php } else { ?>
            <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["anime"]["no_ep"] ?>
            <?php } ?>
        </div>
        <div role="tabpanel" class="tab-pane fade in panel panel-default <?php if($episode["type"]=="raw") { ?>active<?php } ?>" id="raw">
            <?php if(mysqli_num_rows($episodes_raw)!==0) { ?>
            <ul class="pagination" style="margin-top: 0">
                <?php while ($row = $episodes_raw->fetch_assoc()): ?>
                <li <?php if($row["episode"]==$ep && $row["type"]==$type) echo 'class="active"'; ?>>
                    <?php if($row["deleted"]==1) { ?><?= glyph("trash","Deleted") ?><?php } ?>
                    <a href="<?= $config["url"] ?>watch/<?= $aid ?>-<?= $row["episode"] ?>-raw"><?php if($row["episode"]>=$ep) { ?><?= glyph("play","Watch") ?><?php } ?> <?= $row["episode"] ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php } else { ?>
            <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["anime"]["no_ep"] ?>
            <?php } ?>
        </div>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title"><a role="button" data-toggle="collapse" href="#comments" aria-expanded="false" aria-controls="comments"><?= glyph("comment",$lang["profile"]["comments"]) ?> <?= $lang["profile"]["comments"] ?> (Toggle)</a> <span class="badge"><?= $comments_total["total"] ?></span></h3>
    </div>
    <div id="comments" class="panel-collapse collapse" role="tabpanel" aria-labelledby="comments">
        <div class="panel-body">
            WIP
        </div>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?= glyph("play","Anime Info") ?> Anime Info</h3>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <img src="<?= $config["url"] ?>assets/anime/<?= $aid ?>.jpg" width="100%">
        </div>
        <div class="col-sm-9" style="padding:0">
            <h3><b><a href="<?= $config["url"] ?>anime/<?= $aid ?>"><?= $anime["name"] ?></a></b></h3>
            <?php if($anime["status"]==0) { ?>
            <p><?= $lang["anime"]["status"]["0_long"] ?></p>
            <?php } elseif($anime["status"]==1) { ?>
            <p><?= $lang["anime"]["status"]["1_long"] ?></p>
            <?php } else { ?>
            <p><?= $lang["anime"]["status"]["2_long"] ?></p>
            <?php } ?>
            <?php if(!empty($anime["description"])) { ?>
            <p><?= bbconvert($anime["description"]) ?></p>
            <?php } ?>
            <p><?= display_tags($aid) ?></p>
        </div>
    </div>
</div>

<?php } ?>
