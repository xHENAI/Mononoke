<?php

// pages/add_episode.req.php - Mononoke

$id = mysqli_real_escape_string($conn, $_GET["id"]);
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$id' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);

$error = false;
$error_msg = "";

if(!empty($anime["id"])) {
    
    if(isset($_POST["add_episode"])) {
        $episode = mysqli_real_escape_string($conn, $_POST["episode"]);
        $type = mysqli_real_escape_string($conn, $_POST["type"]);
        $host = mysqli_real_escape_string($conn, $_POST["host"]);
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $check = $conn->query("SELECT * FROM `episode` WHERE `anime`='$id' AND `episode`='$episode' AND `type`='$type' LIMIT 1");
        if(mysqli_num_rows($check)==1) {
            $error = true;
            $error_msg = "This episode exists already!";
        }
        if($error==false) {
            $conn->query("INSERT INTO `episode`(`anime`,`episode`,`type`,`host`,`url`,`deleted`) VALUES('$id','$episode','$type','$host','$url','0')");
        }
    }
    
?>

<title><?= $lang["add_episode"]["title"] ?> <?= $anime["name"] ?> | <?= $config["name"] ?></title>
<h3><?= $lang["add_episode"]["title"] ?> <b><?= $anime["name"] ?></b> <small><a href="<?= $config["url"] ?>anime/<?= $anime["id"] ?>">(<?= $lang["add_episode"]["view_anime"] ?>)</a></small></h3>
<form class="form-horizontal" method="post" action="" name="add_episode">
    <div class="form-group">
        <label class="control-label col-sm-3" for="animename"><?= $lang["anime"]["name"] ?></label>
        <div class="col-sm-9">
            <input required type="text" class="form-control" readonly value="<?= $anime["name"] ?>" id="animename">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="animeepisode"><?= $lang["episode"]["name"] ?></label>
        <div class="col-sm-9">
            <input required type="number" class="form-control" id="animeepisode" name="episode" <?php if(isset($_POST["episode"])) { ?>value="<?php $ep = $_POST["episode"]; $ep++; echo $ep ?>"<?php } ?>>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="animetype"><?= $lang["add_episode"]["type"] ?></label>
        <div class="col-sm-9">
            <select required class="selectpicker form-control" name="type" id="animetype" title="Select Type...">
                <option disabled selected><?= $lang["add_episode"]["type_select"] ?></option>
                <option <?php if(isset($_POST["type"]) && $_POST["type"]=="sub") { ?>selected<?php } ?> value="sub"><?= $lang["add_episode"]["type_sub"] ?></option>
                <option <?php if(isset($_POST["type"]) && $_POST["type"]=="dub") { ?>selected<?php } ?> value="dub"><?= $lang["add_episode"]["type_dub"] ?></option>
                <option <?php if(isset($_POST["type"]) && $_POST["type"]=="raw") { ?>selected<?php } ?> value="raw"><?= $lang["add_episode"]["type_raw"] ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="animehost"><?= $lang["add_episode"]["host"] ?></label>
        <div class="col-sm-9">
            <select required class="selectpicker form-control" name="host" id="animehost" title="Select Streamhoster...">
                <option disabled selected><?= $lang["add_episode"]["host_select"] ?></option>
                <option <?php if(isset($_POST["host"]) && $_POST["host"]=="gogoplay") { ?>selected<?php } ?> value="gogoplay">GogoPlay.io</option>
                <option <?php if(isset($_POST["host"]) && $_POST["host"]=="youtube") { ?>selected<?php } ?> value="youtube">YouTube.com</option>
                <option <?php if(isset($_POST["host"]) && $_POST["host"]=="mp4upload") { ?>selected<?php } ?> value="mp4upload">mp4upload.com</option>
                <option <?php if(isset($_POST["host"]) && $_POST["host"]=="streamtape") { ?>selected<?php } ?> value="streamtape">StreamTape.com</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="animeurl"><?= $lang["add_episode"]["url"] ?></label>
        <div class="col-sm-9">
            <input required type="text" class="form-control" id="animeurl" name="url">
        </div>
    </div>
    <button class="btn btn-success col-sm-offset-3" type="submit" name="add_episode"><?= glyph("plus-sign",$lang["add_episode"]["add"]) ?> <?= $lang["add_episode"]["add"] ?></button>
    <?php if($error==true) { ?>
    <p class="col-sm-offset-3" style="color:red"><?= $error_msg ?></p>
    <?php } ?>
</form>


<?php } else { ?>

<title><?= $lang["error"] ?> | <?= $config["name"] ?></title>
<p><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["add_episode"]["error"] ?></p>

<?php } ?>
