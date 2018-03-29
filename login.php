<?php
        
    //Starts the session
    session_start(); 

    //Connects to the database by including the code from connection.php
    require 'connection.php'; 

    /*If the session variable 'username' is set, the username and password will be checked against the database*/
    if(isset($_POST['username']) and isset($_POST['password'])){
        
        /*This trims the username and password. Trim removes any spaces from the end or the beginning of a string*/
        $username = trim($_POST['username']); 
        $password = trim($_POST['password']);
        
        //Creates a prepared statement for the database
        $stmt = mysqli_prepare($connection,"SELECT Password FROM `login` WHERE Username=?");
            
        //Binds parameters to the prepared statement. Every parameter is of type String
        $stmt->bind_param("s",$username); 

        //Executes the prepared statement. Returns a boolean - true on succes and false on failure.
        $result = $stmt->execute();
        
        $stmt->bind_result($passwordHash);
       
        $stmt->fetch();      
    
                    
        if(password_verify($password, $passwordHash)){  
            /*Information about the session is stored*/
            $_SESSION['valid'] = true; 
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = $username; 
            
            //The browser is redirected to index.html
            header('Location: index.html'); 
            
        }
        else{
            
            echo "invalid login";
        }
        
        
        
        
    }
    ?>



    <html>

    <body>


    </body>

    </html>
