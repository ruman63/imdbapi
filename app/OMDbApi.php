<?php
namespace App;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class OMDbApi
{
    const BASE_URI = "http://www.omdbapi.com/";
    const OMDB_KEY = '501a6dc9';
    protected $client;
    
    
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI
        ]);
    }

    public function search($keyword, $page = 1, $type = null)
    {
        $type = array_search($type, ['movie', 'series', 'episode'], true) ? $type : null;
        return $this->fetch([
            's' => $keyword,
            'type' => $type,
            'page' => $page
        ]);
    }

    public function findById($id, $plot = 'full')
    {
        return $this->fetch([
            'i' => $id,
            'plot' => $plot
        ]);
    }
    
    public function fetch($query)
    {
        $query['apikey'] = self::OMDB_KEY;
        $response = $this->client->get('/', ['query' => $query]);
        $contents = json_decode($response->getBody()->getContents());
        if ($contents->Response !== 'True') {
            if ($contents->Error == 'Movie not found!') {
                $_SESSION['flash']['errors'][] = "No Results Found! Try different keywords.";
            } elseif ($contents->Error == 'Too many results.') {
                $_SESSION['flash']['errors'][] = "Too few characters! Too many results. Be a little more specific.";
            } elseif ($contents->Error == 'Incorrect IMDb ID.') {
                $_SESSION['flash']['errors'][] = "Invalid IMDb ID! No movie found!";
            } else {
                $_SESSION['flash']['errors'][] = $contents->Error;
            }
        }
        unset($contents->Response);
        return $contents;
    }
}
