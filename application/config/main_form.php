<?php
	$config['section_detail'] = array();

	$config['section_detail']['vendor'] = array(
		'name'	=> 'Vendor',
		'icon'	=> 'person',
		'slug'	=> 'vendor',
		'color'	=> 'pink',
		'background'	=> array(
			'file'	=> 'william-stitt.jpg',
			'name'	=> 'William Stitt',
			'url'	=> 'https://unsplash.com/@willpower'
		),
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
			'edit'	=> base_url('index.php/vendors/edit'),
			'delete'	=> base_url('index.php/vendors/delete')
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
		'background'	=> array(
			'file'	=> 'nohux3tiaqq-matthew-henry.jpg',
			'name'	=> 'Matthew Henry',
			'url'	=> 'https://unsplash.com/collections/155665/contracts?photo=nOhUx3tiaQQ'
		),
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
			'edit'	=> base_url('index.php/contacted_company/edit'),
			'delete'	=> base_url('index.php/contacted_company/delete')
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

	$config['section_detail']['employee'] = array(
		'name'	=> 'Employee',
		'icon'	=> 'work',
		'slug'	=> 'employee',
		'color'	=> 'blue',
		'background'	=> array(
			'file'	=> 'Lucas-gallone.jpg',
			'name'	=> 'Lucas Gallone',
			'url'	=> 'https://unsplash.com/@lucasgallone?photo=tjFf7C7bQjY'
		),
		'modal'	=> array(
			'header'	=> 'จัดการพนักงาน'
		),
		'add'	=> array(
			'icon'	=> 'add'
		),
		'fields'	=> array(
			'EmployeeID'	=> array(
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
			'Address'	=> array(
				'input'	=> array(
					'type'	=> 'textarea',
					'required'	=> true,
					'length'	=> 100
				),
				'name'	=> 'Address',
				'slug'	=> 'address',
				'icon'	=> 'home'
			),
			'PhoneNO'	=> array(
				'input'	=> array(
					'type'	=> 'tel',
					'required'	=> true
				),
				'name'	=> 'Phone',
				'slug'	=> 'phone',
				'icon'	=> 'phone'
			),
			'Email'	=> array(
				'input'	=> array(
					'type'	=> 'email',
					'required'	=> true
				),
				'name'	=> 'Email',
				'slug'	=> 'email',
				'icon'	=> 'email',
				'validation'	=> 'valid_email'
			),
			'RoleID'	=> array(
				'input'	=> array(
					'type'	=> 'select',
					'required'	=> true,
					'module'	=> 'roleandpermission',
					'option_text'	=> 'RoleName',
					'option_id'	=> 'RoleID'
				),
				'name'	=> 'Role',
				'slug'	=> 'role'
			),
		),
		'id_key'	=> 'EmployeeID',
		'url'	=> array(
			'list'	=> base_url('index.php/employee'),
			'add'	=> base_url('index.php/employee/add'),
			'edit'	=> base_url('index.php/employee/edit'),
			'delete'	=> base_url('index.php/employee/delete')
		),
		'table'	=> array(
			'EmployeeID',
			'FirstName',
			'LastName',
			'Address',
			'PhoneNO',
			'Email',
			array(
				'localField'	=> 'RoleID',
				'module'	=> 'roleandpermission',
				'targetField'	=> 'RoleName'
			),
		),
		'form_lines'	=> array(
			array('EmployeeID'),
			array('FirstName', 'LastName'),
			array('Address'),
			array('PhoneNO', 'Email'),
			array('RoleID')
		)
	);

	$config['section_detail']['roleandpermission'] = array(
		'name'	=> 'Role&Permision',
		'icon'	=> 'vpn_key',
		'slug'	=> 'role-permision',
		'color'	=> 'grey',		
		'background'	=> array(
			'file'	=> '_dkmmhzrsyy-ruben-bagues.jpg',
			'name'	=> 'Rubén Bagüés',
			'url'	=> 'https://unsplash.com/search/lock?photo=_DkmMhzrsYY'
		),
		'modal'	=> array(
			'header'	=> 'จัดการหน้าที่'
		),
		'add'	=> array(
			'icon'	=> 'vpn_key add'
		),
		'fields'	=> array(
			'RoleID'	=> array(
				'input'	=> array(
					'type'	=> 'hidden'
				),
				'name'	=> '#',
				'slug'	=> 'id'
			),
			'RoleName'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Role Name',
				'slug'	=> 'role_name',
				'icon'	=> 'label_outline'
			)
		),
		'id_key'	=> 'RoleID',
		'url'	=> array(
			'list'	=> base_url('index.php/roleandpermission'),
			'add'	=> base_url('index.php/roleandpermission/add'),
			'edit'	=> base_url('index.php/roleandpermission/edit'),
			'delete'	=> base_url('index.php/roleandpermission/delete')
		),
		'table'	=> array(
			'RoleID',
			'RoleName'
		),
		'form_lines'	=> array(
			array('RoleID'),
			array('RoleName')
		)
	);

	$config['section_detail']['client'] = array(
		'name'	=> 'Client',
		'icon'	=> 'person',
		'slug'	=> 'vendor',
		'color'	=> 'orange',
		'background'	=> array(
			'file'	=> 'mvhd5qvldww-anna-dziubinska.jpg',
			'name'	=> 'Anna Dziubinska',
			'url'	=> 'https://unsplash.com/search/people?photo=mVhd5QVlDWw'
		),
		'modal'	=> array(
			'header'	=> 'จัดการลูกค้า'
		),
		'add'	=> array(
			'icon'	=> 'person_add'
		),
		'fields'	=> array(
			'ClientID'	=> array(
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
			'Address'	=> array(
				'input'	=> array(
					'type'	=> 'textarea',
					'required'	=> true,
					'length'	=> 100
				),
				'name'	=> 'Sell Location',
				'slug'	=> 'address',
				'icon'	=> 'home'
			),
			'PhoneNO'	=> array(
				'input'	=> array(
					'type'	=> 'tel',
					'required'	=> true
				),
				'name'	=> 'Phone',
				'slug'	=> 'tel',
				'icon'	=> 'phone'
			),
			'Email'	=> array(
				'input'	=> array(
					'type'	=> 'email',
					'required'	=> true
				),
				'name'	=> 'Email',
				'slug'	=> 'email',
				'icon'	=> 'email',
				'validation'	=> 'valid_email'
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
			'RoleID'	=> array(
				'input'	=> array(
					'type'	=> 'select',
					'required'	=> true,
					'module'	=> 'roleandpermission',
					'option_text'	=> 'RoleName',
					'option_id'	=> 'RoleID'
				),
				'name'	=> 'Role',
				'slug'	=> 'role'
			),
		),
		'id_key'	=> 'ClientID',
		'url'	=> array(
			'list'	=> base_url('index.php/client'),
			'add'	=> base_url('index.php/client/add'),
			'edit'	=> base_url('index.php/client/edit'),
			'delete'	=> base_url('index.php/client/delete')
		),
		'table'	=> array(
			'ClientID',
			'FirstName',
			'LastName',
			'Address',
			'PhoneNO',
			'Email',
			array(
				'localField'	=> 'CompanyID',
				'module'	=> 'contactedCompany',
				'targetField'	=> 'CompanyName'
			),
			array(
				'localField'	=> 'RoleID',
				'module'	=> 'roleandpermission',
				'targetField'	=> 'RoleName'
			)
		),
		'form_lines'	=> array(
			array('ClientID'),
			array('FirstName', 'LastName'),
			array('Address'),
			array('PhoneNO', 'Email'),
			array('CompanyID', 'RoleID')
		)
	);