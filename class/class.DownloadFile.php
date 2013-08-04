<?php
	
	class DownloadFile {
		
		
		/*
			frocefully download file from server
			show a save command box
		*/
		public function downloadShow($filePath, $fileType, $isRemove) {
			//get file name
			$fileName = basename($filePath);
			
			header('Content-Description: File Transfer');
			header("Content-Type: $fileType");
			//It will be called fileName.extension
			header("Content-Disposition: attachment; filename=$fileName");
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($filePath));
			//Clean (erase) the output buffer
			ob_clean();
			//Flush the output buffer
			flush();
			//The file source is in filepath
			readfile($filePath);
			if( $isRemove == true )
				unlink($filePath);
			exit;
		
		}
		
		/*
			download file from server
			command box will not display
		*/
		public function downloadHide($url, $path) {
			//add file name with client requested path
			$newfname = $path . basename($url);
			//open server file stream for read
			$file = fopen ($url, "rb");
			//if file open
			if ($file) {
				//open client file stream for write
				$newf = fopen ($newfname, "wb");
				if ($newf)
					//downloading...
					while(!feof($file)) {
						fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
					}
			}
			//closing file stream
			if ($file) {
				fclose($file);
			}
			if ($newf) {
				fclose($newf);
			}
		 }
	}

?>