$(document).ready(function(){
    
    
    
    $('#verifyPasswordInput').keyup(function(){
        if($(this).val()==$('#passwordInput').val()){
            $('#registerButton').attr("disabled", false); 
            $('#passMatchMessage').html("");
        }
        else{
            $('#registerButton').attr("disabled", true); 
            $('#passMatchMessage').html("Passwords do not match!");
        }
    });
    
    $('#passwordInput').keyup(function(){
        if($(this).val()==$('#verifyPasswordInput').val()){
            $('#registerButton').attr("disabled", false); 
            $('#passMatchMessage').html("");
        }
        else{
            $('#registerButton').attr("disabled", true); 
            $('#passMatchMessage').html("Passwords do not match!");
        }
    });
    
});
                  
           