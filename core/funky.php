<?php

function cat($text, $type = "url")
{
    // This function is used, to make all titles readable for the URL and links
    if ($type == "url") {
        $out = preg_replace('/[^A-Za-z0-9\-_,.]/', '', str_replace("&", "et", str_replace(' ', '-', strtolower($text))));
    } elseif ($type == "clean") {
        $out = str_replace("'", "\'", trim(stripslashes(strip_tags(htmlspecialchars($text)))));
    }
    return $out;
}

function stripNumbers($input)
{
    return preg_replace('/[^0-9]/', '', json_encode($input));
}

function mysqlBasteln($genre, $season, $studio, $status, $type, $sub, $order, $count = false)
{
    require("config.php");
    $output = "";
    if ($count == true) {
        $output .= "SELECT COUNT(*) FROM `{$dbp}anime` ";
    } else {
        $output .= "SELECT * FROM `{$dbp}anime` ";
    }
    if (!empty($genre) || !empty($season) || !empty($studio) || !empty($status) || !empty($type) || !empty($sub)) {
        $output .= "WHERE ";
    }
    if (!empty($genre)) {
        $output .= "JSON_CONTAINS(`genre`,'$genre', '$') ";
    }
    if (!empty($genre) && (!empty($season) || !empty($studio) || !empty($status) || !empty($sub) || !empty($type))) {
        $output .= "AND ";
    }
    if (!empty($season)) {
        $output .= "`season_id`='$season' ";
    }
    if (!empty($season) && (!empty($studio) || !empty($status) || !empty($sub) || !empty($type))) {
        $output .= "AND ";
    }
    if (!empty($studio)) {
        $output .= "JSON_CONTAINS(`studio_id`,'$studio', '$') ";
    }
    if (!empty($studio) && (!empty($status) || !empty($sub) || !empty($type))) {
        $output .= "AND ";
    }
    if (!empty($status)) {
        $output .= "`status`='$status' ";
    }
    if (!empty($status) && (!empty($sub) || !empty($type))) {
        $output .= "AND ";
    }
    if (!empty($type)) {
        $output .= "`type_id`='$type' ";
    }
    if (!empty($type) && (!empty($sub))) {
        $output .= "AND ";
    }
    if (!empty($sub)) {
        $output .= "`sub`='$sub' ";
    }
    if (!empty($order)) {
        $output .= "ORDER BY $order";
    } else {
        $output .= "ORDER BY `name` ASC";
    }
    return $output;
}

function randomColor()
{
    require("arrays.php");
    return array_rand($colors);
}

function captchaVerify($data)
{
    require("config.php");
    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($verify);
    $responseData = json_decode($response);
    if ($responseData->success) {
        $output = "success";
    } else {
        $output = "error";
    }

    return $output;
}

function convertTime($time, $full = false)
{
    $date = new DateTime($time);
    if ($full == true) {
        $result = $date->format('d/m/Y H:i:s');
    } else {
        $result = $date->format('d/m/Y');
    }
    return $result;
}
