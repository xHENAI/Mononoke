<?php

// core/funky.req.php - Mononoke

// Login function because I need to set cookies

if(isset($_POST["login_user"])) {
    $error = false;
    $error_msg = "";
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $cuser = $conn->query("SELECT * FROM `user` WHERE `username`='$username' LIMIT 1");
    $cuser = mysqli_fetch_assoc($cuser);
    $password = $_POST["password"];
    $pcheck = password_verify($password, $cuser["password"]);
    if($pcheck==true) {
        $token = rand();
        $token = md5($token);
        if(isset($_POST["remember_me"])) {
            // For one month
            setcookie("".$config["cookie"]."session", $token, time()+(86400*30), "/", $config["domain"]);
        } else {
            // Only for one day since checkbox wasn't checked
            setcookie("".$config["cookie"]."session", $token, time()+(86400), "/", $config["domain"]);
        }
        $_SESSION[$config["cookie"]."session"] = $token;
        $conn->query("INSERT INTO `user_tokens`(`user`,`token`) VALUES('$username','$token')");
        redirect("");
    } else {
        $error = true;
        $error_msg = "Username/Password is wrong!";
    }
}

/* Functions */

function glyph($glyph, $title = "") {
    return "<span class=\"glyphicon glyphicon-$glyph\" title=\"$title\"></span>";
}

function redirect($destination = "") {
    require("config.php");
    echo "<script type=\"text/javascript\"> document.location = \"".$destination."\"; </script>";
}

function escape($str) {
    return htmlspecialchars($str);
}

function convert_level($level) {
    if($level==0) {
        $level = "Administrator";
    } elseif($level==10) {
        $level = "Moderator";
    } elseif($level==20) {
        $level = "User";
    } else {
        $level = "User (eMail not confirmed)";
    }
    return $level;
}

function convert_theme($theme) {
    if($theme==0) {
        $theme = "Bootstrap Light";
    } elseif($theme==1) {
        $theme = "Cerulean Light";
    } elseif($theme==2) {
        $theme = "Bootstrap Dark";
    } elseif($theme==3) {
        $theme = "Cyborg Dark";
    } else {
        $theme = "Darkly Dark";
    }
    return $theme;
}

function shorten($text, $maxlength = 25) {
    if(strlen($text)<=$maxlength) {
        $text = $text;
    } else {
        $text = substr($text, 0,$maxlength)."...";
    }
    return $text;
}

function ago($datetime, $full = false) {

    require("config.php");
    require("core/conn.req.php");
    require("langs/".$user["lang"].".lang.php");
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    
    $string = array(
        'y' => $lang["ago"]["year"],
        'm' => $lang["ago"]["month"],
        'w' => $lang["ago"]["week"],
        'd' => $lang["ago"]["day"],
        'h' => $lang["ago"]["hour"],
        'i' => $lang["ago"]["minute"],
        's' => $lang["ago"]["second"],
    );
    foreach($string as $k => &$v) {
        if($diff->$k) {
            $v = $diff->$k.' '.$v.($diff->$k > 1 ? $lang["ago"]["plural"]." " : ' ');
        } else {
            unset($string[$k]);
        }
    }
    
    if(!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string)." ".$lang["ago"]["ago"] : " ".$lang["ago"]["now"];
}

function bbconvert($text) {
	
	// Always ensure that user inputs are scanned and filtered properly.
	$text  = htmlspecialchars($text, ENT_QUOTES);

	// BBcode array
	$find = array(
		'~\[b\](.*?)\[/b\]~s',
		'~\[i\](.*?)\[/i\]~s',
		'~\[s\](.*?)\[/s\]~s',
		'~\[u\](.*?)\[/u\]~s',
		'~\[quote\](.*?)\[/quote\]~s',
		'~\[size=(.*?)\](.*?)\[/size\]~s',
		'~\[color=(.*?)\](.*?)\[/color\]~s',
		'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
		'~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
	);

	// HTML tags to replace BBcode
	$replace = array(
		'<b>$1</b>',
		'<i>$1</i>',
		'<s>$1</s>',
		'<span style="text-decoration:underline;">$1</span>',
		'<pre>$1</'.'pre>',
		'<span style="font-size:$1px;">$2</span>',
		'<span style="color:$1;">$2</span>',
		'<a href="$1">$1</a>',
		'<img src="$1" alt="$1" />'
	);

	// Replacing the BBcodes with corresponding HTML tags
	return preg_replace($find,$replace,$text);
}

function convert_player($host, $url) {
    
    $output = "";
    
    if($host=="gogoplay") {
        $output .= '<div class="embed-responsive embed-responsive-16by9">';
        $output .= '<iframe class="embed-responsive-item" id="vidPlayer" src="'.$url.'" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>';
        $output .= '</div>';
    } elseif($host=="youtube") {
        $output .= '<div class="embed-responsive embed-responsive-16by9">';
        $output .= '<iframe class="embed-responsive-item" id="vidPlayer" src="'.$url.'" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>';
        $output .= '</div>';
    } elseif($host=="mp4upload") {
        $output .= '<div class="embed-responsive embed-responsive-16by9">';
        $output .= '<iframe class="embed-responsive-item" id="vidPlayer" src="'.$url.'" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>';
        $output .= '</div>';
    } elseif($host=="streamtape") {
        $output .= '<div class="embed-responsive embed-responsive-16by9">';
        $output .= '<iframe class="embed-responsive-item" id="vidPlayer" src="'.$url.'" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>';
        $output .= '</div>';
    } else {
        $output .= '<p>This Streamhoster hasn\'t been implemented yet!</p>';
    }
    
    return $output;
}

function convert_tag($tag, $type = "id") {

    require("config.php");
    require("core/conn.req.php");
    require("langs/".$user["lang"].".lang.php");
    
    if($type=="id") {
        $tag = $conn->query("SELECT * FROM `anime_tag_cloud` WHERE `id`='$tag' LIMIT 1");
        $tag = mysqli_fetch_assoc($tag);
        if(empty($tag["id"])) {
            $tag = "Unknown";
        } else {
            $tag = $tag["name"];
        }
    } else {
        $tag = $conn->query("SELECT * FROM `anime_tag_cloud` WHERE `name`='$tag' LIMIT 1");
        $tag = mysqli_fetch_assoc($tag);
        if(empty($tag["id"])) {
            $tag = "Unknown";
        } else {
            $tag = $tag["name"];
        }
    }
    
    return $tag;
}

function display_tags($anime) {

    require("config.php");
    require("core/conn.req.php");
    
    $output = "";
    
    $tags = $conn->query("SELECT * FROM `anime_tag_relations` WHERE `anime`='$anime'");
    if(mysqli_num_rows($tags)!==0) {
        while ($tag = $tags->fetch_assoc()):
            $output .= glyph("tag",convert_tag($tag["tag"]));
            $output .= '<a href="'.$config["url"].'tag/'.$tag["tag"].'">';
            $output .= convert_tag($tag["tag"]);
            $output .= '</a> ';
        endwhile; 
     } else { 
        $output .= "No Tags D:";   
    }
    
    return $output;
}

?>
