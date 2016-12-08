<?php
	$config['analysis_table'] = array(
		'current_totalasset_oflocation_type'	=> array(
			'name'	=> 'Asset in Responsible List By Location',
			'description'	=> 'Total number of each type of asset in each location. Order by No. of Asset',
			'fields'	=> array(
				'LocationID' => 'Location ID',
				'LocationName' => 'Location Name',
				'AssetClass' => 'Asset Class',
				'NumberOfAsset' => 'No. of Asset'
			),
			'model'	=> 'Analysis_NumberAsset_model',
			'method'	=> 'CurrentTotalAsset_ofLocation_Type'
		),
		'purchase_asset_from_company'	=> array(
			'name'	=> 'Number of purchased Asset From the same Company',
			'description'	=> 'Report of counting item which bought from same company .Order by company name',
			'fields'	=> array(
				'CompanyName' => 'Company Name',
				'TotalBoughtItem' => 'Total Bought Item'
			),
			'model'	=> 'Analysis_NumberAsset_model',
			'method'	=> 'AssetAllCompany'
		),
		'best_seller_car'	=> array(
			'name'	=> 'Best Seller Car List',
			'description'	=> 'Counting item sold of each Car  manufacture (Find Best Seller Manufacture 10 places) ' ,
			'fields'	=> array(
				'Manufacturer'	=> 'Manufacturer',
				'TotalSoldNumber'	=> 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'BestSell_Car'
		),
		'best_seller_computer'	=> array(
			'name'	=> 'Best Seller Computer List',
			'description'	=> 'Counting item sold of each Computer manufacture (Find best 10 places)',
			'fields'	=> array(
				'Manufacturer' => 'Manufacturer',
				'TotalSoldNumber' => 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'BestSell_Computer'
		),
		'best_asset_sold'	=> array(
			'name'	=> 'Best Asset Sold List',
			'description'	=> 'Find best seller item after x date to present',
			'argument' => array(
				array(
					'name' => 'Since date',
					'validate' => 'valid_date'
				)
			),
			'fields'	=> array(
				'AssetName' => 'Asset Name',
				'SoldNumber' => 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'BestSell_Asset'
		),
		'sell_by_class'	=> array(
			'name'	=> 'Best Asset Sold List By Class',
			'description'	=> 'Counting item sold of each asset type',
			'fields'	=> array(
				'AssetClass' => 'Asset Class',
				'SoldNumber' => 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'ByClass'
		),
		'monthy_car_sold'	=> array(
			'name'	=> 'Number of Car sold in each month',
			'description'	=> 'Total car sold for each month in selected year',
			'argument' => array(
				array(
					'name' => 'In year',
					'validate' => 'decimal'
				)
			),
			'fields'	=> array(
				'SaleMonth' => 'Month',
				'SoldNumber' => 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'Monthly_Car'
		),
		'best_purchase_manage_employee'	=> array(
			'name'	=> 'List of Employee woh manage purchase',
			'description'	=> 'Counting of employees who had manage asset purchase',
			'fields'	=> array(
				'FirstName' => 'Employee First Name',
				'LastName' => 'Employee Last Name',
				'PurchaseInChargeNumber' => 'No.Purchase In Charge'
			),
			'model'	=> 'Analysis_Employee_model',
			'method'	=> 'Purchase_PIC'
		),
		'best_vehicle_seller_employee'	=> array(
			'name'	=> 'Best Vehicle Seller Employee List',
			'description'	=> 'Counting of employees who sell the best number of vehivle (10 order)',
			'fields'	=> array(
				'FirstName' => 'Employee First Name',
				'LastName' => 'Employee Last Name',
				'SoldNumber' => 'No.Vehicle Sold out'
			),
			'model'	=> 'Analysis_Employee_model',
			'method'	=> 'VehicleSold_PIC'
		),
		'best_building_seller_employee'	=> array(
			'name'	=> 'Best Building Seller Employee List',
			'description'	=> 'Employee that can sell the most building (10 place)' ,
			'fields'	=> array(
				'FirstName' => 'Employee First Name',
				'LastName' => 'Employee Last Name',
				'SoldNumber' => 'No.Building Sold out'
			),
			'model'	=> 'Analysis_Employee_model',
			'method'	=> 'MaxBuildingSold_PIC'
		),
		'total_assetclass_purchase'	=> array(
			'name'	=> 'Total Asset Class Purchase List',
			'description'	=> '',
			'argument' => array(
				array(
					'name' => 'In year',
					'validate' => 'decimal'
				)
			),
			'fields'	=> array(
				'AssetClass' => 'Asset Class',
				'totalPurchaseItem' => 'Total brought in-purchase'
			),
			'model'	=> 'Analysis_Purchase_model',
			'method'	=> 'TotalByYear'
		),
		'client_purchease'	=> array(
			'name'	=> 'Most Clients Buying List',
			'description'	=> 'Client that buy the most asset (show only 10 place) ',
			'fields'	=> array(
				'FirstName' => 'Client First Name',
				'LastName' => 'Client Last Name',
				'BoughtTime' => 'Times of Purchase'
			),
			'model'	=> 'Analysis_Client_model',
			'method'	=> 'MostBuy'
		)
	);

	$config['analysis_table_url'] = base_url('index.php/analysis/');