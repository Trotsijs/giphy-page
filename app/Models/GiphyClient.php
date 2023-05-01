<?php declare(strict_types=1);

namespace App\Models;

use GuzzleHttp\Client;

class GiphyClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchSearchGifs($search): array
    {
        $url = 'https://api.giphy.com/v1/gifs/search';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'api_key' => $_ENV['API_KEY'],
                'q' => $search,
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

    public function fetchRandomGifs(): array
    {
        $url = 'https://api.giphy.com/v1/gifs/random';

        $gifs = [];

        for ($i = 0; $i < 5; $i++) {
            $response = $this->client->request('GET', $url, [
                'query' => [
                    'api_key' => $_ENV['API_KEY'],
                    'tag' => '',
                    'rating' => 'g',
                ],
            ]);
            $gifs[] = json_decode($response->getBody()->getContents())->data;
        }

        return $gifs;
    }

}