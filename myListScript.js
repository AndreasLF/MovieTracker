$(document).ready(function () {
    
    

    $('#statisticsButton').click(function(){
     
       $.getJSON("getStatistics.php", function (data) {
            
            var totalMinutes = data.totalMinutes;
           
            //rounds the total number of hours to 1 decimal 
            var totalHours = data.totalHours.toFixed(1);
           
           //Creates a string 
           var htmlString = "<div class='col s4'>"+totalMinutes+" min ("+totalHours+" h)"+"</div> ";
           
           //The following code will add a clock icon for every 10 hours of the totalHours
           var condition = 0;

           if(totalHours>=80){
              condition = 80; 
              }
           else{
               condition = totalHours;
           }
           
           for(var i=10;i<=condition;i=i+10){
               console.log("TEST");
               htmlString = htmlString + "<div class='col s1'><i class='material-icons'>access_time</i></div>"   
           }
           
           $('#totalWatchTime').html(htmlString);
           
           
           
           //The following code will print the number of stars to visualize the imdb score
           
           var imdbAvg = data.averageImdbScore;
           
            var htmlString = "<div class='col s2'>"+ imdbAvg +"/ 10</div>";

           
           //This rounds the avg to the nearest half
           var imdbAvgRounded = Math.round(imdbAvg*2)/2;

            var holeNumber = parseInt(imdbAvgRounded);
           
           var half =  imdbAvgRounded%holeNumber;
           
           for(var i = 0;i<holeNumber;i++){
               htmlString = htmlString + "<div class='col s1'><i class='material-icons'>star</i></div>";
               
           }
           
           if(half>0){
                htmlString = htmlString + "<div class='col s1'><i class='material-icons'>star_half</i></div>";
           }
           
           var remainingStars = 10-Math.round(imdbAvgRounded);
           
           for(var i = 0;i<remainingStars;i++){
                htmlString = htmlString + "<div class='col s1'><i class='material-icons'>star_border</i></div>";           
           }
           
           
           
           
            $('#imdbAvg').html(htmlString);
   
        }); 
        
    });
    
    
    
    //Initiates modals
    $('.modal').modal();
});
