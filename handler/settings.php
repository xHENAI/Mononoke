<?php

require "../load.php";
if (!$loggedin) die("Are you sure you want to exist without saving?");

$error = false;
$error_msg = "";

if (isset($_GET["save"])) {
    $u_public = stripNumbers($conn->escape($purifier->purify($_GET["public"])));
    $u_img = stripNumbers($conn->escape($purifier->purify($_GET["image"])));
    $u_twitter = $conn->escape($purifier->purify($_GET["twitter"]));
    $u_discord = $conn->escape($purifier->purify($_GET["discord"]));
    $u_website = $conn->escape($purifier->purify($_GET["website"]));
    $u_perpage = stripNumbers($conn->escape($purifier->purify($_GET["perpage"])));

    // perform image check here!
    $occured = 0;
    foreach ($avatars as $av) {
        if ($av["id"] == $u_img) {
            $occured++;
            $u_img = $av["url"];
        }
    }
    if ($occured == 0) $error = true && $error_msg = "Invalid Avatar faggot";

    if ($error == false) {
        $conn->where("id", $user->getId())->update("user", array(
            "public" => $u_public,
            "image" => $u_img,
            "twitter" => $u_twitter,
            "discord" => $u_discord,
            "website" => $u_website,
            "perpage" => $u_perpage
        ));
        header("Refresh: 0; url=?");
    }
}

// if (isset($_GET["changepass"])) {
//     $old_pass = mysqli_real_escape_string($conn, $_GET["old_pass"]);
//     $new_pass1 = mysqli_real_escape_string($conn, $_GET["new_pass1"]);
//     $new_pass2 = mysqli_real_escape_string($conn, $_GET["new_pass2"]);
//     $check1 = preg_match('/[^.a-zA-Z0-9-_$]/', $new_pass1);
//     $check2 = preg_match('/[^.a-zA-Z0-9-_$]/', $new_pass2);

//     if ($check2 == true) {
//         $error = true;
//         $error_msg = "Password contains bad characters!";
//     }
//     if ($check1 == true) {
//         $error = true;
//         $error_msg = "Password contains bad characters!";
//     }

//     $check = password_verify($old_pass, $user["password"]);

//     if ($new_pass1 != $new_pass2) {
//         $error = true;
//         $error_msg = "New Passwords don't match!";
//     }

//     if ($check == true) {
//         // Password is correct
//         $password = password_hash($new_pass1, PASSWORD_BCRYPT);
//         $conn->query("UPDATE `user` SET `password`='$password' WHERE `id`='" . $user["id"] . "'");
//         header("Refresh: 0; url=logout");
//     } else {
//         $error = true;
//         $error_msg = "The old password seems to be wrong...";
//     }
// }

include("../themes/$theme/parts/header.php");
include("../themes/$theme/parts/menu.php");
include("../themes/$theme/settings.php");
if ($tinfo["sidebar"]["settings"] == true) {
    include("../themes/$theme/parts/sidebar.php");
}
include("../themes/$theme/parts/footer.php");
