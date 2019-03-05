<?php

/**
 * hides the ACF admin menu
 */
function sacf_hide_admin() {
    add_filter('sacf/show_admin', '__return_false');
    add_filter('acf/settings/show_admin', '__return_false');
}


/**
 * shows all fields
 */
function sacf_get_fields($id=null) {
    echo '<pre>';
    var_dump(get_fields($id));
    echo '</pre>';
}


/**
 * shows all groups
 */
function sacf_get_groups() {
    $groups = acf_get_field_groups();
    echo '<pre>';
    var_dump($groups);
    echo '</pre>';
}



/**
 * shows all fields on page
 *
 * @param int $id The Post ID
 * @param string $group_id The field groups id
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
                echo '<th>'.$field_name.'</th>';
                echo '<td>'.$field['type'].'</td>';
                echo '<td><div class="sacf-debug-table__value">';
                var_dump($field['value']);
                echo '</div></td>';
                echo '<td>'.$field['parent'].'</td>';
                echo '</tr>';
            }
        }
        echo '</table></pre>';
    }
}



/**
 * shows all fields from a group
 *
 * @param string $name The field groups name
 * @param int $id The Post ID
 */
function sacf_debug_fields_in_group($name, $id=null) {
    sacf_debug_fields($id, \sacf\utils::key_group($name));
}
