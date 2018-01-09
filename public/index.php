<?php
require_once __DIR__. "/../app/bootstrap.php";

use Core\Router;
use Core\Request;

Router::load()
    ->handle(Request::uri(), Request::method());
