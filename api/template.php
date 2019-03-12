<?php

/**
 * Some templating helper functions
 * @package sacf\api
 */

/**
 * Includes a template partial for ACF Flex Content or Repeater fields based on field type
 *
 * @param string $field_name 		The ACF field name
 * @param string $slug (optional)   The path and prefix for the template file. Different path constructions are possible:
 *          null, null           => theme/parts/acf/field_name.php
 *          null, name           => theme/parts/acf/field_name-name.php
 *          /root/path/          => theme/root/path/field_name.php
 *          /root/file           => theme/root/file.php
 *          /root/file, name     => theme/root/file-name.php
 *          path/subpath/, name  => theme/parts/acf/path/subpath/field_name-name.php
 *          path/file, name      => theme/parts/acf/path/file-name.php
 * @param string $name 		        Template partial suffix
 * @param array  $data 				Additional data parameters
 * @param bool   $is_sub_field      If repeater is used as subfield
 * @return void
 */
function sacf_get_template_part($field_name, $slug = null, $name = null, $data = null, $is_sub_field = false) {
	\sacf\templates::get_template_part($field_name, $slug, $name, $data, $is_sub_field);
}

/**
 * Includes a template partial for ACF Flex Content or Repeater fields when being a subfield
 * Shorthand for sacf_get_template_part($field_name, $path_context, $data, TRUE)
 *
 * @param string $field_name 		The ACF field name
 * @param string $slug       		The path and prefix for the template file.
 * @param string $name 		        template partial suffix
 * @param array  $data 				Additional data parameters
 * @return void
 */
function sacf_get_sub_template_part($field_name, $slug = null, $name = null, $data = null) {
	sacf_get_template_part($field_name, $slug, $name, $data, true);
}

/**
 * Return the selected label of a field
 *
 * @param string $field_name The fields name
 * @return string
 */
function sacf_get_field_label($field_name) {
	$field = get_field_object($field_name);
	$value = get_field($field_name);
	return $field['choices'][$value];
}

/**
 * Return the selected label of a field
 *
 * @param string $field_name The subfields name
 * @return string
 */
function sacf_get_sub_field_label($field_name) {
	$field = get_sub_field_object($field_name);
	$value = get_sub_field($field_name);
	return $field['choices'][$value];
}
