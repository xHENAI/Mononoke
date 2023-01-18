<?php

require("../load.php");

$slug = cat($conn->escape($purifier->purify($_GET["slug"])));
$ep = stripNumbers(cat($conn->escape($purifier->purify($_GET["ep"]))));
$type = cat($conn->escape($purifier->purify($_GET["type"])));

$anime = new Anime($slug);
$ep = $conn->where("anime_id", $anime->getId())->where("episode", $ep)->where("type", $type)->getOne("episode");
$ep = new Episode($ep["id"]);
$streams = $ep->getStreams(strtolower($ep->getType()));
if (!empty($streams)) {
    $mainstream = $streams[0];
} else {
    $mainstream["url"] = "no-player";
}
$prev_ep = $conn->where("anime_id", $anime->getId())->where("type", $type)->where("episode < {$ep->getEpisode()}")->orderBy("episode", "ASC")->getOne("episode");
$next_ep = $conn->where("anime_id", $anime->getId())->where("type", $type)->where("episode > {$ep->getEpisode()}")->orderBy("episode", "ASC")->getOne("episode");

if ($loggedin == true) {
    $qwretzu = "hah";
    $bookmark = $conn->where("user_id", $user->getId())->where("anime_id", $anime->getId())->orderBy("created", "ASC")->getOne("bookmark");
    $istrack = $conn->where("user_id", $user->getId())->where("anime_id", $anime->getId())->where("type", $type)->getOne("tracked");
}

if (empty($bookmark["id"])) {
    $bookmark["status"] = "2";
}

if (empty($istrack["episode_number"])) {
    $istrack["episode_number"] = $ep->getEpisode();
}

$views = $anime->getViews();
$studios = $studioclass->getStudios($anime->getStudio());
$season = new Season($anime->getSeason());
$type = new Type($anime->getTypeID());
$creator = $userclass->get($anime->getCreatedBy());
$genres = $anime->convertTags($anime->getGenres());

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/watch.php");
if ($tinfo["sidebar"]["watch"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
