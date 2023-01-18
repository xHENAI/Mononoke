<div class="postbody nosidebar" style="padding:0">
    <div class="newseason">
        <h1 style="text-align: center">Report <?= strtoupper($type) ?></h1>
        <div class="listseries" style="width:350px;margin-left:auto;margin-right:auto;">
            <div class="searchx topcon">
                <form action="<?= $config["url"] ?>report?type=stream&url=<?= $url ?>" id="form" class="filters" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" rel="tab">
                    <?php if ($type == "Stream") { ?>
                        <input type="text" value="<?= $type_raw ?>" name="type" style="display: none;">
                        <input readonly required id="s" itemprop="query-input" class="search-live" type="text" placeholder="URL to Report" name="url" tabindex="1" autocomplete="url" title="URL to Report" value="<?= $url ?>"><br>
                        <select id="s" class="search-live" name="reason">
                            <option disabled>Select Reason...</option>
                            <option value="Link is broken">Link is broken</option>
                        </select><br>
                    <?php } ?>
                    <!--                    <textarea id="s" class="search-live" name="message" style="max-width:350px; height:150px" autofocus placeholder="Any additional information you want to tell us...?"></textarea><br>-->
                    <?php if ($config["captcha"]["enabled"]) { ?>
                        <?php if ($config["captcha"]["type"] == "hcaptcha") { ?>
                            <div class="h-captcha" data-sitekey="<?= $config["captcha"]["hcaptcha"]["sitekey"] ?>"></div>
                        <?php } ?>
                    <?php } ?>
                    <button type="submit" id="s" name="report" style="background:blue; color: white">Submit Report</button>
                    <?php if ($error == true) { ?>
                        <p style="color:red"><?= $error_msg ?></p>
                    <?php } else { ?>
                        <br>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    var refreshButton = document.querySelector(".captcha-image");
    refreshButton.onclick = function() {
        document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
    }
</script> -->

<?php if (isset($_GET["success"])) { ?>
    <script>
        setTimeout(function() {
            window.opener.childWindow.close();
        }, 1000);
    </script>
<?php } ?>