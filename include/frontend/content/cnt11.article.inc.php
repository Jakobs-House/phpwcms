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



//code

/*
$CNT_TMP .= headline($crow["acontent_title"], $crow["acontent_subtitle"], $template_default["article"]);
if($crow["acontent_text"]) {
	$crow["acontent_text"] = str_replace(" ", "&nbsp;", html_specialchars($crow["acontent_text"]));
	$CNT_TMP .= nl2br(div_class($crow["acontent_text"], $template_default["article"]["code_class"]));
}
*/

// read template
if(empty($crow["acontent_template"]) && is_file(PHPWCMS_TEMPLATE.'inc_default/code.tmpl')) {

	$crow["acontent_template"]	= render_device( @file_get_contents(PHPWCMS_TEMPLATE.'inc_default/code.tmpl') );
	
} elseif(is_file(PHPWCMS_TEMPLATE.'inc_cntpart/code/'.$crow["acontent_template"])) {

	$crow["acontent_template"]	= render_device( @file_get_contents(PHPWCMS_TEMPLATE.'inc_cntpart/code/'.$crow["acontent_template"]) );

} else {

	$crow["acontent_template"]	= '[TITLE]<h3>{TITLE}</h3>[/TITLE][SUBTITLE]<h4>{SUBTITLE}</h4>[/SUBTITLE][CODE]<pre>{CODE}</pre>[/CODE]';

}


$crow["acontent_template"]  = render_cnt_template($crow["acontent_template"], 'TITLE', html_entities($crow['acontent_title']));
$crow["acontent_template"]  = render_cnt_template($crow["acontent_template"], 'SUBTITLE', html_entities($crow['acontent_subtitle']));
$crow["acontent_template"]  = render_cnt_template($crow["acontent_template"], 'CODE', nl2br( str_replace(' ', '&nbsp;', html_entities($crow["acontent_text"]) ) ) );

$CNT_TMP .= LF.$crow["acontent_template"].LF;


?>