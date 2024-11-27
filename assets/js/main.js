(function ($) {
    "use strict";

    $(window).on('load', function(){
        //===== Prealoder
        $("#preloader").delay(400).fadeOut();
        if (window.matchMedia('(max-width: 991.98px)').matches) {
            $('.dropdown_wrap>a').click(function(e) {
                e.preventDefault();
                var $this = $(this);
                // $('.drop_box>a').removeClass('open');
                // $this.toggleClass('open');

                if ($this.next().hasClass('show')) {
                    $this.next().removeClass('show');
                    $this.next().slideUp();
                    $('.drop_box>a').removeClass('open');
                    
                } else {
                    $this.parent().parent().find('ul, .mega_wrapper').removeClass('show');
                    $this.parent().parent().find('ul, .mega_wrapper').slideUp();
                    $this.next().toggleClass('show');
                    $this.next().slideToggle();
                    $('.menu_img').addClass('d-none');

                }
            });

            $('.filter_toggle').click(function() {
                $(this).next().slideToggle();
            });  
        }
    });

    $(document).ready(function () {
        //05. sticky header
        function sticky_header(){
            var wind = $(window);
            var sticky = $('header');
            var top_head = $('.top_header').height();
            wind.on('scroll', function () {
                var scroll = wind.scrollTop();
                if (scroll <= top_head) {
                    sticky.removeClass('sticky');
                } else {
                    sticky.addClass('sticky');
                }
            });
        }
        sticky_header();
        //===== Back to top

        // Show or hide the sticky footer button
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 600) {
                $('.back-to-top').fadeIn(200)
            } else {
                $('.back-to-top').fadeOut(200)
            }
        });

        //Animate the scroll to yop
        $('.back-to-top').on('click', function (event) {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: 0,
            }, 900);
        });        

        // Hamburger-menu
        $('.hamburger-menu').on('click', function () {
            $('.hamburger-menu .line-top, .menu_wrapper, header').toggleClass('current');
            $('.hamburger-menu .line-center').toggleClass('current');
            $('.hamburger-menu .line-bottom').toggleClass('current');
        });  

        // slider
        $('.owl-carousel.slider1').owlCarousel({
            loop: true,
            margin: 30,
            items: 3,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            navText: [
                '<i class="fal fa-angle-left"></i>',
                '<i class="fal fa-angle-right"></i>'
            ],
            responsive:{
                0:{
                   items: 1,
                },
                576:{
                    items: 2,
                },
                992:{
                    items: 3,
                },
                1200:{
                    items: 3,
                },
            }
        });  

    });

})(jQuery);