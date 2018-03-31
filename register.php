<?php
        
    //Starts the session
    session_start(); 

    require 'MySqlConnection.class.php';

    $msgTitle = "";
    $msgContent = "";


    /*if 'username' and 'password' received from the HTML form is set, the following code will run*/
    if(isset($_POST['username']) and isset($_POST['password'])){

        /*This trims the username and password. Trim removes any spaces from the end or the beginning of a string*/
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);        

        //Creates password hash
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $mySqlConnection = new MySqlConnection("localhost","MovieTrackerDB","password","movietracker",'login');
        

        $mySqlConnection->insertToDatabase2Str("Username","Password",$username,$password);
            
        $mySqlConnection->createTable($username);



        if(!($mySqlConnection->isError)){
            $msgTitle = "Registered succesfully!";
            $msgContent = "You have registered a user succesfully. Go back to the homepage to log in as: <b>". $username."</b>"; 
        }
        else{
            $msgTitle = "ERROR!";
            $msgContent = $mySqlConnection->error;
        }
    }
    else{
        $msgTitle = "ERROR!";
        $msgContent = "You cannot register a user without providing a username and password";
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
            <h5 class="center"><?php echo $msgTitle ?></h5>
            <p class="center">
                <?php echo $msgContent ?>
            </p>
            <div class="center"><a class="waves-effect waves-light btn" href="index.html"><i class="material-icons left">restore</i>return to homepage</a></div>
        </div>

    </body>

    </html>
