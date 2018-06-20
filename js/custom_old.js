/*---------------INFO---------*/
$(function() {
    new WOW().init();
});


//-----NAVIGATION--------
$(function(){
    
    $(window).scroll(function(){
        
       if($(this).scrollTop() < 50 ) {
           //hide nav
           $("nav").removeClass("menu-nav");
           
       } else {
           //show nav
           $("nav").addClass("menu-nav");
       }          
    });   
});

//--------------SMOOTH SCROLLING-----------//

$(function(){

    $("a.smooth-scroll").click(function(event){
        
        event.preventDefault();
        
        var section = $(this).attr("href");
        
        $('html, body').animate({
            scrollTop: $(section).offset().top - 73
        }, 1250);        
    });    
});


//---------------OWL------------------//

$(function() {
   
    $("#fotki-budowa").owlCarousel({
        
        autoplay: true,
        loop: true,
        margin: 20,
        
    });

});


