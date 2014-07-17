<?php
/**
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
#################################################################################################### */
$form = get_field('_directory_form','option');

get_template_part( 'header' );

echo "<div id=\"loop-default\" class=\"loop loop-page block\">";
	echo "<div class=\"row-fluid\">";
		echo "<div class=\"span8 hentry\">";
			echo "<h1 class=\"h1\">" . get_field('_directory_page_title','option') . "</h1>";
			echo "<div class=\"entry\">" . get_field('_directory_content','option') . "</div>";
		echo "</div>";
		echo "<div class=\"span4 block-image\">";
			echo "<img src=\"" . get_field('_directory_connect_image','option') . "\" alt=\"\" />";
			echo "<span id=\"show-directory-submission\" class=\"btn\">Submit your business</span>";
		echo "</div>";
	echo "</div>";
echo "</div>";



echo "<div id=\"section-directory-submission\" class=\"block\">";
	echo "<div class=\"inside-wrapper\">";
		echo "<div class=\"h1\">Submit your business</div>";
		gravity_form_enqueue_scripts( $form->id, true );
		gravity_form( $form->id, false, false, false, '', true, 1 );
	echo "</div>";
echo "</div>";



$terms = get_terms( 'category' );

foreach ( $terms as $term ) {
	
	$query = array(
		'posts_per_page' => -1
		,'post_type' => $post->post_type
		,'category' => $term->slug
		,'tax_query' => array(
			array(
				'taxonomy' => 'category'
				,'field' => 'id'
				,'terms' => array($term->term_id)
			)
		)
	);
	$wp_query = new WP_Query();
	$wp_query->query($query);
	
	if ( have_posts() ) {
		echo "<div class=\"h1\">$term->name</div>";
		echo "<div id=\"section-directory\" class=\"layout-grid clearfix\">";
		while ( have_posts() ) { 
			the_post();
			$image = featured__image( $post, array( 
				'post_thumbnail_size' => get__option( 'post_display', 'featured_image_size' ) 
				,'get_src' => true
			) );

			echo "<div class=\"hentry\">";
				echo "<div class=\"featured-image\" style=\"background-image:url('$image');\"></div>";
				echo "<div class=\"post-wrap\">";
					vc_title( $post, array( 
						'element' => 'strong',
						'permalink' => false 
					) );
					echo "<p>";
						echo $post->location->street;
						echo "<br />" . $post->location->city . " " . $post->location->state . " " . $post->location->zipcode;
						echo "<br />" . $post->location->phone;
						echo "<br /><a href=\"" . $post->location->website . "\" target=\"_blank\">" . $post->location->website . "</a>";
					echo "</p>";
				echo "</div>";
			echo "</div>";

		} // end while ( have_posts() )
		echo "</div>";
	} // end if ( have_posts() )
	
	wp_reset_postdata();
	wp_reset_query();
	
} // end foreach ( $terms as $term )



get_template_part( 'footer' );