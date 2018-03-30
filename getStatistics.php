<?php


session_start();


if (!(isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200))){
    header('Location: index.html');
}else{
    $moviesList = getMoviesFromDatabase($_SESSION['username']);
    
    
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






function getMoviesFromDatabase($username){
    
    //Connects to the database by including the code from connection.php
    require 'connection.php';

    //Prepares a mysql query
    
    $query = "SELECT * FROM ".$username;
    $result = mysqli_query($connection,$query);

    $moviesList = array();
    
     while($row=$result->fetch_assoc()){
         array_push($moviesList,json_decode($row['json']));
     }
        
    return $moviesList;            
}




?>