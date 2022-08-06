<?php

require("config.example.php");
require("user.php");

$error = false;

if(extension_loaded("hash")==false) {
    $error = true;
    $e_hash = false;
} else {
    $e_hash = true;
}
if(extension_loaded("date")==false) {
    $error = true;
    $e_date = false;
} else {
    $e_date = true;
}
if(extension_loaded("json")==false) {
    $error = true;
    $e_json = false;
} else {
    $e_json = true;
}
if(extension_loaded("session")==false) {
    $error = true;
    $e_session = false;
} else {
    $e_session = true;
}
if(extension_loaded("zip")==false) {
    $error = true;
    $e_zip = false;
} else {
    $e_zip = true;
}
if(extension_loaded("dom")==false) {
    $error = true;
    $e_dom = false;
} else {
    $e_dom = true;
}
if(extension_loaded("curl")==false) {
    $error = true;
    $e_curl = false;
} else {
    $e_curl = true;
}
if(extension_loaded("gd")==false) {
    $error = true;
    $e_gd = false;
} else {
    $e_gd = true;
}
if(extension_loaded("mbstring")==false) {
    $error = true;
    $e_mbstring = false;
} else {
    $e_mbstring = true;
}
if(extension_loaded("mysqli")==false) {
    $error = true;
    $e_mysqli = false;
} else {
    $e_mysqli = true;
}

function ex($yo) {
    if($yo==true) {
        echo 'style="color:green;"';
    } else {
        echo 'style="color:red;"';
    }
}

if(isset($_GET["install"]) && $error = false) {    
    // Install altest archive
    $latest = file_get_contents("https://cdn.henai.eu/Mononoke/version.txt");
    $url = "https://cdn.henai.eu/Mononoke/versions/$latest/Mononoke-$latest.zip";
    $file_name = basename($url);
    if (file_put_contents($file_name, file_get_contents($url))) {
        echo "File downloaded successfully!\n";
        $error = false;
    } else {
        echo "File downloading failed...\n";
        $error = true;
    }
    
    if($error==false) {
        // Unzip it
        $zip = new ZipArchive;
        if ($zip->open("Mononoke-$latest.zip")===TRUE) {
            $zip->extractTo('./');
            $zip->close();
            echo "Unzipped Process Successful!\n";
        } else {
            echo "Unzipped Process failed\n";
        }

        // Rename edited config
        rename("config.example.php", "./core/config.php");
        rename("wp6600355.jpg", "./assets/images/lain.jpg");

        // Esthablish MySQL Connection
        require("./core/config.php");
        $conn = new mysqli($slave["host"], $slave["user"], $slave["pass"], $slave["tale"]);
        if ($conn -> connect_errno) {
            echo "Failed to rock MySQL: " . $conn -> connect_error;
            exit();
        }

        // Import Database - https://stackoverflow.com/questions/19751354/how-do-i-import-a-sql-file-in-mysql-database-using-php Thx!
        $filename = 'streamanime.sql';
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

        // Create Admin Account
        $password = password_hash($admin_password, PASSWORD_BCRYPT);
        $conn->query("INSERT INTO `user`(`username`,`password`,`image`,`level`,`banned`) VALUES('$admin_username','$password','https://cdn.henai.eu/assets/images/avatar.png','0','0')");

        // Cleanup
        unlink("streamanime.sql");
        unlink("Mononoke-$latest.zip");
        unlink("readme.txt");
        unlink("LICENSE");
        unlink("user.php");
        header("location: ./mnt/login");
    }
}

?>
<style>
    body {
        padding: 0;
        margin: 0;
        overflow: hidden;
        background: url("wp6600355.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        color: white;
    }

    ul {
        list-style: none;
    }
    
    h1 {
        text-align: center;
    }

</style>

<div style="width: 400px; margin-left: auto; margin-right: auto">
    <br><br><br><br><br><br><br><br><br><br><br>
    <ul>
        <li <?= ex($e_hash) ?>><code>hash</code> extension</li>
        <li <?= ex($e_date) ?>><code>date</code> extension</li>
        <li <?= ex($e_json) ?>><code>json</code> extension</li>
        <li <?= ex($e_session) ?>><code>session</code> extension</li>
        <li <?= ex($e_zip) ?>><code>zip</code> extension</li>
        <li <?= ex($e_dom) ?>><code>dom</code> extension</li>
        <li <?= ex($e_curl) ?>><code>curl</code> extension</li>
        <li <?= ex($e_gd) ?>><code>gd</code> extension</li>
        <li <?= ex($e_mbstring) ?>><code>mbstring</code> extension</li>
        <li <?= ex($e_mysqli) ?>><code>mysqli</code> extension</li>
    </ul>
    <?php if($error==true) { ?>
    <h1 style="color: red;">There are errors! Cannot install.</h1>
    <?php } else { ?>
    <a href="?install">
        <h1 style="color:white">Install</h1>
    </a>
    <?php } ?>
</div>
