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


// load external GD image handling class
include_once(PHPWCMS_ROOT."/include/lib/helper.image.php");


// Deprecated function, use for 3rd party fallback usage
function imagick_converting($config=array()) {
	return image_manipulate($config);
}

// Resize, Crop and other image manipulation
function image_manipulate($config=array()) {
	
	global $phpwcms;
	
	// Merge config values with default
	$config = array_merge(array(
			"max_width"		=> $phpwcms["img_list_width"],
			"max_height"	=> $phpwcms["img_list_height"],
			"error"			=> '',
			"image_name"	=> '',
			"thumb_name"	=> '',
			"target_ext"	=> 'jpg',
			"image_dir"		=> PHPWCMS_ROOT.'/'.PHPWCMS_FILES,
			"thumb_dir"		=> PHPWCMS_THUMB,
			'jpg_quality'	=> 85,
			'sharpen_level'	=> 0,
			'density'		=> 72,
			'add_command'	=> '',
			'crop_image'	=> false,
			'master_dim'	=> 'auto'
		), $config);
	
	// Test width and height and set correct dimensions
	if(!intval($config["max_width"]) && !intval($config["max_height"])) {
		// Should not happen, but better have a fallback
		$config["max_width"]	= $phpwcms["img_list_width"];
		$config["max_height"]	= $phpwcms["img_list_height"];
		$config['master_dim']	= 'auto';
	} elseif(!intval($config["max_width"])) {
		// No width given, recalculate final image size based on height
		$config["max_width"]	= $phpwcms["img_prev_width"];
		$config['crop_image']	= false;
		$config['master_dim']	= 'height';
	} elseif(!intval($config["max_height"])) {
		// No height given, recalculate final image size based on width
		$config["max_height"]	= $phpwcms["img_prev_height"];
		$config['crop_image']	= false;
		$config['master_dim']	= 'width';
	}
	
	// Check if source image is accessible
	// otherwise use placeholder image "filestorage/image_placeholder.png"
	if(!is_file($config["image_dir"].$config["image_name"])) {
		$config["image_name"]  = 'image_placeholder.png';
		$config["thumb_name"]  = 'temp_'.$config["thumb_name"];
	}
	
	// Doubled config setting but especially for Image manipulation class
	$image_config = array(
		
		'image_library'		=> $phpwcms['image_library'],
		'library_path'		=> $phpwcms['library_path'],
		'source_image'		=> $config["image_dir"].$config["image_name"],
		'new_image'			=> $config["thumb_dir"].$config["thumb_name"].'.'.$config["target_ext"],
		'maintain_ratio'	=> true,
		'width'				=> $config['max_width'],
		'height'			=> $config['max_height'],
		'master_dim'		=> $config['master_dim'],
		'sharpen'			=> $config['sharpen_level'],
		'quality'			=> $config['jpg_quality'],
		'create_thumb'		=> false,
		'target_ext'		=> $config["target_ext"]

	);
	
	$IMG = new Phpwcms_Image_lib($image_config);
	
	// try to handle limited PHP memory
	if(empty($GLOBALS['phpwcms']['gd_memcheck_off']) && ($phpwcms['image_library'] == 'gd2' || $phpwcms['image_library'] == 'gd')) {

		$php_memory = getBytes( @ini_get('memory_limit') );
		$img_memory = getRealImageSize( $IMG->image_current_vals );
		
		// do memory checks only when PHP's memory limit 
		// and "real" image size is known
		if($php_memory && $img_memory) {
			
			// test if we have enough PHP memory for this image and test to set it up
			if($php_memory / 3 < $img_memory) {
				@ini_set('memory_limit', $img_memory * 3);
			}
			
			$php_memory = getBytes( @ini_get('memory_limit') );
			
			// still not enough, use fallback memory warning image
			if($php_memory / 3 < $img_memory) {
				$config["image_name"]			= 'image_memoryinfo.png';
				$config["thumb_name"]			= 'mem_'.$config["thumb_name"];
				
				$image_config['source_image']	= $config["image_dir"].$config["image_name"];
				$image_config['new_image']		= $config["thumb_dir"].$config["thumb_name"].'.'.$config["target_ext"];
				
				$IMG->initialize($image_config);
			}
		
		}
	}
	
		
	if($phpwcms['image_library'] == 'imagemagick' && $config['crop_image']) {
		
		$IMG->crop_centered_resize();
	
	} elseif($config['crop_image']) {
		
		$image_config = set_cropped_imagesize($image_config, $IMG->orig_width, $IMG->orig_height);
		
		if( $image_config['do_cropping'] ) {
			
			// first resize width recalculated height/width
			$IMG->width		= $image_config['resize_width'];
			$IMG->height	= $image_config['resize_height'];
			$IMG->quality	= 100;
			$IMG->resize();
			
			$image_config['sharpen']		= 0;
			$image_config['maintain_ratio']	= FALSE;
			$image_config['create_thumb']	= FALSE;
			$image_config['source_image']	= $image_config['new_image'];

			$IMG->initialize( $image_config );
			$IMG->crop();
		
		} else {
			
			$IMG->resize();
			
		}
		
		
	} else {
	
		$IMG->resize();
	
	}
	
	$config["thumb_name"]	= $IMG->dest_image;
	$config['error']		= $IMG->display_errors('<li>', '</li>', '<ul class="error">', '</ul>');

	return $config;
}

// ========================================================================================================================


