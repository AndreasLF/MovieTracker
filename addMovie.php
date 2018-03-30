<?php

session_start();

//Connects to the database by including the code from connection.php
require 'connection.php';


if (isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200)){

            $username = $_SESSION['username'];
            
            //$imdbId = $_GET['imdbId'];
            //$imdbId = $_GET['imdbId'];
            $imdbId = "tt1365519";
            $apikey = "b044049a";
    
            if(isMovieInDatabase($imdbId)){
                //Creates a prepared statement for the database
                $stmt = mysqli_prepare($connection,"DELETE FROM ".$username." WHERE imdbId = ?");

                //Binds parameters to the prepared statement. Every parameter is of type String
                $stmt->bind_param("s",$imdbId); 

                //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
                $result = $stmt->execute(); 
                 
                //If $result is true (mysqli_query was unsuccesful)
                if ($result){ 
                    $message = "Removed movie from My list";
                    
                    $resultJSON = array(
                        "succes"=>true,
                        "action"=>"removed",
                        "message"=>$message,
                    );
                    echo json_encode($resultJSON);
                }
                else{ 
                    $errorMsg = "Something went wrong!";
                    
                    $resultJSON = array(
                        "succes"=>false,
                        "message"=>$errorMsg
                    );
                    echo json_encode($resultJSON);
                } 
                
                
            }
            else{
                $json = file_get_contents('https://www.omdbapi.com/?apikey='.$apikey.'&i='.$imdbId);

                 //Creates a prepared statement for the database
                $stmt = mysqli_prepare($connection,"INSERT INTO ".$username." (imdbId,json) VALUES (?,?)");

                //Binds parameters to the prepared statement. Every parameter is of type String
                $stmt->bind_param("ss",$imdbId,$json); 

                //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
                $result = $stmt->execute(); 

               //If $result is true (mysqli_query was unsuccesful)
                if ($result){ 
                    $message = "Added movie to My list";
                    
                    $resultJSON = array(
                        "succes"=>true,
                        "action"=>"added",
                        "message"=>$message,
                    );
                    echo json_encode($resultJSON);
                }
                else{ 
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


    if (isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200)){

                $username = $_SESSION['username'];

                $stmt = mysqli_prepare($connection,"SELECT * FROM ".$username." WHERE imdbId = ?");

                //Binds parameters to the prepared statement. Every parameter is of type String
                $stmt->bind_param("s",$imdbId); 

                //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
                $stmt->execute(); 
            
                //stores the result
                $stmt->store_result();
                
                //If more than 0 rows are returned from the database true is returned
                if($stmt->num_rows() > 0){
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





?>
