<?php

// index.php - Mononoke

session_start();

require("requires.php");

if(empty($_GET["page"])) {
    $page = "home";
    header("location: ".$config["url"]."home");
}

$page = $_GET["page"];

if($config["private"]==true && ($page!=="signin" && $page!=="signup" && $page!=="confirm" && $page!=="forgot" && $page!=="reset") && $loggedin==false) {
    // Checking if site is private. if yes and page is none of those you need to login etc. forces you to login
    header("location: ".$config["url"]."signin");
}

if(in_array($page,$requireLogin) && $loggedin==false) {
    // Those pages require login!
    $page = "signin";
}

if(in_array($page,$requireMod) || in_array($page, $requireAdmin)) {
    if((in_array($page, $requireMod) && ($user["level"]==10 || $user["level"]==0)) || (in_array($page,$requireAdmin) && $user["level"]==0)) {
        $page = $page;
    } else {
        $page = "home";
    }
}

$class = "";

if($user["theme"]==0) {
    // Bootstrap Default Light
    $class2 = "bg-0";
}
if($user["theme"]==1) {
    // Curelean Light
    $class2 = "bg-1";
}
if($user["theme"]==2) {
    // Bootstrap Default Dark
    $class2 = "bg-2";
}
if($user["theme"]==3) {
    // Cyborg Dark
    $class2 = "bg-3";
}
if($user["theme"]==4) {
    // Darkly Dark
    $class2 = "bg-4";
}

if($page=="signin") {
    $class = "signin-div";
} 

if($page=="signup") {
    $class = "signup-div";
}

if($page=="signout") {
    // Removing token from Database and destroy entire session and so on
    $conn->query("DELETE FROM `user_tokens` WHERE `user`='".$user["username"]."'");
    setcookie($config["cookie"]."session", "", time() - 3600, "/", "");
    session_destroy();
    session_unset();
    redirect("home");
}

if(isset($_POST["read_announce"])) {
    $user_announce = $user["id"];
    $conn->query("UPDATE `user` SET `read_announce`='1' WHERE `id`='$user_announce'");
    redirect("");
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

<body class="<?= $class ?>">

    <div class="<?= $class2 ?>"></div>

    <?php include("parts/menu.part.php"); ?>

    <div class="container contentx" id="">

        <?php if($user["read_announce"]==0) { // Shows notice that this software is still trash :^) ?>
        <div class="alert alert-danger text-center" role="alert">
            <?php if($loggedin==true) { // Only display close button if user is logged in ?>
            <form name="read_announce" method="post" action=""><button type="submit" name="read_announce" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></form>
            <?php } ?>
            <?= $lang["notice"] ?>
        </div>
        <?php } ?>


        <?php if($user["level"]==30) { // Show if user is still level 30 and not 20 (see readme.txt#devnotes) ?>
        <div class="alert alert-info text-center" role="alert"><?= $lang["unconfirmed"] ?></div>
        <?php } ?>

        <div class="row">

            <?php if(in_array($page, $noNav)) { ?>

            <div class="col-md-12">

                <?php include("pages/$page.req.php"); ?>

            </div>

            <?php } else { ?>

            <div class="col-md-9">

                <?php include("pages/$page.req.php"); ?>

            </div>

            <div class="col-md-3">

                <?php
                        if(in_array($page, $controlNav)) {
                            include("navs/control.bar.php");
                        }
                        if(in_array($page, $scheduleNav)) {
                            include("navs/schedule.bar.php");
                        }
                        if(in_array($page, $watchNav)) {
                            include("navs/watch.bar.php");
                        }
                        if(in_array($page, $followNav)) {
                            include("navs/follow.bar.php");
                        }
                        include("navs/main.bar.php");
                ?>

            </div>

            <?php } ?>

        </div>

    </div>

    <div class="text-muted text-center contentx"><a href="#" class="label label-default"><?= $lang["top"] ?></a></div>

    <?php include("parts/footer.part.php"); ?>

</body>

</html>
