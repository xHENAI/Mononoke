<?php

require "../load.php";

// Pagination-block
$pagination = empty($_GET["pagination"]) ? 1 : (is_numeric($_GET["pagination"]) ? stripNumbers($purifier->purify($_GET["pagination"])) : 1);
$conn->pageLimit = $loggedin == true ? $user->getPerpage() : $config["default"]["perpage"];
$users = $conn->orderBy("username", "ASC")->arrayBuilder()->paginate("user", $pagination, "id");
$total_pages = $conn->totalPages;
$prev_page = $pagination == 1 ? 1 : $pagination - 1;
$next_page = $pagination < $total_pages ? $pagination + 1 : $total_pages;

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/users.php");
if ($tinfo["sidebar"]["users"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
