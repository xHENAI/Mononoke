<?php

$forum = $_GET["id"];
$forum = $conn->query("SELECT * FROM `forum` WHERE `id`='$forum' LIMIT 1");
$forum = mysqli_fetch_assoc($forum);

if(!empty($forum["id"])) {
    if($forum["public"]==1) {
        $posts = $conn->query("SELECT * FROM `forum_threads` WHERE `forum`='".$forum["id"]."' ORDER BY `posted` DESC");
                          
?>

<title><?= $forum["name"] ?> (Forum) | <?= $config["name"] ?></title>

<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum">Forums (Index)</a></li>
    <li><?= $forum["name"] ?> (Forum)</li>
</ol>

<div class="panel panel-info col-sm-12">
    <h4>
        <?php if($forum["public"]==1) { glyph("eye-open","Forum is Public and can be viewed by Users"); } else { glyph("eye-close","Forum is Private and can only be viewed by Administrators and Moderators"); } ?>
        <?php if($forum["closed"]==0) { glyph("ok-sign","Forum is open and everyone can Post"); } else { glyph("remove-sign","Forum is closed and only Administrators and Moderators can Post"); } ?>
        <?= $forum["name"] ?> <?php if($user["level"]==10 || $user["level"]==0) { ?><small class="text-muted"><a href="<?= $config["url"] ?>forum/editforum/<?= $forum["id"] ?>"><?= glyph("wrench","Edit") ?> Edit</a></small><?php } ?></php>
    </h4>
    <p><?= $forum["description"] ?></p>
</div>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#newThread" aria-expanded="false" aria-controls="collapseExample">
    Create a new Thread
</button>
<div class="collapse" id="newThread">
    <div class="well">
        <?php
                              ?>
    </div>
</div>
<hr>
<?php

if ($forums->num_rows > 0) {
    while($forum = $forums->fetch_assoc()) {
        $forum_threads = $conn->query("SELECT COUNT(*) AS total FROM `forum_threads` WHERE `forum`='".$forum["id"]."'");
        $forum_threads = mysqli_fetch_assoc($forum_threads);
?>

<?php } } else { ?>
<p><?= glyph("info-sign","Error") ?> This Forum doesn't contain any Threads yet!</p>
<?php } ?>

<?php } else { ?>

<title><?= $forum["name"] ?> (Forum) | <?= $config["name"] ?></title>

<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum">Forums (Index)</a></li>
    <li><?= $forum["name"] ?> (Forum)</li>
</ol>

<p><?= glyph("info-sign","Error") ?> You do not have permission to perform this action!</p>

<?php } ?>

<?php } else { ?>

<title>Error (Forums) | <?= $config["name"] ?></title>

<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum">Forums (Index)</a></li>
    <li>Error: Forum not Found!</li>
</ol>

<p><?= glyph("info-sign","Error") ?> Forum not Found!</p>

<?php } ?>
