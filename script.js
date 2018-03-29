$(document).ready(function () {
    $('#openSearch').click(function () {


        hideAllMovieCards();

        $('#searchBox').toggle();

    });

    $('#closeSearch').click(function () {

        $('#searchBox').toggle();

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
                        $(this).find(".movieposter").attr("src", movieArray[index].Poster)

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
