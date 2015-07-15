<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('SessionManager.php');
$session_manager = new SessionManager();
        
if(session_id() == '') {
    session_start();
}

if(isset($_COOKIE["user_id"]))
	{
		
		if($_COOKIE["user_id"] === '')
		{
                        header("Location : index.php");
			echo '<script>window.location.href="index.php";</script>';
                        exit();
		}else
                {
                        $session_array_json = $session_manager->decode_session($_COOKIE["user_id"]);
                        $session_array = json_decode($session_array_json,true);
                        $username = $session_array["username"];
                        $password = $session_array["password"];
                        $role = $session_array["role"];
                        
                        
                        
                }
        }
        else
        {
            header("Location : index.php");
            echo '<script>window.location.href="index.php";</script>';
            exit();
        }
?>
