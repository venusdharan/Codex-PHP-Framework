<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HtmlPage
 *
 * @author VSD
 */
include_once 'HtmlObject.php';
require_once './lib/Library.php';

class HtmlPage {
   
    private $head;
    private $body;
    private $title;
    private $lib = array();
    private $html_attr;
    public function __construct(){
        $this->head = array('scripts'=>array(),'styles'=>array(),'meta'=>array());
        $this->body = array('objects'=>array(),'scripts'=>array(),'script_string'=>array());
    }
    public function set_title($title)
    {
        $this->title = $title;
    }
    public function add_lib($library_name)
    {
        if($library_name != '')
        {
        array_push($this->lib, $library_name);
        }
    }
    public function addHtmlAttributes($attributestring)
    {
        $this->html_attr = $attributestring;
    }
    public function add_meta($meta)
    {
       $this->head['meta'][] = $meta; 
    }
    public function add_stylesheet($link) {
        $this->head['styles'][] = $link;
    }

    public function add_script($link) {
        $this->head['scripts'][] = $link;
    }

    public function add_body($content) {
        $this->body['objects'][] = $content;
    }

    public function add_body_script($content) {
        $this->body['scripts'][] = $content;
    }
    public function add_body_script_string($content) {
        $this->body['script_string'][] = $content;
    }
    public function get_page() {
        $libb ='';
        echo $LIB;
        foreach($this->lib as $libname)
        {
            if($LIB[$libname]['pre'] == 'none')
            {
                 $LIB[$libname]['pre'];
            }
           $libb =  $LIB[$libname]['pre'];
        }
        
        
        
        
        $c_styles = count($this->head['styles']);
        $c_scripts = count($this->head['scripts']);
        $c_meta = count($this->head['meta']);
        $b_obj = count($this->body['objects']);
        $b_sc = count($this->body['scripts']);
        $b_sc_s = count($this->body['script_string']);
        $b_scripts = '';
        $b_scripts_s = '';
        $b_objects = '';
        $styles = '';
        $scripts = '';
        $metas = '';

        for($i = 0; $i < $c_meta ; $i++)
        {
            $metas.= '<meta '.$this->head['meta'][$i].'/>';
        }
        for ($i = 0; $i < $c_styles; $i++) {
            $styles .= '<link rel="stylesheet" type="text/css" href="'.$this->head['styles'][$i].'" />'."\n";
        }

        for ($i = 0; $i < $c_scripts; $i++) {
            $scripts .= '<script src="'.$this->head['scripts'][$i].'"></script>'."\n";
        }
        
        for ($i = 0; $i < $b_sc; $i++) {
            $b_scripts .= '<script src="'.$this->body['scripts'][$i].'"></script>'."\n";
        }
        
        for ($i = 0; $i < $b_sc_s; $i++) {
            $b_scripts_s .= $this->body['script_string'][$i]."\n";
        }
        if($b_scripts_s != ''){
            $b_scripts_s = '<script type="text/javascript">'.$b_scripts_s.'</script>';
        }
        for ($i = 0; $i < $b_obj; $i++) {
            $b_objects .= $this->body['objects'][$i]."\n";
        }

        $html = "
<html>
<head>
<title>$this->title</title>
$metas
$styles
$scripts
</head>
<body>
$libb
$b_objects
$b_scripts
$b_scripts_s
</body>
</html>
";
        echo $html;
    }

}

