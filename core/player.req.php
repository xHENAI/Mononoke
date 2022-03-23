<?php

// core/player.req.php - Mononoke

if(isset($_POST["get_player"])) {
    $aID = mysqli_real_escape_string($conn, $_POST["aid"]);
    $eID = mysqli_real_escape_string($conn, $_POST["eid"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $host = mysqli_real_escape_string($conn, $_POST["host"]);
    $url = mysqli_real_escape_string($conn, $_POST["url"]);
    echo "haha";
}

?>