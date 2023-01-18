<?php

require "../load.php";

$seasons = $conn->orderBy("name", "ASC")->get("season", null, "id");

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/seasons.php");
if ($tinfo["sidebar"]["seasons"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
