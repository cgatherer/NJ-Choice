<?php
/**
 * Template Name: Counties
 *
 * @package Betheme
 * @author Princeton Partners
 */

get_header('choose'); ?>
<div id="pdfLoadinggif" style="position:fixed;top:0;bottom:0;left:0;right:0;z-index:500;background-color:#fff;text-align:center;display:none;">
	<img src="http://staging.choosenj.com/wp-content/plugins/ajax-load-more/core/img/spinner-chasing-arrows.gif" style="margin:auto;padding-top:calc(50vh - 32px + 70px);">
</div>
<!-- #Content -->
<div id="Content">
	<div class="content_wrapper clearfix">

		<!-- .Main Content -->
		<div class="sections_group">

			<div class="entry-content" itemprop="mainContentOfPage">

				<div style="margin: 10px 0;"><a id="create_pdf" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-green" style="margin:0 20px;cursor:pointer;color:#fff;font-family: 'FranklinGothicStd-ExtraCond', Arial, sans-serif !important;text-transform: uppercase !important;">Create PDF</a>	</div>

				<?php
					while ( have_posts() ){
						the_post();							// Post Loop
						mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
					}
				?>
			</div>

			<!-- Contact Section-->
			<?php wp_reset_postdata(); ?>
			<?php get_template_part('contact-us') ?>

		</div>

	</div>
</div>

<script type="text/javascript">
	// Magnific Popup

	jQuery(window).load(function(){
		jQuery('.popup-modal').magnificPopup({
			type: 'inline',
			preloader: false,
			focus: '#username',
			modal: true,
		});

	jQuery(document).on('click', '.popup-modal-dismiss', function (e) {
			e.preventDefault();
			jQuery('.popup-modal-dismiss').magnificPopup('close');
		});

});

</script>

<script type="text/javascript">

jQuery(window).load(function(){

	var
	form = jQuery('#Content > .content_wrapper'),
	canvases = jQuery("canvas"),
	tables = jQuery(".no_pad_table"),
	title = jQuery("#Header > h1").clone(),
	sections = jQuery('.the_content_wrapper > .vc_row');
	// remove section margins
	sections.addClass('no-margin');

	jQuery('#create_pdf').on('click',function(){
		// Display pdf loading overlay
		document.getElementById('pdfLoadinggif').style.display = "block";
		// Resize content if neccessary
		if (window.innerWidth > 1200){
			jQuery('#Content').width(1200);
		}
		// Scroll page and add classes to make all animated elements appear
		jQuery('body').scrollTop(jQuery("body").height());
		window.setTimeout(function(){
			jQuery('body').scrollTop(jQuery("#Header_wrapper").height() - jQuery("#Top_bar").height());
			// Remove canvases and center other elements
			canvases.parent().css("display","none");
			jQuery('a#create_pdf').parent().css("display","none");
			title.css("padding","20px");
			title.css("text-align","center");
			title.prependTo("#Content > .content_wrapper");
			tables.addClass("vc_col-lg-6").addClass("vc_col-lg-offset-3");
			jQuery(".inline_table").addClass("no_pad_table");
		},100);
		jQuery(".wpb_animate_when_almost_visible").addClass("wpb_start_animation");
		// Initate PDF creation
		window.setTimeout(createPDF,2000);
	});

	//create pdf
	function createPDF(){
	 	getCanvas().then(function(canvas){

			// create image dimenstions
			// canvas.width = (1200 * 5);
			// canvas.height = (4310 * 5);
			// var context = canvas.getContext('2d');
            // context.scale(5, 5);
		  	var img = canvas.toDataURL("image/png");
		  	var imgWidth = 210;
		  	var pageHeight = 297;
			var ratio = imgWidth / canvas.width;
		  	var imgHeight = canvas.height * ratio;
		  	var heightLeft = imgHeight;

			// create pdf and initialize measurement variables
		  	var doc = new jsPDF('p', 'mm');
		  	var position = 0;
			var sectionHeight = 0 + ((title.height() + 40) * ratio);
			var sectionNumber = 0;
			var pagecut = 0;
			var pagecount = 1;
			var cutHeight = 0;
			var prevPosition = 0;

		  	while (heightLeft>=pageHeight) {
				// Current page starts at the position before adding sections
				prevPosition = position;
				// Add section heights while total section height is less than the
				// image height of the start of the next page
				while ((position + pageHeight) > sectionHeight && sectionNumber < sections.length){
					// make sure section height is resized from pizels to millimeters
					sectionHeight = sectionHeight + (sections[sectionNumber].clientHeight * ratio);
					// account for margin of first section
						// if (sectionNumber == 0){
						// 	sectionHeight = sectionHeight + (100 * ratio);
						// }
					sectionNumber++;
				}
				// Remove the last section so the next page stars at the split section
				// at the end of the page
				sectionNumber--;
				position = sectionHeight - (sections[sectionNumber].clientHeight * ratio);
				sectionHeight = position;
				// Get the difference between the last unsplit section and the end of
				// the page
				pagecut = pageHeight - (position - prevPosition);
				cutHeight = pageHeight - pagecut;
				// Insert the image into the page
				if (pagecount > 1) {
					doc.addPage();
				}
				doc.addImage(img, 'PNG', 0, (-1*prevPosition), imgWidth, imgHeight);
				if (pagecount < 2) {
					doc.addImage(getBase64Image(jQuery("img.ubermenu-image")[0]), 2, 2, 160*ratio, 60*ratio);
				}
				// Insert a white rectangle to remove split section from page
				if ((imgHeight - prevPosition) >= pageHeight){
					doc.setFillColor(255);
					doc.rect(0,cutHeight,imgWidth,pageHeight,'F');
				}
				// Incrase the page count and determine the remaining image height
				// left to process
				pagecount++;
				heightLeft = imgHeight - prevPosition;

		  	}
		  	doc.save('choosenj.pdf');
			// Return content to original parameters and remove overlay
			if (window.innerWidth > 1200){
				jQuery('#Content').width('');
			}
			canvases.parent().css("display","block");
			jQuery('a#create_pdf').parent().css("display","inline-block");
			tables.removeClass("vc_col-lg-6").removeClass("vc_col-lg-offset-3");
			jQuery(".inline_table").removeClass("no_pad_table");
			title.remove();
			document.getElementById('pdfLoadinggif').style.display = "none";
	 	});
	}

	// create canvas object
	function getCanvas(){
		 return html2canvas(form,{
		     imageTimeout:2000,
		     removeContainer:true,
		     useCORS: true,
			allowTaint: true,
			letterRendering: true,
			onrendered: function(canvas) {
				var ctx = canvas.getContext('2d');
				ctx.webkitImageSmoothingEnabled = false;
				ctx.mozImageSmoothingEnabled = false;
				ctx.imageSmoothingEnabled = false;
			},
	    });
	}

	function getBase64Image(img) {
	    var can = document.createElement("canvas");
	    can.width = img.width; can.height = img.height;
	    var c = can.getContext("2d"); c.drawImage(img, 0, 0);
	   return can.toDataURL("image/png");
	}

}());

</script>

<script type="text/javascript" src="http://www.choosenj.com/wp-content/themes/ChooseNJ/jsPDF/dist/jspdf.min.js"></script>
<script type="text/javascript" src="http://www.choosenj.com/wp-content/themes/ChooseNJ/html2canvas/dist/html2canvas.js"></script>

<?php get_footer('choose'); ?>
