<?php

require("../load.php");


$random_anime = $conn->orderBy("RAND ()")->get("anime", 5);
$latest_anime = $conn->orderBy("added", "DESC")->get("anime", 5);

// Pagination-block
$pagination = empty($_GET["pagination"]) ? 1 : (is_numeric($_GET["pagination"]) ? stripNumbers($purifier->purify($_GET["pagination"])) : 1);
$conn->pageLimit = $loggedin == true ? $user->getPerpage() : $config["default"]["perpage"];
$latest_episodes = $conn->orderBy("added", "DESC")->arrayBuilder()->paginate("episode", $pagination);
$total_pages = $conn->totalPages;
$prev_page = $pagination == 1 ? 1 : $pagination - 1;
$next_page = $pagination < $total_pages ? $pagination + 1 : $total_pages;

if (isset($_GET["logout"]) && $loggedin == true) {
    // Removing token from Database and destroy entire session and so on
    $conn->where("user_id", $user->getId())->delete("session");
    setcookie($config["cookie"] . "session", "", time() - 3600, "/", "");
    session_destroy();
    session_unset();
    header("location: " . $config["url"] . "login");
}

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/home.php");
if ($tinfo["sidebar"]["home"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
