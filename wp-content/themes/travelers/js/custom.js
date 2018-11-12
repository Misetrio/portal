jQuery(document).ready(function() {
    // Toggle Menu
    jQuery( '.dt-menu-md' ).on( 'click', function(){
        jQuery( '.dt-menu-wrap .menu' ).toggleClass( 'menu-show' );
        jQuery(this).find( '.fa' ).toggleClass( 'fa-bars fa-close' );
    });
    
    // Front Posts Slider
    var dt_front_slider = new Swiper ('.dt-featured-post-slider',{
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: 3000,
        speed: 1200,
        effect: 'fade',
        onTransitionStart: function(slider) {
            var active_slide = slider.activeIndex;
            setTimeout(function () {
                jQuery('.swiper-slide').eq(active_slide).find('.dt-featured-post-meta').fadeIn().addClass('animated fadeInUp');
            },400);
        },
        onSlideChangeEnd: function(slider) {
            var next_slide = slider.activeIndex+1;
            var previous_slide = slider.previousIndex;
            jQuery('.swiper-slide').eq(next_slide).find('.dt-featured-post-meta').hide();
            jQuery('.swiper-slide').eq(previous_slide).find('.dt-featured-post-meta').hide();
        }
    });
    // Back to Top
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 500, // px
            backToTop = function () {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('#back-to-top').addClass('show');
                } else {
                    jQuery('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function () {
            backToTop();
        });
        jQuery('#back-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 600);
        });
    }
});
