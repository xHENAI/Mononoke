<?php if ($loggedin == false) { ?>
    <div id="wrapper">
        <div class="postbody">
            <div class="bixbox">
                <div class="releases">
                    <h1><span><?= $lang["error_you_are_not_logged_in"] ?></span></h1>
                </div>
                <div class="page">
                    <p><b><?= $lang["this_page_requires_you_to_have_an_account"] ?></b></p>
                    <div class="lastend">
                        <div class="inepcx"> <a href="<?= $config["url"] ?>login" rel="tab"> <span><?= $lang["i_already_have_an_account"] ?></span> <span class="epcur epcurfirst"><?= $lang["login"] ?></span> </a></div>
                        <div class="inepcx"> <a href="<?= $config["url"] ?>signup" rel="tab"> <span><?= $lang["i_dont_have_one_yet"] ?></span> <span class="epcur epcurlast"><?= $lang["signup"] ?></span> </a></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div id="wrapper">
            <div class="postbody">
                <div class="bixbox">
                    <div class="releases">
                        <h1><span><?= $tracker->getName() . "'s " . $lang["bookmarks"] ?></span></h1>
                    </div>
                    <div class="page">
                        <div class="hpage">
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=planned" class="r" rel="tab" style="width: 19%; <?php if ($tab == "planned") echo "background: green;"; ?>"><?= $lang["planned_to_watch"] ?></a>
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=watching" class="r" rel="tab" style="width: 19%; <?php if ($tab == "watching") echo "background: green;"; ?>"><?= $lang["watching"] ?></a>
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=paused" class="r" rel="tab" style="width: 19%; <?php if ($tab == "paused") echo "background: green;"; ?>"><?= $lang["paused"] ?></a>
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=completed" class="r" rel="tab" style="width: 19%; <?php if ($tab == "completed") echo "background: green;"; ?>"><?= $lang["completed"] ?></a>
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=dropped" class="r" rel="tab" style="width: 19%; <?php if ($tab == "dropped") echo "background: green;"; ?>"><?= $lang["dropped"] ?></a>
                        </div>
                        <?php
                        if (!empty($bookmarks)) { ?>
                            <div class="eplister bxcl epcheck" id="episodelist" style="overflow:visible">
                                <div class="ephead">
                                    <div class="eph-title" style="text-align: center"><?= $lang["anime"] ?></div>
                                    <div class="eph-sub" style="text-align: center"><?= $lang["watched"] ?></div>
                                    <div class="eph-sub" style="text-align: center"><?= $lang["episodes"] ?></div>
                                </div>
                                <ul>
                                    <?php foreach ($bookmarks as $bm) { ?>
                                        <?php $anime = new Anime($bm["anime_id"]); ?>
                                        <?php $watched = $conn->where("user_id", $tracker->getId())->where("anime_id", $anime->getId())->getOne("tracked"); ?>
                                        <li data-index="0">
                                            <a href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/">
                                                <div class="epl-title"><?= $anime->getName() ?></div>
                                                <div class="epl-sub" style="text-align: center"><?= !empty($watched["id"]) ? $watched["episode_number"] : "-" ?></div>
                                                <div class="epl-sub" style="text-align: center"><?= $anime->countEpisodes() ?></div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <p style="text-align: center"><?= $lang["there_are_no_animes_at_the_moment_in_this_tab"] ?></p>
                        <?php } ?>
                        <div class="hpage">
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=<?= $tab ?>&page=1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=<?= $tab ?>&page=<?= $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                            <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=<?= $tab ?>&page=<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                            <a href="<?= $config["url"] ?>bookmarks/?user=<?= $tracker->getName() ?>&tab=<?= $tab ?>&page=<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>