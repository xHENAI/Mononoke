<?php

// install/index.php - Mononoke

session_start();

if(file_exists("../installed")) {
    die("What're you trying to do? Setup your site again?");
}

if(empty($_GET["step"])) {
    header("location: ?step=1");
}

$step = $_GET["step"];

if(file_exists("../config.php") && $step!=5 && $step!=4 && $step!=3) {
    header("location: ?step=5");
}

$output = "";
$error = false;
$error_msg = "";

if(isset($_POST["connect_database"])) {
    $conn = new mysqli($_POST["mysql_host"], $_POST["mysql_user"], $_POST["mysql_pass"], $_POST["mysql_tale"]);
    if ($conn->connect_error) {
        die("Konnte keine Verbindung mit der Datenbank herstellen: " . $conn->connect_error . " - Du solltest zurück gehen und die Felder erneut asufüllen. Sollte das Problem weiterhin bestehen, erstelle eine Issue auf GitHub.");
    } else {
        $mysql_host = $_POST["mysql_host"];
        $mysql_user = $_POST["mysql_user"];
        $mysql_pass = $_POST["mysql_pass"];
        $mysql_tale = $_POST["mysql_tale"];
        $conn->set_charset("utf8mb4");
        // https://stackoverflow.com/questions/19751354/how-do-i-import-a-sql-file-in-mysql-database-using-php Thx!
        $filename = 'mononoke.sql';
        $templine = '';
        $lines = file($filename);
        foreach ($lines as $line) {
            if (substr($line, 0, 2) == '--' || $line == '')continue;
            $templine .= $line;
            if (substr(trim($line), -1, 1) == ';') {
                $conn->query($templine);
                $templine = '';
            }
        }
        header("location: ?step=3&host=$mysql_host&user=$mysql_user&pass=$mysql_pass&tale=$mysql_tale");
    }
}

if(isset($_POST["setup_site"])) {
    $mysql_host = $_GET["host"];
    $mysql_user = $_GET["user"];
    $mysql_pass = $_GET["pass"];
    $mysql_tale = $_GET["tale"];
    $site_name = $_POST["site_name"];
    $site_url = $_POST["site_url"];
    $site_theme = $_POST["site_theme"];
    $site_signup = $_POST["site_signup"];
    $site_email = $_POST["site_email"];
    $site_private = $_POST["site_private"];
    $site_cookie = $_POST["site_cookie"];
    $site_domain = $_POST["site_domain"];
    $site_lang = $_POST["site_lang"];
    $file = fopen('config.php', 'w');
    fwrite($file, "<?php\n\n");
    fwrite($file, "// config.php - Mononoke\n\n");
    fwrite($file, "/* General configuration */\n\n");
    fwrite($file, "\$config[\"name\"] = \"$site_name\"; // Name that will be shown in Title and menu (if no picture)\n");
    fwrite($file, "\$config[\"picture\"] = \"\"; // Picure that will be shown in menu (leave empty for name only)\n");
    fwrite($file, "\$config[\"url\"] = \"$site_url\"; // Full URL to page, needs to end with a slash!\n");
    fwrite($file, "\$config[\"theme\"] = \"$site_theme\"; // Default Theme - Located in /scripts/bootstrap/css/bootstrap.[theme].css\n");
    fwrite($file, "\$config[\"registration\"] = $site_signup; // true = people can signup, false = people can't\n");
    fwrite($file, "\$config[\"email\"] = \"$site_email\"; // Contact eMail (leave blank for none)\n");
    fwrite($file, "\$config[\"private\"] = $site_private; // true = you need to be logged in, false = everyone can view Anime etc.\n");
    fwrite($file, "\$config[\"cookie\"] = \"$site_cookie\"; // Cookie prefix, you SHOULD change this! Should end with underscore_\n");
    fwrite($file, "\$config[\"domain\"] = \"$site_domain\"; // For cookies, the domain only, no https and folder\n");
    fwrite($file, "\$config[\"lang\"] = \"$site_lang\"; // Languages are located in /langs/\n\n");
    fwrite($file, "/* MySQL configuration */\n\n");
    fwrite($file, "\$slave[\"host\"] = \"$mysql_host\"; // MySQL Host\n");
    fwrite($file, "\$slave[\"user\"] = \"$mysql_user\"; // Username for MySQL\n");
    fwrite($file, "\$slave[\"pass\"] = \"$mysql_pass\"; // Password for User\n");
    fwrite($file, "\$slave[\"tale\"] = \"$mysql_tale\"; // MySQL Table\n");
    fclose($file);
    $before = "config.php";
    $after = "../config.php";
    rename($before, $after);
    chmod($after, 0777);
    header("location: ?step=4&host=$mysql_host&user=$mysql_user&pass=$mysql_pass&tale=$mysql_tale&mail=$site_email&url=$site_url&theme=$site_theme&lang=$site_lang");
}

