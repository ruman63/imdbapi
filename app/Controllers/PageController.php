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
        
        $list = $this->api->search($search, $type);
        
        return view('index', compact('list'));
    }

    public function show()
    {
        $id = Request::query('id');
        $movie = $this->api->findById($id);
        return view('show', compact('movie'));
    }
}
