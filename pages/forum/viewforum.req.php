<?php

// pages/forum/viewforum.req.php - Mononoke

$forum = mysqli_real_escape_string($conn, $_GET["id"]);
$forum = $conn->query("SELECT * FROM `forum` WHERE `id`='$forum' LIMIT 1");
$forum = mysqli_fetch_assoc($forum);

if(!empty($forum["id"])) {
    
    if(($forum["public"]==1) || ($forum["public"]==0 && ($user["level"]==0 || $user["level"]==10))) {
        if($user["level"]==10 || $user["level"]==0) {
            $stickythreads = $conn->query("SELECT * FROM `forum_threads` WHERE `forum`='".$forum["id"]."' AND `sticky`='1' ORDER BY `posted` DESC");
            $threads = $conn->query("SELECT * FROM `forum_threads` WHERE `forum`='".$forum["id"]."' AND `sticky`='0' ORDER BY `posted` DESC");
        } else {
            $threads = $conn->query("SELECT * FROM `forum_threads` WHERE `forum`='".$forum["id"]."' AND `deleted`='0' AND `sticky`='0' ORDER BY `posted` DESC");
            $stickythreads = $conn->query("SELECT * FROM `forum_threads` WHERE `forum`='".$forum["id"]."' AND `sticky`='1' AND `deleted`='0' ORDER BY `posted` DESC");
        }
        
        if(isset($_POST["add_thread"])) {
            $title = mysqli_real_escape_string($conn, $_POST["title"]);
            $content = strip_tags(mysqli_real_escape_string($conn, $_POST["content"]));
            if(isset($_POST["closed"])) {
                $closed = "1";
            } else {
                $closed = "0";
            }
            if(isset($_POST["sticky"])) {
                $sticky = "1";
            } else {
                $sticky = "0";
            }
            $conn->query("INSERT INTO `forum_threads`(`forum`, `title`, `content`, `closed`, `sticky`, `deleted`, `user`) VALUES('".$forum["id"]."', '$title', '$content', '$closed', '$sticky', '0', '".$user["id"]."')");
            redirect("../viewforum/".$forum["id"]);
        }
?>

<title><?= $forum["name"] ?> (Forum) | <?= $config["name"] ?></title>

<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum/home">Forums (Index)</a></li>
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
                              if($user["level"]==30 || ($forum["closed"]==1 && $user["level"]==20)) {
                                  echo glyph("info-sign","Error")." You do not have permission to perform this action!";
                              } else { ?>
        <form method="post" action="" name="add_thread" class="form-horizontal">
            <div class="form-group">
                <label for="title" class="col-sm-12">Thread Title</label>
                <div class="col-sm-12">
                    <input required type="text" name="title" id="title" placeholder="Thread Titlte" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <textarea required class="form-control" name="content" style="max-width:100%" placeholder="Content of your Thread (Supports BBCode)"></textarea>
                </div>
            </div>
            <?php if($user["level"]==10 || $user["level"]==0) { ?>
            <div class="form-group">
                <div class="col-sm-3">
                    <input type="checkbox" name="closed" id="closed"> <label for="closed">Close Thread</label>
                </div>
                <div class="col-sm-3">
                    <input type="checkbox" name="sticky" id="sticky"> <label for="sticky">Make Thread sticky</label>
                </div>
            </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" name="add_thread"><?= glyph("plus-sign","Post Thread") ?> Post Thread</button>
        </form>
        <?php }
                              ?>
    </div>
</div>
<hr>
<?php

if ($stickythreads->num_rows > 0) {
    while($thread = $stickythreads->fetch_assoc()) {
        $threadauthor = $conn->query("SELECT * FROM `user` WHERE `id`='".$thread["user"]."' LIMIT  1");
        $threadauthor = mysqli_fetch_assoc($threadauthor);
        $replys = $conn->query("SELECT COUNT(*) AS total FROM `forum_posts` WHERE `forum`='".$thread["forum"]."' AND `thread`='".$thread["id"]."'");
        $replys = mysqli_fetch_assoc($replys);
        $latestreply = $conn->query("SELECT * FROM `forum_posts` WHERE `forum`='".$thread["forum"]."' AND `thread`='".$thread["id"]."' ORDER BY `id` DESC LIMIT 1");
        $latestreply = mysqli_fetch_assoc($latestreply);
        if(empty($latestreply["date"])) {
            $latestreply["date"] = "Never";
        }
?>
<div class="well well-sm">
    <?php
        if($thread["deleted"]==1) {
            glyph("trash","This Thread has been deleted and can only be viewed by the Administration and Moderation");
        }
        if($thread["sticky"]==1) {
            glyph("pushpin","This Thread is Sticky");
        }
        if($thread["closed"]==1) {
            glyph("lock","This Thread is Locked and you can no longer reply");
        }
        ?>
    <b><a href="<?= $config["url"] ?>forum/viewthread/<?= $thread["id"] ?>"><?= $thread["title"] ?></a></b><br>by <a href="<?= $config["url"] ?>user/<?= $thread["user"] ?>"><?= $threadauthor["username"] ?></a> on <?= $thread["posted"] ?><br>
    <?= $replys["total"] ?> Replys (Last on: <?= $latestreply["date"] ?>)
</div>
<?php } } else { ?>
<!-- There are no Sticky Threas -->
<?php } ?>
<?php

if ($threads->num_rows > 0) {
    while($thread = $threads->fetch_assoc()) {
        $threadauthor = $conn->query("SELECT * FROM `user` WHERE `id`='".$thread["user"]."' LIMIT  1");
        $threadauthor = mysqli_fetch_assoc($threadauthor);
        $replys = $conn->query("SELECT COUNT(*) AS total FROM `forum_posts` WHERE `forum`='".$thread["forum"]."' AND `thread`='".$thread["id"]."'");
        $replys = mysqli_fetch_assoc($replys);
        $latestreply = $conn->query("SELECT * FROM `forum_posts` WHERE `forum`='".$thread["forum"]."' AND `thread`='".$thread["id"]."' ORDER BY `id` DESC LIMIT 1");
        $latestreply = mysqli_fetch_assoc($latestreply);
        if(empty($latestreply["date"])) {
            $latestreply["date"] = "Never";
        }
?>
<div class="well well-sm">
    <?php
        if($thread["deleted"]==1) {
            glyph("trash","This Thread has been deleted and can only be viewed by the Administration and Moderation");
        }
        if($thread["closed"]==1) {
            glyph("lock","This Thread is Locked and you can no longer reply");
        }
        ?>
    <b><a href="<?= $config["url"] ?>forum/viewthread/<?= $thread["id"] ?>"><?= $thread["title"] ?></a></b><br>by <a href="<?= $config["url"] ?>user/<?= $thread["user"] ?>"><?= $threadauthor["username"] ?></a> on <?= $thread["posted"] ?><br>
    <?= $replys["total"] ?> Replys (Last on: <?= $latestreply["date"] ?>)
</div>
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
