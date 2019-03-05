=== Smart ACF ===

Author: Neonpastell GmbH
Author URI: http://www.neonpastell.de
Plugin URI: https://bitbucket.org/neonpastell/wp-smart-acf
Tags: tinymce, wordpress
Requires at least: 4.0
Stable tag: trunk
Version: 1.3.1

ACF, but smarter! Building upon the <a href="http://www.advancedcustomfields.com" target="blank">Advanced Custom Fields</a> plugin by Elliot Condon this plugin adds OOP API Code for Developers.

## Description

You can create your ACF groups and fields with OOP-Code.
Now its possible for versioning your fields and no need for DB-Migrations.

== Installation ==

1. Upload to the "wp-content/plugins/" directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Create your ACF group and fields via code!

== .smartacfrc ==

You can use a json file to overwrite field and group defaults, e.g.:

```json
{
    "Group": {
        "label_placement": "top"
    },
    "Fields": {
        "ACF": {
            "Tab": {
                "placement": "left"
            }
        }
    }
}
```

Save this json file to your theme folder as `smartacfrc.json`, `smartacfrc`, `smartacf`, `.smartacfrc.json`, `.smartacfrc` or `.smartacf`.

== Screenshots ==
N/A

== Changelog ==


= 1.3.1 =
* Undo fixes from 1.3.0 because they broke Repeater and FlexContent
* Minor refactoring

= 1.3.0 =
* added .smartacfrc configuration API
* Fix key generation for Repeater and FlexContent sub fields with the same name

= 1.2.1 =
* updated check for existing ACF #1
* added group location option based on page path

= 1.2.0 =
* added TimePicker Field
* added DateTimePicker Field
* added Group copy
* fixed bug in DatePicker Field
* fixed bugs

= 1.1.0 =
* added frontend API helper functions:
* added sacf_get_template_part() and sacf_get_sub_template_part()
* added sacf_get_field_label() and sacf_get_sub_field_label()

= 1.0.2 =
* fixed bugs for legacy support

= 1.0.1 =
* fixed bugs for legacy support

= 1.0.0 =
* fixed group location/restrictions
* fixed group ordering
* added method chaining
* added helper functions for backend and frontend
* added generic fieldplugin class
* added warning if ACF is not activated
* rebuilt all fields based on ACF Pro v5.2.7

= 0.2.0 =
fixes and addons

= 0.1.0 =
Initial release.
