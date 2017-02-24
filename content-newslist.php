<div class="vc_row" style="padding: 0px;">
	<div class="container">
		<div class="vc_col-sm-9 news-list-item">
				<a href="<?php the_permalink(); ?>">
                	<h4><?php echo the_title();?></h4>
            	</a>
				<h5>
	            <?php echo the_field("event_date"); ?>
	            <span class="not_news" style="font-size: 20pt !important;font-family: 'FranklinGothicStd-ExtraCond', Arial, sans-serif !important;font-weight: 100;"><?php echo the_time('F j, Y'); ?>
	            	
	            </span>
	        <span class="location_bar">|</span> <?php echo the_field( "event_location" ); echo the_field( "company_name" ); ?></h5>
		</div>
		<div class="vc_col-sm-3">
        <!-- Fill Space -->
		</div>
		<div class="vc_col-sm-9 news-list-item">
			<p><?php $excerpt= get_the_excerpt(); echo substr($excerpt, 0, 1000);?></p>
		</div>
				
		<div class="vc_col-sm-3">
			<div class="news-read-more">
				<a href="<?php the_permalink(); ?>" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-green">
                    <span>Read More</span>
                </a>
			</div>
		</div>
	</div>	
</div> 