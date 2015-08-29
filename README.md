# Codex-PHP-Framework
PHP based web page developer , create Bootsrap based webpages using PHP alone, making a pure dynamic creation.</br>
The framework helps to create PHP based webapages easily. Helping the user to create UI using PHP and littile effort,</br> Codex provides MVC and non MVC structure,secure cdn etc.
Dynamic loading and create dynamic javascript and css as PHP parses these file too ,</br> user can add php codes in these files, use athentication and session to generate custom codes as well.
<h1>Intstalling</h1>
copy all files to working directory
<h2>Example page setup</h2>
Open Pages directory and add edit test.php page if needed.</br>
All pages to shown should be placed in this directory.</br>
Open bowser and add query parameter ?page=test</br>
<h2>Index page setup</h2>
``` php
<?php
include_once 'core/NavigationManager.php';
$nav = new NavigationManager();
$nav->navigate();
// the page will search based on query and uses no authentication
?>
```
<h2>test page setup</h2>
``` php
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
```
