$(document).ready(function(){
    $("#menuIteminfo").click(function(){
        $("#info2").slideUp("fast");
        $("#info1").slideDown("slow");
    });
    
        $("#menuIteminfo2").click(function(){
        $("#info1").slideUp("fast");
        $("#info2").slideDown("slow");
    });
});


