<?php
	$config['analysis_table'] = array(
		'current_totalasset_oflocation_type'	=> array(
			'name'	=> 'Asset in Responsible List By Location',
			'description'	=> 'total number of each type of asset in each location. Order by location ID and Asset Class.',
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
			'description'	=> 'Report of counting item which bought from same company (from max to min )  Order by companyName  ',
			'fields'	=> array(
				'CompanyName' => 'Company Name',
				'TotalBoughtItem' => 'Total Bought Item'
			),
			'model'	=> 'Analysis_NumberAsset_model',
			'method'	=> 'AssetAllCompany'
		),
		'best_seller_car'	=> array(
			'name'	=> 'Best Seller Car List',
			'description'	=> 'counting item sold of each Car ’s manufacture',
			'fields'	=> array(
				'Manufacturer'	=> 'Manufacturer',
				'TotalSoldNumber'	=> 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'BestSell_Car'
		),
		'best_seller_computer'	=> array(
			'name'	=> 'Best Seller Computer List',
			'description'	=> 'counting item sold of each Computer’s manufacture',
			'fields'	=> array(
				'Manufacturer' => 'Manufacturer',
				'TotalSoldNumber' => 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'BestSell_Computer'
		),
		'best_asset_sold'	=> array(
			'name'	=> 'Best Asset Sold List',
			'description'	=> 'find best seller item after ... date to current',
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
			'description'	=> 'counting item sold of each asset type',
			'fields'	=> array(
				'AssetClass' => 'Asset Class',
				'SoldNumber' => 'No. of Sold Asset'
			),
			'model'	=> 'Analysis_Sold_model',
			'method'	=> 'ByClass'
		),
		'monthy_car_sold'	=> array(
			'name'	=> 'Number of Car sold in each month',
			'description'	=> 'ยอดขายที่ขายรถได้ในแต่ละเดิอน of ... year',
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
			'description'	=> 'Counting of Employee who manage assetPurchase',
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
			'description'	=> 'Employee ที่ ขาย vehicle ได้มากสุด (10 order)',
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
			'description'	=> 'Employee ขาย building ได้มากสุด',
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
			'description'	=> 'นับยอดการซืเอรวมในแต่ละประเภท asset ใน .... year',
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
			'model'	=> 'Analysis_Purchase_modell',
			'method'	=> 'TotalByYear'
		),
		'client_purchease'	=> array(
			'name'	=> 'Most Clients Buying List',
			'description'	=> 'หา client ที่ซื้อของเรามาสุด จำนวน และมูลค่า 10 อันดับแรก',
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