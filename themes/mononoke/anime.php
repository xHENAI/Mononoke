<div class="wrapper">
    <div class="postbody">
        <article id="post-32" class="post-32 hentry" itemscope="itemscope" itemtype="http://schema.org/CreativeWorkSeries">
            <div class="ts-breadcrumb bixbox">
                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a rel="tab" itemprop="item" href="<?= $config["url"] ?>"><span itemprop="name"><?= $lang["home"] ?></span></a>
                        <meta itemprop="position" content="1">
                    </li> › <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a rel="tab" itemprop="item" href="<?= $config["url"] ?>animes"><span itemprop="name"><?= $lang["animes"] ?></span></a>
                        <meta itemprop="position" content="2">
                    </li> › <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a rel="tab" itemprop="item" href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/"><span itemprop="name"><?= $anime->getName() ?></span></a>
                        <meta itemprop="position" content="3">
                    </li>
                </ol>
            </div>
            <div class="bixbox animefull">
                <div class="bigcontent nobigcv">
                    <div class="thumbook">
                        <div class="thumb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"> <a href="<?= $anime->getCover() ?>" target="_blank" rel="tab"><img src="<?= $anime->getCover() ?>" alt="<?= $anime->getName() ?>" class="ts-post-image wp-post-image attachment-medium_large size-medium_large" loading="lazy" itemprop="image" width="247" height="350" /></a></div>
                        <div class="rt">
                            <?php if (!empty($anime->getTrailer())) { ?>
                                <a data-fancybox href="<?= $anime->getTrailer() ?>" class="trailerbutton" rel="tab" target="_blank"> <i class="fab fa-youtube"></i> <?= $lang["trailer"] ?> </a>
                            <?php } ?>
                            <?php if ($loggedin == true) { ?>
                                <div id="addbmcontainer" <?php if (empty($bookmark["id"])) { ?>style="display:block" <?php } else { ?>style="display:none" <?php } ?>>
                                    <form name="add_bookmark" method="GET" id="add_bookmark">
                                        <input type="number" style="display: none" name="anime" required value="<?= $anime->getId() ?>">
                                        <button type="submit" name="add_bookmark" id="add_bookmark" class="bookmark" data-id="32" style="width: 100%; border: 0;">
                                            <i class="far fa-bookmark" aria-hidden="true"></i> <?= $lang["bookmark"] ?>
                                        </button>
                                    </form>
                                </div>
                                <div id="updatebmcontainer" <?php if (empty($bookmark["id"])) { ?>style="display:none" <?php } else { ?>style="display:block" <?php } ?>>
                                    <form method="GET">
                                        <input type="number" id="animeid" style="display: none" name="anime" required value="<?= $anime->getId() ?>">
                                        <select class="bookmark" id="status" style="width: 100%; background: grey; margin-bottom: 7px" name="status">
                                            <option value="1" <?php if ($bookmark["status"] == 1) echo "selected"; ?>><?= $lang["plan_to_watch"] ?></option>
                                            <option value="2" <?php if ($bookmark["status"] == 2) echo "selected"; ?>><?= $lang["watching"] ?></option>
                                            <option value="3" <?php if ($bookmark["status"] == 3) echo "selected"; ?>><?= $lang["paused"] ?></option>
                                            <option value="4" <?php if ($bookmark["status"] == 4) echo "selected"; ?>><?= $lang["completed"] ?></option>
                                            <option value="5" <?php if ($bookmark["status"] == 5) echo "selected"; ?>><?= $lang["dropped"] ?></option>
                                        </select>
                                        <button type="submit" name="update_bookmark" id="update_bookmark" class="bookmark" data-id="32" style="width: 100%; border: 0; margin-bottom: 7px">
                                            <i class="fa fa-bookmark" aria-hidden="true"></i> <?= $lang["update"] ?>
                                        </button>
                                        <button type="submit" name="delete_bookmark" id="delete_bookmark" class="bookmark" data-id="32" style="width: 100%; border: 0; background: red">
                                            <i class="fa fa-times" aria-hidden="true"></i> <?= $lang["remove_bookmark"] ?>
                                        </button>
                                    </form>
                                </div>
                            <?php } ?>
                            <div class="bmc"><?= $anime->getViews() ?> <?= $lang["views"] ?></div>
                        </div>
                    </div>
                    <div class="infox">
                        <h1 class="entry-title" itemprop="name"><?= $anime->getName() ?></h1>
                        <div class="ninfo">
                            <div class="info-content">
                                <div class="spe">
                                    <span><b><?= $lang["status"] ?>:</b> <?= $anime->convertStatus() ?></span>
                                    <span><b><?= $lang["studio"] ?>:</b>
                                        <?php foreach ($studios as $stud) { ?>
                                            <a href="<?= $config["url"] ?>studio/<?= $stud["slug"] ?>"><?= $stud["name"] ?></a>
                                        <?php } ?>
                                    </span>
                                    <span><b><?= $lang["released"] ?>:</b> <?= !empty($anime->getReleased()) ? $anime->getReleased() : $lang["unknown"] ?></span>
                                    <span><b><?= $lang["duration"] ?>:</b> <?= $anime->getDuration() ?></span>
                                    <span><b><?= $lang["season"] ?>:</b> <?= !empty($anime->getSeason()) ? "<a href='{$config["url"]}season/{$season->getSlug()}'>{$season->getName()}</a>" : $lang["unknown"] ?></span>
                                    <span><b><?= $lang["country"] ?>:</b> <?= !empty($anime->getCountry()) ? $country->get($anime->getCountry()) : $lang["unknown"] ?></span>
                                    <span><b><?= $lang["type"] ?>:</b> <?= !empty($anime->getTypeID()) ? "<a href='{$config["url"]}type/{$type->getSlug()}'>{$type->getName()}</a>" : $lang["unknown"] ?></span>
                                    <span><b><?= $lang["episodes"] ?>:</b> <?= $anime->countEpisodes() ?></span>
                                    <span><b><?= $lang["censorship"] ?>:</b> <?= $anime->getCensored() ?></span>
                                    <?php if (!empty($anime->getCreatedBy())) { ?>
                                        <span><b><?= $lang["posted_by"] ?>:</b> <i class="fn"><?= "<a href='{$config["url"]}fan/{$creator["username"]}'>{$creator["username"]}</a>" ?></i></span>
                                    <?php } ?>
                                    <span><b><?= $lang["released_on"] ?>:</b> <?= $anime->time($anime->getAdded(), "readable") ?></span>
                                    <span><b><?= $lang["updated_on"] ?>:</b> <?= $anime->time($anime->getUpdated(), "readable") ?></span>
                                </div>
                                <div class="genxed">
                                    <?php foreach ($genres as $genre) { ?>
                                        <a href="<?= $config["url"] ?>genre/<?= $genre["slug"] ?>/"><?= $genre["name"] ?></a>
                                    <?php } ?>
                                </div>
                                <!--                                <div class="desc"> Watch streaming <b>Nande Koko ni Sensei ga!? English Subbed</b> on AnimeStream. You can also download free Nande Koko ni Sensei ga!? Eng Sub, don' t forget to watch online streaming of various quality 720P 360P 240P 480P according to your connection to save internet quota, Nande Koko ni Sensei ga!? on AnimeStream MP4 MKV hardsub softsub English subbed is already contained in the video.</div>-->
                                <div class="mindesc"><?= $anime->getTags() ?></div> <span class="alter"><?= $anime->getOtherNames() ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bixbox synp">
                <div class="releases">
                    <h2><?= $lang["synopsis_of"] ?> <b><?= $anime->getName() ?></b></h2>
                </div>
                <div class="entry-content" itemprop="description">
                    <p><?= nl2br($purifier->purify($anime->getSynopsis())) ?></p>
                </div>
            </div>
            <!--
            <div class="bixbox">
                <div class="releases">
                    <h3>Download episodes of <b><?= $anime->getName() ?></b></h3>
                </div>
                <div class="mctnx">
                    Download-system is coming soon!
                </div>
            </div>
