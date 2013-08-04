<?php
	require_once("class.StringProcess.php");
	
	class UploadFile {
		
		private $_errorMsg = null;
		private $_fileName = null;
		private $_fileType = null;
		private $_fileSize = null;
		private $_filePath = null;
		
		/*
			upload file
			upload successfull = 1
			does not uploded = 2
			file name exists = 3
			no enough space = 4
		*/
		public function upload($remainSize, $filePathServer) {
			$this->_fileSize = ($_FILES["file"]["size"] / 1024) + 1;
			if ( $this->_fileSize < $remainSize ) {
				//file does not uploaded
				if ( $_FILES["file"]["error"] > 0 ) {
					$this->_errorMsg = $_FILES["file"]["error"];
					return 2;
				} else {
					$this->_fileName = $_FILES["file"]["name"];
					$this->_fileType = $_FILES["file"]["type"];
					
					//if file name exists in folder
					if ( file_exists("$filePathServer" . $_FILES["file"]["name"]) ) {
						return 3;
					}
					//if file does not exist in folder, then move it from tmp folder of xampp.
					else {
						$this->_filePath = "$filePathServer" . $_FILES["file"]["name"];
						move_uploaded_file($_FILES["file"]["tmp_name"], $this->_filePath);
						return 1;
					}
				}
			}
			//have no enough space
			else {
				return 4;
			}
		}
		
		/*
		
		*/
		public function getFileName() {
			return $this->_fileName;
		}
		
		/*
		
		*/
		public function getFileSize() {
			return $this->_fileSize;
		}
		
		/*
		
		*/
		public function getFileType() {
			return $this->_fileType;
		}
		/*
		
		*/
		public function getFilePath() {
			return $this->_filePath;
		}
		
		/*
		
		*/
		public function getErrorMsg() {
			return $this->_errorMsg;
		}
		
	}

?>