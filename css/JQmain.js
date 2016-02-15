$(document).ready(function () {
      
        $(".button-collapse").sideNav();
        
        $("#info1").slideUp("fast");
        $("#info2").slideUp("fast");
        $("#info3").slideUp("fast");
       
    $("#menuIteminfo3").click(function () {
        $("#info1").slideUp("fast");
        $("#info2").slideUp("fast");
        $("#info3").slideDown("slow");
    });

    $("#menuIteminfo2").click(function () {
        $("#info1").slideUp("fast");
        $("#info2").slideDown("slow");
        $("#info3").slideUp("fast");
    });
    $("#menuIteminfo").click(function () {
        $("#info1").slideDown("slow");
        $("#info2").slideUp("fast");
        $("#info3").slideUp("fast");
    });
    
    
     
    $("#menuIteminfo6").click(function () {
        $("#info1").slideUp("fast");
        $("#info2").slideUp("fast");
        $("#info3").slideDown("slow");
    });

    $("#menuIteminfo5").click(function () {
        $("#info1").slideUp("fast");
        $("#info2").slideDown("slow");
        $("#info3").slideUp("fast");
    });
    $("#menuIteminfo4").click(function () {
        $("#info1").slideDown("slow");
        $("#info2").slideUp("fast");
        $("#info3").slideUp("fast");
    });
});


