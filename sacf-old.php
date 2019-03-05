<?php

namespace sacf {
    require_once("includes/settings.php");
	require_once("includes/autoloader.php");
	require_once("includes/Utils.php");
}

namespace {

	// check for activated ACF Plugin and exit
	if (!class_exists('ACF')) {
		add_action('admin_notices', function() {
            echo "<div class=\"error notice is-dismissible\"><h3>Warning</h3><p>Advanced Custom Fields is not activated</p></div>";
        });
        return;
    }

    // define constant
	if (!defined('SACF')) {
		define('SACF', true);
	}

	// include frontend api and helper functions
	require_once("api/template-part.php");
	require_once("api/api-frontend.php");

	// is an array asscociative?
	function is_assoc($arr) {
		return array_keys($arr) !== range(0, count($arr) - 1);
	}


	// render a field or array of fields (repeater) using a partial in /parts/acf/
	function render($field_name, $field_group="all") {
		$get = get($field_name);
		$data = $get['field'];
		$type = $get['type'];
		$object = $get['object'];

		switch($type) {
		case "repeater":
			$index = 0;
			foreach($data as $field) {
				render_single($field, $field_name, $field_group, $index);
				$index++;
			}
			break;
		default:
			// list of fields
			if (is_array($data) && (!is_assoc($data))) { // && sizeof($data) > 1)) {
				foreach($data as $field) {
					$template_type = $field['acf_fc_layout'];
					render_single($field, $template_type, $field_group."--".$field_name);
				}


				// single field
			} else {
				render_single($data, $field_name, $field_group);
			}
		}
	}



	// echo field content
	function e($field_name, $ignore=null) {
		$field = get_field($field_name);
		if (is_array($field)) {
			print_r($field);
		} else {
			echo $field;
		}
	}



	// render function
	function render_single($data, $field_name, $field_group, $index = 0) {
		if (!is_array($data)) {
			echo $data;
			return false;
		}


		$include_file = "/parts/acf/".$field_group."--".$field_name.".php";
		$include_path = get_template_directory().$include_file;

		$data['index'] = $index;
		if (file_exists($include_path)) {
			include($include_path);
		} else {
			if (is_array($data)) {
				$data["missing-template"] = $include_file;
			} else {
				$data = "missing-template: " . $include_file . "<br>\n" . $data;
			}
			include(__DIR__."/views/default.php");
		}
	}


	// get all fields of this page as array
	function get_all($id) {
		return get_fields($id);
	}



	// get render-html without echo
	function get_render($field_name, $field_group="") {
		ob_start();
		render($field_name, $field_group);
		$ret = ob_get_contents();
		ob_end_clean();
		return $ret;
	}



	// wrapper function for get_field()
	function get($field_name) {
		$obj = get_field_object($field_name);
		$type = $obj['type'];
		$val = $obj['value'];

		return array(
			'type' => $type,
			'field' => $val,
			'object' => $obj,
		);

	}


	// render all fields automatically
	function all_render($id, $field_group="all") {
		$fields = get_all($id);
		// print_r($fields);
		foreach($fields as $field_name => $field_data) {
			if (!empty($field_name))
				render($field_name, $field_group);
		}
	}


	// get ::render code for all fields of this type
	function all_code($id, $field_group="") {
		$fields = get_all($id);

		echo "<div class='debug-info'>";
		foreach($fields as $field_name => $field_data) {
			if (!empty($field_name)) {
				if (!empty($field_group)) {
					echo "&lt;?php SmartACF::render('".$field_name."', '". $field_group."'); ?><br>";
				} else {
					echo "&lt;?php SmartACF::render('".$field_name."'); ?><br>";
				}
			}
		}
		echo "</div>";
	}

	/**
	 * displays code for all available fields on this page
	 */
	function sacf_help($id = null) {
		$fields = get_field_objects();
		echo '<code class="debug-info">';
		foreach($fields as $field_name => $field) {
			if (!empty($field_name)) {
				$value = $field['value'];
				if ( is_array($value) ) {
					$value = 'is_array';
				}
				echo "<p>";
				echo "<b>&lt;?php the_field('$field_name'); ?></b><br>";
				echo "<small>field-type: <b>" . $field['type'] . "</b><br>field-id: <b>" . $field['key'] . "</b></small><br>";
				echo "<small>field-value: <b>" . $value . "</b></small><br>";
				echo "</p>";
			}
		}
		echo '</code>';
	}
}
