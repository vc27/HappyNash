<?php
/**
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
#################################################################################################### */


get_template_part( 'header' );
?>
<div class="row-fluid">
	<div class="span8 offset2">
		<?php
		
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
							'permalink' => false
						) );

						echo "<div class=\"meta-data\">";
							vc_date();
							vc_category( array(
								'element' => 'span'
							) );
						echo "</div>";

						if ( has_post_thumbnail() ) { 
							$image = featured__image( $post, array( 
								'post_thumbnail_size' => get__option( 'post_display', 'featured_image_size' ) 
								,'get_src' => true
							) );
							echo "<div class=\"featured-image\" style=\"background-image:url('$image');\"></div>";
						}

						echo "<div class=\"post-wrap\">";
							vc_content();
						echo "</div>";

						echo "<div class=\"clear\"></div>";
					echo "</article>";


				} // End while(have_post())


				echo "<div class=\"clear\"></div>";
			echo "</div>";

		} // End if(have_post()) 

		do_action( 'vc_below_loop' );
		
		?>
	</div>
</div>
<?php
get_template_part( 'footer' );