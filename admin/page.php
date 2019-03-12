<?php

/**
 * The SACF settings page
 * @ignore
 */

namespace sacf\admin;

// renders an example php file
function render_example($filename) {
	$file = trailingslashit(dirname(__FILE__)) . $filename;
	$output = '<pre><code>';
	$output .= file_exists($file) ? htmlentities(file_get_contents($file)) : 'File "' . $file . '" not found.';
	$output .= '</code></pre>';
	echo $output;
}
?>
<style>
    .sacf pre code {
        display: block;
        padding: 1em;
        overflow: auto;
    }
</style>
<div class="wrap sacf">
    <h1>SACF Examples</h1>
    <?php settings_errors();?>

    <?php $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'welcome';?>
    <h2 class="nav-tab-wrapper">
        <a href="?post_type=acf-field-group&page=sacf-options&tab=welcome"   class="nav-tab <?php echo $active_tab == 'welcome' ? 'nav-tab-active' : ''; ?>">Welcome</a>
        <a href="?post_type=acf-field-group&page=sacf-options&tab=groups"    class="nav-tab <?php echo $active_tab == 'groups' ? 'nav-tab-active' : ''; ?>">Groups</a>
        <a href="?post_type=acf-field-group&page=sacf-options&tab=fields"    class="nav-tab <?php echo $active_tab == 'fields' ? 'nav-tab-active' : ''; ?>">Fields</a>
        <a href="?post_type=acf-field-group&page=sacf-options&tab=plugins"   class="nav-tab <?php echo $active_tab == 'plugins' ? 'nav-tab-active' : ''; ?>">Fields Plugins</a>
        <a href="?post_type=acf-field-group&page=sacf-options&tab=blocks"    class="nav-tab <?php echo $active_tab == 'blocks' ? 'nav-tab-active' : ''; ?>">Blocks</a>
        <a href="?post_type=acf-field-group&page=sacf-options&tab=fclayouts" class="nav-tab <?php echo $active_tab == 'fclayouts' ? 'nav-tab-active' : ''; ?>">Flex Content Layouts</a>
        <a href="?post_type=acf-field-group&page=sacf-options&tab=frontend"  class="nav-tab <?php echo $active_tab == 'frontend' ? 'nav-tab-active' : ''; ?>">Frontend API</a>
    </h2>

    <?php
$file = trailingslashit(dirname(__FILE__)) . 'page__' . $active_tab . '.php';
if (file_exists($file)) {
	include_once $file;
}
?>
</div>
