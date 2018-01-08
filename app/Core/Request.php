<?php
namespace App\Core;

class Request
{
    public static function uri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public static function current(array $query = [])
    {
        $queryString = http_build_query($query);
        return self::uri() . "/?{$queryString}";
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function params($key)
    {
        if (array_key_exists($key, $_POST)) {
            return trim($_POST[$key]);
        }
    }

    public static function query($key)
    {
        if (array_key_exists($key, $_GET)) {
            return trim($_GET[$key]);
        }
    }
}
