<?php
/*************************************************************************************
   Copyright notice
   
   (c) 2002-2009 Oliver Georgi (oliver@phpwcms.de) // All rights reserved.
 
   This script is part of PHPWCMS. The PHPWCMS web content management system is
   free software; you can redistribute it and/or modify it under the terms of
   the GNU General Public License as published by the Free Software Foundation;
   either version 2 of the License, or (at your option) any later version.
  
   The GNU General Public License can be found at http://www.gnu.org/copyleft/gpl.html
   A copy is found in the textfile GPL.txt and important notices to the license 
   from the author is found in LICENSE.txt distributed with these scripts.
  
   This script is distributed in the hope that it will be useful, but WITHOUT ANY 
   WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
   PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 
   This copyright notice MUST APPEAR in all copies of the script!
*************************************************************************************/

// ----------------------------------------------------------------
// obligate check for phpwcms constants
if (!defined('PHPWCMS_ROOT')) {
   die("You Cannot Access This Script Directly, Have a Nice Day.");
}
// ----------------------------------------------------------------


$_userInfo['delimeter']				= clean_slweg($_POST['delimeter']);
if(empty($_userInfo['delimeter'])) 	$_userInfo['delimeter'] = ';';

$_userInfo['subscribe_active']		= empty($_POST['subscribe_active']) ? 0 : 1;
$_userInfo['subscribe_all']			= empty($_POST['subscribe_all']) ? 0 : 1;

if(isset($_POST['subscribe_select']) && is_array($_POST['subscribe_select'])) {
	$_userInfo['subscribe_select']	= $_POST['subscribe_select'];
} else {
	$_userInfo['subscribe_select']	= array();
	$_userInfo['subscribe_all']		= 1;
}

// check uploaded FILE
if(getimagesize($_FILES['cvsfile']['tmp_name'])) {

	$_userInfo['csvError'] = 'False MIME TYPE. Be sure to upload CSV file only.';

} elseif(is_uploaded_file($_FILES['cvsfile']['tmp_name']) && !$_FILES['cvsfile']['error']) {

	$_userInfo['csvFileTyper'] = strtolower(trim($_FILES['cvsfile']['type']));

	switch($_userInfo['csvFileTyper']) {
	
		case 'application/vnd-ms-excel':
		case 'application/vnd.ms-excel':
		case 'text/plain':
		case 'text/csv':
		case 'text/x-csv':
		case 'application/x-csv':
		case 'application/csv':
		case 'text/comma-separated-values':
		case 'application/octet-stream':

					$_userInfo['csv'] 				= csvFileToArray($_FILES['cvsfile']['tmp_name'], $_userInfo['delimeter']);
					
					if(is_array($_userInfo['csv'])) {
					
						$_userInfo['nonImported']	= array();
						$c = 1;
						$_userInfo['csvTime']		= time();
					
						foreach($_userInfo['csv'] as $row) {
							
							if(!isset($row[1])) $row[1] = '';
							
							if(!empty($row[0]) && is_valid_email($row[0])) {
							
								$sql  = "INSERT INTO ".DB_PREPEND."phpwcms_address (";
								$sql .= "address_email, address_name, address_key, address_subscription, address_verified, address_tstamp) VALUES (";
								$sql .= "'".aporeplace($row[0])."', ";
								$sql .= "'".aporeplace($row[1])."', ";
								$sql .= "'".aporeplace(shortHash($row[0].time()))."', ";
								$sql .= "'".($_userInfo['subscribe_all'] ? '' : aporeplace(serialize($_userInfo['subscribe_select'])))."', ";
								$sql .= $_userInfo['subscribe_active'].", FROM_UNIXTIME(".$_userInfo['csvTime'].") )";
								
								$sql  = _dbQuery($sql, 'INSERT');
								if(empty($sql['INSERT_ID'])) {
									$_userInfo['nonImported'][$c] = $row[0].'; '.$row[1].' ('.mysql_error().')';
								}
							
							} else {
								
								$_userInfo['nonImported'][$c] = $row[0].'; '.$row[1];
							
							}
					
							$c++;
						}
					
					}
					
					break;
					
		default: 	$_userInfo['csvError'] = 'False MIME TYPE. Be sure to upload CSV file only.';
					@unlink($_FILES['cvsfile']['tmp_name']);
	}

} elseif($_FILES['cvsfile']['error']) {

	$_userInfo['csvError'] = return_upload_errormsg($_FILES['cvsfile']['error']);

}



?>