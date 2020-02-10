jQuery(function($) {
    'use strict';
    (function() {}());
    (function() {
        $('#status').fadeOut();
        $('#preloader').delay(200).fadeOut('slow');
    }());
    (function() {
         $('a.page-scroll').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
    }());
    (function() {
        var nav = $('.navbar');
        var scrolled = false;
        $(window).scroll(function() {
            if (110 < $(window).scrollTop() && !scrolled) {
                nav.addClass('sticky animated fadeInDown').animate({
                    'margin-top': '0px'
                });
                scrolled = true;
            }
            if (110 > $(window).scrollTop() && scrolled) {
                nav.removeClass('sticky animated fadeInDown').css('margin-top', '0px');
                scrolled = false;
            }
        });
    }());
    (function() {
        $('.progress').on('inview', function(event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                $.each($('div.progress-bar'), function() {
                    $(this).css('width', $(this).attr('aria-valuenow') + '%');
                });
                $(this).off('inview');
            }
        });
    }());
    (function() {
        $('.counter-section').on('inview', function(event, visible, visiblePartX, visiblePartY) {
            if (visible) {
                $(this).find('.timer').each(function() {
                    var $this = $(this);
                    $({
                        Counter: 0
                    }).animate({
                        Counter: $this.text()
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.ceil(this.Counter));
                        }
                    });
                });
                $(this).off('inview');
            }
        });
    }());
    (function() {
        var $grid = $('#grid');
        $grid.shuffle({
            itemSelector: '.portfolio-item'
        });
        $('#filter li').on('click', function(e) {
            e.preventDefault();
            $('#filter li').removeClass('active');
            $(this).addClass('active');
            var groupName = $(this).attr('data-group');
            $grid.shuffle('shuffle', groupName);
        });
    }());
    (function() {
        var owl = $(".recent-project-carousel");
        owl.owlCarousel({
            items: 5,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [600, 2],
            itemsMobile: [479, 1],
            pagination: false
        });
        $(".btn-next").on('click', function() {
            owl.trigger('owl.next');
        })
        $(".btn-prev").on('click', function() {
            owl.trigger('owl.prev');
        })
    }());
    (function() {
        var owl = $(".partner-carousel");
        owl.owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [600, 2],
            itemsMobile: [479, 1],
            pagination: false
        });
    }());
    (function() {
        $('.bwWrapper').BlackAndWhite({
            hoverEffect: true,
            webworkerPath: false,
            invertHoverEffect: false,
            intensity: 1,
            speed: {
                fadeIn: 200,
                fadeOut: 800
            },
            onImageReady: function(img) {}
        });
    }());
    (function() {
        $('.swipebox').swipebox();
        $('.panel-heading a').on('click',function(e){
            if($(this).parents('.panel').children('.panel-collapse').hasClass('in')){
                e.stopPropagation();
                return false;
            }
        });
    }());
});