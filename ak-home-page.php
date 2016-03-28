<?php
/*Template Name: AK Home Page*/

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

add_action( 'genesis_before_loop', 'main_page_top_section' );
add_action( 'genesis_before_loop', 'main_page_trade_discount_section' );
add_action( 'genesis_before_loop', 'mobile_only_add_subheader_to_main_page' );
add_action( 'genesis_before_loop', 'main_page_ornamental_stone_products_section' );
add_action( 'genesis_before_loop', 'main_page_home_design_and_decor_section' );
add_action( 'genesis_before_loop', 'main_page_featured_project_galleries_section' );
add_action( 'genesis_before_loop', 'main_page_blog_post_and_testimonials_section' );

//Main Page Top Section

function main_page_top_section() {

	$top_left_column_category_image = get_field( 'top_left_column_category_image' );
	$top_left_column_category_title = get_field( 'top_left_column_category_title' );
	$top_left_column_category_link  = get_field( 'top_left_column_category_link' );

	$bottom_left_left_column_category_image = get_field( 'bottom_left_left_column_category_image' );
	$bottom_left_left_column_category_title = get_field( 'bottom_left_left_column_category_title' );
	$bottom_left_left_column_category_link  = get_field( 'bottom_left_left_column_category_link' );

	$bottom_left_right_column_category_image = get_field( 'bottom_left_right_column_category_image' );
	$bottom_left_right_column_category_title = get_field( 'bottom_left_right_column_category_title' );
	$bottom_left_right_column_category_link  = get_field( 'bottom_left_right_column_category_link' );

	$center_column_category_image = get_field( 'center_column_category_image' );
	$center_column_category_title = get_field( 'center_column_category_title' );
	$center_column_category_link  = get_field( 'center_column_category_link' );

	$top_right_left_column_category_image = get_field( 'top_right_left_column_category_image' );
	$top_right_left_column_category_title = get_field( 'top_right_left_column_category_title' );
	$top_right_left_column_category_link  = get_field( 'top_right_left_column_category_link' );

	$top_right_right_column_category_image = get_field( 'top_right_right_column_category_image' );
	$top_right_right_column_category_title = get_field( 'top_right_right_column_category_title' );
	$top_right_right_column_category_link  = get_field( 'top_right_right_column_category_link' );

	$bottom_right_column_category_image = get_field( 'bottom_right_column_category_image' );
	$bottom_right_column_category_title = get_field( 'bottom_right_column_category_title' );
	$bottom_right_column_category_link  = get_field( 'bottom_right_column_category_link' );


	echo '<div class="top-main-page-container">

			<!-- Top Left Section -->
			<div class="main-page-col-third" id="mainpage-top-left">
				<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(' . $top_left_column_category_image . ');">
				  <a href="' . $top_left_column_category_link . '"><div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover" id="top-left-title">' . $top_left_column_category_title . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $top_left_column_category_title . '</h3>
				      <h3 class="yellow-text">Shop Now</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>

				<div class="top-side-by-side-section">
					<div class="hover-tile-outer main-page-col-half left" style="background-image: url(' . $bottom_left_left_column_category_image . ');">
					  <a href="' . $bottom_left_left_column_category_link . '"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-left-left-title">' . $bottom_left_left_column_category_title . '</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
						  <h3 class="white-category-title-text">' . $bottom_left_left_column_category_title . '</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>

					<div class="hover-tile-outer main-page-col-half right" style="background-image: url(' . $bottom_left_right_column_category_image . ');">
					  <a href="' . $bottom_left_right_column_category_link . '"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-left-right-title">' . $bottom_left_right_column_category_title . '</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
					      <h3 class="white-category-title-text">' . $bottom_left_right_column_category_title . '</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>
				</div>


			</div>

			<!-- Top Center Section -->
			<div class="main-page-col-third" id="mainpage-top-center">
				<a href="' . $center_column_category_link . '"><div class="hover-tile-outer" id="mainpage-top-center" style="background-image: url(' . $center_column_category_image . ');">
				  <div class="hover-tile-container">
				    <h3 class="hide-title-on-hover" id="top-center-title">' . $center_column_category_title . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $center_column_category_title . '</h3>
				      <h3 class="yellow-text">Shop Now</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div>
				</div></a>

			</div>

			<!-- Top Right Section -->
			<div class="main-page-col-third" id="mainpage-top-right">

				<div class="top-side-by-side-section">
					<div class="hover-tile-outer main-page-col-half left" style="background-image: url(' . $top_right_left_column_category_image . ');">
					  <a href="' . $top_right_left_column_category_link . '"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-right-left-title">' . $top_right_left_column_category_title . '</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
					      <h3 class="white-category-title-text">' . $top_right_left_column_category_title . '</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>

					<div class="hover-tile-outer main-page-col-half right" style="background-image: url(' . $top_right_right_column_category_image . ');">
					  <a href="' . $top_right_right_column_category_link . '"><div class="hover-tile-container">
					  	<h3 class="hide-title-on-hover" id="top-quarter-right-right-title">' . $top_right_right_column_category_title . '</h3>
					    <div class="hover-tile hover-tile-visible"></div>
					    <div class="hover-tile hover-tile-hidden">
					      <h3 class="white-category-title-text">' . $top_right_right_column_category_title . '</h3>
					      <h3 class="yellow-text">Shop Now</h3>
					      <!--<p>See our special pricing and available stock here.</p>-->
					    </div>
					  </div></a>
					</div>
				</div>

				<div class="hover-tile-outer" style="background-image: url(' . $bottom_right_column_category_image . ');">
				  <a href="' . $bottom_right_column_category_link . '"><div class="hover-tile-container">
				  	<h3 class="hide-title-on-hover" id="bottom-right-title">' . $bottom_right_column_category_title . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $bottom_right_column_category_title . '</h3>
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

	$box_1_image_background = get_field( 'box_1_image_background' );
	$box_1_icon             = get_field( 'box_1_icon' );
	$box_1_title            = get_field( 'box_1_title' );
	$box_1_text_area        = get_field( 'box_1_text_area' );
	$box_1_link             = get_field( 'box_1_link' );
	$box_2_image_background = get_field( 'box_2_image_background' );
	$box_2_icon             = get_field( 'box_2_icon' );
	$box_2_title            = get_field( 'box_2_title' );
	$box_2_text_area        = get_field( 'box_2_text_area' );
	$box_2_link             = get_field( 'box_2_link' );
	$box_3_image_background = get_field( 'box_3_image_background' );
	$box_3_icon             = get_field( 'box_3_icon' );
	$box_3_title            = get_field( 'box_3_title' );
	$box_3_text_area        = get_field( 'box_3_text_area' );
	$box_3_link             = get_field( 'box_3_link' );
	$box_4_image_background = get_field( 'box_4_image_background' );
	$box_4_icon             = get_field( 'box_4_icon' );
	$box_4_title            = get_field( 'box_4_title' );
	$box_4_text_area        = get_field( 'box_4_text_area' );
	$box_4_link             = get_field( 'box_4_link' );


	echo '<div class="top-main-page-container" id="trade-discount-section">


					<a class="main-page-col-quarter" href="' . $box_1_link . '">
						<div class="discount-section" id="discount-section-1" style="background-image: url(' . $box_1_image_background . ');">
							<!--<span class="fa ' . $box_1_icon . '"></span>-->
							<h4>' . $box_1_title . '</h4>
							<p>' . $box_1_text_area . '</p>
						</div>
					</a>

					<a class="main-page-col-quarter" href="' . $box_2_link . '">
					<div class="discount-section" id="discount-section-2" style="background-image: url(' . $box_2_image_background . ');">
					<!--<span class="fa ' . $box_2_icon . '"></span>-->
					<h4>' . $box_2_title . '</h4>
					<p>' . $box_2_text_area . '</p>
					</div>
					</a>

					<a class="main-page-col-quarter" href="' . $box_3_link . '">
					<div class="discount-section" id="discount-section-3" style="background-image: url(' . $box_3_image_background . ');">
					<!--<span class="fa ' . $box_3_icon . '"></span>-->
					<h4>' . $box_3_title . '</h4>
					<p>' . $box_3_text_area . '</p>
					</div>
					</a>
					
					<a class="main-page-col-quarter" href="' . $box_4_link . '">
					<div class="discount-section" id="discount-section-1" style="background-image: url(' . $box_4_image_background . ');">
						<!--<span class="fa ' . $box_4_icon . '"></span>-->
					<h4>' . $box_4_title . '</h4>
					<p>' . $box_4_text_area . '</p>
					</div>
					</a>

		  </div>';
}

