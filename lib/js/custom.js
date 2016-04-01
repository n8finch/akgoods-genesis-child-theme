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
        var $this = this;
        var $toggleThis = this.getAttribute('data-toggle');
        $toggleThis = '#' + $toggleThis;
        $($toggleThis).slideToggle(function() {
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




    $(function() {
      // this will get the full URL at the address bar
      var $url = window.location.href;
      console.log($url);

      // passes on every "a" tag
      $(".menu-item a").each(function() {
        // checks if its the same on the address bar
        if ($url == (this.href)) {
          $(this).closest("li").addClass("active-primary-menu");
        }
      });
    });






  });

}(jQuery));

