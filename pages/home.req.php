<?php

// pages/home.req.php - Mononoke

if($config["scraper"]==false) {
    if($user["level"]==10 || $user["level"]==0) {
        $carousel_first = $conn->query("SELECT * FROM `anime` ORDER BY rand() LIMIT 1");
        $carousel = $conn->query("SELECT * FROM `anime` ORDER BY rand() LIMIT 9");
        $recent_episodes = $conn->query("SELECT * FROM `episode` ORDER BY `id` DESC LIMIT 16");
        $recent_animes = $conn->query("SELECT * FROM `anime` ORDER BY `id` DESC LIMIT 16");
    } else {
        $carousel_first = $conn->query("SELECT * FROM `anime` WHERE `public`='1' ORDER BY rand() LIMIT 1");
        $carousel = $conn->query("SELECT * FROM `anime` WHERE `public`='1' ORDER BY rand() LIMIT 9");
        $recent_episodes = $conn->query("SELECT * FROM `episode` WHERE `deleted`='0' ORDER BY `id` DESC LIMIT 16");
        $recent_animes = $conn->query("SELECT * FROM `anime` WHERE `public`='1' ORDER BY `id` DESC LIMIT 16");
    }

    $carousel_first = mysqli_fetch_assoc($carousel_first);
} else {
    
}


?>

