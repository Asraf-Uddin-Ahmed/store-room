<?php
	session_start();
	
	require_once("../model/RegisterFormModel.phpm");
	
	$objRFM = new RegisterFormModel();
	
	//initialization
	$booleanIsValid = true;
	$_SESSION['loginUserName'] = $_POST['loginUserName'];
	
	//check validity
	if( !$objRFM->isValidUser($_POST['loginUserName'], $_POST['loginPassword']) ) {
		$booleanIsValid = false;
		$_SESSION['loginError'] = "user name or password is not valid";
	}
	
	//transfer control
	if( $booleanIsValid ) {
		$_SESSION['userId'] = $objRFM->getUserId($_POST['loginUserName']);
		header("Location: ../view/home.php");
	} else {
		header("Location: ../view/login.php");
	}
	
?>