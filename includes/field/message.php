<?php

/**
 * Layout field: Message
 * @version 2.0.0
 */

namespace sacf\field;

class message extends base {

    protected $defaults = array(
            'message' => '',
            'new_lines' => 'wpautop',
            'esc_html' => 0
        );

	public function __construct($label, $name='') {
		parent::__construct($label, $name, 'message');
	}

	/**
	 * @help: set message
	 */
	public function message($string) {
		$this->options['message'] = $string;
		return $this;
    }

    /**
	 * @help: @todo
	 */
	public function new_lines($string) {
		$this->options['new_lines'] = $string;
		return $this;
    }

	/**
	 * @help: allow HTML markup to display as visible text instead of rendering: 0, 1
	 */
	public function esc_html($bool = true) {
		$this->options['esc_html'] = $book;
		return $this;
	}
}
