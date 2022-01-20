<?php

// index.php - aniZeroTwo

require("requires.php");

if(!empty($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "home";
    header("location: ".$config["url"]."home");
}

if($config["private"]==true && ($page!=="signin" && $page!=="signup") && $loggedin==false) {
    header("location: ".$config["url"]."signin");
}

?>

<!DOCTYPE html>
<html lang="en">

<!--

                                                                                                            
 _____ ___ ___ _____                                _       _                                               
|  |  |_  |_  |_   _|_ _    ___ ___ ___ ___ ___ ___| |_ ___|_|                                              
|     |_  |_  | | | |_'_|  | . |  _| -_|_ -| -_|   |  _|_ -|_                                               
|__|__|___|___| |_| |_,_|  |  _|_| |___|___|___|_|_|_| |___|_|                                              
                           |_|                                                                              
                                                                                                            
         _ _____             _____              _                                                           
 ___ ___|_|__   |___ ___ ___|_   _|_ _ _ ___   | |_ _ _                                                     
| .'|   | |   __| -_|  _| . | | | | | | | . |  | . | | |                                                    
|__,|_|_|_|_____|___|_| |___| |_| |_____|___|  |___|_  |                                                    
                                                   |___|                                                    
                                        _            _ _                                                    
 _____     _     _   _     ___ _      _| |_    _____|_|_|_                  _____ _     _         _     _   
|   __|___|_|___| |_| |_ _|_  | |_   |   __|  |   __|_ _| |_ ___ ___ ___   |  |  | |___|_|___ ___|_|___| |_ 
|__   | .'| |   |  _| | | |  _| '_|  |   __|  |   __| | |   |  _| -_|  _|  |    -| | -_| |   | -_| |  _| '_|
|_____|__,|_|_|_|_| |_|_  |___|_,_|  |_   _|  |__|  |___|_|_|_| |___|_|    |__|__|_|___|_|_|_|___|_|___|_,_|
                      |___|            |_|                                                                  

-->

<head>

    <?php include("parts/header.part.php"); ?>

</head>

<body>

    <?php include("parts/menu.part.php"); ?>

    <div class="container">

        <?php include("pages/$page.req.php"); ?>

    </div>

    <?php include("parts/footer.part.php"); ?>

</body>

</html>
