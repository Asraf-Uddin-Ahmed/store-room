<?php
	session_start();
	require_once("../model/FileInfoModel.phpm");
	
	$objFileInfoModel = new FileInfoModel();
	$arrayResult = $objFileInfoModel->getFileInfoSearch($_POST['textFileName']);
	
	unset($_SESSION['searchHistory']);
	if( sizeof($arrayResult[0]) > 0 )
		$_SESSION['searchHistory'] = $arrayResult;
	
	header("Location: ../view/home.php");
?>