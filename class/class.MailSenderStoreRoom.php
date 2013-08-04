<?php

	require_once("php_mailer/class.SendMail.php");
	
	class MailSenderStoreRoom {
		
		private $_from = null;
		private $_name = null;
		private $_password = null;
		private $_rootUrl = null;
		
		/*
			initialization from mail.ini
		*/
		public function __construct() {
			$iniArray = parse_ini_file("mail.ini");
			$this->_from = $iniArray['from'];
			$this->_name = $iniArray['name'];
			$this->_password = $iniArray['password'];
			$this->_rootUrl = $iniArray['root_url'];
		}
		
		/*
			send confirmation mail
		*/
		public function sendRegistrationConfirmation($to, $userName, $userPassword) {
			$subject = "Your Store Room account successfully created.";
			$body = "Congratulations on creating your brand new <b>Store Room</b> account,<br /><br />
					<b>User Name:</b> $userName <br />
					<b>Password:</b> $userPassword <br /><br />
					You can login to your account from <a href=\"$this->_rootUrl\">here</a>";
			$objSendMail = new SendMail();
			$objSendMail->send($this->_from, $this->_name, $this->_password, $to, $subject, $body);
		}
	}

?>