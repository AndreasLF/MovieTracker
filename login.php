<?php
        
    //Starts the session
    session_start(); 

    //Connects to the database by including the code from connection.php
    require 'connection.php'; 

    $errorMsg = "";

    /*If the session variable 'username' is set, the username and password will be checked against the database*/
    if(isset($_POST['username']) and isset($_POST['password'])){
        
        /*This trims the username and password. Trim removes any spaces from the end or the beginning of a string*/
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);
        
        //Creates a prepared statement for the database
        $stmt = $mysqli->prepare("SELECT Password FROM `login` WHERE Username=?");
            
        
        //If the prepared statement fails to be defined the script will exit with an error message
        if(!($stmt)){
            //Sets the error message
            //htmlspecialchars converts the characters into html enitities
            $errorMsg = "mysqli_prepare failed: " . htmlspecialchars($mysqli->error);
        }
        

        //Binds parameters to the prepared statement. Every parameter is of type String
        $result = $stmt->bind_param("s",$username); 
        
        if(!($result)){
            //Exits with an error message
            $errorMsg = "mysqli bind_param failed: " . htmlspecialchars($stmt->error);
        }

        //Executes the prepared statement. Returns a boolean - true upon succes and false upon failure.
        $result = $stmt->execute();
        
        //If execute was unsuccesful
        if(!($result)){
            //Exits with an error message
            $errorMsg = "mysqli execute failed: " . htmlspecialchars($stmt->error);
        }
        
        
        $result = $stmt->bind_result($passwordHash);
        
        //If bind_result was unsuccesful
        if(!($result)){
            //Exits with an error message
            $errorMsg = "mysqli bind_result failed: " . htmlspecialchars($stmt->error);
        }
       
        
        //fetches the result
        $result = $stmt->fetch(); 
        
        //If fetch was unsuccesful
        if(!($result)){
            //Exits with an error message
            $errorMsg = "mysqli fetch failed: " . htmlspecialchars($stmt->error);
        }
    
        
        //Checks the passwords
        if(password_verify($password, $passwordHash)){  
            //Information about the session is stored
            $_SESSION['valid'] = true; 
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $username; 
            
            //The browser is redirected to index.html
            header('Location: index.html'); 
            
        }
        else{
            
            $errorMsg = "Wrong username or password";
        }
        
        
        
        
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
