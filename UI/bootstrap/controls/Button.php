<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Button($class,$id,$content,$attr)
{
    echo '<button type="button" class="'.$class.'" '.$attr. 'id="'.$id.'" >'.$content.'</button>';
}
function Button_Object($class,$id,$content,$attr)
{
    return '<button type="button" class="'.$class.'" '.$attr. 'id="'.$id.'" >'.$content.'</button>';
}

?>