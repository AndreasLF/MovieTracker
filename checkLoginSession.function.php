<?php
//Starts the session
session_start();

/*
* This checks the session for a login status 
*
* @return array containing the validty (valid) of the session as a boolean and either a username or an errorMsg depending on valid
*/
function checkLoginSession(){
    if (isset($_SESSION['username']) && (time() - $_SESSION['timeout'] < 1200)){

                //The timeout is postponed because the user interacts with the system
                $_SESSION['timeout'] = time();
         
                //Username is saved in a variable
                $username = $_SESSION['username'];
                
                //Saves the login status in an array including the username
                $loginStatus = array(
                    "valid" => true,
                    "username" => $username
                );
         
                //login status is returned
                return $loginStatus;

            }
        else {
            
            //Error mesage to include in the returned array
            $errorMsg = "";
            
            //Checks if the session timeout has been set. If it is not set, the user is not logged in
            if(isset($_SESSION['timeout'])){
                
                //if the session has timed out the errorMsg will contain a session expire message
                if((time() - $_SESSION['timeout'] < 1200)){
                    $errorMsg = "Your session has expired";
                }
                else {
                    //else there must be som other error
                    $errorMsg = "Something went wrong!";
                }
                
            }
            else{
                $errorMsg = "You are not logged in";
            }
            
            
            //Saves the login status including an error msg
            $loginStatus = array(
                    "valid" => false,
                    "errorMsg" => $errorMsg
                );
            
            //login status is returned
            return $loginStatus;
        }   
    }
 


?>