<?php
/**
 * Template Name: Sub Level 1 - News
 *
 * @package Betheme
 * @author Princeton Partners
 */

get_header('choose'); ?>
<style>
	.news_post1:nth-child(2n){
		background: #EEEEEE;
	}
</style>

<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- Main Content -->
		<div class="sections_group">
			<div class="entry-content" itemprop="mainContentOfPage">
				<!-- Main Content -->
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

</script>

<?php get_footer('choose'); ?>
