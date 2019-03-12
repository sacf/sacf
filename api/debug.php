<?php

/**
 * Some helper debug functions
 * @package sacf\api
 */

/**
 * Hides the ACF and SACF admin menu
 *
 * @return void
 */
function sacf_hide_admin() {
	add_filter('sacf/show_admin', '__return_false');
	add_filter('acf/settings/show_admin', '__return_false');
}

/**
 * Returns an array containing all field groups
 *
 * @param boolean $all_groups (optional) Toggle between all ACF groups or only those registered via SACF
 * @return array
 */
function sacf_get_groups($all_groups = false) {
	$groups = [];
	foreach (acf_get_field_groups() as $group) {
		if (isset($group['local_sacf']) || $all_groups) {
			$groups[] = $group;
		}
	}
	return $groups;
}

/**
 * Show all registered Groups
 *
 * @param boolean $all_groups (optional) Toggle between all ACF groups or only those registered via SACF
 * @return void
 */
function sacf_debug_groups($all_groups = false) {
	echo '<pre>';
	var_dump(sacf_get_groups($all_groups));
	echo '</pre>';
}

/**
 * Shows all fields on a certain page within a group
 *
 * @param int $id (optional) The Post ID
 * @param string $group_id (optional) An optional field group id
 * @return void
 */
function sacf_debug_fields($id = null, $group_id = false) {
	$fields = get_fields($id);
	if ($fields) {
		echo '<style>.sacf-debug-table {text-align:left; border-spacing: 5px;}';
		echo '.sacf-debug-table tr {vertical-align:top; border-bottom:1px solid lightgray;}';
		echo '.sacf-debug-table__value {max-height:200px; overflow:auto;}';
		echo '</style>';
		echo '<pre>';
		if ($group_id) {
			echo 'in group: <strong>' . $group_id . '</strong>';
		}
		echo '<table class="sacf-debug-table">';
		echo '<thead><tr><th>name</th><th>type</th><th>value</th><th>group</th></tr></thead>';
		foreach ($fields as $field_name => $field_value) {
			$field = get_field_object($field_name);
			if ($group_id === false || $group_id === $field['parent']) {
				echo '<tr>';
				echo '<th>' . $field_name . '</th>';
				echo '<td>' . $field['type'] . '</td>';
				echo '<td><div class="sacf-debug-table__value">';
				var_dump($field['value']);
				echo '</div></td>';
				echo '<td>' . $field['parent'] . '</td>';
				echo '</tr>';
			}
		}
		echo '</table></pre>';
	}
}

/**
 * Shows all fields from a group
 *
 * @param string $name The field groups name
 * @param int $id (optional) The Post ID
 * @return void
 */
function sacf_debug_fields_in_group($name, $id = null) {
	sacf_debug_fields($id, \sacf\utils::key_group($name));
}
