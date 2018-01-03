<?php

require_once "bootstrap.php";
use App\Core\Router;
use App\Core\Request;

Router::load()
    ->handle(Request::uri(), Request::method());
