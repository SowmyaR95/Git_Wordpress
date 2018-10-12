

/* script for the slider */

 jQuery(document).ready(function($){
    
    var $arrows = $('.arrows');
    var $next = $arrows.children(".slick-next");    
    var $prev = $arrows.children(".slick-prev");
    
    var slick = $('.your-class').slick({
        appendArrows: $arrows
        
    });

    jQuery('.slick-next').on('click', function (e) {
        var i = $next.index( this );
        //slick.eq(i).slickNext();
        $(".fa-angle-right").slickNext();

    });
    jQuery('.slick-prev').on('click', function (e) {
        var i = $prev.index( this );
        
        //slick.eq(i).slickPrev();
        $(".fa-angle-left").slickNext();

    });

});



/*
script for Sticky Header
*/

jQuery(document).ready(function( $ ){
 var shrinkHeader = 300;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.header-row-2').addClass('shrink');
        }
        else {
            $('.header-row-2').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});

/*
script for SmoothScroll 
*/
jQuery(document).ready(function($){
    $('a[href^="#"]').on('click',function (e) {
        e.preventDefault();

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });
});
/*
script for counters 
*/

jQuery(document).ready(function( $ ) {
            $('.count').counterUp({
                delay: 10,
                time: 1000
            });

   
        });




/*
script for scroll to top button on footer

*/

jQuery(window).on('scroll',function() {
   // After Stuff
   //jQuery(window).off('scroll');
   scrollFunction();
});

//window.onscroll = function() {scrollFunction()};


function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        
        //document.getElementById("myBtn").style.display='block';
        jQuery('#myBtn').css('display','block');
        //console.log();
    } else {
        //document.getElementById("myBtn").style.display='none';
        jQuery('#myBtn').css('display','none');
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}






