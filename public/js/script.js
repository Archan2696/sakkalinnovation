    AOS.init(
    {
        duration:1000,
    });

    $(window).on("scroll", function () {
        if ($(".header-main").length) {
        var headerScrollPos = 130;
        var stricky = $(".header-main");
        if ($(window).scrollTop() > headerScrollPos) {
            stricky.addClass("stricky-fixed");
        } else if ($(this).scrollTop() <= headerScrollPos) {
            stricky.removeClass("stricky-fixed");
        }
        }
    });
    
    // jQuery(function($) {
    //      var path = window.location.href;
    //      $('.main-menu a').removeClass('active');
    //      $('.main-menu a').each(function() {
    //       if (this.href === path) {
    //       $(this).addClass('active');
    //       }
    //     });
    // });
    
    
    jQuery(function($) {
    var path = window.location.href;
    $('.main-menu a').removeClass('active');

    if (path.includes('blog')) {
        $('.main-menu a').each(function() {
            if (this.href === path || this.href.includes('blog')) {
                $(this).addClass('active');
            }
        });
        } else {
            $('.main-menu a').each(function() {
                if (this.href === path) {
                    $(this).addClass('active');
                }
            });
        }
    });


    $(document).ready(function(){
        // scroll top 

    var scrollTop = $(".scrollTop");

    $(window).scroll(function() {
        var topPos = $(this).scrollTop();

        if (topPos > 100) {
            $(scrollTop).css("opacity", "1");

        } else {
            $(scrollTop).css("opacity", "0");
        }

    }); 

    $(scrollTop).click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;

    });
  });


  $('[data-fancybox="gallary"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "share",
      "close"
    ],
    loop: false,
    protect: true
  });
  
  

 $('.testimonial-slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            centerMode: true,
            centerPadding: 0,
            autoplay:true,
            // autoplaySpeed: 0,
            // speed: 5000,
            draggable:true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },


            ]
        });
        
        
      
        