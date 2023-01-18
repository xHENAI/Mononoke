<div class="postbody nosidebar">
    <div class="newseason">
        <h1 style="text-align: center">Welcome back!</h1>
        <div class="listseries" style="width:350px;margin-left:auto;margin-right:auto">
            <div class="searchx topcon">
                <form id="form" class="filters" name="login" method="POST" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" rel="tab">
                    <input required minlength="3" maxlength="12" id="s" itemprop="query-input" class="search-live" type="text" placeholder="Username" name="username" tabindex="1" autocomplete="username" autofocus title="Username"><br>
                    <input required minlength="8" maxlength="20" id="s" itemprop="query-input" class="search-live" type="password" placeholder="Password" name="password" tabindex="2" autocomplete="password" title="Password">
                    <p>If you lost your password, there's <b>nothing</b> we can do.</p>
                    <?php if ($config["captcha"]["enabled"] == true) { ?>
                        <div class="h-captcha" data-sitekey="<?= $captcha["sitekey"] ?>"></div>
                    <?php } ?>
                    <button type="submit" id="s" name="login" style="background:blue; color: white">Log in</button>
                    <?php if ($error == true) { ?>
                        <p style="color:red"><?= $error_msg ?></p>
                    <?php } else { ?>
                        <br>
                    <?php } ?>
                    <a id="s" href="<?= $config["url"] ?>signup" rel="tab" style="background:cyan;color:black;text-align:center">Don't have one? Create an Account!</a>
                </form>
            </div>
        </div>
    </div>