<div class="postbody nosidebar">
    <div class="newseason">
        <h1 style="text-align: center">Glad you're here!</h1>
        <div class="listseries" style="width:350px;margin-left:auto;margin-right:auto">
            <div class="searchx topcon">
                <form action="<?= $config["api_url"] ?>signup" id="form" class="filters" method="POST" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" rel="tab">
                    <input required minlength="3" maxlength="12" id="s" itemprop="query-input" class="search-live" type="text" placeholder="Username" name="username" tabindex="1" autocomplete="username" autofocus title="Username"><br>
                    <input required minlength="8" maxlength="20" id="s" itemprop="query-input" class="search-live" type="password" placeholder="Password" name="password" tabindex="2" autocomplete="password" title="Password"><br>
                    <input required minlength="8" maxlength="20" id="s" itemprop="query-input" class="search-live" type="password" placeholder="Password (Confirm)" name="password2" tabindex="3" autocomplete="password" title="Password">
                    <p>Don't loose your password! We <b>do not</b> store eMails, so if you lost yours, there's <b>nothing</b> we can do for you!</p>
                    <!--                    <input maxlength="6" required id="s" itemprop="query-input" class="search-live" pattern="[A-Z0-9]{6}" type="text" placeholder="Captcha" name="captcha_challenge" tabindex="4" title="CAPTCHA code" autocomplete="off">-->
                    <!--                    <img src="captcha.php" alt="CAPTCHA IMAGE (Click to refresh)" class="captcha-image loading" width="200px" title="Click to refresh!" style="padding-top:10px;padding-bottom:10px;margin-left:50px;margin-right:50px;">-->
                    <?php if ($config["captcha"]["enabled"] == true) { ?>
                        <?php if ($config["captcha"]["type"] == "hcaptcha") { ?>
                            <div class="h-captcha" data-sitekey="<?= $config["captcha"]["hcaptcha"]["sitekey"] ?>"></div>
                        <?php } ?>
                    <?php } ?>
                    <button type="submit" id="s" name="signup" style="background:blue; color: white">Sign me up!</button>
                    <?php if ($error == true) { ?>
                        <p style="color:red"><?= $error_msg ?></p>
                    <?php } else { ?>
                        <br>
                    <?php } ?>
                    <a id="s" href="<?= $config["url"] ?>login" rel="tab" style="background:cyan;color:black;text-align:center">Already have one? Login!</a>
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