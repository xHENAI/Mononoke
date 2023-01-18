<!doctype html>
<html lang="<?= $lang ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <?php if (!empty($config["favicon"]["favicon"])) { ?>
        <link rel="icon" type="image/png" sizes="48x48" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["favicon"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["apple"])) { ?>
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["apple"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["16x16"])) { ?>
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["16x16"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["32x32"])) { ?>
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["32x32"] ?>">
    <?php } ?>
    <?php if (!empty($config["favicon"]["webmanifest"])) { ?>
        <link rel="manifest" href="<?= $config["url"] . $config["favicon"]["dir"] . $config["favicon"]["webmanifest"] ?>">
    <?php } ?>