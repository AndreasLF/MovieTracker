$(document).ready(function() {
    $('#openSearch').click(function() {
          
        $('#searchBox').toggle();
        
    });
    
    $('#closeSearch').click(function() {
            
        $('#searchBox').toggle();
        
    });


    $('#search').keyup(function() {
            
        $("#searchResultDiv").html($(this).val());
        
    });



});
