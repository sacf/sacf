<?php
/*
Plugin Name: SACF
Plugin URI: https://bitbucket.org/neonpastell/wp-smart-acf
Description: ACF, but scripted! Building upon the <a href="http://www.advancedcustomfields.com" target="blank">Advanced Custom Fields</a> plugin by Elliot Condon this plugin adds OOP API Code for Developers.
Author: Manuel Piepereit, Moritz Jacobs, Neonpastell GmbH
Author URI: http://www.neonpastell.de/
Version: 2.0.0-alpha-1
Text Domain: sacf
Domain Path: /lang
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if (!class_exists('sacf')) :


class sacf {

    function __construct() {}

    function initialize() {

        // warn and bail on missing ACF
        if (!$this->acf_check()) {
            return;
        }

        // define constant
        if (!defined('SACF')) {
            define('SACF', true);
        }

        // field builder files
        require_once('includes/settings.php');
        require_once('includes/utils.php');
        require_once('includes/autoloader.php');

        // frontend functions
        require_once('api/class-templates.php');
        require_once('api/template.php');
        require_once('api/debug.php');

        add_action('init', array($this, 'load_l10n'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
    }

    /**
     * Loads i18n files for theme
     * @return void
     */
    public function load_l10n() {
        load_plugin_textdomain('sacf', false, basename(dirname(__FILE__)) . '/lang/');
    }

    /**
     * Adds an submenu page to the ACF admin menu for displaying code examples
     * @return void
     */
    public function add_admin_menu() {
        // bail if admin_menu is disabled
        if (!apply_filters('sacf/show_admin', true)) {
            return;
        }
        add_submenu_page(
            'edit.php?post_type=acf-field-group',
            'SACF options',
            'SACF',
            'manage_options',
            'sacf-options',
            function() {
                require_once('admin/page.php');
            }
        );
    }


    // checks for existing ACF
    private function acf_check() {
        if (!defined('ACF')) {
            add_action('admin_notices', function() {
                echo '<div class="notice error"><p>';
                echo __( 'To use SACF you need to activate', 'sacf' ) . ' <a href="https://www.advancedcustomfields.com/">Advanced Custom Fields</a>.';
                echo '</p></div>';
            });
            return false;
        }
        return true;
    }
}

function sacf() {
	global $sacf;
	if (!isset($sacf)) {
		$sacf = new sacf();
		$sacf->initialize();
	}
	return $sacf;
}


// initialize
sacf();

endif; // class_exists check
