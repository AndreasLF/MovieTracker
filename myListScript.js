$(document).ready(function () {
    
    

    $('#statisticsButton').click(function(){
     
       $.getJSON("getStatistics.php", function (data) {
            console.log(data);
    }); 
        
    });
    
    
    
    //Initiates modals
    $('.modal').modal();
});
