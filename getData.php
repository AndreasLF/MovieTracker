<?php


$apikey = "b044049a";
$type = "movie";

//replaces spaces with +
//$title = preg_replace("/\s/","+",trim($_GET['title']));
$title = "Tomb+Raider";

$movieUrl = "https://www.omdbapi.com/?apikey=".$apikey."&s=".$title."&type=".$type;


$json = file_get_contents($movieUrl);
$movieObj = json_decode($json);


//If the response from OMDB contains movies it will be modified to contain a boolean which tells whether or not each movie is in the database 
if($movieObj->Response == "True"){
    
    $newMovieObj = array(
        "Response" => $movieObj->Response,
        "totalResults" => $movieObj->totalResults
    );
        
    $searchResults;
    
    foreach($movieObj->Search as $key=>$movie){

        
        //Converts the object to an array, adds a parameter and converts it back to an object
        $movie = (object) array_merge((array)$movie,array('isInList'=>true));
        //var_dump($movieElement);  
        $searchResults[$key] = $movie;
    }
    
    $newMovieObj['Search'] = $searchResults;
    $json = json_encode($newMovieObj);
}


echo $json;



?>