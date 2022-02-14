<?php

// install/index.php - Mononoke

session_start();

if(empty($_GET["step"])) {
    header("location: ?step=1");
}

$step = $_GET["step"];
$output = "";

if($step==1) {
    $output .= '<p>Welcome to Mononoke, an open source Anime-Content-Management-System and Forum.<br>In this small installation, you will get to install it.<br>What you need:';
    $output .= '<ul>';
    $output .= '<li>A MySQL Database and its login data for an account</li>';
    $output .= '<li>A keyboard and a cat, just for fun since cats are <3</li>';
    $output .= '</ul>';
    $output .= '<a href="?step=2" class="button">Begin Installation</a></p>';
}

if($step==2) {
    $output .= '<form method="post" action="" name="connect_database">';
    $output .= '<div class="label"><label for="mysql_host">MySQL Host</label></div> <input class="input" name="mysql_host" id="mysql_host" required placeholder="e.g: localhost">';
    $output .= '<div class="label"><label for="mysql_user">MySQL User</label></div> <input class="input" name="mysql_user" id="mysql_user" required placeholder="e.g: root">';
    $output .= '<div class="label"><label for="mysql_pass">MySQL Password</label></div> <input class="input" name="mysql_pass" id="mysql_pass" placeholder="e.g: root">';
    $output .= '<div class="label"><label for="mysql_tale">MySQL Table</label></div> <input class="input" name="mysql_tale" id="mysql_tale" required placeholder="e.g: mononoke">';
    $output .= '<button class="button" type="submit" name="connect_database">Connect to Database!</button>';
    $output .= '</form>';
}

if(isset($_POST["connect_database"])) {
    $conn = new mysqli($_POST["mysql_host"], $_POST["mysql_user"], $_POST["mysql_pass"], $_POST["mysql_tale"]);
    if ($conn->connect_error) {
        die("Couldn't connect to Database: " . $conn->connect_error . " - You should go back and try again. If you are 100% sure you did everything right, please open an issue on GitHub.");
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
        header("location: ?step=3");
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Step <?= $step ?> - Install Mononoke <?php include("../version.txt") ?></title>
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
            width: 20%;
        }
        
        .input {
            width: 100%;
        }

    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BioRhyme:wght@300&display=swap" rel="stylesheet">

</head>

<body>

    <div class="heading">

        <h3 class="title">Mononoke <?php include("../version.txt") ?> - Automatic installer [BETA]</h3>

    </div>

    <br>

    <div class="content">

        <div class="title"><b>Step <?= $step ?></b></div>

        <?= $output ?>

    </div>

    <br>

    <div class="heading">

        <h3 class="title">Copyright &copy; 2021-<?= date("Y") ?> Selim B, The H33T.moe Project and HENAI.eu - <a href="https://github.com/xHENAI/Mononoke" target="_blank">GitHub</a></h3>

    </div>

</body>

</html>
