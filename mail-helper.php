<?php

// functions from Email class
class Email{
    public static function create_template($template_name = '',$template_data = ''){
		$template = file_get_contents("email_templates/".$template_name);
		foreach($template_data as $key => $value){
			$template = str_replace('{{ '.$key.' }}', $value, $template);
		}

		$final_template = $template;
        return $final_template;
    }
	
	public static function sendmail($to,$subject,$header,$template){
		$headers = "MIME-Version: 1.0 \n";
		$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
		//$headers .= 'From: Call Back Enquiry - '.Config::get('general/app_name').' <'.Config::get('emails/noreply').'>' . "\r\n";
		$headers .= $header;
		
		$mail_status = mail($to,$subject,$template,$headers);
		
		return $mail_status;
	}
}

// email sending script

$message = 'EMAIL_BODY';

$to = '';

$subject = ''

$header = 'From: Some Text - Company Name <noreply@example.com>' . "\r\n";
$header .= 'CC: cc1@example.com,cc2@example.com' . "\r\n";
$header .= 'BCC: bcc1@example.com,bcc2@example.com' . "\r\n";

$p = Email::sendmail($to,$subject,$header,$message);
