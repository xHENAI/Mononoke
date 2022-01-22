<?php

// pages/signin.req.php - Mononoke

if(isset($_POST["login_user"])) {
    $error = false;
    $error_msg = "";
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password = hash("sha512",$password);
    $usercheck = $conn->query("SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
    if(mysqli_num_rows($usercheck)==1) {
        $token = rand();
        $token = md5($token);
        if(isset($_POST["remember_me"])) {
            setcookie($config["cookie"]."session", $token, time()+(86400*30), "/");
        }
        $_SESSION[$config["cookie"]."session"] = $token;
        $conn->query("INSERT INTO `user_tokens`(`user`,`token`) VALUES('$username','$token')");
        redirect("home");
    } else {
        $error = true;
        $error_msg = "Username/Password is wrong!";
    }
}

?>

<title>Signin | <?= $config["name"] ?></title>
<?php if($loggedin==false) { ?>
<div style="margin: 0 auto; width: 300px" id="login_container">
    <form method="post" id="login_form" name="login_user">
        <h1 class="text-center">Signin</h1>
        <hr>
        <div class="form-group">
            <label for="login_username" class="sr-only">Username</label>
            <input tabindex="1" type="text" name="username" id="login_username" class="form-control" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label for="login_password" class="sr-only">Password</label>
            <input tabindex="2" type="password" name="password" id="login_password" class="form-control" placeholder="Password" required>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember_me" value="1"> Remember me (1 Month, requires Cookies)
            </label>
        </div>

        <button tabindex="3" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="login_user"><?= glyph("log-in","Signin") ?> Signin</button>
        <?php if($error==true) { ?>
        <br>
        <p><?= $error_msg ?></p>
        <?php } ?>
        <a href="<?= $config["url"] ?>forgot" class="btn btn-lg btn-warning btn-block" id="forgot_button"><?= glyph("refresh","Reset Password") ?> Reset Password</a>
        <hr>
        <p>Don't have an account? <a href="/signup">Signup!</a></p>
    </form>
</div>
<?php } else {
    redirect("home");
} ?>
