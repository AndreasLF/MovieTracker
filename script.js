$(document).ready(function() {
    $('#openSearch').click(function() {
          
        $('#searchBox').toggle();
        
    });
    
    $('#closeSearch').click(function() {
            
        $('#searchBox').toggle();
        
    });


    $('#search').keyup(function() {
           
        var searchString = $(this).val();
        
        //Only perform an ajax call if the search string is longer than 0
        if(searchString.length > 0){
            
            var url = 'getData.php?title=' + searchString;
            
            
            //Performs an ajax request
            $.getJSON(url, function (data) {
                console.log(data);                
            });
            
        }
        
        $("#searchResultDiv").html($(this).val());
        
    });



});
