# Changelog

## 2.0.5 - 2023-08-16
* various fixes
* fixes PHP 8.2 deprecation warning

## 2.0.4 - 2022-04-20
* add enable_opacity and return_format to colorpicker field
* update docs and defaults
* fixed missing groups in gutenberg blocks when their name was in snake_case
* updates links on about page

## 2.0.3 - 2021-10-11
* fixed save_format overwrote the return_format
* fixed deprecated block_categories hook since WP 5.8

## 2.0.2
* fixed accordion field
* fixed message field
* fixed sacf_get_template_part
* readded flexcontentmodule
* added css function to base class

## 2.0.1
* fixed googlemaps field type
* fixed number and range field
* fixed block to use correct params

## 2.0.0
* initial public build
* rebuild whole plugin for publishing
* got rid of unused code
* renamed and restructured namespaces

## 1.4.0
* changed field key generation
* added update process for db changes

## 1.3.1
* Undo fixes from 1.3.0 because they broke Repeater and FlexContent
* Minor refactoring

## 1.3.0
* added .smartacfrc configuration API
* Fix key generation for Repeater and FlexContent sub fields with the same name

## 1.2.1
* updated check for existing ACF #1
* added group location option based on page path

## 1.2.0
* added TimePicker Field
* added DateTimePicker Field
* added Group copy
* fixed bug in DatePicker Field
* fixed bugs

## 1.1.0
* added frontend API helper functions:
* added sacf_get_template_part() and sacf_get_sub_template_part()
* added sacf_get_field_label() and sacf_get_sub_field_label()

## 1.0.2
* fixed bugs for legacy support

## 1.0.1
* fixed bugs for legacy support

## 1.0.0
* fixed group location/restrictions
* fixed group ordering
* added method chaining
* added helper functions for backend and frontend
* added generic fieldplugin class
* added warning if ACF is not activated
* rebuild all fields based on ACF Pro v5.2.7

## 0.2.0
fixes and addons

## 0.1.0
Initial release.
