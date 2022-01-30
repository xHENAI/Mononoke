<?php

// pages/signin.req.php - Mononoke

if(!isset($error)) {
    $error = "";
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
                <input type="checkbox" name="remember_me" value="1"> <span class="image-shadow">Remember me (1 Month, requires Cookies)</span>
            </label>
        </div>

        <button tabindex="3" class="btn btn-lg btn-success btn-block" type="submit" id="login_button" name="login_user"><?= glyph("log-in","Signin") ?> Signin</button>
        <?php if($error==true) { ?>
        <br>
        <p><?= $error_msg ?></p>
        <?php } ?>
        <a href="<?= $config["url"] ?>forgot" class="btn btn-lg btn-warning btn-block" id="forgot_button"><?= glyph("refresh","Reset Password") ?> Reset Password</a>
        <hr>
        <p class="image-shadow">Don't have an account? <a href="<?= $config["url"] ?>signup">Signup!</a></p>
    </form>
</div>
<?php } else {
    redirect("home");
} ?>
