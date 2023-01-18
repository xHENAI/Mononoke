<?php

function generateGenre($type = 1)
{
    require("../core/config.php");
    require("../core/arrays.php");
    $output = "";
    if ($type == 1) {
        foreach ($genres as $genre) {
            $output .= '<li><input type="checkbox" id="genre-' . $genre["slug"] . '" name="genre[]" value="' . $genre["id"] . '"> <label for="genre-' . $genre["slug"] . '">' . $genre["name"] . '</label></li>';
        }
    } elseif ($type == 2) {
        // Output for "Genre" Page
        foreach ($genres as $genre) {
            $output .= '<li><input type="checkbox" id="genre-' . $genre["slug"] . '" name="genre[]" value="' . $genre["id"] . '"> <label for="genre-' . $genre["slug"] . '">' . $genre["name"] . '</label></li>';
        }
    } else {
        // Output for Sidebar
        foreach ($genres as $genre) {
            $output .= '<li><a href="' . $config["url"] . 'genre/' . $genre["slug"] . '" title="View all series in ' . $genre["name"] . '" rel="tab">' . $genre["name"] . '</a></li>';
        }
    }
    return $output;
}

function generateSeasons($type = 1)
{
    require("../core/config.php");
    require("../core/conn.php");
    $output = "";
    $seasons = $conn->query("SELECT * FROM `{$dbp}season` ORDER BY `name` ASC");
    if ($type == 1) {
        foreach ($seasons as $season) {
            $output .= '<li><input type="radio" id="season-' . $season["slug"] . '" name="season" value="' . $season["id"] . '"> <label for="season-' . $season["slug"] . '">' . $season["name"] . '</label></li>';
        }
    } else {
        // Output for "Seasons" Page
        foreach ($seasons as $season) {
            $output .= '<li><input type="checkbox" id="season-' . $season["slug"] . '" name="season[]" value="' . $season["id"] . '"> <label for="season-' . $season["slug"] . '">' . $season["name"] . '</label></li>';
        }
    }
    return $output;
}

function generateStudios($type = 1)
{
    require("../core/config.php");
    require("../core/conn.php");
    $output = "";
    $studios = $conn->query("SELECT * FROM `studio` ORDER BY `name` ASC");
    if ($type == 1) {
        foreach ($studios as $studio) {
            $output .= '<li><input type="radio" id="studio-' . $studio["slug"] . '" name="studio[]" value="' . $studio["id"] . '"> <label for="studio-' . $studio["slug"] . '">' . $studio["name"] . '</label></li>';
        }
    } else {
        // Output for "Studios" Page
        foreach ($studios as $studio) {
            $output .= '<li><input type="checkbox" id="studio-' . $studio["slug"] . '" name="studio[]" value="' . $studio["id"] . '"> <label for="studio-' . $studio["slug"] . '">' . $studio["name"] . '</label></li>';
        }
    }
    return $output;
}

function generateTypes()
{
    require("../core/config.php");
    require("../core/conn.php");
    $output = "";
    $types = $conn->query("SELECT * FROM `{$dbp}type` ORDER BY `name` ASC");
    foreach ($types as $type) {
        $output .= '<li><input type="radio" id="type-' . $type["slug"] . '" name="type" value="' . $type["id"] . '"> <label for="type-' . $type["slug"] . '">' . $type["name"] . '</label></li>';
    }
    return $output;
}

function getStudio($id, $html = false)
{
    require("../core/config.php");
    require("../core/conn.php");
    $id = stripNumbers($id);
    $studios = $conn->query("SELECT * FROM `studio` WHERE `id`='$id'");
    $i = 1;
    //$studio = mysqli_fetch_assoc($studio);
    if ($html == true) {
        foreach ($studios as $studio) {
            if ($i == 1) {
                $output = "<a href='" . $config["url"] . "studio/" . $studio["slug"] . "' rel='tab'>" . $studio["name"] . "</a>";
            } else {
                $output = ", <a href='" . $config["url"] . "studio/" . $studio["slug"] . "' rel='tab'>" . $studio["name"] . "</a>";
            }
            $i++;
        }
    } else {
        foreach ($studios as $studio) {
            if ($i == 1) {
                $output = $studio["name"];
            } else {
                $output = ", " . $studio["name"];
            }
            $i++;
        }
    }
    return $output;
}

function countIt($type, $id)
{
    require("../core/config.php");
    require("../core/conn.php");
    if ($type == "season") {
        $count = $conn->query("SELECT COUNT(*) AS total FROM `{$dbp}anime` WHERE `season_id`='$id'");
        $count = mysqli_fetch_assoc($count);
        $output = $count["total"];
    }
    if ($type == "episodes") {
        $count = $conn->query("SELECT COUNT(*) AS total FROM `{$dbp}episode` WHERE `anime_id`='$id'");
        $count = mysqli_fetch_assoc($count);
        if (!empty($count["total"])) {
            $output = $count["total"];
        } else {
            $output = "?";
        }
    }
    if ($type == "genre") {
        $count = $conn->query("SELECT COUNT(*) AS total FROM `{$dbp}anime` WHERE JSON_CONTAINS(`genre`,'[$id]', '$')");
        $count = mysqli_fetch_assoc($count);
        $output = $count["total"];
    }
    if ($type == "studio") {
        $count = $conn->query("SELECT COUNT(*) AS total FROM `{$dbp}anime` WHERE JSON_CONTAINS(`studio_id`,'[$id]', '$')");
        $count = mysqli_fetch_assoc($count);
        $output = $count["total"];
    }
    return $output;
}

