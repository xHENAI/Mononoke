<?php

require("../load.php");

$anime = $conn->orderBy("RAND ()")->getOne("anime", "slug");
header("Location: " . $config["url"] . "anime/" . $anime["slug"] . "/");
exit;
