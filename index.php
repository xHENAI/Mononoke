<?php

// index.php - Mononoke

session_start();

require("requires.php");

if(!empty($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "home";
    header("location: ".$config["url"]."home");
}

if($config["private"]==true && ($page!=="signin" && $page!=="signup" && $page!=="confirm" && $page!=="forgot" && $page!=="reset") && $loggedin==false) {
    // Checking if site is private. if yes and page is none of those you need to login etc. forces you to login
    header("location: ".$config["url"]."signin");
}

if(in_array($page,$requireLogin) && $loggedin==false) {
    // Those pages require login!
    $page = "signin";
}

if($page=="signout") {
    // Removing token from Database and destroy entire session and so on
    $conn->query("DELETE FROM `user_tokens` WHERE `user`='".$user["username"]."'");
    session_destroy();
    session_unset();
    setcookie($config["cookie"]."token", "", time() - 3600);
    redirect("home");
}

?>

<!DOCTYPE html>
<html lang="en">

<!--
  ___ ___________ ___________________          ____             ___ ______________ _______      _____  .___             
 /   |   \_____  \\_____  \__    ___/__  ___  /  _ \   ___  ___/   |   \_   _____/ \      \    /  _  \ |   |            
/    ~    \_(__  <  _(__  < |    |  \  \/  /  >  _ </\ \  \/  /    ~    \    __)_  /   |   \  /  /_\  \|   |            
\    Y    /       \/       \|    |   >    <  /  <_\ \/  >    <\    Y    /        \/    |    \/    |    \   |            
 \___|_  /______  /______  /|____|  /__/\_ \ \_____\ \ /__/\_ \\___|_  /_______  /\____|__  /\____|__  /___|            
       \/       \/       \/               \/        \/       \/      \/        \/         \/         \/                 
__________                                      __              _____                                      __           
\______   \_______   ____   ______ ____   _____/  |_  ______   /     \   ____   ____   ____   ____   ____ |  | __ ____  
 |     ___/\_  __ \_/ __ \ /  ___// __ \ /    \   __\/  ___/  /  \ /  \ /  _ \ /    \ /  _ \ /    \ /  _ \|  |/ // __ \ 
 |    |     |  | \/\  ___/ \___ \\  ___/|   |  \  |  \___ \  /    Y    (  <_> )   |  (  <_> )   |  (  <_> )    <\  ___/ 
 |____|     |__|    \___  >____  >\___  >___|  /__| /____  > \____|__  /\____/|___|  /\____/|___|  /\____/|__|_ \\___  >
                        \/     \/     \/     \/          \/          \/            \/            \/            \/    \/ 
___.             ____/\__      .__        __  .__         _______________  _______  _______                       .___  
\_ |__ ___.__.  /   / /_/____  |__| _____/  |_|  | ___.__.\_____  \   _  \ \   _  \ \   _  \   _____    ____    __| _/  
 | __ <   |  |  \__/ / \\__  \ |  |/    \   __\  |<   |  | /  ____/  /_\  \/  /_\  \/  /_\  \  \__  \  /    \  / __ |   
 | \_\ \___  |  / / /   \/ __ \|  |   |  \  | |  |_\___  |/       \  \_/   \  \_/   \  \_/   \  / __ \|   |  \/ /_/ |   
 |___  / ____| /_/ /__  (____  /__|___|  /__| |____/ ____|\_______ \_____  /\_____  /\_____  / (____  /___|  /\____ |   
     \/\/        \/   \/     \/        \/          \/             \/     \/       \/       \/       \/     \/      \/   
___________    .__                           ____  __.__         .__              .__        __                         
\_   _____/_ __|  |_________   ___________  |    |/ _|  |   ____ |__| ____   ____ |__| ____ |  | __                     
 |    __)|  |  \  |  \_  __ \_/ __ \_  __ \ |      < |  | _/ __ \|  |/    \_/ __ \|  |/ ___\|  |/ /                     
 |     \ |  |  /   Y  \  | \/\  ___/|  | \/ |    |  \|  |_\  ___/|  |   |  \  ___/|  \  \___|    <                      
 \___  / |____/|___|  /__|    \___  >__|    |____|__ \____/\___  >__|___|  /\___  >__|\___  >__|_ \                     
     \/             \/            \/                \/         \/        \/     \/        \/     \/ 
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