function mobile_only_add_subheader_to_main_page() {
	$hovertext1 = genesis_get_option( 'wsm_subheader_hovertext1', 'jessica-settings' );
	$image1     = esc_url( genesis_get_option( 'wsm_subheader_image1', 'jessica-settings' ) );
	$link1      = genesis_get_option( 'wsm_subheader_link1', 'jessica-settings' );
	$hovertext2 = genesis_get_option( 'wsm_subheader_hovertext2', 'jessica-settings' );
	$image2     = genesis_get_option( 'wsm_subheader_image2', 'jessica-settings' );
	$link2      = genesis_get_option( 'wsm_subheader_link2', 'jessica-settings' );
	$hovertext3 = genesis_get_option( 'wsm_subheader_hovertext3', 'jessica-settings' );
	$image3     = genesis_get_option( 'wsm_subheader_image3', 'jessica-settings' );
	$link3      = genesis_get_option( 'wsm_subheader_link3', 'jessica-settings' );


	echo '<div class="subheader-area mobile-only">';

	echo '<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(' . $image1 . ');">
				  <a href="' . $link1 . '">
				  <div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover">' . $hovertext1 . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $hovertext1 . '</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>';
	echo '<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(' . $image2 . ');">
				  <a href="' . $link2 . '"><div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover">' . $hovertext2 . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $hovertext2 . '</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>';
	echo '<div class="hover-tile-outer mainpage-hover-tile-top" style="background-image: url(' . $image3 . ');">
				  <a href="' . $link3 . '"><div class="hover-tile-container">
				  		<h3 class="hide-title-on-hover">' . $hovertext3 . '</h3>
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h3 class="white-category-title-text">' . $hovertext3 . '</h3>
				      <!--<p>See our special pricing and available stock here.</p>-->
				    </div>
				  </div></a>
				</div>';

	echo '</div>';

}

