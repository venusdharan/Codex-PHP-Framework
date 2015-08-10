<?php
include_once 'core/HtmlObject.php'; 
include_once 'core/HtmlPage.php'; 
$page = new HtmlPage;
$p = new HtmlObject();
$i = new HtmlObject();
$i->set_type("iframe");
$i->set_custom_attribute("src='http://www.example.com' height=800px width=800px");
$p->set_type("p");
$p->add_content("hello");
$page->add_body('<p>This is my body</p>');
$page->add_body($p->get_object());
$page->add_body($i->get_object());
$page->set_title('hello');
$page->add_meta('http-equiv="X-UA-Compatible" content="IE=edge"');
$page->add_lib('jquery');
//$page->add_script("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
//$page->clear_body();
$page->get_page();
?>