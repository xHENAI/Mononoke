<title><?= $lang["signup"]["title"] ?> | <?= $config["name"] ?></title>
<?php
    
    // pages/signup.req.php - Mononoke
    
if($config["registration"]==true) {
    if($loggedin==false) {
        if(isset($_POST["reg_user"])) {
            $error = false;
            $error_msg = "";
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $password1 = mysqli_real_escape_string($conn, $_POST["password_1"]);
            $password2 = mysqli_real_escape_string($conn, $_POST["password_2"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $namecheck = $conn->query("SELECT * FROM `user` WHERE `username`='$username'");
            $mailcheck = $conn->query("SELECT * FROM `user` WHERE `email`='$email'");
            if(mysqli_num_rows($namecheck)==1) {
                $error = true;
                $error_msg = "Username already taken!";
            }
            if(mysqli_num_rows($mailcheck)==1) {
                $error = true;
                $error_msg = "eMail already in use!";
            }
            if($password1!==$password2) {
                $error = true;
                $error_msg = "Passwords do not match!";
            }
            if($error==false) {
                //$password = password_hash($password1, PASSWORD_DEFAULT);
                $password = hash("sha512",$password1);
                $conn->query("INSERT INTO `user`(`level`,`username`,`password`,`email`,`image`,`theme`,`lang`,`public_profile`,`public_watchlist`,`read_announce`,`forum_signature`) VALUES('30','$username','$password','$email','".$config["url"]."assets/img/default.jpeg','".$config["theme"]."','".$config["lang"]."','1','0','0',NULL)");
                $namecheck = $conn->query("SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' LIMIT 1");
                $namecheck = mysqli_fetch_assoc($namecheck);
                $tokenuser = $email;
                $tokenpass = md5($username);
                $conn->query("INSERT INTO `user_verification`(`user`,`token`) VALUES('$tokenuser','$tokenpass')");
                $tokenurl = $conn->query("SELECT * FROM `user_verification` WHERE `user`='$email' AND `token`='$tokenpass' LIMIT 1");
                $tokenurl = mysqli_fetch_assoc($tokenurl);
                $tokenurl = $config["url"]."confirm/".$tokenurl["token"];
                mail($email,$mail["confirm_mail"],$mail["confirm_content"].$tokenurl,"From: ".$config["email"]);
                redirect("signin");
            }
        }
?>

<div style="margin: 0 auto; width: 300px" id="signup_container">
    <form method="post" id="signup_form" name="reg_user">
        <h1 class="text-center image-shadow"><?= $lang["signup"]["title"] ?></h1>
        <hr>
        <div class="form-group">
            <label for="reg_username" class="sr-only"><?= $lang["signup"]["username"] ?></label>
            <input data-toggle="popover" minlength="3" data-content="Alphanumeric characters only." type="text" name="username" id="reg_username" class="form-control" placeholder="<?= $lang["signup"]["username"] ?>" required>
        </div>

        <div class="form-group">
            <label for="reg_pass1" class="sr-only"><?= $lang["signup"]["password"] ?></label>
            <input data-toggle="popover" minlenth="8" data-content="Minimum length: 8 characters." type="password" name="password_1" id="reg_pass1" class="form-control" placeholder="<?= $lang["signup"]["password"] ?>" required>
        </div>

        <div class="form-group">
            <label for="reg_pass2" class="sr-only"><?= $lang["signup"]["password_2"] ?></label>
            <input data-toggle="popover" data-content="Type your password again." type="password" name="password_2" id="password_2" class="form-control" placeholder="<?= $lang["signup"]["password_2_hover"] ?>" required>
        </div>

        <div class="form-group">
            <label for="reg_email1" class="sr-only"><?= $lang["signup"]["email"] ?></label>
            <input data-toggle="popover" data-content="Valid email required for activation." type="email" name="email" id="reg_email1" class="form-control" placeholder="<?= $lang["signup"]["email"] ?>" required>
            <small class="image-shadow"><?= $lang["signup"]["email_confirm"] ?></small>
        </div>

        <button class="btn btn-lg btn-success btn-block" type="submit" name="reg_user" id="signup_button"><?= glyph("log-in",$lang["signup"]["title"]) ?> <?= $lang["signup"]["title"] ?></button>
        <?php if(!empty($error_msg)) { ?>
        <br>
        <p style="color:red"><?= $error_msg ?></p>
        <?php } ?>
        <hr>
        <p class="image-shadow"><?= $lang["signup"]["signin"] ?> <a href="<?= $config["url"] ?>signin"><?= $lang["signin"]["title"] ?>!</a></p>
    </form>
</div>

<?php
                         } else {
        redirect("home");
    }
} else { ?>
<div style="margin: 0 auto; width: 300px" id="signup_container">
    <h1 class="text-center image-shadow"><?= $lang["signup"]["title"] ?></h1>
    <hr>
    <p class="image-shadow"><?= $lang["signup"]["closed"] ?></p>
    <hr>
    <p class="image-shadow"><?= $lang["signup"]["signin"] ?> <a href="<?= $config["url"] ?>signin"><?= $lang["signin"]["title"] ?>!</a></p>
</div>
<?php } ?>
