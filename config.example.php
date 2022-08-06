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
    "credits"   => true,                                        // Your choice to show or hide who made this. I prefer leaving it on true, but that's up to you.
];

$seo = [
    "color"     => "#33ccff", // The color the embed will have when displayed (such as on Discord)
    "animes"    => "Brose all our Animes and watch them for free in high quality! Come check us out :D",                    // Text displayed on Animes page embed
    "az-list"   => "Brose all our Animes from A to Z on our site with no ads and stream episodes in high quality!",         // Text displayed on A-Z List page embed
    "bookmarks" => "Keep track of your Animes and make sure you don't miss out new episodes by Bookmarking them! Create an Account and do it today!", // Text displayed on Bookmarks page embed
    "fan"       => "You want to become a fan as well? Join us by creating an account! What are you waiting for? It's free and we respect your privacy!", // Text displayed on Profile/Fan page embed
    "genre"     => "Browse all our Animes by genre! Don't hesitate to find new ones to watch with us :)", // Text displayed on Genre page embed
    "genres"    => "An overview of all genres we have. It's huuge! Don't miss out and come watch Anime with us, you won't regret it!", // Text displayed on Genres page embed
    "home"      => "Welcome to Mononoke, your place to watch Animes and keep track of new releases. Create an account for free and start tracking! We respect your privacy and store NONE of your data! What are you waiting for?", // Text displayed on Home page embed
    "random"    => "Watch a random Anime! We won't spoiler you, which one it is :)", // Text displayed on Random page embed
    "season"    => "Browse all Animes by this season! Wanna know what came out? Just wait and see :)", // Text displayed on Season page embed
    "seasons"   => "Brose all Seasons and their Animes! Wanna know what came out? Just wait and see :)", // Text displayed on Seasons page embed
    "studios"   => "View all the Studios that have Animes viewable on us! Why wait? Because... there's no excuse. Now come and browse!", // Text displayed on Studios page embed
    "studio"    => "View all the Animes the Studio has viewable on us! Why wait? Because... there's no excuse. Now come and browse!", // Text displayed on Studios page embed
    "watch"     => "Watch episodes in full length and in high-quality in top-speed on our site now! Keep track of what you watch by creating an account bookmarking them! What are you waiting for? It's free and we respect your privacy!", // Text displayed on Watch page embed
];

$settings = [
    "lang"      => "en",            // Default Language
    "theme"     => "darkmode",      // Default Theme, "darkmode" or "lightmode"
    "disqus"    => "yourdisqus",    // Disqus Subdomain e.g: yourdomain.disqus.com then yourdomain
    "onepage"   => false,           // Uses AJAX not to reload the page on clicking a link (glitchy but works!) recomended turning to false, true can be too
    "dis_movie" => 5,               // How many new movies to display in sidebar?
    "dis_serie" => 5,               // How many new series to display in sidebar?
    "cache"     => true,            // Can improve website loading massivle on all but especially slow webservers. If you encounter errors or so, try setting to false and report them
    "cachetime" => 2628288,         // How many seconds is the cache valid? Default is a month
];

$captcha = [
    "enabled"   => false,            // Enable hCaptcha? Recommended: true, default: false
    "sitekey"   => "your-site-key",
    "secret"    => "0x-your-secret"
];

$slave = [
    "host"      => "localhost",     // MySQL Host
    "user"      => "root",          // MySQL Username
    "pass"      => "",              // Password for Username
    "tale"      => "streamanime",   // Database to use
];

?>
