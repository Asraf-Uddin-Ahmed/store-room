<?php
	session_start();
	
	require_once("../model/RegisterFormModel.phpm");
	require_once("../class/class.MailSenderStoreRoom.php");
	
	$objRFM = new RegisterFormModel();
	
	//initialization
	$booleanIsValid = true;
	$stringFirstName = $_POST['textFirstName'];
	$stringLastName = $_POST['textLastName'];
	$stringUserName = $_POST['textUserName'];
	$stringPasswordNew = $_POST['passwordNew'];
	$stringPasswordReType = $_POST['passwordReType'];
	$stringEmail = $_POST['textEmail'];

	$_SESSION['textFirstName'] = $stringFirstName;
	$_SESSION['textLastName'] = $stringLastName;
	$_SESSION['textUserName'] = $stringUserName;
	$_SESSION['passwordNew'] = $stringPasswordNew;
	$_SESSION['passwordReType'] = $stringPasswordReType;
	$_SESSION['textEmail'] = $stringEmail;
	
	//check validity
	if( $stringPasswordNew != $stringPasswordReType ) {
		$booleanIsValid = false;
		$_SESSION['passwordNewError'] = "Password does not matched";
		$_SESSION['passwordReTypeError'] = "Password does not matched";
		$_SESSION['passwordNew'] = "";
		$_SESSION['passwordReType'] = "";
	}
	
	if( $objRFM->isExistUserName($stringUserName) ) {
		$booleanIsValid = false;
		$_SESSION['textUserName'] = "";
		$_SESSION['textUserNameError'] = "User name exists. Please, try new one";
	}
	
	if( !filter_input(INPUT_POST, "textEmail", FILTER_VALIDATE_EMAIL) ) {
		$booleanIsValid = false;
		$_SESSION['textEmail'] = "";
		$_SESSION['textEmailError'] = "Please insert valid email";
	}
	
	//check unfilled field
	if( $stringFirstName == "" ) {
		$booleanIsValid = false;
		$_SESSION['textFirstNameError'] = "Please, insert your first name";
	}
	if( $stringLastName == "" ) {
		$booleanIsValid = false;
		$_SESSION['textLastNameError'] = "Please, insert your last name";
	}
	if( $stringUserName == "" ) {
		$booleanIsValid = false;
		$_SESSION['textUserNameError'] = "Please, insert your User name";
	}
	if( $stringPasswordNew == "" ) {
		$booleanIsValid = false;
		$_SESSION['passwordNewError'] = "Please, insert your password";
	}
	if( $stringPasswordReType == "" ) {
		$booleanIsValid = false;
		$_SESSION['passwordReTypeError'] = "Please, re-type your password";
	}
	if( $stringEmail == "" ) {
		$booleanIsValid = false;
		$_SESSION['textEmailError'] = "Please, insert your email addres";
	}
	
	//transfer control
	if( $booleanIsValid ) {
		$objRFM->insertValues($stringUserName, $stringPasswordNew, $stringFirstName, $stringLastName, $stringEmail);
		$objMailSenderStoreRoom = new MailSenderStoreRoom();
		$objMailSenderStoreRoom->sendRegistrationConfirmation($stringEmail, $stringUserName, $stringPasswordNew);
		session_destroy();
		header("Location: ../view/registration_success.phtml");
	} else {
		header("Location: ../view/registration.php");
	}
	
?>