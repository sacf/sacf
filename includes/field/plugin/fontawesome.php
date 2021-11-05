<?php

/**
 * Select a Font Awsome Icon
 *
 * @since 2.1.0
 * @version 1.0.0
 * @package sacf/fields/plugins
 */

namespace sacf\field\plugin;

/**
 * Select Field: Font Awesome icon
 * https://wordpress.org/plugins/advanced-custom-fields-font-awesome/
 */
class fontawesome extends generic {

	protected $defaults = array(
		'icon_sets' => array(0 => 'far'), // array('fas', 'far', 'fab')
		'custom_icon_set' => '',
		'default_label' => '',
		'default_value' => '',
		'save_format' => 'element',
		'allow_null' => 0,
		'show_preview' => 1,
		'eunqueue_fa' => 0,
		'fa_live_preview' => '',
		'choices' => array(),
	); ///< defaults

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'font-awesome') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * Set which icons to load
	 *
	 * @param array $array <code>array('fas', 'far', 'fab')</code>
	 * @return void
	 */
	public function icon_sets($array = array('fas', 'far', 'fab')) {
		$this->options['icon_sets'] = $array;
		return $this;
	}

	/**
	 * Set a custom icon set
	 *
	 * @param string $string
	 * @return void
	 */
	public function custom_icon_set($string) {
		$this->options['custom_icon_set'] = $string;
		return $this;
	}

	/**
	 * Set a default icon
	 *
	 * @param string $style The icon_sets style <code>fas</code>, <code>far</code>, ...
	 * @param string $unicode The icons unicode <code>f0eb</code>, ...
	 * @param string $icon The icons class <code>fa-lightbulb</code>, ...
	 * @return void
	 */
	public function default_icon($style, $unicode, $icon) {
		$this->options['default_label'] = '&lt;i class="'.$style.'"&gt;&amp;#x'.$unicode.';&lt;/i&gt; '.$icon.'';
		$this->options['default_value'] = $style . ' ' . $icon;
		return $this;
	}

	/**
	 * Specify the returned value on front end
	 *
	 * @param string $string <code>element</code>, <code>class</code>, <code>unicode</code>, <code>object</code>
	 * @return void
	 */
	public function save_format($string = 'class') {
		$this->options['save_format'] = $string;
		return $this;
	}

	/**
	 * Alias for save_format
	 */
	public function return_value($string = 'class') {
		return $this->save_format($string);
	}

	/**
	 * if you have to set an icon
	 *
	 * @param bool $bool
	 * @return void
	 */
	public function allow_null($bool = true) {
		$this->options['allow_null'] = $bool;
		return $this;
	}

	/**
	 * Set to 'Yes' to include a larger icon preview on any admin pages using this field.
	 *
	 * @param bool $bool
	 * @return void
	 */
	public function show_preview($bool = true) {
		$this->options['show_preview'] = $bool;
		return $this;
	}

	/**
	 * Set to 'Yes' to enqueue FA in the footer on any pages using this field.
	 *
	 * @param bool $bool
	 * @return void
	 */
	public function eunqueue_fa($bool = true) {
		$this->options['eunqueue_fa'] = $bool;
		return $this;
	}
}
