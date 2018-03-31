<?php

require "MySqlConnection.class.php";

session_start();


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
    
    $login = isLoggedIn();
    
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


/*
* This checks if a movie is in the database
* 
*
* param String $imdbId is the imdb Id of the movie to check with the database
* return boolean. If the movie is in the database it returns true. If not false is returned. If the user is not logged in false will be returned
*/
function isMovieInDatabase($imdbId){
    

    //Connects to the database by including the code from connection.php
    require 'connection.php';

    $loggedIn = isLoggedIn();
    
    if($loggedIn['valid']){

            //The username is saved
            $username = $loggedIn['username'];

            //Prepares a statement for the database
            $stmt = $mysqli->prepare("SELECT * FROM ".$username." WHERE imdbId = ?");

            //If the prepared statement fails to be defined the script will exit with an error message
            if(!($stmt)){
                //Exits with an error message
                //htmlspecialchars converts the characters into html enitities
                exit("mysqli_prepare failed: " . htmlspecialchars($mysqli->error));
            }


            //If bind_param was unsuccesful the script will exit with an error message
            $result = $stmt->bind_param("s",$imdbId); 

            if(!($result)){
                //Exits with an error message
                exit("mysqli bind_param failed: " . htmlspecialchars($stmt->error));
            }


            $result = $stmt->execute();

            //If execute was unsuccesful the script will exit with an error message
            if(!($result)){
                //Exits with an error message
                exit("mysqli execute failed: " . htmlspecialchars($stmt->error));
            }


            //Stores the result. Returns true upon succes and false upon failure
            $result = $stmt->store_result();

            //If store_result was unsuccesful the script will exit with an error message
            if(!($result)){
                //Exits with an error message
                exit("mysqli store_result failed: " . htmlspecialchars($stmt->error));
            }

            //Gets the number of rows from the database results
            $numRows = $stmt->num_rows;       

            //If more than 0 rows are returned from the database true is returned
            if($rows > 0){
                return true;
            }
            else{
                return false;
            }
        
        }
        else {
            //False is returned if the user is not logged in. The movie should not show up as being on yout list if you are not logged in.
            return false;
        }

}



/*
* This function checks if the user is logged in
*
* return array returns an  array containing the username and a boolean
*/

function isLoggedIn(){
     if (isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200)){

                //The timeout is postponed because the user interacts with the system
                $_SESSION['timeout'] = time();
         
                //Username is saved in a variable
                $username = $_SESSION['username'];
                
                //Saves the login status in an array including the username
                $loginStatus = array(
                    "valid" => true,
                    "username" => $username
                );
         
                //login status is returned
                return $loginStatus;

            }
        else {
            
            //Error mesage to include in the returned array
            $errorMsg = "";
            
            //Checks if the session timeout has been set. If it is not set, the user is not logged in
            if(isset($_SESSION['timeout'])){
                
                //if the session has timed out the errorMsg will contain a session expire message
                if((time() - $_SESSION['timeout'] < 1200)){
                    $errorMsg = "Your session has expired";
                }
                else {
                    //else there must be som other error
                    $errorMsg = "Something went wrong!";
                }
                
            }
            else{
                $errorMsg = "You are not logged in";
            }
            
            
            //Saves the login status including an error msg
            $loginStatus = array(
                    "valid" => false,
                    "sessionExpired" => $errorMsg
                );
            
            //login status is returned
            return $loginStatus;
        }
}



?>