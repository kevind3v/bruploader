<?php

require __DIR__ . "/../vendor/autoload.php";

use BrBunny\BrUploader\Base64;

if ($_GET && $_GET['path']) {
    Base64::remove($_GET['path']);
}

header("location: base64.php");
