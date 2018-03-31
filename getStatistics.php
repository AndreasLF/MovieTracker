<?php

session_start();
require 'MySqlConnection.class.php';


if (!(isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200))){
    header('Location: index.html');
}
else{
    $username = $_SESSION['username'];
    
    $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",$username);

    $movies = $mySqlConnection->getColumnAsArray("json");
    
    $moviesList = array();
    
    foreach($movies as $movie){
        array_push($moviesList,json_decode($movie));
    }
        
    
    
    $totalMinutes = 0;
    $imdbRatingSum = 0;
    
    foreach($moviesList as $movie){
        preg_match('/(\d+)\s/', $movie->Runtime, $matches);
        
        $totalMinutes = $totalMinutes + (int)$matches[1];
        $imdbRatingSum = $imdbRatingSum + (float)$movie->imdbRating;
    }
         
    $totalHours = $totalMinutes/60;
    $totalDays = $totalMinutes/(60*24);
    
    $averageImdbScore = $imdbRatingSum/ count($moviesList);
    
    $statisticsArray = array(
    "totalMinutes" => $totalMinutes,
    "totalHours" => $totalHours,
    "totalDays" => $totalDays,
    "averageImdbScore" => $averageImdbScore
    );
    $statisticsJSON = json_encode($statisticsArray);
    echo $statisticsJSON;
}





?>