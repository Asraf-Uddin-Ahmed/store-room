<html>
<body>

<?php
	session_start();
	
	require_once("../model/FileInfoModel.phpm");
	require_once("../class/class.UploadFile.php");
	
	$totalSize = 1048576; //in KB = 1GB
	$path = "../upload/" . $_SESSION['userId'] . "/";
	
	if( !file_exists($path) )
		mkdir($path);
	
	$objFileInfoModel = new FileInfoModel();
	$usedSize = $objFileInfoModel->getUsedSizeUser($_SESSION['userId']);
	$remainSize = $totalSize - $usedSize;
	
	$objUploadFile = new UploadFile();
	$uploadResult =  $objUploadFile->upload($remainSize, $path);
	
	if( $uploadResult == 2 ) {
		$_SESSION['uploadResult'] = "File does not uploaded. Please contact with authority.";
	} else if( $uploadResult == 3 ) {
		$_SESSION['uploadResult'] = "File name exists. Please rename it.";
	} else if( $uploadResult == 4 ) {
		$_SESSION['uploadResult'] = "You have no enough space. Please contact with authority.";
	} else {
		$_SESSION['uploadResult'] = "File uploaded successfully.";
		$objFileInfoModel->insertValues($objUploadFile->getFileName(), $objUploadFile->getFileType(), $objUploadFile->getFileSize(), $objUploadFile->getFilePath(), $_POST['status'], $_SESSION['userId']);
	}
	
	header("Location: YourRoom.php");
	
?>

</body>
</html>