<?php
/* Template Name: Landing Page */

/**
 * File Name tpl-landing-page.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.8
 * @updated 01.20.14
 **/
#################################################################################################### */

get_template_part( 'header-head' );

?>
<!-- Start Body -->
<body <?php body_class('landing-page'); ?>>
	<?php do_action('after_body_tag'); ?>
	<div id="page-cover"></div>
	<div id="page">
		<div class="head">
			<h1 class="custom-text">HappyNash</h1>
			<p>
				<span class="h5">Live, Love, Nashville</span>
				<span class="h6 meta-data">Nashville, TN</span>
			</p>
		</div>
	    <div class="body">
	    	<div class="inner-wrap">
				<div class="form-wrap">
					<?php

					$form = get_field('_form');
					gravity_form_enqueue_scripts( $form->id, true );
					gravity_form( $form->id, false, false, false, '', true, 1 );

					?>
				</div>
			</div>
	    </div>
	    <div class="foot">&copy; 2014 HappyNash. All rights reserved.</div>
	</div><!-- End Page -->
<?php wp_footer(); ?>
</body>
</html>