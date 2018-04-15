<?php
/*This script searches for movies and return the results as a JSON*/

//require the checkLoginSession function
require "checkLoginSession.function.php";
//Requires the MySqlConnection class
require 'MySqlConnection.class.php';

//Apikey for omdb is defined
$apikey = "b044049a";
//Only search for content of the type movie
$type = "movie";
//Title is defined but set to an empty string
$title = "";

//Checks if a search string has been specified
if(isset($_GET['title'])){
    //replaces spaces with +'s to prevent errors when accessing the API
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
    
    //Validates the session login data
    $login = checkLoginSession();
    
    //If the user is logged in the following code will check if the movie is in the database
    if($login['valid']){
        $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",$login['username']);
                
        //Array to contain movie ids
        $movieIdArray = array();
        
        //For each search result the imdbId is added to the array
        foreach($movieArray['Search'] as $key=>$movie){
            $imdbId = $movie['imdbID'];
            $movieIdArray[$key] = $imdbId;
        }
        
        //Checks if the list of movies is in the database
        $isInListArray = $mySqlConnection->inDatabaseBatch($movieIdArray); 
        
        //Adds the isInListArray to the movieArray
        $movieArray['isInList'] = $isInListArray;
        //Encodes the array as a json string 
        $json = json_encode($movieArray);
    }    
}

//Echoes the json
echo $json;





?>