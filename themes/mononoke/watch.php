<script>
    var childWindowUrl = "<?= $config["url"] . "report?type=stream&url=" . $mainstream["url"] ?>";
</script>

<div class="wrapper">
    <div class="pd-expand"></div>
    <div class="postbody">
        <article id="post-208" class="post-208 hentry" itemscope="itemscope" itemtype="http://schema.org/Episode">
            <div class="ts-breadcrumb bixbox">
                <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?= $config["url"] ?>"><span itemprop="name"><?= $lang["home"] ?></span></a>
                        <meta itemprop="position" content="1">
                    </li> › <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?= $config["url"] . "animes/" ?>"><span itemprop="name"><?= $lang["animes"] ?></span></a>
                        <meta itemprop="position" content="2">
                    </li> › <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?= $config["url"] . "anime/" . $anime->getSlug() ?>/""><span itemprop=" name"><?= $anime->getName() ?></span></a>
                        <meta itemprop="position" content="3">
                    </li> › <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"> <a itemprop="item" href="<?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $ep->getEpisode() . "-" . $ep->getType() ?>"><span itemprop="name"><?= empty($ep->getTitle()) ? $lang["episode"] . " " . $ep->getEpisode() : $lang["episode"] . " " . $ep["episode"] . ": " . $ep["title"] ?></span></a>
                        <meta itemprop="position" content="4">
                    </li>
                </ol>
            </div>
            <div class="megavid">
                <div class="mvelement">
                    <div class="item meta">
                        <div class="tb" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <img width="225" height="289" src="<?= $anime->getCover() ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image loading" alt="<?= $anime->getName() ?>" loading="lazy">
                            <meta itemprop="url" content="<?= $anime->getCover() ?>">
                            <meta itemprop="width" content="190">
                            <meta itemprop="height" content="260">
                        </div>
                        <div class="lm">
                            <div class="title-section">
                                <h1 class="entry-title" itemprop="name"><?= $anime->getName() . " - " . $lang["episode"] . " " . $ep->getEpisode() ?> <?= !empty($ep->getTitle()) ? ": " . $ep->getTitle() : "" ?> (<?= $ep->convertType() ?>)</h1>
                            </div>
                        </div>
                    </div>
                    <div class="video-content">
                        <div id="embed_holder" class="lowvid">
                            <div class="player-embed" id="pembed"><iframe id="animeplayer" width="560" height="315" src="<?= $mainstream["url"] ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="Video Player"></iframe></div>
                        </div>
                    </div>
                    <div class=" item video-nav">
                        <div class="mobius">
                            <select class="mirror" name="mirror" onchange="loadPlayer(this.value);">
                                <option value="" disabled selected><?= $lang["select_video_server"] ?></option>
                                <?php if (!empty($streams)) { ?>
                                    <?php foreach ($streams as $stream) { ?>
                                        <option value="<?= $stream["url"] ?>" <?= $mainstream["url"] == $stream["url"] ? "selected" : "" ?>><?= $stream["host"] ?></option>
                                    <?php } ?>
                                <?php } else { ?>
                                    <option selected disabled value="#"><?= $lang["there_are_no_streams_at_the_moment"] ?></option>
                                <?php } ?>
                            </select>
                            <div class="iconx">
                                <!-- <div class="icol"><a href="<?= $config["url"] . "report?type=stream&url=" . $mainstream["url"] ?>" id="reportstream"><?= $lang["report_stream"] ?></a></div> -->
                                <div class="icol"><a href="#" id="reportstream" onclick="childWindow = window.open(childWindowUrl);"><?= $lang["report_stream"] ?></a></div>
                                <div class="icol expand"><i class="fa fa-expand" aria-hidden="true"></i> <span><?= $lang["expand_reloads_video"] ?></span></div>
                                <div class="icol light"><i class="far fa-lightbulb"></i> <span><?= $lang["turn_off_light"] ?></span></div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function loadPlayer(vsrc) {
                            var player = document.getElementById("animeplayer"); // Get Player by ID
                            var report = document.getElementById("reportstream"); // Get Report-Button by ID
                            player.src = vsrc; // Update Player SRC
                            // report.setAttribute("href", "<?= $config["url"] ?>report?type=stream&url=" + vsrc); // Update Report-Button Link
                            var childWindowUrl = "<?= $config["url"] ?>report?type=stream&url=" + vsrc; // Update Report-Button Link
                        }
                    </script>
                    <div class="naveps bignav">
                        <div class="nvs">
                            <?php if (empty($prev_ep["id"])) { ?>
                                <span class="nolink">
                                    <i class="fas fa-angle-left"></i> <span class="tex"> <?= $lang["prev"] ?></span>
                                </span>
                            <?php } else { ?>
                                <a href="<?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $prev_ep["episode"] . "-" . $prev_ep["type"] ?>">
                                    <i class="fas fa-angle-left"></i> <span class="tex"><?= $lang["prev"] ?></span>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="nvs nvsc">
                            <a href='<?= $config["url"] . "anime/" . $anime->getSlug() . "/#episodelist" ?>'>
                                <i class="fas fa-th-list"></i> <span class="tex"><?= $lang["all_episodes"] ?></span>
                            </a>
                        </div>
                        <div class="nvs">
                            <?php if (empty($next_ep["id"])) { ?>
                                <span class="nolink">
                                    <span class="tex"><?= $lang["next"] ?> </span> <i class="fas fa-angle-right"></i>
                                </span>
                            <?php } else { ?>
                                <a href="<?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $next_ep["episode"] . "-" . $next_ep["type"] ?>">
                                    <span class="tex"><?= $lang["next"] ?> </span> <i class="fas fa-angle-right"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobilepisode"></div>
            <div class="entry-content">
                <div class="bixbox infx">
                    <p>
                        Download <b><?= $anime->getName() . " - " . $lang["episode"] . " " . $ep->getEpisode() ?> <?= !empty($ep->getTitle()) ? ": " . $ep->getTitle() : "" ?> (<?= $ep->convertType() ?>)</b>,
                        Watch <b><?= $anime->getName() . " - " . $lang["episode"] . " " . $ep->getEpisode() ?> <?= !empty($ep->getTitle()) ? ": " . $ep->getTitle() : "" ?> (<?= $ep->convertType() ?>)</b>, don't forget to share it with your friends.
                        Watch <b><?= $anime->getName() . " - " . $lang["episode"] . " " . $ep->getEpisode() ?> <?= !empty($ep->getTitle()) ? ": " . $ep->getTitle() : "" ?> (<?= $ep->convertType() ?>)</b> always updated at <?= $config["title"] ?>.
                        Don't forget to watch other Anime updates.
                    </p>
                </div>
            </div>
            <div class="single-info bixbox">
                <div class="thumb"> <img src="<?= $anime->getCover() ?>" class="ts-post-image wp-post-image attachment-medium_large size-medium_large loading" loading="lazy" itemprop="image" title="<?= $anime->getName() ?>" alt="<?= $anime->getName() ?>" width="247" height="350"></div>
                <div class="infox">
                    <div class="infolimit">
                        <h2 itemprop="partOfSeries"><a href="<?= $config["url"] . "anime/" . $anime->getSlug() ?>/"><?= $anime->getName() ?></a></h2>
                        <span class="alter"><?= $anime->getOtherNames() ?></span>
                    </div>
                    <div class="rating"> <strong>Rating in Work!</strong>
                        <div class="rating-prc">
                            <div class="rtp">
                                <!-- <div class="rtb"><span style="width:75.6%"></span></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="info-content">
                        <div class="spe">
                            <span><b>Status:</b> <?= $anime->convertStatus() ?></span>
                            <span><b>Studio:</b>
                                <?php foreach ($studios as $stud) { ?>
                                    <a href="<?= $config["url"] ?>studio/<?= $stud["slug"] ?>"><?= $stud["name"] ?></a>
                                <?php } ?></span>
                            <span class="split">
                                <b>Released:</b> <?= !empty($anime->getReleased()) ? $anime->getReleased() : $lang["unknown"] ?>
                            </span>
                            <span><b>Duration:</b> <?= $anime->getDuration() ?></span>
                            <span><b>Season:</b> <?= !empty($anime->getSeason()) ? "<a href='{$config["url"]}season/{$season->getSlug()}'>{$season->getName()}</a>" : $lang["unknown"] ?></span>
                            <span><b>Country:</b> <?= !empty($anime->getCountry()) ? $country->get($anime->getCountry()) : $lang["unknown"] ?></span>
                            <span><b>Type:</b> <?= !empty($anime->getTypeID()) ? "<a href='{$config["url"]}type/{$type->getSlug()}'>{$type->getName()}</a>" : $lang["unknown"] ?></span>
                            <span><b>Episodes:</b> <?= $anime->countEpisodes() ?></span>
                            <span><b>Censor:</b> <?= $anime->getCensored() ?></span>
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
                        <div class="desc mindes">
                            <?= nl2br($purifier->purify($anime->getSynopsis())) ?>
                            <span class="colap"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bixbox">
                <div class="releases">
                    <h3><span>Recommended Series</span></h3>
                </div>
                <div class="listupd">
                    <p>This feature is still in work!</p>
                </div>
            </div>
            <div class="bixbox">
                <div class="releases">
                    <h3><span>Comment</span></h3>
                </div>
                <div class="cmt commentx">
                    <?php if ($config["disqus"]["enabled"]) { ?>
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                            /*
                            var disqus_config = function () {
                            this.page.url = <?= $config["url"] . "watch/" . $anime->getSlug() . "/episode-" . $ep->getEpisode() . "-" . $ep->getType() ?>;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = <?= "watch." . $anime->getSlug() . ".episode-" . $ep->getEpisode() . "-" . $ep->getType() ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document,
                                    s = d.createElement('script');
                                s.src = 'https://<?= $config["disqus"]["key"] ?>.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    <?php } ?>
                </div>
            </div>
            <meta itemprop="author" content="<?= $creator["username"] ?>">
            <meta itemprop="datePublished" content="<?= $anime->time($anime->getAdded(), "readable") ?>">
            <meta itemprop="dateModified" content="<?= $anime->time($anime->getUpdated(), "readable") ?>">
            <span style="display: none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <span style="display: none;" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <meta itemprop="url" content="<?= $config["asset_url"] . $config["logo"] ?>">
                </span>
                <meta itemprop="name" content="<?= $config["title"] ?>">
            </span>
        </article>
    </div>