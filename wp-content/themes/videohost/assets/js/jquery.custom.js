
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        // Flexslider
        $(window).load(function(){

            $('#carousel').flexslider({
                animation: "slide",
                controlNav: true,
                directionNav: true,
                animationLoop: true,
                slideshow: false,
                itemWidth: 152,
                itemMargin: 20, 
                touch: true,       
                asNavFor: '#slider'            
            });

            $('#slider').flexslider({
                animation: 'slide',
                controlNav: false,
                directionNav:true,
                animationLoop: true,
                touch: true,
                sync: "#carousel"
            });

        });

        /**
         * Activate FitVids.
         */
        $(".entry-content, #slider, #primary").fitVids();

        $('.entry-content .fluid-width-video-wrapper').eq(0).addClass('first-video').end();
        $('.entry-content .wp-video').eq(0).addClass('first-video').end();

        $(".single #primary").css('visibility', 'visible');

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

        /* Mobile Menu */
        $('.menu-icon-open').click(function(){

            $('.mobile-menu').slideDown('fast', function() {});
            $('.menu-icon-open').toggleClass('active');
            $('.menu-icon-close').toggleClass('active');  

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').removeClass('active');
            $('.search-icon > .genericon-close').removeClass('active');

        });

        $('.menu-icon-close').click(function(){

            $('.mobile-menu').slideUp('fast', function() {});
            $('.menu-icon-open').toggleClass('active');
            $('.menu-icon-close').toggleClass('active');

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').removeClass('active');
            $('.search-icon > .genericon-close').removeClass('active');            

        });

        /* Mobile Search */
        $('.search-icon > .genericon-search').click(function(){

            $('.header-search').slideDown('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.mobile-menu').slideUp('fast', function() {});
            $('.menu-icon-open').removeClass('active');
            $('.menu-icon-close').removeClass('active');

        });

        $('.search-icon > .genericon-close').click(function(){

            $('.header-search').slideUp('fast', function() {});
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');

            $('.mobile-menu').slideUp('fast', function() {});
            $('.menu-icon-open').removeClass('active');
            $('.menu-icon-close').removeClass('active');            

        });      

    });

})(jQuery);