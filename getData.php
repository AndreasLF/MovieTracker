<?php


$apikey = "b044049a";

$movieUrl = "https://www.omdbapi.com/?apikey=".$apiKey."&t=pacific%20rim";


$json = file_get_contents($movieUrl);
$movieObj = json_decode($json);


var_dump($movieObj);

?>