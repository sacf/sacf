<?php
/**
 * Some util functions
 *
 * @package sacf/utils
 */

namespace sacf;

/**
 * a utility class with helper functions
 */
class utils {

	private static $css_added = false;	///< admin css for help popups

	/** 
	 * hashing method for key generation
	 * @param  string $str some field name
	 * @return string      field_key_hash
	 */
	private static function key($str) {
		return md5($str);
	}
	
	/**
	 * hashing method for group keys
	 *
	 * @param string $str some group name
	 * @return string group_key_hash
	 */
	public static function key_group($str) {
		return 'group_' . self::key($str);
	}
	
	/**
	 * hashing method for field keys
	 *
	 * @param string $str some field name
	 * @return string field_key_hash
	 */
	public static function key_field($str) {
		return 'field_' . self::key($str);
	}
	
	/**
	 * hashing method for flexcontent layout keys
	 *
	 * @param string $str some field name
	 * @return string flexcontent_layout_key_hash
	 */
	public static function key_layout($str) {
		return 'layout_' . self::key($str);
	}

	/**
	 * Displays some help for field groups
	 * @param class $class The `sacf\group` class
	 * @return void
	 */
	public static function help_for_group($class) {
		// bail for non admins
		if (!user_can(wp_get_current_user(), 'manage_options') || !is_admin()) {
			return;
		}

		add_filter('acf/get_field_group', function ($field_group) use ($class) {
			if ($field_group['key'] === $class->get_key()) {
				$message = self::create_help_table($class);
				$field_group['title'] .= self::create_tooltip($message);
			}
			return $field_group;
		}, 10, 1);
	}

	/**
	 * Displays some help for a field
	 * @param class $class The `sacf\field` class
	 * @return void
	 */
	public static function help_for_field($class) {
		// bail for non admins
		if (!user_can(wp_get_current_user(), 'manage_options') || !is_admin()) {
			return;
		}

		// adds code message to label via filter
		add_filter('acf/get_field_label', function ($label, $field) use ($class) {
			if ($field['key'] === $class->get_key()) {
				$message = self::create_help_table($class);
				$label .= self::create_tooltip($message);
			}
			return $label;
		}, 10, 2);
	}

	/**
	 * adds css to admin head
	 *
	 * @return void
	 */
	private static function add_global_css() {
		// bail if css is already added
		if (self::$css_added) {
			return;
		}

		self::$css_added = true;
		add_action('admin_head', function () {
			echo '<style type="text/css">
                .sacf-help__tip {
                    position: absolute;
                    visibility: hidden;
                    opacity: 0;
                    transition: opacity 0.25s ease-in 0s, visibility 0s linear 0.25s;
                    z-index: 99999;
                    left: 120%;
                    top: 4px;
                    width: 50vw;
                    min-width: 300px;
                    max-width: 700px;
                    box-shadow: 0 3px 30px rgba(25, 30, 35, 0.1);
                    border: 1px solid #e2e4e7;
                    background: #fff;
                    padding: 1.5em 0;
                    line-height: 1.6;
                    transform: translateY(-50%);
                    font-size: 0.9em;
                    font-weight: normal;
                    display: table;
                    cursor: auto;
                }
                .sacf-help__tip:before, .sacf-help__tip:after { content: ""; position: absolute; height: 0; width: 0; line-height: 0; }
                .sacf-help__tip:before { border: 8px solid #e2e4e7; top: 50%; }
                .sacf-help__tip:after { border: 8px solid #fff; top: 50%; left: 2px; }
                .sacf-help__tip:before, .sacf-help__tip:after { border-right-style: solid; border-top-color: transparent; border-bottom-color: transparent; border-left: none; margin-left: -9px; }
                .sacf-help { position: relative; display: inline-block; margin-left: 0.5em; }
                .sacf-help:hover .sacf-help__tip { visibility: visible; opacity: 1; transition: opacity 0.25s ease-out 1s, visibility 0s linear 1s; }
                .sacf-help svg { width: 18px; height: 18px; bottom: -5px; position: relative; }
                .sacf-help dl { display: table-row; }
                .sacf-help dl:nth-child(even) { background-color: #fafafa; }
                .sacf-help dt { display: table-cell; padding: 0.1em 1.6em; font-family: monospace; font-weight: 600;}
                .sacf-help dd { display: table-cell; padding: 0.1em 1.6em; margin: 0; }
                </style>';
		});
	}

	/**
	 * create the tooltip shown by the help function
	 *
	 * @param string $message the help message
	 * @return void
	 */
	private static function create_tooltip($message) {
		self::add_global_css();
		$string = '<div class="sacf-help">';
		$string .= '<svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-info-outline" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g transform="translate(192 48)"><path d="M-187.148-31.646l6.721-6.72c0.671-0.672,0.671-1.76,0-2.432c-0.672-0.672-1.76-0.672-2.432,0l-7.91,7.91c-0.344,0.342-0.51,0.793-0.504,1.24c-0.006,0.448,0.16,0.896,0.504,1.239l7.91,7.91c0.67,0.671,1.76,0.671,2.432,0c0.673-0.672,0.671-1.76,0-2.432L-187.148-31.646L-187.148-31.646z"/><path d="M-161.23-33.239l-7.91-7.91c-0.672-0.672-1.76-0.672-2.433,0c-0.672,0.67-0.672,1.76,0,2.43l6.72,6.719l-6.72,6.721c-0.672,0.671-0.672,1.759,0,2.431c0.67,0.672,1.759,0.672,2.433,0l7.91-7.91c0.342-0.342,0.51-0.791,0.504-1.24C-160.723-32.448-160.891-32.897-161.23-33.239z"/><path d="M-175.76-21.995c-0.168,1.022-1.131,1.715-2.154,1.547l0,0c-1.021-0.168-1.713-1.134-1.545-2.154l3.188-19.404c0.168-1.021,1.133-1.713,2.153-1.545l0,0c1.021,0.168,1.713,1.131,1.545,2.154L-175.76-21.995z"/></g></svg>';
		$string .= '<div class="sacf-help__tip">' . $message . '</div>';
		$string .= '</div>';
		return $string;
	}

	/**
	 * creates dev notice from class files
	 *
	 * @param class $class
	 * @return void
	 */
	private static function create_help_table($class) {
		$prod_class = new \ReflectionClass($class);
		$public_methods = $prod_class->getMethods(\ReflectionMethod::IS_PUBLIC);
		$message_string = '';
		foreach ($public_methods as $method) {
			if (!(
				$method->getName() == '__construct' ||
				$method->getName() == 'make_key' ||
				$method->getName() == 'make' ||
				$method->getName() == 'get_key' ||
				$method->getName() == 'help'
			)) {
				$message_string .= '<dl>';
				$message_string .= '<dt>' . $method->getName() . '()</dt>';
				$message_string .= '<dd>' . self::getDocComment($method->getDocComment(), '@help') . '</dd>';
				$message_string .= '</dl>';
			}
		}
		return $message_string;
	}

	/**
	 * get tagged lines from doc blocks, e.g. `@help`
	 *
	 * @param string $str 	the message
	 * @param string $tag	the tag
	 * @return void
	 */
	private static function getDocComment($str, $tag = '') {
		if (empty($tag)) {
			return $str;
		}
		$matches = array();
		preg_match("/" . $tag . ":(.*)(\\r\\n|\\r|\\n)/U", $str, $matches);
		if (isset($matches[1])) {
			return trim($matches[1]);
		}
		return '';
	}

}
