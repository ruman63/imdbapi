<?php
namespace App\Controllers;

use App\OMDbApi;
use App\Core\Request;
use App\Core\Paginator;

class PageController
{
    protected $api;

    public function __construct()
    {
        $this->api = new OMDbApi();
    }

    public function index()
    {
        if (!$search = Request::query('search')) {
            return view('index');
        }
        $page = Request::query('page') ?? 1;
        $type = Request::query('type');
        $result = $this->api->search($search, $page, $type);
        $movies = new Paginator($result->Search ?? [], $result->totalResults ?? 0);
        return view('index', compact('movies'));
    }

    public function show()
    {
        $id = Request::query('id');
        $movie = $this->api->findById($id);
        return view('show', compact('movie'));
    }
}
