<?php

require("../load.php");

$fan = new User($conn->escape($purifier->purify($_GET["username"])));

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/fan.php");
if ($tinfo["sidebar"]["fan"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
