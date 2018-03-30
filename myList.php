<?php

session_start();

if (!(isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200))){
    header('Location: index.html');
}
else {
    
    $moviesList = getMoviesFromDatabase($_SESSION['username']);
 
    ?>

    <html>

    <head>
        <title>MovieTracker</title>

        <meta charset="UTF-8" />

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src='jquery/jquery.min.js'></script>
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <script src='materialize/js/materialize.js'></script>
        
        <script>
            $(document).ready(function(){
                
                <?php 
                foreach($moviesList as $key=>$movie){
                    $jsCommand = 
                    "$('#". $movie->imdbID ."').find('a').click(function(){
                        $('#title').html(\"". $movie->Title ."\");
                        $('#released').html(\"<b>Released: </b>". $movie->Released ."\");
                        $('#rating').html(\"<b>Rating: </b>". $movie->Rated ."\");
                        $('#plot').html(\"<b>Plot: </b>". $movie->Plot ."\");
                        $('#genre').html(\"<b>Genre: </b>". $movie->Genre ."\");
                        $('#runtime').html(\"<b>Runtime: </b>". $movie->Runtime ."\");
                        $('#director').html(\"<b>Director: </b>". $movie->Director ."\");
                        $('#writer').html(\"<b>Writer: </b>". $movie->Writer ."\");
                        $('#actors').html(\"<b>Actors: </b>". $movie->Actors ."\");
                        $('#language').html(\"<b>Language: </b>". $movie->Language ."\");
                        $('#country').html(\"<b>Country: </b>". $movie->Country ."\");
                        $('#imdbrating').html(\"Rating: ". $movie->imdbRating ." <br>Votes: ". $movie->imdbVotes."\");
                        $('#imdblink').attr(\"href\",\"https://www.imdb.com/title/". $movie->imdbID ."/\");
                        $('#poster').attr(\"src\",\"". $movie->Poster ."\");
                        setActive(\"".$movie->imdbID."\");
                    }); ";
                    
                    echo $jsCommand;
  
                }
    ?>
 
            });
            
            function setActive(imdbId){
                $("#myListCollection").find("li").each(function () {
                    $(this).removeClass("active");
                });
                
                $("#"+imdbId).addClass("active");
            }
        
        
        </script>
        
        
        <script src='myListScript.js'></script>
    </head>

    <body>
        <nav>
            <div class="nav-wrapper blue">
                <a href="index.html" class="brand-logo"><i class="material-icons right">arrow_back</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li id="logoutButton"><a class="waves-effect waves-light modal-trigger" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>


        <div class="row">
            <div class="col s3 z-depth-1">
                <h5 class="center">My list</h5>
                <ul id="myListCollection" class="collection">
                    
                        
                        <?php 
                            
                            foreach($moviesList as $key=>$movie){
                                
                                $active = "";
                                if($key == 0){
                                        $active = "active";
                                    }
                                
                                
                                echo "<li id='".$movie->imdbID."' class='collection-item avatar ".$active."'>
                                    <img src='". $movie->Poster ."' alt='' class='circle'>
                                    <span class='title'>". $movie->Title ."</span>
                                    <p>". $movie->Year."<br>". $movie->Director ."
                                    </p>
                                    <a href='#!' class='secondary-content'><i class='material-icons'>launch</i></a>
                                </li>";
                                
                                 
                            
                            }
                        ?>
                       
                </ul>
            </div>

            <div class="col s9">
                <div class=row>
                    <div class="col s7">
                        <br>
                        <ul class="collection with-header">
                            <li class="collection-header">
                                <h4 id="title"><?php echo $moviesList[0]->Title;?></h4>
                            </li>
                            <li id="released" class="collection-item"><b>Released:</b> <?php echo $moviesList[0]->Released;?></li>
                            <li id="rating" class="collection-item"><b>Rating:</b> <?php echo $moviesList[0]->Rated;?></li>
                            <li id="plot" class="collection-item"><b>Plot:</b> <?php echo $moviesList[0]->Plot;?></li>
                            <li id="genre" class="collection-item"><b>Genre:</b> <?php echo $moviesList[0]->Genre;?></li>
                            <li id="runtime" class="collection-item"><b>Runtime:</b> <?php echo $moviesList[0]->Runtime;?></li>
                            <li id="director" class="collection-item"><b>Director:</b> <?php echo $moviesList[0]->Director;?></li>
                            <li id="writer" class="collection-item"><b>Writer:</b> <?php echo $moviesList[0]->Writer;?></li>
                            <li id="actors" class="collection-item"><b>Actors:</b> <?php echo $moviesList[0]->Actors;?></li>
                            <li id="language" class="collection-item"><b>Language:</b> <?php echo $moviesList[0]->Language;?></li>
                            <li id="country" class="collection-item"><b>Country:</b> <?php echo $moviesList[0]->Country;?></li>

                            <li class="collection-item">
                                <a id="imdblink" href="https://www.imdb.com/title/<?php echo $moviesList[0]->imdbID;?>/"><img style="width: 20%; object-fit: contain" src="https://upload.wikimedia.org/wikipedia/commons/6/69/IMDB_Logo_2016.svg" /></a>

                                <div id="imdbrating" class="right">
                                    Rating: <?php echo $moviesList[0]->imdbRating;?> / 10
                                    <br> Votes: <?php echo $moviesList[0]->imdbVotes;?>
                                </div>
                            </li>

                        </ul>

                    </div>
                    <div class="col s5">
                        <br>
                        <img id="poster" class="materialboxed" style="width: 100%; object-fit: contain" src="<?php echo $moviesList[0]->Poster;?>">
                    </div>






                </div>


            </div>

        </div>




    </body>



    </html>








    <?php 
}



?>






    <?php
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
