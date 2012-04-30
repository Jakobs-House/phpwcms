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


// Reference

if(!isset($content['reference'])) {

	$content['reference']["text"] = '';
	$content["reference"]['tmpl'] = '';
	$content['reference']["select"] = array();
	$content['reference']["list"] = array();
	$content['reference']["caption"] = '';
	$content['reference']["zoom"] = 0;
	$content['reference']["width"] = '';
	$content['reference']["height"] = '';
	$content['reference']["border"] = '';
	$content['reference']["pos"] = 0;
	$content['reference']["blockwidth"] = '';
	$content['reference']["blockheight"] = '';
	$content['reference']["space"] = '';
	$content['reference']["listborder"] = '';
	$content["reference"]["basis"] = 0;

}

$imgx=0;
$img_thumbs = '';

?>
<tr>
	<td align="right" class="chatlist"><?php echo $BL['be_admin_struct_template'] ?>:&nbsp;</td>
	<td><select name="creference_tmpl" id="creference_tmpl" class="f11b">
  <?php
// templates for Reference
$tmpllist = get_tmpl_files(PHPWCMS_TEMPLATE.'inc_cntpart/reference');
if(is_array($tmpllist) && count($tmpllist)) {
	foreach($tmpllist as $val) {
		$vals = '';
		if($val == $content["reference"]['tmpl']) $vals= ' selected="selected"';
		$val = htmlspecialchars($val);
		echo '<option value="'.$val.'"'.$vals.'>'.$val."</option>\n";
	}
}
				  
?>				  
	  </select></td></tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="10"></td></tr>
<tr><td colspan="2"><img src="include/img/lines/l538_70.gif" alt="" width="538" height="1"></td></tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="7"></td></tr>

<tr>
<td align="right" valign="top" class="chatlist"><img src="include/img/leer.gif" alt="" width="1" height="13"><?php echo $BL['be_cnt_plaintext'] ?>:&nbsp;</td>
<td valign="top"><textarea name="creference_text" rows="15" wrap="VIRTUAL" class="f11" id="creference_text" style="width: 440px"><?php echo  $content['reference']["text"] ?></textarea></td>
</tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="8"></td></tr>
<tr>
  <td align="right" valign="top" class="chatlist"><img src="include/img/leer.gif" alt="" width="1" height="13"><?php echo $BL['be_cnt_image'] ?>:&nbsp;</td>
  <td valign="top"><table border="0" cellpadding="0" cellspacing="0" summary="">
      <tr>
        <td valign="top"><select name="cimage_list[]" size="<?php echo (count($content['reference']["select"]))?(count($content['reference']["select"])+5):5; ?>" multiple class="f11" id="cimage_list" style="width: 300px;">
            <?php
				    if(is_array($content['reference']["list"]) && count($content['reference']["list"])) {
						
						foreach($content['reference']["list"] as $key => $value) {
				   			
							$thumb_image = get_cached_image(
												array(	"target_ext"	=>	$content['reference']["list"][$key][3],
														"image_name"	=>	$content['reference']["list"][$key][2] . '.' . $content['reference']["list"][$key][3],
														"thumb_name"	=>	md5(	$content['reference']["list"][$key][2].
																					$phpwcms["img_list_width"].
																					$phpwcms["img_list_height"].
																					$phpwcms["sharpen_level"]
																				) ) );
																				
							if($thumb_image != false) {
							
								echo "<option value=\"".$content['reference']["list"][$key][0]."\">";
								$img_name = html_specialchars($content['reference']["list"][$key][1]);
								echo $img_name."</option>\n";
								
								if($imgx == 4) {
									$img_thumbs .= '<br><img src="include/img/leer.gif" alt="" border="0" width="1" height="2"><br>';
									$imgx = 0;
								}
								if($imgx) {
									$img_thumbs .= '<img src="include/img/leer.gif" alt="" border="0" width="2" height="1">';
								}
								$img_thumbs .= '<img src="'.PHPWCMS_IMAGES . $thumb_image[0] .'" border="0" '.$thumb_image[3].' alt="'.$img_name.'" title="'.$img_name.'">';

								$imgx++;
							
							}
							
						}
						
				    }
					?>
          </select></td>
        <td valign="top"><img src="include/img/leer.gif" alt="" width="5" height="1"></td>                                          <!-- browser_image.php //-->
        <td valign="top"><a href="javascript:;" title="<?php echo $BL['be_cnt_openimagebrowser'] ?>" onclick="openFileBrowser('filebrowser.php?opt=3&amp;target=nolist')"><img src="include/img/button/open_image_button.gif" alt="" width="20" height="15" border="0"></a><br />
          <img src="include/img/leer.gif" alt="" width="1" height="4"><br />
          <a href="javascript:;" title="<?php echo $BL['be_cnt_sortup'] ?>" onclick="moveOptionUp(document.articlecontent.cimage_list);"><img src="include/img/button/image_pos_up.gif" alt="" width="10" height="9" border="0"></a><a href="javascript:;" title="<?php echo $BL['be_cnt_sortdown'] ?>" onclick="moveOptionDown(document.articlecontent.cimage_list);"><img src="include/img/button/image_pos_down.gif" alt="" width="10" height="9" border="0"></a><br />
          <img src="include/img/leer.gif" alt="" width="1" height="4"><br />
          <a href="javascript:;" onclick="removeSelectedOptions(document.articlecontent.cimage_list);" title="<?php echo $BL['be_cnt_delimage'] ?>"><img src="include/img/button/del_image_button1.gif" alt="" width="20" height="15" border="0"></a></td>
      </tr>
    </table><?php

