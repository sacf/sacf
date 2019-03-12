<?php
/**
 * Default settings
 *
 * @package sacf\utils
 * @version 2.0.0
 * @since 2.0.0
 */

namespace sacf;

class settings {

	/**
	 * Sets defaults path settings
	 *
	 * @return array The paths
	 */
	public static function paths() {
		/**
		 * Filter hook to change defaults paths
		 *
		 * @param array The paths array
		 */
		return apply_filters('sacf/paths', array(
			'layouts' => get_theme_file_path('/includes/sacf-layouts/'),
			'plugins' => get_theme_file_path('/includes/sacf-plugins/'),
			'parts-layouts' => get_theme_file_path('/parts/acf-layouts/'),
			'parts-blocks' => get_theme_file_path('/parts/acf-blocks/'),
		));
	}

	/**
	 * Set default settings for group and fields
	 *
	 * @return array The field layout settings
	 */
	public static function defaults() {
		/**
		 * Filter hook to change defaults field layout settings
		 *
		 * @param array The field array to change the default field settings
		 */
		return apply_filters('sacf/defaults', array(
			'block' => array(
				'category' => 'sacf',
			),
			'group' => array(
				'label_placement' => 'top',
				'instruction_placement' => 'label',
			),
			'fields' => array(
				'buttongroup' => array('layout' => 'horizontal'),
				'checkbox' => array('layout' => 'vertical'),
				'flexcontent' => array('display' => 'block'),
				'group' => array('layout' => 'block'),
				'radio' => array('layout' => 'vertical'),
				'repeater' => array('layout' => 'table'),
				'select' => array('ui' => false),
				'tab' => array('placement' => 'top'),
				'truefalse' => array('ui' => false),
			),
		));
	}
}
