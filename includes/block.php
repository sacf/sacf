<?php

/**
 * Registers a new Gutenberg block
 *
 * @since 2.0.0
 * @package sacf
 */

namespace sacf;

/**
 * a gutenberg block
 */
class block {


	private $args = array(); ///< args
	private $custom_template_partial = false; ///< flag: custom template partial

	/**
	 * Creates a new gutenberg block for ACF field groups
	 *
	 * @param string $title The block title
	 * @param boolean $name (optional) The blocks name
	 * @param array $args (optional) Custom arguments
	 */
	public function __construct($title, $name = false, $args = array()) {
		$args_default = array(
			'description' => 'A custom ACF block.',
			'category' => 'common', // common, formatting, layout, widgets, embed
			'icon' => 'flag', // https://github.com/WordPress/dashicons/tree/master/svg-min
			'keywords' => array(''),
			'render_callback' => array($this, 'default_render_callback'),
			'supports' => array('align' => true, "mode" => true, "html" => true),
		);
		$name = $name ? sanitize_title(preg_replace('/^acf\//i', '', $name)) : sanitize_title($title);
		// parse args
		$args = wp_parse_args(array('title' => $title, 'name' => str_replace('_', '-', $name)), $args);
		$this->args = wp_parse_args($args, $args_default);
		return $this;
	}

	/**
	 * Sets block description
	 *
	 * @param string $string
	 * @return sacf/block
	 */
	public function description($string) {
		$this->args['description'] = $string;
		return $this;
	}

	/**
	 * Sets block category
	 *
	 * @param string $string
	 * @return sacf/block
	 */
	public function category($string) {
		$this->args['category'] = $string;
		return $this;
	}

	/**
	 * Sets block icon
	 *
	 * @param string $string
	 * @return sacf/block
	 */
	public function icon($string) {
		$this->args['icon'] = $string;
		return $this;
	}

	/**
	 * Sets block keywords
	 *
	 * @param array $array
	 * @return sacf/block
	 */
	public function keywords($array) {
		$this->args['keywords'] = $array;
		return $this;
	}

	/**
	 * Sets block support modes
	 *
	 * @param array $array What to support: array('align' => true, "mode" => true, "html" => true),
	 * @return sacf/block
	 */
	public function supports($array) {
		$this->args['supports'] = $array;
		return $this;
	}

	/**
	 * An array of post types to restrict this block type to
	 *
	 * @param array $array
	 * @return sacf\block
	 */
	public function post_types(array $array) {
		$this->args['post_types'] = $array;
		return $this;
	}

	/**
	 * Sets blocks mode
	 *
	 * @param string $string auto | preview | edit
	 * @return sacf\block
	 */
	public function mode($string) {
		$this->args['mode'] = $string;
		return $this;
	}

	/**
	 * Sets blocks alignment
	 *
	 * @param string $string full | wide | left | center | right
	 * @return sacf\block
	 */
	public function align($string) {
		$this->args['align'] = $string;
		return $this;
	}

	/**
	 * The url to a .css file to be enqueued whenever your block is displayed (front-end and back-end).
	 *
	 * @param string $string
	 * @return sacf\block
	 */
	public function enqueue_style($string) {
		$this->args['enqueue_style'] = $string;
		return $this;
	}

	/**
	 * The url to a .js file to be enqueued whenever your block is displayed (front-end and back-end).
	 *
	 * @param string $string
	 * @return sacf\block
	 */
	public function enqueue_script($string) {
		$this->args['enqueue_script'] = $string;
		return $this;
	}

	/**
	 * Sets a custom callback function
	 *
	 * @param string $callback
	 * @return sacf/block
	 */
	public function render_callback($callback) {
		$this->args['render_callback'] = $callback;
		return $this;
	}

	/**
	 * Sets a custom rendering template
	 *
	 * @param string $file
	 * @return sacf/block
	 */
	public function render_template($file) {
		$this->custom_template_partial = $file;
		return $this;
	}

	/**
	 * Use align
	 *
	 * @param bool $bool
	 * @return sacf/block
	 */
	public function use_align($bool = true) {
		$this->args['supports']['align'] = $bool;
		return $this;
	}

	/**
	 * Use mode
	 *
	 * @param bool $bool
	 * @return sacf/block
	 */
	public function use_mode($bool = true) {
		$this->args['supports']['mode'] = $bool;
		return $this;
	}

	/**
	 * Use html
	 *
	 * @param bool $bool
	 * @return sacf/block
	 */
	public function use_html($bool = true) {
		$this->args['supports']['html'] = $bool;
		return $this;
	}

	/**
	 * Registers the new block
	 *
	 * @return void
	 */
	public function register() {
		add_action('acf/init', function () {
			if (function_exists('acf_register_block_type')) {
				acf_register_block_type($this->args);
			}
		});
	}

	/**
	 * The default render callback that renders template partials from theme-folder/parts/acf-blocks/blockname.php
	 *
	 * @param array $block The WP block
	 * @param string $content The rendered WP block
	 * @param bool $is_preview
	 * @param int $post_id The post ID
	 * @return void
	 */
	public function default_render_callback($block, $content = '', $is_preview = false, $post_id = 0) {
		if ($this->custom_template_partial) {
			$file = $this->custom_template_partial;
		} else {
			// convert name ("acf/block-name") into path friendlier slug ("block-name")
			$slug = str_replace('acf/', '', $block['name']);
			// include template partial from theme folder
			$file = get_theme_file_path("/parts/acf-blocks/{$slug}.php");
		}

		// include file or show missing template info
		if (file_exists($file)) {
			include $file;
		} else {
			echo '<div><p>Template partial not found: ' . $file . '</p></div>';
		}
	}

	/**
	 * Static function to create a new gutenberg block category
	 *
	 * @param string $title The gutenberg block category title
	 * @param string $slug The gutenberg block category slug
	 * @return void
	 */
	public static function new_category($title, $slug) {
		global $wp_version;
		$hook_name = version_compare($wp_version, '5.8') >= 0 ? 'block_categories_all' : 'block_categories';
		add_filter($hook_name, function ($categories) use ($title, $slug) {
			$new_category = array(array(
				'slug' => $slug,
				'title' => $title,
			));
			return array_merge($categories, $new_category);
		}, 10, 1);

	}
}
