<?php

namespace sacf\field;

////////////////////////////////////
//
// 1. create fields
//
////////////////////////////////////

// common fields
$field_text = (new text('Text', 'field_text'))->readonly()->append('test');
$field_textarea = (new textarea('Textarea', 'field_textarea'));
$field_number = (new number('Number', 'field_number'));
$field_range = (new range('Range', 'field_range'))->help();
$field_url = (new url('URL', 'field_url'));
$field_password = (new password('Password', 'field_password'));

// content fields
$field_image = (new image('Image', 'field_image'));
$field_file = (new file('File', 'field_file'));
$field_wysiwyg = (new wysiwyg('WYSIWYG', 'field_wysiwyg'));
$field_oembed = (new oembed('OEmbed', 'field_oembed'));
$field_gallery = (new gallery('Gallery', 'field_gallery'));

// select fields
$choices = array('1' => 'one', '2' => 'two');
$field_select = (new select('Select', 'field_select'))->choices($choices);
$field_checkbox = (new checkbox('Checkbox', 'field_checkbox'))->choices($choices);
$field_radio = (new radio('Radio', 'field_radio'))->choices($choices);
$field_buttons = (new buttongroup('Button Group', 'field_buttons'))->choices($choices);
$field_toggle = (new truefalse('TrueFalse', 'field_truefalse'));

// relation fields
$field_link = (new link('Link', 'field_link'));
$field_object = (new postobject('Post Object', 'field_object'));
$field_pagelink = (new pagelink('Page Link', 'field_pagelink'));
$field_relation = (new relationship('Relationship', 'field_relationship'));
$field_taxonomy = (new taxonomy('Taxonomy', 'field_taxonomy'));
$field_user = (new user('User', 'field_user'));

// jquery fields
$field_map = (new googlemap('Google Map', 'field_googlemap'));
$field_date = (new datepicker('Date Picker', 'field_datepicker'));
$field_datetime = (new datetimepicker('Date Time Picker', 'field_datetimepicker'));
$field_time = (new timepicker('Time Picker', 'field_timepicker'));
$field_color = (new colorpicker('Color Picker', 'field_colorpicker'));

// conditional example
$conditional_toggle_1 = (new truefalse('Toggle 1', 'conditional_toggle_1'))->ui();
$conditional_toggle_2 = (new truefalse('Toggle 2', 'conditional_toggle_2'))->ui();
$conditional_toggle_3 = (new truefalse('Toggle 3', 'conditional_toggle_3'))->ui();
$conditional_text = (new text('Text', 'conditional_text'))
	->if($conditional_toggle_1)
	->and('conditional_toggle_2') // or use the name as string
	->or($conditional_toggle_3);

// layout fields
// basic message
$layout_message = (new message('Message'))->message('A message to the editor.');
$layout_accordion = (new accordion('Accordion: Group, Repeater, Flex Content'));
$layout_tab = (new tab('Common Fields'));
$layout_group = (new group('Group', 'layout_group'))
	->add((new text('Text', 'layout_group__text')))
	->add((new image('Image', 'layout_group__image')));
$layout_repeater = (new repeater('Repeater', 'layout_repeater'))->min(2)
	->add((new text('Text', 'layout_repeater__text')))
	->add((new image('Image', 'layout_repeater__image')));
$layout_fc = (new flexcontent('Flex Content', 'layout_fc'))
	->add_layout('One', 'layout_fc__one')
	->add((new text('Text', 'layout_fc_one__text')), 'layout_fc__one')
	->add((new image('Image', 'layout_fc_one__image')), 'layout_fc__one')
	->add_layout('Two', 'layout_fc__two')
	->add((new number('Number', 'layout_fc_two__number')), 'layout_fc__two')
	->add((new range('Range', 'layout_fc_two__range')), 'layout_fc__two');

////////////////////////////////////
//
// 2. create field group and add fields
//
////////////////////////////////////

// creates field group
$group_fields = (new \sacf\group('fields SACF', 'group_fields'))
	->on_front_page()

	->add($field_text)
	->add($field_textarea)
	->add($field_number)
	->add($field_range)
	->add($field_url)
	->add($field_password)

	->add($field_image)
	->add($field_file)
	->add($field_wysiwyg)
	->add($field_oembed)
	->add($field_gallery)

	->add($field_select)
	->add($field_checkbox)
	->add($field_radio)
	->add($field_buttons)
	->add($field_toggle)

	->add($field_link)
	->add($field_object)
	->add($field_pagelink)
	->add($field_relation)
	->add($field_taxonomy)
	->add($field_user)

	->add($field_map)
	->add($field_date)
	->add($field_datetime)
	->add($field_time)
	->add($field_color)

	->add($conditional_toggle_1)
	->add($conditional_toggle_2)
	->add($conditional_toggle_3)
	->add($conditional_text)

	->add($layout_message)
	->add($layout_accordion)
	->add($layout_group)
	->add($layout_repeater)
	->add($layout_fc)

	->register();
