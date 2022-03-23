<?php

// pages/forgot.req.php - Mononoke

$error = false;
$success = false;
$error_msg = "";

if(isset($_POST["reset_password"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $emailcheck = $conn->query("SELECT * FROM `user` WHERE `email`='$email'");
    foreach ($banned_usernames as $banned) {
        if (strpos($email, $banned) == FALSE) {
            $error = true;
            $error_msg = "eMail contains bad characters!";
        }
    }
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
<title><?= $lang["forgot"]["title"] ?> | <?= $config["name"] ?></title>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" id="login_form" name="reset_password">
        <h1 class="text-center"><?= $lang["forgot"]["title"] ?></h1>
        <hr>
        <div class="form-group">
            <label for="login_username" class="sr-only"><?= $lang["forgot"]["email"] ?></label>
            <input tabindex="1" type="email" name="email" id="login_username" class="form-control" placeholder="<?= $lang["forgot"]["email"] ?>" required>
        </div>
        <button tabindex="3" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="reset_password"><?= glyph("refresh",$lang["forgot"]["send"]) ?> <?= $lang["forgot"]["send"] ?></button>
        <?php if(!empty($error_msg)) { ?>
        <br>
        <p style="color:red"><?= $error_msg ?></p>
        <?php } ?>
        <?php if($success==true) { ?>
        <br>
        <p style="color:green"><?= $lang["forgot"]["success"] ?></p>
        <?php } ?>
        <hr>
        <p><?= $lang["forgot"]["info"] ?></p>
    </form>
</div>
