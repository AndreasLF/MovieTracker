<?php
        
    //Starts the session
    session_start(); 

    require 'MySqlConnection.class.php';

    $errorMsg = "";

    /*If the session variable 'username' is set, the username and password will be checked against the database*/
    if(isset($_POST['username']) and isset($_POST['password'])){
        
        /*This trims the username and password. Trim removes any spaces from the end or the beginning of a string*/
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);
        
        $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",$username);
       
        $passwordHash = $mySqlConnection->getPassword();
        
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
