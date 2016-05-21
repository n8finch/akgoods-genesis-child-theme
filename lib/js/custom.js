(function ($) {

  $(document).ready(function () {


    /**
     * Hover tiles
     */

    $('.hover-tile-outer').hover(function () {
      $(this).find('.hide-title-on-hover').toggle();
    });


    /**
     * Fix layout on image slider on single products
     */

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
        });
      }
    }

    $singleProductPara.hide();


    /**
     * Remove First and Last Classes for the YITH plugin
     */

    $(".yith_magnifier_thumbnail").removeClass('first').removeClass('last');


    /**
     * Adds red active to 
     */

    $(function () {
      // this will get the full URL at the address bar
      var $url = window.location.href;
      // passes on every "a" tag
      $(".menu-item a").each(function () {
        // checks if its the same on the address bar
        if ($url == (this.href)) {
          $saleMenu = '#menu-item-2672';
          $(this).closest("li").addClass("active-primary-menu");
          $($saleMenu).addClass("active-primary-menu-sale");
        }
      });
    });


    /**
     * Adds the Make a Selection text on the single product pages
     * @type {string}
     */

    //Make text box
    var $appendText = '<div class="" id="make-selection-text"><span class="fa fa-info-circle"></span> Make a selection to add to cart or wishlist.</div>';
    $('form.variations_form.cart').prepend($appendText);
    $('#make-selection-text').hide();

    //Get vars
    var $atwish_button = 'a.wl-add-to.wl-add-but.button';
    var $atcart_button = 'div.woocommerce-variation-add-to-cart.variations_button';

    //Add to Cart Check, uses Wishlist button disabled check, since hard to tell if 
    $($atcart_button).mouseover(function (e) {
      if ($($atwish_button).hasClass('disabled')) {
        $('#make-selection-text').slideDown();
      }
    });

    //Add to Wishlist check
    $($atwish_button).mouseover(function (e) {
      if ($($atwish_button).hasClass('disabled')) {
        $('#make-selection-text').slideDown();
      }
    });

    //Hide text box on change
    $('select').on('change', function () {
      $('#make-selection-text').slideUp();
    });




    /**
     * Mobile Search Modal
     */


    $(function() {
      $("#modal-1").on("change", function() {
        if ($(this).is(":checked")) {
          $("body").addClass("modal-open");
        } else {
          $("body").removeClass("modal-open");
        }
      });

      $(".modal-fade-screen, .modal-close").on("click", function() {
        $(".modal-state:checked").prop("checked", false).change();
      });

      $(".modal-inner").on("click", function(e) {
        e.stopPropagation();
      });
    });


  });

}(jQuery));

