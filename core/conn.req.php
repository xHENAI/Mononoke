<?php

// core/conn.req.php - aniZero2

$conn = new mysqli($slave["host"], $slave["user"], $slave["pass"], $slave["tale"]);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    // Something went wrong?
    die("Couldn't connect to Database: " . $conn->connect_error);
}

?>
