<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HtmlObject
 *
 * @author VSD
 */
class HtmlObject {
   
		var $clas = array();
                var $attr_val = array();
                var $attr_name = array();
                var $custom_attribute = '';
		var $id = '' ;
		var $con = array();
		var $type = '';
		var $class_string = '';
                /*
		function __construct( $content ,$type ){
                   array_push($this->con, $content);
		   
		}
                */
                function set_type($type)
                {
                   $this->type = $type; 
                }
                function add_content($content)
                {
                    array_push($this->con, $content);
                }
                function set_custom_attribute($attribute_string)
                {
                    $this->custom_attribute = $attribute_string;
                }
                function set_attribute($attribute_name,$attribute_value)
                {
                    if($attribute_name != '' && $attribute_value != '')
                    {
                        array_push($this->attr_name, $attribute_name);
                        array_push($this->attr_val, $attribute_value);
                    }
                }
                function set_id($id)
		{
			$this->id = $id;
		}
		function add_class($class)
		{
			array_push($this->clas,$class);
		}
		function get_object()
		{
                    $class = '';
                    foreach($this->clas as $el)
                    {
                          $this->class_string = $this->class_string .''. $el;
                    }
                    if($this->class_string != '')
                    {
                      $class = $class .''.'class ='.'"'.  $this->class_string.'"'.'';  
                    }
                    $attr_temp = '';
                    for($i = 0 ; $i < sizeof($this->attr_name) ; $i++)
                    {
                        $attr_temp = $attr_temp.''.$this->attr_name[$i].''.'='.'"'.''.$this->attr_val[$i].''.'"';
                    }
                    $id= '';
                    if($this->id != ''){
                    $id = $id.''.'id = "'.''.$this->id.'"';
                    }
                    $att = '';
                    if($this->custom_attribute !='')
                    {
                        $att = $this->custom_attribute;
                    }
		    echo   '<'.$this->type.''.$id.' '.''.$attr_temp.''.$att.''.$class.' >';
		    foreach($this->con as $conte)
                    {
                       echo $conte;
                    }
		    echo '</'.$this->type.'>';
		}
		function get_object_collection()
		{
		    $class = '';
                    foreach($this->clas as $el)
                    {
                          $this->class_string = $this->class_string .''. $el;
                    }
                    if($this->class_string != '')
                    {
                      $class = $class .''.'class ='.'"'.  $this->class_string.'"'.'';  
                    }
                    $attr_temp = '';
                    for($i = 0 ; $i < sizeof($this->attr_name) ; $i++)
                    {
                        $attr_temp = $attr_temp. '"'.$this->attr_name[$i].''.'='.''.$this->attr_val[$i].''.'"';
                    }
                    $id= '';
                    if($this->id != ''){
                    $id = $id.''.'id = "'.''.$this->id.'"';
                    }
                    $ctemp = '';
		    foreach($this->con as $conte)
                    {
                       $ctemp = $ctemp . $conte;
                    }
                    $att = '';
                    if($this->custom_attribute !='')
                    {
                        $att = $this->custom_attribute;
                    }
		    $ret_object =  '<'.$this->type.''.$id.' '.''.$att.''.''.$attr_temp.''.$class.' >'.$ctemp.'</'.$this->type.'>';
		    return $ret_object ;
		}
}
	
	

