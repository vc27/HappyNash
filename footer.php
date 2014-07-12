<?php
/**
 * File Name footer.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.4
 * @updated 01.20.14
 **/
#################################################################################################### */

?>
			<div class="clear"></div>
		</div><!-- End content-wrap-inner -->
	</div><!-- End content-wrap -->
	
	<!-- Start Footer -->
	<div id="footer" class="outer-wrap" style="background-image:url('<?php the_field('_footer_image','option'); ?>');">
		<div class="section-head">
			<div class="custom-h2"><?php the_field('_footer_title','option'); ?></div>
		</div>
		<footer class="inner-wrap">
			<?php 
			wp_nav_menu( array( 
				'depth' => 1, 
				'fallback_cb' => '', 
				'theme_location' => 'footer-navigation', 
				'container' => 'div', 
				'container_id' => 'footer-navigation' 
			) );
			?>
			<p id="copyright">&copy; <?php echo date('Y'); ?> HappyNash</p>
			<div class="clear"></div>
		</footer>
	</div><!-- End Footer -->

</div><!-- End Page -->

<!-- Start wp_footer -->
<?php wp_footer(); ?>
</body>
</html>