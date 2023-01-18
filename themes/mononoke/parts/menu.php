</head>

<body id="cntnt" class="darkmode">
    <script>
        if (localStorage.getItem("thememode") == null) {
            if (defaultTheme == "lightmode") {
                jQuery("body").addClass("lightmode");
                jQuery("body").removeClass("darkmode");
            } else {
                jQuery("body").addClass("darkmode");
                jQuery("body").removeClass("lightmode");
            }
        } else if (localStorage.getItem("thememode") == "lightmode") {
            jQuery("body").addClass("lightmode");
            jQuery("body").removeClass("darkmode");
        } else {
            jQuery("body").addClass("darkmode");
            jQuery("body").removeClass("lightmode");
        }
    </script>

    <div id='shadow'></div>

    <div class="th">
        <div class="centernav bound">
            <div class="shme"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <header class="mainheader" role="banner" itemscope itemtype="http://schema.org/WPHeader">
                <div class="site-branding logox">
                    <h1 class="logos">
                        <a title="<?= $config["title"] ?>" itemprop="url" href="<?= $url ?>">
                            <?php if ($config["logo"]["type"] == "img" || $config["logo"]["type"] == "both") { ?>
                                <img src="<?= $config["url"] . $config["logo"] ?>" alt="<?= $config["title"] ?>">
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
            </header>
            <div class="searchx topcon">
                <form action="<?= $url ?>animes" id="form" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" rel="tab">
                    <meta itemprop="target" content="<?= $config["url"] ?>search/?s={query}" /> <input id="s" itemprop="query-input" class="search-live" <?= isset($_GET["title"]) ? 'value="' . $conn->escape($purifier->purify($_GET["title"])) . '"' : "" ?> type="text" placeholder="<?= $lang["search"] ?>..." name="title"> <button type="submit" id="submitsearch"><i class="fas fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            <div id="thememode"> <label class="switch"> <input type="checkbox" checked> <span class="slider round"></span> </label></div>
            <script>
                if (localStorage.getItem("thememode") == null) {
                    if (defaultTheme == "lightmode") {
                        // jQuery(".logos img").attr('src', '<?= $config["url"] . $config["logo"]["url"] ?>');
                        jQuery("#thememode input[type='checkbox']").prop('checked', false);
                    } else {
                        // jQuery(".logos img").attr('src', '<?= $config["url"] . $config["logo"]["url"] ?>');
                        jQuery("#thememode input[type='checkbox']").prop('checked', true);
                    }
                } else if (localStorage.getItem("thememode") == "lightmode") {
                    // jQuery(".logos img").attr('src', '<?= $config["url"] . $config["logo"]["url"] ?>');
                    jQuery("#thememode input[type='checkbox']").prop('checked', false);
                } else {
                    // jQuery(".logos img").attr('src', '<?= $config["url"] . $config["logo"]["url"] ?>');
                    jQuery("#thememode input[type='checkbox']").prop('checked', true);
                }
            </script> <span class="topmobile"><i class="fa fa-th-large" aria-hidden="true"></i></span>
            <div id="top-menu" class="topmobcon">
                <div class="menu-top-container">
                    <ul id="menu-top" class="menu">
                        <li id="menu-item-263" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-263"><a rel="tab" href="<?= $url ?>seasons/" itemprop="url"><?= $lang["seasons"] ?></a></li>
                        <li id="menu-item-264" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-264"><a rel="tab" href="<?= $url ?>genres/" itemprop="url"><?= $lang["genres"] ?></a></li>
                        <li id="menu-item-265" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-265"><a rel="tab" href="<?= $url ?>studios/" itemprop="url"><?= $lang["studios"] ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav id="main-menu" class="mm">
        <div class="centernav">
            <div class="bound">
                <span itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement" role="navigation">
                    <ul id="menu-menu" class="menu">
                        <li id="menu-item-15" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-15"><a rel="tab" href="<?= $url ?>" aria-current="page" itemprop="url"><span itemprop="name"><?= $lang["home"] ?></span></a></li>
                        <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a rel="tab" href="<?= $url ?>animes/" itemprop="url"><span itemprop="name"><?= $lang["animes"] ?></span></a></li>
                        <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13"><a rel="tab" href="<?= $url ?>az-list/" itemprop="url"><span itemprop="name"><?= $lang["az-list"] ?></span></a></li>
                        <li id="menu-item-13" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-13"><a rel="tab" href="<?= $url ?>users/" itemprop="url"><span itemprop="name"><?= $lang["users"] ?></span></a></li>
                        <li id="menu-item-44" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44"><a rel="tab" href="<?= $url ?>bookmarks/" itemprop="url"><span itemprop="name"><?= $lang["bookmarks"] ?></span></a></li>
                        <?php if ($loggedin == true && ($user->getLevel() == 0 || $user->getLevel() == 10)) { ?>
                            <li id="menu-item-44" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-44"><a rel="tab" href="<?= $url ?>admin/" itemprop="url"><span itemprop="name"><?= $lang["admin"] ?></span></a></li>
                        <?php } ?>
                    </ul>
                </span>
                <a rel="tab" href="<?= $url ?>random" class="surprise"><i class="far fa-star" aria-hidden="true"></i> <?= $lang["surprise"] ?></a>
                <div class="clear"></div>
            </div>
        </div>
    </nav>

    <div id="content">