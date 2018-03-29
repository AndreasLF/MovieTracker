<?php
session_start();

//Checks if the user is logged in and echoes a json encoded file
if (isset($_SESSION['username']) && $_SESSION['valid'] && (time() - $_SESSION['timeout'] < 1200)){
    $resultJSON = array("loggedin"=>true, "username"=>$_SESSION['username']);
    echo json_encode($resultJSON);
}
else {
    $resultJSON = array("loggedin"=>false, "username"=>false);
    echo json_encode($resultJSON);
}



?>