function convertType($type, $html = false)
{
    require("../core/config.php");
    require("../core/conn.php");
    $type = $conn->query("SELECT * FROM `{$dbp}type` WHERE `id`='$type'");
    $type = mysqli_fetch_assoc($type);
    if ($html == true) {
        $output = "<a href='" . $config["url"] . "type/" . $type["slug"] . "' rel='tab'>" . $type["name"] . "</a>";
    } else {
        $output = $type["name"];
    }
    return $output;
}

function convertStatus($status)
{
    if ($status == 0) {
        $output = "Announced";
    } elseif ($status == 1) {
        $output = "Ongoing";
    } elseif ($status == 2) {
        $output = "Completed";
    } elseif ($status == 3) {
        $output = "Hiatus";
    } else {
        $output = "Canceled";
    }
    return $output;
}

function getUser($uid, $html = false)
{
    require("../core/config.php");
    require("../core/conn.php");
    $uex = $conn->query("SELECT * FROM `user` WHERE `id`='$uid' LIMIT 1");
    if (mysqli_num_rows($uex) == 1) {
        $uex = mysqli_fetch_assoc($uex);
        if ($html == true) {
            $output = '<a href="' . $config["url"] . 'fan/' . $uex["username"] . '">' . $uex["username"] . '</a>';
        }
    }
    return $output;
}

function getSeason($id, $html = false)
{
    require("../core/config.php");
    require("../core/conn.php");
    $id = stripNumbers($id);
    $seasons = $conn->query("SELECT * FROM `season` WHERE `id`='$id' LIMIT 1");
    //$season = mysqli_fetch_assoc($season);
    if ($html == true) {
        foreach ($seasons as $season) {
            $output = "<a href='" . $config["url"] . "season/" . $season["slug"] . "' rel='tab'>" . $season["name"] . "</a>";
        }
    } else {
        foreach ($seasons as $season) {
            $output = $season["name"];
        }
    }
    return $output;
}

function getCountry($id, $html = false)
{
    require("../core/config.php");
    require("../core/conn.php");
    $country = $conn->query("SELECT * FROM `country` WHERE `id`='$id' LIMIT 1");
    if (mysqli_num_rows($country) == 1) {
        $country = mysqli_fetch_assoc($country);
        if ($html == true) {
            $output = "<a href='" . $config["url"] . "country/" . $country["slug"] . "' rel='tab'>" . $country["name"] . "</a>";
        } else {
            $output = $country["name"];
        }
    } else {
        $output = "Unknown";
    }
    return $output;
}

function convertCensor($type)
{
    if ($type == "0") {
        $output = "Censored";
    } else {
        $output = "Uncensored";
    }
    return $output;
}

function convertTags($tags, $type = 1)
{
    require("../core/config.php");
    require("../core/arrays.php");
    $tags = json_decode($tags);
    $i = 1;
    $output = "";
    foreach ($tags as $tag) {
        if ($type == 1) {
            // Default HTML Sytle on Anime page
            $tag = $genres[$tag];
            $output .= '<a href="' . $config["url"] . 'genre/' . $tag["slug"] . '" rel="tab">' . $tag["name"] . '</a> ';
        } elseif ($type == 2) {
            // Style for sidebar tags with comma
            $tag = $genres[$tag];
            if ($i == 1) {
                $output .= '<a href="' . $config["url"] . 'genre/' . $tag["slug"] . '" rel="tab">' . $tag["name"] . '</a>';
            } else {
                $output .= ', <a href="' . $config["url"] . 'genre/' . $tag["slug"] . '" rel="tab">' . $tag["name"] . '</a>';
            }
            $i++;
        }
    }
    return $output;
}

function checkAdmin($level = 5)
{
    require("../core/config.php");
    if ($level != 0 && $level != 1) {
        header("location: " . $config["url"]);
    } else {
        return true;
    }
}

function checkAdmin2($level = 5)
{
    require("../core/config.php");
    if ($level != 0 && $level != 1) return false;
    return true;
}

function displayAnimelist($initial)
{
    require("../core/config.php");
    require("../core/conn.php");
    $output = "";
    $animes = $conn->query("SELECT * FROM `{$dbp}anime` WHERE `name` LIKE '$initial%'");
    $i = 1;
    foreach ($animes as $anime) {
        if ($i == 1) {
            $output .= "<ul>";
        }
        $output .= '<li><a class="tip series" rel="tab" href="' . $config["url"] . 'anime/' . $anime["slug"] . '" rel="tab">' . $anime["name"] . '</a></li>';
        $i++;
    }
    $output .= "</ul>";
    return $output;
}
