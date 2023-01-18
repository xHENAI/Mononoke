<?php

//ini_set("error_reporting", 0);
//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
     ______  _______           _____  _____   ______           _____  _____   ______           _____     ____    ____       ______   
    |      \/       \     ____|\    \|\    \ |\     \     ____|\    \|\    \ |\     \     ____|\    \   |    |  |    |  ___|\     \  
   /          /\     \   /     /\    \\\    \| \     \   /     /\    \\\    \| \     \   /     /\    \  |    |  |    | |     \     \ 
  /     /\   / /\     | /     /  \    \\|    \  \     | /     /  \    \\|    \  \     | /     /  \    \ |    | /    // |     ,_____/|
 /     /\ \_/ / /    /||     |    |    ||     \  |    ||     |    |    ||     \  |    ||     |    |    ||    |/ _ _//  |     \--'\_|/
|     |  \|_|/ /    / ||     |    |    ||      \ |    ||     |    |    ||      \ |    ||     |    |    ||    |\    \'  |     /___/|  
|     |       |    |  ||\     \  /    /||    |\ \|    ||\     \  /    /||    |\ \|    ||\     \  /    /||    | \    \  |     \____|\ 
|\____\       |____|  /| \_____\/____/ ||____||\_____/|| \_____\/____/ ||____||\_____/|| \_____\/____/ ||____|  \____\ |____ '     /|
| |    |      |    | /  \ |    ||    | /|    |/ \|   || \ |    ||    | /|    |/ \|   || \ |    ||    | /|    |   |    ||    /_____/ |
 \|____|      |____|/    \|____||____|/ |____|   |___|/  \|____||____|/ |____|   |___|/  \|____||____|/ |____|   |____||____|     | /
    \(          )/          \(    )/      \(       )/       \(    )/      \(       )/       \(    )/      \(       )/    \( |_____|/ 
     '          '            '    '        '       '         '    '        '       '         '    '        '       '      '    )/    
                                                                                                                               '     
  _             _______                     _    _ ____ ____ _______        _     _    _ ______ _   _          _____             
 | |           |__   __|                   | |  | |___ \___ \__   __|      | |   | |  | |  ____| \ | |   /\   |_   _|            
 | |__  _   _     | | ___  __ _ _ __ ___   | |__| | __) |__) | | |      ___| |_  | |__| | |__  |  \| |  /  \    | |    ___ _   _ 
 | '_ \| | | |    | |/ _ \/ _` | '_ ` _ \  |  __  ||__ <|__ <  | |     / _ \ __| |  __  |  __| | . ` | / /\ \   | |   / _ \ | | |
 | |_) | |_| |    | |  __/ (_| | | | | | | | |  | |___) |__) | | |    |  __/ |_  | |  | | |____| |\  |/ ____ \ _| |_ |  __/ |_| |
 |_.__/ \__, |    |_|\___|\__,_|_| |_| |_| |_|  |_|____/____/  |_|     \___|\__| |_|  |_|______|_| \_/_/    \_\_____(_)___|\__,_|
         __/ |                                                                                                                   
        |___/                                                                                                                    
        _ _   _           _                             __    _    _ ______ _   _          _____     ____  __                               _        
       (_) | | |         | |                           / /   | |  | |  ____| \ | |   /\   |_   _|   / /  \/  |                             | |       
   __ _ _| |_| |__  _   _| |__   ___ ___  _ __ ___    / /_  _| |__| | |__  |  \| |  /  \    | |    / /| \  / | ___  _ __   ___  _ __   ___ | | _____ 
  / _` | | __| '_ \| | | | '_ \ / __/ _ \| '_ ` _ \  / /\ \/ /  __  |  __| | . ` | / /\ \   | |   / / | |\/| |/ _ \| '_ \ / _ \| '_ \ / _ \| |/ / _ \
 | (_| | | |_| | | | |_| | |_) | (_| (_) | | | | | |/ /  >  <| |  | | |____| |\  |/ ____ \ _| |_ / /  | |  | | (_) | | | | (_) | | | | (_) |   <  __/
  \__, |_|\__|_| |_|\__,_|_.__(_)___\___/|_| |_| |_/_/  /_/\_\_|  |_|______|_| \_/_/    \_\_____/_/   |_|  |_|\___/|_| |_|\___/|_| |_|\___/|_|\_\___|
   __/ |                                                                                                                                             
  |___/     

-->

<html xmlns="https://www.w3.org/1999/xhtml" lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="theme-color" content="#0c70de">
    <meta name="msapplication-navbutton-color" content="#0c70de">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0c70de">
    <?php if (!empty($config["favicon"]["favicon"])) { ?>
        <link rel="icon" type="image/png" sizes="48x48" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["favicon"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["apple"])) { ?>
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["apple"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["16x16"])) { ?>
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["16x16"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["32x32"])) { ?>
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["32x32"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["webmanifest"])) { ?>
        <link rel="manifest" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["webmanifest"] ?>">
    <?php } ?>
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <style media="all">
        /*<![CDATA[*/
        @import url('https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i,600,600i,700,700i&?family=Inter:wght@400;700&display=swap');

        :focus {
            outline: none
        }

        *,
        :before,
        :after {
            box-sizing: border-box
        }

        blockquote,
        q {
            margin: 5px 0;
            quotes: none;
            background: #fafafa;
            border-left: 3px solid #f2f2f2;
            padding: 5px 10px
        }

        .lightmode blockquote,
        .lightmode q {
            background: #fafafa;
            border-color: #ddd
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        a {
            color: #333;
            text-decoration: none;
            transition: color .1s linear;
            -moz-transition: color .1s linear;
            -webkit-transition: color .1s linear
        }

        :focus {
            outline: none
        }

        a:hover {
            color: #0c70de;
            text-decoration: none
        }

        img {
            max-width: 100%;
            height: auto
        }

        .postbody p {
            margin: 10px 0
        }

        .clear {
            clear: both
        }

        body {
            background: #eef0f2;
            font-family: 'Fira Sans', sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #222;
            margin: 0 auto;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important
        }

        .strip {
            margin-top: 5px;
            margin-bottom: 5px;
            border-bottom: 1px dashed #d0cdcd;
            box-shadow: 0 0 4px #fff
        }

        .kln {
            overflow: hidden;
            position: relative;
            text-align: center
        }

        .blox.kln {
            margin: 0 auto;
            max-width: 1150px
        }

        .kln a.col {
            width: 50%;
            display: block;
            padding: 2px 4px;
            float: left
        }

        .klnrec {
            overflow: hidden;
            margin-bottom: 15px
        }

        .klnrec .kln {
            float: left;
            width: 70%;
            padding: 5px;
            margin-right: 5px;
            border: 1px solid #ddd
        }

        .klnrec .kln img,
        .klnrec .mini img {
            width: 100%;
            max-height: 90px
        }

        .klnrec .mini {
            overflow: hidden;
            margin-left: 10px;
            border: 1px solid #ddd;
            padding: 5px
        }

        .bixbox .kln,
        .singlex {
            float: left;
            margin-right: 15px
        }

        #floatcenter {
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .6);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999
        }

        #floatcenter .ctrx {
            width: 100%;
            max-width: 500px;
            margin: auto;
            padding-top: 20vh
        }

        .playerx {
            position: relative
        }

        #overplay {
            position: absolute;
            z-index: 200;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, .7)
        }

        #overplay .chain {
            width: 100%;
            max-width: 300px;
            margin: auto;
            padding-top: 50px
        }

        #content {
            overflow: hidden;
            max-width: 1220px;
            margin: 0 auto;
            position: relative
        }

        .wrapper {
            margin: 0 20px;
            position: relative
        }

        .mainheader {
            float: left;
            margin: 12px 40px 12px 0
        }

        .logos img {
            max-height: 50px
        }

        .logos {
            margin: 0;
            min-height: 1px;
            width: 195px;
            display: block
        }

        .logos span.hdl {
            display: none;
            width: 1px;
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute
        }

        .th {
            overflow: hidden;
            background: #fff;
            height: 75px
        }

        .th .centernav {
            margin: 0 auto;
            max-width: 1220px;
            padding: 0 20px
        }

        .shme {
            display: none
        }

        #main-menu {
            margin: 0;
            background: #0c70de;
            margin-bottom: 15px
        }

        #main-menu .centernav .logo img {
            width: 100%;
            height: auto
        }

        #main-menu .centernav {
            margin: 0 auto;
            max-width: 1220px;
            padding: 0 20px
        }

        #main-menu .centernav .logo {
            display: none;
            float: left;
            margin-top: 23px;
            margin-right: 30px;
            max-width: 190px
        }

        #main-menu .dashicons,
        #main-menu ._mi {
            line-height: inherit;
            width: auto;
            height: auto;
            font-size: 14px;
            padding-right: 2px
        }

        #main-menu ul {
            position: relative;
            float: left;
            list-style: none;
            padding: 0;
            margin: 0
        }

        #main-menu ul li {
            float: left;
            position: relative;
            margin: 0 10px
        }

        #main-menu ul li a {
            display: block;
            text-align: center;
            line-height: 46px;
            height: 46px;
            padding: 0 10px;
            color: rgba(255, 255, 255, .9);
            border-left: 0;
            transition: color .5s;
            position: relative;
            font-size: 14px
        }

        #main-menu ul .menu-item-has-children>a:after {
            content: "\f140";
            padding: 0;
            display: none;
            width: auto;
            height: auto;
            padding-left: 5px;
            font-size: 19px;
            float: right;
            line-height: 35px;
            font-family: dashicons
        }

        #main-menu ul li a:hover {
            text-decoration: none;
            color: #fff;
            background: rgba(0, 0, 0, .32)
        }

        #main-menu ul li ul {
            position: absolute;
            top: 46px;
            min-width: 240px;
            display: none;
            z-index: 9999;
            background: #333;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            box-shadow: 0 4px 4px rgba(0, 0, 0, .38);
            overflow: hidden;
            padding: 10px 0
        }

        #main-menu ul li:hover ul {
            display: block
        }

        #main-menu ul li ul li {
            float: none;
            margin: 0
        }

        #main-menu ul li:hover ul li ul {
            display: none
        }

        #main-menu ul li ul li a {
            margin: 0;
            height: auto;
            display: block;
            background: 0 0;
            line-height: normal;
            font-size: 13px;
            padding: 8px 15px;
            text-align: left;
            color: #fff
        }

        #main-menu ul li ul li a:hover {
            background: rgba(0, 0, 0, .32)
        }

        #main-menu .random {
            float: right;
            color: #fff;
            cursor: pointer;
            text-transform: none;
            font-weight: 400;
            font-size: 14px;
            margin: 0;
            border-radius: 0;
            border: 0;
            line-height: 33px;
            background: #2866a7;
            padding: 0 10px
        }

        #main-menu .random:hover {
            background: #ececec;
            color: #333;
            text-decoration: none
        }

        .show-menu {
            display: none;
            color: #fff;
            line-height: 37px;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            cursor: pointer
        }

        #main-menu input[type=checkbox] {
            display: none;
            -webkit-appearance: none
        }

        #main-menu input[type=checkbox]:checked~#menu-menu {
            display: block;
            z-index: 9999;
            float: none;
            background: #222;
            position: relative
        }

        .ms {
            border-radius: 3px;
            cursor: pointer;
            display: none;
            height: 34px;
            left: auto;
            position: absolute;
            text-align: center;
            top: 17px;
            width: 34px;
            color: #fff;
            right: 15px
        }

        #main-menu .ms .dashicons {
            display: block !important;
            font-size: 26px
        }

        #top-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            float: right;
            margin-right: 15px;
            margin-top: 25px;
            position: relative
        }

        #top-menu ul {
            position: relative;
            list-style: none;
            padding: 0;
            margin: 0;
            max-width: 460px;
            overflow: hidden;
            white-space: nowrap
        }

        #top-menu ul:hover {
            overflow-x: auto
        }

        #top-menu ul::-webkit-scrollbar {
            height: 0
        }

        #top-menu ul::-webkit-scrollbar-thumb {
            background: 0 0
        }

        #top-menu li {
            display: inline-block
        }

        #top-menu li a {
            padding: 0 10px;
            line-height: 27px;
            display: block
        }

        #top-menu li a:hover {
            background: #0c70de;
            border-radius: 5px;
            color: #fff
        }

        .topmobile {
            display: none
        }

        .searchx {
            float: left;
            width: 350px;
            margin: 20px 25px 20px 0;
            position: relative
        }

        .searchx #form {
            padding: 0;
            position: relative
        }

        .searchx #form #s {
            font-weight: 300;
            background: #fff;
            box-shadow: none !important;
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            padding-right: 30px;
            font-family: inherit;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 3px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
        }

        .searchx #form #sel {
            margin: 0;
            color: #888;
            border: 0;
            outline: 0;
            display: inline-block;
            font-family: open sans, sans-serif;
            background-color: #fff;
            border: 1px solid #e5e2e2;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border linear .2s, box-shadow linear .2s;
            -moz-transition: border linear .2s, box-shadow linear .2s;
            -o-transition: border linear .2s, box-shadow linear .2s;
            transition: border linear .2s, box-shadow linear .2s;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            padding: 4px 5px
        }

        .searchx #form #submitsearch {
            position: absolute;
            background: 0 0;
            color: #ddd;
            cursor: pointer;
            font-family: inherit;
            border: 0;
            padding: 0 7px;
            top: 8px;
            font-size: medium;
            right: 2px;
            line-height: 36px
        }

        .searchx #form #submitsearch .dashicons {
            display: block;
            font-size: 22px
        }

        .searchx #form #s:focus {
            outline: 0
        }

        .surprise {
            float: right;
            margin-top: 9px;
            background: rgba(0, 0, 0, .32);
            color: #fff;
            font-size: 12px;
            margin-right: 10px;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            padding: 5px 10px;
            line-height: 1.5
        }

        .surprise .far {
            width: auto;
            height: auto;
            font-size: 10px !important;
            margin-right: 0
        }

        .surprise:hover {
            color: #333;
            background: #fff
        }

        .loop {
            margin-bottom: 15px;
            width: 75% !important;
            float: left
        }

        .loop.notrend {
            width: 100% !important
        }

        .slide-content .rating .site-vote span span {
            font-family: Fira Sans !important;
            font-weight: 400 !important
        }

        .slide-content {
            font-family: Fira Sans !important;
            font-size: 13px
        }

        .slide-content .ellipsis {
            float: none !important;
            display: block !important
        }

        .slide-content .extras {
            margin-top: 5px !important
        }

        .slide-content .title .release-year {
            font-size: 13px !important;
            color: #FFC107 !important;
            margin: 0 !important
        }

        .slide-content .rating .site-vote .dashicons {
            font-size: 52px !important;
            width: initial !important;
            height: auto !important
        }

        .slide-content .rating .site-vote span span {
            top: 20px !important;
            left: 5px !important;
            width: 44px;
            text-align: center;
            font-size: 14px !important
        }

        .slide-content .cast strong {
            color: unset !important;
            font-weight: 400 !important
        }

        .owl-dot.active span,
        .owl-dot.active:hover span {
            background: #FFD400 !important
        }

        .slide-item.full .slide-content .poster {
            width: 22% !important
        }

        .slide-item.full .slide-content {
            padding: 30px 50px !important
        }

        /* .slide-shadow {
            background-image: url(<?= $config["url"] ?>assets/mono/images/pattern.png) !important;
            background-color: rgba(0, 0, 0, .5) !important
        } */

        .slide-content .extras div {
            color: #DDD !important
        }

        .slide-content .excerpt {
            max-height: 60px;
            overflow: hidden
        }

        .slidtop {
            overflow: hidden;
            direction: initial
        }

        .slidtop .trending {
            overflow: hidden
        }

        .slidtop .trending .tdb {
            cursor: pointer;
            height: 280px;
            margin-left: 10px;
            position: relative
        }

        /* .slidtop .trending .tdb .crown {
            background-image: url(<?= $config["url"] ?>assets/mono/images/crown.png);
            background-size: 100%;
            position: absolute;
            right: 5px;
            top: 10px;
            height: 40px;
            width: 40px;
            z-index: 3
        } */

        .slidtop .trending .tdb .imgxa {
            height: 100%;
            width: 100%;
            overflow: hidden;
            background-size: auto 100%;
            background-position: top center
        }

        .slidtop .trending .tdb .imgxa .imgxb {
            height: 100%;
            width: 100%;
            background-position: center;
            background-size: cover
        }

        .slidtop .trending .tdb .textbg {
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            transition: opacity .2s;
            z-index: 1;
            box-shadow: inset 0 0 40px #000
        }

        .slidtop .trending .tdb .textbg.blxc {
            color: #eee;
            background: url(<?= $config["url"] ?>assets/mono/images/black.png)
        }

        .slidtop .trending .tdb .textbg .bghover {
            margin-top: 40%;
            padding: 0 5%;
            line-height: 19px;
            text-align: left;
            text-transform: uppercase
        }

        .slidtop .trending .tdb .textbg .bghover .numa {
            display: block;
            font-size: 16px
        }

        .slidtop .trending .tdb .textbg .bghover .numb {
            display: block;
            font-size: 17px;
            margin-top: 5px;
            height: 55px;
            overflow: hidden
        }

        .owl-nav {
            display: none
        }

        .owl-dot {
            background: none !important;
            border: 0 !important;
            padding: 0 !important
        }

        .ntf {
            margin: 10px !important;
            padding: 8px;
            font-size: 13px;
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
            border-radius: 5px
        }

        .bookmark {
            text-align: center;
            background: #0c70de;
            font-size: 13px;
            color: #fff;
            border-radius: 5px;
            padding: 8px 5px;
            cursor: pointer
        }

        .bookmark .dashicons {
            width: auto;
            height: auto;
            font-size: 16px
        }

        .bookmark:hover {
            background: #333
        }

        .bookmark.marked {
            background: #333
        }

        .bmc {
            text-align: center;
            font-size: 12px;
            margin-top: 4px;
            color: #888
        }

        .hapus {
            display: inline-block;
            padding: 2px 18px;
            font-size: 13px;
            line-height: 20px;
            border-radius: 3px;
            color: #fff;
            background: #e53427;
            cursor: pointer
        }

        .delmark {
            position: absolute;
            z-index: 9;
            cursor: pointer;
            top: 0;
            right: 0;
            color: #fff;
            font-size: 13px;
            padding: 2px 5px;
            border-bottom-left-radius: 5px;
            background: #e53427;
            box-shadow: 0 2px 5px #000
        }

        #header {
            overflow: hidden;
            margin-bottom: 20px
        }

        #header .logo {
            float: left
        }

        #header .logo img {
            max-width: 252px;
            height: auto
        }

        #header .headads {
            float: right;
            max-width: 728px;
            max-height: 90px
        }

        .recommended {
            margin: 0 auto;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            background: #f3f3f3;
            margin-bottom: 20px;
            line-height: 28px;
            font-size: 13px;
            padding-right: 10px
        }

        .recommended h2 {
            background: #4d4d4d;
            color: #fff;
            font-weight: 700;
            line-height: 28px;
            padding: 0 5px;
            margin: 0;
            font-size: 13px;
            display: inline-block
        }

        .recommended a {
            padding: 5px;
            color: #333
        }

        .postbody {
            float: left;
            width: 70%
        }

        .postbody .ldr {
            margin: 0 -5px
        }

        .bixbox {
            background: #fff;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            margin-bottom: 18px;
            box-shadow: 1px 3px 8px rgba(49, 49, 49, .1);
            overflow: hidden
        }

        .bixbox.bixboxarc {
            overflow: unset
        }

        .bixbox .bvl {
            display: inline-block;
            background: #0c70de;
            padding: 5px 10px;
            font-size: 13px;
            border-radius: 2px;
            color: #fff;
            width: 110px;
            text-align: center
        }

        .listupd .bvlcen {
            text-align: center;
            padding-top: 15px;
            padding-bottom: 10px
        }

        .postbody .box {
            overflow: hidden;
            margin-bottom: 20px
        }

        .releases {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            border-bottom: 1px solid #ececec;
            padding: 8px 15px;
            font-family: 'Inter', sans-serif
        }

        .releases:after {
            position: absolute;
            left: 0;
            bottom: 0;
            right: auto;
            top: auto;
            height: 1px;
            width: 100%;
            background-color: transparent;
            display: block;
            z-index: 1;
            transform: scaleY(.5);
            opacity: .8;
            background-image: linear-gradient(90deg, rgba(0, 0, 0, .01) 0, rgba(0, 0, 0, .1) 10%, rgba(0, 0, 0, .2) 20%, rgba(0, 0, 0, .3) 30%, rgba(0, 0, 0, .3) 70%, rgba(0, 0, 0, .2) 80%, rgba(0, 0, 0, .1) 90%, rgba(0, 0, 0, .01) 100%)
        }

        .releases h1,
        .releases>h2,
        .releases h3,
        #sidebar .section h3,
        .releases h4,
        #sidebar .section h4 {
            font-size: 1.1em;
            color: #333;
            line-height: 20px;
            font-weight: 700;
            margin: 0;
            position: relative
        }

        .releases .vl {
            font-size: .6em;
            text-transform: uppercase;
            color: #fff;
            height: 18px;
            line-height: 18px;
            padding: 0 6px;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            background: #0c70de;
            display: inline-block;
            /* float: right; */
            margin-top: 1px;
            margin-right: -3px
        }

        .releases.hothome {
            background: #694ba1
        }

        .releases.hothome h3 {
            color: #fff
        }

        .releases.latesthome {
            background: #0c70de
        }

        .releases.latesthome h3 {
            color: #fff
        }

        .releases.latesthome .vl {
            background: #fff;
            color: #111;
            line-height: 21px;
            font-weight: 500
        }

        .releases.latesthome .vl:hover {
            background: #333;
            color: #fff
        }

        .postbody .box .rld {
            padding: 5px;
            position: relative;
            overflow: hidden
        }

        .postbody .ldr .outbx {
            float: left;
            width: 20%
        }

        .postbody .ldr .outbx .limit {
            overflow: hidden;
            position: relative;
            padding: 0 0 135%;
            background: #333
        }

        .postbody .box .rld img {
            width: 100%;
            height: auto;
            position: absolute
        }

        .postbody .box .rld h2 {
            background: linear-gradient(to bottom, rgba(0, 0, 0, .05) 6%, rgba(0, 0, 0, .85) 70%);
            text-shadow: rgba(0, 0, 0, .8) 1px 1px 0;
            position: absolute;
            padding: 10px;
            width: 100%;
            color: #fff;
            left: 0;
            bottom: 0;
            margin: 0;
            font-weight: 500;
            overflow: hidden;
            text-align: center;
            font-size: 13px;
            box-sizing: border-box
        }

        .postbody .boxed {
            overflow: hidden;
            margin-bottom: 15px
        }

        .postbody .boxed .left {
            float: left;
            margin-right: 10px
        }

        .postbody .boxed .right .lts {
            float: right;
            width: 470px
        }

        .postbody .boxed .right .lts h3 {
            text-transform: uppercase;
            padding: 5px 10px;
            font-size: 11px;
            border: 5px solid #eff1f1
        }

        .postbody .boxed .right .lts ul {
            overflow: hidden
        }

        .postbody .boxed .right .lts ul li {
            overflow: hidden;
            margin: 5px 0;
            padding-bottom: 5px;
            border-bottom: 1px solid #e2e5e5
        }

        .postbody .boxed .right .lts ul li .thumb {
            float: left;
            border: 1px solid #e2e5e5;
            overflow: hidden;
            height: 55px
        }

        .postbody .boxed .right .lts ul li .thumb img {
            width: 100px;
            height: auto
        }

        .postbody .boxed .right .lts ul li .dtl {
            width: 350px;
            padding: 5px;
            background: #f5f4f4;
            height: 47px;
            float: right
        }

        .postbody .boxed .right .lts ul li .dtl h2 {
            color: #333;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .postbody .boxed .right .lts ul li .dtl h2 a {
            color: #333
        }

        .postbody .boxed .right .lts ul li .dtl h2 a:hover {
            text-decoration: none;
            color: #f13e3e
        }

        .postbody .boxed .right .lts ul li .dtl span {
            font-family: tahoma;
            color: #555;
            display: block;
            font-size: 11px
        }

        .postbody .boxed .right .lts ul li .dtl span a {
            color: #f13e3e
        }

        .postbody .epsc .boxed .right .lts {
            float: none;
            width: 100%
        }

        .postbody .epsc .boxed .right .lts ul li .dtl {
            width: 520px
        }

        .postbody .epsc .boxed {
            overflow: hidden;
            margin-bottom: 0
        }

        .postbody .boxed .right .lts ul li .dtl h1 {
            color: #333;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .listupd {
            padding: 10px;
            overflow: hidden
        }

        .listupd.cp {
            margin: -15px;
            font-size: 14px
        }

        .listupd .lexa {
            overflow: hidden;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px
        }

        .listupd .lexa .thumb {
            float: left;
            overflow: hidden;
            max-height: 100px;
            margin-right: 15px
        }

        .listupd .lexa .dtl {
            overflow: hidden;
            padding: 10px;
            margin: 0;
            border-bottom: 0;
            background: #f7f7f7
        }

        .listupd .lexa .dtl h2 {
            font-size: 16px;
            margin: 0;
            margin-bottom: 5px
        }

        .listupd .lexa .dtl span {
            display: block;
            margin-bottom: 3px
        }

        .listupd .lexa .dtl h2 a {
            color: #000
        }

        .listupd .lexa .dtl h2 a:hover {
            text-decoration: none;
            color: #3367d6
        }

        .listupd .lexa .thumb img {
            max-width: 175px
        }

        .hotbadge {
            position: absolute;
            top: 5px;
            left: 5px;
            background: #d33;
            z-index: 1;
            color: #fff;
            width: 22px;
            height: 22px;
            text-align: center;
            border-radius: 50%
        }

        .hotbadge i {
            line-height: 22px
        }

        .bs {
            float: left;
            width: 20%
        }

        .bs .bsx {
            overflow: hidden;
            margin: 7px;
            margin-bottom: 15px;
            transition: all .2s;
            -webkit-transition: all .2s;
            position: relative
        }

        .bs .bsx .limit {
            padding: 142% 0 0;
            position: relative;
            overflow: hidden;
            background: #333
        }

        .bs .bsx .limit .status {
            position: absolute;
            top: 7%;
            left: -34%;
            line-height: normal;
            color: #fff;
            text-transform: uppercase;
            z-index: 1;
            padding: 2px 0;
            font-size: 9px;
            width: 100%;
            text-align: center;
            background: #d33;
            -ms-transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .bs .bsx .limit .t {
            position: absolute;
            top: 0;
            z-index: 1;
            width: 100%;
            text-align: center;
            overflow: hidden
        }

        .bs .bsx .limit .b {
            position: absolute;
            bottom: -30px;
            color: #fff;
            z-index: 1;
            padding: 8px 0;
            width: 100%;
            text-align: center;
            background: rgba(34, 58, 101, .9);
            transition: all .2s;
            -webkit-transition: all .2s;
            -moz-transition: all .2s
        }

        .bs .bsx .limit img {
            width: 100%;
            height: auto;
            min-height: 120px;
            top: 0;
            position: absolute;
            transition: all .15s ease-out
        }

        .bs .bsx:hover .limit img {
            transform: scale(1.1);
            transition: all .15s ease-out
        }

        .bs .bsx .limit .t .type {
            margin-top: 5px;
            margin-left: 5px;
            font-size: 11px;
            padding: 1px 5px;
            border-radius: 1px;
            float: left;
            color: #eee;
            background: #673ab7
        }

        .bs .bsx .limit .t .ept {
            margin-top: 5px;
            margin-right: 5px;
            font-size: 11px;
            padding: 1px 5px;
            border-radius: 1px;
            float: right;
            color: #222;
            background: rgba(255, 255, 255, .9)
        }

        .bs .bsx .limit .t .type.TV {
            background: rgba(14, 175, 193, .8);
            color: #fff
        }

        .bs .bsx .limit .t .type.Movie {
            background: #218c4c
        }

        .bs .bsx .limit .t .type.OVA {
            background: #fb3a00
        }

        .bs .bsx .limit .b .bt {
            margin: 0 5px;
            font-family: Open Sans, sans-serif;
            font-size: 13px
        }

        .bs .bsx .limit .b .bt .tx {
            overflow: hidden;
            height: 36px;
            font-size: 12px
        }

        .bs .bsx .limit .b .bt .status {
            margin-top: 5px;
            overflow: hidden
        }

        .bs .bsx .limit .b .bt .status span {
            display: inline-block;
            color: #fff;
            background: #0c70de;
            padding: 2px 6px 2px 8px;
            border-radius: 2px;
            font-size: 12px
        }

        .bs .bsx:hover .limit .b {
            bottom: 0
        }

        .bs .bsx .limit .b .bt .tx b {
            font-weight: 400
        }

        .bs .bsx .limit .bt {
            position: absolute;
            bottom: 0;
            z-index: 1;
            width: 100%;
            color: #fff;
            font-size: 12.5px;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, .6) 30%, rgba(0, 0, 0, .8) 60%, rgba(0, 0, 0, .7) 100%);
            padding-bottom: 5px;
            padding-top: 12px
        }

        .bs .bsx .limit .bt span.epx {
            display: block;
            float: left;
            margin-left: 10px
        }

        .bs .bsx .limit .bt span.sb,
        .seventh .main-seven .limit .bt span.sb,
        .bxcl ul li .epl-sub .status,
        .meta .year .status,
        .bixbox.episodedl .epwrapper .epheader .entry-info .status {
            display: block;
            float: right;
            padding: 2px 5px;
            font-size: 12px;
            color: #111;
            margin-right: 5px;
            line-height: normal;
            border-radius: 3px;
            background: #ffa000
        }

        .bs .bsx .limit .bt span.sb.RAW,
        .seventh .main-seven .limit .bt span.sb.RAW,
        .bxcl ul li .epl-sub .status.RAW,
        .meta .year .status.RAW,
        .bixbox.episodedl .epwrapper .epheader .entry-info .status.RAW {
            background: rgba(14, 175, 193, .8);
            color: #fff
        }

        .bs .bsx .limit .bt span.sb.Dub,
        .seventh .main-seven .limit .bt span.sb.Dub,
        .bxcl ul li .epl-sub .status.Dub,
        .meta .year .status.Dub,
        .bixbox.episodedl .epwrapper .epheader .entry-info .status.Dub {
            background: #e32214;
            color: #fff
        }

        .bs .bsx .tt {
            height: 36px;
            overflow: hidden;
            font-size: .95em;
            margin: 8px 0;
            margin-bottom: 0;
            line-height: 1.25em;
            text-align: center
        }

        .bs .bsx .limit .ply {
            display: none;
            position: absolute;
            width: 100%;
            z-index: 1;
            height: 100%;
            top: 0;
            background: rgba(34, 58, 101, .7)
        }

        .bs .bsx .limit .ply .far {
            border-radius: 20%;
            -webkit-border-radius: 20%;
            -moz-border-radius: 20%;
            font-size: 45px;
            position: absolute;
            top: 50%;
            left: 50%;
            display: inline-block;
            text-align: center;
            line-height: 38px;
            margin-top: -20px;
            margin-left: -21px;
            /* speak: none; */
            font-style: normal;
            font-weight: 400;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            color: #fff;
            line-height: 38px;
            transition: all .3s ease 0;
            -webkit-transition: all .3s ease 0;
            -moz-transition: all .3s ease 0
        }

        .bs .bsx:hover .limit .ply {
            display: block
        }

        .bs .bsx .limit .typez,
        .seventh .main-seven .limit .bt span.type,
        .stylesix .bsx .thumb .typez {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 12px;
            padding: 2px 5px;
            line-height: normal;
            border-radius: 3px;
            z-index: 1;
            color: #fff;
            background: #333
        }

        .bs .bsx .limit .typez.TV,
        .seventh .main-seven .limit .bt span.type.TV,
        .stylesix .bsx .thumb .typez.TV {
            background: #0c70de
        }

        .bs .bsx .limit .typez.Movie,
        .seventh .main-seven .limit .bt span.type.Movie,
        .stylesix .bsx .thumb .typez.Movie {
            background: #9c27b0
        }

        .bs .bsx .limit .typez.Live,
        .seventh .main-seven .limit .bt span.type.Live,
        .stylesix .bsx .thumb .typez.Live {
            background: #ff5722
        }

        .bs .bsx .limit .typez.OVA,
        .seventh .main-seven .limit .bt span.type.OVA,
        .stylesix .bsx .thumb .typez.OVA {
            background: #2196f3
        }

        .bs .bsx .limit .typez.Special,
        .bs .bsx .limit .typez.ONA,
        .bs .bsx .limit .typez.BD,
        .bs .bsx .limit .typez.Music,
        .seventh .main-seven .limit .bt span.type.ONA,
        .seventh .main-seven .limit .bt span.type.BD,
        .seventh .main-seven .limit .bt span.type.Music,
        .stylesix .bsx .thumb .typez.Music {
            background: #f44336
        }

        .cts {
            font-size: 13px;
            line-height: 19px;
            overflow: hidden;
            height: 85px;
            overflow-y: scroll;
            padding: 5px;
            border: 1px solid #ddd
        }

        .cts p {
            margin: 0
        }

        .bs .bsx .tt h2,
        .bs.styletere .bsx .epdate h2 {
            font-size: .1px;
            margin: 0;
            height: 0;
            display: none
        }

        .bs.styletwo {
            width: 25%
        }

        .bs.styletwo .bsx .limit {
            padding: 65% 0 0;
            border-radius: 3px
        }

        .bs.styletere {
            width: 25%
        }

        .bs.styletere .bsx .limit {
            padding: 65% 0 0
        }

        .bs.styletere .tt {
            font-size: 13.5px;
            margin-bottom: 8px;
            height: auto;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            font-weight: 500
        }

        .bs.styletere .bsx .epdate {
            font-size: 13px;
            margin-top: 7px;
            overflow: hidden
        }

        .bs.styletere .bsx .limit .typez {
            top: 5px;
            right: 5px;
            border-radius: 3px;
            padding: 3px 5px;
            line-height: 13px;
            font-size: 11px
        }

        .bs.styletere .bsx .limit .bt {
            background: 0 0;
            bottom: 5px;
            left: 5px
        }

        .bs.styletere .bsx .limit .bt span.sb {
            float: left;
            border-radius: 3px;
            padding: 3px 5px;
            line-height: 13px;
            font-size: 11px;
            text-transform: none
        }

        .bs.styletere .bsx .epdate .epx {
            float: left
        }

        .bs.styletere .bsx .epdate .datex {
            float: right;
            font-size: 11px;
            padding-top: 1px;
            color: #999
        }

        .listupd.flex .excstf {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-top: 20px
        }

        .stylefor a {
            color: #fff
        }

        .stylefor a:hover {
            color: #0c70de
        }

        .stylefor {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
            padding-right: 15px;
            padding-left: 15px;
            margin-bottom: 30px
        }

        .stylefor .bsx {
            overflow: hidden;
            transition: all .2s;
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -webkit-box-shadow: 0 5px 20px rgba(0, 0, 0, .38);
            box-shadow: 0 5px 20px rgba(0, 0, 0, .38)
        }

        .stylefor .bsx:hover {
            border: 1px solid #0c70de;
            -webkit-transition: all .2s;
            transition: all .2s
        }

        .stylefor .bsx .limit {
            padding: 137% 0 0;
            position: relative;
            overflow: hidden
        }

        .stylefor .bsx .limit img {
            width: 100%;
            height: 100%;
            top: 0;
            position: absolute;
            transition: transform ease-out .3s
        }

        .stylefor .bsx .tt {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(0, 0, 0, .5);
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0)), color-stop(30%, rgba(0, 0, 0, .6)), color-stop(70%, rgba(0, 0, 0, .8)), to(rgba(0, 0, 0, .7)));
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, .6) 30%, rgba(0, 0, 0, .8) 70%, rgba(0, 0, 0, .7) 100%);
            -webkit-transition: all .2s;
            transition: all .2s;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding: 3rem 1rem 16px !important
        }

        .stylefor .bsx .tt h2 {
            margin: 0;
            line-height: normal;
            font-size: 14px;
            overflow: hidden;
            text-overflow: ellipsis;
            font-weight: 500;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            line-height: 19px;
            margin-bottom: 4px
        }

        .stylefor .bsx .tt span {
            border-top: 1px solid rgba(255, 255, 255, .5);
            margin-top: 15px;
            padding-top: 10px;
            display: block;
            font-size: 12px
        }

        .stylefor .bsx .tt span i {
            float: right;
            background: #ffa000;
            font-size: 11px;
            color: #111;
            font-style: normal;
            padding: 2px 5px;
            font-weight: 500;
            line-height: normal;
            padding-top: 4px;
            border-radius: 2px
        }

        .stylefor .bsx:hover .tt h2 {
            display: block;
            -webkit-box-orient: unset;
            -webkit-line-clamp: unset
        }

        .stylefor .bsx:hover .limit img {
            transform: scale(1.1)
        }

        .stylefiv {
            float: left;
            width: 50%
        }

        .stylefiv .bsx {
            margin: 5px;
            margin-bottom: 17px;
            overflow: hidden
        }

        .stylefiv .bsx .thumb {
            width: 155px;
            height: 105px;
            overflow: hidden;
            float: left;
            margin-right: 10px;
            border-radius: 5px;
            position: relative
        }

        .stylefiv .bsx .thumb img {
            width: 100%;
            min-height: 105px
        }

        .stylefiv .bsx .inf {
            overflow: hidden;
            margin-right: 5px;
            height: 107px
        }

        .stylefiv .bsx .inf h2 {
            margin: 0;
            line-height: 19px;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 7px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3
        }

        .stylefiv .bsx .inf span {
            display: block;
            margin-bottom: 3px;
            font-size: 12.5px;
            color: #555
        }

        .stylefiv .bsx .inf span .dashicons {
            width: auto;
            height: auto;
            font-size: 14px;
            margin-right: 2px
        }

        .stylesix {
            margin: 0 -10px;
            padding: 15px;
            overflow: hidden;
            border-bottom: 1px solid #ececec
        }

        .stylesix .bsx {
            position: relative;
            overflow: hidden
        }

        .stylesix .bsx .thumb {
            float: left;
            width: 90px;
            height: 127px;
            overflow: hidden;
            margin-right: 15px;
            position: relative
        }

        .stylesix .bsx .inf {
            overflow: hidden
        }

        .stylesix .bsx .inf h2 {
            font-size: 15px;
            margin: 0;
            margin-bottom: 5px;
            display: block;
            max-width: 700px;
            line-height: 20px
        }

        .stylesix .bsx .inf span {
            display: block;
            font-size: 13px;
            margin-bottom: 3px
        }

        .stylesix .bsx .inf span i {
            width: auto;
            height: auto;
            line-height: inherit;
            font-size: 14px
        }

        .stylesix .bsx .upscore {
            position: absolute;
            top: 28px;
            right: 15px;
            background: #0c70de;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-radius: 5px
        }

        .stylesix .bsx .upscore .scrt {
            display: block;
            text-transform: lowercase
        }

        .stylesix .bsx .upscore .scr {
            margin-top: 4px;
            font-size: 21px;
            display: block
        }

        .stylesix .bsx .inf span a {
            color: #0c70de
        }

        .stylesix .bsx .inf span a:hover {
            color: #222
        }

        .stylesix .bsx .inf ul {
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 13px
        }

        .stylesix .bsx .inf ul li {
            line-height: 19px;
            margin-bottom: 2px
        }

        .stylesix .bsx .thumb img {
            min-height: 127px
        }

        .stylesix .bsx .thumb .bt {
            position: absolute;
            bottom: 0;
            z-index: 1;
            width: 100%;
            color: #fff;
            font-size: 12.5px;
            overflow: hidden;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, .6) 30%, rgba(0, 0, 0, .8) 60%, rgba(0, 0, 0, .7) 100%);
            padding-bottom: 5px;
            padding-top: 12px
        }

        .stylesix .bsx .thumb .bt .epx {
            margin-left: 8px
        }

        .seventh {
            float: left;
            width: 33.3333333%
        }

        .seventh .main-seven {
            overflow: hidden;
            margin: 7px;
            margin-bottom: 15px;
            transition: all .2s;
            -webkit-transition: all .2s;
            -moz-transition: all .2s
        }

        .seventh .main-seven .limit {
            padding: 55% 0 0;
            position: relative;
            overflow: hidden;
            background: #333;
            border-radius: 3px
        }

        .seventh .main-seven .limit img {
            top: 0;
            width: 100%;
            height: auto;
            position: absolute;
            transition: transform ease-out .3s
        }

        .seventh .main-seven .limit .bt {
            position: absolute;
            bottom: 5px;
            right: 5px
        }

        .seventh .main-seven .limit .bt span.sb {
            float: none;
            display: inline-block;
            margin: 0
        }

        .seventh .main-seven .limit .bt .type {
            position: relative !important;
            top: 0 !important;
            right: 0 !important
        }

        .seventh .main-seven .limit .epin {
            padding: 2px 5px;
            font-size: 12px;
            color: #fff;
            line-height: normal;
            border-radius: 3px;
            background: #333;
            position: absolute;
            bottom: 5px;
            left: 5px
        }

        .seventh .main-seven .tt {
            height: 80px;
            overflow: hidden;
            font-size: 13px;
            margin: 10px 0;
            margin-bottom: 0
        }

        .seventh .main-seven .tt .thethumb {
            float: left;
            width: 36px;
            height: 36px;
            overflow: hidden;
            border-radius: 50%;
            margin-right: 10px
        }

        .seventh .main-seven .tt .sosev {
            overflow: hidden
        }

        .seventh .main-seven .tt .sosev h2 {
            margin: 0;
            line-height: normal;
            font-size: 15px;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            margin-bottom: 5px
        }

        .seventh .main-seven .tt .sosev span {
            display: block;
            color: #555;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height: normal;
            margin-bottom: 3px
        }

        .seventh .main-seven .tt .sosev span a:hover {
            color: #0c70de
        }

        .seventh .main-seven .tt .sosev span a {
            color: #555
        }

        .seventh .main-seven:hover .limit img {
            transform: scale(1.1)
        }

        .seventh .main-seven:hover .limit:after {
            content: "";
            background: linear-gradient(to bottom, #151515 0, rgba(0, 0, 0, 0) 50%);
            position: absolute;
            right: 0;
            top: 0;
            left: 0;
            bottom: 0;
            transition: all .15s ease-out
        }

        .bs.styleegg {
            width: 25%
        }

        .bs.styleegg .bsx {
            border-radius: 5px;
            margin: 10px
        }

        .bs.styleegg .bsx .egghead {
            position: absolute;
            width: 100%;
            bottom: 0;
            background: rgba(31, 38, 49, .9);
            z-index: 1
        }

        .bs.styleegg .bsx .limit .bt {
            bottom: auto;
            background: 0 0;
            top: 0;
            padding-top: 7px
        }

        .bs.styleegg .bsx .tt {
            display: none
        }

        .bs.styleegg .bsx .egghead .eggtitle {
            color: #fff;
            margin: 10px;
            margin-bottom: 7px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            font-size: 14px
        }

        .bs.styleegg .bsx .egghead .eggmeta {
            display: flex;
            flex-wrap: nowrap;
            margin: 0 10px 10px
        }

        .bs.styleegg .bsx .egghead .eggmeta div {
            width: 85%;
            color: #fff;
            font-size: 12.5px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .bs.styleegg .bsx .egghead .eggmeta .eggepisode {
            text-align: right;
            color: #82bdff;
            width: 100%
        }

        .bs.styleegg .bsx .egghead .eggmeta .eggtype.Movie {
            color: #e093ff
        }

        .bs.styleegg .bsx .egghead .eggmeta .eggtype.TV {
            color: #8ffae6
        }

        .bs.styleegg .bsx .egghead .eggmeta .eggtype.OVA,
        .bs.styleegg .bsx .egghead .eggmeta .eggtype.ONA {
            color: #ffb16e
        }

        .bs.styleegg .bsx .egghead .eggmeta .eggtype.Live,
        .bs.styleegg .bsx .egghead .eggmeta .eggtype.Music {
            color: #d2bdfc
        }

        .bs.styleegg .bsx .egghead .eggmeta .eggtype.Special {
            color: #3effed
        }

        .bs.styleegg .bsx .egghead .eggmeta .eggtype.BD {
            color: #89beff
        }

        .stylenine {
            overflow: hidden;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px
        }

        .stylenine .bsx {
            overflow: hidden
        }

        .stylenine .bsx .thumb {
            float: left;
            overflow: hidden;
            max-height: 77px;
            max-width: 137px;
            margin-right: 10px;
            position: relative
        }

        .stylenine .bsx .inf {
            overflow: hidden;
            padding: 10px;
            margin: 0;
            border-bottom: 0;
            background: #f7f7f7
        }

        .stylenine .bsx .inf h2 {
            font-size: 15px;
            margin: 0;
            margin-bottom: 5px;
            overflow: hidden;
            line-height: 21px;
            font-weight: 600
        }

        .stylenine .bsx .inf span {
            display: block;
            font-size: 13px;
            line-height: inherit;
            color: #8f95a3;
            font-weight: 500
        }

        .stylenine .bsx .inf span a {
            color: #0c70de
        }

        .stylenine .bsx .inf span a:hover {
            color: #333
        }

        .series-gen {
            position: relative;
            padding: 15px
        }

        .series-gen .nav-tabs {
            list-style: none;
            margin: 0;
            padding: 5px;
            overflow: hidden;
            background: #f1f1f1;
            border-radius: 3px;
            font-size: 13px
        }

        .series-gen .nav-tabs li {
            float: left;
            width: 20%
        }

        .series-gen .nav-tabs li a {
            display: block;
            text-align: center;
            padding: 5px
        }

        .series-gen .nav-tabs li.active a {
            background: #0c70de;
            border-radius: 3px;
            color: #fff
        }

        .series-gen .tab-pane {
            display: none
        }

        .series-gen .tab-pane.active {
            display: block
        }

        .series-gen .listupd {
            padding: 10px 0;
            margin: 0 -7px
        }

        .page {
            padding: 15px;
            line-height: 21px;
            color: #000
        }

        .page h2,
        .page h3,
        .page h4 {
            margin: 0;
            font-weight: 500;
            margin-bottom: 5px
        }

        .ts-breadcrumb {
            background: #fff;
            overflow: hidden;
            padding: 10px 15px;
            font-size: 13px
        }

        .ts-breadcrumb ol {
            list-style: none;
            margin: 0;
            padding: 0
        }

        .ts-breadcrumb ol li {
            display: inline-block
        }

        .animeinfo {
            overflow: hidden
        }

        .animeinfo .left {
            float: left;
            width: 326px;
            padding-right: 5px;
            margin-right: 5px;
            overflow: hidden;
            border-right: 1px solid #eaeaea
        }

        .animeinfo .left img {
            float: left;
            width: 140px;
            height: 190px;
            margin-right: 10px
        }

        .animeinfo .left p {
            margin: 0
        }

        .animeinfo .left span {
            display: block
        }

        .animeinfo .right {
            float: right;
            width: 300px;
            height: 195px
        }

        .animeinfo .right .related {
            overflow: hidden
        }

        .animeinfo .right .related li {
            overflow: hidden;
            margin-bottom: 6px
        }

        .animeinfo .right .related li .border {
            padding: 1px;
            float: left;
            border: 1px solid #ddd
        }

        .animeinfo .right .related li .border .limiter {
            height: 39px;
            overflow: hidden
        }

        .animeinfo .right .related li .border .limiter img {
            width: 39px;
            height: auto
        }

        .animeinfo .right .related li .rights {
            margin-left: 50px;
            line-height: 15px;
            height: 35px;
            padding: 4px;
            background: #f5f5f5
        }

        .animeinfo .right .related li .rights .title {
            color: #f13e3e;
            display: block;
            font-weight: 700
        }

        .animeinfo .right .related li .rights .title a {
            color: #f13e3e
        }

        .animeinfo .right .related li .rights .cat {
            display: block;
            font-size: 11px;
            color: #444;
            font-family: tahoma;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .animeinfo .right .related li .rights .cat a {
            color: #444
        }

        .animeinfo .sinop {
            margin-top: 5px;
            background: #f5f5f5;
            border-radius: 3px;
            padding: 10px;
            line-height: normal
        }

        .animeinfo .sinop p {
            margin: 0
        }

        .expr {
            margin-bottom: 15px;
            background: #f7f7f7;
            padding: 10px
        }

        .dtl {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd
        }

        .dtl h1 {
            margin: 0;
            font-weight: 500;
            font-size: 18px;
            margin-bottom: 5px
        }

        .dtl span {
            color: #8f95a3;
            font-weight: 500;
            line-height: 20px
        }

        .postb {
            font-size: 15px;
            line-height: 22px;
            padding-bottom: 15px;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd
        }

        #shadow {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            background: rgba(0, 0, 0, .93);
            width: 100%;
            height: 100%;
            z-index: 100;
            transition: all .5s ease
        }

        #pembed {
            position: relative;
            max-width: 100%;
            height: 0;
            padding-bottom: 58.4%
        }

        #embed_holder iframe,
        #embed_holder embed,
        #embed_holder video,
        #embed_holder .wp-video {
            z-index: 102;
            position: absolute;
            border: none;
            width: 100% !important;
            height: 100% !important;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0
        }

        #embed_holder .wp-video .mejs-container {
            height: 100% !important
        }

        #embed_holder {
            position: relative;
            z-index: 1
        }

        #embed_holder.highvid {
            z-index: 102
        }

        #embed_holder .wp-video .mejs-container {
            height: 100% !important;
            width: 100% !important
        }

        .video-content {
            background: #000;
            overflow: hidden;
            position: relative
        }

        .item {
            background: #fff;
            position: relative;
            overflow: hidden;
            padding: 10px 15px;
            font-size: .85em
        }

        .megavid {
            transition: all .3s ease 0;
            -webkit-transition: all .3s ease 0;
            -moz-transition: all .3s ease 0
        }

        select.mirror {
            float: left;
            border: 1px solid #dbdbdb;
            border-radius: 4px;
            color: #363636;
            -webkit-box-shadow: inset 0 1px 2px hsla(0, 0%, 4%, .1);
            box-shadow: inset 0 1px 2px hsla(0, 0%, 4%, .1);
            padding: 5px 3px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 300
        }

        .naveps {
            float: right;
            font-size: 13px;
            padding: 3px 0
        }

        .video-nav {
            overflow: hidden;
            margin-bottom: 15px
        }

        .naveps .nvs {
            float: left
        }

        .naveps .nvs.nvsc {
            margin: 0 7px
        }

        .naveps .nvs a {
            background: #f5f5f5;
            color: #4a4a4a;
            padding: 4px 10px;
            border-radius: 3px;
            display: block
        }

        .naveps .nvsc a {
            background: #0c70de;
            color: #fff;
            margin: 0 7px;
            padding: 4px 7px
        }

        .naveps.bignav {
            float: none;
            overflow: hidden;
            margin-bottom: 15px
        }

        .naveps.bignav .nvs {
            width: 33.33333%;
            text-align: center
        }

        .naveps.bignav .nvs.nvsc {
            margin: 0
        }

        .naveps.bignav .nvs .nolink {
            display: block;
            padding: 10px 0;
            border-radius: 3px;
            background: #fafafa;
            color: #ccc
        }

        .naveps.bignav .nvs a {
            background: #fff;
            padding: 10px 0;
            box-shadow: 1px 3px 8px rgba(49, 49, 49, .1);
            color: #555
        }

        .naveps.bignav .nvs.nvsc a {
            background: #0c70de;
            color: #fff
        }

        .naveps.bignav .nvs a:hover {
            background: #333;
            color: #fff
        }

        .naveps.bignav .nvs .fa {
            font-size: 10px
        }

        .iconx {
            float: right;
            margin-left: 10px;
            overflow: hidden
        }

        .iconx .icol {
            display: inline-block;
            margin-left: 7px;
            padding: 5px;
            font-size: 12.5px;
            cursor: pointer
        }

        .iconx .icol span {
            line-height: 20px
        }

        .iconx .icol .fa-expand {
            color: #00a58d
        }

        .iconx .icol .fa-lightbulb {
            color: #ecbc2a
        }

        .iconx .icol .fa,
        .iconx .icol .fas {
            font-size: 14px;
            font-weight: 700;
            margin-right: 2px
        }

        .iconx .icol .far {
            font-size: 14px;
            margin-right: 2px
        }

        .iconx .icol .fa-cloud-download-alt {
            color: #f05252
        }

        .iconx a {
            border: 1px solid #f05252;
            display: inline-block;
            color: #f05252;
            border-radius: 3px;
            margin-left: 10px;
            font-weight: 500
        }

        .iconx a .icol {
            display: block;
            margin: 0;
            padding: 3px 10px
        }

        .iconx a:hover {
            background: #f05252;
            color: #fff
        }

        .iconx a:hover .fa-cloud-download-alt {
            color: #fff
        }

        .megavid.xp {
            position: absolute;
            top: 0;
            width: 100%
        }

        .pd-expand {
            width: 100%;
            display: none
        }

        .pd-expand.sxp {
            display: block
        }

        .icol.turnedOff {
            color: #fff;
            z-index: 104;
            position: relative
        }

        .icol.turnedOff i.dashicons.dashicons-lightbulb {
            background: #ff9800
        }

        .megavid.xp #embed_holder {
            padding: 0 10%
        }

        .mirc {
            overflow: hidden;
            position: relative
        }

        .meta {
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 1px 3px 8px rgba(49, 49, 49, .1)
        }

        .meta h1 {
            font-size: 19px;
            margin: 0;
            line-height: normal;
            font-weight: 400;
            margin-top: 3px;
            margin-bottom: 5px
        }

        .meta img {
            float: left;
            width: 60px;
            margin-right: 10px
        }

        .meta .tb {
            display: none
        }

        .meta .lm {
            overflow: hidden
        }

        .meta .epx {
            display: none;
            font-size: 13px;
            color: #7a7a7a;
            font-weight: 400;
            margin-bottom: 5px
        }

        .meta .epx .lg {
            background-color: #f5f5f5;
            border-radius: 4px;
            font-size: .75rem;
            color: #4a4a4a;
            line-height: 22px;
            justify-content: center;
            padding-left: .75em;
            padding-right: .75em;
            display: inline-block;
            text-transform: lowercase
        }

        .meta .year {
            font-size: 12px;
            color: #888;
            margin-right: 140px;
            display: block
        }

        .meta .year .status,
        .bixbox.episodedl .epwrapper .epheader .entry-info .status {
            float: none;
            display: inline-block;
            font-style: normal;
            margin: 0;
            font-size: 10px;
            margin-right: 2px
        }

        .title-section h1 {
            display: inline-block;
            margin-top: 0
        }

        .bixbox.infx {
            padding: 15px;
            font-weight: 300;
            font-size: 13px;
            text-align: justify;
            color: #555
        }

        .bixbox.infx p {
            margin: 0
        }

        .bixbox.infx b {
            font-weight: 500
        }

        .postbody.nosidebar {
            float: none;
            width: auto
        }

        .newseason {
            position: relative
        }

        .newseason .red,
        .newseason .listseries .card .card-box .card-info-bottom.red a {
            background: #f25226;
            color: #feded4
        }

        .newseason .blue,
        .newseason .listseries .card .card-box .card-info-bottom.blue a {
            background: #3480ea;
            color: #fff
        }

        .newseason .orange,
        .newseason .listseries .card .card-box .card-info-bottom.orange a {
            background: #ebb62d;
            color: #a14d16
        }

        .newseason .purple,
        .newseason .listseries .card .card-box .card-info-bottom.purple a {
            background: #9263e9;
            color: #e0cefc
        }

        .newseason .pink,
        .newseason .listseries .card .card-box .card-info-bottom.pink a {
            background: #e34f85;
            color: #fbcedf
        }

        .newseason .listseries .card .card-box .card-thumb .studio.red {
            color: #f25226
        }

        .newseason .listseries .card .card-box .card-thumb .studio.blue {
            color: #3480ea
        }

        .newseason .listseries .card .card-box .card-thumb .studio.orange {
            color: #ebb62d
        }

        .newseason .listseries .card .card-box .card-thumb .studio.purple {
            color: #9263e9
        }

        .newseason .listseries .card .card-box .card-thumb .studio.pink {
            color: #e34f85
        }

        .newseason h1 {
            margin: 0;
            line-height: normal;
            text-align: center;
            display: block;
            margin-bottom: 20px
        }

        .newseason .listseries {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px
        }

        .newseason .listseries .card {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 33.3333333%;
            flex: 0 0 33.3333333%;
            max-width: 50%
        }

        .newseason .listseries .card .card-box {
            box-shadow: 0 4px 6px rgba(49, 54, 68, .05), 0 5px 20px rgba(49, 54, 68, .08);
            background: #fff;
            border-radius: 3px;
            overflow: hidden;
            margin: 10px
        }

        .newseason .listseries .card .card-box .card-thumb {
            max-width: 150px;
            height: 200px;
            float: left;
            position: relative;
            overflow: hidden
        }

        .newseason .listseries .card .card-box .card-thumb .studio {
            background: 0 0;
            margin: 0 10px;
            margin-bottom: 10px;
            display: block;
            font-size: 12px;
            font-weight: 500
        }

        .newseason .listseries .card .card-box .card-info-bottom {
            background: #eff7fb;
            overflow: hidden;
            white-space: nowrap;
            padding: 0 10px;
            height: 32px
        }

        .newseason .listseries .card .card-box .card-thumb .type {
            position: absolute;
            right: 5px;
            font-weight: 500;
            font-size: 13px;
            padding: 2px 4px;
            border-radius: 3px;
            display: none
        }

        .newseason .listseries .card .card-box .card-thumb .card-title {
            position: absolute;
            bottom: 0;
            background: rgba(42, 42, 42, .9);
            width: 100%;
            overflow: hidden
        }

        .newseason .listseries .card .card-box .card-info {
            overflow: hidden
        }

        .newseason .listseries .card .card-box .card-thumb .card-title h2 {
            margin: 7px 10px;
            margin-top: 10px;
            color: #fff;
            line-height: normal;
            font-weight: 500;
            font-size: 14px
        }

        .newseason .listseries .card .card-box .card-info .card-info-top {
            height: 168px;
            overflow-y: scroll;
            overflow: hidden
        }

        .newseason .listseries .card .card-box .card-info-bottom a {
            padding: 2px 12px;
            text-transform: lowercase;
            font-weight: 500;
            font-size: 12px;
            border-radius: 10px;
            margin: 6px 0;
            display: none
        }

        .newseason .listseries .card .card-box .card-info-bottom a:nth-child(1),
        .newseason .listseries .card .card-box .card-info-bottom a:nth-child(2) {
            display: inline-block
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .stats {
            overflow: hidden;
            padding: 10px;
            padding-bottom: 0;
            position: relative
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .stats .left {
            overflow: hidden
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .stats .right {
            overflow: hidden;
            text-align: center;
            position: absolute;
            right: 10px;
            top: 10px;
            font-weight: 500;
            font-size: 14px;
            padding: 0 4px;
            border-radius: 10px;
            color: #697d93;
            background: #eff7fb
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .stats .left span {
            display: block;
            font-weight: 500;
            color: #697d93;
            font-size: 12px;
            line-height: normal;
            margin-bottom: 2px
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .stats .left span.status {
            font-size: 17px
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .stats .left span.alternative {
            font-weight: 400;
            font-size: 11px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .desc {
            padding: 0 10px;
            line-height: 20px;
            font-size: 13px;
            color: #697d93
        }

        .newseason .listseries .card .card-box .card-info .card-info-top .desc p {
            margin: 0
        }

        .newseason .listseries .card .card-box:hover {
            box-shadow: none
        }

        .newseason .listseries .card .card-box:hover .card-info .card-info-top .stats .left span,
        .newseason .listseries .card .card-box:hover .card-info .card-info-top .stats .right,
        .newseason .listseries .card .card-box:hover .card-info .card-info-top .desc {
            color: #475462
        }

        .newseason .listseries .card .card-box .card-info .card-info-top::-webkit-scrollbar {
            width: 7px
        }

        .newseason .listseries .card .card-box .card-info .card-info-top::-webkit-scrollbar-thumb {
            background: rgba(42, 42, 42, .46);
            border-radius: 10px
        }

        .newseason .listseries .card .card-box .card-info .card-info-top::-webkit-scrollbar-track {
            background: 0 0
        }

        .newseason .listseries .card .card-box:hover .card-info .card-info-top {
            overflow-y: scroll
        }

        .sosmed {
            position: absolute;
            right: 10px;
            bottom: 15px
        }

        .sosmed span,
        .sosmed img {
            width: 28px;
            height: 28px;
            font-size: 16px;
            padding: 4px;
            border-radius: 15px;
            color: #fff;
            background: #444;
            margin-right: 3px;
            float: none;
            text-align: center
        }

        .sosmed span.fab.fa-facebook-f {
            background: #2d6bc8;
            line-height: 21px
        }

        .sosmed span.fab.fa-twitter {
            background: #1da1f2;
            line-height: 21px
        }

        .sosmed span.fab.fa-whatsapp {
            background: #08c65b;
            line-height: 21px
        }

        .sosmed span.dashicons.dashicons-googleplus {
            background: #dc5b15
        }

        .sosmed img.soc.wa {
            background: #08c65b
        }

        .sosmed .soc.line {
            background: #00b900
        }

        .socialts {
            overflow: hidden;
            margin-bottom: 15px;
            text-align: center
        }

        .socialts a {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
            background: #333;
            color: #FFF !important;
            padding: 0;
            line-height: 26px;
            font-size: 12px;
            border-radius: 3px
        }

        .socialts a i {
            padding-left: 10px;
            padding-right: 2px
        }

        .socialts a span {
            padding-right: 10px
        }

        .socialts a.fb {
            background: #1877f2
        }

        .socialts a.fb:hover {
            background: #2f477b
        }

        .socialts a.twt {
            background: #1da1f2
        }

        .socialts a.twt:hover {
            background: #1781c3
        }

        .socialts a.wa {
            background: #01ba6d
        }

        .socialts a.wa:hover {
            background: #008f54
        }

        .socialts a.pntrs {
            background: #e81737
        }

        .socialts a.pntrs:hover {
            background: #b2132c
        }

        .bixbox.mctn {
            padding: 15px;
            font-size: 14px;
            line-height: 21px
        }

        .mctnx {
            margin: 15px
        }

        .dlbox ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        .dlbox ul li.head {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-collapse: separate
        }

        .dlbox ul li.head span {
            padding: 10px;
            margin-right: 3px;
            padding: 6px 10px;
            margin-bottom: 0;
            font-size: 1.1em;
            font-weight: 500;
            line-height: normal;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            text-overflow: ellipsis;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border-radius: 2px;
            display: table-cell;
            border-radius: 0
        }

        .dlbox ul li {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-collapse: separate;
            border-bottom: 1px solid #ececec
        }

        .dlbox ul li span {
            margin-right: 3px;
            padding: 8px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            text-overflow: ellipsis;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 2px;
            display: table-cell;
            border-radius: 0
        }

        .dlbox ul li.head span.q b {
            font-weight: 500
        }

        .dlbox ul li span.w {
            font-weight: 500
        }

        .dlbox ul li span.q b {
            font-weight: 400
        }

        .dlbox ul li span.q img {
            display: block;
            float: left;
            margin-right: 6px
        }

        .dlbox ul li span a {
            color: #0c70de
        }

        .dlbox ul li:nth-child(even) {
            background: #f7f7f7
        }

        .dlbox ul li span a:hover {
            color: #333
        }

        .listo {
            overflow: hidden;
            margin: -15px;
            font-size: 14px;
            padding: 15px;
            position: relative;
            color: #222
        }

        .listo .bx {
            padding: 13px 0;
            border-bottom: 1px solid #eee;
            overflow: hidden
        }

        .listo .bx .imgx {
            width: 70px;
            min-height: 98px;
            float: left;
            background: #fafafa
        }

        .listo .bx .inx {
            overflow: hidden;
            padding-left: 15px
        }

        .listo .bx .inx h2 {
            font-size: 1em;
            font-weight: 600;
            margin: 0 0 3px;
            line-height: 1.2em
        }

        .listo .bx .inx span {
            font-size: .9em;
            margin-bottom: 5px;
            line-height: 18px
        }

        .listo .bx .inx span p {
            margin: 0
        }

        .lista {
            padding: 10px;
            margin: -15px;
            margin-bottom: 0;
            background: #f2f4f6;
            border-bottom: 1px solid #ececec;
            line-height: normal;
            text-align: center
        }

        .lista a {
            margin: 4px;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            min-width: 32px;
            text-align: center;
            font-size: 14px;
            padding: 5px 8px;
            display: inline-block;
            background: #fff
        }

        .lista a:hover {
            background: #0c70de;
            color: #fff;
            border-color: #0c70de
        }

        .listupd.azara {
            margin: 0 -15px
        }

        .mirc .mirror {
            float: left;
            padding: 5px;
            border-radius: 3px;
            font-family: inherit;
            border: 1px solid #ddd;
            box-shadow: inset 0 1px 5px #ddd
        }

        .mirc .lightSwitcher {
            cursor: pointer;
            float: right;
            z-index: 102;
            position: relative;
            padding: 5px 8px;
            color: #fff;
            font-size: 13px;
            background: #3367d6;
            border-radius: 3px
        }

        .nextprev {
            overflow: hidden;
            margin-bottom: 15px
        }

        .nextprev .prev {
            float: left
        }

        .nextprev .next {
            float: right
        }

        .nextprev a {
            display: block;
            background: #f4f6fa;
            padding: 3px 8px;
            color: #000;
            font-weight: 500;
            font-size: 13px;
            border-radius: 3px;
            border: 1px solid #e3e3e3
        }

        .postb img {
            max-width: 100%;
            height: auto
        }

        .postb .imgb {
            display: block;
            margin: 0 auto;
            margin-bottom: 15px;
            max-width: 75%
        }

        .releases.series {
            display: block;
            margin-bottom: 15px
        }

        .releases.series h1 {
            font-weight: 500;
            font-size: 20px;
            display: block;
            padding: 0;
            margin: 0;
            color: #000;
            padding-bottom: 2px;
            font-family: inherit
        }

        .releases.series .alter {
            display: block;
            color: #999;
            font-size: 13px;
            padding-bottom: 5px
        }

        .side.infomanga {
            overflow: hidden;
            margin-bottom: 15px
        }

        .side.infomanga .imgprop {
            float: left;
            margin-right: 5px
        }

        .side.infomanga .imgprop img {
            float: left;
            max-width: 190px;
            height: auto
        }

        .side.infomanga table.listinfo {
            overflow: hidden
        }

        .side.infomanga table.listinfo tr {
            vertical-align: top
        }

        .side.infomanga table.listinfo tr th {
            display: block;
            font-weight: 700;
            text-align: left;
            padding: 3px 10px
        }

        .side.infomanga table.listinfo tr td {
            padding: 3px 10px 3px 0
        }

        .sny {
            overflow: hidden
        }

        .sny h2 {
            margin: 0;
            font-weight: 500;
            font-size: 16px
        }

        .animefull .bigcover .ime a.lnk {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 1
        }

        .animefull .bigcover {
            position: relative
        }

        .animefull .bigcover .ime {
            width: 100%;
            padding-bottom: 38%;
            position: relative;
            overflow: hidden
        }

        .animefull .bigcover .ime img {
            width: 100%;
            position: absolute
        }

        .animefull .bigcover a.gp {
            position: absolute;
            width: 100%;
            top: 35%;
            left: 0;
            z-index: 3;
            display: inline-block;
            text-align: center;
            line-height: 88px;
            font-size: 90px;
            color: #fff
        }

        .animefull .bigcover a.gp .dashicons {
            width: auto;
            height: auto;
            font-size: 50px;
            line-height: 75px;
            color: #fff;
            text-align: center
        }

        .animefull .bigcover:before {
            content: "";
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(51, 66, 94, .5);
            z-index: 1
        }

        .bigcontent {
            position: relative;
            padding: 15px 20px 25px;
            padding-left: 195px;
            z-index: 1;
            min-height: 415px
        }

        .bigcontent .infox {
            font-size: 13.5px;
            line-height: normal
        }

        .bigcontent .infox h1 {
            margin: 0 0 10px;
            font-size: 1.7em;
            font-weight: 500;
            line-height: normal
        }

        .bigcontent .infox .sosmed {
            position: relative;
            right: auto;
            bottom: auto;
            margin-bottom: 10px
        }

        .bigcontent .infox .mindesc {
            margin-bottom: 5px;
            line-height: 21px
        }

        .bigcontent .infox .alter {
            display: block;
            margin-bottom: 5px;
            color: #555
        }

        .bigcontent .infox .spe {
            margin-bottom: 10px;
            overflow: hidden;
            column-count: 2
        }

        .bigcontent .infox .spe span {
            margin-bottom: 3px;
            padding-right: 7px;
            padding-left: 14px;
            position: relative;
            line-height: 19px;
            display: block
        }

        .bigcontent .infox .spe span.split {
            overflow: hidden
        }

        .bigcontent .infox .spe span a {
            color: #0c70de
        }

        .bigcontent .infox .spe span a:hover {
            color: #333
        }

        .bigcontent .infox .desc {
            line-height: 21px
        }

        .bigcontent .infox .spe span:before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            background: #0c70de;
            display: inline-block;
            position: absolute;
            left: 0;
            top: 4px
        }

        .bigcontent .infox .spe span b {
            font-weight: 500
        }

        .bigcontent .infox .genxed {
            overflow: hidden;
            margin-bottom: 10px
        }

        .bigcontent .infox .genxed a {
            display: inline-block;
            padding: 4px 8px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 13px;
            color: #0c70de;
            border: .5px solid #0c70de;
            border-radius: 3px
        }

        .bigcontent .infox .genxed a:hover {
            color: #fff;
            background: #0c70de
        }

        .bixbox.infx.singleinfo .navepsx {
            display: block;
            margin: -15px;
            overflow: hidden;
            background: #fafafa
        }

        .bixbox.infx.singleinfo .navepsx .nvs {
            width: 33.333333333%;
            float: left;
            text-align: center;
            min-height: 1px
        }

        .bixbox.infx.singleinfo .navepsx .nvs a {
            display: block;
            padding: 8px
        }

        .bixbox.infx.singleinfo .navepsx .nvs.nvsc a {
            border-right: 1px solid #dfdfdf;
            border-left: 1px solid #dfdfdf
        }

        .bixbox.infx.singleinfo .navepsx .nvs a:hover {
            background: #fff
        }

        .bigcontent .rt .rating {
            text-align: center;
            padding: 13px 10px;
            background: #ebf2f6;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            margin-bottom: 10px
        }

        .bigcontent .rt .rating strong {
            margin-bottom: 7px;
            display: block;
            font-weight: 500;
            font-size: 16px
        }

        .animefull .bottom {
            background: rgba(34, 58, 101, .02);
            padding: 12px 20px;
            font-size: .85em;
            border-top: 1px solid #ebf2f6;
            text-transform: lowercase;
            font-weight: 300
        }

        .bigcontent .thumbook {
            position: absolute;
            top: -20px;
            left: 16px;
            width: 165px
        }

        .bigcontent .thumb {
            border: 4px solid #fff;
            overflow: hidden;
            margin-bottom: 7px
        }

        .bigcontent.nobigcv {
            min-height: 450px
        }

        .bigcontent.nobigcv .thumbook {
            top: 15px
        }

        .rating-prc .rtp {
            overflow: hidden
        }

        .rating-prc .rtp .rtb {
            position: relative;
            overflow: hidden;
            color: #ffc700;
            height: 15px;
            line-height: 1;
            width: 85px;
            font-size: 15px;
            margin: 0 auto
        }

        .rating-prc .rtp .rtb:before {
            content: "\f005\f005\f005\f005\f005";
            font-family: "Font Awesome 5 Free";
            position: absolute;
            top: 0;
            left: 0;
            color: #ccc
        }

        .rating-prc .rtp .rtb span:before {
            content: "\f005\f005\f005\f005\f005";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            top: 0;
            position: absolute;
            left: 0
        }

        .rating-prc .rtp .rtb span {
            overflow: hidden;
            top: 0;
            left: 0;
            position: absolute;
            padding-top: 14px
        }

        .bixbox.synp .entry-content {
            margin: 15px;
            line-height: 21px
        }

        .bottom.tags {
            overflow: hidden
        }

        .bottom.tags a {
            background: #fff;
            border: 1px solid #ddd;
            padding: 2px 5px;
            display: inline-block;
            margin-right: 2px;
            margin-bottom: 2px;
            border-radius: 3px
        }

        .bixbox.trailer {
            overflow: hidden
        }

        .bixbox.trailer .tply {
            padding: 58% 0 0;
            position: relative
        }

        .bixbox.trailer .tply iframe {
            width: 100%;
            height: 100%;
            top: 0;
            position: absolute
        }

        .trailerbutton {
            text-align: center;
            background: #c00;
            font-size: 13px;
            color: #fff;
            border-radius: 5px;
            padding: 8px 5px;
            display: block;
            margin-bottom: 6px
        }

        .trailerbutton:hover {
            background: #b20c0c;
            color: #fff !important
        }

        #gallery.owl-loaded {
            margin: 15px;
            overflow: hidden;
            width: unset
        }

        #gallery.owl-loaded .owl-dots {
            position: relative;
            bottom: 0;
            margin-top: 10px
        }

        #gallery.owl-loaded .owl-dots span {
            box-shadow: none;
            background: #ddd;
            cursor: pointer
        }

        #gallery.owl-loaded .owl-item {
            max-height: 210px
        }

        #gallery.owl-loaded .owl-dots .owl-dot.active span {
            background: #0c70de !important
        }

        .bxcl {
            overflow: hidden
        }

        .bxcl ul {
            padding: 0;
            list-style: none;
            margin: 0;
            overflow: auto;
            max-height: 392px
        }

        .bxcl ul li {
            overflow: hidden;
            border-bottom: 1px solid #ececec;
            font-size: 14px
        }

        .bxcl ul li a {
            display: block;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            padding: 10px 15px
        }

        .epcheck .ephead {
            display: flex;
            flex-wrap: wrap;
            padding: 8px 15px;
            font-weight: 500;
            border-bottom: 1px solid #ececec;
            font-size: 1.1em;
            color: #333;
            line-height: 20px
        }

        .epcheck .ephead .eph-num,
        .bxcl ul li .epl-num {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 16.66667%;
            flex: 0 0 16.66667%;
            max-width: 16.66667%
        }

        .epcheck .ephead .eph-title,
        .bxcl ul li .epl-title {
            flex-basis: 0;
            -webkit-box-flex: 1;
            flex-grow: 1;
            max-width: 100%;
            padding-right: 15px;
            padding-left: 15px
        }

        .epcheck .ephead .eph-sub,
        .bxcl ul li .epl-sub {
            -webkit-box-flex: 0;
            flex: 0 0 15%;
            max-width: 15%
        }

        .epcheck .ephead .eph-date,
        .bxcl ul li .epl-date {
            -webkit-box-flex: 0;
            flex: 0 0 25%;
            max-width: 25%
        }

        .epcheck .ephead .eph-sub,
        .bxcl ul li .epl-sub .status {
            float: left
        }

        .epcheck .eplister {
            margin: 15px
        }

        .lastend {
            overflow: hidden;
            position: relative;
            margin: 10px
        }

        .lastend .inepcx {
            width: 50%;
            float: left;
            text-align: center
        }

        .lastend .inepcx a {
            display: block;
            color: #fff;
            margin: 5px;
            padding: 15px;
            background: #0c70de;
            border-radius: 5px
        }

        .lastend .inepcx a span {
            display: block;
            font-size: 15px
        }

        .lastend .inepcx a span.epcur {
            font-size: 20px;
            margin-top: 3px;
            font-weight: 700
        }

        .lastend .inepcx a:hover {
            background: #333
        }

        .bxcl ul li .epl-num {
            font-weight: 500
        }

        .epl-num a {
            color: #0c70de
        }

        .bxcl ul li:nth-child(odd) {
            background: #f7f7f7
        }

        .bxcl ul li:hover {
            background: #0c70de;
            color: #fff;
            border-color: #0c70de
        }

        .bxcl ul li:hover a {
            color: #fff
        }

        .bxcl ul::-webkit-scrollbar,
        .quickfilter .filters .filter .scrollz::-webkit-scrollbar {
            width: 10px
        }

        .bxcl ul::-webkit-scrollbar-thumb,
        .quickfilter .filters .filter .scrollz::-webkit-scrollbar-thumb {
            background: #0c70de
        }

        .bxcl ul::-webkit-scrollbar-track,
        .quickfilter .filters .filter .scrollz::-webkit-scrollbar-track {
            background: #f1f1f1
        }

        .bixbox.episodedl {
            position: relative
        }

        .bixbox.episodedl .epwrapper {
            padding: 15px
        }

        .bixbox.episodedl .epwrapper .epheader {
            padding-bottom: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ececec
        }

        .bixbox.episodedl .epwrapper .epheader h1 {
            margin: 0;
            font-weight: 500;
            line-height: 27px;
            margin-bottom: 5px;
            font-size: 19px
        }

        .bixbox.episodedl .epwrapper .epheader .entry-info {
            font-size: 13px;
            color: #888
        }

        .bixbox.episodedl .epwrapper .epheader .entry-info a {
            color: #0c70de
        }

        .bixbox.episodedl .epwrapper .epheader .entry-info a:hover {
            color: #333
        }

        .bixbox.episodedl .epwrapper .epcontent {
            font-size: 15px;
            line-height: 21px
        }

        .bixbox.episodedl .notice {
            padding: 8px;
            font-size: 13px;
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
            border-radius: 5px;
            margin-bottom: 10px
        }

        .bixbox.episodedl .notice p {
            margin: 0
        }

        .bixbox.episodedl .epwrapper .epcontent .thumbnail {
            text-align: center;
            margin-bottom: 15px
        }

        .bixbox.episodedl .epwrapper .epcontent .thumbnail img {
            max-width: 500px;
            height: auto
        }

        .bixbox.episodedl .epwrapper .navimedia {
            overflow: hidden;
            position: relative;
            margin-bottom: 20px
        }

        .bixbox.episodedl .epwrapper .navimedia .left {
            float: left
        }

        .bixbox.episodedl .epwrapper .navimedia .naveps {
            float: none;
            overflow: hidden;
            padding: 0
        }

        .bixbox.episodedl .epwrapper .navimedia .naveps .fa {
            font-size: 10px
        }

        .bixbox.episodedl .epwrapper .navimedia .right {
            float: right
        }

        .bixbox.episodedl .epwrapper .navimedia .sosmed {
            right: 0;
            bottom: 0;
            position: relative
        }

        .cvlist {
            overflow: hidden;
            margin: 10px
        }

        .cvlist .cvitem {
            float: left;
            width: 50%
        }

        .cvlist .cvitem .cvitempad {
            overflow: hidden;
            margin: 5px;
            background: #efefef;
            border-radius: 5px
        }

        .cvlist .cvitem .cvitempad .cvsubitem {
            float: left;
            width: 50%
        }

        .cvlist .cvitem .cvitempad .cvsubitem.cvchar .cvcover {
            float: left;
            margin-right: 5px
        }

        .cvlist .cvitem .cvitempad .cvsubitem .cvcontent {
            overflow: hidden;
            padding: 5px
        }

        .cvlist .cvitem .cvitempad .cvsubitem .cvcontent span {
            display: block;
            font-size: 13px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        .cvlist .cvitem .cvitempad .cvsubitem .cvcontent .charrole {
            margin-top: 3px;
            font-size: 11px
        }

        .cvlist .cvitem .cvitempad .cvsubitem.cvactor .cvcover {
            float: right;
            margin-left: 5px
        }

        .cvlist .cvitem .cvitempad .cvsubitem.cvactor .cvcontent {
            text-align: right
        }

        .cvlist .cvitem .cvitempad .cvsubitem .cvcover img {
            min-height: 70px
        }

        .page .auth {
            margin-bottom: 15px;
            display: block;
            color: #999;
            font-size: 11px;
            font-family: tahoma
        }

        .page .auth a {
            color: #999
        }

        .page img {
            width: auto;
            height: auto;
            margin: 0 auto;
            margin-bottom: 10px;
            display: block;
            text-align: center
        }

        .page iframe {
            width: 100%;
            min-height: 350px
        }

        .genres {
            margin: 0;
            margin-bottom: 15px;
            background: #f7f7f7;
            padding: 10px;
            overflow: hidden;
            color: #999;
            border-radius: 5px
        }

        .genres li {
            width: 20%;
            margin-left: 25px;
            line-height: 24px;
            float: left
        }

        .genres li a {
            color: #333
        }

        .taxindex {
            overflow: hidden;
            list-style: none;
            padding: 0;
            margin: 0 -10px;
            flex-wrap: wrap;
            display: flex
        }

        .taxindex li {
            width: 25%
        }

        .taxindex li a {
            margin: 10px;
            padding: .5rem 1rem;
            display: block;
            border-radius: .25rem;
            background: #f1f1f1;
            color: #333
        }

        .taxindex li a:hover {
            background: #0c70de !important;
            color: #fff
        }

        .taxindex li a i {
            float: right;
            font-style: normal;
            color: #111;
            margin-left: 15px;
            background: #fff;
            padding: 0 5px;
            padding-top: 1px;
            font-size: 11px;
            border-radius: 3px;
            margin-top: 1px
        }

        .taxindex li a span.name {
            display: inline-block;
            max-width: 70%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .taxindex li a span.count {
            float: right;
            font-style: normal;
            color: #ccc;
            font-weight: 500
        }

        .taxindex li a:hover span.count {
            color: rgba(255, 255, 255, .5)
        }

        .advancedsearch {
            position: relative
        }

        .advancedsearch .quickfilter .filters .filter,
        .advancedsearch .quickfilter .filters .filter.submit {
            width: 24%;
            position: static
        }

        .advancedsearch .quickfilter .filters .filter ul {
            right: 0;
            left: 0;
            top: auto;
            width: auto
        }

        .advancedsearch .quickfilter .filters .filter ul.dropdown-menu.c1 {
            max-width: none;
            float: none
        }

        .advancedsearch .quickfilter .filters .filter ul.dropdown-menu.c1 li {
            width: 25%;
            float: left
        }

        .modex {
            /* margin: 0 15px; */
            margin-bottom: 5px;
            text-align: center;
            background: #333;
            width: 100%;
            border-radius: 2px;
            padding: 3px 6px;
        }

        .other-opts .modex {
            float: right;
            width: 25%;
            margin-right: 30px;
        }

        .modex a {
            cursor: pointer;
            color: #fff;
            display: inline-block;
            /* line-height: 25px; */
            /* padding: 0 15px; */
            font-weight: 300;
            white-space: nowrap;
            font-size: 12px;
            /* background: #333; */
            /* border-radius: 3px */
        }

        .nav_apb {
            margin: 0 15px;
            margin-bottom: 5px;
            text-align: center
        }

        .nav_apb a {
            text-align: center;
            display: inline-block;
            background: #eee;
            padding: 8px 12px !important;
            margin: 2px;
            color: #333;
            border-radius: 3px
        }

        .nav_apb a:hover {
            background: #fff;
            color: #333
        }

        .soralist span {
            display: block;
            border-bottom: 4px solid #ddd
        }

        .soralist span a {
            font-weight: 700;
            font-size: 15px
        }

        .soralist span {
            display: block;
            padding: 0 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #ececec
        }

        .soralist ul {
            margin: 0;
            overflow: hidden;
            color: #ddd;
            padding: 15px;
            font-weight: 400;
            font-size: 14px
        }

        .soralist ul li {
            margin-left: 15px;
            float: left;
            line-height: 20px;
            margin-bottom: 3px;
            width: 47%
        }

        .archx {
            overflow: hidden
        }

        .archx .arche {
            overflow: hidden;
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px
        }

        .archx .arche .imgx {
            float: left;
            margin-right: 15px;
            position: relative;
            overflow: hidden
        }

        .archx .arche .imgx span {
            top: 0;
            left: 0;
            color: #fff;
            background: rgba(72, 72, 72, .68);
            padding: 3px 7px;
            font-size: 13px;
            font-weight: 500;
            position: absolute
        }

        .archx .arche .imgx img {
            max-width: 110px;
            height: auto
        }

        .archx .arche .inx {
            overflow: hidden
        }

        .archx .arche .inx h2 {
            margin: 0;
            font-size: 16px;
            margin-bottom: 10px
        }

        .archx .arche .inx h2 a {
            color: #000
        }

        .archx .arche .inx h2 a:hover {
            text-decoration: none;
            color: #3367d6
        }

        .archx .arche .inx span {
            display: block;
            margin-bottom: 3px;
            color: #8f95a3;
            font-weight: 500;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden
        }

        .archx .arche .inx span a {
            color: #8f95a3
        }

        .archx .arche .inx span b {
            width: 90px;
            float: left
        }

        .seriestitle {
            display: block;
            font-size: 14px;
            font-weight: 700;
            background: #141414;
            color: #888;
            line-height: 30px;
            margin: -5px -9px 5px;
            padding: 0 7px
        }

        .seriestitle .score {
            margin: 3px;
            float: right;
            line-height: 23px;
            color: #888
        }

        .infseries {
            overflow: hidden;
            margin: 5px 0
        }

        .infseries img {
            float: left;
            width: 150px;
            height: 200px;
            padding: 1px;
            border: 1px solid #525151;
            margin-right: 10px
        }

        .infseries .right {
            font-size: 12px;
            line-height: 18px;
            color: #a2a2a2
        }

        .infseries .right span {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        .infseries .right b {
            color: #a2a2a2
        }

        .infseries .right a {
            color: #a2a2a2
        }

        .infseries .right .deskrip {
            border-top: 1px solid #515151;
            display: block;
            margin-top: 5px;
            padding-top: 5px;
            margin-left: 168px
        }

        .infseries .right .deskrip p {
            margin: 0
        }

        #sidebar {
            width: 30%;
            float: right;
            position: relative;
            z-index: 1
        }

        #sidebar .section {
            margin-left: 15px;
            background: #fff;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            margin-bottom: 18px;
            box-shadow: 1px 3px 8px rgba(49, 49, 49, .1)
        }

        #sidebar .section ul {
            margin: 0;
            padding: 0
        }

        #sidebar .section>ul {
            font-size: 13px
        }

        #sidebar .section>ul>li {
            padding: 7px 15px;
            text-overflow: unset;
            white-space: unset;
            overflow: hidden;
            border-bottom: 1px solid #ececec;
            position: relative;
            line-height: 160%
        }

        #sidebar .section>ul>li .post-date {
            font-size: 12px;
            font-style: italic;
            margin-left: 5px;
            color: #999
        }

        #sidebar .section .textwidget {
            padding: 5px 15px;
            padding-bottom: 15px;
            line-height: 21px;
            font-size: 13px
        }

        #sidebar .section .ts-wpop-series-gen .ts-wpop-nav-tabs {
            list-style: none;
            margin: 10px;
            padding: 6px;
            overflow: hidden;
            background: #f1f1f1;
            border-radius: 3px
        }

        #sidebar .section .ts-wpop-series-gen .ts-wpop-nav-tabs li {
            float: left;
            width: 33.3333333%;
            padding: 0;
            border: 0;
            text-align: center
        }

        #sidebar .section .ts-wpop-series-gen .ts-wpop-nav-tabs li a {
            padding: 3px;
            display: block;
            font-size: 12px;
            cursor: pointer
        }

        #sidebar .section .ts-wpop-series-gen .ts-wpop-nav-tabs li.active a {
            display: block;
            background: #0c70de;
            border-radius: 3px;
            color: #fff
        }

        .serieslist {
            overflow: hidden
        }

        .serieslist ul {
            overflow: hidden
        }

        .serieslist ul li {
            padding: 12px 15px;
            text-overflow: unset;
            white-space: unset;
            overflow: hidden;
            border-bottom: 1px solid #ececec;
            position: relative
        }

        .serieslist ul li .ctr {
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 25px;
            font-size: 1em;
            color: #0c70de;
            position: absolute;
            top: 30px;
            left: 15px;
            border: .5px solid #0c70de;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            z-index: 3
        }

        .serieslist.pop ul li {
            padding-left: 55px
        }

        .serieslist ul li .imgseries {
            float: left;
            overflow: hidden;
            width: 45px;
            margin-right: 10px
        }

        .serieslist ul li .imgseries img {
            width: 100%;
            height: auto;
            padding: 0;
            border: none;
            margin-bottom: 0;
            margin-right: 0;
            float: none
        }

        .serieslist ul li .leftseries span.bt {
            font-size: 11px;
            display: block;
            margin-top: 4px;
            float: left;
            padding: 2px 4px;
            background: #f5f5f5
        }

        .serieslist ul li .leftseries span span.lmt {
            float: left;
            max-width: 145px;
            margin-right: 3px
        }

        .serieslist ul li .leftseries {
            overflow: hidden;
            text-overflow: unset;
            white-space: unset
        }

        #sidebar .serieslist ul li .leftseries h4 {
            font-size: 1em;
            font-weight: 500;
            margin: 0 0 3px;
            line-height: 1.4em;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .serieslist ul li .leftseries span {
            overflow: hidden;
            font-size: .88em;
            color: #888;
            margin-bottom: 5px;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .serieslist ul li .leftseries span b {
            font-weight: 500
        }

        .serieslist.pop ul li.topone {
            padding: 0;
            position: relative
        }

        .serieslist.pop ul li.topone .limit {
            padding: 52% 0 0;
            position: relative;
            overflow: hidden
        }

        .serieslist.pop ul li.topone .limit>img {
            position: absolute;
            top: 0;
            min-height: 175px;
            height: auto;
            width: 100%;
            transform-style: preserve-3d
        }

        /* .serieslist.pop ul li.topone .limit .shadow {
            background-image: url(<?= $config["url"] ?>assets/mono/images/pattern.png);
             !important;
            background-color: rgba(40, 119, 182, .28) !important;
            z-index: 1;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0
        } */

        .serieslist.pop ul li.topone .limit .bw {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 1;
            padding: 10px 15px;
            padding-top: 30px;
            padding-left: 55px;
            background: url(<?= $config["url"] ?>assets/mono/images/item-shadow.png) top center repeat
        }

        .serieslist.pop ul li.topone .limit .bw .ctr {
            border-radius: 0;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border: none;
            background: #0c70de;
            color: #fff;
            top: auto;
            bottom: 0;
            height: 52px;
            font-size: 1.2em
        }

        .serieslist.pop ul li.topone .limit .bw .imgseries {
            background: 0 0;
            box-shadow: 0 1px 5px #000
        }

        .serieslist.pop ul li.topone .limit .bw a,
        .serieslist.pop ul li.topone .limit .bw span {
            color: #fff;
            line-height: 14px
        }

        .serieslist .numscore {
            display: inline-block;
            margin-left: 5px;
            font-size: 12px;
            line-height: normal;
            font-style: italic;
            color: #999
        }

        .serieslist .rating {
            overflow: hidden
        }

        .serieslist .rating .rating-prc {
            float: left
        }

        .serieslist .rating-prc .rtp .rtb {
            margin: 0;
            font-size: 12px;
            width: 67px;
            height: 14px
        }

        .serieslist .rating-prc .rtp .rtb span {
            margin: 0;
            font-size: inherit;
            color: inherit !important
        }

        .serieslist.pop ul li.topone .numscore {
            color: #fff
        }

        .serieslist ul li .leftseries h2,
        .serieslist ul li .leftseries h4 {
            font-size: .98em;
            font-weight: 500;
            margin: 0 0 3px;
            line-height: 1.4em
        }

        .serieslist ul li .leftseries h2 a,
        .serieslist ul li .leftseries h4 a {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .warning,
        .announ {
            background: #cc2f24;
            color: #ffe9e9;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            margin-bottom: 18px;
            box-shadow: 1px 3px 8px rgba(49, 49, 49, .1);
            overflow: hidden;
            padding: 15px;
            line-height: 21px
        }

        #sidebar .section ul.genre {
            overflow: hidden;
            list-style: none;
            position: relative;
            padding: 5px 0 15px;
            font-size: inherit
        }

        #sidebar .section ul.genre li {
            float: left;
            width: 33.33%;
            padding: 0;
            border-bottom: 0
        }

        #sidebar .section ul.genre li a {
            font-size: 13px;
            padding: 4px 15px;
            display: inline-block
        }

        #sidebar .section ul.genre:before,
        #sidebar .section ul.genre:after {
            content: "";
            position: absolute;
            width: 1px;
            height: 100%;
            top: 0;
            bottom: 0;
            left: 33.33%;
            background: #ececec
        }

        #sidebar .section ul.genre:after {
            left: 66.66%
        }

        #sidebar .section ul.season {
            margin-top: 10px;
            max-height: 240px;
            overflow-y: scroll
        }

        #sidebar .section ul.season li {
            padding: 5px 0;
            padding-left: 20px;
            overflow: hidden;
            font-size: 13px;
            position: relative
        }

        #sidebar .section ul.season li span {
            float: right;
            margin-right: 10px
        }

        #sidebar .section ul.season li:before {
            content: "";
            position: absolute;
            width: 5px;
            height: 5px;
            background: #0c70de;
            left: 0;
            top: 10px
        }

        #sidebar .section ul.season::-webkit-scrollbar,
        .menu-second-container #menu-second::-webkit-scrollbar {
            width: 5px
        }

        #sidebar .section ul.season::-webkit-scrollbar-track,
        .menu-second-container #menu-second::-webkit-scrollbar-track {
            background: #ddd
        }

        #sidebar .section ul.season::-webkit-scrollbar-thumb,
        .menu-second-container #menu-second::-webkit-scrollbar-thumb {
            background: #0c70de
        }

        #sidebar .section ul.season::-webkit-scrollbar-thumb:hover,
        .menu-second-container #menu-second::-webkit-scrollbar-thumb:hover {
            background: #555
        }

        #sidebar .section .mseason {
            margin: 0 15px;
            padding-bottom: 15px;
            margin-bottom: 15px
        }

        .ltslist {
            overflow: hidden
        }

        .ltslist li {
            border-left: 1px solid #eaeaea;
            border-right: 1px solid #eaeaea;
            border-bottom: 1px solid #eaeaea;
            padding: 6px 10px;
            font-size: 12px
        }

        .ltslist li:nth-child(odd) {
            background: #fafafa
        }

        .ltslist li a {
            color: #333
        }

        .ppr {
            font-size: 12px;
            margin-bottom: 10px;
            padding: 1px;
            padding-bottom: 0;
            background: #eaeaea
        }

        .ppr li {
            overflow: hidden;
            padding: 5px;
            border-bottom: 1px solid #eaeaea;
            background: #fff
        }

        .ppr li .bor {
            float: left;
            padding: 1px;
            border: 1px solid #ddd
        }

        .ppr li .bor .limit {
            height: 39px;
            overflow: hidden
        }

        .ppr li .bor .limit img {
            width: 39px;
            height: auto
        }

        .ppr li .right {
            height: 41px;
            margin-left: 47px;
            padding: 1px 5px;
            font-size: 13px;
            background: #f5f5f5;
            line-height: 18px
        }

        .ppr li .right .title {
            display: block;
            font-weight: 700;
            color: #f13e3e;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap
        }

        ppr li .right .title a {
            color: #f13e3e
        }

        .ppr li .right .latest {
            font-size: 12px;
            overflow: hidden;
            font-family: tahoma;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
            color: #555
        }

        .ppr li .right .latest a {
            color: #555
        }

        #sidebar .section .ongoingseries ul {
            font-size: 13px;
            max-height: 400px;
            overflow: hidden
        }

        #sidebar .section .ongoingseries ul li {
            overflow: hidden;
            border-bottom: 1px solid #ececec;
            line-height: 0
        }

        #sidebar .section .ongoingseries ul li a {
            display: block;
            padding: 5px 12px;
            overflow: hidden
        }

        #sidebar .section .ongoingseries ul li a .l {
            float: left;
            display: block;
            max-width: 70%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height: 22px
        }

        #sidebar .section .ongoingseries ul li a .l .fas {
            width: 12px;
            height: 12px;
            line-height: 12px;
            font-size: 10px;
            border-radius: 50%;
            background: #0c70de;
            color: #fff;
            margin-right: 5px;
            margin-top: 5px;
            text-align: center
        }

        #sidebar .section .ongoingseries ul li a .r {
            float: right;
            font-size: 11px;
            padding: 0 5px;
            border-radius: 3px;
            background: #0c70de;
            color: #fff;
            line-height: 21px
        }

        #sidebar .section .ongoingseries ul li:hover {
            background: #fafafa
        }

        #sidebar .section .ongoingseries ul:hover {
            overflow-y: scroll
        }

        #sidebar .section .ongoingseries ul::-webkit-scrollbar {
            width: 5px
        }

        #sidebar .section .ongoingseries ul::-webkit-scrollbar-thumb {
            background: #0c70de
        }

        .quickfilter {
            padding: 9px
        }

        .quickfilter .filters {
            position: relative
        }

        .quickfilter .filters .filter {
            width: 50%;
            /* float: left; */
            box-sizing: border-box;
            padding: 6px 5px;
            margin: 0;
            display: inline-block;
            position: relative;
            border-radius: 2px
        }

        .quickfilter .filters .filter button {
            width: 100%;
            color: #2f2f2f;
            padding: 3px 6px;
            font-size: 12px;
            line-height: 1.5;
            border-radius: 2px;
            background-color: #efefef;
            border-color: #efefef;
            display: inline-block;
            margin-bottom: 0;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            touch-action: manipulation;
            -webkit-appearance: button;
            cursor: pointer;
            background-image: none;
            border: 1px solid transparent;
            overflow: visible;
            white-space: nowrap;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            font-family: inherit
        }

        .quickfilter .filters .filter ul {
            width: 500px;
            margin-top: 1px !important;
            padding: 10px !important;
            font-size: 13px;
            position: absolute;
            display: none;
            top: 100%;
            right: 0;
            left: auto;
            z-index: 1000;
            min-width: 160px;
            text-align: left;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 3px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            background-clip: padding-box;
            list-style: none
        }

        .quickfilter .filters .filter ul li {
            width: 25%;
            float: left;
            color: #3c3c3c;
            -khtml-transition: all .1s ease-in-out 0;
            -moz-transition: all .1s ease-in-out 0;
            -ms-transition: all .1s ease-in-out 0;
            -o-transition: all .1s ease-in-out 0;
            transition: all .1s ease-in-out 0
        }

        .quickfilter .filters .filter ul li input {
            display: none
        }

        .quickfilter .filters .filter ul li input,
        .quickfilter .filters .filter ul li label {
            position: inherit;
            cursor: pointer
        }

        .quickfilter .filters .filter ul label {
            display: block;
            color: #3c3c3c;
            padding: 5px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .quickfilter .filters .filter ul li input+label:before,
        .quickfilter .filters .filter ul li input:not(:checked)+label:before {
            display: inline-block;
            content: "";
            top: 3px;
            left: 0;
            height: 12px;
            width: 12px;
            background-color: #ddd;
            border-radius: 3px;
            margin-right: 5px
        }

        .quickfilter .filters .filter ul.c1 li input+label:before,
        .quickfilter .filters .filter ul.c1 li input:not(:checked)+label:before {
            border-radius: 50%
        }

        .quickfilter .filters .filter ul li input:checked+label:before {
            left: 2px;
            top: -2px;
            width: 5px;
            height: 10px;
            border: solid #28a745;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            background: 0 0
        }

        .quickfilter .filters .filter i {
            font-size: 12px;
            width: auto;
            height: auto;
            line-height: 18px;
            font-weight: 700
        }

        .quickfilter .filters .filter.submit {
            float: none;
            width: 100%
        }

        .quickfilter .filters .filter.submit button {
            background: #0c70de;
            color: #fff
        }

        .quickfilter .filters .filter.submit button:hover {
            background: #333;
            color: #fff
        }

        .quickfilter .filters .filter.open button,
        .quickfilter .filters .filter button:hover {
            color: #333;
            background-color: #d0d0d0;
            border-color: #d0d0d0
        }

        .quickfilter .filters .filter.open ul {
            display: block
        }

        .quickfilter .filters .filter ul.dropdown-menu.c1 {
            max-width: 160px;
            float: right
        }

        .quickfilter .filters .filter ul.dropdown-menu.c1 li {
            width: 100%;
            float: none
        }

        .quickfilter .filters .filter .scrollz {
            max-height: 240px;
            overflow: hidden
        }

        .quickfilter .filters .filter .scrollz:hover {
            overflow-y: scroll
        }

        #sidebar #mainepisode {
            margin-left: 15px
        }

        #singlepisode {
            background: #111;
            border: 1px solid rgba(255, 255, 255, .1);
            overflow: hidden;
            margin-bottom: 15px;
            box-shadow: 1px 3px 8px rgba(49, 49, 49, .1)
        }

        #singlepisode .headlist {
            background: #222;
            overflow: hidden;
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, .1)
        }

        #singlepisode .headlist .thumb {
            float: left;
            overflow: hidden;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #333;
            margin-right: 10px
        }

        #singlepisode .headlist .det {
            overflow: hidden;
            color: #fff;
            padding-top: 9px
        }

        #singlepisode .headlist .det h3 {
            margin: 0;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 500;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        #singlepisode .headlist .det span {
            font-size: 13px;
            color: #aaa
        }

        #singlepisode .headlist .det span i {
            color: #f3c669
        }

        #singlepisode .headlist .det h3 a {
            color: #fff
        }

        #singlepisode .episodelist {
            position: relative
        }

        #singlepisode .episodelist ul {
            overflow: hidden;
            list-style: none;
            margin: 0;
            padding: 0;
            max-height: 350px
        }

        #singlepisode .episodelist ul li {
            overflow: hidden;
            position: relative
        }

        #singlepisode .episodelist ul li a {
            display: block;
            padding: 10px;
            overflow: hidden
        }

        #singlepisode .episodelist ul li .thumbnel {
            float: left;
            width: 100px;
            height: 60px;
            overflow: hidden;
            position: relative;
            margin-right: 10px
        }

        #singlepisode .episodelist ul li .thumbnel img {
            width: 100%;
            min-height: 60px
        }

        #singlepisode .episodelist ul li .thumbnel .nowplay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            line-height: 60px;
            color: rgba(255, 255, 255, .68);
            text-align: center;
            font-size: 30px;
            background: rgba(0, 0, 0, .8)
        }

        #singlepisode .episodelist ul li .thumbnel .nowplay .far {
            line-height: 60px
        }

        #singlepisode .episodelist ul li .playinfo {
            overflow: hidden;
            color: #fff;
            padding-top: 5px
        }

        #singlepisode .episodelist ul li .playinfo h4 {
            margin: 0;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 14px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        #singlepisode .episodelist ul li .playinfo span {
            font-size: 12px;
            color: #aaa
        }

        #singlepisode .episodelist ul li.selected {
            background: #202020 !important
        }

        #singlepisode .episodelist ul li:hover {
            background: #000
        }

        #singlepisode .episodelist ul:hover {
            overflow-y: scroll
        }

        #singlepisode .episodelist ul::-webkit-scrollbar {
            width: 7px
        }

        #singlepisode .episodelist ul::-webkit-scrollbar-thumb {
            background: #555
        }

        .bloglist {
            padding: 15px 8px;
            overflow: hidden
        }

        .bloglist .blogbox {
            float: left;
            width: 33.3333333%;
            overflow: hidden
        }

        .bloglist .blogbox .innerblog {
            margin: 7px
        }

        .bloglist .blogbox .innerblog .thumb {
            position: relative;
            overflow: hidden;
            padding-top: 55%;
            background: rgba(0, 0, 0, .1);
            border-radius: 7px
        }

        .bloglist .blogbox .innerblog .thumb img {
            width: 100%;
            position: absolute;
            top: 0;
            min-height: 139px
        }

        .bloglist .blogbox .innerblog .infoblog {
            overflow: hidden;
            margin-top: 10px;
            margin-bottom: 10px;
            height: 125px
        }

        .bloglist .blogbox .innerblog .infoblog .entry-header {
            margin: 0;
            margin-bottom: 5px;
            float: none;
            display: block
        }

        .bloglist .blogbox .innerblog .infoblog .entry-header h2 {
            margin: 0;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 5px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .bloglist .blogbox .innerblog .infoblog .entry-header .entry-meta {
            font-size: 12px;
            color: #888;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .bloglist .blogbox .innerblog .infoblog .entry-header .entry-meta a {
            color: #aaa
        }

        .bloglist .blogbox .innerblog .infoblog .entry-content {
            font-size: 13px;
            color: #999;
            line-height: 160%
        }

        .bloglist .blogbox .innerblog .infoblog .entry-content p {
            margin: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2
        }

        .bloglist .blogbox .innerblog .infoblog .entry-header .entry-meta b {
            font-weight: 500
        }

        .bloglist .blogbox .innerblog .infoblog .entry-header .entry-meta .hide {
            display: none
        }

        .blogpost .thumb {
            position: relative;
            overflow: hidden;
            text-align: center;
            margin-top: 15px
        }

        .bixbox.blogpost .thumb img {
            max-width: 600px
        }

        .blogpost .entry-header {
            padding: 15px;
            float: none;
            margin: 0;
            text-align: center;
            display: block
        }

        .blogpost .entry-header h1 {
            margin: 0;
            margin-bottom: 5px;
            line-height: 27px;
            font-size: 19px;
            font-weight: 500
        }

        .blogpost .entry-header .entry-meta {
            font-size: 12px;
            color: #999
        }

        .blogpost .entry-header .entry-meta .hide {
            display: none
        }

        .blogpost .entry-header .entry-meta b {
            font-weight: 500
        }

        .blogpost .entry-content {
            margin: 15px;
            overflow: hidden;
            font-size: 15px;
            line-height: 160%
        }

        .blogpost .entry-content .aligncenter {
            margin: 0 auto;
            display: block
        }

        .blogpost .entry-content img {
            margin-bottom: 15px
        }

        .blogpost .entry-content .alignright {
            display: block;
            float: right;
            margin-left: 15px
        }

        .blogpost .entry-content pre {
            white-space: pre-wrap
        }

        .blogpost .entry-header .entry-meta a {
            color: #999
        }

        .blogpost .entry-header .entry-meta .far,
        .blogpost .entry-header .entry-meta .fa {
            font-size: 10px;
            margin-right: 3px
        }

        .bloglist .blogbox .innerblog .infoblog .entry-meta {
            margin-top: 7px;
            font-size: 12px;
            color: #757575
        }

        .bloglist .blogbox .innerblog .infoblog .entry-meta .far {
            font-size: 10px
        }

        .bloglist .blogbox .innerblog .infoblog .entry-meta .hide {
            display: none
        }

        .bloglist .blogbox .innerblog .thumb .btags {
            position: absolute;
            z-index: 4;
            bottom: 5px;
            left: 5px;
            background: #366ad3;
            opacity: .85;
            font-size: 12px;
            padding: 1px 5px;
            line-height: 16px;
            border-radius: 3px;
            color: #fff !important
        }

        .blogpost .socialts {
            text-align: center;
            margin-left: 15px;
            margin-right: 15px
        }

        .post-nav-links {
            text-align: center;
            overflow: hidden
        }

        .post-nav-links .post-page-numbers {
            display: inline-block;
            background: #0c70de;
            padding: 0 10px;
            border-radius: 10px
        }

        .post-nav-links .current {
            background: #e5e5e5 !important
        }

        .post-nav-links a.post-page-numbers {
            color: #fff
        }

        .post-nav-links a.post-page-numbers:hover {
            background: #555
        }

        div#live-search_sb {
            width: 350px !important
        }

        #live-search_results {
            background: #fff;
            z-index: 550 !important;
            overflow: hidden;
            box-shadow: 0 0 3px rgba(0, 0, 0, .2)
        }

        .live-search_more {
            display: none
        }

        .live-search_header {
            display: none
        }

        .live-search_result_container ul {
            margin: 0;
            padding: 0;
            overflow: hidden
        }

        .live-search_result_container li {
            font-family: inherit;
            padding: 10px;
            color: #888;
            border-bottom: 1px solid #eee;
            overflow: hidden
        }

        .live-search_result_container li:hover {
            background: #fcfcfc
        }

        .live-search_result_container li a {
            display: block
        }

        .live-search_result_container .post-thumbnail {
            margin-right: 6px;
            /* float: left; */
            width: 40px;
            background: #fafafa;
            height: 60px;
            overflow: hidden;
            display: inline-block;
            padding-bottom: 0
        }

        .live-search_result_container .post-thumbnail img {
            width: 100% !important;
            height: auto !important
        }

        span.live-search_text {
            display: block;
            color: #fff;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis
        }

        #live-search_loading {
            display: block !important;
            width: 100%;
            height: 31px !important
        }

        .live-search_result_container a:hover {
            text-decoration: none;
            color: #0c70de
        }

        ul.live-search_main {
            margin: 0;
            padding: 0;
            list-style: none
        }

        .live-search_result_container .over {
            overflow: hidden
        }

        .live-search_result_container .over .autotitle {
            font-size: 1em;
            font-weight: 500;
            margin-bottom: 3px;
            display: block
        }

        .live-search_result_container .over span {
            display: block;
            margin-bottom: 2px;
            font-size: 12px;
            color: #888;
            overflow: hidden
        }

        .live-search_result_container .over span i {
            display: inline-block;
            margin: 2px 5px;
            width: 4px;
            height: 4px;
            background: #aaa;
            border-radius: 50%
        }

        .notf {
            text-align: center;
            margin: 30px 0
        }

        .qtip-default {
            border: 0 !important;
            background-color: #212529 !important;
            color: #333;
            box-shadow: none;
            width: 270px !important;
            border-radius: 5px;
            margin: 5px
        }

        .qtip-content {
            padding: 15px !important;
            font-size: 14px !important;
            line-height: 21px
        }

        .ingfo .iftitle {
            color: #fff;
            margin-bottom: 7px
        }

        .ingfo .minginfo {
            color: #828b95;
            margin-bottom: 7px
        }

        .ingfo .minginfo span.l {
            margin-right: 15px
        }

        .ingfo .minginfo span.l i {
            font-size: 11px;
            color: #fec700;
            line-height: inherit
        }

        .ingfo .minginfo span.r {
            float: right;
            display: block;
            background: #0d6fde;
            color: #fff;
            font-size: 12px;
            border-radius: 5px;
            padding: 0 7px
        }

        .ingfo .ingdesc {
            color: #6e7780;
            margin-bottom: 7px;
            font-size: 13px
        }

        .ingfo .linginfo {
            color: #a0a9ae;
            font-size: 12px;
            margin-bottom: 7px
        }

        .ingfo .linginfo span {
            display: block
        }

        .ingfo .linginfo span b {
            font-weight: 400;
            color: #6e7780
        }

        .ingfo .linginfo span a {
            color: inherit
        }

        .ingfo .bungton {
            text-align: center
        }

        .ingfo .bungton a {
            display: block;
            color: #fff;
            background: #33393f;
            padding: 5px 2px;
            border-radius: 5px
        }

        .ingfo .bungton a i {
            color: #de5668
        }

        .ingfo .minginfo span.r.TV {
            background: #0c70de
        }

        .ingfo .minginfo span.r.Movie {
            background: #9c27b0
        }

        .ingfo .minginfo span.r.Live {
            background: #ff5722
        }

        .ingfo .minginfo span.r.OVA {
            background: #2196f3
        }

        .single-info.bixbox {
            padding: 15px
        }

        .single-info.bixbox .thumb {
            float: left;
            width: 150px;
            margin-right: 15px
        }

        .single-info.bixbox .infox {
            overflow: hidden;
            line-height: 21px;
            font-size: 13px;
            position: relative
        }

        .single-info.bixbox .infox .infolimit {
            margin-right: 120px;
            margin-bottom: 10px
        }

        .single-info.bixbox .infox .rating {
            position: absolute;
            right: 0;
            top: 0;
            text-align: center;
            padding: 7px 10px;
            background: #ebf2f6;
            border-radius: 5px
        }

        .single-info.bixbox .infox .rating strong {
            font-weight: 400;
            display: block
        }

        .single-info.bixbox .infox .infolimit h2 {
            margin: 0;
            color: #0c70de;
            font-size: 17px
        }

        .single-info.bixbox .infox .infolimit .alter {
            margin-top: 5px;
            display: block;
            color: #999
        }

        .single-info.bixbox .infox .spe {
            margin-bottom: 10px;
            overflow: hidden
        }

        .single-info.bixbox .infox .spe span {
            width: 50%;
            margin-bottom: 3px;
            padding-right: 7px;
            float: left;
            padding-left: 14px;
            position: relative;
            line-height: 19px
        }

        .single-info.bixbox .infox .spe span:before {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            background: #0c70de;
            display: inline-block;
            position: absolute;
            left: 0;
            top: 4px
        }

        .single-info.bixbox .infox .spe span b {
            font-weight: 500
        }

        .single-info.bixbox .infox .spe span.split {
            overflow: hidden
        }

        .single-info.bixbox .infox .genxed {
            overflow: hidden;
            margin-bottom: 10px
        }

        .single-info.bixbox .infox .genxed a {
            display: inline-block;
            padding: 4px 8px;
            margin-right: 5px;
            margin-bottom: 5px;
            font-size: 13px;
            color: #0c70de;
            border: .5px solid #0c70de;
            border-radius: 3px;
            line-height: normal
        }

        .single-info.bixbox .infox .genxed a:hover {
            background: #0c70de;
            color: #fff
        }

        .single-info.bixbox .infox .desc.mindes {
            overflow: hidden;
            height: 85px;
            margin-bottom: 20px;
            position: relative
        }

        .single-info.bixbox .infox .desc.mindes .colap {
            position: absolute;
            bottom: 0;
            left: 0;
            display: block;
            width: 100%;
            text-align: center;
            background: #eee;
            cursor: pointer;
            color: #777
        }

        .single-info.bixbox .infox .desc.mindes .colap:before {
            content: "more"
        }

        .single-info.bixbox .infox .desc.mindes.alldes {
            height: auto
        }

        .single-info.bixbox .infox .desc.mindes.alldes .colap {
            position: relative;
            margin-top: 5px
        }

        .single-info.bixbox .infox .desc.mindes.alldes .colap:before {
            content: "hide"
        }

        #footer {
            margin-top: 30px;
            text-align: center;
            line-height: 20px;
            padding: 0;
            font-size: 13px;
            color: #fff;
            background: #222
        }

        #footer a {
            color: #fff
        }

        #footer .footermenu {
            text-align: center;
            background: #0c70de
        }

        #footer .footermenu ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: inline-block
        }

        #footer .footermenu ul li {
            padding: 8px 10px;
            display: inline-block
        }

        .footer-az {
            margin-bottom: 20px;
            margin-top: 30px;
            text-align: left
        }

        .footer-az span.ftaz {
            display: inline-block;
            padding-right: 20px;
            margin-right: 20px;
            border-right: 1px solid #530000;
            line-height: 1em;
            font-size: 1.4em;
            font-weight: 500
        }

        .footer-az span.size-s {
            font-size: 13px
        }

        .footer-az .az-list {
            font-size: 0;
            list-style: none;
            margin: 0;
            padding: 0;
            margin-top: 18px
        }

        .footer-az .az-list li {
            margin: 0 10px 10px 0;
            display: inline-block
        }

        .footer-az .az-list li a {
            font-size: 14px;
            padding: 4px 9px;
            display: inline-block;
            line-height: normal;
            color: #fff !important;
            background: #0c70de;
            border-radius: 2px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px
        }

        .footer-az .az-list li a:hover {
            background: #333
        }

        .footercopyright {
            max-width: 1190px;
            padding: 0 20px;
            margin: 0 auto;
            overflow: hidden
        }

        .footercopyright p {
            margin: 0;
            margin-top: 5px;
            font-size: .82em;
            margin-bottom: 0;
            line-height: 14px;
            letter-spacing: .5px
        }

        .footercopyright p i {
            font-style: normal
        }

        .footercopyright .copyright {
            overflow: hidden
        }

        .footercopyright .copyright .footer-logo {
            float: left;
            margin-right: 20px;
            margin-bottom: 40px
        }

        .footercopyright .copyright .footer-logo img {
            height: 50px;
            width: auto
        }

        .footercopyright .copyright .txt {
            float: left;
            width: 400px;
            text-align: left
        }

        .footercopyright .copyright.marx {
            padding-top: 20px;
            padding-bottom: 20px
        }

        .footercopyright .copyright.marx .footer-logo {
            float: none;
            margin: 0;
            margin-bottom: 5px
        }

        .footercopyright .copyright.marx .txt {
            float: none;
            width: auto;
            text-align: center
        }

        .footercopyright .copyright.marx .txt p {
            margin-top: 3px
        }

        .pagination {
            overflow: hidden;
            line-height: normal;
            text-align: center;
            margin: 15px 0 30px
        }

        .pagination span.page-numbers.dots {
            color: #888;
            display: none
        }

        .pagination span.page-numbers.current {
            display: inline-block;
            background: #0c70de !important;
            padding: 8px 15px !important;
            margin: 2px;
            color: #fff;
            border-radius: 3px
        }

        .pagination a {
            display: inline-block;
            background: #eee;
            padding: 8px 15px !important;
            margin: 2px;
            color: #333;
            border-radius: 3px
        }

        .hpage {
            clear: both;
            padding-top: 15px;
            padding-bottom: 10px;
            text-align: center;
            overflow: hidden
        }

        .hpage a {
            display: inline-block;
            background: #0c70de;
            padding: 5px 10px;
            font-size: 13px;
            border-radius: 2px;
            color: #fff;
            width: 110px;
            text-align: center
        }

        .hpage a .dashicons {
            width: auto;
            height: auto;
            font-size: 16px
        }

        .hpage a:hover,
        .bixbox .bvl {
            background: #333;
            color: #fff
        }

        .soraddl {
            overflow: hidden;
            text-align: center;
            margin-bottom: 10px
        }

        .soraddl .sorattl {
            padding: 5px 10px;
            background: #3367d6;
            color: #fff;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500
        }

        .soraddl .sorattl:after {
            font-family: 'dashicons';
            line-height: normal;
            font-weight: 400;
            float: right;
            content: "\f180";
            color: #fff;
            line-height: 22px
        }

        .soraddl .sorattl:before {
            font-family: 'dashicons';
            line-height: normal;
            font-weight: 400;
            float: left;
            content: "\f180";
            color: #fff;
            line-height: 22px
        }

        .soraddl .soraurl {
            padding: 4px 0;
            font-weight: 500;
            color: #444;
            border-bottom: 1px solid #ebebeb
        }

        .soraddl .soraurl a {
            color: #333;
            display: inline-block;
            background: #f1f1f1;
            padding: 4px 7px;
            border-radius: 3px;
            margin: 2px 0;
            font-size: 13px
        }

        .soraddl .soraurl a:before {
            font-family: 'dashicons';
            display: block;
            content: "\f316";
            float: left;
            margin-right: 3px
        }

        .soraddl br,
        .soraddl p {
            display: none
        }

        .soraddlx {
            overflow: hidden;
            margin-bottom: 15px
        }

        .soraddlx .sorattlx {
            overflow: hidden;
            padding: 8px 10px;
            margin-bottom: 5px;
            background: #0c70de;
            color: #fff
        }

        .soraddlx .soraurlx {
            padding: 0 8px 0 0;
            background: #f1f1f1;
            margin-bottom: 5px;
            font-size: 14px;
            line-height: 32px
        }

        .soraddlx br,
        .soraddlx p {
            display: none
        }

        .soraddlx .sorattlx h3 {
            margin: 0;
            font-size: 14px;
            font-weight: 500
        }

        .soraddlx .soraurlx strong {
            background: #0c70de;
            color: #fff;
            padding: 0 5px;
            margin-right: 5px;
            font-size: 13px;
            width: 50px;
            text-align: center;
            display: inline-block;
            font-weight: 500
        }

        .soraddlx a:last-child:after {
            display: none
        }

        .soraddlx a:after {
            content: "|";
            margin: 0 5px;
            color: #ddd
        }

        .soraddlx.nosplitx .soraurlx {
            color: #ddd
        }

        .darkmode .soraddlx.nosplitx .soraurlx {
            color: #555
        }

        .darkmode .soraddlx a:after {
            color: #555
        }

        .soraddlx.nosplitx a:after {
            display: none
        }

        .cmt {
            padding: 15px
        }

        .commentx h3 {
            margin: 0;
            margin-bottom: 1.5rem;
            color: #363636;
            font-size: 16px;
            font-weight: 500
        }

        .commentx .navigation {
            display: none
        }

        .comment-list {
            list-style: none;
            padding: 0;
            margin: 0
        }

        .comment-list>li {
            border: 1px solid #ececec;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px
        }

        .comment-list .comment-body {
            margin-bottom: 10px;
            overflow: hidden
        }

        .comment-list .comment-body .comment-author .avatar {
            width: 40px;
            border-radius: 50%;
            float: left;
            margin-right: 10px
        }

        .comment-list .comment-body .comment-author .fn {
            font-weight: 500;
            margin-top: 2px;
            display: block;
            font-style: normal
        }

        .comment-list .comment-body .comment-author .says {
            display: none
        }

        .comment-list .comment-body .comment-meta {
            color: #aaa;
            margin-bottom: 15px
        }

        .comment-list .comment-body .comment-meta a {
            color: #777;
            font-size: 12px
        }

        .comment-list .comment-body p {
            line-height: 22px
        }

        .comment-list .comment-body .reply {
            float: right
        }

        .comment-list .comment-body .reply a {
            display: block;
            border: 1px solid #0c70de;
            color: #0c70de;
            line-height: 25px;
            padding: 0 15px;
            border-radius: 50px
        }

        .comment-list .comment-body .reply a:hover {
            background: #0c70de;
            color: #fff
        }

        .comment-list .children {
            list-style: none;
            border-left: 1px solid #ececec;
            padding-left: 20px;
            position: relative
        }

        .comment-list>li:hover {
            box-shadow: 0 0 8px 0 rgba(0, 0, 0, .1)
        }

        .commentx #respond label {
            display: block;
            font-size: 15px;
            font-weight: 400;
            margin-bottom: 7px
        }

        .commentx textarea {
            width: 100%;
            box-sizing: border-box;
            color: #363636;
            padding: 15px;
            font-family: inherit;
            font-size: 14px;
            background-color: #fff;
            border: 1px solid #e1e1e1;
            border-radius: 5px
        }

        .commentx #submit {
            background-color: #0c70de;
            border-color: transparent;
            border-width: 0;
            color: #fff;
            cursor: pointer;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 8px 15px;
            text-align: center;
            white-space: nowrap;
            font-family: inherit;
            font-size: 14px;
            border-radius: 30px
        }

        .commentx #respond input[type=text] {
            color: #363636;
            padding: 10px;
            font-family: inherit;
            font-size: 15px;
            background-color: #fff;
            border: 1px solid #e1e1e1;
            border-radius: 5px
        }

        .commentx #respond .comment-form-cookies-consent {
            display: block
        }

        .commentx #respond .comment-form-cookies-consent label {
            display: inline
        }

        p.comment-form-url {
            clear: both
        }

        p.comment-form-url input#url {
            width: 100%
        }

        p.comment-form-email,
        p.comment-form-author {
            float: left;
            width: 50%
        }

        p.comment-form-email input#email {
            width: 100%
        }

        p.comment-form-author input#author {
            width: 95%
        }

        .separator a {
            margin-left: 0 !important;
            margin-right: 0 !important
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 25px;
            top: 0
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0
        }

        #thememode {
            float: right;
            position: relative;
            margin-top: 25px;
            margin-right: 10px;
            line-height: normal
        }

        #thememode .xt {
            text-transform: uppercase;
            font-size: .7rem;
            display: block;
            color: grey;
            margin-bottom: 2px;
            text-align: center
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, .25);
            -webkit-transition: .4s;
            transition: .4s
        }

        .slider:before {
            position: absolute;
            content: "\f186";
            font-family: "Font Awesome 5 Free";
            color: #fff;
            line-height: 25px;
            width: 25px;
            text-align: center;
            left: 0;
            bottom: 0;
            background-color: #0c70de;
            -webkit-transition: .4s;
            transition: .4s;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .3)
        }

        input:checked+.slider {
            background-color: rgba(255, 255, 255, .25)
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196f3
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(20px);
            -ms-transform: translateX(20px);
            transform: translateX(20px);
            content: "\f185"
        }

        .slider.round {
            border-radius: 34px;
            background: rgba(0, 0, 0, .1)
        }

        .slider.round:before {
            border-radius: 50%
        }

        #teaser1,
        #teaser2 {
            z-index: 1
        }

        @media only screen and (max-width:1200px) {
            #top-menu ul {
                max-width: 350px
            }
        }

        @media only screen and (max-width:1088px) {
            #top-menu ul {
                max-width: 300px
            }
        }

        @media only screen and (max-width:1040px) {
            #top-menu ul {
                max-width: 240px
            }
        }

        @media only screen and (max-width:1030px) {
            .newseason .listseries .card {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }
        }

        @media only screen and (max-width:978px) {
            .topmobile {
                display: block;
                float: right;
                margin-right: 10px;
                margin-top: 25px;
                width: 25px;
                line-height: 26px;
                color: #fff;
                text-align: center;
                background: #0c70de;
                border-radius: 50%;
                cursor: pointer
            }

            #top-menu {
                display: none
            }

            .topmobile .fa {
                line-height: inherit;
                font-size: 13px
            }

            #top-menu.topmobshow {
                display: block;
                float: none;
                margin: 0;
                position: absolute;
                top: 55px;
                right: 10px;
                z-index: 2;
                width: 140px;
                background: #fff;
                border-radius: 3px;
                font-size: 13px;
                box-shadow: 1px 3px 8px rgba(49, 49, 49, .1)
            }

            #top-menu.topmobshow ul {
                white-space: unset;
                max-width: unset
            }

            #top-menu.topmobshow ul li {
                display: block
            }

            #top-menu.topmobshow ul li a:hover {
                border-radius: 0
            }
        }

        @media only screen and (max-width:900px) {

            #sidebar .section ul.genre:before,
            #sidebar .section ul.genre:after {
                display: none
            }

            #sidebar .section ul.genre li {
                float: left;
                width: 50%
            }
        }

        @media only screen and (max-width:880px) {

            .postbody,
            #sidebar {
                float: none;
                width: auto
            }

            #sidebar .section {
                margin-left: 0
            }

            .sebox {
                width: 50%
            }

            .quickfilter .filters .filter {
                position: static
            }

            .quickfilter .filters .filter ul,
            .quickfilter .filters .filter ul.dropdown-menu.c1 {
                right: 0;
                left: 0;
                top: auto;
                width: auto;
                max-width: unset
            }

            .quickfilter .filters .filter ul.dropdown-menu.c1 li {
                float: left;
                width: 25%
            }
        }

        @media only screen and (max-width:800px) {

            .postbody,
            #sidebar {
                float: none;
                width: auto
            }

            #sidebar .section {
                margin-left: 0
            }

            .qtip-default {
                display: none !important
            }

            .megavid.xp {
                position: relative;
                top: 0;
                width: 100%
            }

            div#live-search_sb {
                width: 100% !important;
                left: 0 !important;
                top: 50px !important;
                right: 0 !important
            }

            #main-menu {
                display: none;
                position: absolute;
                top: 50px;
                left: 0;
                bottom: 0;
                right: 0;
                background: rgba(0, 0, 0, .95);
                height: 100%;
                overflow: auto;
                z-index: 999;
                width: auto;
                margin: 0
            }

            #main-menu ul li {
                float: none;
                position: relative;
                margin: 0
            }

            #main-menu ul li a,
            #main-menu ul li ul li a {
                text-align: left;
                color: #fff
            }

            #main-menu ul {
                float: none
            }

            #main-menu ul li ul {
                display: block;
                position: relative;
                margin: 0;
                top: unset;
                min-width: unset;
                border-radius: 0;
                float: none;
                background: rgba(16, 16, 16, .7)
            }

            #main-menu ul li a {
                line-height: 35px;
                height: 35px
            }

            .shwx {
                display: block !important
            }

            .mainheader {
                display: none
            }

            .th {
                overflow: hidden;
                background: #0c70de;
                height: 50px
            }

            .th .centernav {
                padding: 0
            }

            .shme {
                display: block;
                float: left;
                padding: 12px 0;
                width: 8%;
                text-align: center;
                color: #fff;
                height: 50px;
                cursor: pointer
            }

            .shme .fa {
                width: auto;
                height: auto;
                line-height: 24px;
                font-size: 28px
            }

            #thememode {
                margin-top: 21px;
                margin-right: 8px
            }

            #thememode .xt {
                display: none
            }

            input:checked+.slider {
                background-color: #333
            }

            .switch {
                top: -7px;
                width: 40px;
                height: 20px
            }

            .slider.round {
                background: #fff
            }

            .slider:before {
                line-height: 20px;
                width: 20px;
                bottom: 0
            }

            .surprise {
                display: block;
                float: none;
                background: #0c70de;
                clear: both;
                text-align: center
            }

            #main-menu .surprise .dashicons {
                display: inline-block;
                float: none;
                line-height: 19px
            }

            .searchx {
                margin: 7px 0;
                float: none;
                width: 84%;
                display: inline-block
            }

            .searchx #form #s {
                border: 1px solid #fff
            }

            .searchx.topcon {
                width: 79%
            }

            .topmobile {
                margin-top: 12px
            }

            .topmobile .fa {
                font-size: 20px
            }

            #top-menu.topmobshow {
                z-index: 5;
                top: 50px
            }

            .wrapper {
                margin: 0
            }

            .loop {
                margin-bottom: 0
            }

            .bixbox {
                border-radius: 0;
                margin-bottom: 5px
            }

            .megavid,
            .meta {
                margin-bottom: 5px
            }

            .icol.expand {
                display: none
            }

            .footer-az {
                display: none
            }

            .footercopyright .copyright {
                overflow: hidden;
                padding: 15px 0
            }

            .footercopyright .copyright .footer-logo {
                margin: 0;
                float: none
            }

            .footercopyright .copyright .txt {
                float: none;
                width: auto;
                text-align: center;
                margin-top: 5px
            }

            .footercopyright p {
                margin-top: 0
            }

            .slidtop .trending .tdb {
                margin: 0
            }

            .newseason {
                margin: 0 20px;
                margin-top: 30px
            }
        }

        @media only screen and (max-width:770px) {

            .bs,
            .bs.styletwo,
            .bs.styletere,
            .bs.styleegg {
                width: 25%
            }

            .stylefor {
                -ms-flex: 0 0 25%;
                flex: 0 0 25%;
                max-width: 25%
            }
        }

        @media only screen and (max-width:730px) {
            .searchx {
                width: 83%
            }
        }

        @media only screen and (max-width:715px) {
            .searchx.topcon {
                width: 78%
            }
        }

        @media only screen and (max-width:695px) {
            .slide-item.full .slide-content {
                padding: 20px !important
            }

            .iconx {
                line-height: 4px
            }

            .bigcontent {
                padding: 10px;
                padding-bottom: 150px
            }

            .bigcontent .thumbook {
                margin: 0 auto;
                margin-top: -80px;
                width: 120px;
                height: auto;
                position: unset;
                top: auto;
                left: auto;
                float: none;
                margin-bottom: 15px
            }

            .bigcontent .infox {
                overflow: hidden
            }

            .bigcontent .rt {
                position: absolute;
                top: auto;
                left: 0;
                bottom: 0;
                padding: 10px;
                width: 100%
            }

            .bigcontent .infox h1 {
                text-align: center;
                margin-bottom: 5px
            }

            .bigcontent .infox .alter {
                text-align: center
            }

            .bigcontent.nobigcv .thumbook {
                margin-top: 0
            }

            .bigcontent .infox .sosmed {
                text-align: center
            }

            .bigcontent.noscr {
                padding-bottom: 80px
            }

            .animefull .bigcover a.gp {
                display: none
            }

            .bs.styletwo,
            .bs.styletere,
            .bs.styleegg {
                width: 33.333333%
            }

            .stylefor {
                -ms-flex: 0 0 33.3333333%;
                flex: 0 0 33.3333333%;
                max-width: 33.3333333%
            }

            .single-info.bixbox .thumb {
                display: none
            }

            .single-info.bixbox .infox .infolimit {
                margin-right: 0
            }

            .single-info.bixbox .infox .rating {
                position: relative;
                display: inline-block;
                padding: 0;
                background: none !important;
                margin-bottom: 10px
            }

            .single-info.bixbox .infox .rating strong {
                display: none
            }
        }

        @media only screen and (max-width:670px) {
            .searchx.topcon {
                width: 77%
            }

            .stylefiv {
                float: none;
                width: auto
            }

            .taxindex li {
                width: 33.333333%
            }

            .newseason .listseries .card {
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%
            }

            .quickfilter .filters .filter ul li,
            .quickfilter .filters .filter ul.dropdown-menu.c1 li {
                width: 33.3333333%
            }

            .advancedsearch .quickfilter .filters .filter {
                width: 33.333333%
            }

            .advancedsearch .quickfilter .filters .filter.submit {
                width: 100%
            }

            .seventh .main-seven .tt .thethumb {
                display: none
            }
        }

        @media only screen and (max-width:650px) {
            .searchx {
                width: 81%
            }

            .searchx.topcon {
                width: 76%
            }

            .side.infomanga .imgprop {
                float: none;
                margin-right: 0;
                display: block
            }

            .side.infomanga .imgprop img {
                float: none;
                max-width: 190px;
                display: block;
                margin: 0 auto;
                margin-bottom: 10px;
                height: auto
            }

            .side.infomanga table.listinfo tr th {
                text-align: right
            }

            .genx {
                width: 50%
            }

            .kln a.col {
                width: auto;
                display: block;
                padding: 2px 0;
                float: none
            }

            .klnrec .mini {
                display: none
            }

            .klnrec .kln {
                float: none;
                width: auto;
                margin-right: 0
            }

            .klnrec .kln img,
            .klnrec .mini img {
                width: auto
            }

            .gnr {
                display: inline-block
            }

            tr.gnrx {
                display: none
            }

            tr.gnrx.shwgx {
                display: block
            }

            .slidtop .trending {
                display: none
            }

            .loop {
                float: none;
                width: 100% !important
            }

            .sebox .msebox .bigsebox .l img {
                height: 180px
            }

            .sebox .msebox .bigsebox .r .sinopsix {
                max-height: 180px
            }

            .stylesix .bsx .upscore {
                display: none
            }

            .stylesix .bsx .inf {
                margin: 0
            }

            .seventh {
                width: 50%
            }

            .bixbox.episodedl .epwrapper .navimedia {
                text-align: center
            }

            .bixbox.episodedl .epwrapper .navimedia .left,
            .bixbox.episodedl .epwrapper .navimedia .right {
                float: none;
                display: block;
                margin: 0 auto;
                margin-bottom: 7px
            }

            .bixbox.episodedl .epwrapper .navimedia .naveps {
                display: block;
                margin-bottom: 0;
                background: #f5f5f5;
                height: 32px;
                overflow: hidden
            }

            .cvlist .cvitem {
                float: none;
                width: auto;
                margin-bottom: 10px
            }
        }

        @media only screen and (max-width:590px) {
            .shme {
                width: 12%
            }

            .searchx {
                width: 76%
            }

            .searchx.topcon {
                width: 70%
            }

            .sosmed {
                clear: both;
                position: relative;
                display: block;
                overflow: hidden;
                margin-top: 15px;
                top: 0;
                text-align: center;
                width: 100%;
                bottom: 0
            }

            .mobius {
                overflow: hidden;
                display: block
            }

            .iconx {
                float: right
            }

            .iconx .icol {
                margin: 0
            }

            .iconx .icol span {
                display: none
            }

            .naveps {
                float: none;
                padding: 0;
                margin: -15px;
                margin-top: 10px;
                overflow: hidden;
                position: relative;
                height: 38px
            }

            .naveps .nvs {
                display: block;
                width: 33.33333333%;
                text-align: center;
                min-height: 1px
            }

            .naveps .nvs.nvsc {
                margin: 0
            }

            .naveps .nvs a {
                border-radius: 0;
                padding: 8px 0
            }

            .slide-content .title a {
                font-size: 16px
            }

            .sebox {
                float: none;
                width: auto
            }

            .sebox .msebox .bigsebox .l img {
                height: auto
            }

            .sebox .msebox .bigsebox .r .sinopsix {
                max-height: 300px
            }

            .bs.styletwo,
            .bs.styletere,
            .bs.styleegg {
                width: 50%
            }

            .stylefor {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%
            }

            .meta .year {
                margin: 0
            }

            .series-gen .nav-tabs li {
                width: 33.333333%
            }

            .series-gen .nav-tabs li:nth-child(3),
            .series-gen .nav-tabs li:nth-child(4) {
                display: none
            }

            .bloglist .blogbox {
                width: 50%
            }
        }

        @media only screen and (max-width:570px) {
            .postbody .ldr .outbx:last-child {
                display: none
            }

            .postbody .ldr .outbx {
                float: left;
                width: 25%
            }

            .archx .arche .inx span b {
                width: auto;
                float: none
            }

            .soralist ul li {
                margin-left: 15px;
                float: none;
                line-height: 21px;
                width: auto
            }

            .genres li {
                width: 43%
            }

            .bs {
                float: left;
                width: 33.333333%
            }

            .epcheck .ephead .eph-date,
            .bxcl ul li .epl-date {
                display: none
            }

            .bixbox.episodedl .epwrapper .epcontent .thumbnail img {
                max-width: 100% !important
            }
        }

        @media only screen and (max-width:500px) {
            .postbody .ldr .outbx {
                float: left;
                width: 50%
            }

            #overplay .chain {
                max-width: 50%;
                padding-top: 25px
            }

            .listupd .lexa .thumb {
                float: none;
                overflow: hidden;
                width: 100%;
                max-height: unset;
                margin-right: 0
            }

            .listupd .lexa .thumb img {
                max-width: unset;
                height: auto;
                width: 100%
            }

            .gov-multipart .gov-mr-host {
                width: 25%
            }

            .gov-multipart .gov-all-host {
                width: 75%
            }

            .taxindex li {
                width: 50%
            }

            .newseason .listseries .card .card-box .card-thumb {
                max-width: 125px;
                height: 170px
            }

            .newseason .listseries .card .card-box .card-info .card-info-top {
                height: 138px
            }

            .quickfilter .filters .filter ul li,
            .quickfilter .filters .filter ul.dropdown-menu.c1 li {
                width: 50%
            }

            .naveps.bignav .nvs .tex {
                display: none
            }

            .searchx {
                width: 74%
            }

            .searchx.topcon {
                width: 67%
            }

            .stylenine .bsx .thumb {
                float: none !important;
                max-width: 100%;
                max-height: unset;
                padding-top: 50%;
                margin: 0 !important
            }

            .stylenine .bsx .thumb img {
                width: 100%;
                position: absolute;
                top: 0
            }

            .advancedsearch .quickfilter .filters .filter ul.dropdown-menu.c1 li {
                width: 33.3333333%
            }
        }

        @media only screen and (max-width:450px) {
            .bs {
                float: left;
                width: 50%
            }

            .advancedsearch .quickfilter .filters .filter {
                width: 50%
            }

            .lastend .inepcx a span {
                font-size: 14px
            }

            .lastend .inepcx a span.epcur {
                font-size: 18px
            }
        }

        @media only screen and (max-width:400px) {
            .bigcontent .infox .spe span {
                float: none;
                width: auto;
                display: block
            }

            .seventh,
            .bloglist .blogbox {
                float: none;
                width: 100%
            }

            .single-info.bixbox .infox .spe span {
                width: auto;
                float: none !important;
                display: block
            }

            .bigcontent .infox .spe {
                column-count: 1
            }
        }

        @media only screen and (max-width:375px) {
            .searchx.topcon {
                width: 60%
            }

            .advancedsearch .quickfilter .filters .filter ul.dropdown-menu.c1 li {
                width: 50%
            }
        }

        @media only screen and (max-width:320px) {
            .searchx.topcon {
                width: 57%
            }
        }

        @media only screen and (max-width:260px) {
            .advancedsearch .quickfilter .filters .filter ul.dropdown-menu.c1 li {
                width: auto;
                float: none
            }
        }

        .darkmode {
            background: #16151d;
            color: #ccc
        }

        .darkmode .th {
            background: #0b0a0d
        }

        .darkmode #thememode .xt {
            color: #fff
        }

        .darkmode .taxindex li a {
            background: #333 !important;
            color: #999;
            font-weight: 500
        }

        .darkmode .taxindex li a span.count {
            color: #727579;
            font-weight: 400
        }

        .darkmode .taxindex li a:hover {
            color: #FFF !important;
            background: #0c70de !important
        }

        .darkmode .taxindex li a:hover span.count {
            color: rgba(255, 255, 255, .5)
        }

        .darkmode .searchx #form #s {
            color: #fff;
            background-color: #17151b;
            background-image: none;
            border: 1px solid #23202a;
            border-radius: 3px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
        }

        .darkmode .searchx #form #submit {
            color: #555
        }

        .darkmode #live-search_results {
            background: #1a1920;
            -webkit-box-shadow: 0 4px 20px #000;
            -khtml-box-shadow: 0 4px 20px #000;
            -moz-box-shadow: 0 4px 20px #000;
            -ms-box-shadow: 0 4px 20px #000;
            -o-box-shadow: 0 4px 20px #000;
            box-shadow: 0 4px 20px #000
        }

        .darkmode .live-search_result_container li {
            border-bottom: 1px solid #262432
        }

        .darkmode .live-search_result_container .post-thumbnail {
            background: 0 0
        }

        .darkmode .live-search_result_container .over span {
            color: #777
        }

        .darkmode .live-search_result_container li a {
            color: #c2c2c2
        }

        .darkmode .live-search_result_container li:hover {
            background: #1f1d26
        }

        .darkmode #top-menu.topmobshow {
            background: #222;
            box-shadow: 1px 3px 8px rgba(0, 0, 0, .65)
        }

        .darkmode #sidebar .section {
            background: #222;
            -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -khtml-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -ms-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -o-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            box-shadow: 0 2px 3px rgba(0, 0, 0, .1)
        }

        .darkmode .releases h1,
        .darkmode .releases h2,
        .darkmode .releases h3,
        .darkmode #sidebar .section h3,
        .darkmode .releases h4,
        .darkmode #sidebar .section h4 {
            color: #fff
        }

        .darkmode .releases {
            border-bottom: 1px solid #312f40
        }

        .darkmode .rating-prc .rtp .rtb:before {
            color: #555
        }

        .darkmode #gallery.owl-loaded .owl-dots span {
            background: #555
        }

        .darkmode .serieslist ul li {
            border-bottom: 1px solid #383838
        }

        .darkmode .serieslist ul li .ctr {
            color: #888;
            border: .5px solid #888
        }

        .darkmode .serieslist ul li .imgseries {
            background: 0 0
        }

        .darkmode a,
        .darkmode .meta h1,
        .darkmode .single-info.bixbox .infox .infolimit h2 {
            color: #fff
        }

        .darkmode .meta .epx {
            color: #999
        }

        .darkmode #sidebar .section ul.genre:before,
        .darkmode #sidebar .section ul.genre:after {
            background: #262432
        }

        .darkmode .bixbox {
            background: #222;
            -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -khtml-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -moz-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -ms-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            -o-box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            color: #ccc
        }

        .darkmode .hpage a {
            color: #fff
        }

        .darkmode .advancedsearch .lbx {
            padding: 10px 0;
            background: 0 0;
            border: 0
        }

        .darkmode .advancedsearch tr .inputx {
            background: #16151d;
            color: #fff;
            border: 1px solid #16151d
        }

        .darkmode .checkmarkx {
            background-color: #282635
        }

        .darkmode .checkmark {
            background-color: #282635
        }

        .darkmode .pagination a {
            background: #333
        }

        .darkmode .surprise {
            color: #fff
        }

        .darkmode .surprise:hover {
            color: #333;
            background: #fff
        }

        .darkmode .nav_apb a {
            background: #333
        }

        .darkmode .nav_apb a:hover {
            background: #111;
            color: #fff
        }

        .darkmode .soralist span {
            border-bottom: 1px solid #312f40
        }

        .darkmode .soralist ul {
            color: #223a65
        }

        .darkmode .animefull .bigcover a.gp {
            border: 0
        }

        .darkmode .bigcontent .rt .rating,
        .darkmode .single-info.bixbox .infox .rating {
            background: #111
        }

        .darkmode .bigcontent .thumb {
            border: 4px solid #141219
        }

        .darkmode .animefull .bottom {
            border-top: 1px solid #312f40
        }

        .darkmode .bottom.tags a {
            background: #111;
            border-color: #333
        }

        .darkmode .bxcl ul::-webkit-scrollbar-track,
        .darkmode .quickfilter .filters .filter .scrollz::-webkit-scrollbar-track {
            background: #111
        }

        .darkmode .bxcl ul li {
            border-bottom: 1px solid #262432
        }

        .darkmode .bxcl ul li span.dt a {
            background: #223a65;
            color: #fff
        }

        .darkmode .bxcl ul li span.dt a .dashicons {
            color: #fff
        }

        .darkmode .megavid {
            box-shadow: 0 3px 0 0 #0f0f0f
        }

        .darkmode .item {
            background: #222
        }

        .darkmode .naveps .nvs a {
            background: #333;
            color: #fff
        }

        .darkmode .naveps .nvsc a {
            background: #0c70de
        }

        .darkmode .iconx a {
            color: #f05252
        }

        .darkmode .iconx a:hover {
            color: #fff
        }

        .darkmode .naveps.bignav .nvs a {
            background: #222;
            color: #ccc;
            box-shadow: 0 3px 0 0 #0f0f0f
        }

        .darkmode .naveps.bignav .nvs a:hover {
            color: #fff;
            background: #333
        }

        .darkmode .naveps.bignav .nvs .nolink {
            background: #0d0d0d;
            color: #666;
            cursor: default
        }

        .darkmode .meta {
            box-shadow: 0 3px 0 0 #0f0f0f
        }

        .darkmode .meta .epx .lg {
            background: #474747;
            color: #ddd
        }

        .darkmode select.mirror {
            border: 1px solid #303030;
            color: #ddd;
            background: #333
        }

        .darkmode .lista {
            background: 0 0;
            border-bottom: 0
        }

        .darkmode .lista a {
            border: 1px solid #0c70de;
            background: #0c70de;
            color: #fff
        }

        .darkmode .lista a:hover {
            background: 0 0
        }

        .darkmode .listo .bx .imgx {
            background: 0 0
        }

        .darkmode .listo {
            color: #999
        }

        .darkmode .listo .bx {
            border-bottom: 1px solid #262432
        }

        .darkmode #main-menu ul li ul {
            background: #1d1b26
        }

        .darkmode #main-menu ul li ul li a {
            color: #ddd
        }

        .darkmode #main-menu ul li ul li a:hover {
            color: #fff;
            background: #2d2a3a
        }

        .darkmode .commentx h3 {
            color: #919191
        }

        .darkmode .commentx .commentlist li {
            border-bottom: 1px solid #262432
        }

        .darkmode .commentx textarea,
        .darkmode .commentx #respond input[type=text] {
            border: 1px solid #16151d;
            color: #fff;
            background: #16151d;
            box-shadow: none
        }

        .darkmode .comment-list>li,
        .darkmode .comment-list .children {
            border-color: #312f40
        }

        .darkmode .comment-list>li:hover {
            box-shadow: 0 0 8px 0 rgba(0, 0, 0, .42)
        }

        .darkmode .page {
            color: #ddd
        }

        .darkmode blockquote,
        .darkmode q {
            background: #303030;
            border-left: 3px solid #4f4f4f
        }

        .darkmode #sidebar .section>ul>li {
            border-bottom: 1px solid #262432
        }

        .darkmode .gov-multipart>div {
            border-bottom: 1px solid #262432
        }

        .darkmode .gov-multipart .gov-mr-host {
            color: #c2c2c2
        }

        .darkmode .gov-multipart .gov-the-embed {
            background-color: #2d2a3a;
            color: #c2c2c2;
            border-bottom: 3px solid #100f15
        }

        .darkmode .gov-multipart .gov-the-embed:hover {
            background-color: #3f3b51;
            border-bottom: 3px solid #100f15
        }

        .darkmode .bixbox.infx.singleinfo .navepsx {
            background: #1d1b26;
            border-bottom: 1px solid #343243
        }

        .darkmode .bixbox.infx.singleinfo .navepsx .nvs.nvsc a {
            border-color: #343243
        }

        .darkmode .bixbox.infx.singleinfo {
            color: inherit
        }

        .darkmode .bixbox.infx.singleinfo .navepsx .nvs a:hover {
            background: #181720
        }

        .darkmode .bixbox.infx.singleinfo ul li {
            background-color: #2b2936
        }

        .darkmode .dlbox ul li {
            border-color: #2b2936;
            color: #fff
        }

        .darkmode .dlbox ul li:nth-child(even) {
            background: #191919
        }

        .darkmode .dlbox ul li span a:hover {
            color: #fff
        }

        .darkmode .single-info.bixbox .infox .desc.mindes .colap {
            background: #333;
            color: #999;
            border: 1px solid #444
        }

        .darkmode .sebox .msebox {
            border-color: #333
        }

        .darkmode .sebox .msebox .headsebox .minsebox {
            background: #2f2b3a
        }

        .darkmode .sebox .msebox .headsebox .minsebox span {
            border-color: #494949
        }

        .darkmode .sebox .msebox .headsebox .gesebox {
            border-color: #333;
            background: #201d2a
        }

        .darkmode .sebox .msebox .headsebox .gesebox a {
            background: #363345;
            border-color: #363345;
            color: #999
        }

        .darkmode .sebox .msebox .footsebox {
            border-color: #333;
            background: #2f2b3a;
            color: #999
        }

        .darkmode .naveps.bignav .nvs.nvsc a {
            background: #0c70de;
            color: #fff
        }

        .darkmode .ntf {
            background: #333;
            color: #ccc
        }

        .darkmode .soraddlx .soraurlx {
            background: #333
        }

        .darkmode .soraddlx a:after {
            color: #555
        }

        .darkmode .series-gen .nav-tabs {
            background: #333
        }

        .darkmode .bloglist .blogbox .innerblog .infoblog .entry-content {
            color: #999
        }

        .darkmode .tooltip .detail .rating {
            background: #111
        }

        .darkmode #sidebar .section ul.season::-webkit-scrollbar-track {
            background: #0e0e0e
        }

        .darkmode #sidebar .section .ongoingseries ul li {
            border-bottom: 1px solid #262432
        }

        .darkmode #sidebar .section .ongoingseries ul li:hover {
            background: #333
        }

        .darkmode #sidebar .section .ongoingseries ul li a .l .dashicons {
            color: #1d1b26
        }

        .darkmode #sidebar .section .ts-wpop-series-gen .ts-wpop-nav-tabs {
            background: #333
        }

        .darkmode .bigcontent .infox a,
        .darkmode .animefull .bottom a,
        .darkmode .single-info.bixbox .infox .genxed a {
            color: #ccc
        }

        .darkmode .bigcontent .infox a:hover,
        .darkmode .animefull .bottom a:hover,
        .darkmode .single-info.bixbox .infox .genxed a:hover {
            color: #fff
        }

        .darkmode .bigcontent .infox h1 {
            color: #fff
        }

        .darkmode .stylefiv .bsx .inf span {
            color: #999
        }

        .darkmode #footer {
            background: #222;
            color: #ccc
        }

        .darkmode a:hover {
            color: #0c70de
        }

        .darkmode .footer-az span.ftaz {
            border-right: 1px solid rgba(255, 255, 255, .3)
        }

        .darkmode .quickfilter .filters .filter button {
            background-color: #333;
            border-color: #333;
            color: #ccc
        }

        .darkmode .quickfilter .filters .filter ul {
            background: #333
        }

        .darkmode .quickfilter .filters .filter ul li input+label:before,
        .darkmode .quickfilter .filters .filter ul li input:not(:checked)+label:before {
            background-color: #5d5d5d
        }

        .darkmode .quickfilter .filters .filter ul label {
            color: #ccc
        }

        .darkmode .quickfilter .filters .filter.submit button {
            background: #0c70de;
            color: #fff
        }

        .darkmode .qtip-default {
            box-shadow: 0 1px 5px #000
        }

        .darkmode .qtip-default a {
            color: #999
        }

        .darkmode .releases.latesthome .vl {
            background: #222;
            color: #fff
        }

        .darkmode .stylesix {
            border-bottom: 1px solid #383838
        }

        .darkmode .seventh .main-seven .tt .sosev span {
            color: #999
        }

        .darkmode .seventh .main-seven .tt .sosev span a {
            color: #999
        }

        .darkmode .stylenine {
            border-color: #383838
        }

        .darkmode .stylenine .bsx .inf {
            background: #333
        }

        .darkmode .stylenine .bsx .inf span a {
            color: #a6abb6
        }

        .darkmode .stylenine .bsx .inf span a:hover {
            color: #fff
        }

        .darkmode .newseason .listseries .card .card-box {
            background: #222
        }

        .darkmode .newseason .listseries .card .card-box .card-info .card-info-top .stats .right {
            background: #333;
            color: #999
        }

        .darkmode .newseason .listseries .card .card-box .card-info .card-info-top .stats .left span {
            color: #999
        }

        .darkmode .newseason .listseries .card .card-box .card-info .card-info-top .desc {
            color: #999
        }

        .darkmode .newseason .listseries .card .card-box .card-info-bottom {
            background: #333
        }

        .darkmode .newseason .listseries .card .card-box .card-info .card-info-top::-webkit-scrollbar-thumb {
            background: rgba(116, 115, 115, .46)
        }

        .darkmode .bixbox.episodedl .epwrapper .epheader h1 {
            color: #fff
        }

        .darkmode .bixbox.episodedl .epwrapper .epheader .entry-info {
            color: #ccc
        }

        .darkmode .bixbox.episodedl .epwrapper .epheader {
            border-bottom: 1px solid #333
        }

        .darkmode .bixbox.episodedl .notice {
            background: #333;
            color: #999
        }

        .darkmode .bigcontent .infox .alter {
            color: #ccc
        }

        .darkmode .bigcontent .infox .desc {
            color: #ccc
        }

        .darkmode .epcheck .ephead {
            color: #fff;
            border-bottom: 1px solid #262432
        }

        .darkmode .bxcl ul li:nth-child(odd) {
            background: #191919
        }

        .darkmode .bxcl ul li:hover {
            background: #0c70de
        }

        .darkmode hr {
            border-color: #535353
        }

        .darkmode .bs.styleegg .bsx .egghead {
            background: rgba(48, 57, 73, .9)
        }

        .darkmode .bigcontent .infox .spe span a:hover {
            color: #fff
        }

        .darkmode .cvlist .cvitem .cvitempad {
            background: #333
        }

        .darkmode .post-nav-links .current {
            background: #333 !important
        }

        @media only screen and (max-width:800px) {
            .darkmode .th {
                background: #0c70de
            }
        }

        @media only screen and (max-width:650px) {
            .darkmode .bixbox.episodedl .epwrapper .navimedia .naveps {
                background: #333
            }
        }

        #pembed .wp-video {
            width: 100% !important
        }

        #pembed .wp-video .mejs-container {
            width: 100% !important
        }

        @media only screen and (max-width:570px) {

            #floatcenter,
            #teaser1,
            #teaser2,
            #teaser3 {
                display: none
            }
        }

        .loading {
            background: transparent url('<?= $config["url"] ?>assets/img/loading.gif') center no-repeat;
        }

        .external::before {
            content: "↵ ";
        }

        /*]]>*/
    </style>

    <link rel='stylesheet' id='dashicons-css' href='<?= $config["url"] ?>assets/mono/css/dashicons.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='fontawesome-css' href='<?= $config["url"] ?>assets/mono/css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-css' href='<?= $config["url"] ?>assets/mono/css/owl.carousel.css' type='text/css' media='all' />
    <link rel='stylesheet' src='<?= $config["url"] ?>assets/mono/more/tabs.css' id='tabs-js'>
    <link rel='stylesheet' src='<?= $config["url"] ?>assets/mono/more/group.css' id='tabs-js'>
    <link rel='stylesheet' id='qtip-css' href='<?= $config["url"] ?>assets/mono/css/jquery.qtip.min.css' type='text/css' media='all' />

    <!-- <script type='text/javascript' src='<?= $config["url"] ?>assets/mono/js/jquery.min.js' id='jquery-js'></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type='text/javascript' src='<?= $config["url"] ?>assets/mono/js/tabs.js' id='tabs-js'></script>
    <script type='text/javascript' src='<?= $config["url"] ?>assets/mono/more/tabs.js' id='tabs-js'></script>
    <script type='text/javascript' src='<?= $config["url"] ?>assets/mono/more/group.js' id='tabs-js'></script>


    <script>
        var defaultTheme = "darkmode";
    </script>
    <script>
        $(document).ready(function() {
            $(".shme").click(function() {
                $(".mm").toggleClass("shwx");
            });
            $(".expand").click(function() {
                $(".megavid").toggleClass("xp");
                $(".pd-expand").toggleClass("sxp");
            });
            $('.expand').click(function() {
                if ($('.expand').hasClass('slamdown')) {
                    $('.expand').removeClass('slamdown');
                    jQuery(".mvelement").prependTo(jQuery(".megavid"));
                } else {
                    $('.expand').addClass('slamdown');
                    jQuery(".mvelement").appendTo(jQuery(".pd-expand"));
                }
            });
            $(".gnr").click(function() {
                $(".gnrx").toggleClass("shwgx");
            });
            $(".light").click(function() {
                $(".lowvid").toggleClass("highvid");
            });
            $(".colap").click(function() {
                $(".mindes").toggleClass("alldes");
            });
            $(".topmobile").click(function() {
                $(".topmobcon").toggleClass("topmobshow");
            });
            $(".toggler").click(function() {
                $(".inmenu").toggleClass("inmshow");
            });
            $(".twoscmob").click(function() {
                $(".searchdesk").toggleClass("searchmobi");
            });
        });
    </script>
    <script type='text/javascript'>
        /*<![CDATA[*/ //
        $(document).ready(function() {
            $("#shadow").css("height", $(document).height()).hide();
            $(".light").click(function() {
                $("#shadow").toggle();
                if ($("#shadow").is(":hidden"))
                    $(this).html("<i class='far fa-lightbulb' aria-hidden='true'></i> <span>Turn Off Light</span>").removeClass("turnedOff");
                else
                    $(this).html("<i class='fas fa-lightbulb' aria-hidden='true'></i> <span>Turn On Light</span>").addClass("turnedOff");
            });

        });
        ///*]]>*/
    </script>