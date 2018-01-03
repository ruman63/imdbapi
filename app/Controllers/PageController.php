<?php
namespace App\Controllers;

use App\OMDbApi;
use App\Core\Request;

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
        $type = Request::query('type');
        
        $result = $this->api->search($search, $type);
        $list = $result->Search;
        $total = $result->totalResults;
        
        return view('index', compact('list', 'total'));
    }

    public function show()
    {
        $id = Request::query('id');
        $movie = $this->api->findById($id);
        return view('show', compact('movie'));
    }
}
