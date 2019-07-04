<?php

namespace sacf;

// creates group
(new group('Field group label', 'field_group_name'))

// set location
->on('post_type', '==', 'page')

// add fields
->add((new field\text('Text field', 'text')))
	->add((new image('Image', 'field_image')))

// register field group
	->register();
