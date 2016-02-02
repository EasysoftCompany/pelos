$(document).ready(function(){
      
        $("#menuIteminfo2").click(function(){
        $("#info1").slideUp("fast");
        $("#info2").slideDown("slow");
    }); 
        $("#menuIteminfo").click(function(){
        $("#info2").slideUp("fast");
        $("#info1").slideDown("slow");
    });
});


