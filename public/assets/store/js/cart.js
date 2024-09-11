$(document).ready(function(){
    $("#cart-icon").click(function(e){
        e.preventDefault();
        $("#cart-sidebar").addClass("open");
    });

    $("#close-sidebar").click(function(){
        $("#cart-sidebar").removeClass("open");
    });
});
