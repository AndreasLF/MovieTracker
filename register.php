<?php
        
    //Starts the session
    session_start(); 

    //Connects to the database by including the code from connection.php
    require 'connection.php'; 


    /*if 'username' and 'password' received from the HTML form is set, the following code will run*/
    if(isset($_POST['username']) and isset($_POST['password'])){
        
        /*This trims the username and password. Trim removes any spaces from the end or the beginning of a string*/
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);        
        
        //Creates password hash
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        
        
        //Creates a prepared statement for the database
        $stmt = mysqli_prepare($connection,"INSERT INTO login(Username,Password) VALUES (?,?)");
            
        //Binds parameters to the prepared statement. Every parameter is of type String
        $stmt->bind_param("ss",$username,$passwordHash); 
        

        //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
        $result = $stmt->execute(); 
        
        
        //A new database table is created
        $query = "CREATE TABLE ".$username." (imdbId VARCHAR(10) PRIMARY KEY, json JSON NOT NULL)"; 
        
        //The query is performed
        mysqli_query($connection, $query) or exit(mysqli_error($connection)); 
        
        //If $result is true (mysqli_query was unsuccesful)
        if ($result){ 
            //This redirects the browser to login.html
            header('Location: login.html'); 
        }
        else{ 
            //An error message is created and stored in the session variable
            exit("ERROR executing: $query"."<br>". mysqli_error($connection)); 
        }
        
    }
    else{
        exit("ERROR");
    }
    ?>



    <html>

    <body>


    </body>

    </html>
