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


$_entry['query']			= '';

// create pagination
if(isset($_GET['c'])) {
	$_SESSION['list_user_count'] = $_GET['c'] == 'all' ? '99999' : intval($_GET['c']);
}
if(isset($_GET['page'])) {
	$_SESSION['seolog_page'] = intval($_GET['page']);
}

// set default values for paginating
if(empty($_SESSION['list_user_count'])) {
	$_SESSION['list_user_count'] = 25;
}

// paginate and search form processing
if(isset($_POST['do_pagination'])) {

	$_SESSION['list_active']	= empty($_POST['showactive']) ? 0 : 1;
	$_SESSION['list_inactive']	= empty($_POST['showinactive']) ? 0 : 1;

	$_SESSION['filter']			= clean_slweg($_POST['filter']);
	if(empty($_SESSION['filter'])) {
		unset($_SESSION['filter']);
	} else {
		$_SESSION['filter']	= convertStringToArray($_SESSION['filter'], ' ');
		$_POST['filter']	= $_SESSION['filter'];
	}
	
	$_SESSION['seolog_page'] = intval($_POST['page']);

}

if(empty($_SESSION['seolog_page'])) {
	$_SESSION['seolog_page'] = 1;
}

$_entry['list_active']		= isset($_SESSION['list_active'])	? $_SESSION['list_active']		: 1;
$_entry['list_inactive']	= isset($_SESSION['list_inactive'])	? $_SESSION['list_inactive']	: 1;


$_entry['query'] = '1=1';

if(isset($_SESSION['filter']) && is_array($_SESSION['filter']) && count($_SESSION['filter'])) {
	
	$_entry['filter_array'] = array();

	foreach($_SESSION['filter'] as $_entry['filter']) {
		//usr_name, usr_login, usr_email
		$_entry['filter_array'][] = "CONCAT(domain,query) LIKE '%".aporeplace($_entry['filter'])."%'";
	}
	if(count($_entry['filter_array'])) {
		
		$_SESSION['filter'] = ' AND ('.implode(' OR ', $_entry['filter_array']).')';
		$_entry['query'] .= $_SESSION['filter'];
	
	}

} elseif(isset($_SESSION['filter']) && is_string($_SESSION['filter'])) {

	$_entry['query'] .= $_SESSION['filter'];

}


// paginating values
$_entry['count_total'] = _dbQuery('SELECT * FROM '.DB_PREPEND.'phpwcms_log_seo WHERE '.$_entry['query'], 'COUNT');
$_entry['pages_total'] = ceil($_entry['count_total'] / $_SESSION['list_user_count']);
if($_SESSION['seolog_page'] > $_entry['pages_total']) {
	$_SESSION['seolog_page'] = empty($_entry['pages_total']) ? 1 : $_entry['pages_total'];
}



?>
<h1 class="title" style="margin-bottom:10px"><?php echo $BLM['listing_title'] ?></h1>
<form action="<?php echo MODULE_HREF ?>" method="post" name="paginate" id="paginate"><input type="hidden" name="do_pagination" value="1" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="paginate" summary="">
	<tr>
		<td><table border="0" cellpadding="0" cellspacing="0" summary="">
			<tr>
