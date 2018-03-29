<?php

session_start();

//Connects to the database by including the code from connection.php
require 'connection.php';


 if (isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200)){

            $username = $_SESSION['username'];
            
            //$imdbId = $_GET['imdbId'];
            $imdbId = $_GET['imdbId'];
            $apikey = "b044049a";


            $json = file_get_contents('https://www.omdbapi.com/?apikey='.$apikey.'&i='.$imdbId);

             //Creates a prepared statement for the database
            $stmt = mysqli_prepare($connection,"INSERT INTO andreas (imdbId,json) VALUES (?,?)");

            //Binds parameters to the prepared statement. Every parameter is of type String
            $stmt->bind_param("ss",$imdbId,$json); 

            //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
            $result = $stmt->execute(); 

            //If $result is true (mysqli_query was unsuccesful)
            if ($result){ 
                $resultJSON = array("succes"=>true);
                echo json_encode($resultJSON);
            }
            else{ 
                $resultJSON = array("succes"=>false);
                echo json_encode($resultJSON);
            }
        }
    else {
        exit("not logged in!");
    }






?>
