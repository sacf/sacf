# SACF – Scripted Advanced Custom Fields

*SACF* stands for *Scripted Advanced Custom Fields*.
Building upon the [Advanced Custom Fields](https://www.advancedcustomfields.com/) plugin by Elliot Condon this plugin adds OOP API Code for Developers. Now it's possible for versioning your fields and no need for DB-Migrations. Supporting field groups, all pro fields, options pages, the new Gutenberg blocks, third party field plugins and adds some useful functions for templating.

> You still need a license for the official ACF plugin to use SACF!

Be aware that we are creating the field IDs using their slugs.

## Installation

1. Upload to the "wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Create your ACF groups and fields with code!

## Some examples

We're using a fluent interface to chain methods together. Start creating your desired fields and add them to a field group. You'll find additional examples in the ACF Admin Interface.

If you're stuck, use the `help()` function on any group of field class to show a popup window for all available methods within the Wordpress admin interface.

### Create fields

	$field_text = (new text('Text', 'field_text'))->readonly()->append('test');
	$field_textarea = (new textarea('Textarea', 'field_textarea'));
	$field_fc = (new flexcontent('Flex Content', 'field_fc'))
			->add_layout('One', 'field_fc_layout_1')
			->add((new text('Text', 'text')), 'field_fc_layout_1')
			->add((new image('Image', 'text')), 'field_fc_layout_1')

### Create field group

	$custom_group = (new \sacf\group('A custom field group', 'custom_group'))
			->on_front_page()
			->add($field_text)
			->add($field_textarea)
			->add($field_fc)
			->register();

### Create Gutenberg block

	(new block('An example block', 'example_1'))->register();

	$group_block_example = (new group('ACF Gutenberg Block', 'group_block_example'))
			->on_block('example_1')
			->add((new field\text('Text', 'block_text')))
			->register();

### Template helper

Just use this function to automatically render the layout partials of Flex Content fields.

	sacf_get_template_part('field_fc');

## Documentation

Docblock documentation will come soon. Stay tuned...

## Contribution & Support
We primarily created this plugin for our own purposes with more experienced developers in the back of our minds. So if you have something to contribute or found an issue, feel free to open a github issue.

## Available Filters

* Removes admin menu

		add_filter('sacf/admin_menu', '__return_false');

*  Changes default group and field values

		add_filter('sacf/defaults', function($defaults) {
			$defaults['fields']['tab']['placement'] = 'left';
			return $defaults;
		});

* change paths to template partials and includes

		add_filter('sacf/paths', function($paths) {
			$paths['parts-layouts'] = '/template-parts/acf-layouts/';
			return $paths;
		});
