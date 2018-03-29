<?php


$apikey = "b044049a";
$title = $_GET['title'];
$type = "movie";



$movieUrl = "https://www.omdbapi.com/?apikey=".$apikey."&s=".$title."&type=".$type;


$json = file_get_contents($movieUrl);
$movieObj = json_decode($json);

echo $json;
?>