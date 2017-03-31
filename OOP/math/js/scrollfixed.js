$(document).ready(function() {
   $(window).scroll(function() {
       
       var headerH = $('.img-responsive').outerHeight(true);
       console.log(headerH);
//this will calculate header's full height, with borders, margins, paddings
       var scrollVal = $(this).scrollTop();
        if ( scrollVal > headerH ) {
            $('#scrollfix').css({'position':'fixed','top':'0px','width':'100%'});
        } else {
            $('#scrollfix').css({'position':'static','top':'0px','width':'100%','z-index': '1000'});
        }
    });
 });