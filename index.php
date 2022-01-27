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

if(in_array($page,$requireMod) && ($user["level"]!==10 || $user["level"]!==0)) {
    $page = "home";
}

if($page=="signout") {
    // Removing token from Database and destroy entire session and so on
    $conn->query("DELETE FROM `user_tokens` WHERE `user`='".$user["username"]."'");
    setcookie($config["cookie"]."session", "", time() - 3600, "/", $config["domain"]);
    session_destroy();
    session_unset();
    redirect("home");
}

if(isset($_POST["read_announce"])) {
    $user_announce = $user["id"];
    $conn->query("UPDATE `user` SET `read_announce`='1' WHERE `id`='$user_announce'");
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

        <?php if($user["read_announce"]==0) { // Shows notice that this software is still trash :^) ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php if($loggedin==true) { // Only display close button if user is logged in ?>
            <form name="read_announce" method="post" action=""><button type="submit" name="read_announce" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></form>
            <?php } ?>
            <b>Hello!</b> Please keep in mind that the software that is powering <?= $config["name"] ?> is still in Alpha. Make sure to check out the <a href="https://github.com/xHENAI/Mononoke" target="_blank">GitHub</a>!
        </div>
        <?php } ?>


        <?php if($user["level"]==30) { // Show if user is still level 30 and not 20 (see readme.txt#devnotes) ?>
        <div class="alert alert-info text-center" role="alert"><b>Alert:</b> You haven't verified your eMail yet! To use all features of <?= $config["name"] ?>, you need to do that first.</div>
        <?php } ?>

        <?php include("pages/$page.req.php"); ?>

    </div>

    <?php include("parts/footer.part.php"); ?>

</body>

</html>
