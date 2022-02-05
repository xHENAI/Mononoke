<?php

// core/conn.req.php - aniZero2

$conn = new mysqli($slave["host"], $slave["user"], $slave["pass"], $slave["tale"]);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    // Something went wrong?
    die("Couldn't connect to Database: " . $conn->connect_error);
}

/* Get User-details from cookie or Session and set status */
if((isset($_COOKIE[$config["cookie"]."session"]) && !empty($_COOKIE[$config["cookie"]."session"])) || (isset($_SESSION[$config["cookie"]."session"]) && !empty($_SESSION[$config["cookie"]."session"]))) {
    if(!empty($_COOKIE[$config["cookie"]."session"])) {
        $checking = mysqli_real_escape_string($conn, $_COOKIE[$config["cookie"]."session"]);
    } else {
        $checking = mysqli_real_escape_string($conn, $_SESSION[$config["cookie"]."session"]);
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
        // Invalid session! (Hacking attempt or outdated? who knows...)
        $loggedin = false;
        $user = array("theme" => $config["theme"], "level" => "50", "read_announce" => "0", "lang" => $config["lang"]);
    }
} else {
    $loggedin = false;
    $user = array("theme" => $config["theme"], "level" => "50", "read_announce" => "0", "lang" => $config["lang"]);
}

?>
