<?php

function dd($variable)
{
    var_dump($variable);
    die();
}

function view($view, $data = [])
{
    extract($data);
    require "views/{$view}.view.php";
}

function str_limit($string, $limit=100, $append='...')
{
    return strlen($string) > $limit ? substr($string, 0, $limit) . $append : $string;
}

function flashError($message)
{
    $_SESSION['flash']['errors'][] = $message;
}
function errors()
{
    return $_SESSION['flash']['errors'];
}
