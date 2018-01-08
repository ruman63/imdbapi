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
        $search = Request::query('search');
        $page = Request::query('page') ?? 1;
        if (!$search) {
            return view('index');
        }
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
