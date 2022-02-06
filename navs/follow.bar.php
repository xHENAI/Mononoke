<?php if($anime["status"]==1) { ?>
Follow Anime Button
<?php } ?>
<?php if(!empty($anime["anisearch"])) { ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?= $lang["anime"]["anisearch"] ?></h3>
    </div>
    <a href="https://anisearch.com/anime/<?= $anime["anisearch"] ?>" target="_blank">
        <img src="<?= $config["url"] ?>assets/img/anisearch.png" alt="<?= $lang["anime"]["anisearch"] ?>" title="" style="width:100%">
    </a>
</div>
<?php } ?>
