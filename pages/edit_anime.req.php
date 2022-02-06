<?php

// pages/edit_anime.req.php - Mononoke

$id = mysqli_real_escape_string($conn, $_GET["id"]);
$anime = mysqli_real_escape_string($conn, $_GET["id"]);
$anime = $conn->query("SELECT * FROM `anime` WHERE `id`='$anime' LIMIT 1");
$anime = mysqli_fetch_assoc($anime);

$error = false;
$error_msg = "";

if(!empty($anime["id"])) {

                          if(isset($_POST["edit_anime"])) {
                              $name = mysqli_real_escape_string($conn, $_POST["name"]);
                              $alternates = mysqli_real_escape_string($conn, $_POST["alternates"]);
                              if(empty($alternates)) {
                                  $alternates = "NULL";
                              } else {
                                  $alternates = "'".$alternates."'";
                              }
                              $year = mysqli_real_escape_string($conn, $_POST["year"]);
                              if(empty($year)) {
                                  $year = "NULL";
                              } else {
                                  $year = "'".$year."'";
                              }
                              $status = mysqli_real_escape_string($conn, $_POST["status"]);
                              $description = mysqli_real_escape_string($conn, $_POST["description"]);
                              if(empty($description)) {
                                  $description = "NULL";
                              } else {
                                  $description = "'".$description."'";
                              }
                              $anisearch = mysqli_real_escape_string($conn, $_POST["anisearch"]);
                              if(empty($anisearch)) {
                                  $anisearch = "NULL";
                              } else {
                                  $anisearch = "'".$anisearch."'";
                              }
                              $nanime = mysqli_real_escape_string($conn, $_POST["9anime"]);
                              if(empty($nanime)) {
                                  $nanime = "NULL";
                              } else {
                                  $nanime = "'".$nanime."'";
                              }
                              $animixplay = mysqli_real_escape_string($conn, $_POST["animixplay"]);
                              if(empty($animixplay)) {
                                  $animixplay = "NULL";
                              } else {
                                  $animixplay = "'".$animixplay."'";
                              }
                              $gogoanime = mysqli_real_escape_string($conn, $_POST["gogoanime"]);
                              if(empty($gogoanime)) {
                                  $gogoanime = "NULL";
                              } else {
                                  $gogoanime = "'".$gogoanime."'";
                              }
                              $twist = mysqli_real_escape_string($conn, $_POST["twist"]);
                              if(empty($twist)) {
                                  $twist = "NULL";
                              } else {
                                  $twist = "'".$twist."'";
                              }
                              $public = mysqli_real_escape_string($conn, $_POST["public"]);
                              $update = $conn->query("UPDATE `anime` SET `name`='$name', `alternates`=$alternates, `year`=$year, `status`='$status', `description`=$description, `anisearch`=$anisearch, `9anime`=$nanime, `animixplay`=$animixplay, `gogoanime`=$gogoanime, `twist`=$twist, `public`='$public' WHERE `id`='".$anime["id"]."'");
                              redirect("");
                          }
    
    if(isset($_POST["edit_cover"])) {
        $ext = end(explode('.', $_FILES["userfile"]["name"]));
    
        //$add = "assets/anime/".$_FILES['userfile']['name']; 
        $add = "assets/anime/".$anime["id"].".".$ext; 
        //echo $add;
        unlink("assets/anime/".$anime["id"].".".$anime["image"]);
        if(move_uploaded_file ($_FILES['userfile']['tmp_name'],$add)) {
            //echo "Successfully uploaded the mage";
            chmod("$add",0777);
        }
        
        ///////// Start the thumbnail generation//////////////
        $n_width = 100;    // Fix the width of the thumb nail images
        $n_height = 100;   // Fix the height of the thumb nail imaage

        $tsrc = "assets/thumbs/".$anime["id"].".".$ext;   // Path where thumb nail image will be stored
        //$tsrc = "assets/thumbs/".$latest.".jpeg";   // Path where thumb nail image will be stored
        //echo $tsrc;
        if (!($_FILES['userfile']['type'] =="image/jpeg" || $_FILES['userfile']['type']=="image/png")){
            $error = true;
            $error_msg = "Your uploaded file must be of JPG or PNG. Other file types are not allowed";
        }
        ////////////// starting of JPEG thumb nail creation////
        if($_FILES['userfile']['type']=="image/jpeg" && $error == false) {
            unlink("assets/thumbs/".$anime["id"].".".$anime["image"]);
            $im = ImageCreateFromJPEG($add); 
            $width = ImageSx($im);              // Original picture width is stored
            $height = ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            //$n_height=($n_width/$width) * $height; 
            $n_height = $n_height;
            // But we don't need it! We need a specific size, stretched or not, here it comes!
            $newimage = imagecreatetruecolor($n_width,$n_height);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            ImageJpeg($newimage,$tsrc);
            chmod("$tsrc",0777);
        }
        ////////////// starting of PNG thumb nail creation////
        if($_FILES['userfile']['type']=="image/png" && $error == false) {
            unlink("assets/thumbs/".$anime["id"].".".$anime["image"]);
            $im = ImageCreateFromJPEG($add); 
            $width = ImageSx($im);              // Original picture width is stored
            $height = ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            //$n_height=($n_width/$width) * $height; 
            $n_height = $n_height;
            // But we don't need it! We need a specific size, stretched or not, here it comes!
            $newimage = imagecreatetruecolor($n_width,$n_height);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            ImageJpeg($newimage,$tsrc);
            chmod("$tsrc",0777);
        }
        // <3 https://www.plus2net.com/php_tutorial/php_thumbnail.php <-- Stolen from here >_<
        if($error==false) {
            $conn->query("UPDATE `anime` SET `image`='$ext' WHERE `id`='".$anime["id"]."'");
            redirect("");
        }
    }
                          
?>

<title><?= $lang["edit_anime"]["title_2"] ?> <?= $anime["name"] ?> | <?= $config["name"] ?></title>
<?php if($error==true) { ?>
<div class="alert alert-danger"><?= $error_msg ?></div>
<?php } ?>
<h3><?= $lang["edit_anime"]["title_2"] ?> <b><?= $anime["name"] ?></b> <small><a href="<?= $config["url"] ?>anime/<?= $id ?>">(<?= $lang["edit_anime"]["view"] ?>)</a></small></h3>
<div>
    <!-- Tabs -->
    <ul class="nav nav-pills" role="tablist">
        <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab"><?= glyph("edit",$lang["edit_anime"]["tab_general"]) ?> <?= $lang["edit_anime"]["tab_general"] ?></a></li>
        <li role="presentation"><a href="#cover" aria-controls="cover" role="tab" data-toggle="tab"><?= glyph("file",$lang["edit_anime"]["tab_image"]) ?> <?= $lang["edit_anime"]["tab_image"] ?></a></li>
        <li role="presentation"><a href="#tags" aria-controls="tags" role="tab" data-toggle="tab"><?= glyph("tags",$lang["edit_anime"]["tab_tags"]) ?> <?= $lang["edit_anime"]["tab_tags"] ?></a></li>
    </ul>

    <!-- Content of Tabs -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="general">
            <br>
            <form class="form-horizontal" name="edit_anime" action="" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="name"><?= $lang["edit_anime"]["name"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control" placeholder="<?= $lang["edit_anime"]["name_hover"] ?>" value="<?= $anime["name"] ?>" title="<?= $lang["edit_anime"]["name_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="alternates"><?= $lang["edit_anime"]["alternates"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="alternates" id="alternates" class="form-control" placeholder="<?= $lang["edit_anime"]["alternates_hover"] ?>" value="<?= $anime["alternates"] ?>" title="<?= $lang["edit_anime"]["alternates_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="year"><?= $lang["edit_anime"]["year"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="year" id="year" placeholder="<?= $lang["edit_anime"]["year_hover"] ?>" value="<?= $anime["year"] ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="status"><?= $lang["amine"]["status"]["name"] ?></label>
                    <div class="col-sm-9">
                        <select class="selecktpicker form-control" name="status" id="status">
                            <option <?php if($anime["status"]==0) { echo 'selected'; } ?> value="0"><?= $lang["anime"]["status"]["0"] ?></option>
                            <option <?php if($anime["status"]==1) { echo 'selected'; } ?> value="1"><?= $lang["anime"]["status"]["1"] ?></option>
                            <option <?php if($anime["status"]==2) { echo 'selected'; } ?> value="2"><?= $lang["anime"]["status"]["2"] ?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="description"><?= $lang["anime"]["description"] ?></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description" id="description" style="max-width:100%" placeholder="<?= $lang["edit_anime"]["description"] ?>"><?= $anime["description"] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="anisearch"><?= $lang["edit_anime"]["anisearch"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="anisearch" id="anisearch" class="form-control" value="<?= $anime["anisearch"] ?>" placeholder="<?= $lang["edit_anime"]["anisearch"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="9anime"><?= $lang["edit_anime"]["9anime"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="9anime" id="9anime" class="form-control" value="<?= $anime["9anime"] ?>" placeholder="<?= $lang["edit_anime"]["9anime_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="animixplay"><?= $lang["edit_anime"]["animixplay"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="animixplay" id="animixplay" class="form-control" value="<?= $anime["animixplay"] ?>" placeholder="<?= $lang["edit_anime"]["animixplay_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="gogoanime"><?= $lang["edit_anime"]["gogoanime"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="gogoanime" id="gogoanime" class="form-control" value="<?= $anime["gogoanime"] ?>" placeholder="<?= $lang["edit_anime"]["gogoanime_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="twist"><?= $lang["edit_anime"]["twist"] ?></label>
                    <div class="col-sm-9">
                        <input type="text" name="twist" id="twist" class="form-control" value="<?= $anime["twist"] ?>" placeholder="<?= $lang["edit_anime"]["twist_hover"] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="public"><?= $lang["edit_anime"]["public"] ?></label>
                    <div class="col-sm-9">
                        <select class="selecktpicker form-control" name="public" id="public">
                            <option <?php if($anime["public"]==false) { echo 'selected'; } ?> value="0"><?= $lang["edit_anime"]["public_no"] ?></option>
                            <option <?php if($anime["public"]==true) { echo 'selected'; } ?> value="1"><?= $lang["edit_anime"]["public_yes"] ?></option>
                        </select>
                    </div>
                </div>
                <button class="col-sm-offset-3 btn btn-success" type="submit" name="edit_anime"><?= glyph("floppy-save",$lang["settings"]["save"]) ?> <?= $lang["settings"]["save"] ?></button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="cover">
            <br>
            <div class="col-sm-3">
                <img src="<?= $config["url"] ?>assets/anime/<?= $anime["id"].".".$anime["image"] ?>" width="100%" alt="<?= $lang["edit_anime"]["current_image"] ?>" title="<?= $lang["edit_anime"]["current_image"] ?>">
            </div>
            <div class="col-sm-9">
                <p><?= $lang["edit_anime"]["current_image"] ?></p>
            </div>
            <form class="form-horizontal col-sm-12" method="post" action="" name="edit_cover" enctype="multipart/form-data">
                <hr>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="userfile"><?= $lang["edit_anime"]["new_image"] ?></label>
                    <div class="col-sm-9">
                        <input required type="file" name="userfile" id="userfile" class="form-control">
                    </div>
                </div>
                <button type="submit" name="edit_cover" class="btn btn-success col-sm-offset-3"><?= glyph("floppy-save",$lang["settings"]["save"]) ?> <?= $lang["settings"]["save"] ?></button>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="tags">
            Soon™ to come!
        </div>
    </div>
</div>

<?php } else { ?>

<title>Error | <?= $config["name"] ?></title>
<p><?= glyph("info-sign","Error") ?> This Anime doesn't exist!</p>

<?php } ?>
