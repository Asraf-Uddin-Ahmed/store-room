<?php
	session_start();
	
	//if user not authorize ignore him
	if( !isset($_SESSION['userId']) ) {
		$_SESSION['selectionResult'] = "You have no authorization to download. Please, register first from <a href=\"login.php\">here</a>";
		header('Location: ../view/home.php');
		return ;
	}
	
	require_once("../class/class.DownloadFile.php");
	require_once("../class/class.ZipFile.php");
	require_once("../model/FileInfoModel.phpm");
	
	//if nothing selceted
	if( !isset($_POST['fileId']) ) {
		$_SESSION['selectionResult'] = "You did not select any file.";
		//redirect to page where request came from
		header("Location: " . $_SERVER['HTTP_REFERER']);
		return ;
	}
	
	$objFileInfoModel = new FileInfoModel();
	$objDownloadFile = new DownloadFile();
	
	//get all file's path
	$filePaths = array();
	$fileIds = $_POST['fileId'];
	for($I=0; $I<sizeof($fileIds); $I++) {
		$filePaths[$I] = $objFileInfoModel->getFilePath($fileIds[$I]);
	}
	
	//DOWNLOAD
	if( isset($_POST['download']) ) {
		//init
		$filePathZip = dirname($filePaths[0]) . "/store_room.zip";
		$fileType = "application/octet-stream";						//for downloading zip file
		
		//make zip
		$objZipFile = new ZipFile();
		$objZipFile->makeZip($filePaths, $filePathZip);
		
		//download zip
		$objDownloadFile->downloadShow($filePathZip, $fileType, true);
	}
	
	//DELETE
	if( isset($_POST['delete']) ) {
		for($I=0; $I<sizeof($fileIds); $I++) {
			$objFileInfoModel->deleteFile($fileIds[$I]);
			unlink($filePaths[$I]);
		}
		$_SESSION['selectionResult'] = "$I file(s) successfully deleted.";
	}
	
	//UPDATE
	if( isset($_POST['update']) ) {
		$countUpdate = 0;
		foreach($fileIds as $fileId) {
			$fileStatus = $_POST["fileStatus$fileId"];
			if( $objFileInfoModel->updateFileStatus($fileId, $fileStatus) )
				$countUpdate++;
			//echo $fileId . " " . $fileStatus . "<br />";
		}
		$_SESSION['selectionResult'] = "$countUpdate file(s) successfully updated.";
	}
	
	//go to your_room page via controller class
	header("Location: ../controller/YourRoom.php");
?>