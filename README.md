# CPE332-asset-management-project

## ข้อตกลง/ข้อแนะนำ

- URL path พยายามยึด [REST API best practice](http://www.vinaysahni.com/best-practices-for-a-pragmatic-restful-api) ไว้ จะได้เหมือนๆ กัน (แต่ไม้ต้องเป๊ะก็ได้ เอาที่สะดวก)
- Model พยายามใช้ชื่อใกล้เคียงกับ controller หลัก แล้วเติม `_model` เช่น controller `vendors` model ก็เป็น `vendor_model`
- เขียนเสร็จก็เขียน doc อธิบาย controllers และ input/output ของแต่ละ methods ด้วยเน่อ (ไม่ต้องละเอียดมาก แค่อธิบายชื่อ input output และเอาไว้ทำอัลไลก็พอ) ดูจาก [Template](docs/template.md) กะดั้ย
- Database พยายามใช้ [Query builder](https://www.codeigniter.com/user_guide/database/query_builder.html) นะ เผื่อใครจะใช้เงื่อนไขซับซ้อน (JOIN เพิ่มไรงี้) จะได้ง่าย และป้องกัน SQL injection ด้วย
- ตอน commit ให้ commit ขึ้น branch ของตัวเองก่อน ถ้า code นิ่งแล้วค่อย merge เข้า master น้า

## Asset_model

- get_asset($condition); 		//get asset by id ( without id = SELECT*)
- insert_asset($data);  				//insert array of $data (defined by controller) to database 
- delete_asset_by_id($asset_id);		//delete 1 row of asset with matched AssetID. (use $error)
- update_asset_by_id($asset_id,$data)	//update array of $data (a row) to database which matched $asset_id

## AssetSold_model

- get_sold_list_by_AssetID($condition)	//get sold asset by $condition = AssetID
- get_sold_list_by_SoldID($condition)	//get sold asset by $condition = SoldID
- insert_sold_asset($data) 						//insert sold asset (array of $data defined by controller)
- delete_sold_asset($AssetID) 					//delete sold asset by asset id (use $error1)
- delete_sold_list($condition)			//delete sold asset by $condition = soldID (use $error2)
- delete_all_sold_list()						//delete all sold asset. no return value and error message
- update_sold_asset($SoldID,$data)				//update array of $data (a row) to database which matched $SoldID

## AssetPurchase_model

- get_purchased_list_by_AssetID($condition)		//get purchased asset by $condition = AssetID 
- get_purchased_list_by_PurchaseID($condition)	//get purchased asset by $condition = PurchaseID
- insert_purchased_asset($data)					//insert purchased asset (array of $data defined by controller)
- delete_purchased_asset($AssetID) 				//delete purchased asset by asset id (detected with $error1)
- delete_purchased_list($condition)				//delete purchased asset by $condition = PurchaseID (detected with $error2)
- delete_all_purchased_list()					//delete all purchased asset history. no return value and error message
- update_purchased_asset($PurchaseID,$data)		//update array of $data (a row) to database which matched $PurchaseID

## AssetCategory_model

- get_class($condition)				//get asset class data by $condition = AssetClass
- insert_class($data)				//insert new class (array of $data defined by controller)
- delete_class($AssetClass)			//delete class by AssetClass (detected with $error)
- delete_all_class()				//delete all asset class data. no return value and error message
- update_class($AssetClass,$data)	//update array of $data (a row) to database which matched $AssetClass

## DepreciationKey_model

- get_key_detail($condition)			//get detail of depreciation type by $condition = DepreciationType
- insert_key($data)         			//add new depreciationType (array of $data defined by controller)
- delete_key($DepreciationType)			//delete depreciation type data by DepreciationType (detected with $error)
- delete_all_key()						//delete all depreciationKey data. no return value and error message
- update_key($DepreciationType,$data)	//update array of $data (a row) to database which matched $DepreciationType

## AssetLocation

- get_location_detail($condition)		//get detail of a location by $condition = LocationID
- insert_location($data)    			//add new location (array of $data defined by controller)
- delete_location($LocationID)			//delete a location data by LocationID (detected with $error)
- delete_all_location()					//delete all AssetLocation data. no return value and error message
- update_location($LocationID,$data)	//update array of $data (a row) to database which matched $LocationID

## AssetLocationMovement

- get_movement_detail_by_AssetID($condition)		//get asset movement detail by $condition = AssetID
- get_movement_detail_by_MovementNO($condition)		//get asset movement detail by $condition = MovementNO
- insert_movement($data)    						//add new movement history (array of $data defined by controller)
- delete_movement_asset($AssetID) 					//delete a movement of asset by AssetID (detected with $error1)
- delete_movement_list($MovementNO)					//delete a movement of asset by MovementNO (detected with $error2)
- delete_all_movement()								//delete all AssetLocationMovement data. no return value and error message
- update_movement($MovementNO,$data)				//update array of $data (a row) to database which matched $MovementNO







