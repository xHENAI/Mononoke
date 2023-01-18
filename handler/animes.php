<?php

require("../load.php");

if (isset($_GET["mode"])) {
    switch ($_GET["mode"]) {
        case "all":
            $mode = "all";
            break;
        case "text":
            $mode = "text";
            break;
        default:
            $mode = "all";
    }
} else {
    $mode = "all";
}

$seasons = $conn->orderBy("name", "ASC")->get("season");
$genres = $conn->orderBy("name", "ASC")->get("genre");
$studios = $conn->orderBy("name", "ASC")->get("studio");
$types = $conn->orderBy("name", "ASC")->get("type");
$yolo = false;

if (!isset($_GET["title"]) || empty($_GET["title"])) {
    if (isset($_GET["genre"])) {
        $tmpGenre = [];
        foreach ($_GET["genre"] as $tmpGenres) {
            array_push($tmpGenre, $tmpGenres);
        }
        $tmpGenre = json_encode($tmpGenre);
        $conn->jsonContains("genre", str_replace('"', "", preg_replace('/[.^[],0-9]/', '', $tmpGenre)));
    }
    isset($_GET["season"]) && !empty($_GET["season"]) ? $conn->where("season_id", stripNumbers($purifier->purify($_GET["season"]))) : "";
    if (isset($_GET["studio"])) {
        $tmpStudio = [];
        foreach ($_GET["studio"] as $tmpStudios) {
            array_push($tmpStudio, $tmpStudios);
        }
        $tmpStudio = json_encode($tmpStudio);
        $conn->jsonContains("studio_id", str_replace('"', "", preg_replace('/[.^[],0-9]/', '', $tmpStudio)));
    }
    // Studios
    // Sub (not? since EP decides sub or dub I guess LOL)
    isset($_GET["status"]) && !empty($_GET["status"]) ? $conn->where("status", stripNumbers($purifier->purify($_GET["status"]))) : "";
    isset($_GET["type"]) && !empty($_GET["type"]) ? $conn->where("type_id", stripNumbers($purifier->purify($_GET["type"]))) : "";
    switch ($_GET["order"] ?? "NAME ASC") {
        case "NAME ASC":
            $conn->orderBy("name", "ASC");
            break;
        case "NAME DESC":
            $conn->orderBy("name", "DESC");
            break;
        case "ADDED DESC":
            $conn->orderBy("added", "DESC");
            break;
        default:
            $conn->orderBy("name", "ASC");
    }
} else {
    $conn->where("name", "%" . $conn->escape($purifier->purify($_GET["title"])) . "%", "like");
}

// Pagination-block
$pagination = empty($_GET["pagination"]) ? 1 : (is_numeric($_GET["pagination"]) ? stripNumbers($purifier->purify($_GET["pagination"])) : 1);
$conn->pageLimit = $loggedin == true ? $user->getPerpage() : $config["default"]["perpage"];
$animes = $conn->arrayBuilder()->paginate("anime", $pagination, "id");
$total_pages = $conn->totalPages;
$prev_page = $pagination == 1 ? 1 : $pagination - 1;
$next_page = $pagination < $total_pages ? $pagination + 1 : $total_pages;
// echo $conn->getLastQuery(); // for debugging?

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/animes.php");
if ($tinfo["sidebar"]["animes"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
