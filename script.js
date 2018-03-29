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

            var url = 'getData.php?title=' + searchString;



            //Performs an ajax request
            $.getJSON(url, function (data) {



                if (data.Response == "True") {
                    var movieArray = data.Search;

                    $("#messageDiv").html(movieArray.length);

                    //console.log(movieArray.length);


                    $(".moviecard").each(function (index, element) {

                        if (index == movieArray.length) {
                            return false;
                        }

                        console.log(index);

                        $(this).find(".movietitle").html(movieArray[index].Title);
                        $(this).find(".movieposter").attr("src", movieArray[index].Poster)

                        $(this).show();



                    });
                }
                else{
                   $("#messageDiv").html(data.Error);

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
