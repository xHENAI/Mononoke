<?php // pages/forum/home.req.php - Mononoke ?>

<title>Home (Forums) | <?= $config["name"] ?></title>

<?php
if($user["level"]==10 || $user["level"]==0) {
    $forums = $conn->query("SELECT * FROM `forum` ORDER BY `sort` ASC");
} else {
    $forums = $conn->query("SELECT * FROM `forum` WHERE `public`='1' ORDER BY `sort` ASC");
}

?>

<ol class="breadcrumb">
    <li>Forums (Index)</li>
</ol>


<?php

if ($forums->num_rows > 0) {
    while($forum = $forums->fetch_assoc()) {
        $forum_threads = $conn->query("SELECT COUNT(*) AS total FROM `forum_threads` WHERE `forum`='".$forum["id"]."'");
        $forum_threads = mysqli_fetch_assoc($forum_threads);
?>
<div class="panel panel-default col-sm-12">
    <h4>
        <?php if($forum["public"]==1) { glyph("eye-open","Forum is Public and can be viewed by Users"); } else { glyph("eye-close","Forum is Private and can only be viewed by Administrators and Moderators"); } ?>
        <?php if($forum["closed"]==0) { glyph("ok-sign","Forum is open and everyone can Post"); } else { glyph("remove-sign","Forum is closed and only Administrators and Moderators can Post"); } ?>
        <a href="<?= $config["url"] ?>forum/viewforum/<?= $forum["id"] ?>"><?= $forum["name"] ?></a> <?php if($user["level"]==10 || $user["level"]==0) { ?><small class="text-muted"><a href="<?= $config["url"] ?>forum/editforum/<?= $forum["id"] ?>"><?= glyph("wrench","Edit") ?> Edit</a></small><?php } ?></php>
    </h4>
    <p>
        <?= $forum["description"] ?><br>
        <b>Threads:</b> <?= $forum_threads["total"] ?>
    </p>
</div>
<?php }
    } else { ?>
<?= glyph("info-sign","Error") ?> There are no Forums at the moment!
<?php }

?>

<?php if($user["level"]==10 || $user["level"]==0) { ?>
<p class="text-center"><a href="<?= $config["url"] ?>forum/new"><?= glyph("plus-sign","Add a new Forum!") ?> Add a new Forum!</a></p>
<?php } ?>
