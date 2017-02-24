<div id="ambassador-container" style="padding-bottom:40px;">
	<div class="ambassador-headline"><h1><a href="http://www.choosenj.com/about-us/board-and-supporters/">Ambassador-Level supporters</a></h1></div>
	<div id="ambassador-container2">
	    <?php
			$args = array(
				'posts_per_page' => 16,
				'post_type' => 'ambassador_logo',
				'category__in' => array(7),
				'orderby' => 'title',
				'order'   => 'ASC'
			);
			$amb_logo_query = new WP_Query( $args );

					// The Loop
					if ( $amb_logo_query->have_posts() ) {
						while ( $amb_logo_query->have_posts() ): $amb_logo_query->the_post();

							echo "<div class='wpb_column vc_column_container vc_col-sm-3 vc_col-xs-6'>";
								echo the_content();
							echo "</div>";

						endwhile;
					} else {
					// no posts found
							echo "<h1 style='text-align:center;'>something went wrong!</h1>";
					}
				/* Restore original Post Data */
			wp_reset_postdata();
			//End Loop
		?>
	</div>
</div>
