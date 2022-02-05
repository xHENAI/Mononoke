<?php

// pages/mod/schedule.req.php - Mononoke

$error = false;
$error_msg = "";
$edit = false;
$edit_msg = "";

if(isset($_POST["add_schedule"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime"]);
    $day = mysqli_real_escape_string($conn, $_POST["day"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);
    $tleft = mysqli_real_escape_string($conn, $_POST["tleft"]);
    $check = $conn->query("SELECT * FROM `schedule` WHERE `anime`='$anime' AND `day`='$day' AND `release`='$time' AND `tleft`='$tleft'");
    if(mysqli_num_rows($check)==1) {
        // Does an identical already exist? Yes!
        $error = true;
        $error_msg = "An identical entry exists already!";
    } else {
        // Entry doesn't exist - yet.
        $check = $conn->query("SELECT * FROM `anime` WHERE `id`='$anime'");
        if(mysqli_num_rows($check)==1) {
            // Anime exists!
            $conn->query("INSERT INTO `schedule`(`anime`,`release`,`day`,`tleft`) VALUES('$anime','$time','$day','$tleft')");
            redirect("");
        } else {
            $error = true;
            $error_msg = "An Anime with that ID doesn't exist!";
        }
    }
}

if(isset($_POST["edit_schedule"])) {
    $anime = mysqli_real_escape_string($conn, $_POST["anime"]);
    $day = mysqli_real_escape_string($conn, $_POST["day"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);
    $tleft = mysqli_real_escape_string($conn, $_POST["tleft"]);
    $entry = mysqli_real_escape_string($conn, $_POST["entry"]);
    $check = $conn->query("SELECT * FROM `schedule` WHERE `anime`='$anime' AND `day`='$day' AND `release`='$time' AND `tleft`='$tleft'");
    if(mysqli_num_rows($check)==1) {
        // Does an identical already exist? Yes!
        $edit = true;
        $edit_msg = "An identical entry exists already!";
    } else {
        // Entry doesn't exist - yet.
        $check = $conn->query("SELECT * FROM `anime` WHERE `id`='$anime'");
        if(mysqli_num_rows($check)==1) {
            // Anime exists!
            $conn->query("UPDATE `schedule` SET `anime`='$anime', `release`='$time', `day`='$day', `tleft`='$tleft' WHERE `id`='$entry'");
            redirect("");
        } else {
            $edit = true;
            $edit_msg = "An Anime with that ID doesn't exist!";
        }
    }
}

if(isset($_POST["delete_schedule"])) {
    $entry = mysqli_real_escape_string($conn, $_POST["entry"]);
    $conn->query("DELETE FROM `schedule` WHERE `id`='$entry'");
    redirect("");
}

?>

<title><?= $lang["schedule"]["title_2"] ?> | <?= $config["name"] ?></title>

<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang["schedule"]["title_2"] ?></h3>
    </div>
    <div class="panel-body">
        <?php if($edit==true) { ?>
        <p class="text-center" style="color:red"><?= $edit_msg ?></p>
        <?php } ?>
        <h4><?= $lang["schedule"]["sunday"] ?></h4>
        <?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='1'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <div class="col-sm-2">
                    <input required type="text" name="anime" class="form-control" placeholder="Anime ID" value="<?= $row["anime"] ?>">
                </div>
                <div class="col-sm-2">
                    <input required type="time" name="time" class="form-control" placeholder="Time" value="<?= $row["release"] ?>">
                </div>
                <div class="col-sm-2">
                    <select name="day" class="selectpicker form-control">
                        <option selected value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tleft" value="<?= $row["tleft"] ?>">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success form-control" name="edit_schedule" type="submit"><?= glyph("floppy-save","Save Changes") ?></button>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger form-control" name="delete_schedule" type="submit"><?= glyph("trash","Save Changes") ?></button>
                </div>
            </div>
        </form>
        <?php }
        }
        ?>
        <hr>
        <h4><?= $lang["schedule"]["monday"] ?></h4>
        <?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='2'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <div class="col-sm-2">
                    <input required type="text" name="anime" class="form-control" placeholder="Anime ID" value="<?= $row["anime"] ?>">
                </div>
                <div class="col-sm-2">
                    <input required type="time" name="time" class="form-control" placeholder="Time" value="<?= $row["release"] ?>">
                </div>
                <div class="col-sm-2">
                    <select name="day" class="selectpicker form-control">
                        <option value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option selected value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tleft" value="<?= $row["tleft"] ?>">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success form-control" name="edit_schedule" type="submit"><?= glyph("floppy-save","Save Changes") ?></button>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger form-control" name="delete_schedule" type="submit"><?= glyph("trash","Save Changes") ?></button>
                </div>
            </div>
        </form>
        <?php }
        }
        ?>
        <hr>
        <h4><?= $lang["schedule"]["tuesday"] ?></h4>
        <?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='3'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <div class="col-sm-2">
                    <input required type="text" name="anime" class="form-control" placeholder="Anime ID" value="<?= $row["anime"] ?>">
                </div>
                <div class="col-sm-2">
                    <input required type="time" name="time" class="form-control" placeholder="Time" value="<?= $row["release"] ?>">
                </div>
                <div class="col-sm-2">
                    <select name="day" class="selectpicker form-control">
                        <option value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option selected value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tleft" value="<?= $row["tleft"] ?>">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success form-control" name="edit_schedule" type="submit"><?= glyph("floppy-save","Save Changes") ?></button>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger form-control" name="delete_schedule" type="submit"><?= glyph("trash","Save Changes") ?></button>
                </div>
            </div>
        </form>
        <?php }
        }
        ?>
        <hr>
        <h4><?= $lang["schedule"]["wednesday"] ?></h4>
        <?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='4'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <div class="col-sm-2">
                    <input required type="text" name="anime" class="form-control" placeholder="Anime ID" value="<?= $row["anime"] ?>">
                </div>
                <div class="col-sm-2">
                    <input required type="time" name="time" class="form-control" placeholder="Time" value="<?= $row["release"] ?>">
                </div>
                <div class="col-sm-2">
                    <select name="day" class="selectpicker form-control">
                        <option value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option selected value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tleft" value="<?= $row["tleft"] ?>">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success form-control" name="edit_schedule" type="submit"><?= glyph("floppy-save","Save Changes") ?></button>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger form-control" name="delete_schedule" type="submit"><?= glyph("trash","Save Changes") ?></button>
                </div>
            </div>
        </form>
        <?php }
        }
        ?>
        <hr>
        <h4><?= $lang["schedule"]["thursday"] ?></h4>
        <?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='5'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <div class="col-sm-2">
                    <input required type="text" name="anime" class="form-control" placeholder="Anime ID" value="<?= $row["anime"] ?>">
                </div>
                <div class="col-sm-2">
                    <input required type="time" name="time" class="form-control" placeholder="Time" value="<?= $row["release"] ?>">
                </div>
                <div class="col-sm-2">
                    <select name="day" class="selectpicker form-control">
                        <option value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option selected value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tleft" value="<?= $row["tleft"] ?>">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success form-control" name="edit_schedule" type="submit"><?= glyph("floppy-save","Save Changes") ?></button>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger form-control" name="delete_schedule" type="submit"><?= glyph("trash","Save Changes") ?></button>
                </div>
            </div>
        </form>
        <?php }
        }
        ?>
        <hr>
        <h4><?= $lang["schedule"]["friday"] ?></h4>
        <?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='6'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <div class="col-sm-2">
                    <input required type="text" name="anime" class="form-control" placeholder="Anime ID" value="<?= $row["anime"] ?>">
                </div>
                <div class="col-sm-2">
                    <input required type="time" name="time" class="form-control" placeholder="Time" value="<?= $row["release"] ?>">
                </div>
                <div class="col-sm-2">
                    <select name="day" class="selectpicker form-control">
                        <option value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option selected value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tleft" value="<?= $row["tleft"] ?>">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success form-control" name="edit_schedule" type="submit"><?= glyph("floppy-save","Save Changes") ?></button>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger form-control" name="delete_schedule" type="submit"><?= glyph("trash","Save Changes") ?></button>
                </div>
            </div>
        </form>
        <?php }
        }
        ?>
        <hr>
        <h4><?= $lang["schedule"]["saturday"] ?></h4>
        <?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='7'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
        <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <div class="col-sm-2">
                    <input required type="text" name="anime" class="form-control" placeholder="Anime ID" value="<?= $row["anime"] ?>">
                </div>
                <div class="col-sm-2">
                    <input required type="time" name="time" class="form-control" placeholder="Time" value="<?= $row["release"] ?>">
                </div>
                <div class="col-sm-2">
                    <select name="day" class="selectpicker form-control">
                        <option value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option selected value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input type="datetime" class="form-control" name="tleft" value="<?= $row["tleft"] ?>">
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-success form-control" name="edit_schedule" type="submit"><?= glyph("floppy-save","Save Changes") ?></button>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-danger form-control" name="delete_schedule" type="submit"><?= glyph("trash","Save Changes") ?></button>
                </div>
            </div>
        </form>
        <?php }
        }
        ?>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang["schedule"]["new"] ?></h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="" name="add_schedule">
            <div class="form-group">
                <input hidden readonly value="<?= $row["id"] ?>" name="entry">
                <label class="control-label col-sm-3" for="anime"><?= $lang["schedule"]["anime"] ?></label>
                <div class="col-sm-9">
                    <input required type="text" name="anime" id="anime" class="form-control" placeholder="<?= $lang["schedule"]["anime"] ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="day">Day</label>
                <div class="col-sm-9">
                    <select required class="selectpicker form-control" title="Select Weekday..." name="day" id="day">
                        <option selected disabled value="1">Select Day...</option>
                        <option value="1"><?= $lang["schedule"]["sunday"] ?></option>
                        <option value="2"><?= $lang["schedule"]["monday"] ?></option>
                        <option value="3"><?= $lang["schedule"]["tuesday"] ?></option>
                        <option value="4"><?= $lang["schedule"]["wednesday"] ?></option>
                        <option value="5"><?= $lang["schedule"]["thursday"] ?></option>
                        <option value="6"><?= $lang["schedule"]["friday"] ?></option>
                        <option value="7"><?= $lang["schedule"]["saturday"] ?></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="time">Time</label>
                <div class="col-sm-9">
                    <input required type="time" name="time" id="time" class="form-control" placeholder="When the Episode is going to be released...">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="tleft">Exact Date (for Schedule)</label>
                <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" name="tleft" id="tleft">
                </div>
            </div>
            <button class="btn btn-success col-sm-offset-3" name="add_schedule" type="submit"><?= glyph("plus-sign",$lang["schedule"]["add"]) ?> <?= $lang["schedule"]["add"] ?></button>
            <?php if($error==true) { ?>
            <p style="color:red" class="col-sm-offset-3"><?= $error_msg ?></p>
            <?php } ?>
        </form>
    </div>
</div>

<p class="text-center"><a href="<?= $config["url"] ?>schedule"><?= glyph("eye-open",$lang["schedule"]["view"]) ?> <?= $lang["schedule"]["view"] ?></a></p>
