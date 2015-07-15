<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResourceLoader
 *
 * @author VSD
 */



class ResourceLoader {
    var $name;
    var $js = array();
    var $css = array();
    var $s_js;
    var $s_css;
    public function __construct($name) {
        $this->name = 'res/'.$name;
    }
    
    function load_js()
    {
        if($this->load($this->name))
        {
            $files = scandir($this->name);
            foreach ($files as $file) {
                $file_parts = pathinfo($file);   
                if($file_parts['extension'] == 'js')
                {
                    array_push($this->js, $file);
                }
            }
            return $this->js;
        }
    }
    function load_js_path()
    {
       $js = $this->load_js($this->name);
       $t_js = '';
       $n = $this->name;
       foreach($js as $j){
           echo "<script src='".$n."/".$j."' ></script>";
       }
       
    }
    function load_css_path()
    {
        $cs = $this->load_css($this->name);
        $s = '';
        $n = $this->name;
        foreach($cs as $j){ 
            echo "<link href='".$n."/".$j."' rel='stylesheet'>" ;
        }
    }
    function load_css()
    {
        if($this->load($this->name))
        {
            $files = scandir($this->name);
            foreach ($files as $file) {
                $file_parts = pathinfo($file);   
                if($file_parts['extension'] == 'css')
                {
                    array_push($this->css, $file);
                }
            }
            return $this->css;
        }
    }
    
    private function load($name)
    {
    $path = realpath($name);
    return ($path !== false AND is_dir($path)) ? $path : false;
    }
}
?>