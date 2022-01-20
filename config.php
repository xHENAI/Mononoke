<?php

// config.php - aniZeroTwo

/* Main configuration */

$config["name"] = "aniZeroTwo"; // Name that will be shown in Title and menu (if no picture)
$config["picture"] = "assets/img/menu.png"; // Picure that will be shown in menu (leave empty for name only)
$config["url"] = "http://localhost/aniZeroTwo/"; // Full URL to page, needs to end with a slash!
$config["theme"] = "1"; // Default Theme - Located in /scripts/bootstrap/css/bootstrap.[theme].css
$config["registration"] = true; // true = people can signup, false = people can't
$config["email"] = "anizero@henai.eu"; // Contact eMail (leave blank for none)
$config["private"] = true; // true = you need to be logged in, false = everyone can view Anime etc.
$config["cookie"] = "anizerotwo_"; // Cookie prefix, you SHOULD change this!

/* SEO is experimental and in work */

$seo["slogan"] = "Your place to watch Anime online in High-Quality in english with subtitles!";

/* MySQL configuration */

$slave["host"] = "localhost"; // MySQL Host
$slave["user"] = "root"; // Username for MySQL
$slave["pass"] = ""; // Password for User
$slave["tale"] = "anizerotwo"; // MySQL Table

?>
