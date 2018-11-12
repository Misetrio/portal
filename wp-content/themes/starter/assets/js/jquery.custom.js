
(function($){ //create closure so we can safely use $ as alias for jQuery

    $(document).ready(function(){

        "use strict";

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
        /*  Slick Mobile Menu
        /*-----------------------------------------------------------------------------------*/
        $('#primary-menu').slicknav({
            prependTo: '#slick-mobile-menu',
            allowParentLinks: true,
            label:'Menu'            
        });   

        /*-----------------------------------------------------------------------------------*/
        /*  Header Search
        /*-----------------------------------------------------------------------------------*/
        $('.search-icon > .genericon-search').click(function(){
            $('.header-search').css('display', 'block');
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active'); 
        });

        $('.search-icon > .genericon-close').click(function(){
            $('.header-search').css('display', 'none');
            $('.search-icon > .genericon-search').toggleClass('active');
            $('.search-icon > .genericon-close').toggleClass('active');
        });          

    });

})(jQuery);