(function($) {

  $(document).ready(function() {






    $('.hover-tile-outer').hover(function() {
      $(this).find('.hide-title-on-hover').toggle();
    });

    //$( "#product-description-accordion" ).accordion();


    var $singleProductTitle = $('.single-product-custom-fields-titles'),
        $singleProductPara = $('.single-product-custom-fields'),
        $singleProductIcon = $('.fa-float-right');


    $singleProductTitle.on('click', toggle_the_field);

    function toggle_the_field() {
      if (this.hasAttribute('data-toggle')) {
        var $toggleThis = this.getAttribute('data-toggle');
        var $toggleThis = '#' + $toggleThis;
        $($toggleThis).slideToggle();
      }

      console.log($toggleThis);
    }

    $singleProductPara.hide();







  });

}(jQuery));

