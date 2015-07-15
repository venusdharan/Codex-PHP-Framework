<?php



/**
 * SessionManager encodes the session variables from json string by using cyclic base ecndoe and revesre 
 *
 * @author VSD
 * Session variables in json
 * {username : uname, password:password,email:email,role:admin,client:client}
 * 
 * 
 * 
 * 
 */
class SessionManager {
    function encode_session($json)
    {
        $json1 = base64_encode($json);  //e
        $json2 = base64_encode(strrev($json1)); //r e
        $json3 = strrev(base64_encode($json2));  //e r
        $json4 = base64_encode(strrev($json3));  //r e
        return	$json5 = strrev(base64_encode($json4));  //e r
    }
    function decode_session($json)
    {
        $json1 = base64_decode(strrev($json));
        $json2 = strrev(base64_decode($json1));
        $json3 = base64_decode(strrev($json2));
        $json4 =strrev(base64_decode($json3));
        return base64_decode($json4);
    }
}
