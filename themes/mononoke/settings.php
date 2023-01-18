<div class="postbody nosidebar" style="padding:0">
    <div class="newseason">
        <h1 style="text-align: center"><?= $user->getName() ?>'s Settings</h1>
        <div class="listseries" style="width:350px;margin-left:auto;margin-right:auto;">
            <img style="border-radius: 50%; width: 250px; margin-left: auto; margin-right: auto" src="<?= $user->getImage() ?>" alt="Your Avatar" title="Your Avatar">
            <div class="searchx topcon">
                <?php if ($error == true) { ?>
                    <p style="color:red"><?= $error_msg ?></p>
                <?php } ?>
                <form name="save" id="form" class="filters" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" rel="tab">
                    <label>Profile visibility</label>
                    <select id="s" class="search-live" name="public" tabindex="1">
                        <option disabled>Select Profile Visibility</option>
                        <option value="1" <?= $user->isPublic() ? "selected" : "" ?>>Public</option>
                        <option value="0" <?= !$user->isPublic() ? "selected" : "" ?>>Private</option>
                    </select>
                    <br>
                    <label>Avatar</label>
                    <select id="s" class="search-live" name="image" tabindex="1">
                        <option disabled>Select Avatar</option>
                        <?php foreach ($avatars as $av) { ?>
                            <option value="<?= $av["id"] ?>" <?= $av["url"] == $user->getImage() ? "selected" : "" ?>><?= $av["name"] ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <label>Twitter Username (without @)</label>
                    <input maxlength="50" id="s" name="twitter" placeholder="Twitter Username" value="<?= $user->getTwitter() ?>" tabindex="3">
                    <br>
                    <label>Discord Username#Tag</label>
                    <input maxlength="50" id="s" name="discord" placeholder="Discord Username#Tag" value="<?= $user->getDiscord() ?>" tabindex="4">
                    <br>
                    <label>Website URL (without https://)</label>
                    <input maxlength="100" id="s" name="website" placeholder="www.h33t.moe" value="<?= $user->getWebsite() ?>" tabindex="5">
                    <br>
                    <label>Results per Page</label>
                    <select id="s" class="search-live" name="perpage" tabindex="6">
                        <option disabled>Select Profile Visibility</option>
                        <option value="10" <?= $user->getPerpage() == 10 ? "selected" : "" ?>>10</option>
                        <option value="25" <?= $user->getPerpage() == 25 ? "selected" : "" ?>>25</option>
                        <option value="50" <?= $user->getPerpage() == 50 ? "selected" : "" ?>>50</option>
                        <option value="100" <?= $user->getPerpage() == 100 ? "selected" : "" ?>>100</option>
                    </select>
                    <br>
                    <button type="submit" id="s" name="save" style="background:blue; color: white">Save changes</button>
                    <br>
                </form>
                <form name="changepass" id="form" class="filters" method="get" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" rel="tab">
                    <hr>
                    <br>
                    <input required minlength="8" maxlength="25" type="password" name="old_pass" id="s" placeholder="Current Password"><br>
                    <input required minlength="8" maxlength="25" type="password" name="new_pass1" id="s" placeholder="New Password"><br>
                    <input required minlength="8" maxlength="25" type="password" name="new_pass2" id="s" placeholder="New Password (Repeat)"><br>
                    <button type="submit" id="s" name="changepass" style="background:blue; color: white">Change Password</button>
                    <p style="color:red">If you lost your current password but you're logged in, you may send us an Email providing a screenshot giving enough proof and a new Password at: <a href="mailto:<?= $config["email"] ?>" target="_blank"><?= $config["email"] ?></a></p>
                </form>
            </div>
        </div>
    </div>
</div>