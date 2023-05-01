<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\GiphyClient;

class GifController
{
    private GiphyClient $client;

    public function __construct()
    {
        $this->client = new GiphyClient();
    }

    public function search(): array
    {
        $search = $_POST['search'] ?? '';

        return $this->client->fetchSearchGifs($search);
    }

    public function trending(): array
    {
        return $this->client->fetchTrendingGifs();

    }

    public function random(): array
    {
        return $this->client->fetchRandomGifs();
    }
}