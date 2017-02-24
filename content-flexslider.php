<a href="<?php the_permalink(); ?>">
	<li style="background-image: url('<?php echo the_post_thumbnail_url('large'); ?>'); width:100%;"> 
		<?php	
			echo "<h4 class='flex-caption'>";
				echo the_title();
			echo "</h4>";
		?>					
	</div>
</a>
