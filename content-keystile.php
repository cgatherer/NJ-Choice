<div class="vc_col-lg-4 vc_col-md-4 vc_col-sm-12 vc_col-xs-12 grid-item <?php the_ID(); ?>" style="/*max-width: 325px; margin-right: 12px;*/" align="center">
	<?php if (get_the_ID() === 56 || get_the_ID() === 58): // Compose Anchor Link for Fortune 500 and Largest State Employers ?>
		<?php
		$link = get_permalink(64); // Get Link of New Jersey Profile
		$anchor = basename(get_permalink()); // Get slug of post
		?>
		<a href="<?php echo $link."/#".$anchor; // Create anchor link ?>">
	<?php else: ?>
		<a href="<?php the_permalink(); ?>">
	<?php endif; ?>
		<div class="tile-content" style="background-image: url('<?php echo the_post_thumbnail_url('large'); ?>'); background-size: cover;">
			<?php
					echo "<h5>";
						echo the_title();
					echo "</h5>";
			?>
		</div>
	</a>
</div>
