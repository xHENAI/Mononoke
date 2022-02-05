<?php

// pages/forum/editforum.req.php - Mononoke

$forum = $_GET["id"];
$forum = $conn->query("SELECT * FROM `forum` WHERE `id`='$forum' LIMIT 1");
$forum = mysqli_fetch_assoc($forum);

if(!isset($error)) {
    $error = "";
}

?>

<?php

if($user["level"]==10 || $user["level"]==0) {

    if(!empty($forum["id"])) {
    
        if(isset($_POST["edit_forum"])) {
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
            if($name==$forum["name"]) {
                $error = false;
                $error_msg = "";
            } else {
                $forumcheck = $conn->query("SELECT * FROM `forum` WHERE `name`='$name'");
                if(mysqli_num_rows($forumcheck)==1) {
                    $error = true;
                    $error_msg = "Cannot edit Forum: A Forum with that Name already exists!";
                } else {
                    $error = false;
                    $error_msg == "";
                }
            }
            if($error==false) {
                $conn->query("UPDATE `forum` SET `name`='$name',`public`='$visibility',`closed`='$posting',`sort`='$sorting',`description`=$description WHERE `id`='".$forum["id"]."'");
                redirect("../viewforum/".$forum["id"]);
            }
        }
?>

<title><?= $forum["name"] ?> (Edit Forum) | <?= $config["name"] ?></title>

<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum/home">Forums (Index)</a></li>
    <li><?= $forum["name"] ?> (Edit Forum)</li>
</ol>

<form class="form-horizontal" method="post" action="" name="edit_forum">
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name</label>
        <div class="col-sm-9">
            <input type="text" name="name" id="name" value="<?= $forum["name"] ?>" placeholder="The Name of the Forum" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="visibility">Visibility</label>
        <div class="col-sm-9">
            <select required class="form-control selectpicker" name="visibility" title="Select Visibility" id="visibility">
                <option disabled>Select Visibility</option>
                <option <?php if($forum["public"]==0) { echo "selected"; } ?> value="0">Hidden (Admins and Moderators only)</option>
                <option <?php if($forum["public"]==1) { echo "selected"; } ?> value="1">Public (Everyone who is logged in)</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="posting">Posting</label>
        <div class="col-sm-9">
            <select required class="form-control selectpicker" name="posting" title="Select Posting Mode" id="posting">
                <option disabled>Select Posting Type</option>
                <option <?php if($forum["closed"]==1) { echo "selected"; } ?> value="1">Only Admins and Moderators can Post</option>
                <option <?php if($forum["closed"]==0) { echo "selected"; } ?> value="0">Everyone can post who is logged in</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="sorting">Sorting Level</label>
        <div class="col-sm-9">
            <input required type="text" name="sorting" class="form-control" placeholder="Which number is its level? Lower means at the top, higher means at the bottom" id="sorting" value="<?= $forum["sort"] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description">Description</label>
        <div class="col-sm-9">
            <textarea name="description" placeholder="A brief explanation what this Forum is about. Leave blank for none." class="form-control"><?= $forum["description"] ?></textarea>
        </div>
    </div>
    <button class="btn btn-success col-sm-offset-3" type="submit" name="edit_forum"><?= glyph("floppy-saved","Save Changes") ?> Save Changes</button>
    <?php if($error==true) { ?>
    <br>
    <p style="color:red"><?= $error_msg ?></p>
    <?php } ?>
</form>

<?php } else { ?>

<title>Forum not Found (Edit Forum) | <?= $config["name"] ?></title>
<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum">Forums (Index)</a></li>
    <li>Forum not Found (Edit Forum)</li>
</ol>

<?php } ?>

<?php } else { ?>

<title><?= $forum["name"] ?> (Edit Forum) | <?= $config["name"] ?></title>
<p><?= glyph("info-sign","Error") ?> You do not have permission to perform this action!</p>

<?php } ?>
