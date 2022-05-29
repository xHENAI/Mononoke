<?php

require("config.example.php");
require("user.php");

if(isset($_GET["install"])) {
    
    // Install altest archive
    $latest = file_get_contents("https://cdn.henai.eu/Mononoke/version.txt");
    $url = "https://cdn.henai.eu/Mononoke/versions/$latest/Mononoke-$latest.zip";
    $file_name = basename($url);
    if (file_put_contents($file_name, file_get_contents($url))) {
        echo "File downloaded successfully!\n";
    } else {
        echo "File downloading failed...\n";
    }
    
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
    $conn->query("INSERT INTO `user`(`username`,`password`,`image`,`level`,`banned`) VALUES('$admin_username','$password','https://cdn.henai.eu/assets/images/avatar.png','30','0')");
    
    // Cleanup
    unlink("streamanime.sql");
    unlink("Mononoke-$latest.zip");
    unlink("readme.txt");
    unlink("LICENSE");
    header("location: ./mnt/login");
    
}

?>

<p><a href="?install">I have edited <code>config.example.php</code> to my likings. Proceed?</a></p>