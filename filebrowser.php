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

/**
 * Sept. 2009
 * enhancement to enable phpwcms filebrowser support in FCK Editor
 * based on concept and work of Markus Köhl <www.pagewerkstatt.ch>
 *
 * April 2011
 * - enhancement to enable phpwcms filebrowser support in CKEditor
 *   based on concept and work of Markus Köhl <www.leanux.ch>
 * - Issue 265 based on TB's post
 */

session_start();

$phpwcms			= array();
$js_files_all		= array();
$js_files_select	= array();
$phpwcms_root		= str_replace('\\', '/', dirname(__FILE__));
require_once ($phpwcms_root.'/include/config/conf.inc.php');
require_once ($phpwcms_root.'/include/lib/default.inc.php');

if( empty($_SESSION["wcs_user_lang"]) ) {

	session_destroy();
	headerRedirect( PHPWCMS_URL );

} else {

	require(PHPWCMS_ROOT.'/include/lang/backend/en/lang.ext.inc.php');
	$cust_lang = PHPWCMS_ROOT.'/include/lang/backend/' . strtolower(substr($_SESSION["wcs_user_lang"], 0, 2)) . '/lang.ext.inc.php';
	if(is_file($cust_lang)) {
		include($cust_lang);
	}

}

// set target for article summary/list image
if(isset($_GET['target'])) {

	switch($_GET['target']) {
		
		case 'list':	$_SESSION['filebrowser_image_target'] = '_list_';
						break;	
	
		default: 		$_SESSION['filebrowser_image_target'] = '_';
	}

} elseif(empty($_SESSION['filebrowser_image_target'])) {

	$_SESSION['filebrowser_image_target'] = '_';

}

if(isset($_GET['entry_id'])) {
	$_SESSION['filebrowser_image_entry_id'] = preg_replace('/[^a-z0-9_]/', '', $_GET['entry_id']);
}

require_once (PHPWCMS_ROOT.'/include/lib/dbcon.inc.php');
require_once (PHPWCMS_ROOT.'/include/lib/general.inc.php');

checkLogin();

require_once (PHPWCMS_ROOT.'/include/lib/backend.functions.inc.php');
require_once (PHPWCMS_ROOT.'/include/lib/imagick.convert.inc.php');

$phpwcms_filestorage = PHPWCMS_FILES;

$js_aktion = (isset($_GET["opt"])) ? intval($_GET["opt"]) : 0;

switch($js_aktion) {

	case 0: 	
	case 1: 	
	case 3: 
	case 7:
	case 8:
	case 5:
	case 11:
	case 17:	$titel		= $BL['IMAGE_TITLE'];	
				$filetype	= $BL['IMAGE_FILES'];
				break;

	case 4:
	case 9:
	case 10:
	case 16:
	case 15:
	case 18:	$titel		= $BL['FILE_TITLE'];
				$filetype	= $BL['FILES'];
				break;
	
	case 2:
	case 6:
	case 12:
	case 13:
	case 14:	$titel		= $BL['MEDIA_TITLE'];	
				$filetype	= $BL['MEDIA_FILES'];
				break;
	
}

if(isset($folder)) unset($folder);
if(isset($_SESSION["folder"])) $folder = $_SESSION["folder"];
if(isset($_GET["folder"])) {
	list($folder_id, $folder_value) = explode('|', $_GET["folder"]);
	$folder_value		= intval($folder_value);
	$folder[$folder_id] = $folder_value;
	$_SESSION["folder"] = $folder; // Return array with current opened folder session values
	if($folder_value) {
		$_SESSION["imgdir"] = $folder_id;
	}
}
$_SESSION["list_zaehler"] = 0;

// Which folder is active
if(isset($_GET["files"])) {

	$_SESSION["imgdir"] = intval($_GET["files"]);

} elseif(!isset($_SESSION["imgdir"])) {

	$_SESSION["imgdir"] = 0;

} elseif(isset($_SESSION["imgdir"])) {

	$_SESSION["imgdir"] = intval($_SESSION["imgdir"]);

}

