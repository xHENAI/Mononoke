<?php

// requires.php - Mononoke

if(!file_exists("installed") || !file_exists("config.php")) {
    header("location: install");
}

require("config.php");
require("core/conn.req.php");
require("langs/".$user["lang"].".lang.php");
require("core/funky.req.php");
require("core/arrays.req.php");

?>
