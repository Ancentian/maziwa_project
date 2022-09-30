<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-09-30 09:04:28 --> Severity: error --> Exception: Call to a member function select_individualDeductions() on null C:\xampp\htdocs\maziwa\html\app\views\payments\addPayments.php 87
ERROR - 2022-09-30 09:04:31 --> Severity: error --> Exception: Call to a member function select_individualDeductions() on null C:\xampp\htdocs\maziwa\html\app\views\payments\addPayments.php 87
ERROR - 2022-09-30 09:24:50 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\maziwa\html\app\views\deductions\addDeduction.php 158
ERROR - 2022-09-30 09:37:50 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\maziwa\html\app\views\col_centers\centerMembers.php 199
ERROR - 2022-09-30 11:08:01 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 11:08:01 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 11:08:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\maziwa\html\app\views\deductions\addDeduction.php 158
ERROR - 2022-09-30 11:09:53 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE) C:\xampp\htdocs\maziwa\html\app\controllers\Deductions.php 32
ERROR - 2022-09-30 11:10:11 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\maziwa\html\app\views\deductions\addDeduction.php 158
ERROR - 2022-09-30 11:11:39 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 11:11:39 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 11:38:02 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `payments` (`from_date`, `to_date`, `milkRate`, `farmerID`, `total_milk`, `shopDeductions`, `individualDeductions`, `generalDeductions`, `created_by`) VALUES ('2022-09-01', '2022-09-30', '55', 'NKDCMBT001', '34', NULL, '300.00', Array, '2')
ERROR - 2022-09-30 11:38:02 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `payments` (`from_date`, `to_date`, `milkRate`, `farmerID`, `total_milk`, `shopDeductions`, `individualDeductions`, `generalDeductions`, `created_by`) VALUES ('2022-09-01', '2022-09-30', '55', 'NKDC/MGN/049', '13', NULL, '300.00', Array, '2')
ERROR - 2022-09-30 11:38:02 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `payments` (`from_date`, `to_date`, `milkRate`, `farmerID`, `total_milk`, `shopDeductions`, `individualDeductions`, `generalDeductions`, `created_by`) VALUES ('2022-09-01', '2022-09-30', '55', 'COWA1054', '10', NULL, '0', Array, '2')
ERROR - 2022-09-30 12:56:15 --> Query error: Unknown column 'payments.date' in 'group statement' - Invalid query: SELECT `payments`.*, `farmers_biodata`.`id` as `farID`, `farmers_biodata`.`fname`, `farmers_biodata`.`mname`, `farmers_biodata`.`lname`, `farmers_biodata`.`center_id`, `collection_centers`.`id` as `colID`, `collection_centers`.`centerName`, `users`.`id` as `userID`, `users`.`firstname`, `users`.`lastname`
FROM `payments`
JOIN `farmers_biodata` ON `farmers_biodata`.`farmerID` = `payments`.`farmerID`
JOIN `collection_centers` ON `collection_centers`.`id` = `farmers_biodata`.`center_id`
JOIN `users` ON `users`.`id` = `payments`.`created_by`
GROUP BY `payments`.`date`
ORDER BY `payments`.`created_at`
ERROR - 2022-09-30 12:56:15 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 256
ERROR - 2022-09-30 12:58:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`payments`.`to_date`
ORDER BY `payments`.`created_at`' at line 6 - Invalid query: SELECT `payments`.*, `farmers_biodata`.`id` as `farID`, `farmers_biodata`.`fname`, `farmers_biodata`.`mname`, `farmers_biodata`.`lname`, `farmers_biodata`.`center_id`, `collection_centers`.`id` as `colID`, `collection_centers`.`centerName`, `users`.`id` as `userID`, `users`.`firstname`, `users`.`lastname`
FROM `payments`
JOIN `farmers_biodata` ON `farmers_biodata`.`farmerID` = `payments`.`farmerID`
JOIN `collection_centers` ON `collection_centers`.`id` = `farmers_biodata`.`center_id`
JOIN `users` ON `users`.`id` = `payments`.`created_by`
GROUP BY `payments`.`from_date &&` `payments`.`to_date`
ORDER BY `payments`.`created_at`
ERROR - 2022-09-30 12:58:36 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 256
ERROR - 2022-09-30 12:58:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '`payments`.`to_date`
ORDER BY `payments`.`created_at`' at line 6 - Invalid query: SELECT `payments`.*, `farmers_biodata`.`id` as `farID`, `farmers_biodata`.`fname`, `farmers_biodata`.`mname`, `farmers_biodata`.`lname`, `farmers_biodata`.`center_id`, `collection_centers`.`id` as `colID`, `collection_centers`.`centerName`, `users`.`id` as `userID`, `users`.`firstname`, `users`.`lastname`
FROM `payments`
JOIN `farmers_biodata` ON `farmers_biodata`.`farmerID` = `payments`.`farmerID`
JOIN `collection_centers` ON `collection_centers`.`id` = `farmers_biodata`.`center_id`
JOIN `users` ON `users`.`id` = `payments`.`created_by`
GROUP BY `payments`.`from_date &&` `payments`.`to_date`
ORDER BY `payments`.`created_at`
ERROR - 2022-09-30 12:58:37 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\maziwa\html\app\models\Payments_model.php 256
ERROR - 2022-09-30 13:03:56 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 380
ERROR - 2022-09-30 13:03:59 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 380
ERROR - 2022-09-30 13:18:40 --> Severity: error --> Exception: syntax error, unexpected '?>' C:\xampp\htdocs\maziwa\html\app\views\printfiles\invoice.php 105
ERROR - 2022-09-30 13:19:17 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 380
ERROR - 2022-09-30 13:19:18 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 380
ERROR - 2022-09-30 13:20:07 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 380
ERROR - 2022-09-30 15:19:34 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 380
ERROR - 2022-09-30 15:31:33 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 222
ERROR - 2022-09-30 15:47:35 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 383
ERROR - 2022-09-30 15:47:35 --> Severity: Warning --> unlink(userfiles/temp/): Is a directory C:\xampp\htdocs\maziwa\html\app\controllers\Payments.php 383
ERROR - 2022-09-30 15:52:34 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\maziwa\html\app\views\col_centers\centerMembers.php 199
ERROR - 2022-09-30 15:53:52 --> Query error: Table 'cowa_maziwa.farmer_deductions' doesn't exist - Invalid query: DELETE FROM `farmer_deductions`
WHERE `id` = '0'
ERROR - 2022-09-30 15:54:01 --> Query error: Table 'cowa_maziwa.farmer_deductions' doesn't exist - Invalid query: DELETE FROM `farmer_deductions`
WHERE `id` = '0'
ERROR - 2022-09-30 15:54:08 --> Query error: Table 'cowa_maziwa.farmer_deductions' doesn't exist - Invalid query: DELETE FROM `farmer_deductions`
WHERE `id` = '0'
ERROR - 2022-09-30 15:54:15 --> Query error: Table 'cowa_maziwa.farmer_deductions' doesn't exist - Invalid query: DELETE FROM `farmer_deductions`
WHERE `id` = '0'
ERROR - 2022-09-30 15:54:21 --> Query error: Table 'cowa_maziwa.farmer_deductions' doesn't exist - Invalid query: DELETE FROM `farmer_deductions`
WHERE `id` = '0'
ERROR - 2022-09-30 16:16:36 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 16:16:36 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 16:20:35 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 16:20:35 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 16:21:50 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 16:21:50 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 16:22:19 --> 404 Page Not Found: Farmers/assets
ERROR - 2022-09-30 16:22:19 --> 404 Page Not Found: Farmers/assets