<div class="row">
    <div class="col-sm-12">
        <h3><?= $lang["home"]["explore"] ?></h3>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                <li data-target="#carousel-example-generic" data-slide-to="9"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?php if($config["scraper"]==false) { ?>
                    <a href="<?= $config["url"] ?>anime/<?= $carousel_first["id"] ?>">
                        <img src="<?= $config["url"] ?>assets/banner/<?= $carousel_first["id"] ?>.jpg" alt="...">
                        <div class="carousel-caption">
                            <h3 class="image-shadow"><?= $carousel_first["name"] ?></h3>
                            <p class="image-shadow">
                                <?php if(!empty($carousel_first["description"])) { ?>
                                <?= shorten(bbconvert($carousel_first["description"])) ?>
                                <br>
                                <?php } ?>
                                <?php if(!empty($carousel_first["year"])) { echo $lang["anime"]["year"]." ".$carousel_first["year"]." | "; } ?>
                                <?php if($carousel_first["status"]==0) { ?>
                                <?= $lang["anime"]["status"]["0"] ?>
                                <?php } elseif($carousel_first["status"]==1) { ?>
                                <?= $lang["anime"]["status"]["1"] ?>
                                <?php } else { ?>
                                <?= $lang["anime"]["status"]["2"] ?>
                                <?php } ?>
                            </p>
                        </div>
                    </a>
                    <?php } else {
    
                    $carousel_first = "https://api.jikan.moe/v4/random/anime";

                    $curl = curl_init($carousel_first);
                    curl_setopt($curl, CURLOPT_URL, $carousel_first);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    //for debug only!
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $carousel_first = curl_exec($curl);
                    curl_close($curl);
    
                    $carousel_first = json_decode($carousel_first, true);
                    ?>
                    <a href="<?= $config["url"] ?>anime/<?= $carousel_first["data"]["mal_id"] ?>">
                        <img src="<?= $carousel_first["data"]["images"]["jpg"]["image_url"] ?>" alt="...">
                        <div class="carousel-caption">
                            <h3 class="image-shadow"><?= $carousel_first["data"]["title"] ?></h3>
                            <p class="image-shadow">
                                <?php if(!empty($carousel_first["data"]["synopsis"])) { ?>
                                <?= shorten($carousel_first["data"]["synopsis"], 300) ?>
                                <br>
                                <?php } ?>
                                <?= $carousel_first["data"]["status"] ?> | <?= $carousel_first["data"]["aired"]["prop"]["from"]["year"] ?>
                            </p>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <?php if($config["scraper"]==false) { ?>
                <?php
    if($carousel->num_rows > 0) {
        while($anime = $carousel->fetch_assoc()) { ?>
                <div class="item">
                    <a href="<?= $config["url"] ?>anime/<?= $anime["id"] ?>">
                        <img src="<?= $config["url"] ?>assets/banner/<?= $anime["id"] ?>.jpg" alt="...">
                        <div class="carousel-caption">
                            <h3 class="image-shadow"><?= $anime["name"] ?></h3>
                            <p class="image-shadow">
                                <?php if(!empty($anime["description"])) { ?>
                                <?= shorten(bbconvert($anime["description"])) ?>
                                <br>
                                <?php } ?>
                                <?php if(!empty($anime["year"])) { echo $lang["anime"]["year"]." ".$anime["year"]." | "; } ?>
                                <?php if($anime["status"]==0) { ?>
                                <?= $lang["anime"]["status"]["0"] ?>
                                <?php } elseif($anime["status"]==1) { ?>
                                <?= $lang["anime"]["status"]["1"] ?>
                                <?php } else { ?>
                                <?= $lang["anime"]["status"]["2"] ?>
                                <?php } ?>
                            </p>
                        </div>
                    </a>
                </div>
                <?php }
    }
} else {
    
    for($i = 1; $i <= 9; $i++) {
        
                $item = "https://api.jikan.moe/v4/random/anime";

                    $curl = curl_init($item.$i);
                    curl_setopt($curl, CURLOPT_URL, $item);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    //for debug only!
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $item = curl_exec($curl);
                    curl_close($curl);
    
                    $item = json_decode($item, true);
                    ?>
                <div class="item">
                    <a href="<?= $config["url"] ?>anime/<?= $item["data"]["mal_id"] ?>">
                        <img src="<?= $item["data"]["images"]["jpg"]["image_url"] ?>" alt="...">
                        <div class="carousel-caption">
                            <h3 class="image-shadow"><?= $item["data"]["title"] ?></h3>
                            <p class="image-shadow">
                                <?php if(!empty($item["data"]["synopsis"])) { ?>
                                <?= shorten($item["data"]["synopsis"], 300) ?>
                                <br>
                                <?php } ?>
                                <?= $item["data"]["status"] ?> | <?= $item["data"]["aired"]["prop"]["from"]["year"] ?>
                            </p>
                        </div>
                    </a>
                </div>
    <?php } 
    ?>
                <?php } ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <hr>

    <div class="col-sm-12">
        <h3><?= $lang["home"]["recent_episodes"] ?></h3>
        <?php if(mysqli_num_rows($recent_episodes)!==0) { ?>
        <div class="row">
            <?php while ($row = $recent_episodes->fetch_assoc()):
                $anime = $conn->query("SELECT * FROM `anime` WHERE `id`='".$row["anime"]."' LIMIT 1");
                                                         $anime = mysqli_fetch_assoc($anime);
            ?>
            <div class="col-sm-2">
                <div class="thumbnail" style="height: <?php if($user["theme"]==0 || $user["theme"]==2) { ?>245px<?php } else { ?>230px<?php } ?>">
                    <a href="<?= $config["url"] ?>watch/<?= $anime["id"] ?>-<?= $row["episode"] ?>-<?= $row["type"] ?>">
                        <img src="<?= $config["url"] ?>assets/thumbs/<?= $anime["id"] ?>.jpg" alt="<?= $anime["name"] ?>'s Image" title="<?= $anime["name"]." ".$lang["episode"]["name"]." ".$row["episode"] ?>" width="100%">
                        <div class="caption text-center" title="<?= $anime["name"] ?>">
                            <span class="badge"><?= $lang["episode"]["name"]." ".$row["episode"] ?></span> <b><?= shorten($anime["name"],20) ?></b> (<?= ago($row["added"]) ?>)
                        </div>
                    </a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php } else { ?>
        <p><?= glyph("info-sign",$lang["error"]) ?> <?= $lang["browse"]["none"] ?></p>
        <?php } ?>

        <p class="text-center"><a href="<?= $config["url"] ?>newest/ep" class="btn btn-warning"><?= glyph("time",$lang["home"]["browse_episodes"]) ?> <?= $lang["home"]["browse_episodes"] ?></a></p>
    </div>

    <hr>

    <div class="col-sm-12">
        <h3><?= $lang["home"]["recent_animes"] ?></h3>
        <?php if(mysqli_num_rows($recent_animes)!==0) { ?>
        <div class="row">
            <?php while ($row = $recent_animes->fetch_assoc()): ?>
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
        <p class="text-center"><a href="<?= $config["url"] ?>newest/an" class="btn btn-success"><?= glyph("time",$lang["home"]["browse_ranime"]) ?> <?= $lang["home"]["browse_ranime"] ?></a> <a href="<?= $config["url"] ?>browse" class="btn btn-info"><?= glyph("list",$lang["home"]["browse_anime"]) ?> <?= $lang["home"]["browse_anime"] ?></a></p>
    </div>

</div>

<script>
    $('.carousel').carousel({
        interval: 1000
    })

</script>
