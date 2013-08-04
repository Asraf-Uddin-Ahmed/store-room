<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

	require_once('class.phpmailer.php');
	
	class SendMail {
	
		public function send($from, $fromName, $password, $to, $subject, $body) {
			try {
				$mail = new PHPMailer(true); //New instance, with exceptions enabled
				$mail->SMTPDebug = 1;
				
				$mail->IsSMTP();                           // tell the class to use SMTP
				$mail->SMTPAuth   = true;                  // enable SMTP authentication
				$mail->SMTPSecure='ssl';	
				$mail->Port       =  465;                    // set the SMTP server port
				$mail->Host       = "smtp.gmail.com"; // SMTP server
				//your mail id here
				$mail->Username   = $from;     // SMTP server username
				//you password here
				$mail->Password   = $password;

				$mail->AddReplyTo($from, $fromName);

				$mail->From       = $from;
				$mail->FromName   = $fromName;
				//to address here
				$mail->AddAddress($to);

				$mail->Subject  = $subject;

				$mail->AltBody    = "please, contact in $from"; // optional, comment out and test
				$mail->WordWrap   = 80; // set word wrap

				$mail->MsgHTML($body);

				$mail->IsHTML(true); // send as HTML

				$mail->Send();
				//echo 'Message has been sent.';
				return true;
			} catch (phpmailerException $e) {
				//echo $e->errorMessage();
				return false;
			}
		}
		
	}

?>