//Main Page Ornamental Stone Products Section

function main_page_ornamental_stone_products_section() {

	$category_1_image_oss     = get_field( 'category_1_image_oss' );
	$category_1_title_oss     = get_field( 'category_1_title_oss' );
	$category_1_text_area_oss = get_field( 'category_1_text_area_oss' );
	$category_1_link_oss      = get_field( 'category_1_link_oss' );

	$category_2_image_oss     = get_field( 'category_2_image_oss' );
	$category_2_title_oss     = get_field( 'category_2_title_oss' );
	$category_2_text_area_oss = get_field( 'category_2_text_area_oss' );
	$category_2_link_oss      = get_field( 'category_2_link_oss' );

	$category_3_image_oss     = get_field( 'category_3_image_oss' );
	$category_3_title_oss     = get_field( 'category_3_title_oss' );
	$category_3_text_area_oss = get_field( 'category_3_text_area_oss' );
	$category_3_link_oss      = get_field( 'category_3_link_oss' );

	$category_4_image_oss     = get_field( 'category_4_image_oss' );
	$category_4_title_oss     = get_field( 'category_4_title_oss' );
	$category_4_text_area_oss = get_field( 'category_4_text_area_oss' );
	$category_4_link_oss      = get_field( 'category_4_link_oss' );


	echo '<div class="top-main-page-container top-border-homepage-sections">

				<div class="main-page-container-heading">
					<h4>Ornamental Stone Products</h4>
				</div>

			<div class="main-page-col-quarter">
				<a href="'.$category_1_link_oss.'"><img class="category-images-homepage" src="'.$category_1_image_oss.'"/></a>
				<h4>'.$category_1_title_oss.'</h4>
				<span>'.$category_1_text_area_oss.'</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="'.$category_2_link_oss.'"><img class="category-images-homepage" src="'.$category_2_image_oss.'"/></a>
				<h4>'.$category_2_title_oss.'</h4>
				<span>'.$category_2_text_area_oss.'</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="'.$category_3_link_oss.'"><img class="category-images-homepage" src="'.$category_3_image_oss.'"/></a>
				<h4>'.$category_3_title_oss.'</h4>
				<span>'.$category_3_text_area_oss.'</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="'.$category_4_link_oss.'"><img class="category-images-homepage" src="'.$category_4_image_oss.'"/></a>
				<h4>'.$category_4_title_oss.'</h4>
				<span>'.$category_4_text_area_oss.'</span>

			</div>

		  </div>';

	$box_1_image_background_ss = get_field( 'box_1_image_background_ss' );
	$box_1_icon_ss             = get_field( 'box_1_icon_ss' );
	$box_1_title_ss            = get_field( 'box_1_title_ss' );
	$box_1_text_area_ss        = get_field( 'box_1_text_area_ss' );
	$box_1_link_ss             = get_field( 'box_1_link_ss' );
	$box_2_image_background_ss = get_field( 'box_2_image_background_ss' );
	$box_2_icon_ss             = get_field( 'box_2_icon_ss' );
	$box_2_title_ss            = get_field( 'box_2_title_ss' );
	$box_2_text_area_ss        = get_field( 'box_2_text_area_ss' );
	$box_2_link_ss             = get_field( 'box_2_link_ss' );
	$box_3_image_background_ss = get_field( 'box_3_image_background_ss' );
	$box_3_icon_ss             = get_field( 'box_3_icon_ss' );
	$box_3_title_ss            = get_field( 'box_3_title_ss' );
	$box_3_text_area_ss        = get_field( 'box_3_text_area_ss' );
	$box_3_link_ss             = get_field( 'box_3_link_ss' );


	echo '<div class="top-main-page-container" id="shipping-section">

			<a class="main-page-col-third" href="' . $box_1_link_ss . '">
			<div class="shipping-section" style="background-image: url(' . $box_1_image_background_ss . ');">
				<!--<span class="fa ' . $box_1_icon_ss . '"></span>-->
				<h4>' . $box_1_title_ss . '</h4>
				<p>' . $box_1_text_area_ss . '</p>

			</div>
			</a>

			<a class="main-page-col-third" href="' . $box_2_link_ss . '">
			<div class="shipping-section" style="background-image: url(' . $box_2_image_background_ss . ');">
				<!--<span class="fa ' . $box_2_icon_ss . '"></span>-->
				<h4>' . $box_2_title_ss . '</h4>
				<p>' . $box_2_text_area_ss . '</p>

			</div>
			</a>

			<a class="main-page-col-third" href="' . $box_3_link_ss . '">
			<div class="shipping-section" style="background-image: url(' . $box_3_image_background_ss . ');">
				<!--<span class="fa ' . $box_3_icon_ss . '"></span>-->
				<h4>' . $box_3_title_ss . '</h4>
				<p>' . $box_3_text_area_ss . '</p>

			</div>
			</a>

		  </div>';
}


