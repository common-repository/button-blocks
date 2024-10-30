<?php
/**
 * NR Blocks Registration
 *
 * @since 1.0.0
 * @package NRBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NR_Blocks_Registration' ) ) {

	/**
	 * NR Blocks Registration Class
	 *
	 * @since 1.0.0
	 * @package NRBlocks
	 */
	class NR_Blocks_Registration {

		/**
		 * NR_Blocks_Registration Instance
		 *
		 * @since 1.0.0
		 * @var NR_Blocks_Registration
		 */
		private static $instance = null;

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function __construct() {
			$this->init();
		}

		/**
		 * Initialize the Class
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function init() {
			add_action( 'init', array( $this, 'register_blocks' ) );
		}

		/**
		 * Register Blocks
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function register_blocks() {
			$blocks = [
				'button',
			];

			$build_dir = NR_BUTTON_BLOCKS_PLUGIN_DIR . 'build/blocks/';

			if ( file_exists( $build_dir ) ) {
				foreach ( $blocks as $block ) {
					$block_dir = $build_dir . $block . '/';
					if ( file_exists( $block_dir ) ) {
						register_block_type( $block_dir );
					} else {
						error_log( "NR Blocks: Build directory for {$block} block does not exist." );
					}
				}
			} else {
				error_log( 'NR Blocks: Main build directory does not exist.' );
			}
		}

		/**
		 * NR_Blocks_Registration Instance
		 *
		 * @since 1.0.0
		 * @return NR_Blocks_Registration
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

}

// Initialize the class
NR_Blocks_Registration::get_instance();
