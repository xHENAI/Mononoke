<?php // parts/footer.part.php - Mononoke ?>

<footer class="footer">
    <p class="text-center text-muted"><?= $lang["footer"]["copy"] ?> &copy; <?= date("Y") ?> <a href="<?= $config["url"] ?>"><?= $config["name"] ?></a> | <?= $lang["footer"]["power"] ?> <span class="label label-info"><?php include("version.txt"); ?></span></p>
</footer>

<script src="<?= $config["url"] ?>scripts/jquery.min.js"></script>
<script src="<?= $config["url"] ?>scripts/jquery.touchSwipe.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= $config["url"] ?>scripts/bootstrap/js/bootstrap.min.js"></script>
