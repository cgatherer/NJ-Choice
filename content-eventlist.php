<div class="vc_row" style="padding: 0px;">
	<div class="container">
		<div class="vc_col-sm-12 news-list-item">
			<h4><?php echo the_title();?></h4>
			<h5><?php echo the_time('F jS, Y');?> | <?php echo the_field( "event_location" ); ?></h5>
		</div>
		<div class="vc_col-sm-9 news-list-item">
			<p><?php $excerpt= get_the_excerpt(); echo substr($excerpt, 0, 1000);?></p>
		</div>
			
		<div class="vc_col-sm-3">
			<div class="news-read-more">
				<a href="<?php the_permalink(); ?>" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-green"><span>Read More</span></a>
			</div>
		</div>
	</div>	
</div>