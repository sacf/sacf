<?php

/**
 * Includes a template partial for ACF Flex Content or Repeater fields based on field type
 *
 * @param string $field_name 		The ACF field name
 * @param string $slug       		The path and prefix for the template file.
 * @param string $name 		        template partial suffix
 * @param array  $data 				Additional data parameters
 * @param bool   $is_sub_field      if repeater is used as subfield
 */
function sacf_get_template_part($field_name, $slug=null, $name=null, $data=null, $is_sub_field=false) {
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
 */
function sacf_get_sub_template_part($field_name, $slug=null, $name=null, $data = null) {
	sacf_get_template_part($field_name, $slug, $name, $data, true);
}