if(isset($_POST["insert_user"])) {
    $admin_username = $_POST["admin_username"];
    $admin_password1 = $_POST["admin_password"];
    $admin_password2 = $_POST["admin_password2"];
    $admin_email = $_GET["mail"];
    $site_url = $_GET["url"];
    $site_theme = $_GET["theme"];
    $site_lang = $_GET["lang"];
    $conn = new mysqli($_GET["host"], $_GET["user"], $_GET["pass"], $_GET["tale"]);
    if($admin_password1!==$admin_password2) {
        $error = true;
        $error_msg = "Passwörter stimmen nicht überein!";
    }
    if($error==false) {
        $admin_password = password_hash($admin_password1, PASSWORD_BCRYPT);
        $conn->query("INSERT INTO `user`(`level`,`username`,`password`,`email`,`image`,`theme`,`lang`,`public_profile`,`public_watchlist`,`read_announce`,`forum_signature`) VALUES('0','$admin_username','$admin_password','$admin_email','".$site_url."assets/img/default.jpeg','".$site_theme."','".$site_lang."','1','0','0',NULL)");
    }
    header("location: ?step=5");
}

if($step==1) {
    $output .= '<p>Wilkommen zu Mononoke, ein Open-Source Anime-Content-Management-Syste,, Streaming Seite und Forum.<br>In dieser kleinen Anleitung, wirst du es installieren.<br>Was du brauchst:';
    $output .= '<ul>';
    $output .= '<li>Eine MySQL Datenbank und die dazugehörigen Anmelde-Daten</li>';
    $output .= '<li>Eine Tastatur und eine Katze denn die sind wirklich <3< /li>';
    $output .= '</ul>';
    $output .= '<a href="?step=2" class="button">Installation beginnen!</a></p>';
}

if($step==2) {
    $output .= '<form method="post" action="" name="connect_database">';
    $output .= '<div class="label"><label for="mysql_host">MySQL Host</label></div> <input type="text" class="input" name="mysql_host" id="mysql_host" required placeholder="z.B: localhost">';
    $output .= '<div class="label"><label for="mysql_user">MySQL Nutzer</label></div> <input type="text" class="input" name="mysql_user" id="mysql_user" required placeholder="z.B: root">';
    $output .= '<div class="label"><label for="mysql_pass">MySQL Passwort</label></div> <input type="text" class="input" name="mysql_pass" id="mysql_pass" placeholder="z.B: root">';
    $output .= '<div class="label"><label for="mysql_tale">MySQL Tabelle</label></div> <input type="text" class="input" name="mysql_tale" id="mysql_tale" required placeholder="z.B: mononoke">';
    $output .= '<button class="button" type="submit" name="connect_database">Zur Datenbank verbinden!</button>';
    $output .= '</form>';
}

if($step==3) {
    $output .= '<form method="post" action="" name="setup_site">';
    $output .= '<div class="label"><label for="site_name">Seiten Name</label></div> <input type="text" class="input" name="site_name" id="site_name" required placeholder="z.B: Mononoke">';
    $output .= '<div class="label"><label for="site_url">Ganze URL zur Seite (MUSS mit einem Schrägstrich enden!)</label></div> <input type="text" class="input" name="site_url" id="site_url" required placeholder="z.B: https://deineseite.de/Mononoke/">';
    // Select Theme begin
    $output .= '<div class="label"><label for="site_theme">Standard Theme</label></div> <select type="number" class="input" name="site_theme" id="site_theme" required>';
    $output .= '<option value="0">Bootstrap Light</option>';
    $output .= '<option selected value="1">Cerulean Light</option>';
    $output .= '<option value="2">Bootstrap Dark</option>';
    $output .= '<option value="3">Cyborg Dark</option>';
    $output .= '<option value="4">Darkly Dark</option>';
    $output .= '</select>';
    // Select Theme end
    // Select Registration begin
    $output .= '<div class="label"><label for="site_signup">Registrierungen erlaubt</label></div> <select class="input" name="site_signup" id="site_signup" required>';
    $output .= '<option value="false">Registrierungen geschlossen (niemand kann sich registrieren)</option>';
    $output .= '<option selected value="true">Registrierungen offen (jeder kann sich registrieren)</option>';
    $output .= '</select>';
    // Select Registration end
    $output .= '<div class="label"><label for="site_email">Administrations eMail (muss gültig sein!)</label></div> <input type="text" class="input" name="site_email" id="site_email" required placeholder="z.B: admin@deineseite.de">';
    // Select Private begin
    $output .= '<div class="label"><label for="site_private">Sichtbarkeit des Inhaltes</label></div> <select class="input" name="site_private" id="site_private" required>';
    $output .= '<option value="true">Seite Privat (Nur angemeldete Nutzer können die Inhalte sehen)</option>';
    $output .= '<option selected value="false">Seite Öffentlich (Jeder kann alle Inhalte (außer das Forum) sehen)</option>';
    $output .= '</select>';
    // Select Private end
    $output .= '<div class="label"><label for="site_cookie">Cookie Prefix (sollte mit einem Unterstrich_ enden)</label></div> <input type="text" class="input" name="site_cookie" id="site_cookie" required placeholder="z.B: deineseite_">';
    $output .= '<div class="label"><label for="site_domain">Cookie Domain (für die beste Sicherheit, muss ohne https oder so sein und ohne Schrägstrich)</label></div> <input type="text" class="input" name="site_domain" id="site_domain" required placeholder="z.B: deineseite.de">';
    // Select Language begin
    $output .= '<div class="label"><label for="site_lang">Standard Sprache</label></div> <select class="input" name="site_lang" id="site_lang" required>';
    $output .= '<option value="en-us">Englisch/English</option>';
    $output .= '<option selected value="de-de">Deutsch</option>';
    $output .= '</select>';
    // Select Language end
    $output .= '<button class="button" type="submit" name="setup_site">Fast geschafft!</button>';
    $output .= '</form>';
}

