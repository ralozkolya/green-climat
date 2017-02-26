<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$id = [
	'field' => 'id',
	'label' => 'lang:id',
	'rules' => 'required|is_natural',
];

$ka_name = [
	'field' => 'ka_name',
	'label' => 'lang:ka_name',
	'rules' => 'required',
];

$en_name = [
	'field' => 'en_name',
	'label' => 'lang:en_name',
	'rules' => 'required',
];

$ru_name = [
	'field' => 'ru_name',
	'label' => 'lang:ru_name',
	'rules' => 'required',
];

$ka_description = [
	'field' => 'ka_desc',
	'label' => 'lang:ka_desc',
	'rules' => 'required',
];

$en_description = [
	'field' => 'en_desc',
	'label' => 'lang:en_desc',
	'rules' => 'required',
];

$ru_description = [
	'field' => 'ru_desc',
	'label' => 'lang:ru_desc',
	'rules' => 'required',
];

$category = [
	'field' => 'category',
	'label' => 'lang:category',
	'rules' => 'required|is_natural',
];

$ka_title = [
	'field' => 'ka_title',
	'label' => 'lang:ka_title',
	'rules' => 'required',
];

$en_title = [
	'field' => 'en_title',
	'label' => 'lang:en_title',
	'rules' => 'required',
];

$ru_title = [
	'field' => 'ru_title',
	'label' => 'lang:ru_title',
	'rules' => 'required',
];

$ka_body = [
	'field' => 'ka_body',
	'label' => 'lang:ka_body',
	'rules' => 'required',
];

$en_body = [
	'field' => 'en_body',
	'label' => 'lang:en_body',
	'rules' => 'required',
];

$ru_body = [
	'field' => 'ru_body',
	'label' => 'lang:ru_body',
	'rules' => 'required',
];

$priority = [
	'field' => 'priority',
	'label' => 'lang:priority',
	'rules' => 'is_numeric',
];

$pinned = [
	'field' => 'pinned',
	'label' => 'lang:pinned',
	'rules' => 'regex_match[/0|1/]',
];

$password = [
	'field' => 'password',
	'label' => 'lang:password',
	'rules' => 'required|min_length[6]',
];

$password_repeat = [
	'field' => 'password_repeat',
	'label' => 'lang:password_repeat',
	'rules' => 'required|matches[password]',
];

$parent = [
	'field' => 'parent',
	'label' => 'lang:parent',
	'rules' => 'is_natural|differs[id]',
];

$config['add_Product'] = [
	$ka_name, $en_name, $ru_name,
	$ka_description, $en_description, $ru_description,
	$category,
];

$config['edit_Product'] = [
	$id, $ka_name, $en_name, $ru_name,
	$ka_description, $en_description, $ru_description,
	$category,
];

$config['add_Post_image'] = [
	[
		'field' => 'item',
		'label' => 'lang:item',
		'rules' => 'required|is_natural',
	],
];

$config['add_Partner_image'] = [
	[
		'field' => 'item',
		'label' => 'lang:item',
		'rules' => 'required|is_natural',
	],
];

$config['add_Project_image'] = [
	[
		'field' => 'item',
		'label' => 'lang:item',
		'rules' => 'required|is_natural',
	],
];

$config['add_Service_image'] = [
	[
		'field' => 'item',
		'label' => 'lang:item',
		'rules' => 'required|is_natural',
	],
];

$config['add_Product_image'] = [
	[
		'field' => 'item',
		'label' => 'lang:item',
		'rules' => 'required|is_natural',
	],
];

$config['edit_Page'] = [
	$id, $ka_title, $en_title, $ru_title,
];

$config['add_Banner'] = [
	$priority,
];

$config['edit_Banner'] = [
	$id, $priority,
];

$config['add_Post'] = [
	$ka_title, $en_title, $ru_title,
	$ka_body, $en_body, $ru_body,
	$pinned, $priority,
];

$config['add_Partner'] = [
	$ka_title, $en_title, $ru_title,
	$pinned, $priority,
];

$config['add_Project'] = [
	$ka_title, $en_title, $ru_title,
	$ka_body, $en_body, $ru_body,
	$pinned, $priority,
];

$config['add_Service'] = [
	$ka_title, $en_title, $ru_title,
	$ka_body, $en_body, $ru_body,
	$pinned, $priority,
];

$config['edit_Post'] = [
	$id,
	$ka_title, $en_title, $ru_title,
	$ka_body, $en_body, $ru_body,
	$pinned, $priority,
];

$config['edit_Project'] = [
	$id,
	$ka_title, $en_title, $ru_title,
	$ka_body, $en_body, $ru_body,
	$pinned, $priority,
];

$config['edit_Partner'] = [
	$id,
	$ka_title, $en_title, $ru_title,
	$pinned, $priority,
];

$config['edit_Service'] = [
	$id,
	$ka_title, $en_title, $ru_title,
	$ka_body, $en_body, $ru_body,
	$pinned, $priority,
];

$config['edit_User_admin'] = [
	[
		'field' => 'password',
		'label' => 'lang:password',
		'rules' => 'required|min_length[5]'
	],
	[
		'field' => 'password_repeat',
		'label' => 'lang:password_repeat',
		'rules' => 'required|matches[password]'
	],
];

$config['add_Category'] = [
	$ka_name, $en_name, $ru_name,
	$parent,
];

$config['edit_Category'] = [
	$ka_name, $en_name, $ru_name,
	$parent, $id,
];

$config['send_mail'] = [
	[
		'field' => 'name',
		'label' => 'lang:name',
		'rules' => 'required',
	],
	[
		'field' => 'email',
		'label' => 'lang:email',
		'rules' => 'required|valid_email',
	],
	[
		'field' => 'subject',
		'label' => 'lang:subject',
		'rules' => 'required',
	],
	[
		'field' => 'message',
		'label' => 'lang:message',
		'rules' => 'required',
	],
];