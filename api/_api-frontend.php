<?php 


function sacf_get_fields($field_group="", $id = null) {
	if ($id == null) {
		$id = get_the_id();
	}
	$fields = get_fields($id);

	if ($fields) {
		echo "<code><ul>";
		foreach($fields as $field_name => $field_data) {
			if (!empty($field_name)) {
				$field = get_field_object($field_name);
				if (!empty($field_group)) {
					
					$metas = get_post_meta(get_the_id());
					foreach ($metas as $key => $value) {
						//echo $key;
						//echo strpos($key, $field_group, 0) === 0 . '<br>';
						// if ( strpos($key, $field_group, 0) === 0 ) {
						// 	echo $key . '<br>';
						// }
					}
			 		//echo "&lt;?php SmartACF::render('".$field_name."', '". $field_group."') ><br>";
				} else {
					echo '<li>' . $field_name . ' <small>type: ' . $field['type'] . '</small></li>';
				}
			}
		}
		echo "</ul></code>";	
	}
}

/**
 * Returns the label of a select field
 *
 * @param string $field_name The ACF field name
 */
function sacf_get_field_label($field_name) {
	$field = get_field_object($field_name);
	$value = get_field($field_name);
	return $field['choices'][ $value ];
}



/**
 * Returns the label of a select field within repeater/flex content field
 *
 * @param string $field_name The ACF field name
 */
function sacf_get_sub_field_label($field_name) {
	$field = get_sub_field_object($field_name);
	$value = get_sub_field($field_name);
	return $field['choices'][ $value ];
}



/**
 * Includes a template partial for ACF Flex Content or Repeater fields based on field type
 *
 * @param string $field_name 		The ACF field name
 * @param string $path_context 		The path and prefix for the template file.
 * @param array  $data 				Additional data parameters
 */
function sacf_get_template_part($field_name, $path_context = null, $data = null, $is_sub_field = false) {
	if ($is_sub_field) {
		$obj = get_sub_field_object($field_name);
	} else {
		$obj = get_field_object($field_name);
	}

	// no partial selected yet
	if ($obj == false) {
		return false;
	}

	switch ($obj['type']) {
		case 'repeater':
			\Neonpastell\SmartACF\TemplatePart::sacf_get_template_part_repeater($field_name, $path_context, $data, $is_sub_field);
			break;
		case 'flexible_content':
			\Neonpastell\SmartACF\TemplatePart::sacf_get_template_part_flex($field_name, $path_context, $data, $is_sub_field);
			break;	
		default:
			echo '<code class="error"><p>No matching field type found for: <strong>'.$field_name.'</strong><br><small>(must be repeater or flexible content field)</small></p></code>';
			break;
	}
}

/**
 * Includes a template partial for ACF Flex Content or Repeater fields when being a subfield
 * Shorthand for sacf_get_template_part($field_name, $path_context, $data, TRUE)
 *
 * @param string $field_name 		The ACF field name
 * @param string $path_context 		The path and prefix for the template file.
 * @param array  $data 				Additional data parameters
 */
function sacf_get_sub_template_part($field_name, $path_context = null, $data = null) {
	sacf_get_template_part($field_name, $path_context, $data, true);
}