<?php 
if($_entry['pages_total'] > 1) {

	echo '<td>';
	if($_SESSION['seolog_page'] > 1) {
		echo '<a href="'.MODULE_HREF.'&amp;page='.($_SESSION['seolog_page']-1).'">';
		echo '<img src="include/img/famfamfam/action_back.gif" alt="" border="0" /></a>';
	} else {
		echo '<img src="include/img/famfamfam/action_back.gif" alt="" border="0" class="inactive" />';
	}
	echo '</td>';
	echo '<td><input type="text" name="page" id="page" maxlength="4" size="4" value="'.$_SESSION['seolog_page'];
	echo '"  class="textinput" style="margin:0 3px 0 5px;width:30px;font-weight:bold;" /></td>';
	echo '<td class="chatlist">/'.$_entry['pages_total'].'&nbsp;</td>';
	echo '<td>';
	if($_SESSION['seolog_page'] < $_entry['pages_total']) {
		echo '<a href="'.MODULE_HREF.'&amp;page='.($_SESSION['seolog_page']+1).'">';
		echo '<img src="include/img/famfamfam/action_forward.gif" alt="" border="0" /></a>';
	} else {
		echo '<img src="include/img/famfamfam/action_forward.gif" alt="" border="0" class="inactive" />';
	}
	echo '</td><td class="chatlist">&nbsp;|&nbsp;</td>';

} else {

	echo '<td class="chatlist"><input type="hidden" name="page" id="page" value="1" /></td>';

}
?>
				<td><input type="text" name="filter" id="filter" size="10" value="<?php 
				
				if(isset($_POST['filter']) && is_array($_POST['filter']) ) {
					echo html(implode(' ', $_POST['filter']));
				}
				
				?>" class="textinput" style="margin:0 2px 0 0;width:110px;text-align:left;" title="filter results" /></td>
				<td><input type="image" name="gofilter" src="include/img/famfamfam/action_go.gif" style="margin-right:3px;" /></td>
			
			</tr>
		</table></td>

	<td class="chatlist" align="right">
		<a href="<?php echo MODULE_HREF ?>&amp;c=10">10</a>
		<a href="<?php echo MODULE_HREF ?>&amp;c=25">25</a>
		<a href="<?php echo MODULE_HREF ?>&amp;c=50">50</a>
		<a href="<?php echo MODULE_HREF ?>&amp;c=100">100</a>
		<a href="<?php echo MODULE_HREF ?>&amp;c=250">250</a>
		<a href="<?php echo MODULE_HREF ?>&amp;c=all"><?php echo $BL['be_ftptakeover_all'] ?></a>
	</td>

	</tr>
</table>
</form>

<table width="100%" border="0" cellpadding="0" cellspacing="0" summary="">
		
	<tr><td colspan="4"><img src="include/img/leer.gif" alt="" width="1" height="3"></td></tr>
	<tr><td colspan="4" bgcolor="#92A1AF"><img src="include/img/leer.gif" alt="" width="1" height="1"></td></tr>
	
<?php
// loop listing available newsletters
$row_count = 0;                

$sql  = 'SELECT * FROM '.DB_PREPEND.'phpwcms_log_seo WHERE '.$_entry['query'].' ';
$sql .= 'LIMIT '.(($_SESSION['seolog_page']-1) * $_SESSION['list_user_count']).','.$_SESSION['list_user_count'];
$data = _dbQuery($sql);

#print_r($sql);

foreach($data as $row) {

	echo '<tr'.( ($row_count % 2) ? ' bgcolor="#F3F5F8"' : '' ).'>';

	echo '<td class="tdbottom3 tdtop3" nowrap="nowrap">';
	echo $row['create_date'];
	echo '&nbsp;</td>';
		
	echo '<td class="tdbottom3 tdtop3"><a href="';
	echo html($row['referrer']).'" target="_blank">'.html($row['domain']);
	echo '</a></td>';
	
	echo '<td class="tdbottom3 tdtop3" align="center">&nbsp;';
	echo $row['pos'];
	echo '&nbsp;</td>';

	
	echo '<td class="tdbottom3 tdtop3">';
	echo html(PHPWCMS_CHARSET != 'utf-8' && phpwcms_seems_utf8($row['query']) ? makeCharsetConversion($row['query'], 'utf-8', PHPWCMS_CHARSET, false) : $row['query']);
	echo '</td>';

	echo "</tr>\n";

	$row_count++;
}

if($row_count) {
	echo '<tr><td colspan="4" bgcolor="#92A1AF"><img src="include/img/leer.gif" alt="" width="1" height="1"></td></tr>';
}

?>	

	<tr><td colspan="4"><img src="include/img/leer.gif" alt="" width="1" height="15"></td></tr>
</table>