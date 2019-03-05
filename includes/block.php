<?php

/**
 * Registers a new Gutenberg block
 *
 * @since 2.0.0
 * @package sacf
 * @todo document
 */

namespace sacf;

class block {

    private $args = array();
    private $custom_template_partial = false;

    public function __construct($title, $name=false, $args=array()) {
        $args_default = array(
            'description'		=> 'A custom ACF block.',
			'category'			=> 'common', // common, formatting, layout, widgets, embed
			'icon'				=> 'flag', // https://github.com/WordPress/dashicons/tree/master/svg-min
            'keywords'			=> array(''),
            'render_callback'	=> array($this, 'default_render_callback'),
            'supports'          => array('align' => true, "mode" => true, "html" => true)
        );
        $name = $name ? sanitize_title(preg_replace('/^acf\//i', '', $name)) : sanitize_title($title);
        // parse args
        $args = wp_parse_args(array('title'=>$title, 'name'=>$name), $args);
        $this->args = wp_parse_args($args, $args_default);
        return $this;
    }

    public function description($string) {
        $this->args['description'] = $string;
        return $this;
    }
    public function category($string) {
        $this->args['category'] = $string;
        return $this;
    }
    public function icon($string) {
        $this->args['icon'] = $string;
        return $this;
    }
    public function keywords($array) {
        $this->args['keywords'] = $array;
        return $this;
    }
    public function supports($array) {
        $this->args['supports'] = $array;
        return $this;
    }
    public function render_callback($callback) {
        $this->args['render_callback'] = $callback;
        return $this;
    }

    // use custom files
    public function render_template($file) {
        $this->custom_template_partial = $file;
        return $this;
    }

    // some additional helpers
    public function use_align($bool = true) {
        $this->args['supports']['align'] = $bool;
        return $this;
    }
    public function use_mode($bool = true) {
        $this->args['supports']['mode'] = $bool;
        return $this;
    }
    public function use_html($bool = true) {
        $this->args['supports']['html'] = $bool;
        return $this;
    }

    // register new block
    public function register() {
        add_action('acf/init', function() {
            if (function_exists('acf_register_block')) {
                acf_register_block($this->args);
            }
        });
    }

    // the default render callback that renders template partials from theme-folder/parts/acf-blocks/blockname.php
    public function default_render_callback($block) {
        if ($this->custom_template_partial) {
            $file = $this->custom_template_partial;
        } else {
            // convert name ("acf/block-name") into path friendly slug ("block-name")
            $slug = str_replace('acf/', '', $block['name']);
            // include template partial from theme folder
            $file = get_theme_file_path("/parts/acf-blocks/{$slug}.php");
        }

        if (file_exists($file)) {
            include($file);
        } else {
            echo '<div><p>Template partial not found: ' . $file.'</p></div>';
        }
    }


    // static function to create a new gutenberg block category
    public static function new_category($title, $slug) {
        add_filter( 'block_categories', function($categories, $post) use ($title, $slug) {
            $new_category = array(array(
                    'slug' => $slug,
                    'title' => $title,
                ));
            return array_merge($categories, $new_category);
        }, 10, 2);

    }
}
