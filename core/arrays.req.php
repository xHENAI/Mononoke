<?php

// core/arrays.req.php - Mononoke

$noNav = [
    "signin",
    "signup",
    "confirm",
    "forgot",
    "changelog",
    "news",
    "forum",
    "add_anime",
    "edit_anime",
    "add_episode",
    "edit_episode",
];

$controlNav = [
    "watchlist",
    "follows",
];

$scheduleNav = [
    "schedule",
    "newest",
    "mod",
];

$watchNav = [
    "watch",
];

$followNav = [
    "anime",
];

$requireLogin = [
    "settings",
    "follows",
    "forum",
];

$requireMod = [
    "new_forum",
    "edit_forum",
    "add_anime",
    "edit_anime",
    "add_episode",
    "edit_episode",
    "mod",
];

$requireAdmin = [
    "system",
];

$banned_usernames = [
    "<script>",
    "alert",
    "mysqli",
    "mysql",
    "$",
    "<",
    ">",
];

?>
