<?php
$url = 'https://www.thesportsdb.com/api/v1/json/1/eventspastleague.php?id=4328';
$response = file_get_contents($url);
echo $response;
?>
