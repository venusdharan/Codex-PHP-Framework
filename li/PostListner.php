<?php
	class PostListner
	{
		function get_js_script()
		{
			$script ='
			$(".navigator").click(function(e) {
				e.preventDefault();
				path = this.getAttribute("path");
				window.location.href = "index.php?page="+path;
			});
			$(".fragment_trigger").click(function(e) {
				e.preventDefault();
				path = this.getAttribute("frag");
				window.location.href = "index.php?frag="+frag;
			});
			';
			echo $script;
		}
		function navigate($p)
		{
			
		}
	}
?>