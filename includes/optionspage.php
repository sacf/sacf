<?php

/**
 * Registers a new ACF options page
 *
 * @since 2.0.0
 * @package sacf
 */

namespace sacf;

class optionspage {

    private $args = array();

	public function __construct($menu_title, $menu_slug=false, $args=array()) {
        $args_default = array(
            'capability'	=> 'edit_posts',
            'position'		=> false,
            'icon_url' 		=> false,
            'parent_slug' 	=> false,
            'redirect'		=> true,
            'post_id'       => 'options',
            'autoload'      => false,
            'update_button' =>'Update',
            'updated_message'=>'Options Updated',
        );
        $page_title = $menu_title;
        $menu_slug = $menu_slug ? $menu_slug : sanitize_title('acf-options-'.$menu_title);
        // parse args
        $args = wp_parse_args($args, array('menu_title'=>$menu_title, 'page_title'=>$page_title, 'menu_slug'=>$menu_slug));
        $this->args = wp_parse_args($args, $args_default);
        return $this;
    }

    // set an individual page title
    public function page_title($string) {
        $this->args['page_title'] = $string;
        return $this;
    }

    // set your own capabilities
    public function capability($string) {
        $this->args['capability'] = $string;
        return $this;
    }

    // helper to set capabilities for admins: manage_options
    public function is_admin() {
        return $this->capability('manage_options');
    }

    // set a different menu position https://developer.wordpress.org/reference/functions/add_menu_page/#menu-structure
    public function position($int = 50) {
        $this->args['position'] = $int;
        return $this;
    }

    // set an individual menu icon https://developer.wordpress.org/resource/dashicons/#carrot
    public function icon($string = 'dashicons-edit') {
        $this->args['icon_url'] = $string;
        return $this;
    }

    // set as subpage of a page slug
    public function parent($string) {
        if ($string instanceof \sacf\optionspage) {
            $this->args['parent_slug'] = $string->get_slug();
        } else {
            $this->args['parent_slug'] = $string;
        }
        return $this;
    }

    // set to false if you also want to use the main page when subpages are available
    public function redirect($bool = false) {
        $this->args['redirect'] = $bool;
        return $this;
    }

    // registers the options page
    public function register() {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page($this->args);
        }
        return $this;
    }


    // returns the menu_slug
    public function get_slug() {
        return $this->args['menu_slug'];
    }
}
