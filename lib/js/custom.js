(function ($) {

  $(document).ready(function () {


    $('.hover-tile-outer').hover(function () {
      $(this).find('.hide-title-on-hover').toggle();
    });

    //$( "#product-description-accordion" ).accordion();


    var $singleProductTitle = $('.single-product-custom-fields-titles'),
      $singleProductPara = $('.single-product-custom-fields'),
      $singleProductIcon = $('.fa-float-right');


    $singleProductTitle.on('click', toggle_the_field);

    function toggle_the_field() {
      if (this.hasAttribute('data-toggle')) {
        var $this = this;
        var $toggleThis = this.getAttribute('data-toggle');
        $toggleThis = '#' + $toggleThis;
        $($toggleThis).slideToggle(function () {
          //var $icon = $($this).find('.fa')[0];
          //if ( $($icon).hasClass('.fa-chevron-down') ) {
          //  $($icon).removeClass('.fa-chevron-down').addClass('.fa-chevron-up');
          //} else {
          //  $($icon).removeClass('.fa-chevron-up').addClass('.fa-chevron-down');
          //}
          //console.log($icon);

        });
      }
    }

    $singleProductPara.hide();


    // Remove First and Last Classes for the YITH plugin

    $(".yith_magnifier_thumbnail").removeClass('first').removeClass('last');


    $(function () {
      // this will get the full URL at the address bar
      var $url = window.location.href;
      console.log($url);

      // passes on every "a" tag
      $(".menu-item a").each(function () {
        // checks if its the same on the address bar
        if ($url == (this.href)) {
          $(this).closest("li").addClass("active-primary-menu");
        }
      });
    });

    //Insert blank and empty row to add spacing on single product pages
    var $emptyTableRow = '<tr class="spacer"><td></td></tr>';

    $($emptyTableRow).insertAfter('table.variations > tbody > tr');


    //Add to cart popup
    var $add_to_cart_button = '.single_add_to_cart_button';
    if($($add_to_cart_button)) {
      var temp = $($add_to_cart_button).prop('disabled');
      if (temp === true) {
        var appendText = '<div class="" id="make-selection-text">Make a selection to add to cart or wishlist.</div>';
        $('form.variations_form.cart').prepend(appendText);
      }
    }

    $('select').on('change', function() {
      $('#make-selection-text').slideUp();
    });


  });

}(jQuery));

