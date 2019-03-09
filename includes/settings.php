<?php

/**
 * Default settings
 *
 * @since 2.0.0
 * @package sacf
 */

namespace sacf;

class settings {
	public static $paths = array();

	// sets defaults paths
	public static function paths() {
		return apply_filters('sacf/paths', array(
			'layouts' => get_theme_file_path('/includes/sacf-layouts/'),
			'plugins' => get_theme_file_path('/includes/sacf-plugins/'),
			'parts-layouts' => get_theme_file_path('/parts/acf-layouts/'),
			'parts-blocks' => get_theme_file_path('/parts/acf-blocks/'),
		));
	}

	// set default settings for group and fields
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
