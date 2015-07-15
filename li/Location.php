<?php
	class Navigate
	{	
		function page($path)
		{
			if($path === '')
			{
				
				include_once("pages/login.php");
				return;
			}else
			{
				if($this->include_exists(("pages/".$path.".php")))
				{
				include_once("pages/".$path.".php");
				return;
				}
				else
				{
				include_once("pages/login.php");
				return;
				}
			}
				
		}
		private function include_exists ($fileName){
		if (realpath($fileName) == $fileName) {
			return is_file($fileName);
		}
		if ( is_file($fileName) ){
			return true;
		}	
                return false;
                }
	}
?>