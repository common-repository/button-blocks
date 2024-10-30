<?php
/**
 * NR Blocks Category
 *
 * @since 1.0.0
 * @package NRBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NR_Blocks_Category' ) ) {

	/**
	 * NR Blocks Category Class
	 *
	 * @since 1.0.0
	 * @package NRBlocks
	 */
	class NR_Blocks_Category {

		/**
		 * NR_Blocks_Category Instance
		 *
		 * @since 1.0.0
		 * @var NR_Blocks_Category
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
			add_filter( 'block_categories_all', array( $this, 'register_category' ), 10, 2 );
		}

		/**
		 * Register Category
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function register_category( $categories ) {
			return array_merge(
				array(
					array(
						'slug'  => 'button-blocks',
						'title' => __( 'Button Blocks', 'button-blocks' ),
					),
				),
				$categories
			);
		}

		/**
		 * NR_Blocks_Category Instance
		 *
		 * @since 1.0.0
		 * @return NR_Blocks_Category
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}

}

// Initialize the category class
NR_Blocks_Category::get_instance();
