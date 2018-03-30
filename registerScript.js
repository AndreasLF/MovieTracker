$(document).ready(function(){
    
    
    $('#verifyPasswordInput').keyup(function(){
        if($(this).val()==$('#passwordInput').val()){
            $('#registerSubmitButton').toggleClass("disabled"); 
            $('#passMatchMessage').html("");
        }
        else{
            $('#registerSubmitButton').toggleClass("disabled"); 
            $('#passMatchMessage').html("Passwords do not match!");
        }
    });
    
    $('#passwordInput').keyup(function(){
        if($(this).val()==$('#verifyPasswordInput').val()){
            $('#registerSubmitButton').toggleClass("disabled"); 
            $('#passMatchMessage').html("");
        }
        else{
            $('#registerSubmitButton').toggleClass("disabled"); 
            $('#passMatchMessage').html("Passwords do not match!");
        }
    });
    
});
                  
           