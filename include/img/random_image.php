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

$phpwcms	= array();
$DOC_ROOT	= rtrim(str_replace('\\', '/', dirname(dirname(__FILE__)) ), '/');
require_once ($DOC_ROOT.'/config/conf.inc.php');
require_once ($DOC_ROOT.'/inc_lib/default.inc.php');


//Random Pic send to browser
$imgpath = trim($_GET["imgdir"]);
$imgArray = array();


$root_path = PHPWCMS_ROOT;
if(!$root_path) {
	$root_path = preg_replace('/(.*)([\/|\\\].(.*)){2}/', '$1', $_SERVER['PATH_TRANSLATED']);
}


if($imgpath) {
	
	$imgpath = str_replace("\\", "/", $root_path."/".$imgpath."/");
	$imgpath = str_replace("//", "/", $imgpath );
	$imgpath = str_replace("../", "/", $imgpath );
	$imgpath = str_replace("//", "/", $imgpath );
	
	if(is_dir($imgpath)) {
		$handle = opendir( $imgpath );
		while($file = readdir( $handle )) {
   			if( $file != "." && $file != ".." && preg_match('/(\.jpg|\.jpeg|\.png|\.gif)$/', strtolower($file)) ) 
				$imgArray[] = $file;
		}
		closedir( $handle );
	}
}

$file = $DOC_ROOT."/img/leer.gif";
if(is_array($imgArray) && sizeof($imgArray)) {
	mt_srand( (double)microtime( ) * 1000000 );
	$randval = mt_rand( 0, sizeof( $imgArray ) - 1 );
	$file = $imgpath.$imgArray[ $randval ];
}

$imageinfo = getimagesize($file);

if($imageinfo != false && isset($imageinfo[2])) {

	switch($imageinfo[2]) {
		//1 = GIF, 2 = JPG, 3 = PNG
		case 1: header("Content-Type: image/gif"); break;
		case 2: header("Content-Type: image/jpeg"); break;
		case 3: header("Content-Type: image/png"); break;
		default: header("Content-Type: image/gif");
	}

	@readfile($file);

} else {
	die('Error reading image');
}

?>