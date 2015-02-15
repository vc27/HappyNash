<?php
/* Template Name: Home Page */

/**
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
#################################################################################################### */


get_template_part( 'header' );

?>
<div id="section-about" class="outer-wrap" style="background-image:url('<?php the_field('_home_self_submissions_image'); ?>');">
	<div class="gradient"></div>
	<div class="inner-wrap">
		<div class="entry section-entry"><?php the_field('_home_about_description'); ?></div>
		<div class="terms-wrapper">
			<div class="block-term block-nourishment">
				<div class="h1">Nourishment</div>
				<span class="ic icon-nourishment"></span>
				<div class="entry">
					<?php the_field('_home_about_nourishment_description'); ?>
					<a class="read-more" href="<?php echo get_term_link( get_field('_home_about_nourishment__url'), 'category' ); ?>">Read More</a>
				</div>
			</div>
			<div class="block-term block-movement">
				<div class="h1">Movement</div>
				<span class="ic icon-movement"></span>
				<div class="entry">
					<?php the_field('_home_about_movement_description'); ?>
					<a class="read-more" href="<?php echo get_term_link( get_field('_home_about_movement_url'), 'category' ); ?>">Read More</a>
				</div>
			</div>
			<div class="block-term block-happiness">
				<div class="h1">Happiness</div>
				<span class="ic icon-happiness"></span>
				<div class="entry">
					<?php the_field('_home_about_happiness_description'); ?>
					<a class="read-more" href="<?php echo get_term_link( get_field('_home_about_happiness_url'), 'category' ); ?>">Read More</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="section-self-submissions" class="outer-wrap">
	<div class="section-head">
		<div class="custom-h2"><?php the_field('_home_self_submissions_title'); ?></div>
	</div>
	<div class="inner-wrap">
		<div class="entry"><?php the_field('_home_self_submissions_description'); ?></div>
		<?php
		echo "<div id=\"gravity-form-wrap\">";
			gravity_form_enqueue_scripts( 3, true );
			gravity_form( 3, false, false, false, '', false, 1 );
		echo "</div>";
		?>
		
		<div class="btn-wrap">
			<a class="btn" href="<?php echo home_url(); ?>/self-submissions">See what others have posted</a>
		</div>
		
	</div>
</div>
<?php
get_template_part( 'footer' );