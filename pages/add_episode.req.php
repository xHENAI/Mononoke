<?php

// pages/add_episode.req.php - Mononoke

$id = mysqli_real_escape_string($conn, $_GET["id"]);
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$id' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);

if(!empty($anime["id"])) {
    
?>

<title><?= $lang["add_episode"]["title"] ?> <?= $anime["name"] ?> | <?= $config["name"] ?></title>
<h3><?= $lang["add_episode"]["title"] ?> <b><?= $anime["name"] ?></b> <small><a href="<?= $config["url"] ?>anime/<?= $anime["id"] ?>">(<?= $lang["add_episode"]["view_anime"] ?>)</a></small></h3>
<form class="form-horizontal" method="post" action="" name="add_episode">
    <div class="form-group">
        <label class="control-label col-sm-3" for="animename"><?= $lang["anime"]["name"] ?></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" readonly value="<?= $anime["name"] ?>" id="animename">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="animeepisode"><?= $lang["episode"]["name"] ?></label>
        <div class="col-sm-9">
            <input type="number" class="form-control" placeholder="" required value="0">
        </div>
    </div>
</form>


<?php } else { ?>

<title>Error! | <?= $config["name"] ?></title>
<p><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["add_episode"]["error"] ?></p>

<?php } ?>
