<?php
        
    //Starts the session
    session_start(); 

    //Connects to the database by including the code from connection.php
    require 'connection.php'; 

    $errorMsg = "";


    /*if 'username' and 'password' received from the HTML form is set, the following code will run*/
    if(isset($_POST['username']) and isset($_POST['password'])){

        /*This trims the username and password. Trim removes any spaces from the end or the beginning of a string*/
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);        

        //Creates password hash
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);



        //Creates a prepared statement for the database
        $stmt = $mysqli->prepare("INSERT INTO login(Username,Password) VALUES (?,?)");

        //If the prepared statement fails to be defined the script will exit with an error message
        if(!($stmt)){
            //Sets the error message
            //htmlspecialchars converts the characters into html enitities
            exit("mysqli_prepare failed: " . htmlspecialchars($mysqli->error));
        }


        //Binds parameters to the prepared statement. Every parameter is of type String
        $result = $stmt->bind_param("ss",$username,$passwordHash);

        if(!($result)){
            //Exits with an error message
            exit("mysqli bind_param failed: " . htmlspecialchars($stmt->error));
        }


        //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
        $result = $stmt->execute(); 

         if(!($result)){
            //Exits with an error message
            exit("mysqli exceute failed: " . htmlspecialchars($stmt->error));
        }


         //A query for a new database table is created
        $query = "CREATE TABLE ".$username." (imdbId VARCHAR(10) PRIMARY KEY, json JSON NOT NULL)"; 



        //The query is performed
        $result = $mysqli->query($query); 


        if($result){
           //This redirects the browser to login.html
            header('Location: index.html');  
        }
        else{
            //An error message is created and stored in the session variable
            exit("mysqli query failed: " . htmlspecialchars($stmt->error));
        }


    }
    else{
        $errorMsg = "You cannot register a user without providing a username and password";
    }
    ?>



    <html>

    <head>
        <title>MovieTracker</title>

        <meta charset="UTF-8" />

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src='jquery/jquery.min.js'></script>
        <link rel="stylesheet" href="materialize/css/materialize.css">
        <script src='materialize/js/materialize.js'></script>
    </head>
        
    <body>
        <div class="container">
            <h5 class="center">Error!</h5>
            <p class="center">
                <?php echo $errorMsg ?>
            </p>
            <div class="center"><a class="waves-effect waves-light btn" href="index.html"><i class="material-icons left">restore</i>return to homepage</a></div>
        </div>

    </body>

    </html>
