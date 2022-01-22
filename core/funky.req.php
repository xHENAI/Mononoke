<?php

// core/funky.req.php - aniZero2

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
        $user = $conn->query("SELECT * FROM `user` WHERE `username`='$user' LIMIT 1");
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

function redirect($destination) {
    echo "<script type=\"text/javascript\"> document.location = \"../".$destination."\"; </script>";
}

function convert_level($level) {
    if($level==0) {
        $level = "Administrator";
    } elseif($level==10) {
        $level = "Moderator";
    } elseif($level==20) {
        $level = "User";
    } else {
        $level = "User (eMail not confirmed)";
    }
    echo $level;
}

function convert_theme($theme) {
    if($theme==0) {
        $theme = "Bootstrap Light";
    } elseif($theme==1) {
        $theme = "Cerulean Light";
    } elseif($theme==2) {
        $theme = "Bootstrap Dark";
    } elseif($theme==3) {
        $theme = "Cyborg Dark";
    } else {
        $theme = "Darkly Dark";
    }
    echo $theme;
}

?>
