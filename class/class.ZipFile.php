<?php

	class ZipFile {
		
		public function makeZip($filePaths, $filePathZip) {
			$zip = new ZipArchive();
			
			//open archive
			if ($zip->open($filePathZip, ZIPARCHIVE::CREATE)!==TRUE) {
				return false;
			}
			
			//add file to archive
			foreach($filePaths as $filePath) {
				$zip->addFile($filePath, basename($filePath));
			}
			
			//close archive
			$zip->close();
		}
	}
	
?>
