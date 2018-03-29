<?php

//Connects to the database by including the code from connection.php
require 'connection.php';

$imdbId = "tt1365519";

$json = file_get_contents('https://www.omdbapi.com/?apikey=b044049a&i='.$imdbId);
    
 //Creates a prepared statement for the database
$stmt = mysqli_prepare($connection,"INSERT INTO moviesjson(imdbId,json) VALUES (?,?)");
            
//Binds parameters to the prepared statement. Every parameter is of type String
$stmt->bind_param("ss",$imdbId,$json); 

//Executes the prepared statement. Returns a boolean - true on succes and false on failure.
$result = $stmt->execute(); 

//If $result is true (mysqli_query was unsuccesful)
if ($result){ 
            //This redirects the browser to login.html
            //echo "succes";
        }
        else{ 
            //An error message is created and stored in the session variable
            exit("ERROR executing: $query"."<br>". mysqli_error($result)); 
        }



//Creates a prepared statement for the database
        $stmt = mysqli_prepare($connection,"SELECT json FROM `moviesjson` WHERE imdbId=?");
            
        //Binds parameters to the prepared statement. Every parameter is of type String
        $stmt->bind_param("s",$imdbId); 

        //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
        $result = $stmt->execute();
        
        $stmt->bind_result($mjson);
       
        $stmt->fetch(); 

echo $mjson;



?>
