<?php

// config.php - Mononoke

/* General configuration */

$config["name"] = "Mononoke"; // Name that will be shown in Title and menu (if no picture)
$config["picture"] = ""; // Picure that will be shown in menu (leave empty for name only)
$config["url"] = "http://localhost/Mononoke/"; // Full URL to page, needs to end with a slash!
$config["theme"] = "1"; // Default Theme - Located in /scripts/bootstrap/css/bootstrap.[theme].css
$config["registration"] = true; // true = people can signup, false = people can't
$config["email"] = "anizero@henai.eu"; // Contact eMail (leave blank for none)
$config["private"] = false; // true = you need to be logged in, false = everyone can view Anime etc.
$config["cookie"] = "mono_"; // Cookie prefix, you SHOULD change this! Should end with underscore_
$config["domain"] = "localhost"; // For cookies, the domain only, no https and folder
$config["lang"] = "en-us"; // Languages are located in /langs/

/* MySQL configuration */

$slave["host"] = "localhost"; // MySQL Host
$slave["user"] = "root"; // Username for MySQL
$slave["pass"] = ""; // Password for User
$slave["tale"] = "mononoke"; // MySQL Table
