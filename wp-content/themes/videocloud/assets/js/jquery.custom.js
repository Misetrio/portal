
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

        // store the slider in a local variable
        var $window = $(window),
          flexslider = { vars:{} };

        // tiny helper function to add breakpoints
        function getGridSize() {
        return (window.innerWidth < 600) ? 1 :
               (window.innerWidth < 900) ? 2 : 3;
        }

        $window.load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: true,
          itemWidth: 367,
          itemMargin: 10,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            flexslider = slider;
          }
        });
        });

        // check grid size on resize event
        $window.resize(function() {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
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
        $('.video-length').fadeIn(400);
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

    });

})(jQuery);