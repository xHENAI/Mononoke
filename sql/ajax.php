<?php

// This may be partly insecure but I don't know for sure. If you can improve it, please let me know via Discord. -Saintly2k

require "../load.php";
$output = "error";

if ($loggedin == true) {
    if (isset($_GET["type"]) && $_GET["type"] == "add") {
        $anime = stripNumbers($purifier->purify($_GET["anime"]));
        $conn->insert("bookmark", array(
            "user_id" => $user->getId(),
            "anime_id" => $anime,
            "status" => 2
        ));
        $output = "added";
    }

    if (isset($_GET["type"]) && $_GET["type"] == "update_bookmark") {
        $anime = stripNumbers($purifier->purify($_GET["anime"]));
        $status = stripNumbers($purifier->purify($_GET["status"]));
        $conn->where("user_id", $user->getId())->where("anime_id", $anime)->update("bookmark", array(
            "status" => $status
        ));
        $output = "updated";
    }

    if (isset($_GET["type"]) && $_GET["type"] == "delete") {
        $anime = stripNumbers($purifier->purify($_GET["anime"]));
        $conn->where("user_id", $user->getId())->where("anime_id", $anime)->delete("bookmark");
        $conn->where("user_id", $user->getId())->where("anime_id", $anime)->delete("tracked");
        $output = "deleted";
    }

    if (isset($_GET["type"]) && $_GET["type"] == "activate_youtrack") {
        $anime = stripNumbers($purifier->purify($_GET["aid"]));
        $ep = stripNumbers($purifier->purify($_GET["ep"]));
        $tpe = cat($purifier->purify($_GET["tpe"]));
        $conn->insert("tracked", array(
            "user_id" => $user->getId(),
            "anime_id" => $anime,
            "episode_number" => $ep,
            "type" => $tpe
        ));
        $bm = empty($conn->where("user_id", $user->getId())->where("anime_id", $anime)->getOne("bookmark")) ? 0 : 1;
        if ($bm == 0) {
            $conn->insert("bookmark", array(
                "user_id" => $user->getId(),
                "anime_id" => $anime,
                "status" => 2
            ));
            $output = "bm";
        } else {
            $output = "tracked";
        }
    }

    if (isset($_GET["type"]) && $_GET["type"] == "remove_youtrack") {
        $anime = stripNumbers($purifier->purify($_GET["anime"]));
        $tpe = cat($purifier->purify($_GET["tpe"]));
        $conn->where("user_id", $user->getId())->where("anime_id", $anime)->where("type", $tpe)->delete("tracked");
        $output = "removed";
    }

    if (isset($_GET["type"]) && $_GET["type"] == "update_youtrack") {
        $anime = stripNumbers($purifier->purify($_GET["anime"]));
        $ep = stripNumbers($purifier->purify($_GET["ep"]));
        $tpe = cat($purifier->purify($_GET["tpe"]));
        $conn->where("user_id", $user->getId())->where("anime_id", $anime)->where("type", $tpe)->update("tracked", array(
            "episode_number" => $ep
        ));
        $output = "updated";
    }

    // if (isset($_GET["edit"]) && $_GET["edit"] == "settings") {
    // }
}

echo $output;
