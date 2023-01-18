<?php

require "../load.php";

$error = false;
$error_msg = "";

if (isset($_POST["signup"])) {
    $username = $conn->escape($purifier->purify($_POST["username"]));
    $password1 = $conn->escape($purifier->purify($_POST["password"]));
    $password2 = $conn->escape($purifier->purify($_POST["password2"]));
    $usercheck = $conn->where("username", $username)->getOne("user");

    // Executing all the checks
    if (!empty($usercheck)) {
        $error = true;
        $error_msg = "This username is already taken!";
    }
    if ($password1 != $password2) {
        $error = true;
        $error_msg = "The passwords do not match!";
    }

    if ($config["captcha"]["enabled"] == true) {
        if ($config["captcha"]["type"] == "hcaptcha") {
            $data = array(
                'secret' => $config["captcha"]["hcaptcha"]["secret"],
                'response' => $_POST["h-captcha-response"]
            );
            $creq = captchaVerify($data);
            if ($creq == "error") {
                $error = true;
                $error_msg = "Captcha is wrong!";
            }
        }
    }

    // Everything is right?!
    if ($error == false) {
        // Everything is right!
        $password = password_hash($password1, PASSWORD_BCRYPT);
        $conn->insert("user", array(
            "username" => $username,
            "password" => $password,
            "image" => $avatars[array_rand($avatars)]["url"],
            "level" => $config["default"]["level"],
            "banned" => false
        ));
        header("location: login");
        die("success");
    }
}

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/signup.php");
if ($tinfo["sidebar"]["signup"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
