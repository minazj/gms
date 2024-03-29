<?php
ob_start();
ini_set('date.timezone','Asia/Kuala_Lumpur');
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();

require_once('initialize.php');
require_once('classes/DBConnection.php');
require_once('classes/SystemSettings.php');
$db = new DBConnection;
$conn = $db->conn;
function redirect($url=''){
	if(!empty($url))
	echo '<script>location.href="'."/gms/" .$url.'"</script>';
}
function validate_image($file){
	if(!empty($file)){
			// exit;
        $ex = explode("?",$file);
        $file = $ex[0];
        $ts = isset($ex[1]) ? "?".$ex[1] : '';
		if(is_file(base_app.$file)){
			return "/gms/".$file.$ts;
		}else{
			return '/gms/dist/img/no-image-available.png';
		}
	}else{
		return'/gms/dist/img/no-image-available.png';
	}
}
function format_num($number = '' , $decimal = ''){
    if(is_numeric($number)){
        $ex = explode(".",$number);
        $decLen = isset($ex[1]) ? strlen($ex[1]) : 0;
        if(is_numeric($decimal)){
            return number_format($number,$decimal);
        }else{
            return number_format($number,$decLen);
        }
    }else{
        return "Invalid Input";
    }
}
ob_end_flush();
?>