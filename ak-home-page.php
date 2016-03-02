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
			<div class="main-page-col-third">
			<h3>Trade Discount 10% OFF</h3>
			<p>we offer a trade discount to architects, designers, builders, and other trade customers.</p>
			<p>Multi item discount available.</p>


			</div>
			<div class="main-page-col-two-thirds">

				<div class="main-page-col-third">
				<h4>SPEC US</h4>
				<p>SPEC US ON YOUR NEXT PROJECT! ARTISAN KRAFT OFFERS FIREPLAC</p>
				<button>VIEW INSIDE</button>

				</div>
				<div class="main-page-col-third">
				<h4>TECHNICAL DATA</h4>
				<p>INSTALLATION INSTALLATION INSTRUCTIONS ARE AVAILABLE</p>
				<button>INSIDE</button>

				</div>
				<div class="main-page-col-third">
				<h4>MATERIALS</h4>
				<p>MARBLE MARBLE EXUDES THE ULTIMATE TOUCH OF SOPHISTIC</p>
				<button>INSIDE</button>

				</div>

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