<?php
/**
 * File Name loop-default.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.6
 * @updated 01.20.14
 **/
#################################################################################################### */

do_action( 'vc_above_loop' );


if ( have_posts() ) {
	$i = 0; 
	
	echo "<div id=\"loop-default\" class=\"loop\">";

	while ( have_posts() ) { 
		the_post(); 
		$i++;

			echo "<article "; post_class(); echo ">";
			
				vc_title( $post, array( 
					'class' => 'h1',
					'permalink' => true 
				) );

				echo "<div class=\"meta-data\">";
					vc_date();
					vc_category( array(
						'element' => 'span'
					) );
					vc_comments( $post );
				echo "</div>";
				
				if ( vc_show_featured_image() ) { 
					$image = featured__image( $post, array( 
						'post_thumbnail_size' => get__option( 'post_display', 'featured_image_size' ) 
						,'get_src' => true
					) );
					echo "<div class=\"featured-image\" style=\"background-image:url('$image');\"></div>";
				}
				
				echo "<div class=\"post-wrap\">";

					if ( vc_is_excerpt() ) {
						vc_excerpt( $post, array( 
							'count' => get__option( 'post_display', 'word_count' ),
							'read_more' => get__option( 'post_display', 'read_more' ),
							'strip_tags' => get__option( 'post_display', 'strip_tags' ), 
							'push_read_more' => true 
						) );
					} else {
						vc_content();
					}
				echo "</div>";

				echo "<div class=\"clear\"></div>";
			echo "</article>";
			
			// Insert Comments if turned on
			if ( ! get__option( 'comments', 'remove_comments' ) AND 'open' == $post->comment_status ) {
				comments_template( '', true );
			}
			

		} // End while(have_post())


		echo "<div class=\"clear\"></div>";
	echo "</div>";

} // End if(have_post()) 

do_action( 'vc_below_loop' ); 