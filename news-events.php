<div id="news-container">
	<div class="news-headline"><h1><a href="http://www.choosenj.com/media/">News &amp; Events</a></h1></div>
	<div id="news-container2" align="center">
	    <?php
			for ($i=56; $i < 59; $i++) {
				$args 		= array(
						'posts_per_page' => 1,
						'post_type' => 'post',
						'category__in' => array($i)
				);
				$news_query = new WP_Query( $args );

				// The Loop
				if ( $news_query->have_posts() ) {
					while ( $news_query->have_posts() ) : $news_query->the_post();

						echo get_template_part( 'content', 'newstile' );

					endwhile;
				} else {
					// no posts found
					echo "<h1 style='text-align:center;'>something went wrong!</h1>";
				}
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		// End Loop
		?>
	</div>
</div>
