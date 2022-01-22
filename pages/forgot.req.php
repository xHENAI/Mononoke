<?php

// pages/forgot.req.php - aniZero2

if(isset($_POST["reset_password"])) {
    $error = false;
    $success = false;
    $error_msg = "";
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $emailcheck = $conn->query("SELECT * FROM `user` WHERE `email`='$email'");
    if(mysqli_num_rows($emailcheck)==1) {
        $further = mysqli_fetch_assoc($emailcheck);
        $error = false;
    } else {
        $error = true;
        $error_msg = "There is no account using this eMail!";
    }
    if($error==false) {
        $random = rand();
        $token = md5($random);
        $userk = $further["email"];
        $conn->query("INSERT INTO `user_forgot`(`user`,`token`) VALUES('$userk','$token')");
        $token = $conn->query("SELECT * FROM `user_forgot` WHERE `token`='$token' LIMIT 1");
        $token = mysqli_fetch_assoc($token);
        $resetlink = $config["url"]."reset/".md5($random);
        mail($email,$mail["reset_mail"],$mail["reset_content"].$resetlink,"From: ".$config["email"]);
        $success = true;
    }
}

?>
<title>Reset Password | <?= $config["name"] ?></title>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" id="login_form" name="reset_password">
        <h1 class="text-center">Reset Password</h1>
        <hr>
        <div class="form-group">
            <label for="login_username" class="sr-only">Username</label>
            <input tabindex="1" type="email" name="email" id="login_username" class="form-control" placeholder="eMail" required>
        </div>
        <button tabindex="3" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="reset_password"><?= glyph("refresh","Send new Password") ?> Send new Password</button>
        <?php if(!empty($error_msg)) { ?>
        <br>
        <p style="color:red"><?= $error_msg ?></p>
        <?php } ?>
        <?php if($success==true) { ?>
        <br>
        <p style="color:green">The eMail has been send! Please read instructions below for more info.</p>
        <?php } ?>
        <hr>
        <p>After you click "Send new Password", we will send you a link where you can reset your Password. Delivery may take up to 10 minutes and make sure to check the Spam folder!</p>
    </form>
</div>
