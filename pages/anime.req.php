<?php

// pages/anime.req.php - Mononoke

$id =  mysqli_real_escape_string($conn, $_GET["id"]);
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$id' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);
if($user["level"]==10 || $user["level"]==0) {
    $episodes_sub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `type`='sub' ORDER BY `episode` ASC");
    $episodes_dub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `type`='dub' ORDER BY `episode` ASC");
    $episodes_raw = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `type`='raw' ORDER BY `episode` ASC");
} else {
    $episodes_sub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `deleted`='0' AND `type`='sub' ORDER BY `episode` ASC");
    $episodes_dub = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `deleted`='0' AND `type`='dub' ORDER BY `episode` ASC");
    $episodes_raw = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `deleted`='0' AND `type`='raw' ORDER BY `episode` ASC");
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
                <?php if(!empty($anime["description"])) { ?>
                <div class="well well-sm">
                    <?= bbconvert($anime["description"]) ?>
                </div>
                <?php } ?>
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
            <ul class="contentx nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#sub" aria-controls="sub" role="tab" data-toggle="tab"><?= glyph("subtitles",$lang["add_episode"]["type_sub"]) ?> <?= $lang["add_episode"]["type_sub"] ?></a></li>
                <li role="presentation"><a href="#dub" aria-controls="dub" role="tab" data-toggle="tab"><?= glyph("sound-dolby",$lang["add_episode"]["type_dub"]) ?> <?= $lang["add_episode"]["type_dub"] ?></a></li>
                <li role="presentation"><a href="#raw" aria-controls="raw" role="tab" data-toggle="tab"><?= glyph("jpy",$lang["add_episode"]["type_raw"]) ?> <?= $lang["add_episode"]["type_raw"] ?></a></li>
            </ul>
            <div class="tab-content contentx">
                <div role="tabpanel" class="tab-pane fade in active" id="sub">
                    <?php if(mysqli_num_rows($episodes_sub)!==0) { ?>
                    <div class="table-responsive">
                        <table class="table table-stripped table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th width="70%"><?= glyph("film",$lang["episode"]["name"]) ?> <?= $lang["episode"]["name"] ?></th>
                                    <th width="30%" class="text-right"><?= glyph("time",$lang["episode"]["released"]) ?> <?= $lang["episode"]["released"] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $episodes_sub->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <a href="<?= $config["url"] ?>watch/<?= $id ?>-<?= $row["episode"] ?>"><?= $lang["episode"]["name"]." ".$row["episode"] ?></a>
                                    </td>
                                    <td class="text-right"><span title="<?= $row["added"] ?>"><?= ago($row["added"]) ?></span></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } else { ?>
                    <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["anime"]["no_ep"] ?>
                    <?php } ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="dub">
                    <?php if(mysqli_num_rows($episodes_dub)!==0) { ?>
                    <div class="table-responsive">
                        <table class="table table-stripped table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th width="70%"><?= glyph("film",$lang["episode"]["name"]) ?> <?= $lang["episode"]["name"] ?></th>
                                    <th width="30%" class="text-right"><?= glyph("time",$lang["episode"]["released"]) ?> <?= $lang["episode"]["released"] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $episodes_dub->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <a href="<?= $config["url"] ?>watch/<?= $id ?>-<?= $row["episode"] ?>"><?= $lang["episode"]["name"]." ".$row["episode"] ?></a>
                                    </td>
                                    <td class="text-right"><span title="<?= $row["added"] ?>"><?= ago($row["added"]) ?></span></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } else { ?>
                    <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["anime"]["no_ep"] ?>
                    <?php } ?>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="raw">
                    <?php if(mysqli_num_rows($episodes_raw)!==0) { ?>
                    <div class="table-responsive">
                        <table class="table table-stripped table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th width="70%"><?= glyph("film",$lang["episode"]["name"]) ?> <?= $lang["episode"]["name"] ?></th>
                                    <th width="30%" class="text-right"><?= glyph("time",$lang["episode"]["released"]) ?> <?= $lang["episode"]["released"] ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $episodes_raw->fetch_assoc()): ?>
                                <tr>
                                    <td>
                                        <a href="<?= $config["url"] ?>watch/<?= $id ?>-<?= $row["episode"] ?>"><?= $lang["episode"]["name"]." ".$row["episode"] ?></a>
                                    </td>
                                    <td class="text-right"><span title="<?= $row["added"] ?>"><?= ago($row["added"]) ?></span></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } else { ?>
                    <?= glyph("info-sign",$lang["error"]) ?> <?= $lang["anime"]["no_ep"] ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade in panel panel-default" id="comments">
        <div class="panel-body">
            Comments (WIP)
        </div>
    </div>
</div>
<?php } ?>
