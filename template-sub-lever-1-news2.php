<?php
/**
 * Template Name: Sub Level 1 - News 2
 *
 * @package Betheme
 * @author Princeton Partners
 */

get_header('choose'); ?>

<link rel="stylesheet" href="http://www.choosenj.com/wp-content/themes/ChooseNJ/css/news-filter-style.css">

<style>
.news_post1:nth-child(2n){
	background: #EEEEEE;
}
.new-filter-dropdown-trigger {
  display: block;
  position: relative;
  padding: 10px 35px 10px 20px;
  line-height: 40px;
  background-color: #adafaf;
  color: #ffffff !important;
  font-family: 'franklin_gothic_fscompressed', Arial, sans-serif !important;
}
.new-filter-dropdown-content {
    background-color: #d3d3d3;
}
.new-filter-dropdown-content button {
    font-family: 'franklin_gothic_fscompressed', Arial, sans-serif !important;
    font-size: 14pt;
    display: inline-block;
    text-align: center;
    padding: 2px 20px;
    margin-bottom: 0px;
    margin-right: 0px;
    width: 100%;
    border: 0;
    -webkit-border-radius: 5px;
    border-radius: 0px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    color: #0078AE;
    background-color: #d3d3d3;
    background-image: url('http://www.choosenj.com/wp-content/themes/ChooseNJ/images/box_no_shadow_button.png');
    -webkit-box-shadow: inset 0 0 0 1px #d3d3d3;
	box-shadow: inset 0 0 0 1px #d3d3d3;
}
.new-filter-dropdown-content button:hover {
	color: #fff;
}
.new-filter-dropdown-content button:after {
	background: none !important;
}
.basic-panel-inner1 .vc_column_container>.vc_column-inner {
    box-sizing: border-box;
    padding-left: 0px;
    padding-right: 0px;
    width: 100%;
}
</style>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- Main Content -->
		<div class="sections_group">
			<div class="entry-content" itemprop="mainContentOfPage">
				
				<!-- .Filter -->
				<div class="vc_row" style="padding: 0px;">
					<div class="container filter-container">
						<!-- .Filter Heading -->
						<div class="filter-heading"><h4>Filter</h4></div>

						<!-- Months -->
						<div class="new-filter-dropdown-wrapper filters">
							<a class="new-filter-dropdown-trigger" style="padding: 10px 36px 10px 20px;" href="#0">MONTH</a>
							<nav class="new-filter-dropdown">
								<!-- <a href="#" class="cd-close">Close</a> -->
								<ul class="new-filter-dropdown-content alm-filter-nav" data-filter-group="month">
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="default">Show All</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="1">January</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="2">February</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="3">March</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="4">April</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="5">May</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="6">June</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="7">July</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="8">August</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="9">September</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="10">October</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="11">November</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-month="12">December</button></li>
								</ul>
							</nav>
						</div>

						<!-- Years -->
						<div class="new-filter-dropdown-wrapper alm-filter-nav">
							<a class="new-filter-dropdown-trigger" style="padding: 10px 36px;" href="#0">YEAR</a>
							<nav class="new-filter-dropdown">
								<!-- <a href="#" class="cd-close">Close</a> -->
								<ul class="new-filter-dropdown-content" data-filter-group="year">
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-year="default">Show All</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-year="2015">2015</button></li>
									<li><button href="#" data-repeater="default" data-post-type="post" data-posts-per-page="4" data-year="2016">2016</button></li>
								</ul>
							</nav>
						</div>

						<!-- /.Filter Heading -->
					</div>
				</div>
                <!-- /.Filter -->
			</div>

			<!-- Sub-level 1 News Items-->
			<div class="basic-panel1">
				<div class="basic-panel-inner1 isoContainer" style="overflow:hidden;">
					<?php the_content(); ?>
				</div>
			</div>

			<!-- Contact Section-->
			<?php get_template_part('contact-us') ?>

		<!-- /.Main Content -->
		</div>


	</div>
</div>

<script type="text/javascript">

// Fade In Content
jQuery('body').hide().fadeIn(500);

// ALM Filtering
jQuery(window).load(function(){
	var alm_is_animating = false;
	jQuery('.alm-filter-nav li').eq(0).addClass('active');

	// Filter Ajax Load More
   	var alm_is_animating = false;
   	jQuery('.alm-filter-nav li').eq(0).addClass('active'); // Set the initial button active state
   
   	// Nav btn click event
   	jQuery('.alm-filter-nav li button').on('click', function(e){    
      	e.preventDefault();  
      	var el = jQuery(this); // Our selected element     
      
      	if(!el.hasClass('active') && !alm_is_animating){ // Check for active and !alm_is_animating  
         	alm_is_animating = true;   
         	el.parent().addClass('active').siblings('li').removeClass('active'); // Add active state       
      
         	var data = el.data(), // Get data values from selected menu item
             	transition = 'fade', // 'slide' | 'fade' | null
             	speed = '300'; //in milliseconds
             
         	jQuery.fn.almFilter(transition, speed, data); // reset Ajax Load More (transition, speed, data)     
      	}      
   	});
   
   	jQuery.fn.almFilterComplete = function(){      
      	alm_is_animating = false; // clear alm_isanimating flag
   	};
});

// Filter Dropdown
jQuery(document).ready(function(){
	//open/close mega-navigation
	jQuery('.new-filter-dropdown-trigger').on('click', function(event){
		
		var $nav = jQuery(this.parentNode.childNodes[3]);
		var $link = jQuery(this.parentNode.childNodes[1]);
		
		event.preventDefault();
		toggleNav($nav, $link);
	});

	//close mega navigation
	jQuery('.new-filter-dropdown .cd-close').on('click', function(event){
		event.preventDefault();
		toggleNav();
	});

	function toggleNav(nav, link){
		var navIsVisible = ( !nav.hasClass('dropdown-is-active') ) ? true : false;
		nav.toggleClass('dropdown-is-active', navIsVisible);
		link.toggleClass('dropdown-is-active', navIsVisible);
		if( !navIsVisible ) {
			nav.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
				jQuery('.has-children ul').addClass('is-hidden');
				jQuery('.move-out').removeClass('move-out');
				jQuery('.is-active').removeClass('is-active');
			});
		}
	}
});

</script>

<?php get_footer('choose'); ?>
