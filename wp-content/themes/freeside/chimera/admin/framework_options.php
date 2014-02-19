<?php

$shortname = 'chimera';

$framework_options = array(
	/*array(
		"name" => __("Import options", "chimera"),
		"desc" => __("Paste here the export code to import the theme settings and options.", "chimera"),
		"id" => $shortname.'_import_options',
		"std" => "",
		"disabled" => "true",
		"type" => "textarea"
	),
	array(
		"name" => __("Export options", "chimera"),
		"desc" => __("Use this code to export your themes settings and options to another instance of this theme. Copy this code and paste it in the other theme in the Import Settings textarea.", "chimera"),
		"id" => $shortname.'_export_options',
		"std" => "",
   		"disabled" => "true",
		"type" => "textarea"
	),*/
);

update_option('chimera_framework_options', $framework_options);