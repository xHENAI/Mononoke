<?php

$uid = $user["id"];

if(isset($_POST["update_general"])) {
    $image = mysqli_real_escape_string($conn, $_POST["image"]);
    if(empty($image)) {
        $image = $config["url"]."assets/img/default.jpeg";
    }
    $conn->query("UPDATE `user` SET `image`='$image' WHERE `id`='$uid'");
    redirect("settings");
}

if(isset($_POST["update_theme"])) {
    $theme = mysqli_real_escape_string($conn, $_POST["theme"]);
    $conn->query("UPDATE `user` SET `theme`='$theme' WHERE `id`='$uid'");
    redirect("settings");
}

if(isset($_POST["update_privacy"])) {
    $profile = mysqli_real_escape_string($conn, $_POST["profile"]);
    $watchlist = mysqli_real_escape_string($conn, $_POST["watchlist"]);
    $conn->query("UPDATE `user` SET `public_profile`='$profile', `public_watchlist`='$watchlist' WHERE `id`='$uid'");
    redirect("settings");
}

if(isset($_POST["update_forum"])) {
    $signature = mysqli_real_escape_string($conn, $_POST["signature"]);
    $conn->query("UPDATE `user` SET `forum_signature`='$signature' WHERE `id`='$uid'");
    redirect("settings");
}

?>

<title>Settings | <?= $config["name"] ?></title>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-pills" role="tablist">
        <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab"><?= glyph("wrench","General Settings") ?> General Settings</a></li>
        <li role="presentation"><a href="#theme" aria-controls="theme" role="tab" data-toggle="tab"><?= glyph("adjust","Layout Settings") ?> Theme Settings</a></li>
        <li role="presentation"><a href="#privacy" aria-controls="privacy" role="tab" data-toggle="tab"><?= glyph("eye-close","Privacy Settings") ?> Privacy Settings</a></li>
        <!--<li role="presentation"><a href="#change-password" aria-controls="change-password" role="tab" data-toggle="tab"><?= glyph("pencil","Change Password") ?> Change Password</a></li>
        <li role="presentation"><a href="#change-email" aria-controls="change-email" role="tab" data-toggle="tab"><?= glyph("envelope","Change eMail") ?> Change eMail</a></li>-->
        <li role="presentation"><a href="#forum" aria-controls="forum" role="tab" data-toggle="tab"><?= glyph("education","Forum Settings") ?> Forum Settings</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="general">
            <form class="form-horizontal" method="post" action="" name="update_general">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="username">Username</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="username" value="<?= $user["username"] ?>" id="username" class="form-control" title="This is your username, you cannot change it.">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email">eMail</label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="email" value="<?= $user["email"] ?>" id="email" class="form-control" title="This is you eMail, you can change this in the panel at the top.">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="image">Image (URL)</label>
                    <div class="col-sm-9">
                        <input type="text" name="image" value="<?= $user["image"] ?>" id="image" class="form-control" title="This is a link to your Profile Image.">
                        <br>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-1"><img src="<?= $user["image"] ?>" width="100%" alt="Your Current Image" title="Your Current Image"></div>
                    <div class="col-sm-8">This is your current Image</div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_general"><?= glyph("floppy-saved","Save Settings") ?> Save Settings</button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="theme">
            <form class="form-horizontal" method="post" action="" name="update_theme">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="theme">Theme</label>
                    <div class="col-sm-9">
                        <select class="form-control selectpicker" name="theme" id="theme">
                            <option <?php if($user["theme"]==0) { echo "selected"; } ?> value="0">Bootstrap Light</option>
                            <option <?php if($user["theme"]==1) { echo "selected"; } ?> value="1">Cerulean Light</option>
                            <option <?php if($user["theme"]==2) { echo "selected"; } ?> value="2">Bootstrap Dark</option>
                            <option <?php if($user["theme"]==3) { echo "selected"; } ?> value="3">Cyborg Dark</option>
                            <option <?php if($user["theme"]==4) { echo "selected"; } ?> value="4">Darkly Dark</option>
                        </select>
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_theme"><?= glyph("floppy-saved","Save Settings") ?> Save Settings</button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="privacy">
            <form class="form-horizontal" method="post" action="" name="update_privacy">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="profile">Profile</label>
                    <div class="col-sm-9">
                        <select class="form-control selectpicker" name="profile" id="profile">
                            <option <?php if($user["public_profile"]==0) { echo "selected"; } ?> value="0">Private</option>
                            <option <?php if($user["public_profile"]==1) { echo "selected"; } ?> value="1">Public</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="watchlist">Watchlist</label>
                    <div class="col-sm-9">
                        <select class="form-control selectpicker" name="watchlist" id="watchlist">
                            <option <?php if($user["public_watchlist"]==0) { echo "selected"; } ?> value="0">Private</option>
                            <option <?php if($user["public_watchlist"]==1) { echo "selected"; } ?> value="1">Public</option>
                        </select>
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_privacy"><?= glyph("floppy-saved","Save Settings") ?> Save Settings</button>
            </form>
        </div>
        <!--<div role="tabpanel" class="tab-pane fade" id="change-password">
            <form class="form-horizontal" method="post" action="" name="change_password">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password_old">Old Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_old" id="password_old" class="form-control" placeholder="Old Password" tabindex="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password_1">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_1" id="password_1" class="form-control" placeholder="New Password" tabindex="2">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="password_2">New Password (Repeat)</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_2" id="password_2" class="form-control" placeholder="New Password (Repeat)" tabindex="3">
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="change_password" tabindex="4"><?= glyph("floppy-saved","Change Password") ?> Change Password</button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="change-email">Change eMail</div>-->
        <div role="tabpanel" class="tab-pane fade" id="forum">
            <form class="form-horizontal" method="post" action="" name="update_forum">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="signature">Signature (Supports BBCode)</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="signature" style="max-width:100%;min-width:100%;" name="signature" placeholder="Forum Signature (Shows below a post/comment of you). Maximal 500 Characters." maxlength="500"><?= $user["forum_signature"] ?></textarea>
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_forum"><?= glyph("floppy-saved","Save Settings") ?> Save Settings</button>
            </form>
        </div>
    </div>
</div>
