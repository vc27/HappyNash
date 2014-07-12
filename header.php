<?php
/**
 * File Name header.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 2.3
 * @updated 01.20.14
 **/
#################################################################################################### */

get_template_part( 'header-head' );

?>
<!-- Start Body -->
<body <?php body_class(); ?>>
	<?php do_action('after_body_tag'); ?>
	<div id="page">
			
		<!-- Start Header -->
		<div id="header" class="outer-wrap" style="background-image:url('<?php echo get_field('_header_image','option'); ?>');">
			<?php 
			wp_nav_menu( array( 
				'fallback_cb' => '', 
				'theme_location' => 'primary-navigation', 
				'container' => 'div', 
				'container_id' => 'primary-navigation', 
			) );
			?>
			<header class="inner-wrap">
				<div class="custom-h1"><?php echo get_field('_header_title','option'); ?></div>
				<div class="h2"><?php echo get_field('_header_sub_title','option'); ?></div>
				<p><em><?php echo get_field('_header_sub_title_sub_text','option'); ?></em></p>
				<div class="clear"></div>
			</header>
		</div>
		
		<!-- Start Main Content -->
		<div id="content-wrap" class="outer-wrap">
			<div class="inner-wrap">