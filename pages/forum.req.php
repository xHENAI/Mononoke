<?php

if(isset($_GET["action"]) && !empty($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "home";
    redirect("forum/home");
}

include("forum/$action.req.php");

?>
