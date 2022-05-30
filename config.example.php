<?php

$config = [
    "title"     => "Mononoke",                                  // Title of your site
    "slogan"    => "Watch Anime for Free in HD",                // Slogan for your site
    "logolight" => "images/logo-light.png",                     // Logo for lightmode
    "logodark"  => "images/logo-dark.png",                      // Logo for darkmode
    "url"       => "https://yourdomain.com/subfolder/",         // General home URL of your site
    "asset_url" => "https://yourdomain.com/subfolder/assets/",  // Assets url of your site
    "api_url"   => "https://yourdomain.com/subfolder/mnt/",     // Where the /mnt/ folder is reachable on your site
    "domain"    => "yourdomain.com",                            // For Cookies, no https or / or www, only domain with . (like your-domain.com or sub.yourdomain.com)
    "email"     => "email@yourdomain.com",                      // For Password-resets if user is logged in
    "cookie"    => "changeme_",                                 // What is the cookie prefix? [yourprefix_]session
];

$settings = [
    "lang"      => "en",            // Default Language
    "theme"     => "darkmode",      // Default Theme, "darkmode" or "lightmode"
    "disqus"    => "yourdisqus",    // Disqus Subdomain e.g: yourdomain.disqus.com then yourdomain
    "onepage"   => false,           // Uses AJAX not to reload the page on clicking a link (glitchy but works!) recomended turning to false, true can be too
    "dis_movie" => 5,               // How many new movies to display in sidebar?
    "dis_serie" => 5,               // How many new series to display in sidebar?
];

$slave = [
    "host"      => "localhost",     // MySQL Host
    "user"      => "root",          // MySQL Username
    "pass"      => "",              // Password for Username
    "tale"      => "streamanime",   // Database to use
];

?>
