<?php

// pages/forum/viewthread.req.php - Mononoke

$thread = mysqli_real_escape_string($conn, $_GET["id"]);
$thread = $conn->query("SELECT * FROM `forum_threads` WHERE `id`='$thread' LIMIT 1");
$thread = mysqli_fetch_assoc($thread);

if(!empty($thread["id"])) {
    $forum = $conn->query("SELECT * FROM `forum` WHERE `id`='".$thread["forum"]."' LIMIT 1");
    $forum = mysqli_fetch_assoc($forum);
    $author = $conn->query("SELECT * FROM `user` WHERE `id`='".$thread["user"]."' LIMIT 1");
    $author = mysqli_fetch_assoc($author);
    $totalthreads = $conn->query("SELECT COUNT(*) AS total FROM `forum_threads` WHERE `user`='".$author["id"]."'");
    $totalthreads = mysqli_fetch_assoc($totalthreads);
    $totalposts = $conn->query("SELECT COUNT(*) AS total FROM `forum_posts` WHERE `user`='".$author["id"]."'");
    $totalposts = mysqli_fetch_assoc($totalposts);
    $totalposts["total"] = $totalposts["total"]+$totalthreads["total"];
    if($user["level"]==10 || $user["level"]==0) {
        $replys = $conn->query("SELECT * FROM `forum_posts` WHERE `forum`='".$forum["id"]."' AND `thread`='".$thread["id"]."' ORDER BY `id` ASC");
    } else {
        $replys = $conn->query("SELECT * FROM `forum_posts` WHERE `forum`='".$forum["id"]."' AND `thread`='".$thread["id"]."' AND `deleted`='0' ORDER BY `id` ASC");
    }
    
    if($user["level"]==10 || $user["level"]==0) {
        if(isset($_POST["lock_thread"])) {
            $conn->query("UPDATE `forum_threads` SET `closed`='1' WHERE `id`='".$thread["id"]."'");
            redirect("../viewthread/".$thread["id"]);
        }
        if(isset($_POST["unlock_thread"])) {
            $conn->query("UPDATE `forum_threads` SET `closed`='0' WHERE `id`='".$thread["id"]."'");
            redirect("../viewthread/".$thread["id"]);
        }
        if(isset($_POST["stick_thread"])) {
            $conn->query("UPDATE `forum_threads` SET `sticky`='1' WHERE `id`='".$thread["id"]."'");
            redirect("../viewthread/".$thread["id"]);
        }
        if(isset($_POST["unstick_thread"])) {
            $conn->query("UPDATE `forum_threads` SET `sticky`='0' WHERE `id`='".$thread["id"]."'");
            redirect("../viewthread/".$thread["id"]);
        }
        if(isset($_POST["delete_thread"])) {
            $conn->query("UPDATE `forum_threads` SET `deleted`='1' WHERE `id`='".$thread["id"]."'");
            redirect("../viewthread/".$thread["id"]);
        }
        if(isset($_POST["undelete_thread"])) {
            $conn->query("UPDATE `forum_threads` SET `deleted`='0' WHERE `id`='".$thread["id"]."'");
            redirect("../viewthread/".$thread["id"]);
        }
        if(isset($_POST["delete_reply"])) {
            $reply = mysqli_real_escape_string($conn, $_POST["reply"]);
            $conn->query("UPDATE `forum_posts` SET `deleted`='1' WHERE `id`='$reply'");
            redirect("");
        }

        if(isset($_POST["undelete_reply"])) {
            $reply = mysqli_real_escape_string($conn, $_POST["reply"]);
            $conn->query("UPDATE `forum_posts` SET `deleted`='0' WHERE `id`='$reply'");
            redirect("");
        }
    }
    
    if(isset($_POST["edit_thread"])) {
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $content = strip_tags(mysqli_real_escape_string($conn, $_POST["content"]));
        $conn->query("UPDATE `forum_threads` SET `title`='$title',`content`='$content' WHERE `id`='".$thread["id"]."'");
        redirect("");
    }
    
    if(isset($_POST["add_post"])) {
        $content = strip_tags(mysqli_real_escape_string($conn, $_POST["content"]));
        $conn->query("INSERT INTO `forum_posts`(`user`, `forum`, `thread`, `content`, `deleted`) VALUES('".$user["id"]."', '".$forum["id"]."', '".$thread["id"]."', '$content', '0')");
        redirect("");
    }
    
    if(isset($_POST["edit_reply"])) {
        $content = strip_tags(mysqli_real_escape_string($conn, $_POST["content"]));
        $reply = mysqli_real_escape_string($conn, $_POST["reply"]);
        $conn->query("UPDATE `forum_posts` SET `content`='$content' WHERE `id`='$reply'");
        redirect("");
    }
    
?>

<?php
    if(($thread["deleted"]==0) || ($thread["deleted"]==1 && ($user["level"]==10 || $user["level"]==0))) {
    ?>

<title><?= $thread["title"] ?> (Thread) | <?= $config["name"] ?></title>
<ol class="breadcrumb">
    <li><a href="<?= $config["url"] ?>forum/home">Forums (Index)</a></li>
    <li><a href="<?= $config["url"] ?>forum/viewforum/<?= $forum["id"] ?>"><?= $forum["name"] ?> (Forum)</a></li>
    <li><?= $thread["title"] ?> (Thread)</li>
</ol>

<div>
    <?php if($user["level"]==10 || $user["level"]==0 || $user["id"]==$thread["user"]) { ?>
    <ul class="nav nav-pills" role="tablist">
        <li role="presentation" class="active"><a href="#thread" aria-controls="thread" role="tab" data-toggle="tab"><?= glyph("text-size","Thread") ?> Thread</a></li>
        <li role="presentation"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab"><?= glyph("pencil","Edit") ?> Edit</a></li>
        <?php if($user["level"]==10 || $user["level"]==0) { ?>
        <li role="presentation"><a href="#mod" aria-controls="mod" role="tab" data-toggle="tab"><?= glyph("wrench","Mod Tools") ?> Mod Tools</a></li>
        <?php } ?>
    </ul>
    <hr>
    <?php } ?>
    <div class="well well-sm">
        <div class="row">
            <div class="col-sm-2 text-center">
                <img src="<?= $author["image"] ?>" width="100%" alt="<?= $author["username"] ?>'s Profile Picture" title="<?= $author["username"] ?>'s Profile Picture">
                <a href="<?= $config["url"] ?>user/<?= $author["id"] ?>"><?= $author["username"] ?></a><br>
                <?= glyph("education","Level")." ".convert_level($author["level"]) ?><br>
                Total Threads: <?= $totalthreads["total"] ?><br>
                Total Posts: <?= $totalposts["total"] ?>
            </div>
            <div class="col-sm-10">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="thread">
                        <h4><?= $thread["title"] ?> <small><?= $thread["posted"] ?></small></h4>
                        <?= bbconvert($thread["content"]) ?>
                        <hr>
                        <?= bbconvert($author["forum_signature"]) ?>
                    </div>
                    <?php if($user["level"]==10 || $user["level"]==0 || $user["id"]==$thread["user"]) { ?>
                    <div role="tabpanel" class="tab-pane fade" id="edit">
                        <form name="edit_thread" action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="title" class="col-sm-12">Thread Title</label>
                                <div class="col-sm-12">
                                    <input required type="text" name="title" id="title" value="<?= $thread["title"] ?>" placeholder="The Title of the Thread" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea required name="content" placeholder="The Content of your Thread (Supports BBCode)" id="content" class="form-control" style="max-width:100%"><?= $thread["content"] ?></textarea>
                                </div>
                            </div>
                            <button name="edit_thread" type="submit" class="btn btn-success"><?= glyph("floppy-saved","Save Changes") ?> Save Changes</button>
                        </form>
                    </div>
                    <?php } ?>
                    <?php if($user["level"]==10 || $user["level"]==0) { ?>
                    <div role="tabpanel" class="tab-pane fade" id="mod">
                        <form method="post" action="" class="form-horizontal">
                            <?php if($thread["closed"]==1) { ?>
                            <button class="btn btn-danger" name="unlock_thread">Unlock Thread</button>
                            <?php } else { ?>
                            <button class="btn btn-success" name="lock_thread">Lock Thread</button>
                            <?php } ?>
                            <?php if($thread["sticky"]==1) { ?>
                            <button class="btn btn-danger" name="unstick_thread">Unstick Thread</button>
                            <?php } else { ?>
                            <button class="btn btn-success" name="stick_thread">Stick Thread</button>
                            <?php } ?>
                            <?php if($thread["deleted"]==1) { ?>
                            <button class="btn btn-danger" name="undelete_thread">Undelete Thread</button>
                            <?php } else { ?>
                            <button class="btn btn-success" name="delete_thread">Delete Thread</button>
                            <?php } ?>
                        </form>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div>
    <?php
        if ($replys->num_rows > 0) {
            while($reply = $replys->fetch_assoc()) {
                $author = $conn->query("SELECT * FROM `user` WHERE `id`='".$reply["user"]."' LIMIT 1");
                $author = mysqli_fetch_assoc($author);
                $rtotalthreads = $conn->query("SELECT COUNT(*) AS total FROM `forum_threads` WHERE `user`='".$author["id"]."'");
                $rtotalthreads = mysqli_fetch_assoc($rtotalthreads);
                $rtotalposts = $conn->query("SELECT COUNT(*) AS total FROM `forum_posts` WHERE `user`='".$author["id"]."'");
                $rtotalposts = mysqli_fetch_assoc($rtotalposts);
                $rtotalposts["total"] = $rtotalposts["total"]+$rtotalthreads["total"];
        ?>
    <div class="well well-sm" id="rply-<?= $reply["id"] ?>">
        <div class="row">
            <div class="col-sm-2 text-center">
                <img src="<?= $author["image"] ?>" width="100%" alt="<?= $author["username"] ?>'s Profile Picture" title="<?= $author["username"] ?>'s Profile Picture">
                <a href="<?= $config["url"] ?>user/<?= $author["id"] ?>"><?= $author["username"] ?></a><br>
                <?= glyph("education","Level")." ".convert_level($author["level"]) ?><br>
                Total Threads: <?= $rtotalthreads["total"] ?><br>
                Total Posts: <?= $rtotalposts["total"] ?>
            </div>
            <div class="tab-content">
                <?php if($user["level"]==10 || $user["level"]==0 || $user["id"]==$reply["user"]) {
                echo '<div class="col-sm-8 tab-pane fade in active" role="tabpanel" id="reply-'.$reply["id"].'">';
            } else {
                echo '<div class="col-sm-10">';
            } ?>
                <?php if($reply["deleted"]==1) { ?><?= glyph("info-sign","Info") ?> This Reply has been deleted and is no longer visible to the public!
                <hr><?php } ?>
                <?= bbconvert($reply["content"]) ?>
                <hr>
                <?= bbconvert($author["forum_signature"]) ?>
                <br><small>(Posted on <?= $reply["date"] ?>)</small>
            </div>
            <?php if($user["level"]==10 || $user["level"]==0 || $user["id"]==$reply["user"]) { ?>
            <div class=" col-sm-8 tab-pane fade in" role="tabpanel" id="edit-<?= $reply["id"] ?>">
                <form class="form-horizontal" method="post" action="" name="edit_reply">
                    <textarea required placeholder="The Content of your Reply. Cannot be empty. Supports BBCode" class="form-control" name="content" style="max-width:100%"><?= $reply["content"] ?></textarea><br>
                    <input type="text" name="reply" hidden readonly value="<?= $reply["id"] ?>">
                    <button type="submit" name="edit_reply" class="btn btn-success"><?= glyph("floppy-save","Edit Reply") ?> Edit Reply</button>
                </form>
            </div>
            <?php } ?>
            <?php if($user["level"]==10 || $user["level"]==0) { ?>
            <div class=" col-sm-8 tab-pane fade in" role="tabpanel" id="mod-<?= $reply["id"] ?>">
                <form class="form-horizontal" method="post" action="">
                    <input type="text" name="reply" value="<?= $reply["id"] ?>" hidden readonly>
                    <?php if($reply["deleted"]==1) { ?>
                    <button class="btn btn-success" name="undelete_reply">Undelete Reply</button>
                    <?php } else { ?>
                    <button class="btn btn-danger" name="delete_reply">Delete Reply</button>
                    <?php } ?>
                </form>
            </div>
            <?php } ?>
        </div>
        <?php if($user["level"]==10 || $user["level"]==0 || $user["id"]==$reply["user"]) { ?>
        <div class="col-sm-2">
            <ul class="nav nav-pills" role="tablist">
                <li role="presentation" class="active"><a href="#reply-<?= $reply["id"] ?>" aria-controls="reply-<?= $reply["id"] ?>" role="tab" data-toggle="tab"><?= glyph("text-size","Reply") ?> Reply</a></li>
                <li role="presentation"><a href="#edit-<?= $reply["id"] ?>" aria-controls="edit-<?= $reply["id"] ?>" role="tab" data-toggle="tab"><?= glyph("pencil","Edit") ?> Edit</a></li>
                <?php if($user["level"]==10 || $user["level"]==0) { ?>
                <li role="presentation"><a href="#mod-<?= $reply["id"] ?>" aria-controls="mod-<?= $reply["id"] ?>" role="tab" data-toggle="tab"><?= glyph("wrench","Mod Tools") ?> Mod Tools</a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
    </div>
</div>
<?php } } else { ?>
<p><?= glyph("info-sign","Error") ?> This Thread doesn't have any Replys!</p>
<?php } ?>
</div>

<hr>

<div class="well well-sm">
    <?php if($thread["closed"]==0 || ($thread["closed"]==1 && ($user["level"]==10 || $user["level"]==0))) { ?>
    <form method="post" action="" name="add_post" class="form-horizontal">
        <div class="form-group">
            <label for="reply-content" class="col-sm-12">Reply to Post</label>
            <div class="col-sm-12">
                <textarea minlength="10" required class="form-control" name="content" style="max-width:100%" placeholder="Content of your Reply (Supports BBCode)" id="reply-content"></textarea>
            </div>
        </div>
        <button class="btn btn-primary" name="add_post" type="submit"><?= glyph("send","Submit Reply") ?> Submit Reply</button>
    </form>
    <?php } else { ?>
    <?= glyph("info-sign","Error") ?> This Thread is closed!
    <?php } ?>
</div>

<?php } else { ?>

<title>Deleted (Thread) | <?= $config["name"] ?></title>
<p><?= glyph("info-sign","Error") ?> You do not have permission to perform this action!</p>

<?php } ?>

<?php } else { ?>

<title>Error (Thread) | <?= $config["name"] ?></title>
<p><?= glyph("info-sign","Error") ?> The Thread does not exist!</p>

<?php } ?>
