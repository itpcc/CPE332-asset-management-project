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
					'ajax'	=> base_url('index.php/contacted_company/search/'),
					'ajax_query_id'	=> base_url('index.php/contacted_company/search/?id='),
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
			array(
				'localField'	=> 'CompanyID',
				'module'	=> 'contactedCompany',
				'targetField'	=> 'CompanyName'
			),
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

	$config['section_detail']['contactedCompany'] = array(
		'name'	=> 'Contacted Company',
		'icon'	=> 'domain',
		'slug'	=> 'contacted-company',
		'color'	=> 'red',
		'modal'	=> array(
			'header'	=> 'จัดการบริษัทสังกัด'
		),
		'add'	=> array(
			'icon'	=> 'domain add'
		),
		'fields'	=> array(
			'CompanyID'	=> array(
				'input'	=> array(
					'type'	=> 'hidden'
				),
				'name'	=> '#',
				'slug'	=> 'id'
			),
			'CompanyName'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Company Name',
				'slug'	=> 'company_name',
				'icon'	=> 'domain'
			),
			'CompanyPhoneNO'	=> array(
				'input'	=> array(
					'type'	=> 'tel',
					'required'	=> true
				),
				'name'	=> 'Phone',
				'slug'	=> 'tel',
				'icon'	=> 'phone'
			),
			'CompanyFaxNO'	=> array(
				'input'	=> array(
					'type'	=> 'tel',
					'required'	=> true
				),
				'name'	=> 'Fax',
				'slug'	=> 'Fax',
				'icon'	=> 'phone'
			),
			'CompanyEmail'	=> array(
				'input'	=> array(
					'type'	=> 'email',
					'required'	=> true
				),
				'name'	=> 'Email',
				'slug'	=> 'email',
				'icon'	=> 'email',
				'validation'	=> 'valid_email'
			),
			'SecondaryPhoneNO'	=> array(
				'input'	=> array(
					'type'	=> 'tel',
					'required'	=> false,
					'show_name'	=> false
				),
				'name'	=> '2<sup>nd</sup> Phone',
				'slug'	=> '2nd-tel'
			),
		),
		'id_key'	=> 'CompanyID',
		'url'	=> array(
			'list'	=> base_url('index.php/contacted_company'),
			'add'	=> base_url('index.php/contacted_company/add'),
			'edit'	=> base_url('index.php/contacted_company/edit')
		),
		'table'	=> array(
			'CompanyID',
			'CompanyName',
			'CompanyPhoneNO',
			'SecondaryPhoneNO',
			'CompanyFaxNO',
			'CompanyEmail'
		),
		'form_lines'	=> array(
			array('CompanyID'),
			array('CompanyName'),
			array('CompanyPhoneNO', 'SecondaryPhoneNO'),
			array('CompanyFaxNO'),
			array('CompanyEmail')
		)
	);