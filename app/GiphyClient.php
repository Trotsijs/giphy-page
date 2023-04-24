<?php declare(strict_types=1);

namespace App;

use Symfony\Component\Dotenv\Dotenv;
use GuzzleHttp\Client;

class GiphyClient
{
    function getApiKey(): string
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/.env');

        return $_ENV['API_KEY'];
    }

    function searchGifs($input): \stdClass
    {
        $apiKey = $this->getApiKey();
        $urlStart = 'https://api.giphy.com/v1/gifs/search?api_key=';
        $endEnd = '&limit=5&offset=0&rating=g&lang=en';
        $url = $urlStart . $apiKey . '&q=' . $input . $endEnd;
        $client = new Client;
        $response = $client->request('GET', $url);

        return json_decode($response->getBody()->getContents());
    }

    function trendingGifs(): \stdClass
    {
        $apiKey = $this->getApiKey();
        $urlStart = 'https://api.giphy.com/v1/gifs/trending?api_key=';
        $urlEnd = '&limit=5&rating=g';
        $url = $urlStart . $apiKey . $urlEnd;
        $client = new Client;
        $response = $client->request('GET', $url);

        return json_decode($response->getBody()->getContents());
    }

}