SilverStripe TextFieldGroup
===================================

This is intended to make any combination of text fields and labels on a single line.  Eg for URLSegments prepended by the domain as a label, or for X, Y and Z coordinates for a single location.

The differences from FieldGroup are
a) it takes away the minimum width of fields so things are spaced approriately; and
b) if you pass in a string instead of a field it's automatically turned in to a LiteralField

No dramatic functionality, just a convenience class for formatting.

Currently being developed on SilverStripe 3, not tested on 2.x yet.

Maintainer Contacts
-------------------
* Nathan Cox (<nathan@flyingmonkey.co.nz>)

Requirements
------------
* SilverStripe 3.0+

Documentation
-------------
[GitHub](https://github.com/nathancox/silverstripe-tagitfield)

Installation Instructions
-------------------------

1. Place the files in a directory called tagitfield in the root of your SilverStripe installation
2. Visit yoursite.com/dev/build to rebuild the database

Usage Overview
--------------

The first argument is the field label.  All following arguments should be either instances of FormField or strings to be converted in to LiteralFields.


$fields->addFieldToTab('Root.Main', new TextFieldGroup('Map coordinates',
		$this->getMapLink() . '/',
		new NumericField("LocationX", "", "", 3),
		"/",
		new NumericField("LocationY", "", "", 3)
));

$fields->addFieldToTab('Root.Main', new TextFieldGroup('Subdomain',
		'http://',
		new TextField("Subdomain", ""),
		'.example.com'
));


Known Issues
------------
[Issue Tracker](https://github.com/nathancox/silverstripe-tagitfield/issues)