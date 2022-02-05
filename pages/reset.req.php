<title><?= $lang["reset"]["title"] ?> | <?= $config["name"] ?></title>
<?php

// pages/reset.req.php - Mononoke
    
$token = mysqli_real_escape_string($conn, $_GET["token"]);
$tokenvalid = $conn->query("SELECT * FROM `user_forgot` WHERE `token`='$token'");
if(mysqli_num_rows($tokenvalid)==1) {

if(isset($_POST["reset_password"])) {
    $success = false;
    $error = false;
    $error_msg = "";
    $password1 = mysqli_real_escape_string($conn, $_POST["password_1"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password_2"]);
    if($password1!==$password2) {
        $error = true;
        $error_msg = "Entered Passwords do not match!";
    }
    if($error==false) {
        $password = hash("sha512",$password1);
        $tokencheck = mysqli_fetch_assoc($tokenvalid);
        $tokenemail = $tokencheck["user"];
        $conn->query("UPDATE `user` SET `password`='$password' WHERE `email`='$tokenemail'");
        $conn->query("DELETE FROM `user_forgot` WHERE `token`='$token'");
        redirect("../signin");
    }
}

?>
<div style="margin: 0 auto; width: 300px" id="signup_container">
    <form method="post" id="signup_form" name="reset_password">
        <h1 class="text-center"><?= $lang["reset"]["title"] ?></h1>
        <hr>
        <div class="form-group">
            <label for="reg_pass1" class="sr-only"><?= $lang["reset"]["password"] ?></label>
            <input data-toggle="popover" data-content="Minimum length: 8 characters." type="password" name="password_1" id="reg_pass1" class="form-control" placeholder="<?= $lang["reset"]["password"] ?>" required>
        </div>

        <div class="form-group">
            <label for="reg_pass2" class="sr-only"><?= $lang["reset"]["password_2"] ?></label>
            <input data-toggle="popover" data-content="Type your password again." type="password" name="password_2" id="password_2" class="form-control" placeholder="<?= $lang["reset"]["password_2_hover"] ?>" required>
        </div>

        <button class="btn btn-lg btn-success btn-block" type="submit" name="reset_password" id="signup_button"><?= glyph("ok",$lang["reset"]["change"]) ?> <?= $lang["reset"]["change"] ?></button>
        <?php if(!empty($error_msg)) { ?>
        <br>
        <p style="color:red"><?= $error_msg ?></p>
        <?php } ?>
    </form>
</div>
<?php } else { ?>
<div style="margin: 0 auto; width: 300px" id="signup_container">
    <h1 class="text-center"><?= $lang["reset"]["title"] ?></h1>
    <hr>
    <p><?= $lang["reset"]["error"] ?></p>
</div>
<?php } ?>
