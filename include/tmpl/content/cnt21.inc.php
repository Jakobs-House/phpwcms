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


// Page / ext. Content

if(!isset($content["page_file"])) {

	$content["page_file"]["source"] = 0;
	$content["page_file"]["pfile"] = '';

}

?>
<tr>
  <td align="right" class="chatlist"><?php echo $BL['be_cnt_pages_from'] ?>:&nbsp;</td>
  <td valign="top"><table border="0" cellpadding="0" cellspacing="0" bgcolor="#E7E8EB" summary="">
  <tr>
  	<td><input name="cpage_source" type="radio" value="0" <?php is_checked(0, $content["page_file"]["source"]) ?>></td>
	<td><?php echo $BL['be_cnt_pages_fromfile'] ?>&nbsp;&nbsp;</td>
	<td><input name="cpage_source" type="radio" value="1" <?php is_checked(1, $content["page_file"]["source"]) ?>></td>
	<td><?php echo $BL['be_cnt_pages_manually'] ?>&nbsp;&nbsp;&nbsp;</td>
  </tr></table></td>
</tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="5"></td></tr>
<tr>
  <td align="right" class="chatlist"><?php echo $BL['be_cnt_pages_cust'] ?>:&nbsp;</td>
  <td><input name="cpage_custom" type="text" class="f11" id="cpage_custom" style="width: 440px" value="<?php echo  html($content["page_file"]["pfile"]) ?>" size="40"></td>
</tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="3"></td></tr>
<tr>
	<td align="right" valign="top" class="chatlist"><img src="include/img/leer.gif" alt="" width="1" height="15" /><?php echo $BL['be_cnt_pages_select'] ?>:&nbsp;</td>
	<td valign="top"><div style="width:440px;height:200px;overflow:auto;border: 1px solid #7F9DB9;"><?php

echo '<table cellspacing="0" cellpadding="0" border="0" width="100%">';

// browse pages subdirectory

browse_pages_dir($phpwcms['content_path'].'pages');

function browse_pages_dir($dir) {

	$pc = 0;
	$da = array(); //directory array
	$fa = array(); //file array
	if(is_dir($dir)) {
		$ph = opendir($dir);
		while($pf = readdir($ph)) {
   			if($pf != '.' && $pf != '..') {
			
				if(is_dir($dir.'/'.$pf)) {
				
					$da[] = $pf; //add $pf to folder array for current dir				
				
				} else {
					
					if( preg_match('/(\.html|\.htm|\.txt|\.php|\.inc|\.tmpl)$/', strtolower($pf)) ) {
						$fa[] = $pf; //add $pf to file array for current dir
					}
				
				}
			}
		}
		closedir($ph);
		
		// list files
		if(count($fa)) {
			$x = 0;
			foreach($fa as $value) {
				if(!$x) {
					echo "\n<tr bgcolor=\"#E7E8EB\" style=\"height:19px;\"><td colspan=\"2\" class=\"chatlist\">";
					echo '&nbsp;&nbsp;<strong>'.html($dir);
					echo "</strong></td></tr>\n";
					echo '<tr><td colspan="2"><img src="include/img/leer.gif" width="1" height="2" alt="" /></td></tr>';
				}
				echo "\n<tr><td align=\"center\">";
				echo '<input name="cpage_file" type="radio" value="'.html($dir.'/'.$value).'" ';
				
				if($GLOBALS['content']['page_file']['pfile'] == ($dir.'/'.$value)) {
					echo 'checked="checked" ';
				}				
				echo '/>';
				echo '</td><td><strong>';
				echo str_replace(' ', '&nbsp;', html($value));
				echo '</strong></td></tr>';
				$x++;
			}
			echo '<tr><td colspan="2"><img src="include/img/leer.gif" width="1" height="2" alt="" /></td></tr>';
		}
		
		// check all subdirs
		if(count($da)) {
			foreach($da as $value) browse_pages_dir($dir.'/'.$value);
		}
		
	}
}

echo "\n<tr><td width=\"25\">";
echo '<img src="include/img/leer.gif" width="26" height="1" alt="" /></td><td width="99%"><img src="include/img/leer.gif" width="1" height="1" alt="" /></td></tr>';
echo "\n</table>";

?></div></td>
</tr>