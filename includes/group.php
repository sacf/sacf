<?php

/**
 * Registers a new field group
 *
 * @since 2.0.0
 * @package sacf
 */

namespace sacf;


/**
 * The group class holds the fields
 */
class group {

	private $fields = array(); ///< fields
	private $location = array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'post'))); ///< where is this grop shown
	private $is_default_location = true;
	private $defaults = array(
		'menu_order' => 0,
		'position' => 'normal', // side
		'style' => 'default', // seamless
		'label_placement' => 'top', // left
		'instruction_placement' => 'label', // field
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
		'local_sacf' => true, // adds local sacf value
		'show_in_rest' => 0,
	);
	public $label; ///< the groups title
	public $name; ///< the groups id
	public $key; ///< the groups key
	protected static $group_count = 0; ///< group count for menu order

	/**
	 * Creates a new ACF field group
	 *
	 * @param string $title The field groups title
	 * @param boolean $name (optional) The field groups name
	 */
	public function __construct($title, $name = false) {
		$this->label = $title;
		$this->name = $name ? sanitize_title($name) : sanitize_title($title);
		$this->key = utils::key_group($this->name);

		self::$group_count++;
	}

	/**
	 * Sets manually sorting of field groups
	 * @param int $int 0, 1, 2, ...
	 * @return sacf/group
	 */
	public function menu_order($int) {
		$this->defaults['menu_order'] = $int;
		return $this;
	}
	/**
	 * Sets group position
	 * @param string $string (optional) Available values: `normal`, `acf_after_title`, `side`
	 * @return sacf/group
	 */
	public function position($string = 'side') {
		$this->defaults['position'] = $string;
		return $this;
	}

	/**
	 * Sets fieldgroup box style
	 * @param string $string (optional) Available values: `default`, `seamless`
	 * @return sacf\\group
	 */
	public function style($string = 'seamless') {
		$this->defaults['style'] = $string;
		return $this;
	}
	/**
	 * Sets label placement
	 * @param string $string (optional) Available values: `top`, `left`
	 * @return sacf/group
	 */
	public function label_placement($string = 'left') {
		$this->defaults['label_placement'] = $string;
		return $this;
	}

	/**
	 * Sets instruction placement
	 * @param string $string (optional) Available values: `label`, `field`
	 * @return sacf/group
	 */
	public function instruction_placement($string = 'field') {
		$this->defaults['instruction_placement'] = $string;
		return $this;
	}

	/**
	 * Hides other meta boxes
	 * @param array $array  e.g. `array (	0 => 'permalink', 1 => 'the_content', 2 => 'excerpt', 3 => 'custom_fields', 4 => 'discussion', 5 => 'comments', 6 => 'revisions', 7 => 'slug', 8 => 'author', 9 => 'format', 10 => 'page_attributes', 11 => 'featured_image', 12 => 'categories', 13 => 'tags', 14 => 'send-trackbacks' );`
	 * @return sacf/group
	 */
	public function hide_on_screen($array) {
		$this->defaults['hide_on_screen'] = $array;
		return $this;
	}

	/**
	 * Activates field group
	 * @param bool $bool (optional)
	 * @return sacf/group
	 */
	public function active($bool = true) {
		$this->defaults['active'] = $bool;
		return $this;
	}
	/**
	 * Deactivates field group
	 * @param bool $bool (optional)
	 * @return sacf/group
	 */
	public function inactive($bool = false) {
		return $this->active($bool);
	}
	
	/**
	 * Show this field group in the rest api
	 * @param bool $bool (optional)
	 * @return sacf/group
	 */
	public function show_in_rest($bool = true) {
		$this->defaults['show_in_rest'] = $bool;
		return $this;
	}

	/**
	 * Sets group description
	 * @param string $string description string
	 * @return sacf/group
	 */
	public function description($string) {
		$this->defaults['description'] = $string;
		return $this;
	}

	/**
	 * Creates on location array partial
	 *
	 * @param string $p The parameter
	 * @param string $o The operator
	 * @param string $v The value
	 * @return array
	 */
	private function create_location_logic($p, $o, $v) {
		return array('param' => $p, 'operator' => $o, 'value' => $v);
	}

	/**
	 * Shows field group on specified location
	 *
	 * @todo what should the default location do?
	 * @param string $p The parameter, eg.: post_type
	 * @param string $o The operator, eg.: ==
	 * @param string $v The value, eg.: project
	 * @return group
	 */
	public function location($p, $o = '==', $v = 'post') {
		// directly set array
		if (is_array($p)) {
			$this->location = $p;
			$this->is_default_location = false;
			return $this;
		} else if ($this->is_default_location) {
			// reset default location
			$this->location = array();
			$this->is_default_location = false;
		}
		$this->location[][] = $this->create_location_logic($p, $o, $v);
		return $this;
	}

	/**
	 * Alias for location($p, $o, $v)
	 *
	 * @param string $p The parameter, eg.: post_type
	 * @param string $o The operator, eg.: ==
	 * @param string $v The value, eg.: project
	 * @return group
	 */
	public function on($p, $o, $v) {
		return $this->location($p, $o, $v);
	}
	/**
	 * Adds an AND rule to location setting
	 * @param string $p The parameter, eg.: post_type
	 * @param string $o The operator, eg.: ==
	 * @param string $v The value, eg.: project
	 * @return sacf/group
	 */
	public function and($p, $o, $v) {
		$this->location[sizeof($this->location) - 1][] = $this->create_location_logic($p, $o, $v);
		return $this;
	}
	/**
	 * Adds an OR rule to location setting
	 * @param string $p The parameter, eg.: post_type
	 * @param string $o The operator, eg.: ==
	 * @param string $v The value, eg.: project
	 * @return sacf/group
	 */
	public function or($p, $o, $v) {
		return $this->location($p, $o, $v);
	}

	/**
	 * clone field group for reuse
	 *
	 * @param string $new_label
	 * @param string $new_name
	 * @return void
	 * @todo checkout - ask mo?
	 */
	public function copy($new_label, $new_name) {
		$new_obj = unserialize(serialize($this));
		$new_obj->name = $new_name;
		$new_obj->label = $new_label;
		self::$group_count++;
		return $this;
	}

	/**
	 * Adds a field to this group
	 * @param sacf\\field\\base $field A SACF field
	 * @return sacf\\group
	 */
	public function add($field) {
		$this->fields[] = $field;
		return $this;
	}

	/**
	 * Registers a fieldgroup with ACFs acf_add_local_field_group function
	 * @return sacf\\group
	 */
	public function register() {
		if (function_exists('acf_add_local_field_group')) {
			acf_add_local_field_group($this->make());
		}
		return $this;
	}

	/**
	 * creates array for fieldgroup
	 *
	 * @return array
	 */
	private function make() {
		$arr = array();
		$arr['title'] = $this->label;
		$arr['key'] = $this->key;
		foreach ($this->fields as $field) {
			$arr['fields'][] = $field->make_key($this->name)->make();
		}
		$arr['location'] = $this->location;
		// @todo @deprecated ???
		$arr['menu_order'] = $this->defaults['menu_order'] ? $this->defaults['menu_order'] : self::$group_count;

		do_action("sacf_after_group_make", $this->fields);
		return wp_parse_args($arr, $this->defaults);
	}

	/**
	 * Shows fieldgroup on post type
	 * @param string $v The post type slug
	 * @return sacf\\group
	 */
	public function on_post_type($v = 'post') {
		return $this->on('post_type', '==', $v);
	}
	/**
	 * Shows fieldgroup on post template
	 * @param string $v The post template slug
	 * @return sacf\\group
	 */
	public function on_post_template($v = 'default') {
		return $this->on('post_template', '==', $v);
	}
	/**
	 * Shows fieldgroup on page template
	 * @param string $v The page template slug
	 * @return sacf\\group
	 */
	public function on_page_template($v = 'default') {
		return $this->on('page_template', '==', $v);
	}
	/**
	 * Shows fieldgroup on front page
	 * @return sacf\\group
	 */
	public function on_front_page() {
		return $this->on('page_type', '==', 'front_page');
	}
	/**
	 * Shows fieldgroup in ACF Gutenberg block
	 * @param string $v The block slug
	 * @return sacf\\group
	 */
	public function on_block($v) {
		$v = preg_replace('/^acf\//', '', $v);
		return $this->on('block', '==', 'acf/' . sanitize_title(str_replace('_', '-', $v)));
	}
	/**
	 * Shows fieldgroup on options page
	 * @param string $v The options page slug
	 * @return sacf\\group
	 */
	public function on_options($v) {
		// get options slug
		if ($v instanceof \sacf\optionspage) {
			$v = $v->get_slug();
		}
		return $this->on('options_page', '==', $v);
	}
	/**
	 * Shows fieldgroup on user page
	 * @param string $v The user form page
	 * @return sacf\\group
	 */
	public function on_user_form($v = 'all') {
		return $this->on('user_form', '==', $v);
	}
	/**
	 * Shows fieldgroup only for certain roles
	 * @param string $v The users role
	 * @return sacf\\group
	 */
	public function on_user_role($v = 'administrator') {
		return $this->on('user_role', '==', $v);
	}
	/**
	 * Shows fieldgroup only on attachments
	 * @return sacf\\group
	 */
	public function on_attachment() {
		return $this->on('attachment', '==', 'image');
	}

	/**
	 * Returns the groups unique key
	 * @return string
	 */
	public function get_key() {
		return $this->key;
	}

	/**
	 * Displays all useful functions for this class in admin interface
	 * @return sacf\\group
	 */
	public function help() {
		\sacf\utils::help_for_group($this);
		return $this;
	}

	/**
	 * Var_dumps groups data array for debuggin
	 * @return sacf\\group
	 */
	public function dump() {
		$groups = $this->make();
		var_dump($groups);
		return $this;
	}

	/**
	 * @todo Implement method from ACF to export local php files
	 */
	public function export() {
		return $this;
	}

}
