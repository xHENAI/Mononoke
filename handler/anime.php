<?php

require("../load.php");

$anime = new Anime($purifier->purify($_GET["slug"]));
$studio = new Studio();

if (!isset($_COOKIE[$config["cookie"] . $anime->getSlug()]) || $_COOKIE[$config["cookie"] . $anime->getSlug()] == false) {
    $conn->insert("views", array("anime_id" => $anime->getId()));
    setcookie($config["cookie"] . $anime->getSlug(), true, time() + (86400 * 30), "/", $config["domain"]);
}

$views = $anime->getViews();
$studios = $studioclass->getStudios($anime->getStudio());
$season = new Season($anime->getSeason());
$type = new Type($anime->getTypeID());
$creator = $userclass->get($anime->getCreatedBy());
$genres = $anime->convertTags($anime->getGenres());

// Pagination-block
$pagination = empty($_GET["pagination"]) ? 1 : (is_numeric($_GET["pagination"]) ? stripNumbers($purifier->purify($_GET["pagination"])) : 1);
$conn->pageLimit = $config["display"]["episodes"];
$episodes = $conn->where("anime_id", $anime->getId())->orderBy("added", "DESC")->arrayBuilder()->paginate("episode", $pagination);
$total_pages = $conn->totalPages;
$prev_page = $pagination == 1 ? 1 : $pagination - 1;
$next_page = $pagination < $total_pages ? $pagination + 1 : $total_pages;

$first_ep = $conn->where("anime_id", $anime->getId())->orderBy("episode", "ASC")->getOne("episode");
$last_ep = $conn->where("anime_id", $anime->getId())->orderBy("episode", "DESC")->getOne("episode");

if ($loggedin == true) {
    $bookmark = $conn->where("user_id", $user->getId())->where("anime_id", $anime->getId())->orderBy("created", "ASC")->getOne("bookmark");
    $istrack = $conn->where("user_id", $user->getId())->where("anime_id", $anime->getId())->getOne("tracked");
}

$bookmark["status"] = $bookmark["status"] ?? 2;
// if (empty($bookmark["id"])) { maybe I can shorten this with the statement above?
//     $bookmark["status"] = "2";
// }


include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/anime.php");
if ($tinfo["sidebar"]["anime"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
