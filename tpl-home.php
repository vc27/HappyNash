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
<div id="section-about" class="outer-wrap" style="background-image:url('<?php the_field('_home_self_submissions_image'); ?>');">
	<div class="gradient"></div>
	<div class="inner-wrap">
		<div class="entry section-entry"><p>Sed posuere tortor et nunc congue, nec pretium nisi congue. Sed semper bibendum urna in tempor. Donec quis tellus nulla.</p></div>
		<div class="terms-wrapper">
			<div class="block-term block-nourishment">
				<div class="h1">Nourishment</div>
				<span class="ic icon-nourishment"></span>
				<div class="entry">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at interdum mauris, sit amet tincidunt turpis.</p>
					<a class="read-more" href="#">Read More</a>
				</div>
			</div>
			<div class="block-term block-movement">
				<div class="h1">Movement</div>
				<span class="ic icon-movement"></span>
				<div class="entry">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at interdum mauris, sit amet tincidunt turpis.</p>
					<a class="read-more" href="#">Read More</a>
				</div>
			</div>
			<div class="block-term block-happiness">
				<div class="h1">Happiness</div>
				<span class="ic icon-happiness"></span>
				<div class="entry">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris at interdum mauris, sit amet tincidunt turpis.</p>
					<a class="read-more" href="#">Read More</a>
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
			gravity_form_enqueue_scripts( $form->id, true );
			gravity_form( $form->id, false, false, false, '', false, 1 );
		echo "</div>";
		?>
	</div>
</div>
<?php
get_template_part( 'footer' );