<?php

/**
 * @todo not quite there yet...
 */

namespace sacf;

class collection {

    public $name = '';
    public $fields = array();

    /**
     * Creates a reusable field collection
     * @param string $name The slug
     */
    public function __construct($name=false) {
        $this->name = sanitize_title($name);
        return $this;
    }

    // add a field
    public function add($field) {
        $this->fields[] = $field;
        return $this;
    }
}
