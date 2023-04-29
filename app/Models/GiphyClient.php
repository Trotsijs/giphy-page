<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GiphyClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchSearchGifs($input): array
    {
        $url = 'https://api.giphy.com/v1/gifs/search';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'api_key' => $_ENV['API_KEY'],
                'q' => $input,
                'limit' => 5,
                'rating' => 'g',
            ],
        ]);

        return json_decode($response->getBody()->getContents())->data;
    }

    public function fetchTrendingGifs(): array
    {
        $url = 'https://api.giphy.com/v1/gifs/trending';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'api_key' => $_ENV['API_KEY'],
                'limit' => 5,
                'rating' => 'g',
            ],
        ]);

        return json_decode($response->getBody()->getContents())->data;
    }

}