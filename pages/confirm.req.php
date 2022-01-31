<?php

// pages/confirm.req.php - Mononoke

$token = $_GET["token"];

if(isset($_POST["confirm_account"])) {
    $error = false;
    $error_msg = "";
    $confirm = $conn->query("SELECT * FROM `user_verification` WHERE `token`='$token'");
    if(mysqli_num_rows($confirm)>=1) {
        $confirm = mysqli_fetch_assoc($confirm);
    } else {
        $error = true;
        $success = false;
        $error_msg = "The Token is invalid!";
    }
    if($error==false) {
        $usermail = $confirm["user"];
        $conn->query("UPDATE `user` SET `level`='20' WHERE `email`='$usermail'");
        $conn->query("DELETE FROM `user_verification` WHERE `user`='$usermail'");
        $success = true;
    }
}

if(!isset($error_msg)) {
    $error_msg = "";
    $success = false;
}

?>

<title>Confirm your eMail | <?= $config["name"] ?></title>
<div style="margin: 0 auto; width: 300px" id="signup_container">
    <form method="post" id="signup_form" name="confirm_account">
        <h1 class="text-center">Confirm eMail</h1>
        <hr>
        <button class="btn btn-lg btn-success btn-block" type="submit" name="confirm_account" id="signup_button"><?= glyph("ok","Confirm") ?> Confirm</button>
        <?php if(!empty($error_msg)) { ?>
        <br>
        <p style="color:red"><?= $error_msg ?></p>
        <?php } ?>
        <?php if($success==true) { ?>
        <br>
        <p style="color:green">Your eMail has been verified! You can use your account now properly.</p>
        <?php } ?>
    </form>
</div>
