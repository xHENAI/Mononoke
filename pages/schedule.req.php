<?php

// pages/schedule.req.php - Mononoke

?>
<title>Schedule | <?= $config["name"] ?></title>
<h3>Sunday <?php if(date("D")=="Sun") { ?><small style="color:blue">- Today</small><?php } ?></h3>
<?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='1'");
        if ($result->num_rows > 0) {?>
<div class="list-group">
    <?php while($row = $result->fetch_assoc()) {
    $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."'");
            $anime = mysqli_fetch_assoc($anime);
    ?>
    <a href="<?= $config["url"] ?>anime/<?= $row["anime"] ?>" class="list-group-item"><?= $anime["name"] ?> <span id="sche-<?= $row["id"] ?>" style="float:right"></span></a>
    <script>
        function sched_<?= $row["id"] ?>() {
            var countDownDate<?= $row["id"] ?> = new Date("<?= $row["tleft"] ?>").getTime();
            var x = setInterval(function hey<?= $row["id"] ?>() {
                var now = new Date().getTime();
                var distance = countDownDate<?= $row["id"] ?> - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Releases on <?= $row["tleft"] ?>, " + days + "d " + hours + "h " + minutes + "m " + seconds + "s left.";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Should come soon...";
                }
            }, 1000);
        }

        sched_<?= $row["id"] ?>();

    </script>
    <?php } ?>
</div>
<?php }
?>
<hr>
<h3>Monday <?php if(date("D")=="Mon") { ?><small style="color:blue">- Today</small><?php } ?></h3>
<?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='2'");
        if ($result->num_rows > 0) {?>
<div class="list-group">
    <?php while($row = $result->fetch_assoc()) {
    $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."'");
            $anime = mysqli_fetch_assoc($anime);
    ?>
    <a href="<?= $config["url"] ?>anime/<?= $row["anime"] ?>" class="list-group-item"><?= $anime["name"] ?> <span id="sche-<?= $row["id"] ?>" style="float:right"></span></a>
    <script>
        function sched_<?= $row["id"] ?>() {
            var countDownDate<?= $row["id"] ?> = new Date("<?= $row["tleft"] ?>").getTime();
            var x = setInterval(function hey<?= $row["id"] ?>() {
                var now = new Date().getTime();
                var distance = countDownDate<?= $row["id"] ?> - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Releases on <?= $row["tleft"] ?>, " + days + "d " + hours + "h " + minutes + "m " + seconds + "s left.";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Should come soon...";
                }
            }, 1000);
        }

        sched_<?= $row["id"] ?>();

    </script>
    <?php } ?>
</div>
<?php }
?>
<hr>
<h3>Tuesday <?php if(date("D")=="Tue") { ?><small style="color:blue">- Today</small><?php } ?></h3>
<?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='3'");
        if ($result->num_rows > 0) {?>
<div class="list-group">
    <?php while($row = $result->fetch_assoc()) {
    $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."'");
            $anime = mysqli_fetch_assoc($anime);
    ?>
    <a href="<?= $config["url"] ?>anime/<?= $row["anime"] ?>" class="list-group-item"><?= $anime["name"] ?> <span id="sche-<?= $row["id"] ?>" style="float:right"></span></a>
    <script>
        function sched_<?= $row["id"] ?>() {
            var countDownDate<?= $row["id"] ?> = new Date("<?= $row["tleft"] ?>").getTime();
            var x = setInterval(function hey<?= $row["id"] ?>() {
                var now = new Date().getTime();
                var distance = countDownDate<?= $row["id"] ?> - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Releases on <?= $row["tleft"] ?>, " + days + "d " + hours + "h " + minutes + "m " + seconds + "s left.";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Should come soon...";
                }
            }, 1000);
        }

        sched_<?= $row["id"] ?>();

    </script>
    <?php } ?>
</div>
<?php }
?>
<hr>
<h3>Wednesday <?php if(date("D")=="Wed") { ?><small style="color:blue">- Today</small><?php } ?></h3>
<?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='4'");
        if ($result->num_rows > 0) {?>
<div class="list-group">
    <?php while($row = $result->fetch_assoc()) {
    $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."'");
            $anime = mysqli_fetch_assoc($anime);
    ?>
    <a href="<?= $config["url"] ?>anime/<?= $row["anime"] ?>" class="list-group-item"><?= $anime["name"] ?> <span id="sche-<?= $row["id"] ?>" style="float:right"></span></a>
    <script>
        function sched_<?= $row["id"] ?>() {
            var countDownDate<?= $row["id"] ?> = new Date("<?= $row["tleft"] ?>").getTime();
            var x = setInterval(function hey<?= $row["id"] ?>() {
                var now = new Date().getTime();
                var distance = countDownDate<?= $row["id"] ?> - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Releases on <?= $row["tleft"] ?>, " + days + "d " + hours + "h " + minutes + "m " + seconds + "s left.";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Should come soon...";
                }
            }, 1000);
        }

        sched_<?= $row["id"] ?>();

    </script>
    <?php } ?>
