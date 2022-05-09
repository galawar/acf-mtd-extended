<?php

/*
Plugin Name: ACF: MTD Extended Fields
Plugin URI: https://github.com/galawar/acf-mtd-extends
Description: MTD Extend Fields for Advanced Custom Fields
Version: 1.0.1
Author: galawar
Author URI: https://github.com/galawar
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('mtd_acf_plugin_extend') ) :

class mtd_acf_plugin_extend {
	// vars
	var $settings;

	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version' => '2.0.2',
			'url'     => plugin_dir_url( __FILE__ ),
			'path'    => plugin_dir_path( __FILE__ )
		);
		
		
		// include field
		add_action('acf/include_field_types', array($this, 'include_field')); // v5
		add_action('acf/register_fields',     array($this, 'include_field')); // v4
	}
	
	
	/*
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	
	function include_field( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// load textdomain
		load_plugin_textdomain( 'mtd', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );
		
		
		// include
		include_once('fields/class-mtd-acf-field-cf7_forms-v' . $version . '.php');
		include_once('fields/class-mtd-acf-field-gravity_forms-v' . $version . '.php');
	}
	
}


// initialize
new mtd_acf_plugin_extend();


// class_exists check
endif;