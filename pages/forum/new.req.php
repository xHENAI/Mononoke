<title>Add new Forum | <?= $config["name"] ?></title>

<?php

if($user["level"]==10 || $user["level"]==0) {
    if(isset($_POST["add_forum"])) {
        $error = false;
        $error_msg = "";
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $visibility = mysqli_real_escape_string($conn, $_POST["visibility"]);
        $posting = mysqli_real_escape_string($conn, $_POST["posting"]);
        $sorting = mysqli_real_escape_string($conn, $_POST["sorting"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        if(empty($description)) {
            $description = "NULL";
        } else {
            $description = "'".$description."'";
        }
        $forumcheck = $conn->query("SELECT * FROM `forum` WHERE `name`='$name'");
        if(mysqli_num_rows($forumcheck)==1) {
            $error = true;
            $error_msg = "A Forum with this name already exists!";
        }
        if($error==false) {
            $conn->query("INSERT INTO `forum`(`name`,`public`,`closed`,`sort`,`description`) VALUES('$name','$visibility','$posting','$sorting',$description)");
            redirect("home");
        }
    }
                                             
?>

<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum">Forums (Index)</a></li>
    <li>Add Forum (Forum)</li>
</ol>

<form name="add_forum" class="form-horizontal" method="post" action="">
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name</label>
        <div class="col-sm-9">
            <input required type="text" name="name" class="form-control" placeholder="Forum Name" id="name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="visibility">Visibility</label>
        <div class="col-sm-9">
            <select required class="form-control selectpicker" name="visibility" title="Select Visibility" id="visibility">
                <option disabled selected>Select Visibility</option>
                <option value="0">Hidden (Admins and Moderators only)</option>
                <option value="1">Public (Everyone who is logged in)</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="posting">Posting</label>
        <div class="col-sm-9">
            <select required class="form-control selectpicker" name="posting" title="Select Posting Mode" id="posting">
                <option disabled selected>Select Posting Type</option>
                <option value="1">Only Admins and Moderators can Post</option>
                <option value="0">Everyone can post who is logged in</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sorting">Sorting Level</label>
        <div class="col-sm-9">
            <input required type="text" name="sorting" class="form-control" placeholder="Which number is its level? Lower means at the top, higher means at the bottom" id="sorting">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description">Description</label>
        <div class="col-sm-9">
            <textarea name="description" placeholder="A brief explanation what this Forum is about. Leave blank for none." class="form-control"></textarea>
        </div>
    </div>
    <button class="btn btn-success col-sm-offset-3" type="submit" name="add_forum"><?= glyph("plus-sign","Add Forum") ?> Add Forum</button>
    <?php if($error==true) { ?>
    <br>
    <p style="color:red"><?= $error_msg ?></p>
    <?php } ?>
</form>

<?php } else { ?>
<?= glyph("info-sign","Error") ?> You do not have permissions to perform this action!
<?php } ?>
