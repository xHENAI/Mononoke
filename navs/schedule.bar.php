<?php

// navs/schedule.bar.php - Mononoke

$timestamp = strtotime(date("Y-m-d"));

?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Schedule</h3>
    </div>
    <div class="panel-body">
        <h4 class="text-center"><?= date("D", $timestamp) //convert_date(date("d")) ?>, <span id="datetime"></span></h4>
    </div>
</div>
<script>
    live_time();

    function live_time() {
        var refresh = 1000;
        mytime = setTimeout('display_time()', refresh);
    }

    function display_time() {
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
        live_time();
    }

</script>
