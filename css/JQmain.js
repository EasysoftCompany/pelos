$(document).ready(function () {

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
});


