<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-29 12:05:35 --> Severity: error --> Exception: syntax error, unexpected '$milkCollectio' (T_VARIABLE) C:\xampp\htdocs\maziwa\html\app\views\payments\addPayments.php 84
ERROR - 2022-09-29 12:12:26 --> Severity: error --> Exception: syntax error, unexpected '$milkCollectio' (T_VARIABLE) C:\xampp\htdocs\maziwa\html\app\views\payments\addPayments.php 84
ERROR - 2022-09-29 22:20:18 --> Query error: Unknown column 'farmers_biodata.farmerID' in 'on clause' - Invalid query: SELECT `milk_collections`.`id` as `milkColID`, `milk_collections`.`user_id`, `milk_collections`.`center_id`, `milk_collections`.`collection_date`, `milk_collections`.`farmerID`, SUM(milk_collections.total) as totalMilk, `shop_sales`.`id` as `salesID`, `shop_sales`.`farmerID`, SUM(shop_sales.amount) as totShopAmount
FROM `milk_collections`
INNER JOIN `shop_sales` ON `shop_sales`.`farmerID` = `farmers_biodata`.`farmerID`
JOIN `collection_centers` ON `collection_centers`.`id` = `milk_collections`.`center_id`
ERROR - 2022-09-29 22:20:18 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 142
ERROR - 2022-09-29 22:21:45 --> Query error: Unknown table 'cowa_maziwa.farmers_biodata' - Invalid query: SELECT `farmers_biodata`.*, `milk_collections`.`id` as `milkColID`, `milk_collections`.`user_id`, `milk_collections`.`center_id`, `milk_collections`.`collection_date`, `milk_collections`.`farmerID`, SUM(milk_collections.total) as totalMilk, `shop_sales`.`id` as `salesID`, `shop_sales`.`farmerID`, SUM(shop_sales.amount) as totShopAmount
FROM `milk_collections`
JOIN `shop_sales` ON `shop_sales`.`farmerID` = `farmers_biodata`.`farmerID`
ERROR - 2022-09-29 22:21:45 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 142
ERROR - 2022-09-29 22:22:30 --> Query error: Unknown column 'farmers_biodata.farmerID' in 'on clause' - Invalid query: SELECT `milk_collections`.`id` as `milkColID`, `milk_collections`.`user_id`, `milk_collections`.`center_id`, `milk_collections`.`collection_date`, `milk_collections`.`farmerID`, SUM(milk_collections.total) as totalMilk, `shop_sales`.`id` as `salesID`, `shop_sales`.`farmerID`, SUM(shop_sales.amount) as totShopAmount
FROM `milk_collections`
JOIN `shop_sales` ON `shop_sales`.`farmerID` = `farmers_biodata`.`farmerID`
ERROR - 2022-09-29 22:22:30 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 142
ERROR - 2022-09-29 22:22:32 --> Query error: Unknown column 'farmers_biodata.farmerID' in 'on clause' - Invalid query: SELECT `milk_collections`.`id` as `milkColID`, `milk_collections`.`user_id`, `milk_collections`.`center_id`, `milk_collections`.`collection_date`, `milk_collections`.`farmerID`, SUM(milk_collections.total) as totalMilk, `shop_sales`.`id` as `salesID`, `shop_sales`.`farmerID`, SUM(shop_sales.amount) as totShopAmount
FROM `milk_collections`
JOIN `shop_sales` ON `shop_sales`.`farmerID` = `farmers_biodata`.`farmerID`
ERROR - 2022-09-29 22:22:32 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 142
ERROR - 2022-09-29 23:05:29 --> Severity: error --> Exception: Too few arguments to function Farmers::farmerProfile(), 0 passed in C:\xampp\htdocs\maziwa\html\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\maziwa\html\app\controllers\Farmers.php 32
ERROR - 2022-09-29 23:06:30 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-29 23:06:30 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-29 23:33:47 --> Severity: error --> Exception: syntax error, unexpected '}', expecting ';' C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 153
