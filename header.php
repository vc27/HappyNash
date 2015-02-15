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

if ( is_page_template('tpl-home.php') ) {
	$header_image = get_field('_home_header_image');
} else {
	$header_image = get_field('_header_image','option');
}

get_template_part( 'header-head' );

?>
<!-- Start Body -->
<body <?php body_class(); ?>>
	<?php do_action('after_body_tag'); ?>
	<div id="page">
		<?php
		wp_nav_menu( array( 
			'fallback_cb' => '', 
			'theme_location' => 'hidden-navigation', 
			'container' => 'div', 
			'container_id' => 'hidden-navigation', 
		) );
		?>
		<!-- Start Header -->
		<div id="header" class="outer-wrap" style="background-image:url('<?php echo $header_image; ?>');">
			<?php 
			wp_nav_menu( array( 
				'fallback_cb' => '', 
				'theme_location' => 'primary-navigation', 
				'container' => 'div', 
				'container_id' => 'primary-navigation', 
			) );
			echo "<span class=\"icon-menu\"></span>";
			?>
			<header class="inner-wrap">
				<div class="custom-h1"><a href="<?php echo home_url(); ?>"><?php echo get_field('_header_title','option'); ?></a></div>
				<div class="h2"><?php echo get_field('_header_sub_title','option'); ?></div>
				<p><em><?php echo get_field('_header_sub_title_sub_text','option'); ?></em></p>
				<div class="social-wrap">
					<?php if ( get_field('_twitter_url','option') ) { ?><a class="ic icon-twitter" href="<?php the_field('_twitter_url','option'); ?>" target="_blank"></a><?php } ?>
					<?php if ( get_field('_facebook_url','option') ) { ?><a class="ic icon-facebook" href="<?php the_field('_facebook_url','option'); ?>" target="_blank"></a><?php } ?>
				</div>
				<div class="clear"></div>
			</header>
		</div>
		
		<!-- Start Main Content -->
		<div id="content-wrap" class="outer-wrap">
			<div class="inner-wrap">