$(document).ready(function () {
    
    
    $('#verifyPasswordInput').keyup(function(){
        if($(this).val()==$('#passwordInput').val()){
            $('#registerSubmitButton').removeClass("disabled"); 
            $('#passMatchMessage').html("");
        }
        else{
            $('#registerSubmitButton').addClass("disabled"); 
            $('#passMatchMessage').html("Passwords do not match!");
        }
    });
    
    $('#passwordInput').keyup(function(){
        if($(this).val()==$('#verifyPasswordInput').val()){
            $('#registerSubmitButton').removeClass("disabled"); 
            $('#passMatchMessage').html("");
        }
        else{
            $('#registerSubmitButton').addClass("disabled"); 
            $('#passMatchMessage').html("Passwords do not match!");
        }
    });
    
    
    
    $.getJSON("checkLogin.php", function (data) {
            if(data.loggedin){
                $('#loginButton').hide();
                $('#registerButton').hide();
                $('#logoutButton').show();
                $('#mylistButton').show();
                Materialize.toast("Welcome "+data.username+"!",1000);

            }
            else{
                $('#loginButton').show();
                $('#registerButton').show();
                $('#logoutButton').hide();
                $('#mylistButton').hide();
                Materialize.toast("You are not logged in",1000);

            }
    });
    
    
    //Initiates modals
    $('.modal').modal();
    
    
    $('#openSearch').click(function () {


        hideAllMovieCards();

        $('#searchBox').toggle();

    });

    $('#closeSearch').click(function () {
        $('#searchBox').toggle();
    });


    $('.moviebutton').click(function(){
        
        var imdbId = $(this).attr("data-imdb-id");
        
        var button = $(this);
        
        $.getJSON("addMovie.php",{imdbId: imdbId}, function (data) {
            if(data.succes){
                
                if(data.action == "added"){
                    button.find("i").html("favorite");
                }
                else{
                    button.find("i").html("favorite_border");
                }
                
                
                Materialize.toast(data.message,1000);
            }
            else{
                Materialize.toast(data.message,1000);
            }
    });
                  

        
        
    });
    
    $('#search').keyup(function () {

        hideAllMovieCards();


        var searchString = $(this).val();

        //Only perform an ajax call if the search string is longer than 0
        if (searchString.length > 0) {

            //var url = 'getData.php?title=' + searchString;
            var url = "getData.php";


            //Performs an ajax request
            $.getJSON(url,{title: searchString}, function (data) {


                
                if (data.Response == "True") {
                    var movieArray = data.Search;

                    $(".moviecard").each(function (index, element) {
                        
                        //if the index of the loop is equal to the number of search result the loop will break by returning false
                        if (index == movieArray.length) {
                            return false;
                        }

                        //The movie title is set
                        $(this).find(".movietitle").html(movieArray[index].Title);
                        //The movie poster image link is set
                        $(this).find(".movieposter").attr("src", movieArray[index].Poster);
                        //The imdb id is added to the buttons parameter
                        $(this).find(".moviebutton").attr("data-imdb-id", movieArray[index].imdbID);
                        
                        
                        if(data.isInList[movieArray[index].imdbID]){
                            $(this).find("i").html("favorite");
                        }
                        
                        $(this).show();
                    });
                }
                else{
                    if(data.Error == "Too many results."){
                        Materialize.toast("Try to be more specific",500);
                        //$("#messageDiv").html(data.Error+"<br>Try to be more specific");
                    }
                    else {
                        Materialize.toast(data.Error,500);
                      //S $("#messageDiv").html(data.Error);
                    }
                    

                }







            });

        }



    });



});


function hideAllMovieCards() {
    $(".moviecard").each(function () {
        $(this).hide();


    });
}
