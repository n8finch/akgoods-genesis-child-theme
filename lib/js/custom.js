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


    /**
     * Remove First and Last Classes for the YITH plugin
     */

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


    /**
     * Insert blank and empty row to add spacing on single product pages
     * @type {string}
     */

    var $emptyTableRow = '<tr class="spacer"><td></td></tr>';

    $($emptyTableRow).insertAfter('table.variations > tbody > tr');
    //Insert blank and empty row to add spacing on single product pages


    /**
     *  Add to cart popup
     */

    // var $add_to_cart_button = '.single_add_to_cart_button';
    // if ($($add_to_cart_button)) {
    //   var $atc_disabled = $($add_to_cart_button).prop('disabled');
    //   if ($atc_disabled === true) {
    //     var $appendText = '<div class="" id="make-selection-text"><span class="fa fa-info-circle"></span> Make a selection to add to cart or wishlist.</div>';
    //     $('form.variations_form.cart').prepend($appendText);
    //   }
    // }
    //
    // $('select').on('change', function () {
    //   $('#make-selection-text').slideUp();
    // });


    var $appendText = '<div class="" id="make-selection-text"><span class="fa fa-info-circle"></span> Make a selection to add to cart or wishlist.</div>';
    $('form.variations_form.cart').prepend($appendText);
    $('#make-selection-text').hide();
    var $atc_button = 'a.wl-add-to.wl-add-but.button';

    $($atc_button).mouseover(function (e) {
      // var x = e.pageX + 'px';
      // var y = e.pageY + 'px';
      // console.log(x + ',' + y);
      setTimeout(1000);
      $('#make-selection-text').slideDown();

    });

    $('select').on('change', function () {
      $('#make-selection-text').slideUp();
    });


    /**
     * Add mouseover note to Add to Wishlist button
     */


    /*
     http://jsfiddle.net/9RxLM/
     http://stackoverflow.com/questions/6802956/how-to-position-a-div-in-a-specific-coordinates
     http://stackoverflow.com/questions/23744605/javascript-get-x-and-y-coordinates-on-mouse-click


     */


    // var $atc_button = 'a.wl-add-to.wl-add-but.button';
    // var d = '<div class="add-to-wishlist-popup"></div>';
    //
    // $($atc_button).mouseover(function(e) {
    //   var x = e.pageX+'px';
    //   var y = e.pageY+'px';
    //   console.log(x +','+y);
    //
    //   $(d).css( 'left', x );
    //   $(d).css( 'left', x );
    //   $(d).css( 'background-color', 'red' );
    //
    //   $(document.body).prepend(d);
    //   // $(d).show();
    //
    // }).mouseout(function() {
    //   $(d).hide();
    //   console.log('out');
    //
    // });


    // var $atc_button = 'a.wl-add-to.wl-add-but.button';
    // $($atc_button).on('click', function () {
    //   if ( $($atc_button).hasClass('disabled') ) {
    //
    //     var $appendText = '<div class="" id="make-selection-text"><span class="fa fa-info-circle"></span> Make a selection to add to cart or wishlist.</div>';
    //
    //     $('#wl-wrapper').append($appendText);
    //   }
    // });








    // Changing the dropdown with the fa arrows clicked
    // http://jsfiddle.net/oscarj24/GR9jU/

    // $('td.value').prepend('<div id="thisWillOpen">This</div>');
    //
    // $('#thisWillOpen').click(function() {
    //
    //   console.log($(this).parent('td.value'));
    //   open($('select'));
    // });
    //
    //
    // function open(elem) {
    //   if (document.createEvent) {
    //     var e = document.createEvent("MouseEvents");
    //     e.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
    //     elem[0].dispatchEvent(e);
    //   } else if (element.fireEvent) {
    //     elem[0].fireEvent("onmousedown");
    //   }
    // }


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

