<?php
/**
 * Creates a new flex_content layout module for easier reuse
 * `(new FlexContentModule('mce'))->add(new ACF/Wysiwyg('Text', 'module_mce_text')));`
 * Extend class to create reusable files
 * 
 * @version 2.0.0
 * @since 1.3.0
 * @package sacf
 */

namespace sacf;

/**
 * flexcontentlayout
 */
class flexcontentlayout {

	public $label = ''; ///< label
	public $name = ''; ///< name
	public $key = ''; ///< key
	public $display = ''; ///< display
	public $min = ''; ///< min
	public $max = ''; ///< max
	public $fields = array(); ///< fields
	public $fields_options = array(); ///< field options

	/**
	 * Creates a reusable layout module for FlexContent
	 *
	 * @param string $label The label
	 * @param boolean $name The slug
	 * @param string $display How to display the layout
	 * @param string $min Use module minimum times
	 * @param string $max Use module maximum times
	 * @return sacf\\flexcontentlayout 
	 */
	public function __construct($label, $name = false, $display = 'row', $min = '', $max = '') {
		$this->label = $label;
		$this->name = $name ? sanitize_title($name) : sanitize_title('layout_' . $label);
		$this->key = \sacf\utils::key_layout($name);
		$this->display = $display;
		$this->min = $min;
		$this->max = $max;
		return $this;
	}

	/**
	 * Adds a new field
	 *
	 * @param sacf\\field\\base $field A SACF field
	 * @return sacf\\flexcontentlayout
	 */
	public function add($field) {
		$this->fields[] = $field;
		return $this;
	}

	/**
	 * Adds a new field as option (shows up in new tab)
	 *
	 * @param sacf\\field\\base $field A SACF field
	 * @return sacf\\flexcontentlayout
	 */
	public function add_option($field) {
		$this->fields_options[] = $field;
		return $this;
	}

}
