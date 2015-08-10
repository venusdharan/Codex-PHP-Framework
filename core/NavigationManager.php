<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NavigationManager
 *
 * @author VSD
 */
class NavigationManager {
    //put your code here
    public function __construct() {
        
    }
    function navigate()
    {
        
        foreach($_GET as $key => $value)
        {
                //echo $key.$value;
                if($key == 'page')
                {
                    include_once "./Pages/$value.php";
                }
                if($key == 'error')
                {
                    //echo $value;
                }
        }
    }
    
}
