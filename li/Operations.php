<?php
	class Operation_watcher
	{
		var $operations = array();
		function add_operation($operation)
		{
			array_push($this->operations,$operation);
		}
		function execute_operation($toexecute)
		{
			if($toexecute === '')
			{
				//include_once("pages/login.php");
			}
			else
			{
				if (in_array($toexecute, $this->operations)) {
					include_once("pages/".$toexecute.".php");
					return;
				}
                               /* else
				{
					include_once("pages/login.php");
					return;
				}
                                * 
                                */
			}
		}
	}
?>