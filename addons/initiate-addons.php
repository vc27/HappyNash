<?php
/**
 * File Name initiate-addons.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.2
 * @updated 10.02.13
 *
 * Description:
 * Include core functionality, activation and theme functions.
 **/
#################################################################################################### */


if ( ! defined('THEME_ADDONS_INIT') ) {
	
	// Init ParentTheme_VC lib
	require_once( get_template_directory() . "/includes/initiate-lib.php" );
	
	// Added Functionality
	require_once( "ThemeSupport.php" );
	require_once( "ACFOptionsWP.php" );
	require_once( "AdminCustomizationsWP.php" );
	require_once( "WPSEOEdits.php" );
	require_once( "SelfSubmissionsPostType.php" );
	require_once( "DirectoryPostType.php" );
	require_once( "GeoMyIPWP.php" );
	
	define( 'THEME_ADDONS_INIT', true );
	
} // end if ( ! defined('THEME_ADDONS_INIT') )