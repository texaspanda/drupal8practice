function addClasses() {
  var sliderElement = document.querySelector('.view-display-id-block_1');
  var sliderContainer = sliderElement.querySelector('.view-content');
  sliderContainer.className = "slick-slider";
}

addClasses();

(function ($, Drupal) {
  Drupal.behaviors.slider = {
    attach: function (context, settings) {
      $('.slick-slider').slick({
        dots: true,
        autoplay: true,
        autoplaySpeed: 1500,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
      });
    }
  };
})(jQuery, Drupal);