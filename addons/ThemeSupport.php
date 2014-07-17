<?php
/**
 * File Name ThemeSupport.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
####################################################################################################





/**
 * ThemeSupport
 *
 * @version 1.0
 * @updated 00.00.13
 **/
$ThemeSupport = new ThemeSupport();
class ThemeSupport {
	
	
	
	/**
	 * appName
	 * 
	 * @access public
	 * @var string
	 **/
	var $appName = 'projectApp';
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {
		
		// add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );
		
		// add_action( 'init', array( &$this, 'init' ) );
		
		// add_action( 'admin_init', array( &$this, 'admin_init' ) );
		
		// add_action( 'wp', array( &$this, 'wp' ) );
		
		// add_action( 'widgets_init', array( &$this, 'widgets_init' ) );

	} // end function __construct
	
	
	
	
	
	
	/**
	 * after_setup_theme
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function after_setup_theme() {
		
		/*
		add__featured_image( array(
			'label' => 'Artist Header',
			'id' => 'artist-header',
			'post_type' => 'artists',
			'priority' => 'low',
			'context' => 'side'
		) );
		*/
		
	} // end function after_setup_theme
	
	
	
	
	
	
	/**
	 * init
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function init() {
		
		// filter the_post
		// add_filter( 'tag_html_attr', array( &$this, 'tag_html_attr' ) );
		
	} // end function init
	
	
	
	
	
	
	/**
	 * admin_init
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function admin_init() {
		
		// 
		
	} // end function admin_init
	
	
	
	
	
	
	/**
	 * wp
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function wp() {
		
		// Body Class
		// add_filter( 'body_class', array( &$this, 'body_class' ) );
		
		// $this->remove__jetpack_share();
		// $this->remove__polldaddy_show_rating();
		
	} // end function wp
	
	
	
	
	
	
	/**
	 * Widgets Initiate
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function widgets_init() {
		
		// register_widget( 'TwitterWidgetVCWP' );
		
	} // end function widgets_init
	
	
	
	
	
	
	/**
	 * set
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function set( $key, $val = false ) {
		
		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}
		
	} // end function set
	
	
	
	
	
	
	/**
	 * get
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function get( $key ) {
		
		if ( isset( $key ) AND ! empty( $key ) AND isset( $this->$key ) AND ! empty( $this->$key ) ) {
			return $this->$key;
		} else {
			return false;
		}
		
	} // end function get
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * function_name
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function function_name( $attr ) {
		
		// function_name
		
	} // end function function_name
	
	
	
	
	
	
	####################################################################################################
	/**
	 * static
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * is_archive_directory
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	static function is_archive_directory() {

		if ( is_archive() and get_post_type() == 'directory' ) {
			return true;
		} else {
			return false;
		}
		
	} // end function is_archive_directory
	
	
	
} // end class ThemeSupport