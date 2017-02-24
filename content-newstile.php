<div class="vc_col-lg-4 vc_col-md-4 vc_col-sm-4 vc_col-xs-12 grid-item <?php the_ID(); ?>" align="center">
	<div class="news-social">
		<?php
			echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.urlencode(get_the_permalink()).'" class="cnj-facebook" target="_blank"></a>';
			echo '<a href="http://twitter.com/intent/tweet?text='.urlencode(get_the_title()).'" class="cnj-twitter" target="_blank"></a>';
		?>
	</div>
	<?php
		$alt_title = get_field('title');
		$alt_link = get_field('link');
			if (null != $alt_link) {
				echo '<a href="'.$alt_link.'">';
			}else{
				echo '<a href="'.get_the_permalink().'">';
			}
		?>
		
		<?php if ( has_post_thumbnail() ){ ?>
			
			<div class="news-tile-content" style="background-image: url('<?php echo the_post_thumbnail_url('large'); ?>'); background-size: cover;">
				<div class="content-animation">
					<h4>
						<?php
							if (null != $alt_title) {
								echo $alt_title;
							} else {
								echo the_title($before = '', $after = '', FALSE);
							}
						?>
					</h4>
				</div>
			</div>

		<?php } else { ?>
			
			<div class="news-tile-content" style="background-image:url('http://www.choosenj.com/wp-content/uploads/News_Default_iStock_000071781771.png'); background-size: cover;">
				<div class="content-animation">
					<h4>
						<?php
							if (null != $alt_title) {
								echo $alt_title;
							} else {
								echo the_title($before = '', $after = '', FALSE);
							}
						?>
					</h4>
				</div>
			</div>
			
		<?php } ?>
		
	<?php echo '</a>'; ?>
</div>
