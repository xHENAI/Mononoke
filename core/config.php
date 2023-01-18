<?php

$config["title"] = "UNEKOSYS";
$config["slogan"] = "Anime Streaming";
$config["url"] = "http://localhost/UNEKO/";
$config["cookie"] = "uneko";
$config["domain"] = "localhost";
$config["email"] = "example@domain.com";

$config["logo"]["type"] = "text"; // "img", "text", "both"
$config["logo"]["url"] = "assets/img/logo.png";

$config["display"]["series"] = 3;
$config["display"]["movies"] = 3;
$config["display"]["episodes"] = 200;

$config["disqus"]["enabled"] = false;
$config["disqus"]["key"] = "";

$config["default"]["theme"] = "mononoke";
$config["default"]["lang"] = "en";
$config["default"]["perpage"] = 25;
$config["default"]["level"] = 30;

$config["captcha"]["enabled"] = false;
$config["captcha"]["type"] = "hcaptcha"; // "hcaptcha", "securimage"
$config["captcha"]["hcaptcha"]["sitekey"] = "";
$config["captcha"]["hcaptcha"]["secret"] = "";

$config["favicon"]["dir"] =  "assets/favicon/";
$config["favicon"]["favicon"] = "favicon.ico";
$config["favicon"]["16x16"] = "favicon-16x16.png";
$config["favicon"]["32x32"] = "favicon-32x32.png";
$config["favicon"]["apple"] = "apple-touch-icon.png";
$config["favicon"]["webmanifest"] = "site.webmanifest";

$config["db"]["host"] = "localhost";
$config["db"]["user"] = "root";
$config["db"]["pass"] = "";
$config["db"]["table"] = "unekosys";
$config["db"]["port"] = 3306; // 3306 by default for all webservers
$config["db"]["prefix"] = "";
$config["db"]["charset"] = "utf8";
