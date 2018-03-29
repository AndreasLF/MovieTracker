<?php
    /*This logs out the user*/

    //Session starts
    session_start(); 
    //Session is destroyed
    session_destroy(); 

     //The browser is redirected to index.html
    header('Location: index.html');

?>