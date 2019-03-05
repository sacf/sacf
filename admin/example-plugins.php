<?php

namespace sacf\field;

// a generic field to add a plugin
$field_generic      = (new plugin\generic('Text', 'universal', 'audioVideo'))
                        ->options(array(
                                'library' => 'all',
                                'general_type' => 'both',
                                'allowed_types' => '',
                                'min_size' => '',
                                'max_size' => '',
                                'return_format' => 'html',
                        ));

// or create your own plugin files and setup field
$field_audiovideo   = (new plugin\audiovideo('Text', 'audiovideo'));
$field_imagecrop    = (new plugin\imagecrop('Image Crop', 'imagecrop'));
$field_gform        = (new plugin\gravityform('Gravity Form', 'gform'));

// create field group
$group_fields   = (new \sacf\group('fields SACF Plugins', 'group_fields_plugins'))
                ->on_post_type('page')
                ->add($field_generic)
                ->add($field_audiovideo)
                ->add($field_imagecrop)
                ->add($field_gform)
                ->register();
