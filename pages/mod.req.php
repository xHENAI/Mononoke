<?php

// pages/mod.req.php - Mononoke

$action = mysqli_real_escape_string($conn, $_GET["action"]);

include("mod/$action.req.php");

?>