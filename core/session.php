<?php

if ((isset($_COOKIE[$config["cookie"] . "_session"]) && !empty($_COOKIE[$config["cookie"] . "_session"])) || (isset($_SESSION[$config["cookie"] . "_session"]) && !empty($_SESSION[$config["cookie"] . "_session"]))) {
    if (!empty($_COOKIE[$config["cookie"] . "_session"])) {
        $checking = $purifier->purify($_COOKIE[$config["cookie"] . "_session"]);
    } else {
        $checking = $purifier->purify($_SESSION[$config["cookie"] . "_session"]);
    }
    $checking = $conn->where("session_token", $checking)->getOne("session");
    if (!empty($checking["id"])) {
        // Perform user-check of all data
        $user = new User($checking["user_id"]);
        $loggedin = true;
    } else {
        // Invalid session! (Hacking attempt or outdated? who knows...)
        $loggedin = false;
    }
} else {
    $loggedin = false;
}