</div>
<?php }
?>
<hr>
<h3>Thursday <?php if(date("D")=="Thu") { ?><small style="color:blue">- Today</small><?php } ?></h3>
<?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='5'");
        if ($result->num_rows > 0) {?>
<div class="list-group">
    <?php while($row = $result->fetch_assoc()) {
    $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."'");
            $anime = mysqli_fetch_assoc($anime);
    ?>
    <a href="<?= $config["url"] ?>anime/<?= $row["anime"] ?>" class="list-group-item"><?= $anime["name"] ?> <span id="sche-<?= $row["id"] ?>" style="float:right"></span></a>
    <script>
        function sched_<?= $row["id"] ?>() {
            var countDownDate<?= $row["id"] ?> = new Date("<?= $row["tleft"] ?>").getTime();
            var x = setInterval(function hey<?= $row["id"] ?>() {
                var now = new Date().getTime();
                var distance = countDownDate<?= $row["id"] ?> - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Releases on <?= $row["tleft"] ?>, " + days + "d " + hours + "h " + minutes + "m " + seconds + "s left.";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Should come soon...";
                }
            }, 1000);
        }

        sched_<?= $row["id"] ?>();

    </script>
    <?php } ?>
</div>
<?php }
?>
<hr>
<h3>Friday <?php if(date("D")=="Fri") { ?><small style="color:blue">- Today</small><?php } ?></h3>
<?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='6'");
        if ($result->num_rows > 0) {?>
<div class="list-group">
    <?php while($row = $result->fetch_assoc()) {
    $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."'");
            $anime = mysqli_fetch_assoc($anime);
    ?>
    <a href="<?= $config["url"] ?>anime/<?= $row["anime"] ?>" class="list-group-item"><?= $anime["name"] ?> <span id="sche-<?= $row["id"] ?>" style="float:right"></span></a>
    <script>
        function sched_<?= $row["id"] ?>() {
            var countDownDate<?= $row["id"] ?> = new Date("<?= $row["tleft"] ?>").getTime();
            var x = setInterval(function hey<?= $row["id"] ?>() {
                var now = new Date().getTime();
                var distance = countDownDate<?= $row["id"] ?> - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Releases on <?= $row["tleft"] ?>, " + days + "d " + hours + "h " + minutes + "m " + seconds + "s left.";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Should come soon...";
                }
            }, 1000);
        }

        sched_<?= $row["id"] ?>();

    </script>
    <?php } ?>
</div>
<?php }
?>
<hr>
<h3>Saturday <?php if(date("D")=="Sat") { ?><small style="color:blue">- Today</small><?php } ?></h3>
<?php
        $result = $conn->query("SELECT * FROM `schedule` WHERE `day`='7'");
        if ($result->num_rows > 0) {?>
<div class="list-group">
    <?php while($row = $result->fetch_assoc()) {
    $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."'");
            $anime = mysqli_fetch_assoc($anime);
    ?>
    <a href="<?= $config["url"] ?>anime/<?= $row["anime"] ?>" class="list-group-item"><?= $anime["name"] ?> <span id="sche-<?= $row["id"] ?>" style="float:right"></span></a>
    <script>
        function sched_<?= $row["id"] ?>() {
            var countDownDate<?= $row["id"] ?> = new Date("<?= $row["tleft"] ?>").getTime();
            var x = setInterval(function hey<?= $row["id"] ?>() {
                var now = new Date().getTime();
                var distance = countDownDate<?= $row["id"] ?> - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Releases on <?= $row["tleft"] ?>, " + days + "d " + hours + "h " + minutes + "m " + seconds + "s left.";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("sche-<?= $row["id"] ?>").innerHTML = "Should come soon...";
                }
            }, 1000);
        }

        sched_<?= $row["id"] ?>();

    </script>
    <?php } ?>
</div>
<?php }
?>

<?php if($user["level"]==10 || $user["level"]==0) { ?>
<p class="text-center"><a href="<?= $config["url"] ?>sys/schedule"><?= glyph("cog","Edit Schedule") ?> Edit Schedule</a></p>
<?php } ?>
