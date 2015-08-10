<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo $_SERVER["REDIRECT_STATUS"];
        switch($_SERVER["REDIRECT_STATUS"]){
	case 400:
		echo "400 Bad Request";
		echo"The request can not be processed due to bad syntax";
	break;

	case 401:
		echo "401 Unauthorized";
		echo"The request has failed authentication";
	break;

	case 403:
		echo "403 Forbidden";
		echo"The server refuses to response to the request";
	break;

	case 404:
		echo "404 Not Found";
		echo"The resource requested can not be found.";
	break;

	case 500:
		echo "500 Internal Server Error";
		echo"There was an error which doesn't fit any other error message";
	break;

	case 502:
		echo "502 Bad Gateway";
		echo"The server was acting as a proxy and received a bad request.";
	break;

	case 504:
		echo "504 Gateway Timeout";
		echo"The server was acting as a proxy and the request timed out.";
	break;
        }
