<?php



/**
 * Description of AuthenticationManager
 *
 * @author VSD
 */



class AuthenticationManager {
    function clear_authentication ()
    {
        if(session_id() == '') {
    session_start();
    }
    //remove PHPSESSID from browser

    setcookie("user_id","", time() -(86400 * 30), "/");
    //clear session from globals
    unset($_COOKIE["user_id"]);
    $_SESSION = array();
    //clear session from disk
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION);
    }
    
    function logout ()
    {
        if(session_id() == '') {
    session_start();
    }
    //remove PHPSESSID from browser

    setcookie("user_id","", time() -(86400 * 30), "/");
    //clear session from globals
    unset($_COOKIE["user_id"]);
    $_SESSION = array();
    //clear session from disk
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION);
    echo "<script type='text/javascript'> document.cookie = 'user_id=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';   window.location.href = 'index.php';</script>";
    }
    
    
    function  login()
    {
        if(session_id() == '') {
                session_start();
            }

            if(isset($_POST["mail"]) & isset($_POST["password"]) & isset($_POST["cre"]))
            {

                    if(($_POST["mail"] != "") AND ($_POST["password"] != "") AND ($_POST["cre"] != ""))
                    {
                            $mail = $_POST["mail"];
                            $password = $_POST["password"];
                            $role = $_POST["cre"];
                            require_once ('SessionManager.php');
                            $session_manager = new SessionManager();
                            require_once ('medoo.min.php');
                            $database = new medoo();
                            $count = $database->count("triotrack_users", [
                                    "email" => "$mail"
                            ]);
                            if($count > 0)
                            {
                                $profile = $database->get("triotrack_users", [ "username","password","salt","client",],["email" => "$mail"]);
                                if($role === "admin")
                                {
                                    if($profile["password"] === sha1($password.$profile["salt"]))
                                    {
                                        $username = $profile["username"];
                                        $client = $profile["client"];
                                        $cookie = array("email"=>"$mail","username"=>"$username", "password"=>"$password", "client"=>"$client","role"=>"$role");
                                        $encoded_cookie = $session_manager->encode_session(json_encode($cookie));
                                        $_SESSION["user_id"] = $encoded_cookie;
                                        setcookie("user_id",$encoded_cookie, time() + (86400 * 1), "/"); // 86400 = 1 day
                                        echo "admin";
                                        exit();
                                    }
                                    else
                                    {
                                        echo "failed";
                                        exit();
                                    }
                                }
                                else 
                                {
                                    if($profile["client"] === $password)
                                    {
                                        $username = $profile["username"];
                                        $client = $profile["client"];
                                        $cookie = array("email"=>"$mail","username"=>"$username", "password"=>"$password", "client"=>"$client","role"=>"$role");
                                        $encoded_cookie = $session_manager->encode_session(json_encode($cookie));
                                        $_SESSION["user_id"] = $encoded_cookie;
                                        setcookie("user_id",$encoded_cookie, time() + (86400 * 1), "/"); // 86400 = 1 day
                                        echo "client";
                                        exit();
                                    }
                                    else
                                    {
                                        echo "failed";
                                        exit();
                                    }
                                }
                            }


                    }
                    else
                    {
                            echo "failed";
                    }
                    exit();
            }
    }
}

?>