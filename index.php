<?php declare(strict_types=1);

use App\Controllers\GifController;
use App\Models\Giphy;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';
require_once 'router.php';

$gifController = new GifController();
$searchedGifs = $gifController->search();
$trendingGifs = $gifController->trending();
$randomGifs = $gifController->random();

$loader = new FilesystemLoader(__DIR__ . '/App/Views');
$twig = new Environment($loader);

$gifs = [];

if (!empty($searchedGifs)) {
    foreach ($searchedGifs as $gif) {
        $gifs[] = new Giphy($gif->title, $gif->images->original->url);
    }
} else {
    foreach ($trendingGifs as $gif) {
        $gifs[] = new Giphy($gif->title, $gif->images->original->url);
    }
}

echo $twig->render('view.twig', ['gifs' => $gifs]);