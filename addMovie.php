<?php

/*This script adds a movie to the database. If the movie is already in the database it will be removed. A JSON-file is echoed for AJAX*/


//require the checkLoginSession function
require "checkLoginSession.function.php";
//Requires the MySqlConnection class
require 'MySqlConnection.class.php';


//Checks the session for logindata
$login = checkLoginSession();

//If the login session is valid 
if ($login['valid']){

            //The username is retrieved from the session
            $username =  $login['username'];
            
            //Creating new MySqlConnection object
            $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",$username);
    
            //Sets the imdbId from the GET parameter
            $imdbId = $_GET['imdbId'];
    
            //Sets the apikey
            $apikey = "b044049a";
    
            //checks if the movie is already in the database
            if($mySqlConnection->inDatabase($imdbId)){
                
                //Deltes the movie from the database
                $mySqlConnection->deleteFromDatabase($imdbId); 
                 
                //Checks for error
                if (!($mySqlConnection->isError)){ 
                    $message = "Removed movie from My list";
                    
                    //If the movie was removed succesfully resultJSON will contain the following 
                    $resultJson = array(
                        "succes"=>true,
                        "action"=>"removed",
                        "message"=>$message,
                    );
                    
                    //The array is encoded as a JSON-file and echoed
                    echo json_encode($resultJson);
                }
                else{ 
                    //If an error ocurred an error message will be included in the json to return
                    $errorMsg = "Something went wrong!";
                    
                    //resultJSON is defined 
                    $resultJson = array(
                        "succes"=>false,
                        "message"=>$errorMsg
                    );
                    //The array gets JSON-encoded and echoed
                    echo json_encode($resultJson);
                } 
                
                
            }
            else{
                //If the movie is not in the database, it will be added
                
                //The movie is retrieved from the omdb
                $json = file_get_contents('https://www.omdbapi.com/?apikey='.$apikey.'&i='.$imdbId);

                //The movie is added to the database
                $mySqlConnection->insertToDatabase2Str("imdbId","json",$imdbId,$json);
                
                
                //Checks for errors
                if (!($mySqlConnection->isError)){ 
                    $message = "Added movie to My list";
                    
                    $resultJSON = array(
                        "succes"=>true,
                        "action"=>"added",
                        "message"=>$message,
                    );
                    echo json_encode($resultJSON);
                }
                else{ 
                    
                    //If an error ocurred an error message will be included in the json to return
                    $errorMsg = "Something went wrong!";
                    
                    $resultJSON = array(
                        "succes"=>false,
                        "message"=>$errorMsg
                    );
                    echo json_encode($resultJSON);
                } 
            }


            
        }
    else {
        $errorMsg = $login['errorMsg'];
                    
        $resultJSON = array(
            "succes"=>false,
            "message"=>$errorMsg
        );
        echo json_encode($resultJSON);
    }








?>
