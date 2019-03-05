<?php

/**
 * Layout field: Group
 * @version 2.0.0
 */

namespace sacf\field;

class group extends base {

	private $sub_fields = array();
	protected $defaults = array(
            'layout' => 'block'
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'group');
	}

	/**
	 * @help: set default group layout: row, table, block
	 */
	public function layout($string) {
		$this->options['layout'] = $string;
		return $this;
	}

	/**
	 * @help: add a field to a group: add($field_var)
	 */
	public function add($field) {
		$this->sub_fields[] = $field;
		return $this;
	}

	/**
	 * creates sub fields array for group
	 */
	private function makeSubFields() {
		$fields = array();
		foreach($this->sub_fields as $field) {
			$fields[] = $field->make_slug($this->slug)->make();
		}
		return $fields;
    }

	/**
	 * creates field array
	 */
    public function make() {
		$args = parent::make();
        $args['sub_fields'] = $this->makeSubFields();
		return $args;
	}

}
