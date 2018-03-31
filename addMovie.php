<?php

session_start();

require 'MySqlConnection.class.php';

//Connects to the database by including the code from connection.php
require 'connection.php';


if (isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200)){

            $username = $_SESSION['username'];
            
            //Creating new MySqlConnection
            $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",$username);
    
            $imdbId = $_GET['imdbId'];
            $apikey = "b044049a";
    
            if($mySqlConnection->inDatabase($imdbId)){
                $mySqlConnection->deleteFromDatabase($imdbId); 
                 
                //Checks for error
                if (!($mySqlConnection->isError)){ 
                    $message = "Removed movie from My list";
                    
                    $resultJson = array(
                        "succes"=>true,
                        "action"=>"removed",
                        "message"=>$message,
                    );
                    echo json_encode($resultJson);
                }
                else{ 
                    //If an error ocurred an error message will be included in the json to return
                    $errorMsg = "Something went wrong!";
                    
                    $resultJson = array(
                        "succes"=>false,
                        "message"=>$errorMsg
                    );
                    echo json_encode($resultJson);
                } 
                
                
            }
            else{
                $json = file_get_contents('https://www.omdbapi.com/?apikey='.$apikey.'&i='.$imdbId);

                
                $mySqlConnection->insertToDatabase2Str("imdbId","json",$imdbId,$json);
                
                
                
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
        $errorMsg = "Please login";
                    
        $resultJSON = array(
            "succes"=>false,
            "message"=>$errorMsg
        );
        echo json_encode($resultJSON);
    }








?>
