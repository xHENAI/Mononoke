<?php

require "../load.php";

if ($loggedin == false) die("Are you sure you want to exist without saving?");
$type = cat($conn->escape($purifier->purify($_GET["type"])));

$error = false;
$error_msg = "";

if (!empty($type) && $type == "stream" && $loggedin == true) {
    $type_raw = $type;
    $type = "Stream";
    $type = $conn->escape($purifier->purify($_GET["url"]));
    $stream = $conn->where("url", $url)->getOne("streams");
    if (empty($stream["id"])) die("Are you sure you want to exist without saving?");
    if (isset($_GET["report"])) {
        $reason = $conn->escape($purifier->purify($_GET["reason"]));
        $message = $conn->escape($purifier->purify($_GET["message"]));
        if ($config["captcha"]["enabled"]) {
            if ($config["captcha"]["type"] == "hcaptcha") {
                $data = array(
                    'secret' => $captcha["secret"],
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
            $conn->insert("reports", array(
                "type" => $type_raw,
                "url" => $url,
                "reason" => $reason,
                "message" => $message,
                "user" => $user->getId()
            ));
            header("Refresh: 0; url=?success");
        }
    }
}

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/report.php");
if ($tinfo["sidebar"]["report"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
