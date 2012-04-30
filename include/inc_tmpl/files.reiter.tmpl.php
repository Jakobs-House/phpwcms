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



// Files-Navigation
		
//$no_durchlauf = 0; //Definieren der Durchlauf-Variable
$files_folder = (isset($_GET["f"])) ? intval($_GET["f"]) : 0; //Ermitteln, welcher Unterreiter angezeigt wird

//Wenn Cut/Paste f�r Seite Aktiv, dann
$add_paste_icon = '<a href="phpwcms.php?do=files&f=0&mkdir=0" title="'.$BL['be_ftab_createnew'].
				  '"><img src="include/img/button/add_13x13.gif" border="0"></a>';
if(isset($_GET["cut"])) { 
	$cutID = intval($_GET["cut"]);
	$add_paste_icon = '<a href="include/inc_act/act_file.php?paste='.$cutID.'|0" title="'.$BL['be_ftab_paste'].
					  '"><img src="include/img/button/paste_13x13.gif" border="0"></a>';
} else { $cutID=0; }

$change_thumbnail_icon = '<a href="include/inc_act/act_file.php?thumbnail=';
if($_SESSION["wcs_user_thumb"]) {
	$change_thumbnail_icon .= '0" title="'.$BL['be_ftab_disablethumb'].'">';
	$change_thumbnail_icon .= '<img src="include/img/button/thumbnail_13x13_0.gif" border="0"></a>';
} else {
	$change_thumbnail_icon .= '1" title="'.$BL['be_ftab_enablethumb'].'">';
	$change_thumbnail_icon .= '<img src="include/img/button/thumbnail_13x13_1.gif" border="0"></a>';
}
		
?>
<table width="538" border="0" cellpadding="0" cellspacing="0" summary="">
<tr><td class="title"><?php echo $BL['be_ftab_title'] ?></td></tr>
<tr><td><img src="include/img/leer.gif" alt="" width="1" height="6" /></td></tr>
<tr><td><table width="538" border="0" cellpadding="2" cellspacing="0" summary="">
	<tr>
		<td width="90" align="center" background="include/img/background/bg_eckeli.gif" <?php which_folder_active($files_folder, 0) ?>><a href="phpwcms.php?do=files&amp;f=0"><?php echo $BL['be_ftab_private'] ?></a></td>
		<td width="90" align="center" background="include/img/background/bg_eckeli.gif" <?php which_folder_active($files_folder, 1) ?>><a href="phpwcms.php?do=files&amp;f=1"><?php echo $BL['be_ftab_public'] ?></a></td>
		<td width="90" align="center" background="include/img/background/bg_eckeli.gif" <?php which_folder_active($files_folder, 3) ?>><a href="phpwcms.php?do=files&amp;f=3"><?php echo $BL['be_ftab_search'] ?></a></td>
		<td width="90" align="center" background="include/img/background/bg_eckeli.gif" <?php which_folder_active($files_folder, 2) ?>><a href="phpwcms.php?do=files&amp;f=2"><?php echo $BL['be_ftab_trash'] ?></a></td>
		<?php if($files_folder == 0) { ?>
		<td width="162" align="right" background="include/img/background/bg_ecke_lang.gif" bgcolor="#EBF2F4" class="chatlist"><img src="include/img/button/root_dir.gif" alt="" width="43" height="13" /><a href="phpwcms.php?do=files&amp;f=0&amp;upload=0" title="<?php echo $BL['be_ftab_upload'] ?>"><img src="include/img/button/upload_13x13.gif" alt="" width="13" height="13" border="0" /></a><?php echo $add_paste_icon ?><a href="include/inc_help/filehelp.htm" target="_blank" onclick="flevPopupLink(this.href,'filehelp','scrollbars=yes,resizable=yes,width=320,height=300',0);return document.MM_returnValue" style="cursor: help;"><img src="include/img/button/help_22x13.gif" alt="open file help" width="22" height="13" border="0" /></a><a href="phpwcms.php?do=files&amp;f=0&amp;all=open" title="<?php echo $BL['be_ftab_open'] ?>"><img src="include/img/button/alle_auf.gif" alt="" width="12" height="13" border="0" /></a><a href="phpwcms.php?do=files&amp;f=0&amp;all=close" title="<?php echo $BL['be_ftab_close'] ?>"><img src="include/img/button/alle_zu.gif" alt="" width="12" height="13" border="0" /></a><img src="include/img/leer.gif" alt="" width="5" height="1" /><?php echo $change_thumbnail_icon ?></td>
		<?php } elseif($files_folder == 1) { ?>
		<td width="162" align="right" background="include/img/background/bg_ecke_lang.gif" bgcolor="#EBF2F4" class="chatlist"><a href="include/inc_help/filehelp.htm" target="_blank" onclick="flevPopupLink(this.href,'filehelp','scrollbars=yes,resizable=yes,width=320,height=300',0);return document.MM_returnValue" style="cursor: help;"><img src="include/img/button/help_22x13.gif" alt="<?php echo $BL['be_ftab_filehelp'] ?>" width="22" height="13" border="0" /></a><a href="phpwcms.php?do=files&amp;f=1&amp;all=close" title="<?php echo $BL['be_ftab_close'] ?>"><img src="include/img/button/alle_zu.gif" alt="" width="12" height="13" border="0" /></a><img src="include/img/leer.gif" alt="" width="5" height="1" /><?php echo $change_thumbnail_icon ?></td>
		<?php } elseif($files_folder == 3) { ?>
		<td width="162" align="right" background="include/img/background/bg_ecke_lang.gif" bgcolor="#EBF2F4" class="chatlist"><a href="include/inc_help/filehelp.htm" target="_blank" onclick="flevPopupLink(this.href,'filehelp','scrollbars=yes,resizable=yes,width=320,height=300',0);return document.MM_returnValue" style="cursor: help;"><img src="include/img/button/help_22x13.gif" alt="<?php echo $BL['be_ftab_filehelp'] ?>" width="22" height="13" border="0" /></a><img src="include/img/leer.gif" alt="" width="5" height="1" /><?php echo $change_thumbnail_icon ?></td>
		<?php } else { echo '<td width="162" class="chatlist">&nbsp;</td>'."\n"; } ?>
	</tr></table></td></tr>
<tr><td bgcolor="#9BBECA"><img src="include/img/leer.gif" alt="" width="1" height="4" /></td>
</tr></table>