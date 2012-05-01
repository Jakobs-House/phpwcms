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
//  based on FormMail v1
//  (c) 2003 webverbund.de Oliver Georgi (info@webverbund.de)

// Only internal form sender allowed
$phpwcms = array();
$phpwcms_root = str_replace('\\', '/', dirname(dirname(__FILE__)));
require_once ($phpwcms_root.'/config/conf.inc.php');

$url = $phpwcms["site"];
$url = str_replace('http://', '', $url);
$url = str_replace('https://', '', $url);
$url = preg_replace('/\/$/', '', $url);
$ref = $_SERVER['HTTP_REFERER'];
$ref = str_replace('http://', '', $ref);
$ref = str_replace('https://', '', $ref);
if( strpos($ref, $url) === false) {
	headerRedirect($phpwcms["site"].$phpwcms["root"]);
}

if(is_array($_GET)) {
	$_GET = array('');
}

require_once ($phpwcms_root.'/lib/default.inc.php');
require_once (PHPWCMS_ROOT.'/include/lib/dbcon.inc.php');
require_once (PHPWCMS_ROOT.'/include/lib/general.inc.php');
require_once (PHPWCMS_ROOT.'/include/lib/backend.functions.inc.php');
include_once (PHPWCMS_ROOT.'/include/lang/formmailer/lang.formmailer.inc.php');
require_once (PHPWCMS_ROOT.'/include/ext/phpmailer/class.phpmailer.php');

if(!checkFormTrackingValue()) {

	echo '<html><head><title>phpwcms Formmailer</title></head>';
	echo '<body><pre>';
	echo 'You are not allowed to send form!'.LF;
	echo 'Your IP: '.getRemoteIP().LF;
	echo 'HTTP-REFERER: '.(empty($ref) ? 'unknown' : $ref);
	echo '</pre></body></html>';
	exit();

}


//check which language to use
$lang = "EN";
if(isset($_POST["language"]) && strlen($_POST['language']) < 3 ) {
	$lang = trim($_POST["language"]);
	unset($_POST["language"]);
	$translate[$lang] = array_merge($translate['EN'], $translate[$lang]);
}
if(!isset($translate[$lang])) $lang = "EN";

//charset
if(isset($_POST["charset"])) {
	$charset = trim($_POST["charset"]);
	$charset = urldecode($charset);
	$charset = str_replace('..', '', $charset);
	$charset = str_replace('/', '', $charset);
	$charset = str_replace('/', '', $charset);
	unset($_POST["charset"]);
}
if(empty($charset)) $charset = 'utf-8';
$content_type = 'Content-Type: text/plain; charset='.$charset."\n";

//getting the required fields list
if(isset($_POST["required"])) {
	$req_key = explode(",", trim($_POST["required"]));
	if(count($req_key)) {
		$err_num=0;
		foreach($req_key as $value) {
			$required_val[$value] = 1;
			if(!isset($_POST[$value])) {
				$form_error[400+$err_num] = str_replace("###value###", strtoupper($value), $translate[$lang]["error400"]);
				$err_num+=10;
			}
		}
	}
	unset($_POST["required"]);
}

if(isset($_POST["Captcha_Validation"])) {
	include_once (PHPWCMS_ROOT.'/include/ext/SOLMETRA_FormValidator/SPAF_FormValidator.class.php');
	$spaf_obj = new SPAF_FormValidator();
	if($spaf_obj->validRequest($_POST["Captcha_Validation"])) {
		$spaf_obj->destroy();
		unset($_POST["Captcha_Validation"]);
	} else {
		$form_error[350] = $translate[$lang]["error350"];
	}
}
//getting the label fields list
if(isset($_POST["label"])) {
	$label = explode(',', trim($_POST["label"]));
	if($label) {
		foreach($label as $value) {
			list($field_name, $field_label) = explode('|', $value);
			$form_label[$field_name] = $field_label;
		}
	}
	unset($_POST["label"]);
}

//checking for base values
//recipient, recipient name:
if(isset($_POST["recipient"])) {
	$recipient = cleanUpFormMailerPostValue($_POST["recipient"]);
	unset($_POST["recipient"]);
}
//check if recipient's email address is defined in conf.inc.php
if(	isset($phpwcms["formmailer_set"]) 
	&& !empty($phpwcms["formmailer_set"]['global_recipient_email']) 
	&& $phpwcms["formmailer_set"]['global_recipient_email'] != 'form@localhost'
	&& is_valid_email($phpwcms["formmailer_set"]['global_recipient_email'])) {
	$recipient = $phpwcms["formmailer_set"]['global_recipient_email'];
}


