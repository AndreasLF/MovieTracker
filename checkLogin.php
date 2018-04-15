<?php
/*This script checks if the user is logged in and returns a JSON file corresponding to the login status*/

//Includes the checkLoginSession function
require "checkLoginSession.function.php";

//gets the login status
$login = checkLoginSession();
    
//Checks if the user is logged in and echoes a json encoded file
if ($login['valid']){
    $resultJSON = array("loggedin"=>true, "username"=>$login['username']);
    echo json_encode($resultJSON);
}
else {
    $resultJSON = array("loggedin"=>false, "username"=>false, "errorMsg"=>$login['errorMsg']);
    echo json_encode($resultJSON);
}



?>