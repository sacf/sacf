<?php

/**
 * Registers a new ACF options page
 *
 * @since 2.0.0
 * @package sacf
 */

namespace sacf;

/**
 * optionspage
 */
class optionspage {

	private $args = array(); ///< args array

	/**
	 * Creates a new ACF options page
	 *
	 * @param string $menu_title The page menu title
	 * @param boolean $menu_slug (optional) The optional page slug
	 * @param array $args (optional) Custom arguments
	 */
	public function __construct($menu_title, $menu_slug = false, $args = array()) {
		$args_default = array(
			'capability' => 'edit_posts',
			'position' => false,
			'icon_url' => false,
			'parent_slug' => false,
			'redirect' => true,
			'post_id' => 'options',
			'autoload' => false,
			'update_button' => 'Update',
			'updated_message' => 'Options Updated',
		);
		$page_title = $menu_title;
		$menu_slug = $menu_slug ? $menu_slug : sanitize_title('acf-options-' . $menu_title);
		// parse args
		$args = wp_parse_args($args, array('menu_title' => $menu_title, 'page_title' => $page_title, 'menu_slug' => $menu_slug));
		$this->args = wp_parse_args($args, $args_default);
		return $this;
	}

	/**
	 * Set an individual page title
	 *
	 * @param string $string
	 * @return `sacf\optionspage`
	 */
	public function page_title($string) {
		$this->args['page_title'] = $string;
		return $this;
	}

	/**
	 * Set your own capabilities
	 *
	 * @param string $string
	 * @return `sacf\optionspage`
	 */
	public function capability($string) {
		$this->args['capability'] = $string;
		return $this;
	}

	/**
	 * Set capabilities to show page only for admins: manage_options
	 *
	 * @return `sacf\optionspage`
	 */
	public function is_admin() {
		return $this->capability('manage_options');
	}

	/**
	 * Set a different menu position https://developer.wordpress.org/reference/functions/add_menu_page/#menu-structure
	 *
	 * @param int $int (optional)
	 * @return `sacf\optionspage`
	 */
	public function position($int = 50) {
		$this->args['position'] = $int;
		return $this;
	}

	/**
	 * Set an individual menu icon https://developer.wordpress.org/resource/dashicons/#carrot
	 *
	 * @param string $string (optional)
	 * @return `sacf\optionspage`
	 */
	public function icon($string = 'dashicons-edit') {
		$this->args['icon_url'] = $string;
		return $this;
	}

	/**
	 * Set as subpage of a page slug
	 *
	 * @param string $string
	 * @return `sacf\optionspage`
	 */
	public function parent($string) {
		if ($string instanceof \sacf\optionspage) {
			$this->args['parent_slug'] = $string->get_slug();
		} else {
			$this->args['parent_slug'] = $string;
		}
		return $this;
	}

	/**
	 * Set to false if you also want to use the main page when subpages are available
	 *
	 * @param bool $bool (optional)
	 * @return `sacf\optionspage`
	 */
	public function redirect($bool = false) {
		$this->args['redirect'] = $bool;
		return $this;
	}

	/**
	 * Registers the options page
	 *
	 * @return `sacf\optionspage`
	 */
	public function register() {
		if (function_exists('acf_add_options_page')) {
			acf_add_options_page($this->args);
		}
		return $this;
	}

	/**
	 * Returns the menu_slug
	 *
	 * @return string
	 */
	public function get_slug() {
		return $this->args['menu_slug'];
	}
}
