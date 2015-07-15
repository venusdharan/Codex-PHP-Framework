<?php
	
	function br(){return '</br>';}
	function script_object_src($script_path){return '<script src="'.$script_path.'"/>';}
	function script_object($script_string){return '<script type="text/javascript">'.$script_string.'</script>';}
	function p_id_class($p_text,$id,$class){return '<p class="'.$class.'"'.'id="'.$id.'"'.'>'.$p_text.'</p>';}
	function tag_id_class($h_type,$h_text,$id,$class){return '<'.$h_type.' class="'.$class.'"'.'id="'.$id.'"'.'>'.$h_text.'</'.$h_type.'>';}
	
			
	class head
	{
		var $title;
		var $meta = array();
		var $meta_char;
		var $script = array();
		var $link = array();
		function __construct( $title ){
		   $this->title = $title;
		}
		function push_script_cont($script_cont)
		{
			array_push($this->script,$script_cont);
		}
		function push_link_cont($link_cont)
		{
			array_push($this->link,$link_cont);
		}
		function push_meta_cont($meta_cont)
		{
			array_push($this->meta,$meta_cont);
		}
		function push_meta_char($meta_char)
		{
			$this->meta_char = $meta_char;
		}
		function set_title($set_title)
		{
			$this->title = $set_title;
		}
		function get_head(){
		   echo '<head><title>'.$this->title.'</title>';
		   if($this->meta_char != '')
		   {
			  echo '<meta charset="'.$this->meta_char.'">';
		   }
		   foreach($this->meta as $el)
		   {
			   $myArray = explode(',', $el);
			   echo '<meta name="'.$myArray[0].'" content="'.$myArray[1].'">';
		   }
		   foreach($this->link as $el)
		   {
			   echo '<link rel="stylesheet" href="'.$el.'">';
		   }
		   foreach($this->script as $el)
		   {
			   echo '<script src="'.$el.'"></script>';
		   }
		   echo '</head>';
		}
	}
	
	class tag
	{
		var $clas = array();
		var $id ;
		var $con;
		var $type;
		var $class_string;
		function __construct( $content ,$type ){
		   $this->con = $content;
		   $this->type = $type;
		}
		function set_id($id)
		{
			$this->id = $id;
		}
		function add_class($class)
		{
			array_push($this->clas,$class);
		}
		function get_tag()
		{
			foreach($this->clas as $el)
			   {
				 $this->class_string = $this->class_string .''. $el;
			   }
		   
		   
		   echo   '<'.$this->type.'  id="'.$this->id.'"  class="'.$this->class_string.'" >';
		   
			   echo $this->con;
		   
		   echo '</'.$this->type.'>';
		}
		function get_tag_object()
		{
			$this->class_string = '';
		 
				foreach($this->clas as $el)
			   {
				 $this->class_string = $this->class_string . $el;
			   }
		   
		  
		   $ret_object = '<'.$this->type.' id="'.$this->id.'"  class= "'.$this->class_string.'">'.$this->con.'</'.$this->type.'>';
		   
		
		   return $ret_object ;
		}
		
	}
	
	class div
	{
		var $cont = array();
		var $idd = '' ;
		var $clas = array();
		var $class_string = '';
		
		
		function push_div_cont($div_cont)
		{
			array_push($this->cont,$div_cont);
		}
		function add_div_class($div_class)
		{
			array_push($this->clas,$div_class);
		}
		function add_div_id($div_id)
		{
			$this->idd = $div_id;
		}
		function get_div(){
			
		   
				foreach($this->clas as $el)
			   {
				 $this->class_string = $this->class_string .''. $el;
			   }
		   
		   
		   echo   '<div id="'.$this->idd.'"  class="'.$this->class_string.'" >';
		   foreach($this->cont as $el)
		   {
			   echo $el;
		   }
		   echo '</div>';
		}
		function get_div_object(){
		   $this->class_string = '';
		 
				foreach($this->clas as $el)
			   {
				 $this->class_string = $this->class_string . $el;
			   }
		   
		  
		   $ret_object = '<div id="'.$this->idd.'"  class= "'.$this->class_string.'">';
		   foreach($this->cont as $el)
		   {
			 $ret_object = $ret_object . $el;
		   }
		   $ret_object = $ret_object .'</div>';
		   return $ret_object ;
		}
	}
	
	class span
	{
		var $span_cont = array();
		
		function __construct($cont){
		  
		   $this->span_cont = array($cont);
		}
		function push_span_cont($span_cont)
		{
			array_push($this->span_cont,$span_cont);
		}
		function get_span(){
		   echo '<div>';
		   foreach($this->span_cont as $el)
		   {
			   echo $el;
		   }
		   echo '</div>';
		}
		function get_span_object(){
		   $ret_object = '<span>';
		   foreach($this->cont as $el)
		   {
			 $ret_object = $ret_object . $el;
		   }
		   $ret_object = $ret_object .'</span>';
		   return $ret_object ;
		}
	}
	
	class body
	{
		var $body_cont = array();
		
		
		function push_body_cont($body_cont)
		{
			array_push($this->body_cont,$body_cont);
		}
		function get_body(){
		   echo '<body>';
		   foreach($this->body_cont as $el)
		   {
			   echo $el;
		   }
		   echo '</body>';
		}
	}
	
	class object_collection
	{
		var $object_collection_cont = array();
		var $object_collection_ret;
		
		public function push_object($object)
		{
			if($object === '')
			{
				
			}else
			{
			array_push($this->object_collection_cont,$object);
			
			}
		}
		
		public function get_object_collection(){
		   $this->object_collection_ret;
		   foreach($this->object_collection_cont as $el)
		   {
			   $this->object_collection_ret = $this->object_collection_ret.$el;
		   }
		   return $this->object_collection_ret;
		}
		
	}
	
	class page
	{
		var $title;
		var $meta = array();
		var $meta_char;
		var $script = array();
		var $link = array();
		var $body_cont = array();
		var $footer_cont = array();
		var $lib_array = array();
		var $cont_array = array();
		var $jquery_ready_array = array();
		var $jquery_load_array = array();
		var $script_nav ='
			$(".navigator").click(function(e) {
				e.preventDefault();
				path = this.getAttribute("path");
				window.location.href = "index.php?path="+path;
			});
			';
		function __construct( $title ){
		   $this->title = $title;
		   
		}
		function push_script_cont($script_cont)
		{
			array_push($this->script,$script_cont);
			
		}
		function push_jquery_ready($script_cont)
		{
			array_push($this->jquery_ready_array,$script_cont);
			
		}
		function push_jquery_load($script_cont)
		{
			array_push($this->jquery_load_array,$script_cont);
			
		}
		function push_container_cont($container_cont)
		{
			array_push($this->cont_array,$container_cont);
			
		}
		function add_ui_lib($lib)
		{
			array_push($this->lib_array,$lib);
			foreach($this->lib_array as $el)
		   {
			   include_once('components/ui/'.$el.'/'.$el.'.php');
		   }
		}
		function push_link_cont($link_cont)
		{
			array_push($this->link,$link_cont);
		}
		function push_meta_cont($meta_cont)
		{
			array_push($this->meta,$meta_cont);
		}
		function push_meta_char($meta_char)
		{
			$this->meta_char = $meta_char;
		}
		function set_title($title)
		{
			$this->title = $title;
		}
		function push_body_cont($body_cont)
		{
			array_push($this->body_cont,$body_cont);
		}
		function push_footer_cont($footer_cont)
		{
			array_push($this->body_cont,$footer_cont);
		}
		function get_page(){
		   echo '</html>';
		   echo '<head><title>'.$this->title.'</title>';
		   echo '<link rel="stylesheet" href="./lib/css/bootstrap.min.css">'; 
		   echo '<link rel="icon" href="favicon.ico" type="image/x-icon">'; 
		   echo '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">';
		   if($this->meta_char != ''){ echo '<meta charset="'.$this->meta_char.'">'; }
		   foreach($this->meta as $el){ $myArray = explode(',', $el); echo '<meta name="'.$myArray[0].'" content="'.$myArray[1].'">';  }
		   foreach($this->lib_array as $el)
		   {
			   $el1 = 'components/ui/'.$el.'/'.$el.'.css';
			   if(file_exists($el1))
			   {
			   echo '<link rel="stylesheet" href="'.$el1.'">';
			   }
		   }
		   foreach($this->link as $el)
		   {
			   echo '<link rel="stylesheet" href="'.$el.'">';
		   }
		   
			 echo '<script src="./lib/js/jquery-1.11.2.min.js"></script>';
			 echo '<script src="./lib/js/bootstrap.min.js"></script>';
		   foreach($this->lib_array as $el)
		   {
			   $el1 = 'components/ui/'.$el.'/'.$el.'.js';
			   if(file_exists($el1))
			   {
			   echo '<script src="'.$el1.'"></script>';
			   }
		   }
		   echo '<script>';
		   echo '$(document).ready(function(){';
		   foreach($this->jquery_ready_array as $el)
		   {
			   echo $el;
		   }
		   echo $this->script_nav;
		   echo '});';
		   echo '$(document).load(function(){';
		   foreach($this->jquery_load_array as $el)
		   {
			   echo $el;
		   }
		   echo '});';
		   echo '</script>';
		   foreach($this->script as $el)
		   {
			   echo '<script src="'.$el.'"></script>';
		   }
		   echo '</head>';
		   echo '<body>';
		   foreach($this->body_cont as $el)
		   {
			   echo $el;
		   }
		   echo '<div class="container">';
		   foreach($this->cont_array as $el)
		   {
			   
			   echo $el;
			  
		   }
		   echo '</div>';
		   echo '<footer>';
		   foreach($this->footer_cont as $el)
		   {
			   echo $el;
		   }
		   echo '</footer>';
		   
		}
	}
	//boostrap specific class
	class Row
	{
		var $colmn = array();
		var $cont = array();
		var $i ;
		function set($col,$content)
		{
			array_push($this->colmn,$col);
			array_push($this->cont,$content);
		}
		function set_id($id)
		{
			$this->i = $id;
		}
		function get()
		{
		   $div  = '<div class="row" id="'.$this->i.'">';
		   foreach($this->colmn as $el)
		   {
			   $div = $div.'<div class="'.$el.'">';
			   $div = $div.$this->cont[array_search($el, $this->cont)];
			   $div = $div.'</div>';
		   }
		   return $div;
		}
	}
	
	
?>