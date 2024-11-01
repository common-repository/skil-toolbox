<?php

/**
 *
 * @link              http://stylishthemes.co
 * @since             1.0
 * @package           Skil_Toolbox
 *
 * @wordpress-plugin
 * Plugin Name:       Skil Toolbox
 * Plugin URI:        http://stylishthemes.co/
 * Description:       Register custom post type and include MailChimp Class.
 * Version:           1.0.0
 * Author:            StylishThemes
 * Author URI:        http://stylishthemes.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       skil-toolbox
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Skil_Toolbox {

	private static $instance;

	/**
	 * Actions setup
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 3 );
		add_action( 'plugins_loaded', array( $this, 'includes' ), 4 );
		add_action( 'admin_notices', array( $this, 'admin_notice' ), 4 );
	}

	/**
	 * Constants
	 */
	function constants() {

		define( 'STB_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'STB_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	}

	/**
	 * Includes
	 */
	function includes() {

		//Post type
		require_once( STB_DIR . 'inc/post-type-team.php' );	
		//MailChimp Class
		require_once( STB_DIR . 'inc/class-mailchimp-api.php' );

	}

	/**
	 * Translations
	 */
	function i18n() {
		load_plugin_textdomain( 'skil-toolbox', false, 'skil-toolbox/languages' );
	}

	/**
	 * Admin notice
	 */
	function admin_notice() {
		$theme  = wp_get_theme();
		$parent = wp_get_theme()->parent();
		if ( ($theme != 'Skil' ) && ($parent != 'Skil') ) {
		    echo '<div class="error">';
		    echo 	'<p>' . esc_html__('Please note that the <strong>Skil Toolbox</strong> plugin is meant to be used only with the <a href="http://wordpress.org/themes/skil/" target="_blank">Skil theme</a></p>', 'skil-toolbox');
		    echo '</div>';
		}
	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

function skil_toolbox_plugin() {
	if ( !function_exists('wpcf_init') ) //Make sure the Types plugin isn't active
		return Skil_Toolbox::get_instance();
}
add_action('plugins_loaded', 'skil_toolbox_plugin', 1);