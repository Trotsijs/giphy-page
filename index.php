<?php declare(strict_types=1);

use App\GiphyClient;

require_once 'vendor/autoload.php';
require_once 'view.php';

$input = $_POST["search"] ?? "";
$gifsClient = new GiphyClient();
$searchedGifs = $gifsClient->searchGifs($input);
$trendingGifs = $gifsClient->trendingGifs();
?>
<div style="text-align: center; padding-top: 50px"

<?php
if ($input) {
    foreach ($searchedGifs->data as $image) {
        echo '<br><img src="' . $image->images->original->url . '" alt="image"/></br>';
    }
} else {
    foreach ($trendingGifs->data as $image) {
        echo '<br><img src="' . $image->images->original->url . '" alt="image"/></br>';
    }
}
?>

<div style="text-align: center; padding-top: 20px; padding-bottom: 20px">
    <a href="https://giphy.com/"><img src="https://shorturl.at/fgvD5" alt=""/></a>
</div>