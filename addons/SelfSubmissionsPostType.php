<?php
/**
 * File Name SelfSubmissionsPostType.php
 * @package WordPress
 * @subpackage ParentTheme_VC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.13
 **/
####################################################################################################





/**
 * SelfSubmissionsPostType
 *
 * @version 1.0
 * @updated 00.00.13
 **/
$SelfSubmissionsPostType = new SelfSubmissionsPostType();
class SelfSubmissionsPostType {
	
	
	
	/**
	 * registered
	 * 
	 * @access public
	 * @var array
	 **/
	var $registered = 0;
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function __construct() {

		add_action( 'init', array( &$this, 'register_post_type' ) );
		add_action( 'admin_init', array( &$this, 'admin_init' ) );

	} // end function __construct
	
	
	
	
	
	
	/**
	 * after_setup_theme
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 *
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
	 **/
	function after_setup_theme() {
		
		// 
		
	} // end function after_setup_theme
	
	
	
	
	
	
	/**
	 * init
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/init
	 * 
	 * Description:
	 * Runs after WordPress has finished loading but before any headers are sent.
	 **/
	function init() {
		
        //
		
	} // end function init
	
	
	
	
	
	
	/**
	 * admin_init
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
	 * 
	 * Description:
	 * admin_init is triggered before any other hook when a user access the admin area.
	 * This hook doesn't provide any parameters, so it can only be used to callback a 
	 * specified function.
	 **/
	function admin_init() {
		
		// Add Filters for Custom Manage Columns
		add_filter(	'manage_edit-' . $this->registered->_post_type . '_columns', array( &$this, 'edit_columns' ) );
		
		// Add management for capability_type
		if ( 
			( isset( $this->registered->post_type['post_type']['hierarchical'] ) AND ! empty( $this->registered->post_type['post_type']['hierarchical'] ) ) 
			AND 
			( isset( $this->registered->post_type['post_type']['capability_type'] ) AND ! empty( $this->registered->post_type['post_type']['capability_type'] ) AND $this->registered->post_type['post_type']['capability_type'] == 'page' ) 
		) {
			$this->manage_custom_column = 'manage_pages_custom_column';
		} else {
			$this->manage_custom_column = 'manage_posts_custom_column'; // "manage_" . $this->post_type . "_custom_column";
		}
		
		add_action(	$this->manage_custom_column, array( &$this, 'custom_columns' ) );
		
		// Add column specific filtering
		// add_filter( 'manage_edit-' . $this->registered->_post_type . '_sortable_columns', array( &$this, 'column_register_sortable' ) );
		add_filter( 'request', array( &$this, 'column_orderby' ) );
		
		// Added for taxonomy filtering
		if ( $this->registered->have_tax_filters ) {
			add_action( 'restrict_manage_posts', array( &$this, 'restrict_manage_html_filters' ) );
			add_filter( 'pre_get_posts', array( &$this, 'post_type_parse_query' ) );
		}
		
	} // end function admin_init
	
	
	
	
	
	
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
	 * Add External Metaboxes
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 * 
	 * Description:
	 * Works in conjunction with existing filter used with in
	 * post-meta-vc.php. It will add the post type to the metabox
	 * that is being specified.
	 **/
	function add_external_metaboxes( $post_types ) {
		
		$post_types[] = $this->registered->_post_type;
		return $post_types;
		
	} // end function add_external_metaboxes
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Register
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * register_post_type
	 *
	 * @version 1.0
	 * @updated 00.00.13
	 **/
	function register_post_type() {
		
		$this->registered = register__post_type( array(
			'post_type' => array(
				'labels' => array(
					'name' => __( 'Self Submissions', 'childtheme' ),
					'singular_name' => __( 'Self Submissions', 'childtheme' ),
					'add_new' => __( 'Add New', 'childtheme' ),
					'add_new_item' => __( 'Add New', 'childtheme' ),
					'edit_item' => __( 'Edit Self Submissions', 'childtheme' ),
					'new_item' => __( 'New Self Submissions', 'childtheme' ),
					'view_item' => __( 'View Self Submissions', 'childtheme' ),
					'search_items' => __( 'Search Self Submissions', 'childtheme' ),
					'not_found' => __( 'No Self Submissions found', 'childtheme' ),
					'not_found_in_trash' => __( 'No Self Submissions found in Trash', 'childtheme' ), 
					'parent_item_colon' => '',
					'menu_name' => __( 'Self Submissions', 'childtheme' )
				),

				// 'description' => '',
				'public' => true,
				// 'publicly_queryable'	=> true,
				// 'exclude_from_search'	=> false,
				'show_ui' => true,
				'show_in_menu' => true, // edit.php?post_type=page
				// 'menu_position' => null,
				// 'menu_icon' => get_stylesheet_directory_uri() . "/addons/PostTypes/images/self-submissions-16x16.png", // is set in class construct
				'capability_type' => 'post', // requires 'page' to call in post_parent
				// 'capabilities' => array(), --> See codex for detailed description
				// 'map_meta_cap' => false,
				// 'hierarchical' => true, // requires manage_pages_custom_column for custom_columns add_action // requires 'true' to call in post_parent

				'supports' => array( 
					'title',
					'editor',
					// 'author',
					'thumbnail',
					// 'excerpt',
					// 'trackbacks',
					// 'custom-fields',
					// 'comments',
					// 'revisions',
					// 'page-attributes', //  (menu order, hierarchical must be true to show Parent option)
					// 'post-formats',
				),

				// 'register_meta_box_cb' => '', --> managed via class method add_meta_boxes()
				'taxonomies' => array( 'category' ), // array of registered taxonomies
				// 'permalink_epmask' => 'EP_PERMALINK',
				'has_archive' => true, // Enables post type archives. Will use string as archive slug.

				'rewrite' => array( // Permalinks
					'slug' => 'self-submissions',
					// 'with_front' => '', // set this to false to over-write a wp-admin-permalink structure
					// 'feeds' => '', // default to has_archive value
					// 'pages' => true,
				),

				'query_var' => 'self-submissions', // This goes to the WP_Query schema
				'can_export' => true,
				// 'show_in_nav_menus' => '', // value of public argument
				'_builtin' => false, 
				'_edit_link' => 'post.php?post=%d',

			), // end 'post_type'

		) );
		
	} // end function register_post_type
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Admin Management
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Register the column as sortable
	 * 
	 * @version 1.2
	 * @updated 00.00.13
	 **/
	function column_register_sortable( $columns ) {
		
		// $columns['featured'] = 'featured';

		return $columns;
		
	} // end function column_register_sortable
	
	
	
	
	
	
	/** 
	 * Filter request for ordering
	 * 
	 * @version 1.3
	 * @updated 06.05.14
	 **/
	function column_orderby( $vars ) {
		
		// Sorting by post_meta numeric values
		if ( isset( $vars['orderby'] ) AND $vars['post_type'] == $this->registered->_post_type ) {
			
			$vars['meta_compare'] = '>';
			$vars['meta_value'] = 0;
				
			switch ( $vars['orderby'] ) {
				case "featured" :
					$vars['meta_key'] = '_books__featured_order';
					break;
			}
			
			$vars['orderby'] = 'meta_value_num';
			
		} // end if ( isset( $vars['orderby'] ) )
		
		return $vars;
		
	} // end function column_orderby
	
	
	
	
	
	
	/**
	 * Add Columns Manage Page
	 * 
	 * @version 1.3
	 * @updated 00.00.13
	 **/
	function edit_columns( $columns ) {
		
		$columns['image'] = __( 'Image', 'childtheme' );
		
		return $columns;
	
	} // end edit_columns
	
	
	
	
	
	
	/**
	 * Add Columns Details
	 * 
	 * @version 1.2
	 * @updated 00.00.13
	 **/
	function custom_columns( $column ) {
		global $post;
		
		if ( $post->post_type == $this->registered->_post_type ) {
			
			switch ( $column ) {

				case "image":
					if ( has_post_thumbnail( $post->ID ) )
						echo get_the_post_thumbnail( $post->ID, array( 50, 50 ) );
					break;
					
			} // end switch
			
		} // end if
	
	} // end custom_columns
	
	
	
	
	
	
	/**
	 * Add html for dropdown select containing taxonomies
	 * 
	 * @version 1.2
	 * @updated 00.00.13
	 *
	 * Notes:
	 * There are no parameters, but there are two globals available
	 * Available:
	 * $post_type_object->taxonomies
	 * $post_type_object->query_var
	 **/
	function restrict_manage_html_filters() {
		global $post_type_object, $cat;
		
		if ( $post_type_object->query_var == $this->registered->_post_type AND $this->registered->have_tax_filters ) {
			
			foreach ( $this->registered->post_type_tax_filters as $taxonomy ) {
				
				echo $this->html_taxonomy_select( $taxonomy );
				
			} // end foreach ( $this->post_type_tax_filters )
			
		} // end if ( post_type )
		
	} // end restrict_manage_html_filters
	
	
	
	
	
	
	/**
	 * Build html for dropdown select containing taxonomies
	 * 
	 * @version 1.2
	 * @updated 00.00.13
	 **/
	function html_taxonomy_select( $taxonomy ) {
		
		$terms = get_terms( $taxonomy );
		$tax = get_taxonomy( $taxonomy );

		$html = " &nbsp;";
		$html .= "<select style=\"width:125px;\" id=\"sortby-term-$taxonomy\" name=\"sortby-term-$taxonomy\">";
		$html .= "<option value=\"none\">" . __( 'All', 'childtheme' ) . " $tax->label</option>";

		foreach ( $terms as $term ) {
			if ( $_GET["sortby-term-$taxonomy"] == $term->slug )
				$sel = ' selected="selected"';

			$html .= "<option value=\"$term->slug\"$sel>$term->name</option>";
			unset( $sel );
		}

		$html .= "</select>&nbsp; ";
		
		return $html;
		
	} // end function html_taxonomy_select
	
	
	
	
	
	
	/**
	 * Filter results of page based on the "restrict_manage" variable
	 * 
	 * @version 1.2
	 * @updated 00.00.13
	 **/
	function post_type_parse_query( $query ) {
		global $pagenow;
		
		// Make sure we are filtering the edit.php query
		if ( is_admin() AND $pagenow == 'edit.php' AND $query->query_vars['post_type'] == $this->registered->_post_type AND $this->registered->have_tax_filters ) {
			
			foreach ( $this->registered->post_type_tax_filters as $taxonomy ) {
				
				if ( isset( $_GET["sortby-term-$taxonomy"] ) AND $_GET["sortby-term-$taxonomy"] != 'none' ) {
					
					$query->set( $taxonomy, $_GET["sortby-term-$taxonomy"] );
				
				} // end if ( isset
				
			} // end foreach ( $this->post_type_tax_filters ) 
			
		} // end if ( is_admin )
	
	} // end function post_type_parse_query
	
	
	
} // end class SelfSubmissionsPostType