if(!is_valid_email($recipient)) { //if recipient mail address is invalid
	$form_error[100] = $translate[$lang]["error100"];
}
if(isset($_POST["recipient_name"])) {
	$recipient_name = cleanUpFormMailerPostValue($_POST["recipient_name"]);
	unset($_POST["recipient_name"]);
}
//subject:
if(isset($_POST["subject"])) {
	$subject = cleanUpFormMailerPostValue($_POST["subject"]);
	$subject_encoded = encode($subject, $charset);
	unset($_POST["subject"]);
}
if(empty($subject)) { //if recipient mail address is invalid
	$form_error[200] = $translate[$lang]["error200"];
}
//send copy to form sender
if(isset($_POST["send_copy"])) {
	if(!empty($phpwcms["formmailer_set"]['allow_send_copy']) && intval($_POST["send_copy"])) {
		$send_copy_to = cleanUpFormMailerPostValue($_POST["email"]);
		if(!is_valid_email($send_copy_to)) {
			$form_error[300] = $translate[$lang]["error300"];
			unset($send_copy_to);
		}
	}
	unset($_POST["send_copy"]);
}
//get values for redirecting
if(isset($_POST["redirect"])) {
	$redirect = trim($_POST["redirect"]);
	unset($_POST["redirect"]);
}
if(isset($_POST["redirect_template"])) {
	$redirect_template = trim($_POST["redirect_template"]);
	unset($_POST["redirect_template"]);
}
if(isset($_POST["redirect_error"])) {
	$redirect_error = trim($_POST["redirect_error"]);
	unset($_POST["redirect_error"]);
}
if(isset($_POST["redirect_error_template"])) {
	$redirect_error_template = trim($_POST["redirect_error_template"]);
	unset($_POST["redirect_error_template"]);
}

if(isset($_POST["submit"])) unset($_POST["submit"]);
if(isset($_POST["type"])) unset($_POST["type"]);

//checking values and setting labels
if(count($_POST)) {
	$err_num = 0;
	foreach($_POST as $key => $value) {
		
		//Check for required fields
		if(!empty($required_val[$key]) && isEmpty($value) && $key != 'Captcha_Validation') {
			if(isset($form_label[$key])) {
				$form_error[500+$err_num] = str_replace("###value###", $form_label[$key], $translate[$lang]["error400"]);
			} else {
				$form_error[500+$err_num] = str_replace("###value###", strtoupper($key), $translate[$lang]["error400"]);
			}			
			$err_num+=10;
		}
				
		if(is_array($value)) { //if field value is an array then split form name
			$x = 1;
			foreach($value as $field_value) {
				$form[$key."[".$x."]"] = trim($field_value);
				$x++;
			}
		} else {
			$form[$key] = trim($value);
		}
	}
}

