<?php

$page = 1;

$animes = $conn->query("SELECT * FROM `animes` ORDER BY `id` ASC");

?>

<title>Browse Anime - Page <?= $page ?> | <?= $config["name"] ?></title>
