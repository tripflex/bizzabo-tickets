<?php
/**
 * Bizzabo Tickets Output
 * @version 0.1.0
 * @package Bizzabo Tickets
 */

class Bizzabo_Tickets_Output {
	/**
	 * Parent plugin class
	 *
	 * @var class
	 * @since  0.1.0
	 */
	protected $plugin = null;

	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 * @return  null
	 */
	public function __construct( $plugin ) {
		$this->plugin = $plugin;
		$this->hooks();
	}

	/**
	 * Output an Event Template File
	 *
	 * @param $template
	 * @param $event_id Event ID to use for the template
	 * @return mixed|string
	 */
	public function template( $template, $event_id ){

		if( empty( $event_id ) ) return __( 'Error: Unable to determine Event ID.  Please contact the Website Administrator for assistance.' );
		// Start output buffering
		ob_start();
		$file = Bizzabo_Tickets::dir( 'templates/'. $template .'.php' );
		if ( file_exists( $file ) ) {
			include( $file );
		}
		return ob_get_clean();
	}

	/**
	 * Initiate our hooks
	 *
	 * @since 0.1.0
	 * @return  null
	 */
	public function hooks() {
	}
}