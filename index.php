<?php
/**
 * File Name index.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.9
 * @updated 01.20.14
 **/
#################################################################################################### */


get_template_part( 'header' );
?>
<div class="row-fluid">
	<div class="span8">
		<?php get_template_part( 'loop-default' ); ?>
	</div>
	<div class="span3 offset1">
		<?php vc_sidebars( 'Primary Sidebar' ); ?>
	</div>
</div>
<?php
get_template_part( 'footer' );