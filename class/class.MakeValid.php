
<?php 
	
	class MakeValid {
		public function getValidValue($stringCheck) {
			if( isset($_SESSION[$stringCheck]) )
				return $_SESSION[$stringCheck];
			return "";
		}
	}
?>
