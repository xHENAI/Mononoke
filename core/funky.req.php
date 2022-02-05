<?php

// core/funky.req.php - Mononoke

// Login function because I need to set cookies

if(isset($_POST["login_user"])) {
    $error = false;
    $error_msg = "";
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password = hash("sha512",$password);
    $usercheck = $conn->query("SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
    if(mysqli_num_rows($usercheck)==1) {
        $token = rand();
        $token = md5($token);
        setcookie("".$config["cookie"]."session", $token, time()+(86400*30), "/", $config["domain"]);
        $_SESSION[$config["cookie"]."session"] = $token;
        $conn->query("INSERT INTO `user_tokens`(`user`,`token`) VALUES('$username','$token')");
        redirect("home");
    } else {
        $error = true;
        $error_msg = "Username/Password is wrong!";
    }
}

/* Functions */

function glyph($glyph, $title) {
    echo "<span class=\"glyphicon glyphicon-$glyph\" title=\"$title\"></span>";
}

function redirect($destination) {
    echo "<script type=\"text/javascript\"> document.location = \"".$config["url"].$destination."\"; </script>";
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
    echo $level;
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
    echo $theme;
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

?>
