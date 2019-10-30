<?php

/**
 * File: address
 *
 * @package sacf/fields
 * @since 2.0.0
 * @version 2.0.0
 * @todo better documentation is needed
 * @todo remove empty functions?
 *
 */

namespace sacf\field\plugin;

/**
 * Input Field: Address
 */

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
	);  ///< defaults
	private $fields = array(); ///< subfields of this field
	private $layout = array(); ///< layout of this field

	/**
	 * Constructor method
	 *
	 * @param string $label Label for this field
	 * @param string $name Name for this field (optional - sanitized label if empty)<br>Used in <code>get_field('field_name')</code>
	 * @param string $type type of this field
	 */
	public function __construct($label, $name = false, $type = 'address') {
		parent::__construct($label, $name, $type);
	}

	/**
	 * set the output type
	 *
	 * @param string $string <code>html</code>, <code>array</code>, <code>object</code>
	 * @return void
	 */
	public function output_type($string) {
		$this->defaults['output_type'] = $string;
		return $this;
	}

	/**
	 * set the address layout
	 *
	 * @param string $string
	 * @return void
	 */
	public function address_layout($string) {
		$this->defaults['address_layout'] = $string;
		return $this;
	}

	/**
	 * set the adress options
	 *
	 * @param int $int
	 * @return void
	 */
	public function address_options($int) {
		$this->defaults['address_options'] = $int;
		return $this;
	}

	/**
	 * add an adress
	 *
	 * @param string $key
	 * @param string $value value as json?
	 * @return void
	 */
	public function add($key = 'street', $value = '"id":"street1","label":"Street 1","defaultValue":"","enabled":true,"cssClass":"street1","separator":""') {
		$this->fields[$key] = $value;
	}

	/**
	 * layout
	 *
	 * @param array $array
	 * @return void
	 */
	public function layout($array) {
		//Todo
	}

	/**
	 * create_fields_string
	 *
	 * @return void
	 */
	private function create_fields_string() {
		$options = '{';
		foreach ($this->fields as $key => $value) {
			$options .= '"' . $key . '":{' . $value . '}';
		}
		$options .= '}';
		$this->defaults['address_options'] = $options;
	}

	/**
	 * create layout string
	 *
	 * @return void
	 */
	private function create_layout_string() {
		//Todo
	}

	/**
	 * create fields array
	 *
	 * @return void
	 */
	public function make() {
		$args = parent::make();
		$args = wp_parse_args($args, $this->defaults);
		return $args;
	}

}
