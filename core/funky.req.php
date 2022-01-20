<?php

// core/funky.req.php - aniZeroTwo

/* Get User-details from cookie or Session and set status */
if((isset($_COOKIE[$config["cookie"]."session"]) && !empty($_COOKIE[$config["cookie"]."session"])) || (isset($_SESSION[$config["cookie"]."session"]) && !empty($_SESSION[$config["cookie"]."session"]))) {
    if(!empty($_COOKIE[$config["cookie"]."session"])) {
        $checking = $_COOKIE[$config["cookie"]."session"];
    } else {
        $checking = $_SESSION[$config["cookie"]."session"];
    }
    $checking = $conn->query("SELECT * FROM `user_tokens` WHERE `token`='$checking'");
    if(mysqli_num_rows($checking)==1) {
        // Perform user-check of all data
        $user = mysqli_fetch_assoc($checking);
        $user = $user["user"];
        $user = $conn->query("SELECT * FROM `user` WHERE `id`='$user' LIMIT 1");
        $user = mysqli_fetch_assoc($user);
        $loggedin = true;
    } else {
        // Invalid session! (Hacking attempt?)
        $loggedin = false;
    }
} else {
    $loggedin = false;
    $user = array("theme" => $config["theme"], "level" => "50");
}

/* Functions */

function glyph($glyph, $title) {
    echo "<span class=\"glyphicon glyphicon-$glyph\" title=\"$title\"></span>";
}

?>
