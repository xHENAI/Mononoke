<?php

// pages/browse.req.php - Mononoke

$total_pages = $conn->query('SELECT COUNT(*) FROM `anime`')->fetch_row()[0];
$page = isset($_GET['pagination']) && is_numeric($_GET['pagination']) ? $_GET['pagination'] : 1;
$num_results_on_page = 20;

if ($stmt = $conn->prepare('SELECT * FROM `anime` ORDER BY `id` ASC LIMIT ?,?')) {
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	$result = $stmt->get_result();
	$stmt->close();
}

?>

<title>Browse Anime - Page <?= $page ?> | <?= $config["name"] ?></title>

<?php if($user["level"]==10 || $user["level"]==0) { ?>
<p class="text-center"><a href="<?= $config["url"] ?>add_anime"><?= glyph("plus-sign","Add new Anime") ?> Add new Anime!</a></p>
<?php } ?>

<?php if(mysqli_num_rows($result)!==0) { ?>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['age']; ?></td>
    <td><?php echo $row['joined']; ?></td>
</tr>
<?php endwhile; ?>
<?php } else { ?>
<p><?= glyph("info-sign","Error") ?> No Animes found on this Page!</p>
<?php } ?>

<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
<ul class="pagination">
	<?php if ($page > 1): ?>
	<li class="prev"><a href="pagination.php?page=<?php echo $page-1 ?>">Prev</a></li>
	<?php endif; ?>

	<?php if ($page > 3): ?>
	<li class="start"><a href="pagination.php?page=1">1</a></li>
	<li class="dots">...</li>
	<?php endif; ?>

	<?php if ($page-2 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
	<?php if ($page-1 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

	<li class="currentpage"><a href="pagination.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

	<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
	<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

	<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
	<li class="dots">...</li>
	<li class="end"><a href="pagination.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
	<?php endif; ?>

	<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
	<li class="next"><a href="pagination.php?page=<?php echo $page+1 ?>">Next</a></li>
	<?php endif; ?>
</ul>
<?php endif; ?>