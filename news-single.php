<div class="container">
	<div class="the_content_wrapper">
		<h4>
			<?php
				$news_date = get_field('news_date');
				if (null != $news_date){
					//$news_date = explode(',', get_field('news_date'));
					$news_date = get_field('news_date');
				}else{
					//$news_date = explode(',', get_the_time('F jS, Y'));
					$news_date = get_the_time('F j, Y');
				}
				echo $news_date;
				// $predate = substr($news_date[0], 0, -2);
				// $suffix = substr($news_date[0], -2);
				// echo $predate . "<span class='news_date_suffix'>" . $suffix."</span>, ".$news_date[1];
			?>
		</h4>

		<h5>
			<?php $author_name = get_field('article_author');?>
			<?php if (null != $author_name){
				echo $author_name;
				echo " | ";
			} ?>
			<?php echo the_field( "company_name" ); ?>
		</h5>
	</div>
</div>

<?php
	while ( have_posts() ){
		the_post();							// Post Loop
		mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
	}
?>