if($img_thumbs) { 
	echo '<table border="0" cellspacing="0" cellpadding="0">
		<tr><td style="padding-bottom:3px;"><img src="include/img/leer.gif" width="1" height="5"><br>'.$img_thumbs.'</td></tr>
		</table>';
}

?></td>
</tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="5"></td></tr>
<tr>
  <td align="right" valign="top" class="chatlist"><img src="include/img/leer.gif" alt="" width="1" height="13"><?php echo $BL['be_cnt_caption'] ?>:&nbsp;</td>
  <td valign="top"><textarea name="creference_caption" cols="40" rows="<?php echo (count($content['reference']["list"])) ? (count($content['reference']["list"]) + 4) : 5 ?>" wrap="off" class="f11" id="creference_caption" style="width:440px"><?php echo html_specialchars($content['reference']["caption"]) ?></textarea></td>
</tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="5"></td></tr>
<tr>
  <td align="right" class="chatlist"><?php echo $BL['be_cnt_reference_zoom'] ?>:&nbsp;</td>
  <td valign="top"><table border="0" cellpadding="0" cellspacing="0" bgcolor="#E7E8EB" summary="">
      <tr>
        <td><input name="creference_zoom" type="checkbox" id="creference_zoom" value="1" <?php is_checked(1, $content['reference']["zoom"]); ?>></td>
        <td class="v10">&nbsp;<?php echo $BL['be_cnt_enlarge'] ?>&nbsp;&nbsp;</td>
      </tr>
    </table></td>
</tr>

<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="8"></td></tr>
<tr><td colspan="2"><img src="include/img/lines/l538_70.gif" alt="" width="538" height="1"></td></tr>
<tr><td><img src="include/img/leer.gif" alt="" width="1" height="22"></td><td class="chatlist"><strong><?php echo $BL['be_cnt_reference_largetext']; ?>:</strong></td></tr>
<tr>
  <td align="right" class="chatlist"><?php echo $BL['be_cnt_maxw'] ?>:&nbsp;</td>
  <td valign="top"><table border="0" cellpadding="0" cellspacing="0" summary="">
      <tr>
        <td><input name="creference_width" type="text" class="f11b" id="creference_width" style="width: 50px;" size="5" maxlength="5" onKeyUp="if(!parseInt(this.value*1)) this.value='';" value="<?php echo $content['reference']["width"] ?>"></td>
        <td class="chatlist">&nbsp;&nbsp;<?php echo $BL['be_cnt_maxh'] ?>:&nbsp;</td>
        <td><input name="creference_height" type="text" class="f11b" id="creference_height" style="width: 50px;" size="5" maxlength="5" onKeyUp="if(!parseInt(this.value*1)) this.value='';" value="<?php echo $content['reference']["height"] ?>"></td>
		<td class="chatlist">&nbsp;px&nbsp;&nbsp;&nbsp;<?php echo $BL['be_cnt_reference_border'] ?>:&nbsp;</td>
        <td><input name="creference_border" type="text" class="f11b" id="creference_border" style="width: 30px;" size="3" maxlength="3" onKeyUp="if(!parseInt(this.value*1)) this.value='0';" value="<?php echo $content['reference']["border"] ?>"></td>
      </tr>
    </table></td>
</tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="8"></td></tr>
<tr><td colspan="2"><img src="include/img/lines/l538_70.gif" alt="" width="538" height="1"></td></tr>
<tr><td><img src="include/img/leer.gif" alt="" width="1" height="22"></td><td class="chatlist"><strong><?php echo $BL['be_cnt_reference_aligntext'] ?>:</strong></td></tr>
<tr>
  <td align="right" class="chatlist"><?php echo $BL['be_cnt_reference_basis'] ?>:&nbsp;</td>
  <td valign="top"><table border="0" cellpadding="0" cellspacing="0" summary="">
    <tr>
      <td bgcolor="#E7E8EB"><input name="creference_basis" type="radio" value="0" <?php is_checked(0, $content["reference"]["basis"]); ?>></td>
      <td class="v10" bgcolor="#E7E8EB"><?php echo $BL['be_cnt_reference_horizontal'] ?>&nbsp;</td>
      <td bgcolor="#E7E8EB"><input name="creference_basis" type="radio" value="1" <?php is_checked(1, $content["reference"]["basis"]); ?>></td>
      <td class="v10" bgcolor="#E7E8EB"><?php echo $BL['be_cnt_reference_vertical'] ?>&nbsp;&nbsp;</td>
	  <td class="chatlist">&nbsp;&nbsp;&nbsp;</td>
  	  <td><select name="creference_pos" class="f10" id="creference_pos">
		<option value="0" <?php is_selected(0, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_default'] ?></option>
		<option value="1" <?php is_selected(1, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_left'].', '.$BL['be_admin_page_top'] ?></option>
		<option value="2" <?php is_selected(2, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_left'].', '.$BL['be_cnt_reference_middle'] ?></option>
		<option value="3" <?php is_selected(3, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_left'].', '.$BL['be_admin_page_bottom'] ?></option>
		<option value="4" <?php is_selected(4, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_center'].', '.$BL['be_admin_page_top'] ?></option>
		<option value="5" <?php is_selected(5, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_center'].',. '.$BL['be_cnt_reference_middle'] ?></option>
		<option value="6" <?php is_selected(6, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_center'].', '.$BL['be_admin_page_bottom'] ?></option>
		<option value="7" <?php is_selected(7, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_right'].', '.$BL['be_admin_page_top'] ?></option>
		<option value="8" <?php is_selected(8, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_right'].', '.$BL['be_cnt_reference_middle'] ?></option>
		<option value="9" <?php is_selected(9, $content['reference']["pos"]) ?>><?php echo $BL['be_cnt_right'].', '.$BL['be_admin_page_bottom'] ?></option>
		</select></td>
      </tr>
  </table></td>
</tr>

<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="5"></td></tr>
<tr>
  <td align="right" class="chatlist"><?php echo $BL['be_cnt_reference_block'] ?>:&nbsp;</td>
  <td valign="top"><table border="0" cellpadding="0" cellspacing="0" summary="">
      <tr>
	    
		<td><input name="creference_blockwidth" type="text" class="f11b" id="creference_blockwidth" style="width: 50px;" size="5" maxlength="5" onKeyUp="if(!parseInt(this.value*1)) this.value='';" value="<?php echo $content['reference']["blockwidth"] ?>"></td>
        <td class="chatlist">&nbsp;x&nbsp;</td>
        <td><input name="creference_blockheight" type="text" class="f11b" id="creference_blockheight" style="width: 50px;" size="5" maxlength="5" onKeyUp="if(!parseInt(this.value*1)) this.value='';" value="<?php echo $content['reference']["blockheight"] ?>"></td>
		<td class="chatlist">&nbsp;px&nbsp;&nbsp;&nbsp;<?php echo $BL['be_cnt_imagespace'] ?>:&nbsp;</td>
        <td><input name="creference_space" type="text" class="f11b" id="creference_space" style="width: 50px;" size="2" maxlength="2" onKeyUp="if(!parseInt(this.value*1)) this.value='0';" value="<?php echo $content['reference']["space"] ?>"></td>
        <td class="chatlist">&nbsp;px&nbsp;&nbsp;<?php echo $BL['be_cnt_reference_border'] ?>:&nbsp;</td>
        <td><input name="creference_listborder" type="text" class="f11b" id="creference_listborder" style="width: 30px;" size="3" maxlength="3" onKeyUp="if(!parseInt(this.value*1)) this.value='0';" value="<?php echo $content['reference']["listborder"] ?>"></td>
      </tr>
    </table></td>
</tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="10"></td></tr>
<tr><td colspan="2"><img src="include/img/lines/l538_70.gif" alt="" width="538" height="1"></td></tr>
<tr><td colspan="2"><img src="include/img/leer.gif" alt="" width="1" height="3"></td></tr>