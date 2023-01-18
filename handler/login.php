<?php

require("../load.php");

$error = false;
$error_msg = "";

if (isset($_POST["login"])) {
    $username = $conn->escape($purifier->purify($_POST["username"]));
    $password = $conn->escape($purifier->purify($_POST["password"]));

    if ($config["captcha"]["enabled"] == true) {
        if ($config["captcha"]["type"] == "hcaptcha") {
            $data = array(
                'secret' => $config["captcha"]["hcaptcha"]["secret"],
                'response' => $_POST["h-captcha-response"]
            );
            $yolo = captchaVerify($data);
            if ($yolo == "error") {
                $error = true;
                $error_msg = "Captcha is wrong!";
            }
        }
    }

    if ($error == false) {
        // Everything is fine desu~
        $check = $conn->where("username", $username)->getOne("user");
        if (!empty($check)) {
            // Account exists!
            if ($check["banned"] == true) {
                $error = true;
                $error_msg = "You're banned!";
            } else {
                $check2 = password_verify($password, $check["password"]);
                if ($check2 == true) {
                    // Yay, user exists & passowrd matches!
                    $token = rand();
                    $token = md5($token);
                    setcookie($config["cookie"] . "_session", $token, time() + (86400 * 31), "/", $config["domain"]);
                    $conn->insert("session", array(
                        "user_id" => $check["id"],
                        "session_token" => $token
                    ));
                    header("location: " . $config["url"]);
                } else {
                    // Ewww error
                    $error = true;
                    $error_msg = "Password is wrong!";
                }
            }
        } else {
            // Username/Password doesn't match
            $error = true;
            $error_msg = "Are you sure you want to exist without saving?";
        }
    }
}

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/login.php");
if ($tinfo["sidebar"]["login"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
