<?php

require("../load.php");

$genres = $conn->orderBy("name", "ASC")->get("genre", null, "id");

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/genres.php");
if ($tinfo["sidebar"]["genres"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
