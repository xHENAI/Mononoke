<?php

// requires.php - Mononoke

if(!file_exists("installed") || !file_exists("config.php")) {
    if(file_exists("config.php")) {
        unlink("config.php");
    }
    if(file_exists("installed")) {
        unlink("installed");
    }
    header("location: install");
}

require("config.php");
require("core/conn.req.php");
require("langs/".$user["lang"].".lang.php");
require("core/funky.req.php");
require("core/arrays.req.php");

?>
