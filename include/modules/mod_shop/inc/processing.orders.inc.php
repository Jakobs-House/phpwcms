<?php
/*************************************************************************************
   Copyright notice
   
   (c) 2002-2012 Oliver Georgi <oliver@phpwcms.de> // All rights reserved.
 
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


if($action == 'delete') {

	$plugin['data']['order_id']		= intval($_GET['delete']);

	$sql  = 'UPDATE '.DB_PREPEND.'phpwcms_shop_orders SET ';
	$sql .= "order_status = 'CLOSED' ";
	$sql .= "WHERE order_id = " . $plugin['data']['order_id'];
	
	_dbQuery($sql, 'UPDATE');

	headerRedirect( shop_url('controller=order', '') );

} elseif($action == 'show') {

	if(isset($_POST['order_status'])) {

		$plugin['order_status'] = array();
		
		if(!empty($_POST['status_payment'])) {
			$plugin['order_status'][] = 'PAYED';
		}
		if(!empty($_POST['status_send'])) {
			$plugin['order_status'][] = 'SENT';
		}
		if(!empty($_POST['status_back'])) {
			$plugin['order_status'][] = 'RETURN';
		}
		if(!empty($_POST['status_done'])) {
			$plugin['order_status'][] = 'COMPLETED';
		}
		
		$plugin['order_status'] = implode('-', $plugin['order_status']);
		if($plugin['order_status'] == '') {
			$plugin['order_status'] = 'NEW-ORDER';
		}		
		$sql  = 'UPDATE '.DB_PREPEND."phpwcms_shop_orders SET order_status='".aporeplace($plugin['order_status'])."' ";
		$sql .= "WHERE order_id=" . intval($_POST['order_status']);
		
		if( _dbQuery($sql, 'UPDATE') ) {
			set_status_message($BLM['shopprod_status_msg'], 'success');
		}
	}
	

	$sql  = 'SELECT *, UNIX_TIMESTAMP(order_date) AS order_date_unix FROM '.DB_PREPEND.'phpwcms_shop_orders ';
	$sql .= "WHERE order_id = " . intval($_GET['show']);

	$plugin['data'] = _dbQuery($sql);
	
	if(isset($plugin['data'][0])) {
		
		$plugin['data'] = $plugin['data'][0];
		$plugin['data']['order_data'] = @unserialize($plugin['data']['order_data']);
		
	} else {
	
		headerRedirect( shop_url('controller=order', '') );
	
	}
	
	$BLM['shopprod_payby_INVOICE'] = $BLM['shopprod_payby_onbill'];

}


?>