$(document).ready(function () {
    
    
    
    $.getJSON("checkLogin.php", function (data) {
            if(data.loggedin){
                $('#loginButton').hide();
                $('#logoutButton').show();

            }
            else{
                $('#loginButton').show();
                $('#logoutButton').hide();
            }
    });
    
    
    //Initiates modal
    $('#modalLogin').modal();
    
    
    $('#openSearch').click(function () {


        hideAllMovieCards();

        $('#searchBox').toggle();

    });

    $('#closeSearch').click(function () {

        $('#searchBox').toggle();

    });


    $('.moviebutton').click(function(){
        console.log($(this).attr("data-imdb-id"));  
        
        var imdbId = $(this).attr("data-imdb-id");
        
        $.getJSON("addMovie.php",{imdbId: imdbId}, function (data) {
            if(data.succes){
                 Materialize.toast("Movie added succesfully!",1000);
            }
            else{
                 Materialize.toast("Something went wrong",1000);
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
                    $("#messageDiv").html("");
                    var movieArray = data.Search;


                    $(".moviecard").each(function (index, element) {

                        if (index == movieArray.length) {
                            return false;
                        }

                        $(this).find(".movietitle").html(movieArray[index].Title);
                        $(this).find(".movieposter").attr("src", movieArray[index].Poster);
                        $(this).find(".moviebutton").attr("data-imdb-id", movieArray[index].imdbID);
                        
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
