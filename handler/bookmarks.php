<?php

require("../load.php");

if (!isset($_GET["user"]) || empty($_GET["user"])) {
    header("Location: ?user={$user->getName()}");
}
$tracker = new User($conn->escape($purifier->purify($_GET["user"])));
if (!isset($_GET["tab"]) || empty($_GET["tab"])) {
    header("Location: ?user={$tracker->getName()}&tab=watching");
}
$tab = cat($purifier->purify($_GET["tab"]));

if ($loggedin == true) {
    switch (cat($conn->escape($purifier->purify($_GET["tab"])))) {
        case "planned":
            $conn->where("status", 1);
            break;
        case "paused":
            $conn->where("status", 3);
            break;
        case "completed":
            $conn->where("status", 4);
            break;
        case "dropped":
            $conn->where("status", 5);
            break;
        default:
            $conn->where("status", 2); // Watching
    }

    // Pagination-block
    $pagination = empty($_GET["page"]) ? 1 : (is_numeric($_GET["page"]) ? stripNumbers($purifier->purify($_GET["page"])) : 1);
    $conn->pageLimit = $loggedin == true ? $user->getPerpage() : $config["default"]["perpage"];
    $bookmarks = $conn->orderBy("created", "DESC")->arrayBuilder()->paginate("bookmark", $pagination);
    $total_pages = $conn->totalPages;
    $prev_page = $pagination == 1 ? 1 : $pagination - 1;
    $next_page = $pagination < $total_pages ? $pagination + 1 : $total_pages;
} else {
    echo "<!-- don't waste resources on not-logged users :D better go login m8 -->";
}

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/bookmarks.php");
if ($tinfo["sidebar"]["bookmarks"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
