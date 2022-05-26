<?php

$config = [
    "title"     => "Mononoke",                          // Title of your site
    "logolight" => "images/logo-light.png",             // Logo for lightmode
    "logodark"  => "images/logo-dark.png",              // Logo for darkmode
    "url"       => "http://localhost/anistall/",           // General home URL of your site
    "asset_url" => "http://localhost/anistall/assets/",    // Assets url of your site
    "api_url"   => "http://localhost/anistall/api/",       // Where the /api/ folder is reachable on your site
    "domain"    => "localhost",                         // For Cookies, no https or / or www, only domain with . (like your-domain.com or sub.yourdomain.com)
    "cookie"    => "mono_",                             // What is the cookie prefix? [yourprefix_]session
];

$settings = [
    "lang"      => "en",            // Default Language
    "theme"     => "darkmode",      // Default Theme, "darkmode" or "lightmode"
    "disqus"    => "yourdisqus",    // Disqus Subdomain e.g: yourdomain.disqus.com then yourdomain
    "dis_movie" => 5,               // How many new movies to display in sidebar?
    "dis_serie" => 5,               // How many new series to display in sidebar?
];

$slave = [
    "host"      => "localhost",     // MySQL Host
    "user"      => "root",          // MySQL Username
    "pass"      => "",              // Password for Username
    "tale"      => "streamanime",   // Database to use
];

/* DO NOT EDIT BELOW THIS LINE! */

$version = "v0.1.1-beta";

$versions = [
    "v0.1.1-beta",
    "v0.1.0-beta",
    "v0.0.9-alpha",
    "v0.0.8-alpha",
    "v0.0.7-alpha",
    "v0.0.6-alpha",
    "v0.0.5-alpha",
    "v0.0.4-alpha",
    "v0.0.3-alpha",
    "v0.0.2-alpha",
    "v0.0.1-alpha",
];

?>
