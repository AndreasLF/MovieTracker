<?php


$apikey = "b044049a";
$type = "movie";

//replaces spaces with +
$title = preg_replace("/\s/","+",trim($_GET['title']));


$movieUrl = "https://www.omdbapi.com/?apikey=".$apikey."&s=".$title."&type=".$type;


$json = file_get_contents($movieUrl);
$movieObj = json_decode($json);

echo $json;

?>