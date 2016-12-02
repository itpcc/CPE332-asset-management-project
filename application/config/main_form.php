<?php
	$config['section_detail'] = array();

	$config['section_detail']['vendor'] = array(
		'name'	=> 'Vendor',
		'icon'	=> 'person',
		'slug'	=> 'vendor',
		'color'	=> 'pink',
		'modal'	=> array(
			'header'	=> 'จัดการ Vendor'
		),
		'add'	=> array(
			'icon'	=> 'person_add'
		),
		'fields'	=> array(
			'VendorID'	=> array(
				'input'	=> array(
					'type'	=> 'hidden'
				),
				'name'	=> '#',
				'slug'	=> 'id'
			),
			'FirstName'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'First Name',
				'slug'	=> 'first_name',
				'icon'	=> 'account_circle'
			),
			'LastName'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Last Name',
				'slug'	=> 'last_name'
			),
			'CompanyID'	=> array(
				'input'	=> array(
					'type'	=> 'select2',
					'required'	=> true,
					'ajax'	=> base_url('index.php/vendors/dummy_company/'),
					'ajax_query_id'	=> base_url('index.php/vendors/dummy_company/?id='),
					'ajax_text'	=> 'CompanyName',
					'ajax_id'	=> 'CompanyID'
				),
				'name'	=> 'Company',
				'slug'	=> 'company-id',
				'icon'	=> 'domain',
				'validation'	=> 'integer'
			),
			'VendorPhoneNO'	=> array(
				'input'	=> array(
					'type'	=> 'tel',
					'required'	=> true
				),
				'name'	=> 'Phone',
				'slug'	=> 'tel',
				'icon'	=> 'phone'
			),
			'VendorEmail'	=> array(
				'input'	=> array(
					'type'	=> 'email',
					'required'	=> true
				),
				'name'	=> 'Email',
				'slug'	=> 'email',
				'icon'	=> 'email',
				'validation'	=> 'valid_email'
			),
			'BuyLocation'	=> array(
				'input'	=> array(
					'type'	=> 'textarea',
					'required'	=> true,
					'length'	=> 50
				),
				'name'	=> 'Buy Location',
				'slug'	=> 'buy-location',
				'icon'	=> 'store'
			),
		),
		'id_key'	=> 'VendorID',
		'url'	=> array(
			'list'	=> base_url('index.php/vendors'),
			'add'	=> base_url('index.php/vendors/add'),
			'edit'	=> base_url('index.php/vendors/edit')
		),
		'table'	=> array(
			'VendorID',
			'FirstName',
			'LastName',
			'CompanyID',
			'VendorPhoneNO',
			'VendorEmail',
			'BuyLocation'
		),
		'form_lines'	=> array(
			array('VendorID'),
			array('FirstName', 'LastName'),
			array('CompanyID'),
			array('VendorPhoneNO', 'VendorEmail'),
			array('BuyLocation')
		)
	);