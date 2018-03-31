<?php

require "checkLoginSession.function.php";
require "MySqlConnection.class.php";

$apikey = "b044049a";
$type = "movie";
$title = "";

//Checks if a search string has been specified
if(isset($_GET['title'])){
    //replaces spaces with +
    $title = preg_replace("/\s/","+",trim($_GET['title']));
}

//The movie url is created
$movieUrl = "https://www.omdbapi.com/?apikey=".$apikey."&type=".$type."&s=".$title;

//Gets search results from the url. The api provides a json file
$json = file_get_contents($movieUrl);

//The json is decoded. This turns it into a php array
$movieArray = json_decode($json,true);

//If the response from OMDB contains movies it will be modified to contain a boolean which tells whether or not each movie is in the database 
if($movieArray['Response'] == "True"){
    
    $login = checkLoginSession();
    
    if($login['valid']){
        $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",$login['username']);
        
        //ERROR MSG MISSING!
        
        //Array to contain movie ids
        $movieIdArray = array();
        
        //For each search result the imdbId is added to the array
        foreach($movieArray['Search'] as $key=>$movie){
            $imdbId = $movie['imdbID'];
            $movieIdArray[$key] = $imdbId;
        }
        
        $isInListArray = $mySqlConnection->inDatabaseBatch($movieIdArray); 
        //ERROR MSG MISSING
        
        //Adds the isInListArray to the movieArray
        $movieArray['isInList'] = $isInListArray;
        //Encodes the array as a json string 
        $json = json_encode($movieArray);
    }    
}

echo $json;





?>