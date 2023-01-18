<?php

require("../load.php");

if (!empty($_GET["show"])) {
    // Pagination-block
    $pagination = empty($_GET["pagination"]) ? 1 : (is_numeric($_GET["pagination"]) ? stripNumbers($purifier->purify($_GET["pagination"])) : 1);
    $conn->pageLimit = $loggedin == true ? $user->getPerpage() : $config["default"]["perpage"];
    $animes = $conn->where("name", cat($purifier->purify($_GET["show"])) . "%", "like")->orderBy("added", "DESC")->arrayBuilder()->paginate("anime", $pagination, "id");
    $total_pages = $conn->totalPages;
    $prev_page = $pagination == 1 ? 1 : $pagination - 1;
    $next_page = $pagination < $total_pages ? $pagination + 1 : $total_pages;
}

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/az-list.php");
if ($tinfo["sidebar"]["az-list"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
