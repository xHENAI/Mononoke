<?php

// pages/anime.req.php - Mononoke

$id =  mysqli_real_escape_string($conn, $_GET["id"]);
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$id' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);
if($user["level"]==10 || $user["level"]==0) {
    $episodes = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id'");
} else {
    $episodes = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `deleted`='0'");
}

if(empty($anime["id"]) || ($anime["public"]==0 && ($user["level"]==20 || $user["level"]==30 || $user["level"]==50))) { 
?>
<title><?= $lang["error"] ?> (<?= $lang["anime"]["anime"] ?>) | <?= $config["name"] ?></title>
<p><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["anime"]["error"] ?></p>
<?php } else { ?>
<title><?= $anime["name"] ?> (<?= $lang["anime"]["anime"] ?>) | <?= $config["name"] ?></title>
<div class="panel panel-danger">
    <div id="anime-bg" style="background: url('<?= $config["url"] ?>assets/anime/<?= $anime["id"] ?>.<?= $anime["image"] ?>');background-repeat: no-repeat;background-position: center;background-size: cover;z-index: 0;"></div>
    <div class="panel-body contentx">
        <div class="row">
            <div class="col-sm-3">
                <img src="<?= $config["url"] ?>assets/anime/<?= $anime["id"] ?>.<?= $anime["image"] ?>" style="width:100%">
            </div>
            <div class="col-sm-9">
                <h3><?= $anime["name"] ?></h3>
                <p><i><?php if(!empty($anime["alternates"])) { echo $anime["alternates"]; } else { echo "This Anime doesn't have any other names!"; } ?></i></p>
                <div class="well well-sm">
                    <?= bbconvert($anime["description"]) ?>
                </div>
                <?php if($anime["status"]==0) { ?>
                <p><?= $lang["anime"]["status"]["0_long"] ?></p>
                <?php } elseif($anime["status"]==1) { ?>
                <p><?= $lang["anime"]["status"]["1_long"] ?></p>
                <?php } else { ?>
                <p><?= $lang["anime"]["status"]["2_long"] ?></p>
                <?php } ?>
                <?php if(!empty($anime["year"])) { ?><p><?= $lang["anime"]["year"] ?> <?= $anime["year"] ?></p><?php } else { ?><p><?= $lang["anime"]["unknown_year"] ?></p><?php } ?>
                <?php if($user["level"]==10 || $user["level"]==0) { ?>
                <hr>
                <a href="<?= $config["url"] ?>edit_anime/<?= $anime["id"] ?>" class="btn btn-warning"><?= glyph("edit",$lang["edit_anime"]["title"]) ?> <?= $lang["edit_anime"]["title"] ?></a> <a href="<?= $config["url"] ?>add_episode/<?= $anime["id"] ?>" class="btn btn-success"><?= glyph("plus-sign",$lang["episode"]["new"]) ?> <?= $lang["episode"]["new"] ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($anime["9anime"]) || !empty($anime["animixplay"]) || !empty($anime["gogoanime"]) || !empty($anime["twist"])) { ?>
<div class="panel panel-danger contentx">
    <div class="panel-heading">
        <h3 class="panel-title">
            <b><?= $lang["anime"]["watch_other"] ?></b>
            <?php if(!empty($anime["9anime"])) { ?>
            <a href="<?= $anime["9anime"] ?>" target="_blank">[9Anime]</a>
            <?php } ?>
            <?php if(!empty($anime["animixplay"])) { ?>
            <a href="<?= $anime["animixplay"] ?>" target="_blank">[AniMixPlay]</a>
            <?php } ?>
            <?php if(!empty($anime["gogoanime"])) { ?>
            <a href="<?= $anime["gogoanime"] ?>" target="_blank">[GogoAnime]</a>
            <?php } ?>
            <?php if(!empty($anime["twist"])) { ?>
            <a href="<?= $anime["twist"] ?>" target="_blank">[AnimeTwist]</a>
            <?php } ?>
        </h3>
    </div>
</div>
<?php } ?>
<ul class="contentx nav nav-pills" role="tablist">
    <li role="presentation" class="active"><a href="#episodes" aria-controls="episodes" role="tab" data-toggle="tab"><?= glyph("play",$lang["anime"]["episodes"]) ?> <?= $lang["anime"]["episodes"] ?></a></li>
    <li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab"><?= glyph("comment",$lang["anime"]["comments"]) ?> <?= $lang["anime"]["comments"] ?></a></li>
</ul>
<div class="tab-content contentx">
    <br>
    <div role="tabpanel" class="tab-pane fade in active panel panel-default" id="episodes">
        <div class="panel-body">
            Episodes (WIP)
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade in panel panel-default" id="comments">
        <div class="panel-body">
            Comments (WIP)
        </div>
    </div>
</div>
<?php } ?>
