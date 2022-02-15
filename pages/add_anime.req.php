<?php

// pages/add_anime.req.php - Mononoke

$error = false;
$error_msg = "";

if(isset($_POST["add_anime"])) {
    $latest = $conn->query("SELECT * FROM `anime` ORDER BY `id` DESC LIMIT 1");
    $latest = mysqli_fetch_assoc($latest);
    if(empty($latest["id"])) {
        $latest = "1";
    } else {
        $latest = $latest["id"];
        $latest++;
    }
    $conn->query("ALTER TABLE `anime` auto_increment = $latest");
    $ext = end(explode('.', $_FILES["userfile"]["name"]));
    
    //$add = "assets/anime/".$_FILES['userfile']['name']; 
    $add = "assets/anime/".$latest.".jpg"; 
    //echo $add;
    if(move_uploaded_file ($_FILES['userfile']['tmp_name'],$add)) {
        //echo "Successfully uploaded the mage";
        chmod("$add",0777);
    } else {
        $error = true;
        $error_msg = "Failed to upload file Contact Site administration to fix the problem. Or maybe try again?";
        exit;
    }
    
    if($error==false) {
        ///////// Start the thumbnail generation//////////////
        $n_width = 100;    // Fix the width of the thumb nail images
        $n_height = 120;   // Fix the height of the thumb nail imaage
        $n_width2 = 1100;    // Fix the width of the thumb nail images
        $n_height2 = 500;   // Fix the height of the thumb nail imaage

        $tsrc = "assets/thumbs/".$latest.".jpg";   // Path where thumb nail image will be stored
        $tsrc2 = "assets/banner/".$latest.".jpg";   // Path where thumb nail image will be stored
        //$tsrc = "assets/thumbs/".$latest.".jpeg";   // Path where thumb nail image will be stored
        //echo $tsrc;
        if (!($_FILES['userfile']['type'] =="image/jpeg" OR $_FILES['userfile']['type']=="image/png" OR $_FILES['userfile']['type']=="image/jpg")){
            $error = true;
            $error_msg = "Your uploaded file must be of JPG or PNG. Other file types are not allowed";
            exit;
        }
        ////////////// starting of JPEG thumb nail creation////
        if($_FILES['userfile']['type']=="image/jpeg" || $_FILES['userfile']['type']=="image/jpg") {
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
        if($_FILES['userfile']['type']=="image/png") {
            $im = ImageCreateFromPNG($add); 
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
        
        ////////////// starting of JPEG thumb banner creation////
        if($_FILES['userfile']['type']=="image/jpeg" || $_FILES['userfile']['type']=="image/jpg") {
            $im = ImageCreateFromJPEG($add); 
            $width2 = ImageSx($im);              // Original picture width is stored
            $height2 = ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            //$n_height=($n_width/$width) * $height; 
            $n_height2 = $n_height2;
            // But we don't need it! We need a specific size, stretched or not, here it comes!
            $newimage = imagecreatetruecolor($n_width2,$n_height2);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width2,$n_height2,$width2,$height2);
            ImageJpeg($newimage,$tsrc2);
            chmod("$tsrc2",0777);
        }
        ////////////// starting of PNG thumb banner creation////
        if($_FILES['userfile']['type']=="image/png") {
            $im = ImageCreateFromPNG($add); 
            $width2 = ImageSx($im);              // Original picture width is stored
            $height2 = ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            //$n_height=($n_width/$width) * $height; 
            $n_height2 = $n_height2;
            // But we don't need it! We need a specific size, stretched or not, here it comes!
            $newimage = imagecreatetruecolor($n_width2,$n_height2);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width2,$n_height2,$width2,$height2);
            ImageJpeg($newimage,$tsrc2);
            chmod("$tsrc2",0777);
        }
        // <3 https://www.plus2net.com/php_tutorial/php_thumbnail.php <-- Stolen from here >_<
        if($error==false) {
            // Inserting Anime into the Database
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $status = mysqli_real_escape_string($conn, $_POST["status"]);
            // Gatta check if ANime with that Name already exists
            $check = $conn->query("SELECT * FROM `anime` WHERE `name`='$name'");
            if(mysqli_num_rows($check)==1) {
                $error = true;
                $error_msg = "An Anime with that name already exists!";
            } else {
                // Anime doesn't exist yet, bringin it into exitence
                $conn->query("INSERT INTO `anime`(`name`,`image`,`status`,`public`) VALUES('$name','jpg','$status','0')");
                redirect($config["url"]."edit_anime/".$latest);
            }
        }
    }
}

?>
<title><?= $lang["add_anime"]["title"] ?> | <?= $config["name"] ?></title>
<div class="alert alert-info text-center">
    <?= $lang["add_anime"]["notice"] ?>
</div>
<h3 class="text-center"><?= $lang["add_anime"]["title"] ?></h3>
<form class="form-horizontal" method="post" action="" name="add_anime" enctype="multipart/form-data">
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?= $lang["add_anime"]["name"] ?></label>
        <div class="col-sm-9">
            <input required type="text" name="name" id="name" placeholder="<?= $lang["add_anime"]["name_2"] ?>" maxlength="150" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?= $lang["add_anime"]["status"] ?></label>
        <div class="col-sm-9">
            <select required class="selectpicker form-control" id="status" name="status">
                <option value="0" selected disabled><?= $lang["add_anime"]["status_select"] ?></option>
                <option value="0"><?= $lang["anime"]["status"]["0"] ?></option>
                <option value="1"><?= $lang["anime"]["status"]["1"] ?></option>
                <option value="2"><?= $lang["anime"]["status"]["2"] ?></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="userfile"><?= $lang["add_anime"]["image"] ?></label>
        <div class="col-sm-9">
            <input required name="userfile" id="userfile" type="file" class="form-control">
        </div>
    </div>
    <button class="col-sm-offset-3 btn btn-success" type="submit" name="add_anime"><?= glyph("plus-sign",$lang["add_anime"]["title"]) ?> <?= $lang["add_anime"]["title"] ?></button>
    <?php if($error==true) { ?>
    <p class="col-sm-offset-3" style="color:red"><?= $error_msgr ?></p>
    <?php } ?>
</form>
