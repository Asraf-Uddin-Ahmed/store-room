<?php
	session_start();
	require_once("../model/FileInfoModel.phpm");
	
	$objFileInfoModel = new FileInfoModel();
	$arrayResult = $objFileInfoModel->getFileInfoUser($_SESSION['userId']);
	if( sizeof($arrayResult[0]) > 0 )
		$_SESSION['fileHistory'] = $arrayResult;
	//echo $_SESSION['uploadResult'];
	
	$usedSize = $objFileInfoModel->getUsedSizeUser($_SESSION['userId']);
	if( $usedSize > 0 )
		$_SESSION['usedSize'] = ceil($usedSize / 1024); //in MB 
	
	header("Location: ../view/your_room.php");
?>