-->
            <div class="bixbox bxcl epcheck" id="episodelist">
                <div class="releases">
                    <h2>
                        <?= $lang["watch"] ?> <?= $anime->getName() ?>
                        <?php if ($loggedin == true && $user->isMod($user->getLevel())) { ?>
                            [<a href="<?= $config["url"] . "admin/manage_episodes/" . $anime->getSlug() ?>/" style="background:darkblue;">Add/Manage Episode</a>]
                        <?php } ?>
                    </h2>
                </div>
                <?php if (!empty($istrack["id"])) { ?>
                    <div class="releases" id="ayololo" style="width: 100%">
                        <a href="<?= $config["url"] ?>watch/<?= $anime->getSlug() ?>/episode-<?= $istrack["episode_number"] . "-" . $istrack["type"] ?>" style="padding: 10px; text-align: center; min-width: 100%; background: #0c70de; color: #fff; border-radius: 5px;"><b><?= $lang["youtrack"] ?>:</b> <?= $lang["continue_watching_at_episode"] ?> <?= $istrack["episode_number"] ?> (<?= $istrack["type"] ?>)</a>
                    </div>
                <?php } ?>
                <div class="lastend">
                    <?php if (!empty($first_ep["episode"]) && !empty($last_ep["episode"])) { ?>
                        <div class="inepcx">
                            <a href="<?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $first_ep["episode"] . "-" . $first_ep["type"] ?>" rel="tab">
                                <span><?= $lang["first_episode"] ?></span> <span class="epcur epcurfirst"><?= $lang["episode"] ?> <?= $first_ep["episode"] ?></span>
                            </a>
                        </div>
                        <div class="inepcx">
                            <a href="<?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $last_ep["episode"] . "-" . $last_ep["type"] ?>" rel="tab">
                                <span><?= $lang["last_episode"] ?></span> <span class="epcur epcurlast"><?= $lang["episode"] ?> <?= $last_ep["episode"] ?></span>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="eplister">
                    <div class="ephead">
                        <div class="eph-num"><?= $lang["ep"] ?></div>
                        <div class="eph-title"><?= $lang["title"] ?></div>
                        <div class="eph-sub"><?= $lang["type"] ?></div>
                        <div class="eph-date"><?= $lang["released"] ?></div>
                    </div>
                    <ul>
                        <?php if (!empty($episodes)) { ?>
                            <?php foreach ($episodes as $ep) { ?>
                                <?php $episode = new Episode($ep["id"]); ?>
                                <li data-index="0">
                                    <a href="<?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $episode->getEpisode() . "-" . $episode->getType() ?>">
                                        <div class="epl-num"><?= $episode->getEpisode() ?></div>
                                        <div class="epl-title"><?= empty($episode->getTitle()) ? $anime->getName() . " Episode " . $episode->getEpisode() : $episode->getTitle() ?></div>
                                        <div class="epl-sub"><span class="status Sub"><?= $episode->convertType() ?></span></div>
                                        <div class="epl-date"><?= $anime->time($episode->getAdded(), "readable") ?></div>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <li data-index="0">
                                <a>
                                    <div class="epl-num"></div>
                                    <div class="epl-title"><?= $lang["there_are_no_episodes_at_the_moment"] ?></div>
                                    <div class="epl-sub"></div>
                                    <div class="epl-date"></div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php if ($total_pages <= 0) { ?>
                        <div class="hpage">
                            <a href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/page/1" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["first"] ?></a>
                            <a href="<?= $config["url"] . "anime/" . $anime->getSlug() . "/page/" . $prev_page ?>" class="r"><i class="fas fa-angle-left" aria-hidden="true"></i> <?= $lang["prev"] ?></a>
                            <a class="r"><?= "Page " . $pagination . " of " . $total_pages ?></a>
                            <a href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/page/<?= $next_page ?>" class="r"><?= $lang["next"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i></a>
                            <a href="<?= $config["url"] ?>anime/<?= $anime->getSlug() ?>/page/<?= $total_pages ?>" class="r"><?= $lang["last"] ?> <i class="fas fa-angle-right" aria-hidden="true"></i><i class="fas fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <script>
                /*<![CDATA[*/
                if (jQuery('.epcheck li').length < 1) jQuery('.epcheck').hide(); /*]]>*/
            </script>
            <?php if ($config["disqus"]["enabled"]) { ?>
                <div class="bixbox">
                    <div class="releases">
                        <h3><span><?= $lang["comments"] ?></span></h3>
                    </div>
                    <div class="cmt commentx">
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                            /*
                            var disqus_config = function () {
                            this.page.url = <?= $config["url"] . "anime/" . $anime->getSlug() ?>;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = <?= "anime." . $anime->getSlug() ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document,
                                    s = d.createElement('script');
                                s.src = 'https://<?= $config["disqus"] ?>.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>
            <?php } ?>
            <!--
            <div class="bixbox">
                <div class="releases">
                    <h3><span>Related Series</span></h3>
                </div>
                <div class="listupd">
                    This is still in work!
                </div>
            </div>
-->
        </article>
    </div>