//Main Page Home Design and Decor Section

function main_page_home_design_and_decor_section() {

	$category_1_image_hdd     = get_field( 'category_1_image_hdd' );
	$category_1_title_hdd     = get_field( 'category_1_title_hdd' );
	$category_1_text_area_hdd = get_field( 'category_1_text_area_hdd' );
	$category_1_link_hdd      = get_field( 'category_1_link_hdd' );

	$category_2_image_hdd     = get_field( 'category_2_image_hdd' );
	$category_2_title_hdd     = get_field( 'category_2_title_hdd' );
	$category_2_text_area_hdd = get_field( 'category_2_text_area_hdd' );
	$category_2_link_hdd      = get_field( 'category_2_link_hdd' );

	$category_3_image_hdd     = get_field( 'category_3_image_hdd' );
	$category_3_title_hdd     = get_field( 'category_3_title_hdd' );
	$category_3_text_area_hdd = get_field( 'category_3_text_area_hdd' );
	$category_3_link_hdd      = get_field( 'category_3_link_hdd' );

	$category_4_image_hdd     = get_field( 'category_4_image_hdd' );
	$category_4_title_hdd     = get_field( 'category_4_title_hdd' );
	$category_4_text_area_hdd = get_field( 'category_4_text_area_hdd' );
	$category_4_link_hdd      = get_field( 'category_4_link_hdd' );


	echo '<div class="top-main-page-container top-border-homepage-sections" id="home-design-decor-section">

				<div class="main-page-container-heading">
					<h4>Home Design and Decor</h4>
				</div>

			<div class="main-page-col-quarter">
				<a href="'.$category_1_link_hdd.'"><img class="category-images-homepage" src="'.$category_1_image_hdd.'"/></a>
				<h4>'.$category_1_title_hdd.'</h4>
				<span>'.$category_1_text_area_hdd.'</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="'.$category_2_link_hdd.'"><img class="category-images-homepage" src="'.$category_2_image_hdd.'"/></a>
				<h4>'.$category_2_title_hdd.'</h4>
				<span>'.$category_2_text_area_hdd.'</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="'.$category_3_link_hdd.'"><img class="category-images-homepage" src="'.$category_3_image_hdd.'"/></a>
				<h4>'.$category_3_title_hdd.'</h4>
				<span>'.$category_3_text_area_hdd.'</span>

			</div>
			<div class="main-page-col-quarter">
				<a href="'.$category_4_link_hdd.'"><img class="category-images-homepage" src="'.$category_4_image_hdd.'"/></a>
				<h4>'.$category_4_title_hdd.'</h4>
				<span>'.$category_4_text_area_hdd.'</span>

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