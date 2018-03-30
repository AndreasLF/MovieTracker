<?php



if(isMovieInDatabase("tt1469304")){
    echo "movie is in DB";
}
else {
    echo "movie is not in DB";
}


/*
$apikey = "b044049a";
$type = "movie";

//replaces spaces with +
//$title = preg_replace("/\s/","+",trim($_GET['title']));
$title = "Tomb+Raider";

$movieUrl = "https://www.omdbapi.com/?apikey=".$apikey."&s=".$title."&type=".$type;


$json = file_get_contents($movieUrl);
$movieObj = json_decode($json);


//If the response from OMDB contains movies it will be modified to contain a boolean which tells whether or not each movie is in the database 
if($movieObj->Response == "True"){
    
    $newMovieObj = array(
        "Response" => $movieObj->Response,
        "totalResults" => $movieObj->totalResults
    );
        
    $searchResults;
    
    foreach($movieObj->Search as $key=>$movie){

        
        //Converts the object to an array, adds a parameter and converts it back to an object
        $movie = (object) array_merge((array)$movie,array('isInList'=>isMovieInDatabase($imdbId)));
        //var_dump($movieElement);  
        $searchResults[$key] = $movie;
    }
    
    $newMovieObj['Search'] = $searchResults;
    $json = json_encode($newMovieObj);
}


echo $json;
*/


/*
* This checks if a movie is in the database
* 
*
* param String $imdbId is the imdb Id of the movie to check with the database
* return boolean. If the movie is in the database it returns true. If not false is returned. If the user is not logged in false will be returned
*/
function isMovieInDatabase($imdbId){
    
    session_start();

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