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

if(isset($_POST["update_layout"])) {
    $theme = mysqli_real_escape_string($conn, $_POST["theme"]);
    $language = mysqli_real_escape_string($conn, $_POST["language"]);
    $conn->query("UPDATE `user` SET `theme`='$theme', `lang`='$language' WHERE `id`='$uid'");
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

<title><?= $lang["settings"]["title"] ?> | <?= $config["name"] ?></title>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-pills" role="tablist">
        <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab"><?= glyph("wrench",$lang["settings"]["settings_general"]) ?> <?= $lang["settings"]["settings_general"] ?></a></li>
        <li role="presentation"><a href="#theme" aria-controls="theme" role="tab" data-toggle="tab"><?= glyph("adjust",$lang["settings"]["settings_layout"]) ?> <?= $lang["settings"]["settings_layout"] ?></a></li>
        <li role="presentation"><a href="#privacy" aria-controls="privacy" role="tab" data-toggle="tab"><?= glyph("eye-close",$lang["settings"]["settings_privacy"]) ?> <?= $lang["settings"]["settings_privacy"] ?></a></li>
        <!--<li role="presentation"><a href="#change-password" aria-controls="change-password" role="tab" data-toggle="tab"><?= glyph("pencil","Change Password") ?> Change Password</a></li>
        <li role="presentation"><a href="#change-email" aria-controls="change-email" role="tab" data-toggle="tab"><?= glyph("envelope","Change eMail") ?> Change eMail</a></li>-->
        <li role="presentation"><a href="#forum" aria-controls="forum" role="tab" data-toggle="tab"><?= glyph("education",$lang["settings"]["settings_forum"]) ?> <?= $lang["settings"]["settings_forum"]  ?></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="general">
            <form class="form-horizontal" method="post" action="" name="update_general">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="username"><?= $lang["settings"]["general"]["username"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="username" value="<?= $user["username"] ?>" id="username" class="form-control" title="<?= $lang["settings"]["general"]["username_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="email"><?= $lang["settings"]["general"]["email"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" readonly name="email" value="<?= $user["email"] ?>" id="email" class="form-control" title="<?= $lang["settings"]["general"]["email_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="image"><?= $lang["settings"]["general"]["image"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="image" value="<?= $user["image"] ?>" id="image" class="form-control" title="<?= $lang["settings"]["general"]["image_hover"] ?>" placeholder="<?= $lang["settings"]["general"]["image_hover"] ?>">
                        <br>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-1"><img src="<?= $user["image"] ?>" width="100%" alt="<?= $lang["settings"]["general"]["image_current"] ?>" title="<?= $lang["settings"]["general"]["image_current"] ?>"></div>
                    <div class="col-sm-8"><?= $lang["settings"]["general"]["image_current"] ?></div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_general"><?= glyph("floppy-saved",$lang["settings"]["save"]) ?> <?= $lang["settings"]["save"] ?></button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="theme">
            <form class="form-horizontal" method="post" action="" name="update_layout">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="theme"><?= $lang["settings"]["layout"]["theme"] ?></label>
                    <div class="col-sm-9">
                        <select class="form-control selectpicker" name="theme" id="theme">
                            <option <?php if($user["theme"]==0) { echo "selected"; } ?> value="0"><?= $lang["theme"]["0"] ?></option>
                            <option <?php if($user["theme"]==1) { echo "selected"; } ?> value="1"><?= $lang["theme"]["1"] ?></option>
                            <option <?php if($user["theme"]==2) { echo "selected"; } ?> value="2"><?= $lang["theme"]["2"] ?></option>
                            <option <?php if($user["theme"]==3) { echo "selected"; } ?> value="3"><?= $lang["theme"]["3"] ?></option>
                            <option <?php if($user["theme"]==4) { echo "selected"; } ?> value="4"><?= $lang["theme"]["4"] ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="language"><?= $lang["settings"]["layout"]["language"]?></label>
                    <div class="col-sm-9">
                        <select class="selectpicker form-control" name="language" id="languag">
                            <option <?php if($user["theme"]=="en-us") { echo "selected"; } ?> value="en-us">English</option>
                            <option <?php if($user["lang"]=="de-de") { echo "selected"; } ?> value="de-de">German (Formal)</option>
                        </select>
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_layout"><?= glyph("floppy-saved",$lang["settings"]["save"]) ?> <?= $lang["settings"]["save"] ?></button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="privacy">
            <form class="form-horizontal" method="post" action="" name="update_privacy">
                <br>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="profile"><?= $lang["settings"]["privacy"]["profile"] ?></label>
                    <div class="col-sm-9">
                        <select class="form-control selectpicker" name="profile" id="profile">
                            <option <?php if($user["public_profile"]==0) { echo "selected"; } ?> value="0"><?= $lang["settings"]["privacy"]["private"] ?></option>
                            <option <?php if($user["public_profile"]==1) { echo "selected"; } ?> value="1"><?= $lang["settings"]["privacy"]["public"] ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="watchlist"><?= $lang["settings"]["privacy"]["watchlist"] ?></label>
                    <div class="col-sm-9">
                        <select class="form-control selectpicker" name="watchlist" id="watchlist">
                            <option <?php if($user["public_watchlist"]==0) { echo "selected"; } ?> value="0"><?= $lang["settings"]["privacy"]["private"] ?></option>
                            <option <?php if($user["public_watchlist"]==1) { echo "selected"; } ?> value="1"><?= $lang["settings"]["privacy"]["public"] ?></option>
                        </select>
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_privacy"><?= glyph("floppy-saved",$lang["settings"]["save"]) ?> <?= $lang["settings"]["save"] ?></button>
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
                    <label class="control-label col-sm-3" for="signature"><?= $lang["settings"]["forum"]["signature"] ?></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="signature" style="max-width:100%;min-width:100%;" name="signature" placeholder="<?= $lang["settings"]["forum"]["signature_hover"] ?>" maxlength="500"><?= $user["forum_signature"] ?></textarea>
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="update_forum"><?= glyph("floppy-saved",$lang["settings"]["save"]) ?> <?= $lang["settings"]["save"] ?></button>
            </form>
        </div>
    </div>
</div>
