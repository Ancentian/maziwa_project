<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-14 09:14:28 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:14:28 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:14:28 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:14:28 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:14:29 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:21:13 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:21:16 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:21:16 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:21:16 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:21:16 --> 404 Page Not Found: Main/assets
ERROR - 2022-09-14 09:46:13 --> Severity: error --> Exception: Too few arguments to function Reports::collection_centerReports(), 0 passed in C:\xampp\htdocs\maziwa\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\maziwa\app\controllers\Reports.php 26
ERROR - 2022-09-14 09:56:52 --> 404 Page Not Found: Reports/col_centerReports
ERROR - 2022-09-14 11:47:05 --> Severity: error --> Exception: syntax error, unexpected ''Branch Name'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\maziwa\app\controllers\Farmers.php 79
ERROR - 2022-09-14 11:48:34 --> Severity: error --> Exception: syntax error, unexpected ''bank_name'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' C:\xampp\htdocs\maziwa\app\controllers\Farmers.php 99
ERROR - 2022-09-14 11:50:10 --> Query error: Unknown column 'bank_name' in 'field list' - Invalid query: INSERT INTO `farmers_biodata` (`fname`, `mname`, `lname`, `farmerID`, `contact1`, `contact2`, `gender`, `join_date`, `center_id`, `location`, `marital_status`, `bank_name`, `bank_branch`, `acc_name`, `acc_number`) VALUES ('Alphonse', '', 'Mbithi', 'MBA201', '0897678793', '', 'male', '01/09/2022', '17', 'Kitundu', 'married', 'KCB', 'Thika', 'Ancent', '111078654')
ERROR - 2022-09-14 11:50:10 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::insert_farmerID() C:\xampp\htdocs\maziwa\app\controllers\Farmers.php 105
ERROR - 2022-09-14 11:53:35 --> Severity: error --> Exception: Call to undefined method CI_DB_mysqli_driver::insert_farmerID() C:\xampp\htdocs\maziwa\app\controllers\Farmers.php 105
ERROR - 2022-09-14 12:30:48 --> Severity: Warning --> Use of undefined constant selected - assumed 'selected' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\maziwa\app\views\farmers\edit.php 90
ERROR - 2022-09-14 12:31:11 --> Severity: Warning --> Use of undefined constant selected - assumed 'selected' (this will throw an Error in a future version of PHP) C:\xampp\htdocs\maziwa\app\views\farmers\edit.php 90
ERROR - 2022-09-14 13:00:43 --> Query error: Unknown column 'shop_sales.amount_paid' in 'field list' - Invalid query: SELECT `farmers_biodata`.*, `shop_sales`.`id` as `salesID`, `shop_sales`.`farmerID`, sum(shop_sales.amount_paid) as totAmount
FROM `farmers_biodata`
JOIN `shop_sales` ON `shop_sales`.`farmerID` = `farmers_biodata`.`farmerID`
WHERE `shop_sales`.`farmerID` = 'MBA2018'
GROUP BY `shop_sales`.`farmerID`
ERROR - 2022-09-14 13:00:43 --> Severity: error --> Exception: Call to a member function row_array() on bool C:\xampp\htdocs\maziwa\app\views\payments\addPayments.php 94
ERROR - 2022-09-14 13:02:10 --> Query error: Unknown column 'shop_sales.amount_paid' in 'field list' - Invalid query: SELECT `farmers_biodata`.*, `shop_sales`.`id` as `salesID`, `shop_sales`.`farmerID`, sum(shop_sales.amount_paid) as amount
FROM `farmers_biodata`
JOIN `shop_sales` ON `shop_sales`.`farmerID` = `farmers_biodata`.`farmerID`
WHERE `shop_sales`.`farmerID` = 'MBA2018'
GROUP BY `shop_sales`.`farmerID`
ERROR - 2022-09-14 13:02:10 --> Severity: error --> Exception: Call to a member function row_array() on bool C:\xampp\htdocs\maziwa\app\views\payments\addPayments.php 94
ERROR - 2022-09-14 13:02:13 --> Query error: Unknown column 'shop_sales.amount_paid' in 'field list' - Invalid query: SELECT `farmers_biodata`.*, `shop_sales`.`id` as `salesID`, `shop_sales`.`farmerID`, sum(shop_sales.amount_paid) as amount
FROM `farmers_biodata`
JOIN `shop_sales` ON `shop_sales`.`farmerID` = `farmers_biodata`.`farmerID`
WHERE `shop_sales`.`farmerID` = 'MBA2018'
GROUP BY `shop_sales`.`farmerID`
ERROR - 2022-09-14 13:02:13 --> Severity: error --> Exception: Call to a member function row_array() on bool C:\xampp\htdocs\maziwa\app\views\payments\addPayments.php 94
