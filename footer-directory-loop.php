<?php
/**
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
#################################################################################################### */

echo "<div id=\"footer-directory-loop\">";
	echo "<div class=\"h2\">" . get_field('_footer_directory_title','option') . "</div>";
	if ( get_field('_footer_directory_description','option') ) {
		echo "<div class=\"entry\">" . get_field('_footer_directory_description','option') . "</div>";
	}
	echo "<a class=\"btn btn-double-white\" href=\"" . get_field('_footer_directory_button_url','option') . "\"><span class=\"btn-inner\">" . get_field('_footer_directory_button_text','option') . "</span></a>";

echo "</div>";