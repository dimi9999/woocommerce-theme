 // 1. Slick js (Homepage Carousel)
 
 $('.heroBlock').slick({
  arrows: false,
  dots:true
});


// 2. Homepage Recent Products
 
$('.recent ul').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
 
  ]
});
// 3. Homepage Brands
$('.brandBlock ul').slick({
  arrows: false,
  autoplay: true,
  autoplaySpeed: 5000,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4
      }
    },
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    }
  ]
});

// 4. Homepage Sales Products
 
$('.sales ul').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
 
  ]
});