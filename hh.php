<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



include_once 'core/HtmlObject.php'; 
include_once 'core/HtmlPage.php'; 
$page = new HtmlPage;

//$page->addStylesheet('http://www.example.com/my.css');
//$page->addStylesheet('http://www.example.com/their.css');
//$page->addScript('http://www.example.com/my.js');
//$page->addScript('http://www.example.com/their.js');
$page->add_body('<p>This is my body</p>');
$page->set_title('hello');
$page->add_meta('http-equiv="X-UA-Compatible" content="IE=edge"');
$page->add_lib('jquery');
$page->add_script("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
$page->clear_body();
$page->get_page();