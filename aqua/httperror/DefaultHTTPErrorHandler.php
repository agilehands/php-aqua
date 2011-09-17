<?php
/**
 *         
 * #######################################################################
 *           +----------------------------------------------+
 *           | THIS FILE IS A PART OF "PHP AQUA" FRAMEWORK | 
 *           +----------------------------------------------+
 *           
 *  	THIS CODE IS PROTECTED UNDER Apache Software License
 *  	http://www.apache.org/licenses/LICENSE-2.0
 *
 * 	Simply stating :
 * 		Proprietary Software linking: Yes
 * 		Distribution of this software : Yes
 * 		Redistributing of the code with changes: You can
 * 		Compatible with GNU GPL : NO :D
 *
 * 	Feel free to change and use but don't need to share the code though highly appreciated!
 * 
 * @created Sep 5, 2011 at 8:29:20 PM
 * @author Shaikh Sonny Aman <agilehands@gmail.com>
  *               http://amanpages.com
 * 	
 * #######################################################################
 */

namespace aqua;

class DefaultHTTPErrorHandler implements IHTTPErrorHandler{
	public function __construct(){		
		$curLocale = App::getCurrentLocale();
		include AQUA_DIR.'/httperror/lang/http_messages.php';
		
		if( $curLocale != 'en' && file_exists( AQUA_DIR.'/lang/http_messages_'.$curLocale.'.php' ) ){
			include AQUA_DIR.'/lang/http_messages_'.$curLocale.'.php';
		}
	}
	public function onHTTPError( $HTTPErrorCode, $errorMessage = '', $HTTPVersion = '1.0' ){		
		if( empty( $errorMessage ) ){
			global $httpErrorCodes;
			if( array_key_exists( $HTTPErrorCode, $httpErrorCodes ) ){
				$errorMessage = $httpErrorCodes[ $HTTPErrorCode];
			}else{
				$errorMessage = 'Unknown HTTP Error!';
			}
		}
		header( "HTTP/$HTTPVersion $HTTPErrorCode $errorMessage" );
	}
	
	protected function getHTTPErrorMessage( $HTTPErrorCode ){
		global $httpErrorCodes;
		if( array_key_exists( $HTTPErrorCode, $httpErrorCodes ) ){
			return $httpErrorCodes[ $HTTPErrorCode];
		}
		return false;
	}
}

?>