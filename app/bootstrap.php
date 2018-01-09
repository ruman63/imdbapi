<?php

// comment the following lines in production
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ERROR);

require_once __DIR__ . "/../vendor/autoload.php";
if (!session_id()) {
    session_start();
}
$_SESSION['flash']['errors'] = [];
