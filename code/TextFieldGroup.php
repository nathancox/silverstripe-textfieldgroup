<?php

/**
 * This is intended to make any combination of text fields and labels on a single line.  Eg for URLSegments prepended by the domain as a label, or for X, Y and Z coordinates for a single location.
 * 
 * The differences from FieldGroup are
 * a) it takes away the minimum width of fields so things are spaced appropriately; and
 * b) if you pass in a string instead of a field it's automatically turned in to a LiteralField
 * 
 */
class TextFieldGroup extends FieldGroup {
	
	function __construct($arg1 = null, $arg2 = null) {
		if (is_array($arg1) || is_a($arg1, 'FieldSet')) {
			$fields = $arg1;
		} else if (is_array($arg2) || is_a($arg2, 'FieldList')) {
			$this->title = $arg1;
			$fields = $arg2;
		} else {
			$fields = func_get_args();
			if(!is_object(reset($fields))) $this->title = array_shift($fields);
		}
		
		foreach($fields as $key => $field) {
			if (is_string($field)) {
				$fields[$key] = new LiteralField($this->Name().'Literal'.$key, $field);
			}
		}
					
		parent::__construct($fields);
	}




	
	function FieldHolder($properties = array()) {
		Requirements::css('textfieldgroup/css/TextFieldGroup.css');
		
		return parent::FieldHolder($properties);
	}
	
	
	/*
	function FieldX($properties = array()) {
		

		$obj = ($properties) ? $this->customise($properties) : $this;
		return 'hello';
		return $obj->renderWith($this->getTemplates());
	}
	
	public function getTemplates() {
		$return = parent::getTemplates();
		
		info($return);
		
		return $return;
	}
	

	
	public function getFieldHolderTemplates() {
		$return = parent::getFieldHolderTemplates();
		
		info($return);
		
		return $return;
	}
	*/
	
	
	/*
	function Field($properties = array()) {
		Requirements::css('textfieldgroup/css/TextFieldGroup.css');
		
		$fs = $this->FieldList();
    $idAtt = isset($this->id) ? " id=\"{$this->id}\"" : '';
		$content = "<div class=\"textfieldgroup\"$idAtt>";

		$count = 1;
		foreach($fs as $subfield) {

			//label the first and last fields of each surrounding div
			if ($count == 1) $firstLast = "first";
			elseif ($count == count($fs)) $firstLast = "last";
			else $firstLast = '';

			$content .= "<div class=\"textfieldgroup-field $firstLast\">" . $subfield->{$this->subfieldParam}() . "</div>";
			$count++;
		}
		$content .= "</div>";
		
		return $content;
	}
	*/
}