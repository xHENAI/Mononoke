</div>
</div>

<div id="footer">
    <footer id="colophon" class="site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter" role="contentinfo">
        <div class="footermenu">
            <div class="menu-footer-container">
                <ul id="menu-footer" class="menu">
                    <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a rel="" href="<?= $url ?>" itemprop="url"><?= $lang["home"] ?></a></li>
                    <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a rel="" href="<?= $url ?>animes/" itemprop="url"><?= $lang["animes"] ?></a></li>
                    <li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19"><a rel="" href="<?= $url ?>az-list/" itemprop="url"><?= $lang["az-list"] ?></a></li>
                    <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20"><a rel="" href="<?= $url ?>bookmarks/" itemprop="url"><?= $lang["bookmarks"] ?></a></li>
                    <?php if ($loggedin == true && $user->isMod($user->getLevel())) { ?>
                        <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20"><a rel="" href="<?= $url ?>admin/" itemprop="url"><?= $lang["admin"] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="footercopyright">
            <div class="footer-az"> <span class="ftaz">A-Z LIST</span><span class="size-s">Search Animes by their initials</span>
                <ul class="ulclear az-list">
                    <li><a href="<?= $url ?>az-list/A" rel="">A</a></li>
                    <li><a href="<?= $url ?>az-list/C" rel="">C</a></li>
                    <li><a href="<?= $url ?>az-list/D" rel="">D</a></li>
                    <li><a href="<?= $url ?>az-list/B" rel="">B</a></li>
                    <li><a href="<?= $url ?>az-list/E" rel="">E</a></li>
                    <li><a href="<?= $url ?>az-list/F" rel="">F</a></li>
                    <li><a href="<?= $url ?>az-list/G" rel="">G</a></li>
                    <li><a href="<?= $url ?>az-list/H" rel="">H</a></li>
                    <li><a href="<?= $url ?>az-list/I" rel="">I</a></li>
                    <li><a href="<?= $url ?>az-list/J" rel="">J</a></li>
                    <li><a href="<?= $url ?>az-list/K" rel="">K</a></li>
                    <li><a href="<?= $url ?>az-list/L" rel="">L</a></li>
                    <li><a href="<?= $url ?>az-list/M" rel="">M</a></li>
                    <li><a href="<?= $url ?>az-list/N" rel="">N</a></li>
                    <li><a href="<?= $url ?>az-list/O" rel="">O</a></li>
                    <li><a href="<?= $url ?>az-list/P" rel="">P</a></li>
                    <li><a href="<?= $url ?>az-list/Q" rel="">Q</a></li>
                    <li><a href="<?= $url ?>az-list/R" rel="">R</a></li>
                    <li><a href="<?= $url ?>az-list/S" rel="">S</a></li>
                    <li><a href="<?= $url ?>az-list/T" rel="">T</a></li>
                    <li><a href="<?= $url ?>az-list/U" rel="">U</a></li>
                    <li><a href="<?= $url ?>az-list/V" rel="">V</a></li>
                    <li><a href="<?= $url ?>az-list/W" rel="">W</a></li>
                    <li><a href="<?= $url ?>az-list/X" rel="">X</a></li>
                    <li><a href="<?= $url ?>az-list/Y" rel="">Y</a></li>
                    <li><a href="<?= $url ?>az-list/Z" rel="">Z</a></li>
                </ul>
            </div>
            <div class="copyright">
                <div class="footer-logo">
                    <h1 class="logos">
                        <a title="<?= $config["title"] ?>" itemprop="url" href="<?= $url ?>">
                            <?php if ($config["logo"]["type"] == "img" || $config["logo"]["type"] == "both") { ?>
                                <img src="<?= $config["url"] . $config["logolight"] ?>" alt="<?= $config["title"] ?>">
                            <?php } ?>
                            <?php if ($config["logo"]["type"] == "text" || $config["logo"]["type"] == "both") { ?>
                                <span>
                                    <?= $config["title"] ?>
                                </span>
                            <?php } ?>
                        </a>
                    </h1>
                    <meta itemprop="name" content="<?= $config["title"] ?>" />
                </div>
                <div style="text-align: left; margin-top: -5px;"> <span>Copyright © <?= date("Y") ?> <?= $config["title"] ?>. All Rights Reserved</span>
                    <p>Disclaimer: This site, <i><?= $config["title"] ?></i>, does not store any files on its server. All contents are provided by non-affiliated third parties.</p>
                    <p>Proudly presented by <a href="https://github.com/xHENAI/Mononoke" target="_blank">Mononoke</a> by <a href="https://h33t.moe" target="_blank">The H33T.moe Project</a> and <a href="https://henai.eu" target="_blank">HENAI.eu</a> and <a href="https://themesia.com/animestream-wordpress-theme/" target="_blank">AnimeStream by Themesia</a>.</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    jQuery("#thememode input[type='checkbox']").on('change', function() {
        var is_on = jQuery("#thememode input[type='checkbox']").prop("checked");
        if (is_on == false) {
            localStorage.setItem("thememode", "lightmode");
            jQuery("body").addClass("lightmode");
            jQuery("body").removeClass("darkmode");
        } else {
            localStorage.setItem("thememode", "darkmode");
            jQuery("body").removeClass("lightmode");
            jQuery("body").addClass("darkmode");
        }
    });
</script>
<script type='text/javascript' src='<?= $config["asset_url"] ?>js/jquery.qtip.min.js' id='qtip-js'></script>
<script type='text/javascript' src='<?= $config["asset_url"] ?>js/filter.js' id='filter-js'></script>
<script type='text/javascript' src='<?= $config["asset_url"] ?>js/imagesloaded.pkg.min.js' id='imagesloaded-js'></script>

</body>

</html>