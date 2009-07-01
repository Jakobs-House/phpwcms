<?php
/*************************************************************************************
   Copyright notice
   
   (c) 2002-2009 Oliver Georgi (oliver@phpwcms.de) // All rights reserved.

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



//FAQ

$crow["acontent_form"]	= unserialize($crow["acontent_form"]);
$crow["acontent_image"]	= empty($crow["acontent_image"]) ? '' : explode(":", $crow["acontent_image"]);

if(!empty($crow["acontent_form"]['faq_template']) && file_exists(PHPWCMS_TEMPLATE.'inc_cntpart/faq/'.$crow["acontent_form"]['faq_template'])) {

	$crow["acontent_form"]['faq_template'] = @file_get_contents(PHPWCMS_TEMPLATE.'inc_cntpart/faq/'.$crow["acontent_form"]['faq_template']);

} else {
	$crow["acontent_form"]['faq_template'] = '<div class="phpwcmsFAQ">
	<!-- hidden title/subtitle [TITLE]
	<h3 id="faq_id{FAQ_ID}">{TITLE}</h3>[/TITLE][SUBTITLE]
	<h4>{SUBTITLE}</h4>[/SUBTITLE] 
	-->
	[FAQ_QUESTION]<h3>{FAQ_QUESTION}</h3>[/FAQ_QUESTION]
	[FAQ_IMAGE]<div class="faqImage">
	{FAQ_IMAGE}[FAQ_CAPTION]
	<div class="faqCaption">{FAQ_CAPTION}</div>[/FAQ_CAPTION]
	</div>[/FAQ_IMAGE]
	[FAQ_ANSWER]<p>{FAQ_ANSWER}</p>[/FAQ_ANSWER]
</div>';
}

/*
$thumb_image = get_cached_image(
					array(	"target_ext"	=>	$image[3],
							"image_name"	=>	$image[2] . '.' . $image[3],
							"max_width"		=>	$image[4],
							"max_height"	=>	$image[5],
							"thumb_name"	=>	md5($image[2].$image[4].$image[5].$phpwcms["sharpen_level"])
       					  )
					);
					
if($image[8]) {
	
	$zoominfo = get_cached_image(
					array(	"target_ext"	=>	$image[3],
							"image_name"	=>	$image[2] . '.' . $image[3],
							"max_width"		=>	$phpwcms["img_prev_width"],
							"max_height"	=>	$phpwcms["img_prev_height"],
							"thumb_name"	=>	md5($image[2].$phpwcms["img_prev_width"].$phpwcms["img_prev_height"].$phpwcms["sharpen_level"])
       					  )
					);
		
	if($zoominfo == false) $image[8] = 0;

}
*/

// 0   :1       :2   :3        :4    :5     :6      :7       :8
// dbid:filename:hash:extension:width:height:caption:position:zoom

//build image/image link
$thumb_image	= false;
$thumb_img		= '';
$caption[0]		= '';
if(!empty($crow["acontent_image"][2])) {

	$caption = getImageCaption(base64_decode($crow["acontent_image"][6]));
	$caption[0]	= html_specialchars($caption[0]);
	$caption[3] = empty($caption[3]) ? '' : ' title="'.html_specialchars($caption[3]).'"'; //title
	$caption[1] = empty($caption[1]) ? html_specialchars($crow["acontent_image"][1]) : html_specialchars($caption[1]);

	$thumb_image = get_cached_image(
	array(	"target_ext"	=>	$crow["acontent_image"][3],
			"image_name"	=>	$crow["acontent_image"][2] . '.' . $crow["acontent_image"][3],
			"max_width"		=>	$crow["acontent_image"][4],
			"max_height"	=>	$crow["acontent_image"][5],
			"thumb_name"	=>	md5($crow["acontent_image"][2].$crow["acontent_image"][4].$crow["acontent_image"][5].$GLOBALS['phpwcms']["sharpen_level"])
	));

	if($thumb_image != false) {
	
		$thumb_img  = '<img src="'.PHPWCMS_IMAGES . $thumb_image[0] .'" border="0" '.$thumb_image[3];
		$thumb_img .= ' alt="'.$caption[1].'"'.$caption[3].' />';

		if($crow["acontent_image"][8]) {

			$zoominfo = get_cached_image(
			array(	"target_ext"	=>	$crow["acontent_image"][3],
					"image_name"	=>	$crow["acontent_image"][2] . '.' . $crow["acontent_image"][3],
					"max_width"		=>	$GLOBALS['phpwcms']["img_prev_width"],
					"max_height"	=>	$GLOBALS['phpwcms']["img_prev_height"],
					"thumb_name"	=>	md5($crow["acontent_image"][2].$GLOBALS['phpwcms']["img_prev_width"].$GLOBALS['phpwcms']["img_prev_height"].$GLOBALS['phpwcms']["sharpen_level"])
			));

			if($zoominfo != false) {
			
				$popup_img = 'image_zoom.php?'.getClickZoomImageParameter($zoominfo[0].'?'.$zoominfo[3]);
			
				if(!empty($caption[2][0])) {
					$open_link = $caption[2][0];
					$return_false = '';
				} else {
					$open_link = $popup_img;
					$return_false = 'return false;';
				}

				$thumb_img = '<a href="'.$popup_img.'" onclick="window.open(\''.$open_link.
				"','previewpic','width=".$zoominfo[1].",height=".$zoominfo[2]."');".$return_false.
				'"'.$caption[2][1].'>'.$thumb_img.'</a>';
				
				
			}
		} else {

			if($caption[2][0]) {
				$thumb_img = '<a href="'.$caption[2][0].'"'.$caption[2][1].'>'.$thumb_img.'</a>';
			}
		}
	}
}




// now render whole recipe
$crow["acontent_form"]['faq_template'] = render_cnt_template($crow["acontent_form"]['faq_template'], 'TITLE', html_specialchars($crow['acontent_title']));
$crow["acontent_form"]['faq_template'] = render_cnt_template($crow["acontent_form"]['faq_template'], 'SUBTITLE', html_specialchars($crow['acontent_subtitle']));
$crow["acontent_form"]['faq_template'] = render_cnt_template($crow["acontent_form"]['faq_template'], 'FAQ_QUESTION', html_specialchars($crow["acontent_text"]));
$crow["acontent_form"]['faq_template'] = render_cnt_template($crow["acontent_form"]['faq_template'], 'FAQ_ANSWER', $crow["acontent_html"]);
$crow["acontent_form"]['faq_template'] = render_cnt_template($crow["acontent_form"]['faq_template'], 'FAQ_IMAGE', $thumb_img);
$crow["acontent_form"]['faq_template'] = render_cnt_template($crow["acontent_form"]['faq_template'], 'FAQ_CAPTION', $caption[0]);
$crow["acontent_form"]['faq_template'] = str_replace('{FAQ_ID}', $crow['acontent_id'], $crow["acontent_form"]['faq_template']);

$CNT_TMP .= $crow["acontent_form"]['faq_template'];




unset($image, $caption);

?>