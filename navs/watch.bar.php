<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang["nav-watch"]["title"] ?></h3>
    </div>
    <?php if($user["level"]==0 || $user["level"]==10 || $user["level"]==20) { ?>
    <?php
    
    if(isset($_POST["track_episode"])) {
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $conn->query("INSERT INTO `episode_watchlist`(`anime`,`ep`,`epid`,`type`,`status`,`user`) VALUES('$aid','".$episode["episode"]."','".$episode["id"]."','".$episode["type"]."','$status','".$user["id"]."')");
        redirect("");
    }
    
    if(isset($_POST["track_update"])) {
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $conn->query("UPDATE `episode_watchlist` SET `ep`='$ep', `epid`='".$episode["id"]."', `status`='$status' WHERE `anime`='$aid' AND `user`='".$user["id"]."'");
        redirect("");
    }
    
    if(isset($_POST["track_delete"])) {
        $conn->query("DELETE FROM `episode_watchlist` WHERE `anime`='$aid' AND `user`='".$user["id"]."'");
        redirect("");
    }
    
    $tracked = $conn->query("SELECT * FROM `episode_watchlist` WHERE `anime`='$aid' AND `type`='".$episode["type"]."' AND `user`='".$user["id"]."' LIMIT 1");
    $tracked = mysqli_fetch_assoc($tracked);
    ?>
    <?php if(empty($tracked["id"])) { ?>
    <div class="list-group">
        <li class="list-group-item active"><?= $lang["nav-watch"]["not_tracked"] ?></li>
        <form method="post" action="" name="track_episode">
            <select required class="form-control selectpicker list-group-item" name="status">
                <option value="0"><?= $lang["nav-watch"]["status"]["0"] ?></option>
                <option selected value="1"><?= $lang["nav-watch"]["status"]["1"] ?></option>
                <option value="2"><?= $lang["nav-watch"]["status"]["2"] ?></option>
                <option value="3"><?= $lang["nav-watch"]["status"]["3"] ?></option>
                <option value="4"><?= $lang["nav-watch"]["status"]["4"] ?></option>
            </select>
            <button type="submit" name="track_episode" class="list-group-item list-group-item-success"><?= glyph("bookmark",$lang["nav-watch"]["start"]) ?> <?= $lang["nav-watch"]["start"] ?></button>
        </form>
    </div>
    <?php } else { ?>
    <div class="list-group">
        <li class="list-group-item">
            <?= $lang["nav-watch"]["last_ep"] ?> <span style="color:green"><?= $tracked["ep"] ?></span><br>
            <?= $lang["nav-watch"]["curr_ep"] ?> <span style="color:green"><?= $ep ?></span><br>
        </li>
        <form method="post" action="">
            <select required class="form-control selectpicker list-group-item" name="status">
                <option <?php if($tracked["status"]==0) { echo "selected"; } ?> value="0"><?= $lang["nav-watch"]["status"]["0"] ?></option>
                <option <?php if($tracked["status"]==1) { echo "selected"; } ?> value="1"><?= $lang["nav-watch"]["status"]["1"] ?></option>
                <option <?php if($tracked["status"]==2) { echo "selected"; } ?> value="2"><?= $lang["nav-watch"]["status"]["2"] ?></option>
                <option <?php if($tracked["status"]==3) { echo "selected"; } ?> value="3"><?= $lang["nav-watch"]["status"]["3"] ?></option>
                <option <?php if($tracked["status"]==4) { echo "selected"; } ?> value="4"><?= $lang["nav-watch"]["status"]["4"] ?></option>
            </select>
            <button type="submit" name="track_update" class="list-group-item list-group-item-success"><?= glyph("refresh",$lang["nav-watch"]["update"]) ?> <?= $lang["nav-watch"]["update"] ?></button>
            <button type="submit" name="track_delete" class="list-group-item list-group-item-danger"><?= glyph("trash",$lang["nav-watch"]["delete"]) ?> <?= $lang["nav-watch"]["delete"] ?></button>
        </form>
    </div>
    <?php } ?>
    <?php } elseif($user["level"]==30) { ?>
    <div class="list-group">
        <li class="list-group-item"><?= $lang["nav-watch"]["verify"] ?></li>
    </div>
    <?php } else { ?>

    <?php } ?>
</div>
