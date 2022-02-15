<?php

// pages/browse.req.php - Mononoke

$total_pages = $conn->query('SELECT COUNT(*) FROM `anime`')->fetch_row()[0];
$page = isset($_GET['pagination']) && is_numeric($_GET['pagination']) ? $_GET['pagination'] : 1;
$num_results_on_page = 20;

if($user["level"]==10 || $user["level"]==0) {
    $dream = 'SELECT * FROM `anime` ORDER BY `name` ASC LIMIT ?,?';
} else {
    $dream = "SELECT * FROM `anime` WHERE `public`='1' ORDER BY `name` ASC LIMIT ?,?";
}

if($stmt = $conn->prepare($dream)) {
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();
}

?>

<title><?= $lang["browse"]["title"] ?> <?= $page ?> | <?= $config["name"] ?></title>

<?php if($user["level"]==10 || $user["level"]==0) { ?>
<p class="text-center"><a href="<?= $config["url"] ?>add_anime"><?= glyph("plus-sign",$lang["add_anime"]["title"]) ?> <?= $lang["add_anime"]["title"] ?></a></p>
<?php } ?>

<?php if(mysqli_num_rows($result)!==0) { ?>
<div class="row">
    <?php while ($row = $result->fetch_assoc()): ?>
    <div class="col-sm-2">
        <div class="thumbnail" style="height: <?php if($user["theme"]==0 || $user["theme"]==2) { ?>225px<?php } else { ?>210px<?php } ?>">
            <a href="<?= $config["url"] ?>anime/<?= $row["id"] ?>">
                <img src="<?= $config["url"] ?>assets/thumbs/<?= $row["id"] ?>.jpg" alt="<?= $row["name"] ?>'s Image" title="<?= $row["name"] ?>" width="100%">
                <div class="caption text-center" title="<?= $row["name"] ?>">
                    <?= shorten($row["name"]) ?>
                </div>
            </a>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php } else { ?>
<p><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["browse"]["none"] ?></p>
<?php } ?>

<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
<center>
    <ul class="pagination">
        <?php if ($page > 3): ?>
        <li class="start"><a href="<?= $config["url"]."browse" ?>">«</a></li>
        <?php endif; ?>

        <?php if ($page > 1): ?>
        <li class="prev"><a href="<?= $config["url"]."browse/" ?><?php echo $page-1 ?>">‹</a></li>
        <?php endif; ?>

        <?php if ($page-2 > 0): ?><li class="page"><a href="<?= $config["url"]."browse/" ?><?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
        <?php if ($page-1 > 0): ?><li class="page"><a href="<?= $config["url"]."browse/" ?><?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

        <li class="currentpage active"><a href="<?= $config["url"]."browse/" ?><?php echo $page ?>"><?php echo $page ?></a></li>

        <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?= $config["url"]."browse/" ?><?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
        <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="<?= $config["url"]."browse/" ?><?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
        <li class="next"><a href="p<?= $config["url"]."browse/" ?><?php echo $page+1 ?>">›</a></li>
        <?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
        <li class="end"><a href="<?= $config["url"]."browse/" ?><?php echo ceil($total_pages / $num_results_on_page) ?>">»</a></li>
        <?php endif; ?>
    </ul>
</center>
<?php endif; ?>
