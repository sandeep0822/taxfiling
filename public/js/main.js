      // aos animation
      function aos_init() {
        AOS.init({
          duration: 1000,
          once: true
        });
      }
      $(window).on('load', function() {
        aos_init();
      });
      //end
      // testimonial
      $('.testimonial-wrapper').slick({
        infinite: true,
        autoplay: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
      });