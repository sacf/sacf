<?php

/**
 * Creates a new flex_content module for easier reuse
 *
 * @version 1.0.0
 * @since 2.1.0
 * @package sacf
 *
 * @example (new \sacf\flexcontentmodule('mce'))->add(new \sacf\field\wysiwyg('Text', 'module_mce_text')));
 * @example Extend class to create reusable files
 */

namespace sacf;

/**
 * flexcontentmodule
 */
class flexcontentmodule {

	public $label = ''; ///< label
	public $name = ''; ///< name
	public $display = ''; ///< display
	public $fields = array();  ///< fields
	public $options = array(); ///< options
	
	/**
	 * Create a new flexcontentmodule of a given type
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $display how to display this field
	 * @param int  	 $min minimum amount of fields
	 * @param int    $max maximum amount of fields
	 */
	public function __construct($label, $name=false, $display='row', $min='', $max='') {
		$this->label = $label;
		$this->name = $name ? sanitize_title($name) : sanitize_title('module_'.$label);
		$this->display = $display;
		$this->min = $min;
		$this->max = $max;
		return $this;
	}
	
	/**
	 * add a new field to the module
	 *
	 * @param sacf\field $field
	 */
	public function add($field) {
		$this->fields[] = $field;
		return $this;
	}
	
	/**
	 * add a new option to the module
	 *
	 * @param option $option
	 */
	public function add_option($option) {
		$this->options[] = $option;
		return $this;
	}

}

/* Example for reusable class:
namespace sacf\field;
use \sacf\flexcontentmodule;

class SACFModuleText extends flexcontentmodule {

	public function __construct($label = 'Text', $name=false, $display='row', $min='', $max='') {
		parent::__construct($label, $name, $display, $min, $max);

		$options_width = array(
			'default' => "default",
			'narrow' => "narrow",
			'wide' => "wide",
			'full' => "full",
		);
		$options_color = array(
			'default' => "default",
			'light' => "light",
			'dark' => "dark",
		);

		$title = (new Text('Title', $this->name . '_title'));
		$text = (new Wysiwyg('Text', $this->name . '_text'))->media_upload(false);
		$type_width = (new Radio('Width', $this->name . '_options_width'))
			->layout('horizontal')->default_value('default')->choices($options_width);
		$type_color = (new Radio('Text color', $this->name . '_options_color'))
			->layout('horizontal')->default_value('default')->choices($options_color);
		$is_inactive = (new TrueFalse('Deactivate', $this->name . '_is_inactive'))->default_value(0)->ui(true)->instructions('hides module without deleting it');

		$this->add($title);
		$this->add($text);
		$this->add_option($type_width);
		$this->add_option($type_color);
		$this->add_option($is_inactive);
	}
}
*/
