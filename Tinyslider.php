<?php
/*
Plugin Name: TinySlider
Plugin URL:
Description:
Version: 1.0
Author: Imtiaz Epu
Author URI: https://www.imtiazepu.com
License: GPLv2 or later
Text Domain:tinyslider
Domain Path: /languages/
*/


class Tinyslider {
	/**
	 * Tinyslider constructor.
	 */
	public function __construct() {
		add_action( "plugin_loaded", array( $this, "tinys_load_textdomain" ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'tinys_assets' ) );
		add_shortcode( 'tslider', array( $this, 'tinys_shortcode_tslider' ) );
		add_shortcode( 'tslide', array( $this, 'tinys_shortcode_tslide' ) );
	}

	/**
	 * Load text domain or translator
	 */
	public function tinys_load_textdomain() {
		load_plugin_textdomain( 'tinyslider', false, dirname( __FILE__ ) . "/languages" );
	}//end method tinys_load_textdomain

	public function tinys_assets() {
		wp_enqueue_style( 'tinyslider-css', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css', null, '1.0' );
		wp_enqueue_script( 'tinyslider-js', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, '1.0', true );
		wp_enqueue_script( 'tinyslider-main-js', plugin_dir_url( __FILE__ ) . "/assets/js/main.js", array( 'jquery' ), '1.0', true );
	}

	/**
	 * @param $arguments
	 * @param $content
	 *
	 * @return string
	 */
	public function tinys_shortcode_tslider( $arguments, $content ) {
		$defaults = array(
			'width' => 800,
			'height'  => 600,
			'id' => ''
		);
		$attributes = shortcode_atts($defaults, $arguments);
		$content = do_shortcode($content);
		$shortcode_output = <<<EOD
		<div style="width: {$attributes['width']}; height: {$attributes['height']}">
			<div class="slider">
				{$content}
			</div>
		</div>
EOD;
		return $shortcode_output;

	}//end method tinys_shortcode_tslider

	/**
	 * @param $arguments
	 */
	public function tinys_shortcode_tslide( $arguments ) {

	}//end method tinys_shortcode_tslide
}

new Tinyslider();