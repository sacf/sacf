<?php

/**
 * Simplify rendering of Flex Content and Repeater field template partials
 * @package sacf/api
 * @version 2.0.0
 * @since 1.3.0
 */

namespace sacf;

/**
 * class templates
 */
class templates {

	/**
	 * Creates path for template files
	 *
	 * @param string $field_name The ACF field name
	 * @param string $slug (optional) The path and prefix for the template file.
	 * @param string $name (optional) Template partial suffix
	 * @return string The path to the template file
	 */
	private static function build_path($field_name, $slug = null, $name = null) {
		$path = '';
		if ($slug === null) {
			// default
			$path = trailingslashit(settings::paths()['parts-layouts']) . $field_name;
		} else if (preg_match('/^(\/.*\/)$/', $slug)) {
			// from root and is path
			$path = get_stylesheet_directory() . $slug . $field_name;
		} else if (preg_match('/^\//', $slug)) {
			// from root and is filename
			$path = get_stylesheet_directory() . $slug . $field_name;
		} else if (preg_match('/\/$/', $slug)) {
			// add path
			$path = trailingslashit(settings::paths()['parts-layouts']) . $slug . $field_name;
		} else {
			// add path and is filename
			$path = trailingslashit(settings::paths()['parts-layouts']) . $slug;
		}

		$name = $name ? '-' . $name : '';
		return $path . $name . '.php';
	}

	/**
	 * Wrapper function to automatically include template partial for Flex Content or Repeater field
	 *
	 * @param string $field_name        The ACF field name
	 * @param string $slug (optional)   The path and prefix for the template file. Different path constructions are possible:
	 *          null, null           => theme/parts/acf/field_name.php
	 *          null, name           => theme/parts/acf/field_name-name.php
	 *          /root/path/          => theme/root/path/field_name.php
	 *          /root/file           => theme/root/file.php
	 *          /root/file, name     => theme/root/file-name.php
	 *          path/subpath/, name  => theme/parts/acf/path/subpath/field_name-name.php
	 *          path/file, name      => theme/parts/acf/path/file-name.php
	 * @param string $name (optional)   Template partial suffix
	 * @param array  $data 				Additional data parameters
	 * @param bool   $is_sub_field      if repeater is used as subfield
	 * @return void|bool
	 */
	public static function get_template_part($field_name, $slug = null, $name = null, $data = null, $is_sub_field = false) {
		// check for subfield
		if ($is_sub_field) {
			$obj = get_sub_field_object($field_name);
		} else {
			$obj = get_field_object($field_name);
		}

		// bail if layout is found
		if ($obj == false) {
			return false;
		}

		switch ($obj['type']) {
		case 'repeater':
			self::get_template_part_repeater($field_name, $slug, $name, $data, $is_sub_field);
			break;
		case 'flexible_content':
			self::get_template_part_flex_content($field_name, $slug, $name, $data, $is_sub_field);
			break;
		default:
			echo '<code class="error">';
			echo '<p>' . __('No matching field type found for:', 'sacf') . ' <strong>' . $field_name() . '</strong><br><small>' . __('Must be repeater or flexible content field.', 'sacf') . '</small></p>';
			echo '</code>';
			break;
		}
	}

	/**
	 * Includes a template partial for ACF Repeater field
	 *
	 * @param string $field_name        The ACF field name
	 * @param string $slug (optional)   The path and prefix for the template file. Different path constructions are possible:
	 *          null, null           => theme/parts/acf/field_name.php
	 *          null, name           => theme/parts/acf/field_name-name.php
	 *          /root/path/          => theme/root/path/field_name.php
	 *          /root/file           => theme/root/file.php
	 *          /root/file, name     => theme/root/file-name.php
	 *          path/subpath/, name  => theme/parts/acf/path/subpath/field_name-name.php
	 *          path/file, name      => theme/parts/acf/path/file-name.php
	 * @param string $name (optional)   Template partial suffix
	 * @param array  $data 				Additional data parameters
	 * @param bool   $is_sub_field      if repeater is used as subfield
	 * @return void|bool
	 */
	public static function get_template_part_repeater($field_name, $slug = null, $name = null, $data = null, $is_sub_field = false) {
		global $post;
		if ($is_sub_field) {
			$data['amount'] = get_sub_field($field_name) ? count(get_sub_field($field_name)) : 0;
		} else {
			$data['amount'] = get_field($field_name) ? count(get_field($field_name)) : 0;
		}

		if (have_rows($field_name)) {
			$index = 0;
			$path = self::build_path($field_name, $slug, $name);
			if (file_exists($path)) {
				while (have_rows($field_name)) {
					the_row();
					$data['index'] = $index;
					include $path;
					$index++;
				}
			} else if (apply_filters('sacf\missing_template', true)) {
				echo '<code class="error">';
				echo '<p>' . __('Missing ACF template partial for repeater layout:', 'sacf') . ' <strong>' . $field_name . '</strong><br><small>' . $path . '</small></p>';
				echo '</code>';
			}

			unset($data['amount']);
			unset($data['index']);
		} else {
			return false;
		}
	}

	/**
	 * Includes a template partial for ACF Flex Content field
	 *
	 * @param string $field_name        The ACF field name
	 * @param string $slug (optional)   The path and prefix for the template file. Different path constructions are possible:
	 *          null, null           => theme/parts/acf/field_name.php
	 *          null, name           => theme/parts/acf/field_name-name.php
	 *          /root/path/          => theme/root/path/field_name.php
	 *          /root/file           => theme/root/file.php
	 *          /root/file, name     => theme/root/file-name.php
	 *          path/subpath/, name  => theme/parts/acf/path/subpath/field_name-name.php
	 *          path/file, name      => theme/parts/acf/path/file-name.php
	 * @param string $name (optional)   Template partial suffix
	 * @param array  $data 				Additional data parameters
	 * @return void|bool
	 */
	public static function get_template_part_flex_content($field_name, $slug = null, $name = null, $data = null, $is_sub_field = false) {
		global $post;

		if ($is_sub_field) {
			$data['amount'] = get_sub_field($field_name) ? count(get_sub_field($field_name)) : 0;
		} else {
			$data['amount'] = get_field($field_name) ? count(get_field($field_name)) : 0;
		}

		if (have_rows($field_name)) {
			$index = 0;
			while (have_rows($field_name)) {
				the_row();
				$path = self::build_path(get_row_layout(), $slug, $name);
				if (file_exists($path)) {
					$data['index'] = $index;
					include $path;
				} else if (apply_filters('sacf\missing_template', true)) {
					echo '<code class="error">';
					echo '<p>' . __('Missing ACF template partial for flex content layout:', 'sacf') . ' <strong>' . get_row_layout() . '</strong><br><small>' . $path . '</small></p>';
					echo '</code>';
				}
				$index++;
			}

			unset($data['amount']);
			unset($data['index']);
		} else {
			return false;
		}
	}
}
