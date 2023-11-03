<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
<?php 
	astra_content_after();
		
	astra_footer_before();
		
	astra_footer();
		
	astra_footer_after(); 
?>
	</div><!-- #page -->
	<script>
        /* jQuery(document).ready(function() {
            jQuery('iframe').load(function() {
				console.log('lo');
                 var iFrameDOM = jQuery(".astra-shop-summary-wrap .trustpilot-widget iframe").contents();
                console.log(iFrameDOM.find("body.main .tp-widget-readmore")); 
				iFrameDOM.find("body.main .tp-widget-readmore").css('display','none'); 
            });
        }); */
        </script>
<?php 
	astra_body_bottom();    
	wp_footer(); 
?>
	</body>
</html>