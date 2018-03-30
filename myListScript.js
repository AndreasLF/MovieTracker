$(document).ready(function () {
    
    
    
    $(".collection-item").click(function{
                                                window.location.replace("index.html");

                                
                                });
    
    /*
    $.getJSON("checkLogin.php", function (data) {
            if(data.loggedin){
                Materialize.toast("Welcome "+data.username+"! This is your list of movies",2000);
            }
            else{
                window.location.replace("index.html");
            }
    });
    */
    
    //Initiates modals
    //$('.modal').modal();
});