if(isset($form_error)) {
	if(isset($redirect_error)) {
		headerRedirect($redirect_error);
	} else {
		//if error show error template
		$table = "";
		foreach($form_error as $key => $value) {
  			$table .= "<tr bgcolor=\"#F4F4F4\">";
    		$table .= "<td class=\"error\">[".$key."]</td>";
    		$table .= "<td class=\"error\">".html_specialchars($value)."</td>";
  			$table .= "</tr>\n";
		}
		
		$error_template = read_textfile(PHPWCMS_ROOT.'/include/lang/formmailer/'.$lang.'_formmailer.error.html');
		$error_template = str_replace("<!-- RESULT //-->", $table, $error_template);
		echo $error_template;
		
	}

} else {
	$translate[$lang]["bodyLine1"] = str_replace("###date###", date($translate[$lang]["dateFormat"]), $translate[$lang]["bodyLine1"]);
	$translate[$lang]["bodyLine1"] = str_replace("###time###", date($translate[$lang]["timeFormat"]), $translate[$lang]["bodyLine1"]);
	$body = $translate[$lang]["bodyLine1"]."\n";
	$body.= $translate[$lang]["bodyLine2"]."\n";
	$body.= $_SERVER['HTTP_REFERER']." \n";
	$body.= "IP: ".getRemoteIP()." \n\n";
	$body.= "====================================================================\n\n";
	$body.= $translate[$lang]["bodyRecipient"];
	if($recipient_name) {
		$body.= $recipient_name." (".$recipient.")\n\n";
	} else {
		$body.= $recipient."\n\n";
	}
	$body.= "====================================================================\n\n";
	$body.= $subject."\n";
	$body.= "--------------------------------------------------------------------\n";
	
	$l=0;
	if(is_array($form) && count($form)) {
		foreach($form as $key => $value) {
			$x = strlen($key);
			if($x > $l) $l = $x;
		}
		foreach($form as $key => $value) {
			$body.= str_pad($key, $l, ".").": ".$value."\n";
		}
	} else {
		$body .= LF.LF.LF;
		$form = array();
	}
	
	$body.= "\n====================================================================\n";
	$body.= "phpwcms formmailer  | Copyright (C) 2003 \n";
	
	// phpMailer Class
	$mail = new PHPMailer();
	$mail->Mailer 			= $phpwcms['SMTP_MAILER'];
	$mail->Host 			= $phpwcms['SMTP_HOST'];
	$mail->Port 			= $phpwcms['SMTP_PORT'];
	if($phpwcms['SMTP_AUTH']) {
		$mail->SMTPAuth 	= 1;
		$mail->Username 	= $phpwcms['SMTP_USER'];
		$mail->Password 	= $phpwcms['SMTP_PASS'];
	}
	$mail->SMTPKeepAlive 	= true;
	$mail->CharSet	 		= $phpwcms["charset"];
	$mail->IsHTML(0);
	$mail->Subject			= $subject;
	$mail->Body 			= $body;
	if(!$mail->SetLanguage($phpwcms['default_lang'], '')) $mail->SetLanguage('en', '');
	$false = '';


	if(isset($send_copy_to)) {
		//$from = "From: ".$send_copy_to."\nReply-To: ".$send_copy_to."\n";
		//if(!ini_get('safe_mode')) {
		//	mail($send_copy_to, $subject_encoded, $body, "From: ".$recipient."\n".$content_type, "-f".$recipient);
		//} else {
		//mail($send_copy_to, $subject_encoded, $body, "From: ".$recipient."\nReply-To: ".$recipient."\n".$content_type);
		//}
		
		$mail->From 		= $recipient;
		$mail->FromName 	= $phpwcms['SMTP_FROM_NAME'];
		$mail->Sender	 	= $recipient;
		$mail->AddAddress($send_copy_to);
		
		if(!$mail->Send()) {
			$false .= '(1) '.html_specialchars($mail->ErrorInfo).'<br>';
		}
		
		$mail->From 		= $send_copy_to;
		$mail->FromName 	= '';
		$mail->Sender	 	= $send_copy_to;
		
		
	} else {

		$mail->From 		= $recipient;
		$mail->FromName 	= $phpwcms['SMTP_FROM_NAME'];
		$mail->Sender	 	= $recipient;
		
	}
	
	$mail->ClearAddresses();
	$mail->AddAddress($recipient);
	
	if(!$mail->Send()) {
		$false .= '(2) '.html_specialchars($mail->ErrorInfo).'<br>';
	}
	
	$mail->SmtpClose();
	
	if(isset($redirect) && !$false) {
		headerRedirect($redirect);
	} else {
	
		//Success show form success template
		$table = "";
		if($false) {
			$table .= '<tr bgcolor="#F4F4F4">';
			$table .= "<td>Mailer Error:</td>";
			$table .= "<td>".$false."</td>";
			$table .= "</tr>\n";
		}
		
		foreach($form as $key => $value) {
			$table .= "<tr bgcolor=\"#F4F4F4\">";
			$table .= "<td>".html_specialchars($key)."</td>";
			$table .= "<td>".html_specialchars($value)."</td>";
			$table .= "</tr>\n";
		}
		
		$success_template = read_textfile(PHPWCMS_ROOT.'/include/lang/formmailer/'.$lang.'_formmailer.success.html');
		$success_template = str_replace("<!-- RESULT //-->", $table, $success_template);
		echo $success_template;
				
	}
}


?>