//Does user have files and folders that can be used
$sql = "SELECT COUNT(f_id) FROM ".DB_PREPEND."phpwcms_file WHERE f_aktiv=1 AND (f_public=1 OR f_uid=".$_SESSION["wcs_user_id"].") AND f_trash=0 LIMIT 1";
if($result = mysql_query($sql, $db) or die ("error while counting private files")) {
	if($row = mysql_fetch_row($result)) $count_user_files = $row[0];
	mysql_free_result($result);
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title><?php echo $titel ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo PHPWCMS_CHARSET ?>" />
	<meta http-equiv="Expires" content="0" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="cache-control" content="no-cache" />
	<script src="include/js/phpwcms.js" type="text/javascript"></script>
	<script src="include/js/filebrowser.js" type="text/javascript"></script>
	<link href="include/css/phpwcms.css" rel="stylesheet" type="text/css" />
	<style type="text/css">body{margin:5px;}</style>

</head>

<body>
<table summary="" border="0" cellspacing="0" cellpadding="0">
  <tr>
		<td bgcolor="#7C98A2"><img src="include/img/leer.gif" alt="" width="1" height="1" border="0" /></td>
		<td rowspan="4"><img src="include/img/leer.gif" alt="" width="5" height="1" border="0" /></td>
		<td bgcolor="#7C98A2"><img src="include/img/leer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>
  <tr>
    <td bgcolor="#7C98A2" class="msgreiter">&nbsp;<?php echo $BL['FOLDER_LIST'] ?>&nbsp;</td>
    <td bgcolor="#7C98A2" class="msgreiter">&nbsp;<?php echo $filetype ?>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#7C98A2"><img src="include/img/leer.gif" alt="" width="1" height="1" border="0" /></td>
	<td bgcolor="#7C98A2"><img src="include/img/leer.gif" alt="" width="1" height="1" border="0" /></td>
  </tr>
  <tr>
    <td valign="top"><?php
	
if(!empty($count_user_files)) { //Listing in case of user files/folders

	echo '<table summary="" bgColor="#FCFDFD" border="0" cellspacing="0" cellpadding="0">'.LF;
	
	//Anzeige des Festplattensymbols
	$dirname = $BL['ROOT_DIR'];
	if(!isset($folder[0])) {
		$folder[0] = 0;
	}
	$folder_status = true_false($folder[0]);
	// Change based on Issue 265 by TB to allow file's uploader to select own items
	$count_sql = "SELECT COUNT(f_id) FROM ".DB_PREPEND."phpwcms_file WHERE f_pid=0 AND f_aktiv=1 AND f_trash=0 AND (f_public=1 OR f_uid=".$_SESSION["wcs_user_id"].") LIMIT 1";

	if($count_result = mysql_query($count_sql, $db)) {
		if($count_row = mysql_fetch_row($count_result)) {
			$count = '<img src="include/img/leer.gif" height="1" width="2" alt="" border="0" /><a href="filebrowser.php?opt='.$js_aktion.'&amp;folder=0'.
					 '%7C'.$folder_status.'">'.on_off($folder_status, $dirname, 0).'</a>';
			$count_wert = $count_row[0];
		}
		mysql_free_result($count_result);
	}
	
	// define current directory name
	$current_dirname = $dirname;
	
	$dirname	=  "<a href=\"filebrowser.php?opt=".$js_aktion."&amp;files=0\" title=\"".$BL['SHOW_FILES']."\">".$dirname."</a>";
	$bgcol		= (isset($row["f_id"]) && $row["f_id"] == $_SESSION["imgdir"]) ? ' bgcolor="#FED83F"' : '';
	
	echo '<tr'.$bgcol.'><td colspan="2"><img src="include/img/leer.gif" height="2" width="1" border="0" alt="" /></td></tr>'.LF; //Abstand vor
	echo '<tr'.$bgcol.'><td class="msglist" nowrap="nowrap">';
	echo $count.'<img src="include/img/leer.gif" height="1" width="4" border="0" alt="" /><img src="include/img/icons/harddisk_16x11.gif" border="0" alt="" />'; //Zellinhalt 1. Spalte
	echo '<img src="include/img/leer.gif" height="1" width="4" alt="" border="0" />'.$dirname.'</td><td><img src="include/img/leer.gif" height="1" width="5" border="0" alt="" /></td></tr>'.LF;
	//Aufbau trennende Tabellen-Zeile
	echo '<tr'.$bgcol.'><td colspan="2"><img src="include/img/leer.gif" height="1" width="1" border="0" alt="" /></td></tr>'.LF; //Abstand nach
	echo '<tr bgcolor="#CDDEE4"><td colspan="2"><img src="include/img/leer.gif" height="1" width="1" border="0" alt="" /></td></tr>'.LF;
		
	//Wenn überhaupt Ordner für User vorhanden, dann Listing
	if(!$folder_status && $count_wert) {
		folder_list(0, $db, 18, "filebrowser.php?opt=".$js_aktion."&amp;");
	}

	echo '</table>';
} else {
	echo "no files available";
}
	
	?></td>
    <td valign="top"><?php
	
	//Tabelle
	
	echo '<table summary="" bgColor="#FFFFFF" width="100%" border="0" cellspacing="0" cellpadding="0">'.LF;
	$file_sql  = "SELECT * FROM ".DB_PREPEND."phpwcms_file WHERE f_pid=".$_SESSION["imgdir"]." AND ";
	switch($js_aktion) {

		case 6:		$file_sql .= "f_ext IN ('swf', 'mp3', 'flv', 'mp4', 'm4v', 'f4v', 'jpg', 'jpeg', 'png', 'gif') AND ";
					break;
					
					// H.264
		case 12:	$file_sql .= "f_ext IN ('mp4', 'm4p', 'mov', 'm4p', 'm4a', 'm4v') AND ";
					break;
					
					// WebM
		case 13:	$file_sql .= "f_ext IN ('webm') AND ";
					break;
			
					// Ogg
		case 14:	$file_sql .= "f_ext IN ('ogg', 'ogv', 'oga', 'ogx') AND ";
					break;
		
					// Typical Doc files
		case 18:	$file_sql .= "f_ext IN ('pdf', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'ppt', 'pptx', 'odt', 'ods', 'odp', 'pages', 'key', 'numbers') AND ";
		case 15:	$entry_id  = empty($_SESSION['filebrowser_image_entry_id']) ? '' : $_SESSION['filebrowser_image_entry_id'];
					break;
		
		case 11:
		case 17:
		case 8:		$entry_id  = empty($_SESSION['filebrowser_image_entry_id']) ? '' : $_SESSION['filebrowser_image_entry_id'];
		case 7:		$file_sql .= "f_ext IN ('jpeg', 'jpg', 'png', 'gif') AND ";
					break;

		case 2: 	$default_ext  = "f_ext IN ('aif', 'aiff', 'mov', 'movie', 'mp3', 'mpeg', 'mpeg4', ";
					$default_ext .= "'mpeg2', 'wav', 'swf', 'ram', 'ra', 'wma', 'wmv', ";
					$default_ext .= "'avi', 'au', 'midi', 'moov', 'rm', 'rpm', 'mid', 'midi')";
				
					if(!empty($phpwcms["multimedia_ext"])) {
				
						$allowed_ext = convertStringToArray(strtolower($phpwcms["multimedia_ext"]));
						if(count($allowed_ext)) {						
							$default_ext = "f_ext IN ('".implode("', '", $allowed_ext) . "')";
						}
					
					}
				
					$file_sql .= $default_ext." AND ";
				
					break;

	}
	$file_sql .= "f_aktiv=1 AND f_kid=1 AND f_trash=0 AND ";
	$file_sql .= "(f_public=1 OR f_uid=".$_SESSION["wcs_user_id"].") ";
	$file_sql .= "ORDER BY f_sort, f_name";
	
	if($file_result = mysql_query($file_sql, $db) or die ("error while listing files<br />".html_entities($file_sql))) {
		$file_durchlauf = 0;
		
		if(empty($_SESSION['image_browser_article'])) {
			$target_form = 'articlecontent';
		} else {
			$target_form = 'article';
		}
		
		while($file_row = mysql_fetch_array($file_result)) {
			$filename = html_specialchars($file_row["f_name"]);
			
			$thumb_image = true;
			if( !in_array($js_aktion, array(2, 4, 9, 10, 16, 18)) ) {
				// check if file can have thumbnail - if so it can be choosen for usage
				$thumb_image = get_cached_image(
			 					array(	"target_ext"	=>	$file_row["f_ext"],
										"image_name"	=>	$file_row["f_hash"] . '.' . $file_row["f_ext"],
										"thumb_name"	=>	md5($file_row["f_hash"].$phpwcms["img_list_width"].$phpwcms["img_list_height"].$phpwcms["sharpen_level"])
        							  )
								);
			}

			if($thumb_image != false || in_array($js_aktion, array(6, 10, 12, 13, 14, 16, 18))) {
			
				$js_files_select[$file_durchlauf] = '	  [' . $file_durchlauf .', ' . $file_row["f_id"] . ', "' . $filename . '"]';
				$add_all = false;
			
				switch($js_aktion) {
					case 0:  $jst = empty($_SESSION['filebrowser_image_target']) ? '_' : $_SESSION['filebrowser_image_target']; 
					
							 $js  = "window.opener.document.".$target_form.".cimage".$jst."name.value='".$filename."';";
							 $js .= "window.opener.document.".$target_form.".cimage".$jst."id.value='".$file_row["f_id"]."';";
						 	 break;

					case 2:  $js  = "window.opener.document.articlecontent.cmedia_name.value='".$filename."';";
							 $js .= "window.opener.document.articlecontent.cmedia_id.value='".$file_row["f_id"]."';";
						 	 break;
							 
					case 6:
					case 12:
					case 13:
					case 14: $js = "window.opener.setIdName('".$file_row["f_id"]."', '".$filename."', ".$js_aktion.");";
						 	 break;
					
					case 18: 
					case 15: $js = "window.opener.setIdName('".$entry_id."', '".$file_row["f_id"]."', '".$filename."');";
						 	 break;
							 
					case 7:  $js = "window.opener.setImgIdName('".$file_row["f_id"]."', '".$filename."');";
						 	 break;
							 
					case 8:  $js = "window.opener.setImgIdName('".$entry_id."', '".$file_row["f_id"]."', '".$filename."');";
						 	 break;
				
					case 4:  $js = "addFile(window.opener.document.articlecontent.cfile_list,'".$filename."','".$file_row["f_id"]."');";
							 $js_files_all[] = $js;
							 $add_all = true;
							 break;
							 
					case 9:  $js = "window.opener.addFile('".$file_row["f_id"]."', '".$filename."');";
							 $js_files_all[] = $js;
							 $add_all = true;
							 break;
							 
					case 5:  $js = "addFile(window.opener.img_field,'".$filename."','".$file_row["f_id"]."');";
							 $js_files_all[] = $js;
							 $add_all = true;
							 break;
							 
					//mod
					case 10: $js  = "window.opener.SetUrl('download.php?f=".$file_row["f_hash"] . "&target=0');";
							 break;
		
					case 11: $js  = "window.opener.SetUrl('include/img/cmsimage.php/0x0/".$file_row["f_hash"] . '.' . $file_row["f_ext"]. "');";
							 break;
							 
					//CKEditor
					case 16: $js  = "window.opener.CKEDITOR.tools.callFunction(2, 'download.php?f=".$file_row["f_hash"] . "&target=0');";
							 break;
					
					case 17: $js  = "window.opener.CKEDITOR.tools.callFunction(2,'include/img/cmsimage.php/0x0/".$file_row["f_hash"] . '.' . $file_row["f_ext"]. "');";
							 break;
						
						 
					default: $js = "addFile(window.opener.document.articlecontent.cimage_list,'".$filename."','".$file_row["f_id"]."');";
							 $js_files_all[] = $js;
							 $add_all = true;
				}
				
				// show "add all files"
				if($file_durchlauf === 0 && $add_all) {
				
					echo '
						<tr id="addAllFilesLink">
							<td colspan="4" class="add_all_files"><a href="#" onclick="addAllFiles();return false;" title="' . $BL['ADD_ALL_FILES'] . '">' . 
								$BL['ADD_ALL_FILES'] .	'
								<img src="include/img/button/add_9x9a.gif" alt="" border="0" />
								</a></td>
						</tr>
						<tr>
							<td colspan="4" bgcolor="#CDDEE4"><img src="include/img/leer.gif" alt="" border="0" /></td>
						</tr>
						  ';
				
				}
			
				echo '<tr><td colspan="4"><img src="include/img/leer.gif" width="1" height="2" border="0" alt="" /></td></tr>'.LF;
				echo "<tr>\n<td><img src=\"include/img/icons/small_".extimg($file_row["f_ext"])."\" border=\"0\" alt=\"\" hspace=\"3\" vspace=\"1\" /></td>\n";
        	
        		if($js_aktion != 4 && $js_aktion != 10 && $js_aktion != 16) {
        			echo "<td class=\"msglist\">".$filename."</td>\n<td><img src=\"include/img/leer.gif\" width=\"5\" height=\"1\" alt=\"\" border=\"0\" />";
				} else {
					echo "<td class=\"msglist\"><a href=\"#\" onclick=\"".$js."tmt_winControl('self','close()');\">".$filename."</a></td>\n<td>";
				}
			
				echo "<a href=\"#\" onclick=\"".$js."return false;\" title=\"".$BL['TAKE_IMAGE']."\">";
				echo "<img src=\"include/img/button/add_9x9a.gif\" border=\"0\" alt=\"\" hspace=\"5\" vspace=\"2\" /></a></td>\n";
				echo "<td><img src=\"include/img/leer.gif\" alt=\"\" border=\"0\" /></td>\n</tr>\n";
				echo "<tr><td colspan=\"4\"><img src=\"include/img/leer.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" /></td></tr>\n";
				if(!empty($thumb_image[0]) && in_array( $js_aktion, array(0, 1, 3, 5, 6, 7, 8, 10, 11, 17, 18) ) ) {
					echo "<tr><td>&nbsp;</td>\n<td colspan=\"3\"><a href=\"#\" onclick=\"".$js;
					echo "tmt_winControl('self','close()');\">";
					echo '<img src="'.PHPWCMS_IMAGES . $thumb_image[0] .'" border="0" '.$thumb_image[3].' alt="" />';
					echo "</a></td>\n</tr>\n";
				}
				echo "<tr><td colspan=\"4\"><img src=\"include/img/leer.gif\" width=\"1\" height=\"2\" alt=\"\" border=\"0\" /></td></tr>\n";
				echo "<tr><td colspan=\"4\" bgcolor=\"#CDDEE4\"><img src=\"include/img/leer.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" /></td></tr>\n";
				$file_durchlauf++;
			}

		}
		if(!$file_durchlauf) { //Abschluss der Filelisten-Tabelle
			echo "<tr><td colspan=\"4\"><img src=\"include/img/leer.gif\" width=\"3\" height=\"2\" alt=\"\" border=\"0\" /></td></tr>\n";
			echo "<tr><td colspan=\"4\" class=\"msglist\">&nbsp;".$BL['NO_FILE']."&nbsp;&nbsp;</td></tr>\n";
			echo "<tr><td colspan=\"4\"><img src=\"include/img/leer.gif\" width=\"3\" height=\"2\" alt=\"\" border=\"0\" /></td></tr>\n";
		}
	} //Ende Liste Dateien
	
	echo "</table>";
	
	if( count($js_files_select) ) {
		
		echo LF . '<script type="text/javascript">';
		echo LF . SCRIPT_CDATA_START . LF;
		
		echo 'var files_all = new Array(' . LF;
		echo implode(','.LF, $js_files_select);
		echo LF . '	);';
		echo LF . 'var files_total = ' . $file_durchlauf . ';';
		
		echo LF . LF;
		echo 'function addAllFiles() {';
		echo LF . '	';
		echo implode(LF . '	', $js_files_all);
		echo LF . '	//if(closewin == true) tmt_winControl("self","close()");';
		echo LF . '	getObjectById("addAllFilesLink").style.display = "none";';
		echo LF . '	if(confirm("' . str_replace('{VAL}', $current_dirname, $BL['ADD_ALL_CONFIRM']) . '")) tmt_winControl("self","close()");';
		echo LF . '}' . LF;
		
		echo LF . SCRIPT_CDATA_END;
		echo LF . '</script>' . LF;
		
		
	}
	
	?></td>
  </tr>
</table>
</body>
</html>
<?php

//function folder_list($pid, $dbcon, $vor, $zieldatei) {
function folder_list($pid, $dbcon, $vor, $zieldatei) {
	global $current_dirname;
	$folder = $_SESSION["folder"];
	$pid = intval($pid);
	$userID = intval($_SESSION["wcs_user_id"]);
	$sql = "SELECT f_id, f_name, f_aktiv, f_public FROM ".DB_PREPEND."phpwcms_file WHERE ".
		   "f_pid=".intval($pid)." AND f_aktiv=1 AND f_kid=0 AND f_trash=0 AND ".
		   "(f_public=1 OR f_uid=".$userID.") ORDER BY f_sort, f_name";
	$result = mysql_query($sql, $dbcon);
	while($row = mysql_fetch_array($result)) {
	
		$dirname = html_specialchars($row["f_name"]);
		
		//Ermitteln des Aufolderwertes
		if(!isset($folder[$row["f_id"]])) $folder[$row["f_id"]] = 0;
		$folder_status = true_false($folder[$row["f_id"]]);
		
		//Ermitteln, ob überhaupt abhängige Dateien/Ordner existieren
		$count_sql = "SELECT COUNT(f_id) FROM ".DB_PREPEND."phpwcms_file WHERE ".
					 "f_pid=".$row["f_id"]." AND f_trash=0 AND f_aktiv=1 AND ".
					 "(f_public=1 OR f_uid=".$userID.") LIMIT 1";
		if($count_result = mysql_query($count_sql, $dbcon)) {
			if($count_row = mysql_fetch_row($count_result)) {
				$count = '<img src="include/img/leer.gif" height="1" width="2" alt="" border="0" /><a href="'.$zieldatei."folder=".$row["f_id"].
						 '%7C'.$folder_status.'">'.on_off($folder_status, $dirname, 0).'</a>';
				$count_wert = $count_row[0];
			}
			mysql_free_result($count_result);
		}
		
		$dirname = '<a href="'.$zieldatei."files=".$row["f_id"].'" title="'.$GLOBALS['BL']['SHOW_FILES1'].'">'. $dirname . '</a>';

		if($row["f_id"] == $_SESSION["imgdir"]) {
			$bgcol = ' bgcolor="#FED83F"';
			$current_dirname = $row["f_name"];
		} else {
			$bgcol = '';
		}
		
		//Aufbau der Zeile
		echo "<tr".$bgcol."><td colspan=\"2\"><img src=\"include/img/leer.gif\" height=\"2\" width=\"1\" alt=\"\" border=\"0\" /></td></tr>\n"; //Abstand vor
		echo "<tr".$bgcol."><td class=\"msglist\" nowrap=\"nowrap\">";
		echo $count."<img src=\"include/img/leer.gif\" height=\"1\" width=\"".($vor+6)."\" border=\"0\" alt=\"\" /><img src=\"include/img/icons/folder_zu.gif\" border=\"0\" alt=\"\" />"; //Zellinhalt 1. Spalte
		echo "<img src=\"include/img/leer.gif\" height=\"1\" width=\"5\" alt=\"\" border=\"0\" />".$dirname."</td><td><img src=\"include/img/leer.gif\" height=\"1\" width=\"5\" alt=\"\" border=\"0\" /></td></tr>\n";
		//Aufbau trennende Tabellen-Zeile
		echo "<tr".$bgcol."><td colspan=\"2\"><img src=\"include/img/leer.gif\" height=\"1\" width=\"1\" alt=\"\" border=\"0\" /></td></tr>\n"; //Abstand nach
		echo "<tr bgcolor=\"#CDDEE4\"><td colspan=\"2\"><img src=\"include/img/leer.gif\" height=\"1\" width=\"1\" alt=\"\" border=\"0\" /></td></tr>\n"; //Trennlinie<img src='include/img/lines/line-lightgrey-dotted-538.gif'>
		
		//Weiter, wenn Unterstruktur
		if(!$folder_status && $count_wert) {
			folder_list($row["f_id"], $dbcon, $vor+18, $zieldatei); //, $userID
		}
		
		//Zaehler mitführen
		$_SESSION["list_zaehler"]++;
	}
	mysql_free_result($result);
}

function on_off($wert, $string, $art = 1) {
	//Erzeugt das Status-Zeichen für Klapp-Auf/Zu
	//Wenn Art = 1 dann als Zeichen, ansonsten als Bild
	if($wert) {
		if($art == 1) {
			return "+";
		} else {
			return "<img src=\"include/img/symbols/klapp_zu.gif\" border=\"0\" alt=\"\" title=\"".$GLOBALS['BL']['OPEN_DIR'].": ".$string."\" />";
		}
	} else {
		if($art == 1) {
			return "-";
		} else {
			return "<img src=\"include/img/symbols/klapp_auf.gif\" border=\"0\" alt=\"\" title=\"".$GLOBALS['BL']['CLOSE_DIR'].": ".$string."\" />";
		}
	}
}

function true_false($wert) {
	//Wechselt den Wahr/Falsch wert zum Gegenteil: 1=>0 und 0=>1
	if(intval($wert)) { return 0; } else { return 1; }
}

?>