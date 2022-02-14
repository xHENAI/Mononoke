<?php

// install/index.php - Mononoke

if(empty($_GET["step"])) {
    header("location: ?step=1");
}

$step = $_GET["step"];
$output_title = "";
$output = "";

if($step==1) {
    $output_title = "Welcome";
    $output .= 'to the Mononoke, an open source Anime-Content-Management-System and Forum.';
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
            max-width: 1100px;
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
        }

        .content .title {
            margin-top: -23px;
            width: 50px;
            padding-top: 5px;
            padding-left: 5px;
            padding-right: 5px;
            background: white;
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
