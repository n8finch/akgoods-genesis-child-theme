(function($) {

  $(document).ready(function() {

    $('.hover-tile-outer').hover(function() {
      $(this).find('.hide-title-on-hover').toggle();
    });

    $( "#product-description-accordion" ).accordion();



  });

}(jQuery));

