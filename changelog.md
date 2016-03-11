#Changelog
started  Feb. 23, 2016


March. 3, 2016
- Removed ```<div itemprop="description">
          	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
          </div>```, placed into the functionality plugin.

- added Related Items loop to woocommerce>>single-product.php template.



###Mar. 2, 2016

- Added layout for homepage
- need feedback on stylings

###Mar. 1, 2016

- fixed stylings on the header
- fixed stylings on the footer


###Feb. 26, 2016

- added search form and stylings to primary nav, added cart to top menu area
- added menu background as red, changed submenu backgrounds, changed fonts
- footer elements added

###Feb. 25, 2016

- added social media area to header right. coptions in Jessica header settings and the before-header.php and jessica-theme-settings.php files
- added bourbon, compiled and added header options to before-header.php


###Feb. 24, 2016

- changed primary menu font size
- enqueued Google Ubuntu and Open Sans fonts, changed stylings on the main fonts, added header info
- added options to Jessica Theme settings for contact info



===============================

# Jessica Changelog

## 1.2.9 - 14 Jan 2016
* Modify update notification script to prevent warnings in some hosting environments  
* Improve widget contructor method  
* Update included Genericons to version 3.4.1            

### Files Modified
* /style.css (version number only)  
* /style-rtl.css (version number only)  
* /genericons/*  
* /lib/widgets/call-to-action.php  
* /lib/widgets/widget-social.php
* /lib/widgets/wsm-banner.php        

---


## 1.2.8 - 20 Oct 2015
* Fix bug in iThemes Exchange and WP eCommerce product layout    
* Add rem measurements to CSS font-size rules for improved accessibility  
* Change Google font import from style sheet to enqueue function   
* Fix bug in update notification script      
* Various minor bug fixes         

### Files Modified
* /style.css   
* /style-rtl.css   
* /languages/*  
* lib/init.php  
* /lib/functions/update.php
* /shop/woocommerce.php        

---

## 1.2.7 - 03 Sep 2015
* Simplify WooCommerce integration  
* Add full Genesis 2.2+ accessibility support  
* Switch to built-in Genesis mobile responsive meta tag     

### Files Modified
* /style.css   
* /style-rtl.css   
* /functions.php  
* /languages/*  
* lib/init.php  
* /shop/woocommerce.php  
* /woocommerce/content-product.php (file removed)  
* /woocommerce/loop/add-to-cart.php (file removed)
* /woocommerce/single-product/meta.php  
* /woocommerce/single-product/add-to-cart/* (directory removed)          

---

## 1.2.6 - 22 Aug 2015
* Fix WooCommerce variable product bug     

### Files Modified
* /style.css (version number only)  
* /style-rtl.css (version number only)  
* /languages/*  
* /woocommerce/single-product/add-to-cart/variable.php          

---

## 1.2.5 - 11 Aug 2015
* Fix widget compatibility for WordPress version 4.3  
* Update theme template files for WooCommerce version 2.4.x compatibility   

### Files Modified
* /style.css (version number only)  
* /style-rtl.css (version number only)  
* /lib/widgets/call-to-action.php  
* /lib/widgets/widet-social.php  
* /lib/widgets/wsm-banner.php  
* /woocommerce/content-product.php  
* /woocommerce/single-product/add-to-cart/variable.php          

---

## 1.2.4 - 03 Aug 2015
* Fix bug in header search display toggle    

### Files Modified
* /style.css (version number only)  
* /style-rtl.css (version number only)  
* /lib/structure/before-header.php        

---

## 1.2.3 - 01 Aug 2015
* CSS fix for color scheme list bullets on WooCommerce pages  
* Fix Google Font compatibility with SSL/HTTPS  
* Renamed home.php file to front-page.php file for simplicity  
* Add full WPML plugin compatibility  

### Files Modified
* /style.css   
* /style-rtl.css   
* /home.php (file removed)  
* /fron-page.php (new file added)  
* /wpml-config.xml (new file added) 
* /languages/*  
* /lib/widgets/call-to-action.php     
* /lib/widgets/widget-social.php    
* /lib/widgets/wsm-banner.php    
* /lib/widgets/wsm-featured-page.php    
* /lib/widgets/wsm-featured-post.php      

---

## 1.2.2 - 07 May 2015
* Security Fix for Genericons package (same fix as Jetpack, etc.)    

### Files Modified
* /style.css (version number only)  
* /style-rtl.css (version number only)  
* /lib/genericons/example.html (file removed)     

---

## 1.2.1 - 30 Apr 2015
* Fix CSS bug induced by Soliloquy style changes  
* CSS fix for WooCommerce update  
* Remove rem units from style sheet for simplicity  
* Fix comment form to use placeholders without script requirement    

### Files Modified
* /style.css  
* /style-rtl.css  
* /languages/*  
* /lib/structure/comment-form.php   

---

## 1.2.0 - 11 Mar 2015
* Fix bug in style sheet enqueueing
* Convert to new Gravity Forms built-in placeholder functionality  
* Add template file for iTHemes Exchange to use thumbnail image size on store archive pages instead of large image size  
* Enable shortcode use in footer settings fields    
* Various minor bug fixes   

### Files Modified
* /style.css (version number only) 
* /style-rtl.css (version number only)  
* /functions.php  
* /taxonomy-it_exchange_category.php  
* /taxonomy-it_exchange_tag.php  
* /taxonomy-product_tag.php  
* /wpsc-single_product.php  
* /exchange/content-store/elements/featured-image.php (new file added)  
* /lib/init.php  
* lib/admin/jessica-theme-settings.php  
* /lib/functions/gforms-placeholder.php (file removed)  
* /lib/functions/metaboxes.php  
* /lib/js/modernizr.min.js (file removed)  
* /lib/structure/before-header.php  
* /lib/structure/comment-form.php  
* /lib/structure/footer.php  
* /lib/widgets/widget-social.php  
* /lib/widgets/wsm-banner.php 

---

## 1.1.5 - 21 Feb 2015
* Fix CSS bug in main navigation hover state (See this Forum topic for more info: http://www.web-savvy-marketing.com/forum/jessica-instructions/prevent-main-navigation-movement-on-hover/ )  

### Files Modified
* /style.css   
* /style-rtl.css     

---

## 1.1.4 - 19 Feb 2015
* Resolve WooCommerce template version warning  
* Explicitly declare WooCommerce support if WooCommerce is activated  

### Files Modified
* /style.css (version number only)  
* /style-rtl.css (version number only)  
* /taxonomy-product_tag.php  
* /languages/en_US.mo  
* /languages/en_US.po  
* /languages/jessica.pot 
* /lib/shop/woocommerce.php  
* /woocommerce/single-product/add-to-cart/variable.php  

---

## 1.1.3 - 13 Jan 2015
* Change style sheet character encoding to UTF-8  
* Bug fix in WooCommerce single product view  

### Files Modified
* /style.css (character encoding only)  
* /style-rtl.css (version number only)  
* /woocommerce/content-product.php    

---

## 1.1.2 - 02 Dec 2014
* Fix bug with Android display of mobile menu icon  
* Update Genericons font to latest version   
* Add missing strings to text domain  

### Files Modified
* /style.css  
* /style-rtl.css   
* /languages/en_US.po  
* /languages/en_US.mo  
* /languages/jessica.pot  
* /lib/genericons/* (update all files in directory)  
* /lib/widgets/widget-social.php  
* /lib/widgets/wsm-banner.php  
* /woocommerce/loop/add-to-cart.php  
* /woocommerce/single-product/add-to-cart/grouped.php  
* /woocommerce/single-product/add-to-cart/simple.php  
* /woocommerce/single-product/add-to-cart/variable.php  

---

## 1.1.1 - 13 Nov 2014
* Bug fix for imported fonts  

### Files Modified
* /style.css  
* /style-rtl.css   

---

## 1.1.0 - 12 Nov 2014
* Added internationalization (i18n) support by wrapping all front-end facing text strings in a translation function
* Added text domain in style.css and loaded text domain in functions.php
* Added .pot file as basis for translations
* Add .rtl stylesheet to be conditionally enqueued (instead of style.css) when WordPress language is set to an RTL script

### Files Modified
* /style.css  
* /style-rtl.css (new file added)  
* /functions.php  
* /languages/*.pot (new directory and file added)


---

## 1.0.2 - 10 Nov 2014
* Fix Gravity Forms Placeholder code to work with multiple forms on a single page
* Load gforms-placeholder script after Modernizr script

### Files Modified
* /style.css (version number only)
* /lib/functions/gforms-placeholder.php

---

## 1.0.1 - 06 Oct 2014
* Fix Social Widget not to display icons when URL field empty

### Files Modified
* /style.css
* /style-rtl.css
* /functions.php
* /languages/*.pot

---

## 1.0.1 - 06 Oct 2014
* Fix Social Widget not to display icons when URL field empty

### Files Modified
* /style.css (version number only)
* /lib/widgets/widget-social.php

---

## 1.0.0 - 29 Sept 2014
* Initial theme release