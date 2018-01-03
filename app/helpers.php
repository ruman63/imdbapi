<?php

function dd($variable)
{
    var_dump($variable);
    die();
}

function view($view, $data = [])
{
    extract($data);
    require "app/views/{$view}.view.php";
}
