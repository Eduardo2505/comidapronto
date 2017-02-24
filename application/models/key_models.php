<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Key_models extends CI_Model {
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

   function Crypto($mensaje){
     
    $cipher = "rijndael-128"; 
		$mode = "cbc"; 
		$secret_key = "D4:6E:AC:3F:F0:BE"; 
//iv length should be 16 bytes 
		$iv = "fedcba9876543210"; 

// Make sure the key length should be 16 bytes 
		$key_len = strlen($secret_key); 
		if($key_len < 16 ){ 
			$addS = 16 - $key_len; 
			for($i =0 ;$i < $addS; $i++){ 
				$secret_key.=" "; 
			} 
		}else{ 
			$secret_key = substr($secret_key, 0, 16); 
		} 

		$td = mcrypt_module_open($cipher, "", $mode, $iv); 
		mcrypt_generic_init($td, $secret_key, $iv); 
		$cyper_text = mcrypt_generic($td, $mensaje); 
		mcrypt_generic_deinit($td); 
		mcrypt_module_close($td); 
		//echo bin2hex($cyper_text); 

		return bin2hex($cyper_text);
    
   }   
	function Decrypto(){
		$cipher = "rijndael-128"; 
		$mode = "cbc"; 
		$secret_key = "D4:6E:AC:3F:F0:BE"; 
//iv length should be 16 bytes 
		$iv = "fedcba9876543210"; 

// Make sure the key length should be 16 bytes 
		$key_len = strlen($secret_key); 
		if($key_len < 16 ){ 
			$addS = 16 - $key_len; 
			for($i =0 ;$i < $addS; $i++){ 
				$secret_key.=" "; 
			} 
		}else{ 
			$secret_key = substr($secret_key, 0, 16); 
		} 

		$td = mcrypt_module_open($cipher, "", $mode, $iv); 
		mcrypt_generic_init($td, $secret_key, $iv); 
		$decrypted_text = mdecrypt_generic($td, hex2bin("444e6969a269829a3e59a86300614fc5")); 
		mcrypt_generic_deinit($td); 
		mcrypt_module_close($td); 
		return trim($decrypted_text); 

	}
 
}