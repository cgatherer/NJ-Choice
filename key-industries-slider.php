<style>
ul.slides > li:nth-child(-n+3) {
	background-position-x: -200px;
}
</style>
<div class="slider">
	<div class="flexslider">
		<ul class="slides">

			<?php
				$args = array(
						'posts_per_page' => 8,
						'post_type' => 'page',
						'category__in' => array(3),
						'post__not_in' => array(11),
						//'orderby'   => 'menu_order',
					 	'order' => "ASC");

				$query = new WP_Query($args); ?>
	 				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

						<li style="background-image: url('<?php echo the_post_thumbnail_url('large'); ?>'); background-size: cover;overflow:hidden;height:400px;">
							<a href="<?php the_permalink(); ?>">
								<?php //the_post_thumbnail( 'large','style=height:400px;');?>
									<h4 class="flex-caption">
										<?php echo the_title();?>
									</h4>
							</a>
						</li>

		 			<?php endwhile;
		 				wp_reset_postdata();
		 			else : ?>
		 				<p><?php _e( 'Sorry, something went wrong!' ); ?></p>
		 			<?php endif; ?>

		</ul>
	</div>
</div>
