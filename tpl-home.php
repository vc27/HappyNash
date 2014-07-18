<?php
/* Template Name: Home Page */

/**
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
#################################################################################################### */
$form = get_field('_home_self_submissions_form');

get_template_part( 'header' );

?>
<div id="section-self-submissions" class="outer-wrap" style="background-image:url('<?php the_field('_home_self_submissions_image'); ?>');">
	<div class="section-head">
		<div class="custom-h2"><?php the_field('_home_self_submissions_title'); ?></div>
	</div>
	<div class="inner-wrap">
		<?php
		echo "<div id=\"gravity-form-wrap\">";
			gravity_form_enqueue_scripts( $form->id, true );
			gravity_form( $form->id, false, false, false, '', false, 1 );
		echo "</div>";
		?>
	</div>
</div>
<?php
get_template_part( 'footer' );