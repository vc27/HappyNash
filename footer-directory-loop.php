<?php
/**
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
#################################################################################################### */

echo "<div id=\"footer-directory-loop\">";
	echo "<div class=\"h2\">" . get_field('_footer_directory_title','option') . "</div>";
	$query = array(
		'post_type' => 'directory'
		,'posts_per_page' => 8
		,'orderby' => 'rand'
	);
	$wp_query = new WP_Query();
	$wp_query->query($query);
	if ( have_posts() ) {
		echo "<ul class=\"clearfix\">";
		while ( have_posts() ) { 
			the_post(); 
			vc_title( $post, array( 
				'element' => 'li',
				'permalink' => true 
			) );
		} // End while(have_post())
		echo "</ul>";
		wp_reset_postdata();
		wp_reset_query();
	} // End if(have_post())
	
	echo "<a class=\"btn btn-double-white\" href=\"" . get_field('_footer_directory_button_url','option') . "\"><span class=\"btn-inner\">" . get_field('_footer_directory_button_text','option') . "</span></a>";

echo "</div>";