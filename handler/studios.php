<?php

require("../load.php");

$studios = $conn->orderBy("name", "ASC")->get("studio", null, "id");

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/studios.php");
if ($tinfo["sidebar"]["studios"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
