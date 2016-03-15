<?php
/*Template Name: AK Home Page*/

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action( 'genesis_before_loop', 'main_page_top_section' );
add_action( 'genesis_before_loop', 'main_page_trade_discount_section' );
add_action( 'genesis_before_loop', 'main_page_ornamental_stone_products_section' );
add_action( 'genesis_before_loop', 'main_page_home_design_and_decor_section' );
add_action( 'genesis_before_loop', 'main_page_featured_project_galleries_section' );
add_action( 'genesis_before_loop', 'main_page_blog_post_and_testimonials_section' );

//Main Page Top Section

function main_page_top_section() {

	$top_left_column_category_slug          = get_field( 'top_left_column_category_slug' );
	$bottom_left_left_column_category_slug  = get_field( 'bottom_left_left_column_category_slug' );
	$bottom_right_left_column_category_slug = get_field( 'bottom_right_left_column_category_slug' );
	$center_column_category_slug            = get_field( 'center_column_category_slug' );
	$top_left_right_column_category_slug    = get_field( 'top_left_right_column_category_slug' );
	$top_right_right_column_category_slug   = get_field( 'top_right_right_column_category_slug' );
	$bottom_right_column_category_slug      = get_field( 'bottom_right_column_category_slug' );

	echo '<div class="top-main-page-container">

			<!-- Top Left Section -->
			<div class="main-page-col-third" id="mainpage-top-left">
				<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(https://www.akgoods.com/wp-content/uploads/home-bath.jpg);">
				  <a href="http://akgoods.dev/shop/bathtubs/"><div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover" id="top-left-title">Bathtubs</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">Bathtubs</h3>
				      <h3 class="yellow-text">Shop Now</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>

				<div class="top-side-by-side-section">
					<div class="hover-tile-outer main-page-col-half left" style="background-image: url(https://www.akgoods.com/wp-content/uploads/home-accents.jpg);">
					  <a href="http://akgoods.dev/shop/home-accents/"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-left-left-title">Home Accents</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
						  <h3 class="white-category-title-text">Home Accents</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>

					<div class="hover-tile-outer main-page-col-half right" style="background-image: url(https://www.akgoods.com/wp-content/uploads/770-772-fire-pit-with-773-780-spark-screen-buring-wood-glamour-2.jpg);">
					  <a href="http://akgoods.dev/shop/outdoor-products/"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-left-right-title">Outdoor</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
					      <h3 class="white-category-title-text">Outdoor</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>
				</div>


			</div>

			<!-- Top Center Section -->
			<div class="main-page-col-third">
				<a href="http://akgoods.dev/shop/fireplaces-mantels/"><div class="hover-tile-outer" id="mainpage-top-center" style="background-image: url(https://www.akgoods.com/wp-content/uploads/section-5-fireplaces-middle12.jpg);">
				  <div class="hover-tile-container">
				    <h3 class="hide-title-on-hover" id="top-center-title">Fireplace Mantels</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">Fireplace Mantels</h3>
				      <h3 class="yellow-text">Shop Now</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div>
				</div></a>

			</div>

			<!-- Top Right Section -->
			<div class="main-page-col-third" id="mainpage-top-right">

				<div class="top-side-by-side-section">
					<div class="hover-tile-outer main-page-col-half left" style="background-image: url(https://www.akgoods.com/wp-content/uploads/custom-kitchen-hoods-02-2.jpg);">
					  <a href="http://akgoods.dev/shop/kitchen-range-hoods/"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-right-left-title">Kitchen Range Hoods</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
					      <h3 class="white-category-title-text">Kitchen Range Hoods</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>

					<div class="hover-tile-outer main-page-col-half right" style="background-image: url(https://www.akgoods.com/wp-content/uploads/bronze.jpg);">
					  <a href="http://akgoods.dev/shop/bronze-and-copper/"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-right-right-title">Bronze & Copper</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
					      <h3 class="white-category-title-text">Bronze & Copper</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>
				</div>

				<div class="hover-tile-outer" style="background-image: url(https://www.akgoods.com/wp-content/uploads/section-5-architectural-stone11.jpg);">
				  <a href="http://akgoods.dev/shop/architectural-stone/"><div class="hover-tile-container">
				  	<h3 class="hide-title-on-hover" id="bottom-right-title">Architechtural Stone</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">Architechtural Stone</h3>
				      <h3 class="yellow-text">Shop Now</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>

			</div>
		  </div>';
}


//Main Page Trade Discount Section

function main_page_trade_discount_section() {

	$trade_discount_left_title     = get_field( 'trade_discount_left_title' );
	$trade_discount_left_text_area = get_field( 'trade_discount_left_text_area' );
	$box_1_image_background        = get_field( 'box_1_image_background' );
	$box_1_icon                    = get_field( 'box_1_icon' );
	$box_1_title                   = get_field( 'box_1_title' );
	$box_1_text_area               = get_field( 'box_1_text_area' );
	$box_1_link                    = get_field( 'box_1_link' );
	$box_2_image_background        = get_field( 'box_2_image_background' );
	$box_2_icon                    = get_field( 'box_2_icon' );
	$box_2_title                   = get_field( 'box_2_title' );
	$box_2_text_area               = get_field( 'box_2_text_area' );
	$box_2_link                    = get_field( 'box_2_link' );
	$box_3_image_background        = get_field( 'box_3_image_background' );
	$box_3_icon                    = get_field( 'box_3_icon' );
	$box_3_title                   = get_field( 'box_3_title' );
	$box_3_text_area               = get_field( 'box_3_text_area' );
	$box_3_link                    = get_field( 'box_3_link' );


	echo '<div class="top-main-page-container" id="trade-discount-section">


					<a class="main-page-col-quarter" href="'.$box_1_link.'">
						<div class="discount-section" id="discount-section-1" style="background-image: url('.$box_1_image_background.');">
							<!--<span class="fa '.$box_1_icon.'"></span>-->
							<h4>'.$box_1_title.'</h4>
							<p>'.$box_1_text_area.'</p>
						</div>
					</a>


					<a class="main-page-col-quarter" href="'.$box_1_link.'">
					<div class="discount-section" id="discount-section-1" style="background-image: url('.$box_1_image_background.');">
						<!--<span class="fa '.$box_1_icon.'"></span>-->
					<h4>'.$box_1_title.'</h4>
					<p>'.$box_1_text_area.'</p>
					</div>
					</a>

					<a class="main-page-col-quarter" href="'.$box_2_link.'">
					<div class="discount-section" id="discount-section-2" style="background-image: url('.$box_2_image_background.');">
					<!--<span class="fa '.$box_2_icon.'"></span>-->
					<h4>'.$box_2_title.'</h4>
					<p>'.$box_2_text_area.'</p>
					</div>
					</a>

					<a class="main-page-col-quarter" href="'.$box_3_link.'">
					<div class="discount-section" id="discount-section-3" style="background-image: url('.$box_3_image_background.');">
					<!--<span class="fa '.$box_3_icon.'"></span>-->
					<h4>'.$box_3_title.'</h4>
					<p>'.$box_3_text_area.'</p>
					</div>
					</a>



		  </div>';
}


//Main Page Ornamental Stone Products Section

function main_page_ornamental_stone_products_section() {
	echo '<div class="top-main-page-container top-border-homepage-sections">

				<div class="main-page-container-heading">
					<h4>Ornamental Stone Products</h4>
				</div>

			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/ornamental-stone/balustrades-ornamental-stone/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/balustrades.jpg"/></a>
				<h4>Balustrades</h4>
				<span>See our special pricing and available stock here.</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/ornamental-stone/columns-ornamental-stone/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/columns1.jpg"/></a>
				<h4>Columns</h4>
				<span>See our special pricing and available stock here.</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/ornamental-stone/fountains/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/fountain01.jpg"/></a>
				<h4>Fountains</h4>
				<span>See our special pricing and available stock here.</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/ornamental-stone/statues/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/children-moon-statue-carrera-marble.jpg"/></a>
				<h4>Statues</h4>
				<span>See our special pricing and available stock here.</span>

			</div>

		  </div>';

	$box_1_image_background_ss        = get_field( 'box_1_image_background_ss' );
	$box_1_icon_ss                    = get_field( 'box_1_icon_ss' );
	$box_1_title_ss                   = get_field( 'box_1_title_ss' );
	$box_1_text_area_ss               = get_field( 'box_1_text_area_ss' );
	$box_1_link_ss                    = get_field( 'box_1_link_ss' );
	$box_2_image_background_ss        = get_field( 'box_2_image_background_ss' );
	$box_2_icon_ss                    = get_field( 'box_2_icon_ss' );
	$box_2_title_ss                   = get_field( 'box_2_title_ss' );
	$box_2_text_area_ss               = get_field( 'box_2_text_area_ss' );
	$box_2_link_ss                    = get_field( 'box_2_link_ss' );
	$box_3_image_background_ss        = get_field( 'box_3_image_background_ss' );
	$box_3_icon_ss                    = get_field( 'box_3_icon_ss' );
	$box_3_title_ss                   = get_field( 'box_3_title_ss' );
	$box_3_text_area_ss               = get_field( 'box_3_text_area_ss' );
	$box_3_link_ss                    = get_field( 'box_3_link_ss' );




	echo '<div class="top-main-page-container" id="shipping-section">

			<a class="main-page-col-third" href="'.$box_1_link_ss.'">
			<div class="shipping-section" style="background-image: url('.$box_1_image_background_ss.');">
				<!--<span class="fa '.$box_1_icon_ss.'"></span>-->
				<h4>'.$box_1_title_ss.'</h4>
				<p>'.$box_1_text_area_ss.'</p>

			</div>
			</a>

			<a class="main-page-col-third" href="'.$box_2_link_ss.'">
			<div class="shipping-section" style="background-image: url('.$box_2_image_background_ss.');">
				<!--<span class="fa '.$box_2_icon_ss.'"></span>-->
				<h4>'.$box_2_title_ss.'</h4>
				<p>'.$box_2_text_area_ss.'</p>

			</div>
			</a>

			<a class="main-page-col-third" href="'.$box_3_link_ss.'">
			<div class="shipping-section" style="background-image: url('.$box_3_image_background_ss.');">
				<!--<span class="fa '.$box_3_icon_ss.'"></span>-->
				<h4>'.$box_3_title_ss.'</h4>
				<p>'.$box_3_text_area_ss.'</p>

			</div>
			</a>

		  </div>';
}


//Main Page Home Design and Decor Section

function main_page_home_design_and_decor_section() {
	echo '<div class="top-main-page-container top-border-homepage-sections" id="home-design-decor-section">

				<div class="main-page-container-heading">
					<h4>Home Design and Decor</h4>
				</div>

			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/homedesigndecor/bathroom/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/IMG_05491.jpeg"/></a>
				<h4>Bathroom</h4>
				<span>See our special pricing and available stock here.</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/homedesigndecor/copper_products/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/coppertub.jpg"/></a>
				<h4>Copper Products</h4>
				<span>See our special pricing and available stock here.</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/homedesigndecor/fireplaces_accessories/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/fireplaceaccessories2.jpg"/></a>
				<h4>Fireplace Accessories</h4>
				<span>See our special pricing and available stock here.</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="https://www.akgoods.finchproserivces.com/shop/homedesigndecor/kitchen/"><img class="category-images-homepage" src="https://www.akgoods.com/wp-content/uploads/2014/06/sub-cat-5.jpg"/></a>
				<h4>Kitchen</h4>
				<span>See our special pricing and available stock here.</span>

			</div>
		  </div>';
}


//Main Page Featured Project Galleries Section

function main_page_featured_project_galleries_section() {

	$homepage_gallery_1 = get_field( 'homepage_gallery_1' );
	$homepage_gallery_2 = get_field( 'homepage_gallery_2' );
	$homepage_gallery_3 = get_field( 'homepage_gallery_3' );


	echo '<div class="top-main-page-container top-border-homepage-sections" id="featured-project-galleries-section">

				<div class="main-page-container-heading">
					<h4>Featured Project Galleries</h4>
				</div>

			<div class="main-page-col-third">';
	masterslider( $homepage_gallery_1 );

	echo '</div>
			<div class="main-page-col-third">';
	masterslider( $homepage_gallery_2 );

	echo '</div>
			<div class="main-page-col-third">';
	masterslider( $homepage_gallery_3 );

	echo '</div>
		  </div>';
}


//Main Page Blog Post and Testimonials Section

function main_page_blog_post_and_testimonials_section() {
	echo '<div class="top-main-page-container top-border-homepage-sections" id="blog-post-testimonials-section">

				<div class="main-page-container-heading">
					<h4>Blog Post and Testimonials</h4>
				</div>

			<div class="main-page-col-two-thirds" id="home-page-featured-posts">';
	genesis_widget_area( 'homepage-featured-posts', array(
		'before' => '<div class="homepage-featured-posts widget-area">',
		'after'  => '</div>'
	) );


	echo '</div>
			<div class="main-page-col-third">';

	genesis_widget_area( 'homepage-testimonials', array(
		'before' => '<div class="homepage-testimonials widget-area">',
		'after'  => '</div>'
	) );

	echo '</div>
		  </div>';
}


genesis();