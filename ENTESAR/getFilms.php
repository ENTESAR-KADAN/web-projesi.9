<?php
$api_key = 'YOUR_TMDB_API_KEY';
$url = "https://api.themoviedb.org/3/movie/popular?api_key=$api_key";
$response = file_get_contents($url);
echo $response;
?>
