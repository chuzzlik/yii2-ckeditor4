<?php
return [
	'height' => 200,
	'extraPlugins' => "justify",
	'allowedContent' => true,
	'toolbarGroups' => [
		['name' => 'document', 'groups' => ['mode', 'document', 'doctools']],
		['name' => 'clipboard', 'groups' => ['clipboard', 'undo']],
		['name' => 'editing', 'groups' => ['find', 'selection']],
		['name' => 'forms'],
		['name' => 'styles'],
		['name' => 'blocks'],
		['name' => 'colors'],
		['name' => 'tools'],
		['name' => 'others'],
		'/',
		['name' => 'basicstyles', 'groups' => ['basicstyles', 'colors', 'cleanup']],
		['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi']],
		['name' => 'links'],
		['name' => 'insert'],

	],
];
