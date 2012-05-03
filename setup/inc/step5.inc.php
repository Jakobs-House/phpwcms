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

// Write the final file
write_conf_file($phpwcms, true);

$_SERVER['DOCUMENT_ROOT'] = $phpwcms['DOC_ROOT'];
$phpwcms["root"] = !empty($phpwcms["root"]) ? "/".$phpwcms["root"] : "";

?>
<p><span class="title"><strong>Ready to start phpwcms?</strong> Some &quot;problems&quot;
    maybe OK - you can check by testing phpwcms installation.</span></p>
<table border="0" cellpadding="0" cellspacing="0" summary="">
  <tr><?php	
  
  $status = check_path_status($phpwcms["root"]."/".$phpwcms["file_path"]);	
  if($status != 2) {
  	$status = set_chmod($phpwcms["root"]."/".$phpwcms["file_path"], 0777, $status);
  }
  
  ?>
    <td align="right" class="v10">filestorage:&nbsp;</td>
	<td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["file_path"]) ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
  <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php	
  $status = check_path_status($phpwcms["root"]."/".$phpwcms["templates"]);
  
  ?>
    <td align="right" class="v10">templates:&nbsp;</td>
    <td<?php echo gib_bg_color($status) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["templates"]) ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status==1 ? 3 : $status) ?></td>
  </tr>
  
  <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php
  
  $template_lang_path = trim($phpwcms["templates"], '/').'/template_lang';
  $status = check_path_status($phpwcms["root"]."/".$template_lang_path);
  
  ?>
    <td align="right" class="v10">template&nbsp;languages:&nbsp;</td>
    <td<?php echo gib_bg_color($status) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($template_lang_path) ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status==1 ? 3 : $status) ?></td>
  </tr>
  
    <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php	
  $status = check_path_status($phpwcms["root"]."/".$phpwcms["ftp_path"]);	
  if($status != 2) {
  	$status = set_chmod($phpwcms["root"]."/".$phpwcms["ftp_path"], 0777, $status);
  }  
  
  ?>
    <td align="right" class="v10">ftp&nbsp;takeover:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["ftp_path"]) ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
  <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="8"></td></tr>
  <tr><?php	$status = check_path_status($phpwcms["root"]."/".$phpwcms["content_path"]);	?>
    <td align="right" class="v10">frontend&nbsp;content:&nbsp;</td>
    <td<?php echo gib_bg_color($status) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["content_path"]) ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status==1 ? 3 : $status) ?></td>
  </tr>
  <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php	
  	$status = check_path_status($phpwcms["root"]."/".$phpwcms["content_path"]."/images");	
	if($status != 2) {
  		$status = set_chmod($phpwcms["root"]."/".$phpwcms["content_path"]."/images", 0777, $status);
  	}  
	
	?>
    <td align="right" class="v10">frontend&nbsp;images:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["content_path"]."/images") ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
    <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php	
  	$status = check_path_status($phpwcms["root"]."/".$phpwcms["content_path"]."/form");	
	if($status != 2) {
  		$status = set_chmod($phpwcms["root"]."/".$phpwcms["content_path"]."/form", 0777, $status);
  	} 
	?>
    <td align="right" class="v10">frontend&nbsp;form:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["content_path"]."/form") ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
    <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php
  	$status = check_path_status($phpwcms["root"]."/".$phpwcms["content_path"]."/tmp");
	if($status != 2) {
  		$status = set_chmod($phpwcms["root"]."/".$phpwcms["content_path"]."/tmp", 0777, $status);
  	} 
	
	?>
    <td align="right" class="v10">frontend&nbsp;tmp:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["content_path"]."/tmp") ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
    <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php
  	$status = check_path_status($phpwcms["root"]."/".$phpwcms["content_path"]."/rss");	
	if($status != 2) {
  		$status = set_chmod($phpwcms["root"]."/".$phpwcms["content_path"]."/rss", 0777, $status);
  	} 
	?>
    <td align="right" class="v10">frontend&nbsp;rss:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["content_path"]."/rss") ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
    <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php
  	$status = check_path_status($phpwcms["root"]."/".$phpwcms["content_path"]."/pages");
	?>
    <td align="right" class="v10">frontend&nbsp;pages:&nbsp;</td>
    <td<?php echo gib_bg_color($status) ?>>&nbsp;<strong><font color="#FFFFFF"><?php echo html($phpwcms["content_path"]."/pages") ?></font></strong>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status==1 ? 3 : $status) ?></td>
  </tr>
  
       <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="8"></td></tr>
  <tr><?php
  	$status = check_file_status($phpwcms["root"]."/".$phpwcms["templates"]."/inc_default/startup.php");
	if($status != 2) {
  		$status = set_chmod($phpwcms["root"]."/".$phpwcms["templates"]."/inc_default/startup.php", 0666, $status, 1);
  	} 
	?>
    <td align="right" class="v10">startup text:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<font color="#FFFFFF"><?php echo html($phpwcms["templates"]."/inc_default/startup.php") ?></font>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
         <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php	
  	$status = check_file_status($phpwcms["root"]."/".$phpwcms["templates"]."/inc_css/frontend.css"); 
	if($status != 2) {
  		$status = set_chmod($phpwcms["root"]."/".$phpwcms["templates"]."/inc_css/frontend.css", 0666, $status, 1);
  	}
	
	?>
    <td align="right" class="v10">main CSS file:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<font color="#FFFFFF"><?php echo html($phpwcms["templates"]."/inc_css/frontend.css") ?></font>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>
  
  <tr><td colspan="4" class="v10"><img src="../include/img/leer.gif" alt="" width="1" height="2"></td></tr>
  <tr><?php	
  	$status = check_file_status($phpwcms["root"]."/include/config/conf.indexpage.inc.php");
	if($status != 2) {
  		$status = set_chmod($phpwcms["root"]."/".$phpwcms["templates"]."/include/config/conf.indexpage.inc.php", 0666, $status, 1);
  	}
	
	?>
    <td align="right" class="v10">index level settings:&nbsp;</td>
    <td<?php echo gib_bg_color($status==2?2:0) ?>>&nbsp;<font color="#FFFFFF"><?php echo html("include/config/conf.indexpage.inc.php") ?></font>&nbsp;</td>
    <td><img src="../include/img/leer.gif" alt="" width="1" height="19"></td>
    <td><?php echo gib_status_text($status) ?></td>
  </tr>

  <tr>
    <td colspan="4" class="v10">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" class="v10">&nbsp;</td>
    <td colspan="3"><table border="0" cellpadding="0" cellspacing="0" summary="">
      <tr>
        <td bgcolor="#99CC00">&nbsp;&nbsp;&nbsp;</td>
        <td class="v10">&nbsp;OK&nbsp;&nbsp;</td>
        <td bgcolor="#FF3300">&nbsp;&nbsp;&nbsp;</td>
        <td class="v10">&nbsp;PROBLEM</td>
      </tr>
    </table></td>
  </tr>
</table>

<p> <strong style="color:#FF0000;">ATTENTION!!!<br>Delete
  the &quot;setup&quot; folder
otherwise everybody might see your username, passwords and settings.</strong></p>
<p>To makes changes again or proof your values:<br />
&#8212; <a href="setup.php?step=1">MySQL database infos</a><br />
&#8212; <a href="setup.php?step=2">site infos and admin account</a><br />
&#8212; <a href="setup.php?step=3">path values</a><br />
&#8212; <a href="setup.php?step=4">content values</a></p>
<p>Please check infos about system and PHP version with the requirements. <strong>Very
    important when you use ImageMagick:</strong> Please check that the system
    can find the application (paths must be registered to the system - try this
    by using &quot;convert
    -version&quot; inside your terminal or command line). Check <a href="http://www.imagemagick.org/" target="_blank">http://www.imagemagick.org</a> for
    additional information.</p>
