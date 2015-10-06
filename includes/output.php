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
	 * @param $template
	 * @param $event_id
	 * @return mixed|string
	 */
	public function template( $template, $event_id ){
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