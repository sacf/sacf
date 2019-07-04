<?php
/**
 * Default settings
 *
 * @package sacf/utils
 * @version 2.0.0
 * @since 2.0.0
 */

namespace sacf;

/**
 * settings
 */
class settings {

	/**
	 * Sets defaults path settings
	 * Filter hook to change defaults paths
	 * @return array The paths
	 */
	public static function paths() {
		return apply_filters('sacf/paths', array(
			'layouts' => get_theme_file_path('/includes/sacf-layouts/'),
			'plugins' => get_theme_file_path('/includes/sacf-plugins/'),
			'parts-layouts' => get_theme_file_path('/parts/acf-layouts/'),
			'parts-blocks' => get_theme_file_path('/parts/acf-blocks/'),
		));
	}

	/**
	 * Set default settings for group an^ fields
	 * Filter hook to change defaults field layout settings
	 * @return array The field layout settings
	 */
	public static function defaults() {
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
