<?php

/*This script calculates som statistics from the list of movies in the database and echoes them ad JSON*/

//require the checkLoginSession function
require "checkLoginSession.function.php";
//Requires the MySqlConnection class
require 'MySqlConnection.class.php';

//Checks the session for logindata
$login = checkLoginSession();

//If the user is not logged in
if (!($login['valid'])){
    //Redirect to index.html
    header('Location: index.html');
}
else{
    //The username is saved
    $username = $login['username'];
    
    //A new MySqlConnection object is created
    $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",$username);

    //gets an array of the json column in the database
    $movies = $mySqlConnection->getColumnAsArray("json");
    
    //Creates an array to contaun movies
    $moviesList = array();
    
    //For each movie in the movies array
    foreach($movies as $movie){
        //The movie gets json_decoded and is added to the moviesList
        array_push($moviesList,json_decode($movie));
    }
        
    
    
    $totalMinutes = 0;
    $imdbRatingSum = 0;
    
    //For each movie in the movies list
    foreach($moviesList as $movie){
        //Uses regular expression to get the runtime and not the following "min."
        preg_match('/(\d+)\s/', $movie->Runtime, $matches);
        
        //The runtime will be added
        $totalMinutes = $totalMinutes + (int)$matches[1];
        
        //The imdb rating will be added
        $imdbRatingSum = $imdbRatingSum + (float)$movie->imdbRating;
    }
         
    //totalMinutes is converted to hours by division with 60
    $totalHours = $totalMinutes/60;
    //totalMinutes is converted to days
    $totalDays = $totalMinutes/(60*24);
    
    //The average idmb score is calculated
    $averageImdbScore = $imdbRatingSum/ count($moviesList);
    
    //The stats are added to an array
    $statisticsArray = array(
    "totalMinutes" => $totalMinutes,
    "totalHours" => $totalHours,
    "totalDays" => $totalDays,
    "averageImdbScore" => $averageImdbScore
    );
    //Json encodes the stats
    $statisticsJSON = json_encode($statisticsArray);
    //echoes the json
    echo $statisticsJSON;
}





?>