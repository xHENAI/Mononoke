<?php

// config.php - Mononoke

/* Main configuration */

$config["name"] = "Mononoke"; // Name that will be shown in Title and menu (if no picture)
$config["picture"] = ""; // Picure that will be shown in menu (leave empty for name only)
$config["url"] = "http://localhost/"; // Full URL to page, needs to end with a slash!
$config["theme"] = "1"; // Default Theme - Located in /scripts/bootstrap/css/bootstrap.[theme].css
$config["registration"] = true; // true = people can signup, false = people can't
$config["email"] = "anizero@henai.eu"; // Contact eMail (leave blank for none)
$config["private"] = true; // true = you need to be logged in, false = everyone can view Anime etc.
$config["cookie"] = "mono_"; // Cookie prefix, you SHOULD change this!

/* eMail configuration (You can leave them as they are, no further editing required) */

$mail["confirm_mail"] = "Please confirm your eMail!"; // eMail subject
$mail["confirm_content"] = "Hey there!\n\nYour ".$config["name"]." account was created, now you only need to activate it.\nPlease follow the link below to do so.\n\n"; // eMail message
$mail["reset_mail"] = "Confirm your Password-reset!"; // eMail subject
$mail["reset_content"] = "Hello there!\n\nAs you have been requesting an Account reset, here you go!\nPlease click the link below to confirm your actions and reset your password.\n\n"; // eMail message

/* SEO is experimental and in work */

$seo["slogan"] = "Your place to watch Anime online in High-Quality in english with subtitles!";

/* MySQL configuration */

$slave["host"] = "localhost"; // MySQL Host
$slave["user"] = "root"; // Username for MySQL
$slave["pass"] = "root"; // Password for User
$slave["tale"] = "mononoke"; // MySQL Table

?>
