<?php


$apikey = "b044049a";
$movieTitle = "Pacific Rim"


$movieUrl = "https://www.omdbapi.com/?apikey=".$apiKey."&t=".$movieTitle;


$json = file_get_contents($movieUrl);
$movieObj = json_decode($json);


var_dump($movieObj);

?>