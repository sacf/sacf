<?php

namespace sacf\field\plugin;

class address extends generic {

    private $defaults = array(
            'output_type' => 'html',
			'address_layout' => '[
                    [{"id":"street1","label":"Street 1"}],
                    [{"id":"street2","label":"Street 2"}],
                    [{"id":"street3","label":"Street 3"}],
                    [
                        {"id":"city","label":"City"},
                        {"id":"state","label":"State"},
                        {"id":"zip","label":"Postal Code"},
                        {"id":"country","label":"Country"}
                    ],
                    []
                ]',
			'address_options' => '{
                    "street1":{
                        "id":"street1","label":"Street 1","defaultValue":"","enabled":true,"cssClass":"street1","separator":""
                    },
                    "street2":{
                        "id":"street2","label":"Street 2","defaultValue":"","enabled":true,"cssClass":"street2","separator":""
                    },
                    "street3":{
                        "id":"street3","label":"Street 3","defaultValue":"","enabled":true,"cssClass":"street3","separator":""
                    },
                    "city":{
                        "id":"city","label":"City","defaultValue":"","enabled":true,"cssClass":"city","separator":","
                    },
                    "state":{
                        "id":"state","label":"State","defaultValue":"","enabled":true,"cssClass":"state","separator":""
                    },
                    "zip":{
                        "id":"zip","label":"Postal Code","defaultValue":"","enabled":true,"cssClass":"zip","separator":""
                    },
                    "country":{
                        "id":"country","label":"Country","defaultValue":"","enabled":true,"cssClass":"country","separator":""
                    }
                }',
        );

    private $fields = array();
    private $layout = array();


    public function __construct($label, $name=false, $type='address') {
        parent::__construct($label, $name, $type);
    }

    /**
     * @help: set the output type: html, array, object
     */
    public function output_type($string) {
        $this->defaults['output_type'] = $string;
        return $this;
    }

    /**
     * @help: set the target-size: thumbnail sizes ar availible, or "custom". if custom is selected, width and height need to be set.
     */
    public function address_layout($string) {
        $this->defaults['address_layout']= $string;
        return $this;
    }

    /**
     * @help: restricts file dimensions in px
     */
    public function address_options($int) {
        $this->defaults['address_options'] = $int;
        return $this;
    }

    public function add($key = 'street', $value = '"id":"street1","label":"Street 1","defaultValue":"","enabled":true,"cssClass":"street1","separator":""') {
        $this->fields[$key] = $value;
    }

    public function layout($array) {

    }


    private function create_fields_string() {
        $options = '{';
        foreach ($this->fields as $key => $value) {
            $options .= '"'.$key.'":{'.$value.'}';
        }
        $options .= '}';
        $this->defaults['address_options'] = $options;
    }

    private function create_layout_string() {

    }

    /**
     * creates field array
     */
    public function make() {
        $args = parent::make();
		$args = wp_parse_args($args, $this->defaults);
		return $args;
    }

}