if($step==4) {
    $output .= '<form method="post" action="" name="insert_user">';
    $output .= '<div class="label"><label for="admin_username">Administrator Nutzername</label></div> <input type="text" class="input" minlength="3" maxlength="50" name="admin_username" id="admin_username" required placeholder="z.B: admin">';
    $output .= '<div class="label"><label for="admin_password">Administrator Passwort</label></div> <input type="password" class="input" minlength="8" maxlength="100" name="admin_password" id="admin_password" required placeholder="z.B: supergeheimespasswort69">';
    $output .= '<div class="label"><label for="admin_password2">Administrator Passwort Wiederholen</label></div> <input type="password" class="input" minlength="8" maxlength="100" name="admin_password2" id="admin_password2" required placeholder="Wiederhol einfach das obrige Passwort nochmal">';
    $output .= '<div class="label">Als eMail wird die eben angebene eMail benutzt, dies kann später geändert werden.</div>';
    $output .= '<button class="button" type="submit" name="insert_user">Account erstellen und das System endlich benutzen!</button>';
    if($error==true) {
        $output .= '<div class="label" style="color:red">'.$error_msg.'</div>';
    }
    $output .= '</form>';
}

if($step==5) {
    $output .= '<p>Alles klar! Mononoke ist installiert, das einzige was du jetzt noch machen musst, ist die Datenbank mit Animes füllen :D<br>';
    $output .= 'Klicke einfach nur den Button unten an um das System startklar zu machen. Logge dich einfach mit den soeben eingegebenen Daten ein und fange endlich an!<br>';
    $output .= 'Falls du währenddessen irgendwelche Probleme/Bugs/oder sonstiges erfahren/gesehen hast, zöger nicht und erstelle eine Issue auf GitHub, der Link dazu ist im Footer (ganz unten).<br>';
    $output .= 'Jetzt habe einfach Spaß :P<br><br>';
    $output .= '<a href="?step=6" class="button">Panel verschließen und System aktivieren!</a></p>';
}

if($step==6) {
    $file = fopen('installed', 'w');
    fclose($file);
    $before = "installed";
    $after = "../installed";
    rename($before, $after);
    chmod($after, 0777);
    header("location: ../signin");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Schritt <?= $step ?> - Install Mononoke <?php include("../version.txt") ?></title>
    <style>
        * {
            font-family: 'BioRhyme', serif;
        }

        body {
            width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }

        .heading {
            background: blue;
            color: white;
            padding: 10px;
        }

        .heading .title {
            font-size: 20px;
        }

        .heading a {
            color: aliceblue;
        }

        .content {
            border: 1px solid black;
            padding: 5px;
            padding-left: 10px;
            padding-right: 15px;
        }

        .content .title {
            margin-top: -23px;
            width: 60px;
            padding-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            background: white;
        }

        .button {
            padding: 5px;
            background: blue;
            color: white;
            margin: 2px;
            margin-bottom: 5px;
            text-decoration: none;
        }

        .label {
            width: 100%;
        }

        .input {
            width: 100%;
        }

    </style>

    <!--<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">-->

</head>

<body>

    <div class="heading">

        <h3 class="title"><a href="https://github.com/xHENAI/Mononoke" target="_blank">Mononoke</a> <?php include("../version.txt") ?> - Automatisches Installationsprogramm [BETA]</h3>

    </div>

    <br>

    <div class="content">

        <div class="title"><b>Schritt <?= $step ?></b></div>

        <?= $output ?>

    </div>

    <br>

    <div class="heading">

        <h3 class="title">Copyright &copy; 2021-<?= date("Y") ?> Selim B, Das H33T.moe Projekt und HENAI.eu - <a href="https://github.com/xHENAI/Mononoke" target="_blank">GitHub</a></h3>

    </div>

</body>

</html>