// build thumbnail image name
function get_cached_image($val=array(), $db_track=true, $return_all_imageinfo=true) {
	
	$val = array_merge(array(
		"max_width"		=>	$GLOBALS['phpwcms']["img_list_width"],
		"max_height"	=>	$GLOBALS['phpwcms']["img_list_height"],
		"image_dir"		=>	PHPWCMS_ROOT . '/' . PHPWCMS_FILES,
		"thumb_dir"		=>	PHPWCMS_ROOT . '/' . PHPWCMS_IMAGES,
		'jpg_quality'	=>	$GLOBALS['phpwcms']['jpg_quality'],
		'sharpen_level'	=>	$GLOBALS['phpwcms']['sharpen_level'],
		'crop_image'	=>	false
	), $val);
	
	$imgCache = false; //do not insert file information in db image cache
	$thumb_image_info = array();
	$thumb_image_info[0] = false; // Thumb Image
	$image_hash = substr($val['image_name'], 0, (strlen($val['target_ext']) * -1) - 1);

	// now check if thumbnail was created - proof for GIF, PNG, JPG
	
	$thumb_check = $val['thumb_dir'] . $val['thumb_name'];
	
	if(is_file($thumb_check .'.jpg')) {
		
		$thumb_image_info[0] = $val['thumb_name'] .'.jpg';
		
	} elseif(is_file($thumb_check .'.png')) {
		
		$thumb_image_info[0] = $val['thumb_name'] .'.png';
	
	} elseif(is_file($thumb_check .'.gif')) {
		
		$thumb_image_info[0] = $val['thumb_name'] .'.gif';
	
	} else {

		// check if current file's extension is handable by ImageMagick or GD
		if( $val["target_ext"] = is_ext_true($val["target_ext"]) ) {	

			$create_preview	= image_manipulate( $val );
			
			if( is_file( $val['thumb_dir'] . $create_preview["thumb_name"] ) ) {
				$thumb_image_info[0] = $create_preview["thumb_name"];
				$imgCache = true; // insert/update information in db image cache
			};

		}
	}

	
	if($thumb_image_info[0] != false) {
	
		if($return_all_imageinfo === false) {
			return $thumb_image_info;
		}
		
		$thumb_info = @getimagesize($val['thumb_dir'].$thumb_image_info[0]);
		if(is_array($thumb_info)) {
				
			$thumb_image_info[1] = $thumb_info[0]; // width
			$thumb_image_info[2] = $thumb_info[1]; // height
			$thumb_image_info[3] = $thumb_info[3]; // HTML width & height attribute

			// now update image caching information in db
			if($imgCache && $db_track) {
			
				if(!function_exists('_dbQuery')) {
					require_once(PHPWCMS_ROOT.'/include/lib/dbcon.inc.php');
				}
			
				$sql  = "INSERT INTO ".DB_PREPEND."phpwcms_imgcache SET ";
				$sql .= "imgcache_hash = '" . 		aporeplace($image_hash) 			. "', ";
				$sql .= "imgcache_imgname = '" . 	aporeplace($thumb_image_info[0]) 	. "', ";
				$sql .= "imgcache_width = " . 		intval($thumb_image_info[1]) 		. " , ";
				$sql .= "imgcache_height = " . 		intval($thumb_image_info[2]) 		. " , ";
				$sql .= "imgcache_wh = '" . 		aporeplace($thumb_image_info[3]) 	. "'";
				@_dbQuery($sql, 'INSERT');
				
				
			}
		
		} else {
		
			// if wrong - no result, return false
			return false;
		
		}
		
	} else {
		// if wrong - no result, return false
		return false;
	}

	// Return cached thumbnail image info
	// $thumb_image_info[0] = Name, 
	// $thumb_image_info[1] = width, 
	// $thumb_image_info[2] = height, 
	// $thumb_image_info[3] = HTML width & height attribute
	return $thumb_image_info;
}

function set_cropped_imagesize($config, $orig_width=0, $orig_height=0) {
	$config['resize_width']		= $config['width'];
	$config['resize_height']	= $config['height'];
	$config['x_axis']			= 0;
	$config['y_axis']			= 0;
	
	if($orig_width && $orig_height) {
		
		// compare original image sizes against cropped image size
		$ratio_width	= $orig_width / $config['width'];
		$ratio_height	= $orig_height / $config['height'];
		
		// check if cropping is necessary
		if( $ratio_width == $ratio_height ) {

			$config['do_cropping'] = FALSE;

		} else {
			
			$config['do_cropping'] = TRUE;
		
			// source image dimensions are both larger than target
			if( $ratio_width >= 1 && $ratio_height >= 1 ) {
				
				if( $ratio_width <= $ratio_height ) {
					$config['resize_height']	= ceil( $orig_height / $ratio_width );
					$config['y_axis']			= round( ( $config['resize_height'] - $config['height'] ) / 2 );
				} else {
					$config['resize_width']		= ceil( $orig_width / $ratio_height );
					$config['x_axis']			= round( ( $config['resize_width'] - $config['width'] ) / 2 );
				}
			
			// source image dimensions width and/or height is smaller than target
			} else {
				
				if( $ratio_width <= $ratio_height ) {
					$config['resize_width']		= ceil( $orig_width + ( $orig_width * ( 1 - $ratio_height ) ) );
					$config['x_axis']			= round( ( $config['resize_width'] - $config['width'] ) / 2 );
				} else {
					$config['resize_height']	= ceil( $orig_height + ( $orig_height * ( 1 - $ratio_width ) ) );
					$config['y_axis']			= round( ( $config['resize_height'] - $config['height'] ) / 2 );
				}
			}
		
		}
	}
	
	return $config;
}


?>