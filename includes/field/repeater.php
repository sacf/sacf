<?php

/**
 * Field: Repeater
 * @version 2.0.0
 */

namespace sacf\field;

class repeater extends base {

	private $sub_fields = array();

    protected $defaults = array(
            'min' => '',
            'max' => '',
            'layout' => 'row',
            'collapsed' => '',
            'button_label' => '',
        );

	public function __construct($label, $name=false) {
		parent::__construct($label, $name, 'repeater');
	}

	/**
	 * @help: set minimum rows as int
	 */
	public function min($int) {
		$this->options['min'] = $int;
		return $this;
	}
	/**
	 * @help: set maximum rows as int
	 */
	public function max($int) {
		$this->options['max'] = $int;
		return $this;
	}
	/**
	 * @help: set repeater layout: row, table, block
	 */
	public function layout($string) {
		$this->options['layout'] = $string;
		return $this;
	}

    /**
     * @help: select a sub field to show when row is collapsed by passing it's field-name
     * @todo replace collapsed key with
     */
    public function collapsed($field) {
        $field_key = '';
        if (is_subclass_of($field, '\sacf\field\base')) {
            // if is of type field\base get fields key
            $field_key = $field->get_key();
        } else if (is_string($field)) {
            // or create key from string
            $field_key = \sacf\utils::key_field($field);
        }
        $this->options['collapsed'] = $field_key;
        return $this;
    }

	/**
	 * @help: set button label as string
	 */
	public function button_label($string) {
		$this->options['button_label'] = $string;
		return $this;
	}

	/**
	 * @help: add a field to the repeater
	 */
	public function add($field) {
		$this->sub_fields[] = $field;
		return $this;
    }


    public function add_layout($layout) {
        foreach ($layout->fields as $field) {
            $this->add($field);
        }
        return $this;
    }


	/**
	 * creates sub fields array for repeater
	 */
	private function makeSubFields() {
		$all = array();
		foreach($this->sub_fields as $sub_field) {
			$all[] = $sub_field->make_slug($this->slug)->make();
		}
		return $all;
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
