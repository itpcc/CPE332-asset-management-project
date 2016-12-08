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
			'CompanyAddress'	=> array(
				'input'	=> array(
					'type'	=> 'textarea',
					'required'	=> true,
					'length'	=> 100
				),
				'name'	=> 'Company Address',
				'slug'	=> 'company_address'
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
			'CompanyAddress',
			'CompanyPhoneNO',
			'SecondaryPhoneNO',
			'CompanyFaxNO',
			'CompanyEmail'
		),
		'form_lines'	=> array(
			array('CompanyID'),
			array('CompanyName'),
			array('CompanyAddress'),
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

	$config['section_detail']['depreciation'] = array(
		'name'	=> 'Depreciation',
		'icon'	=> 'attach_money',
		'slug'	=> 'depreciation',
		'color'	=> 'brown',		
		'background'	=> array(
			'file'	=> 'eikbsc3sdti-sonja-langford.jpg',
			'name'	=> 'Sonja',
			'url'	=> 'https://unsplash.com/search/clock?photo=eIkbSc3SDtI'
		),
		'modal'	=> array(
			'header'	=> 'จัดการการเสื่อมมูลค่า'
		),
		'add'	=> array(
			'icon'	=> 'attach_money add'
		),
		'fields'	=> array(
			'DepreciationType'	=> array(
				'input'	=> array(
					'type'	=> 'text'
				),
				'name'	=> '#',
				'slug'	=> 'id'
			),
			'DepreciationDef'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Description',
				'slug'	=> 'description',
				'icon'	=> 'chrome_reader_mode'
			),
			'DepreciationMethod'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Method',
				'slug'	=> 'depreciation-method'
			),
			'DepreciationConstraint'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Depreciation Constraint',
				'slug'	=> 'depreciation-constraint'
			)
		),
		'id_key'	=> 'DepreciationType',
		'url'	=> array(
			'list'	=> base_url('index.php/depreciation'),
			'add'	=> base_url('index.php/depreciation/add'),
			'edit'	=> base_url('index.php/depreciation/edit'),
			'delete'	=> base_url('index.php/depreciation/delete')
		),
		'table'	=> array(
			'DepreciationType',
			'DepreciationDef',
			'DepreciationMethod',
			'DepreciationConstraint'
		),
		'form_lines'	=> array(
			array('DepreciationType', 'DepreciationMethod'),
			array('DepreciationDef'),
			array('DepreciationConstraint')
		)
	);

	$config['section_detail']['asset'] = array(
		'name'	=> 'Asset',
		'icon'	=> 'shopping_cart',
		'slug'	=> 'asset',
		'color'	=> 'cyan',
		'background'	=> array(
			'file'	=> '0vy082un2pk-edu-grande.jpg',
			'name'	=> 'Edu Grande',
			'url'	=> 'https://unsplash.com/collections/307652/shopping?photo=0vY082Un2pk'
		),
		'modal'	=> array(
			'header'	=> 'จัดการสินทรัพย์'
		),
		'add'	=> array(
			'icon'	=> 'add_shopping_cart'
		),
		'fields'	=> array(
			'AssetID'	=> array(
				'input'	=> array(
					'type'	=> 'hidden'
				),
				'name'	=> '#',
				'slug'	=> 'id'
			),
			'AssetName'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Asset Name',
				'slug'	=> 'asset_name',
				'icon'	=> 'shopping_cart'
			),
			'AssetNumber_Quantity'	=> array(
				'input'	=> array(
					'type'	=> 'number',
					'required'	=> true
				),
				'name'	=> 'Quantity',
				'slug'	=> 'quantity',
				'validation'	=> 'integer'
			),
			'AssetClass'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Class',
				'slug'	=> 'asset_class',
				'icon'	=> 'star_rate'
			),
			'PurchaseDate'	=> array(
				'input'	=> array(
					'type'	=> 'date',
					'required'	=> true
				),
				'name'	=> 'Purchase Date',
				'slug'	=> 'purchase_date',
				'icon'	=> 'schedule',
				'validation'	=> 'regex_match[/\d{4}\-\d{2}-\d{2}/]'
			),
			'AcquisitionDate'	=> array(
				'input'	=> array(
					'type'	=> 'date',
					'required'	=> true
				),
				'name'	=> 'Acquisition Date',
				'slug'	=> 'acquisition_date',
				'validation'	=> 'regex_match[/\d{4}\-\d{2}-\d{2}/]'
			),
			'CapitalCost'	=> array(
				'input'	=> array(
					'type'	=> 'number',
					'required'	=> true
				),
				'name'	=> 'Capital Cost',
				'slug'	=> 'capital_cost',
				'validation'	=> 'integer'
			),
			'DepreciationType'	=> array(
				'input'	=> array(
					'type'	=> 'select',
					'required'	=> true,
					'module'	=> 'depreciation',
					'option_text'	=> 'DepreciationType',
					'option_id'	=> 'DepreciationType'
				),
				'name'	=> 'Depreciation Type',
				'slug'	=> 'depreciation-type'
			),
			'UsefulLife'	=> array(
				'input'	=> array(
					'type'	=> 'number',
					'required'	=> true
				),
				'name'	=> 'Useful Lifetime',
				'slug'	=> 'useful_life',
				'validation'	=> 'integer'
			),
			'LocationID'	=> array(
				'input'	=> array(
					'type'	=> 'select2',
					'required'	=> true,
					'ajax'	=> base_url('index.php/asset_location/search/'),
					'ajax_query_id'	=> base_url('index.php/asset_location/search/?id='),
					'ajax_text'	=> 'LocationName',
					'ajax_id'	=> 'LocationID'
				),
				'name'	=> 'Location',
				'slug'	=> 'location-id',
				'icon'	=> 'compare_arrows'
			),
			'LocationDepartment'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Location Department',
				'slug'	=> 'location_department'
			),
			'EmployeeID'	=> array(
				'input'	=> array(
					'type'	=> 'select2',
					'required'	=> true,
					'ajax'	=> base_url('index.php/employee/search/'),
					'ajax_query_id'	=> base_url('index.php/employee/search/?id='),
					'ajax_text'	=> 'FirstName',
					'ajax_id'	=> 'EmployeeID'
				),
				'name'	=> 'Reponsible By',
				'slug'	=> 'employee-id'
			),
			'VendorID'	=> array(
				'input'	=> array(
					'type'	=> 'select2',
					'required'	=> true,
					'ajax'	=> base_url('index.php/vendor/search/'),
					'ajax_query_id'	=> base_url('index.php/vendor/search/?id='),
					'ajax_text'	=> 'FirstName',
					'ajax_id'	=> 'VendorID'
				),
				'name'	=> 'Seller',
				'slug'	=> 'vendor-id'
			),
			'Manufacturer'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Manufacturer',
				'slug'	=> 'manufacturer'
			),
			'SalvageValue'	=> array(
				'input'	=> array(
					'type'	=> 'number',
					'required'	=> true
				),
				'name'	=> 'Salvage Value',
				'slug'	=> 'salvage_value',
				'validation'	=> 'integer'
			),
			'DepreciationValue_perYear'	=> array(
				'input'	=> array(
					'type'	=> 'number',
					'required'	=> true
				),
				'name'	=> 'Depreciation Value (per Year)',
				'slug'	=> 'depreciation-value_per-year',
				'validation'	=> 'numeric'
			),
			'DepreciationRatio'	=> array(
				'input'	=> array(
					'type'	=> 'number',
					'required'	=> true
				),
				'name'	=> 'Depreciation Ratio',
				'slug'	=> 'depreciation-ratio',
				'validation'	=> 'numeric'
			),
			'DepreciationArea'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Depreciation Area',
				'slug'	=> 'depreciation-area'
			),

		),
		'id_key'	=> 'AssetID',
		'url'	=> array(
			'list'	=> base_url('index.php/asset'),
			'add'	=> base_url('index.php/asset/add'),
			'edit'	=> base_url('index.php/asset/edit'),
			'delete'	=> base_url('index.php/asset/delete')
		),
		'table'	=> array(
			'AssetID',
			'AssetName',
			'AssetNumber_Quantity',
			'AssetClass',
			'PurchaseDate',
			'AcquisitionDate',
			'CapitalCost',
			'DepreciationType',
			'UsefulLife',
			array(
				'localField'	=> 'LocationID',
				'module'	=> 'asset_location',
				'targetField'	=> 'LocationName'
			),
			'LocationDepartment',
			array(
				'localField'	=> 'EmployeeID',
				'module'	=> 'employee',
				'targetField'	=> 'FirstName'
			),
			array(
				'localField'	=> 'VendorID',
				'module'	=> 'vendor',
				'targetField'	=> 'FirstName'
			),
			'Manufacturer',
			'SalvageValue',
			'DepreciationValue_perYear',
			'DepreciationRatio',
			'DepreciationArea'
		),
		'form_lines'	=> array(
			array('AssetID'),
			array('AssetName', 'AssetNumber_Quantity'),
			array('Manufacturer', 'VendorID', 'EmployeeID'),
			array('AssetClass', 'PurchaseDate', 'AcquisitionDate'),
			array('CapitalCost', 'DepreciationType', 'UsefulLife', 'SalvageValue'),
			array('LocationID', 'LocationDepartment'),
			array('DepreciationValue_perYear', 'DepreciationRatio','DepreciationArea')
		)
	);

	$config['section_detail']['asset_location'] = array(
		'name'	=> 'Asset Location',
		'icon'	=> 'pin_drop',
		'slug'	=> 'asset-location',
		'color'	=> 'green',		
		'background'	=> array(
			'file'	=> 'rkbtpqpegdo-jean-frederic-fortier.jpg',
			'name'	=> 'Jean-Frederic Fortier',
			'url'	=> 'https://unsplash.com/search/map?photo=RkBTPqPEGDo'
		),
		'modal'	=> array(
			'header'	=> 'จัดการที่ตั้งสินทรัพย์'
		),
		'add'	=> array(
			'icon'	=> 'pin_drop add'
		),
		'fields'	=> array(
			'LocationID'	=> array(
				'input'	=> array(
					'type'	=> 'hidden'
				),
				'name'	=> '#',
				'slug'	=> 'id'
			),
			'LocationName'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Location Name',
				'slug'	=> 'location-name'
			),
			'LocationAddress'	=> array(
				'input'	=> array(
					'type'	=> 'text',
					'required'	=> true
				),
				'name'	=> 'Location Address',
				'slug'	=> 'location-address',
				'icon'	=> 'chrome_reader_mode'
			)
		),
		'id_key'	=> 'LocationID',
		'url'	=> array(
			'list'	=> base_url('index.php/asset_location'),
			'add'	=> base_url('index.php/asset_location/add'),
			'edit'	=> base_url('index.php/asset_location/edit'),
			'delete'	=> base_url('index.php/asset_location/delete')
		),
		'table'	=> array(
			'LocationID',
			'LocationName',
			'LocationAddress'
		),
		'form_lines'	=> array(
			array('LocationID'),
			array('LocationName'),
			array('LocationAddress')
		)
	);