<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Crypto class helps to encrypt and decrypt strings using md5 
 *
 * @author VSD
 */
class Crypto {
    var $cryptKey = "qJB0rGtIn5UB1xG03efyCp";
    var $qEncode;
    var $qDecoded;
    function encryptIt( $raw_data ) {
        $this->qEncode = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $this->cryptKey ), $raw_data, MCRYPT_MODE_CBC, md5( md5( $this->cryptKey ) ) ) );
        return( $this->qEncode );
    }
    function decryptIt( $encrypted_data ) {
        $this->qDecoded = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $this->cryptKey ), base64_decode( $encrypted_data ), MCRYPT_MODE_CBC, md5( md5( $this->cryptKey ) ) ), "\0");
        return( $this->qDecoded );
    }
}
?>