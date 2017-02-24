<?php
/**
 * Template Name: Sub Level 1
 *
 * @package Betheme
 * @author Princeton Partners
 */

get_header('choose');

// prev & next post -------------------
$in_same_term = ( mfn_opts_get( 'prev-next-nav' ) == 'same-category' ) ? true : false;
$post_prev = get_adjacent_post( $in_same_term, '', true );
$post_next = get_adjacent_post( $in_same_term, '', false );
$blog_page_id = get_option('page_for_posts');
?>

<!-- #Content -->
<?php
    // News Single page
    if ( in_category( 6 ) ) { ?>
      <div id="Content" style="padding-top:50px;">
    <?php } elseif ( in_category( 20 ) ) { ?>
      <div id="Content" style="padding-top:50px;">
    <?php } else { ?>
      <div id="Content">
<?php } ?>
  <div class="content_wrapper clearfix">

    <!-- Main Content -->
    <div class="sections_group">
      <div class="entry-content" itemprop="mainContentOfPage">
        
        <!-- Main Content -->
        <?php
          // News Single page
          if ( in_category( 6 ) ) {
            echo get_template_part('news-single');
          } elseif ( in_category( 20 ) ) {
            echo get_template_part('news-single');
          } else {
              while ( have_posts() ){
              the_post();             // Post Loop
              mfn_builder_print( get_the_ID() );  // Content Builder & WordPress Editor Content
            }
          }
         if ( in_category( 1 ) ) {
             echo "<style>.prev a, .next a{color: #fff !important;}</style>";
             }
        ?>

                        <div class="container">
                  <div class="the_content_wrapper">
                    <div style="/*width:275px;*/max-width: 1200px;margin-left: auto;margin-right: auto;" align="left" class="newsharebuttoncontainer">
                      <div style="width: 100%;max-width: 280px;">
                        <?php
                          // Share Button
                            if ( in_category( 6 ) ) { ?>
                          <div class="share-button" style="width: auto !important; height: auto !important;"></div>
                            <?php } else { ?>
                            <div></div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
      </div>

      <!-- Next/previous -->
      <div class="fluid-centered container">
          <div class="post-nav">
              <?php previous_post_link('<span class="next">%link</span>', 'Older', TRUE); ?>
              <?php next_post_link( '<span class="prev">%link</span>', 'Newer', TRUE ); ?>
          </div>
      </div>

      <!-- Contact Section-->
      <?php get_template_part('contact-us') ?>

    <!-- /.Main Content -->
    </div>


  </div>
</div>

<script>
   window.fbAsyncInit = function() {
     FB.init({
       appId      : '602752456409826',
       xfbml      : true,
       version    : 'v2.6'
     });
   };

   (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
 </script>

<script type="text/javascript">
// Share Button
<?php
    $thumb_id = get_post_thumbnail_id();
    $img_style = wp_get_attachment_image_src($thumb_id, "full", false)[0];
?>
jQuery(window).load(function(){
  jQuery('.share-button').share({
      title: '<?php echo urlencode(get_the_title()); ?>',
      image: '<?php echo $img_style; ?>',
            facebook: {
                caption: "<?php echo urlencode(get_the_title()); ?>",
                text: "<?php echo urlencode(get_the_excerpt()); ?>",
            },
            twitter: {
                text: "<?php //echo get_the_title(); ?>",
            },
         app_id: '602752456409826',
      });
    });
</script>

<?php get_footer('choose'); ?>
