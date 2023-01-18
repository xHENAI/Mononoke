<div id="sidebar">
    <div class="section">
        <div class="releases">
            <h3>Your Account</h3> <?php if ($loggedin == true) { ?><a class="vl" href="<?= $url ?>fan/<?= $user->getName() ?>" rel="tab">Your Profile</a><?php } ?>
        </div>
        <div class="serieslist">
            <ul>
                <?php if ($loggedin == true) { ?>
                    <li><a href="<?= $url ?>settings" rel="tab">Account Settings</a></li>
                    <li><a href="<?= $url ?>logout" rel="tab">Log out...</a></li>
                <?php } else { ?>
                    <li>You aren't logged in!</li>
                    <li><a href="<?= $url ?>login" rel="tab">Log in</a> or <a href="<?= $url ?>signup" rel="tab">Sign up</a>?</li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php if (isset($qwretzu)) { ?>
        <div class="section">
            <div class="releases">
                <h3>YouTrack</h3>
            </div>
            <form method="GET" class="filters">
                <div class="quickfilter">
                    <div id="youtrackun" <?= empty($istrack["id"]) ? "style=\"display:block\"" : "style=\"display:none\"" ?>>
                        <button type="submit" name="activate_youtrack" id="activate_youtrack" style="background: #0c70de; color: #fff; border: 0; padding: 5px; width: 100%">Activate YouTrack</button>
                    </div>
                    <div id="youtrackac" <?= empty($istrack["id"]) ? "style=\"display:none\"" : "style=\"display:block\"" ?>>
                        <span id="wtfhjahahaha" style="color: <?= $ep->getEpisode() != $istrack["episode_number"] ? "red" : "green"; ?>">Tracked: <?= $istrack["episode_number"] ?></span><br>
                        <span style="color: green">Current: <?= $ep->getEpisode() ?></span>
                        <button type="submit" name="update_youtrack" id="update_youtrack" style="background: #0c70de; color: #fff; border: 0; padding: 5px; width: 100%; margin-bottom: 5px;">Update YouTrack</button>
                        <button type="submit" name="remove_youtrack" id="remove_youtrack" style="background: red; color: #fff; border: 0; padding: 5px; width: 100%">Remove YouTrack</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="section">
            <div class="releases">
                <h3>Bookmark</h3>
            </div>
            <div class="quickfilter">
                <div id="addbmcontainer" <?php if (empty($bookmark["id"])) { ?>style="display:block" <?php } else { ?>style="display:none" <?php } ?>>
                    <form name="add_bookmark" method="post">
                        <button type="submit" name="add_bookmark" id="add_bookmark" class="bookmark" data-id="32" style="width: 100%; border: 0;">
                            <i class="far fa-bookmark" aria-hidden="true"></i> Bookmark
                        </button>
                    </form>
                </div>
                <div id="updatebmcontainer" <?php if (empty($bookmark["id"])) { ?>style="display:none" <?php } else { ?>style="display:block" <?php } ?>>
                    <form method="post">
                        <input type="number" style="display: none" name="anime" id="animeid" required value="<?= $anime->getId() ?>">
                        <select class="bookmark" style="width: 100%; background: grey; margin-bottom: 7px" id="status" name="status">
                            <option value="1" <?php if ($bookmark["status"] == 1) echo "selected"; ?>>Plan to Watch</option>
                            <option value="2" <?php if ($bookmark["status"] == 2) echo "selected"; ?>>Watching</option>
                            <option value="3" <?php if ($bookmark["status"] == 3) echo "selected"; ?>>Paused</option>
                            <option value="4" <?php if ($bookmark["status"] == 4) echo "selected"; ?>>Completed</option>
                            <option value="5" <?php if ($bookmark["status"] == 5) echo "selected"; ?>>Dropped</option>
                        </select>
                        <button type="submit" name="update_bookmark" id="update_bookmark" class="bookmark" data-id="32" style="width: 100%; border: 0; margin-bottom: 7px">
                            <i class="fa fa-bookmark" aria-hidden="true"></i> Update
                        </button>
                        <button type="submit" name="delete_bookmark" id="delete_bookmark" class="bookmark" data-id="32" style="width: 100%; border: 0; background: red">
                            <i class="fa fa-times" aria-hidden="true"></i> Remove Bookmark
                        </button>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="section">
        <div class="releases">
            <h3>Filter Search</h3>
        </div>
        <div class="quickfilter">
            <form action="<?= $config["url"] ?>animes" class="filters " method="GET">
                <span class="sec1">
                    <div style="display:flex">
                        <div class="filter dropdown"> <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Genre <span id="filtercount">All</span> <i class="fa fa-angle-down" aria-hidden="true"></i> </button>
                            <ul class="dropdown-menu c4 scrollz">
                                <?php foreach ($sidebar_genre as $gnre) { ?>
                                    <li><input type="checkbox" id="genre-<?= $gnre["slug"] ?>" name="genre[]" value="<?= $gnre["id"] ?>"> <label for="genre-<?= $gnre["slug"] ?>"><?= $gnre["name"] ?></label></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="filter dropdown"> <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Season <span id="filtercount">All</span> <i class="fa fa-angle-down" aria-hidden="true"></i> </button>
                            <ul class="dropdown-menu c4 scrollz">
                                <?php foreach ($sidebar_seasons as $ssn) { ?>
                                    <li><input type="radio" id="season-<?= $ssn["slug"] ?>" name="season" value="<?= $ssn["id"] ?>"> <label for="season-<?= $ssn["slug"] ?>"><?= $ssn["name"] ?></label></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div style="display:flex">
                        <div class="filter dropdown"> <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Studio <span id="filtercount">All</span> <i class="fa fa-angle-down" aria-hidden="true"></i> </button>
                            <ul class="dropdown-menu c4 scrollz">
                                <?php foreach ($sidebar_studios as $stdio) { ?>
                                    <li><input type="radio" id="studio-<?= $stdio["slug"] ?>" name="studio[]" value="<?= $stdio["id"] ?>"> <label for="studio-<?= $stdio["slug"] ?>"><?= $stdio["name"] ?></label></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="filter dropdown"> <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Status <span id="filtercount">All</span> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu c1">
                                <li><input type="radio" id="anime_status-all" name="status" value="" checked=""> <label for="anime_status-all">All</label></li>
                                <li><input type="radio" id="anime_status-announced" name="status" value="0"> <label for="anime_status-announced">Announced</label></li>
                                <li><input type="radio" id="anime_status-ongoing" name="status" value="1"> <label for="anime_status-ongoing">Ongoing</label></li>
                                <li><input type="radio" id="anime_status-completed" name="status" value="2"> <label for="anime_status-completed">Completed</label></li>
                                <li><input type="radio" id="anime_status-hiatus" name="status" value="3"> <label for="anime_status-hiatus">Hiatus</label></li>
                                <li><input type="radio" id="anime_status-canceled" name="status" value="4"> <label for="anime_status-canceled">Canceled</label></li>
                            </ul>
                        </div>
                    </div>
                    <div style="display:flex">
                        <div class="filter dropdown"> <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Type <span id="filtercount">All</span> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu c1">
                                <li><input type="radio" id="type-all" name="type" value="" checked=""> <label for="type-all">All</label></li>
                                <?php foreach ($sidebar_type as $tpe) { ?>
                                    <li><input type="radio" id="type-<?= $tpe["slug"] ?>" name="type" value="<?= $tpe["id"] ?>"> <label for="type-<?= $tpe["slug"] ?>"><?= $tpe["name"] ?></label></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="filter dropdown"> <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Order by <span id="filtercount">All</span> <i class="fa fa-angle-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu c1">
                                <li><input type="radio" id="sort_by-" name="order" value="" checked=""> <label for="sort_by-">Default</label></li>
                                <li><input type="radio" id="sort_by-name_a-z" name="order" value="NAME ASC"> <label for="sort_by-name_a-z">A-Z</label></li>
                                <li><input type="radio" id="sort_by-name_z-a" name="order" value="NAME DESC"> <label for="sort_by-name_z-a">Z-A</label></li>
                                <li><input type="radio" id="sort_by-update" name="order" value="UPDATED DESC"> <label for="sort_by-update">Latest Update</label></li>
                                <li><input type="radio" id="sort_by-latest" name="order" value="ADDED DESC"> <label for="sort_by-latest">Latest Added</label></li>
                                <li><input type="radio" id="sort_by-popular" name="order" value="" disabled> <label for="sort_by-popular">Popular (In work)</label></li>
                            </ul>
                        </div>
                    </div>
                </span>
                <span class="sec2">
                    <div class="filter submit"> <button type="submit" class="btn btn-custom-search"><i class="fa fa-search" aria-hidden="true"></i> Search</button></div>
                </span>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="section">
        <div class="releases">
            <h3>Genres</h3>
        </div>
        <ul class='genre'>
            <?php foreach ($conn->orderBy("name", "ASC")->get("genre") as $gnre) { ?>
                <?php $genre = new Genre($gnre["id"]); ?>
                <li><a href="<?= $config["url"] ?>genre/<?= $genre->getSlug() ?>/" title="View all series in <?= $genre->getName() ?>"><?= $genre->getName() ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="section">
        <div class="releases">
            <h3><span>New Movies</span></h3><a class="vl" href="<?= $config["url"] ?>animes/?status=&type=3&order=UPDATED+DESC" rel="tab">View All</a>
        </div>
        <div class='serieslist'>
            <ul>
                <?php if (!empty($sidebar_movies)) { ?>
                    <?php foreach ($sidebar_movies as $movie) { ?>
                        <li>
                            <div class="imgseries">
                                <a class="series" href="<?= $config["url"] ?>anime/<?= $movie["slug"] ?>" rel="tab"><img src="<?= $movie["cover"] ?>" class="ts-post-image wp-post-image attachment-medium size-medium" loading="lazy" width="56" height="80" alt=""></a>
                            </div>
                            <div class="leftseries">
                                <h4><a class="series" href="<?= $config["url"] ?>anime/<?= $movie["slug"] ?>" rel="tab"><?= $movie["name"] ?></a></h4>
                                <span>
                                    <b>Genres:</b>
                                    <?php
                                    $tags = explode(",", cat($movie["genre"]));
                                    $ctx = 1;
                                    foreach ($tags as $tag) {
                                        $tag = new Genre($tag);
                                        echo $ctx != 1 ? ", " : "";
                                        echo '<a href="' . $config["url"] . 'genre/' . $tag->getSlug() . '" rel="tab">' . $tag->getName() . '</a>';
                                        $ctx++;
                                    }
                                    ?>
                                </span>
                                <span>
                                    <?= convertTime($movie["added"]) ?>
                                </span>
                            </div>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <li>
                        There are no Movies at the Moment!
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="section">
        <div class="releases">
            <h3>New Series</h3> <a class="vl" href="<?= $config["url"] ?>animes/?status=&type=1&order=UPDATED+DESC" rel="tab">View All</a>
        </div>
        <div class='serieslist'>
            <ul>
                <?php if (!empty($sidebar_series)) { ?>
                    <?php foreach ($sidebar_series as $sanime) { ?>
                        <li>
                            <div class="imgseries">
                                <a class="series" href="<?= $config["url"] ?>anime/<?= $sanime["slug"] ?>" rel="tab">
                                    <img src="<?= $sanime["cover"] ?>" class="ts-post-image wp-post-image attachment-medium size-medium loading" loading="lazy" width="56" height="80" alt="">
                                </a>
                            </div>
                            <div class="leftseries">
                                <h4>
                                    <a class="series" href="<?= $config["url"] ?>anime/<?= $sanime["slug"] ?>" rel="tab">
                                        <?= $sanime["name"] ?>
                                    </a>
                                </h4>
                                <span>
                                    <b>Genres</b>:
                                    <?php
                                    $tags = explode(",", cat($sanime["genre"]));
                                    $ctx = 1;
                                    foreach ($tags as $tag) {
                                        $tag = new Genre($tag);
                                        echo $ctx != 1 ? ", " : "";
                                        echo '<a href="' . $config["url"] . 'genre/' . $tag->getSlug() . '/" rel="tab">' . $tag->getName() . '</a>';
                                        $ctx++;
                                    }
                                    ?>
                                </span>
                                <span>
                                    <?php $studios = $studioclass->getStudios(explode(",", cat($sanime["studio_id"]))); ?>
                                    <?php foreach ($studios as $stud) { ?>
                                        <a href="<?= $config["url"] ?>studio/<?= $stud["slug"] ?>/"><?= $stud["name"] ?></a>
                                    <?php } ?>
                                </span>
                            </div>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <li>
                        There are no Series at the Moment!
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="section">
        <div class="releases">
            <h3>Seasons</h3>
        </div>
        <div class='mseason'>
            <ul class='season'>
                <?php if (!empty($sidebar_seasons)) { ?>
                    <?php foreach ($sidebar_seasons as $season) { ?>
                        <?php $season = new Season($season["id"]); ?>
                        <li><a href="<?= $config["url"] ?>season/<?= $season->getSlug() ?>/" title="View all series of <?= $season->getName() ?>" rel="tab"><?= $season->getName() ?> <span><?= $season->countAnimes() ?></span></a></li>
                    <?php } ?>
                <?php } else { ?>
                    There are no Seasons at the Moment!
                <?php } ?>
            </ul>
        </div>
        <div class='clear'></div>
    </div>
</div>

<?php if ($loggedin == true && isset($anime) && ($anime->getId() !== null || is_object($anime))) { ?>
    <script>
        $('#add_bookmark').click(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            $.ajax({
                type: "GET",
                url: "<?= $config["url"] ?>/sql/ajax.php",
                data: "type=add&anime=<?= $anime->getId() ?>",
                success: function(data) {
                    if (data == "added") {
                        document.getElementById("addbmcontainer").style.display = "none";
                        document.getElementById("updatebmcontainer").style.display = "block";
                    }
                }
            });
        });

        $('#update_bookmark').click(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var status = $("#status").val();
            $.ajax({
                type: "GET",
                url: "<?= $config["url"] ?>/sql/ajax.php",
                data: "type=update_bookmark&anime=<?= $anime->getId() ?>&status=" + status,
                success: function(data) {
                    document.getElementById("status").style.backgroundColor = "green";
                    setTimeout(function() {
                        document.getElementById("status").style.backgroundColor = "grey";
                    }, 1000);
                }
            });
        });

        $('#delete_bookmark').click(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            $.ajax({
                type: "GET",
                url: "<?= $config["url"] ?>/sql/ajax.php",
                data: "type=delete&anime=<?= $anime->getId() ?>",
                success: function(data) {
                    if (data == "deleted") {
                        document.getElementById("addbmcontainer").style.display = "block";
                        document.getElementById("updatebmcontainer").style.display = "none";
                        if (document.getElementById("ayololo") != null) {
                            document.getElementById("ayololo").style.display = "none";
                        }
                        if (document.getElementById("youtrackun") != null) {
                            document.getElementById("youtrackun").style.display = "block";
                            document.getElementById("youtrackac").style.display = "none";
                        }
                    }
                }
            });
        });

        <?php if (isset($ep) && is_object($ep)) { ?>
            $('#activate_youtrack').click(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var ep = "<?= $ep->getEpisode() ?>";
                var type = "<?= $ep->getType() ?>";
                $.ajax({
                    type: "GET",
                    url: "<?= $config["url"] ?>/sql/ajax.php",
                    data: "type=activate_youtrack&aid=<?= $anime->getId() ?>&ep=" + ep + "&tpe=" + type,
                    success: function(data) {
                        document.getElementById("youtrackun").style.display = "none";
                        document.getElementById("youtrackac").style.display = "block";
                        if (data == "bm") {
                            document.getElementById("addbmcontainer").style.display = "none";
                            document.getElementById("updatebmcontainer").style.display = "block";
                        }
                    }
                });
            });

            $('#update_youtrack').click(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var ep = "<?= $ep->getEpisode() ?>";
                var type = "<?= $ep->getType() ?>";
                $.ajax({
                    type: "GET",
                    url: "<?= $config["url"] ?>/sql/ajax.php",
                    data: "type=update_youtrack&anime=<?= $anime->getId() ?>&ep=" + ep + "&tpe=" + type,
                    success: function() {
                        document.getElementById("wtfhjahahaha").innerHTML = "Tracked: " + ep;
                        document.getElementById("wtfhjahahaha").style.color = "green";
                    }
                });
            });

            $('#remove_youtrack').click(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.
                var type = "<?= $ep->getType() ?>";
                $.ajax({
                    type: "GET",
                    url: "<?= $config["url"] ?>/sql/ajax.php",
                    data: "type=remove_youtrack&anime=<?= $anime->getId() ?>&tpe=" + type,
                    success: function(data) {
                        if (data == "removed") {
                            document.getElementById("youtrackun").style.display = "block";
                            document.getElementById("youtrackac").style.display = "none";
                        }
                    }
                });
            });
        <?php } ?>
    </script>
<?php } ?>