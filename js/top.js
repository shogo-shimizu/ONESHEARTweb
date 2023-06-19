$(function(){
    $(".MenuTitle").click(function(){
        console.log("clicked");
        console.log(this);
        $(".MenuTitle").not(this).parent().removeClass("sideMenuOpen");
        $(this).parent().toggleClass("sideMenuOpen");
    });
});