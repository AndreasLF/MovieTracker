    <?php
        
    $mysqli = new mysqli("localhost","MovieTrackerDB","password","movietracker"); //This creates a new mysqli object from the mysqli class
    
    //If there are error whith the mysqli connection the script will exit with an error message including the error number
    if ($mysqli->connect_error) {
        exit("Mysqli connection error: " . $mysqli->connect_error);
    }

    ?>
