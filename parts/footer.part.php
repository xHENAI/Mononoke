<?php // parts/footer.part.php - aniZero2 ?>

<footer class="footer">
    <p class="text-center text-muted">Copyright &copy; <?= date("Y") ?> <a href="<?= $config["url"] ?>"><?= $config["name"] ?></a> | Powered by <a href="https://github.com/xHENAI/Mononoke" target="_blank">Mononoke</a> <span class="label label-info"><?php include("version.txt"); ?></span></p>
</footer>

<script src="<?= $config["url"] ?>scripts/jquery.min.js"></script>
<script src="<?= $config["url"] ?>scripts/jquery.touchSwipe.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= $config["url"] ?>scripts/bootstrap/js/bootstrap.min.js"></script>
