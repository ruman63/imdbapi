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

    public function search($keyword, $type = null)
    {
        $type = array_search($type, ['movie', 'series', 'episode'], true) ? $type : null;
        return $this->fetch([
            's' => $keyword,
            'type'=> $type
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
            throw new Exception("Failure: {$contents->Error}");
        }
        unset($contents->Response);
        return $contents;
    }
}
