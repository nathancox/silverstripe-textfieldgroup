<?php

/**
 * This is intended to make any combination of text fields and labels on a single line.  Eg for URLSegments prepended by the domain as a label, or for X, Y and Z coordinates for a single location.
 * 
 * The differences from FieldGroup are
 * a) it takes away the minimum width of fields so things are spaced appropriately; and
 * b) if you pass in a string instead of a field it's automatically turned in to a LiteralField
 * 
 */
class TextFieldGroup extends FieldGroup
{
    
    public function __construct($arg1 = null, $arg2 = null)
    {
        if (is_array($arg1) || is_a($arg1, 'FieldSet')) {
            $fields = $arg1;
        } elseif (is_array($arg2) || is_a($arg2, 'FieldList')) {
            $this->title = $arg1;
            $fields = $arg2;
        } else {
            $fields = func_get_args();
            if (!is_object(reset($fields))) {
                $this->title = array_shift($fields);
            }
        }
        
        foreach ($fields as $key => $field) {
            if (is_string($field)) {
                $fields[$key] = new LiteralField($this->Name().'Literal'.$key, $field);
            }
        }
                    
        parent::__construct($fields);
    }


    /**
     * Just includes the CSS used for layout
     */
    public function FieldHolder($properties = array())
    {
        Requirements::css(basename(dirname(__DIR__)) . '/css/TextFieldGroup.css');
        
        return parent::FieldHolder($properties);
    }
}
