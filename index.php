<?php

require_once "bootstrap.php";
use App\Core\Router;
use App\Core\Request;

if (!session_id()) {
    session_start();
}

$_SESSION['flash']['errors'] = [];

Router::load()
    ->handle(Request::uri(), Request::method());
