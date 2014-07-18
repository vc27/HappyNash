<?php
/**
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
#################################################################################################### */
$cats = array(
	'nourishment'
	,'movement'
	,'happiness'
);
$post__not_in = array();
echo "<div id=\"header-article-loop\">";
	echo "<p>" . get_field('_home_header_text_above_blog_posts') . "</p>";
	echo "<ul>";
	foreach ( $cats as $cat ) {
		$query = array(
			'post_type' => 'post'
			,'posts_per_page' => 1
			,'category' => $cat
			,'post__not_in' => $post__not_in
		);
		$wp_query = new WP_Query();
		$wp_query->query($query);
		if ( have_posts() ) {
			while ( have_posts() ) { 
				the_post(); 
				$post__not_in[] = $post->ID;
				echo "<li>";
					echo "<span class=\"ic icon-$cat\"></span>";
					vc_title( $post, array( 
						'element' => 'span',
						'class' => 'h2',
						'permalink' => true 
					) );
				echo "</li>";
			} // End while(have_post())
		} // End if(have_post()) 
	}
	echo "</ul>";
echo "</div>";
wp_reset_postdata();
wp_reset_query();