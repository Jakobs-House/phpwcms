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


?>
<form action="phpwcms.php?do=messages&amp;p=4&amp;s=<?php echo $_userInfo['subscriber_data']['address_id'] ?>&amp;edit=1" method="post" name="editsubscriber" id="editsubscriber" style="background:#F3F5F8;border-top:1px solid #92A1AF;border-bottom:1px solid #92A1AF;margin:0 0 5px 0;padding:10px 10px 15px 10px">
<table border="0" cellpadding="0" cellspacing="0" summary="">

	<tr> 
		<td align="right" class="chatlist"><?php echo $BL['be_cnt_last_edited']  ?>:&nbsp;</td>
		<td class="v10"><?php echo html($_userInfo['subscriber_data']['address_tstamp']) ?></td>
	</tr>
	
	<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="5" /></td>
	</tr>

	<tr> 
		<td align="right" class="chatlist"><?php echo $BL['be_profile_label_email']  ?>:&nbsp;</td>
		<td><input name="subscribe_email" type="text" id="subscribe_email" class="f11b<?php 
		
		//error class
		if(!empty($_userInfo['error']['email'])) echo ' errorInputText';
		
		?>" style="width:300px;" value="<?php echo html($_userInfo['subscriber_data']['address_email']) ?>" size="30" /></td>
	</tr>
	
	<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="2" /></td>
	</tr>
	
	<tr> 
		<td align="right" class="chatlist"><?php echo $BL['be_cnt_ecardform_name']  ?>:&nbsp;</td>
		<td><input name="subscribe_name" type="text" id="subscribe_name" class="f11b" style="width:300px;" value="<?php echo html($_userInfo['subscriber_data']['address_name']) ?>" size="30" /></td>
	</tr>
	
	<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="5" /></td></tr>
	
	<tr>
		<td align="right" class="chatlist" valign="top" style="padding-top: 4px;"><?php 
		
	echo $BL['be_cnt_subscription'] ;
	
	//retrieve available subscriptions
	$_userInfo['select_subscr'] = '';
	$_userInfo['subscr_all']	= 1;
	$_userInfo['subscriptions'] = _dbQuery("SELECT * FROM ".DB_PREPEND."phpwcms_subscription ORDER BY subscription_name");

	$_userInfo['subscriber_data']['subscriptions']	= unserialize($_userInfo['subscriber_data']['address_subscription']);
	
	if($_userInfo['subscriptions']) {
			
		foreach($_userInfo['subscriptions'] as $value) {
		
			$_userInfo['select_subscr'] .= '		<tr>
				<td><input type="checkbox" name="subscribe_to[]" id="subscribe_to'.$value['subscription_id'].'" value="'.$value['subscription_id'].'"';
			if(is_array($_userInfo['subscriber_data']['subscriptions']) && in_array($value['subscription_id'], $_userInfo['subscriber_data']['subscriptions'])) {
			
				$_userInfo['select_subscr'] .= ' checked="checked"';
				$_userInfo['subscr_all']	 = 0;
			
			}
			$_userInfo['select_subscr'] .= ' /></td>
				<td><label for="subscribe_to'.$value['subscription_id'].'">'.
				html($value['subscription_name']).
				'</label></td>
			</tr>
			';
		}
	
	}
	
	
	?>:&nbsp;</td>
		<td><table border="0" cellpadding="0" cellspacing="0" summary="">
		
			<tr>
				<td><input type="checkbox" name="subscribe_all" id="subscribe_all" value="1"<?php is_checked($_userInfo['subscr_all'], 1) ?> /></td>
				<td><label for="subscribe_all"><?php echo $BL['be_newsletter_allsubscriptions'] ?></label></td>
			</tr>
			
	<?php echo $_userInfo['select_subscr'] ?>
		
		</table></td>
	
	</tr>
	
	<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="5" /></td></tr>
	
	<tr>
		<td align="right" class="chatlist"><?php echo $BL['be_ftptakeover_status'] ?>:&nbsp;</td>
		<td><table border="0" cellpadding="0" cellspacing="0" summary="">		
			<tr>
				<td><input type="checkbox" name="subscribe_active" id="subscribe_active" value="1"<?php is_checked($_userInfo['subscriber_data']['address_verified'], 1) ?> /></td>
				<td><label for="subscribe_active"><?php echo $BL['be_cnt_activated'] ?></label></td>
			</tr>
		</table></td>
	</tr>
	
	<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="10" /></td>
	</tr>
	<tr> 
		<td>&nbsp;</td>
		<td>
			<input name="submit" type="submit" class="button10" value="<?php echo empty($_userInfo['subscriber_data']['address_id']) ? $BL['be_admin_fcat_button2'] : $BL['be_article_cnt_button1'] ?>" />
			<input name="save" type="submit" class="button10" value="<?php echo $BL['be_article_cnt_button3'] ?>" />
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input name="new" type="button" class="button10" value="<?php echo ucfirst($BL['be_msg_new']) ?>" onclick="location.href='phpwcms.php?do=messages&p=4&s=0&edit=1';return false;" />
			<input name="close" type="button" class="button10" value="<?php echo $BL['be_admin_struct_close'] ?>" onclick="location.href='phpwcms.php?do=messages&p=4';return false;" />
		</td>
	</tr>

</table>
</form>
