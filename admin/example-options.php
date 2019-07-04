<?php

namespace sacf;

////////////////////////////////////
//
// 1. create options pages
//
////////////////////////////////////

/**
 * creates options pages
 */
$options_main = (new optionspage('Options page', 'acf-options-main'))
	->redirect(false)
	->register();

/**
 * sets custom icons and positions
 */
$options_main_2 = (new optionspage('Options page 2', 'acf-options-main-2'))
	->icon('dashicons-admin-settings')
	->position(100)
	->register();


/**
 * creates options subpages: uses menu_slug
 */
(new optionspage('Options subpage 1', 'acf-options-main-subpage'))
	->parent('acf-options-main')
	->register();

/**
 * creates options subpages: uses optionspage instance
 */
(new optionspage('Options subpage 2'))
	->parent($options_main)
	->register();


/**
 * creates an options page for existing menu items
 */
(new optionspage('Options for pages'))
	->parent('edit.php?post_type=page')
	->is_admin()
	->register();

////////////////////////////////////
//
// 2. create group and set location to options page
//
////////////////////////////////////

/**
 * uses options menu_slug as location
 */
(new group('Options Group Main', 'group_options_main'))
	->on_options('acf-options-main')
	->add((new field\text('Text on options page', 'options_text_1')))
	->register();

/**
 * uses options instance
 */
(new group('Options Group Main 2', 'group_options_main_2'))
	->on_options($options_main_2)
	->add((new field\text('Text on options page 2', 'options_text_2')))
	->register();
