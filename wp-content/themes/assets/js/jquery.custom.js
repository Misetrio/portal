
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        $(window).load(function(){
           // $('.flexslider').flexslider({
            //    animation: "slide"
            //});

            var target_flexslider = $('.flexslider');
               target_flexslider.flexslider({
                   animation: "slide",  
                   slideshow: true,
                   controlsContainer: ".slider",

                   start: function(slider) {
                       target_flexslider.removeClass('loading');
                       $(".ribbon").fadeIn('1000');
                   }

            });


        });

        /**
         * Activate FitVids.
         */
        $(".entry-content, #slider, #primary").fitVids();

        /*-----------------------------------------------------------------------------------*/
        /*  Show video length after page loaded 
        /*-----------------------------------------------------------------------------------*/
        $('.thumbnail-wrap .genericon').fadeIn(400);

        /*-----------------------------------------------------------------------------------*/
        /*  Superfish Menu
        /*-----------------------------------------------------------------------------------*/
        // initialise plugin
        var example = $('.sf-menu').superfish({
            //add options here if required
            delay:       100,
            speed:       'fast',
            autoArrows:  false  
        });                              

        /*-----------------------------------------------------------------------------------*/
        /*  Mobile Menu & Search
        /*-----------------------------------------------------------------------------------*/

        /* Mobile Search */
        $('.search-icon > .genericon-search').click(function(){

            $('.header-search').slideDown('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.menu-icon-open').removeClass('active');
            $('.menu-icon-close').removeClass('active');

        });

        $('.search-icon > .genericon-close').click(function(){

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.menu-icon-open').removeClass('active');
            $('.menu-icon-close').removeClass('active');            

        }); 

        /* Mobile Sidebar 2 */
        $('.sidebar-2-button > .genericon-menu').click(function(){

            $('.sidebar-2').fadeIn('300');
            $('.sidebar-2-button > .genericon-menu').toggleClass('active');
            $('.sidebar-2-button > .genericon-close').toggleClass('active');

        });

        $('.sidebar-2-button > .genericon-close').click(function(){

            $('.sidebar-2').fadeOut('300');
            $('.sidebar-2-button > .genericon-menu').toggleClass('active');
            $('.sidebar-2-button > .genericon-close').toggleClass('active');       

        });              

    });

})(jQuery);