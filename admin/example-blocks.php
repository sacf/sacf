<?php

namespace sacf;

////////////////////////////////////
//
// 1. create gutenberg blocks
//
////////////////////////////////////

// creates new block: uses template partial in /theme-path/parts/acf-blocks/block-name
$sacf_block_1 = (new block('An example block', 'example_1'))
    ->register();

// creates new block: uses custom template partial in /theme-path/...
$sacf_block_2 = (new block('An example block', 'example_2'))
    ->render_template(get_theme_file_path("/parts/acf-blocks/custom-block-template.php"))
    ->register();

// creates new block: uses custom callback method for rendering
$sacf_block_3 = (new block('An example block', 'example_3'))
    ->render_callback('\Neonpastell\SmartACF\custom_block_render_callback_example')
    ->register();

// a custom callback
function custom_block_render_callback_example($block) {
    if (file_exists(get_theme_file_path("/parts/acf-blocks/custom-example.php"))) {
        include(get_theme_file_path("/parts/acf-blocks/custom-example.php"));
    } else {
        echo 'file not found: ' . get_theme_file_path("/parts/acf-blocks/custom-example.php");
    }
}

////////////////////////////////////
//
// 2. create group and set location to block
//
////////////////////////////////////

// creates field group with fields
$group_block_example = (new group('ACF Gutenberg Block', 'group_block_example'))
        ->on_block('example_1')
        ->add((new field\text('text', 'block_text')))
        ->register();
