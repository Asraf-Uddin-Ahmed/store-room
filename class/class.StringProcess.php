<?php

	class StringProcess {
		
		public function getFileExtension($fileName) {
			$token = strtok($fileName, ".");
			while ($token != false) {
				$ext = $token;
				$token = strtok(".");
			}
			return $ext;
		}
		
	}

?>