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
	echo '<div class="top-main-page-container">


			<div class="main-page-col-third" id="mainpage-top-left">
				<div class="hover-tile-outer mainpage-hover-tile-top">
				  <div class="hover-tile-container">
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h4>Hidden Copy</h4>
				      <p>Lorem ipsum dolor provident eligendi fugiat ad exercitationem sit amet, consectetur adipisicing elit. Unde, provident eligendi.</p>
				    </div>
				  </div>
				</div>

				<div class="hover-tile-outer">
				  <div class="hover-tile-container">
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h4>Hidden Copy</h4>
				      <p>Lorem ipsum dolor provident eligendi fugiat ad exercitationem sit amet, consectetur adipisicing elit. Unde, provident eligendi.</p>
				    </div>
				  </div>
				</div>


			</div>
			<div class="main-page-col-third">


			</div>
			<div class="main-page-col-third" id="mainpage-top-right">
				<div class="hover-tile-outer mainpage-hover-tile-top">
				  <div class="hover-tile-container">
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h4>Hidden Copy</h4>
				      <p>Lorem ipsum dolor provident eligendi fugiat ad exercitationem sit amet, consectetur adipisicing elit. Unde, provident eligendi.</p>
				    </div>
				  </div>
				</div>

				<div class="hover-tile-outer">
				  <div class="hover-tile-container">
				    <div class="hover-tile hover-tile-visible"></div>
				    <div class="hover-tile hover-tile-hidden">
				      <h4>Hidden Copy</h4>
				      <p>Lorem ipsum dolor provident eligendi fugiat ad exercitationem sit amet, consectetur adipisicing elit. Unde, provident eligendi.</p>
				    </div>
				  </div>
				</div>

			</div>
		  </div>';
}


//Main Page Trade Discount Section

function main_page_trade_discount_section() {
	echo '<div class="top-main-page-container">
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
		  </div>';
}


//Main Page Ornamental Stone Products Section

function main_page_ornamental_stone_products_section() {
	echo '<div class="top-main-page-container">

				<div class="main-page-container-heading">
					<h4>// Ornamental Stone Products //</h4>
				</div>

			<div class="main-page-col-third">


			</div>
			<div class="main-page-col-third">


			</div>
			<div class="main-page-col-third">


			</div>
		  </div>';

	echo '<div class="top-main-page-container">
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
		  </div>';
}


//Main Page Home Design and Decor Section

function main_page_home_design_and_decor_section() {
	echo '<div class="top-main-page-container">

				<div class="main-page-container-heading">
					<h4>// Home Design and Decor //</h4>
				</div>

			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
			<div class="main-page-col-quarter">


			</div>
		  </div>';
}


//Main Page Featured Project Galleries Section

function main_page_featured_project_galleries_section() {
	echo '<div class="top-main-page-container">

				<div class="main-page-container-heading">
					<h4>// Featured Project Galleries //</h4>
				</div>

			<div class="main-page-col-third">


			</div>
			<div class="main-page-col-third">


			</div>
			<div class="main-page-col-third">


			</div>
		  </div>';
}


//Main Page Blog Post and Testimonials Section

function main_page_blog_post_and_testimonials_section() {
	echo '<div class="top-main-page-container">

				<div class="main-page-container-heading">
					<h4>// Blog Post and Testimonials //</h4>
				</div>

			<div class="main-page-col-two-thirds">


			</div>
			<div class="main-page-col-third">


			</div>
		  </div>';
}


genesis();