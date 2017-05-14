<?php 
/**
 * flash is used for a passing flash messages from page to another page
 * flash data will lost when ever we see the data
 * so developers can show messages like errors and success messages
 * by making use of this simple flash system...
 * and if its ot empty you have a message waiting...
 * i.e
 * must include this file in every files you need to work with flash message data
 * 
 */



function getFlashMessage(){
	if(!empty($_SESSION['flash_message'])){
		$flash = $_SESSION['flash_message'];
		clearFlash();
		return $flash;
	}
	return  "";
}
function getFlashError(){
	if(!empty($_SESSION['flash_message']) && $_SESSION['flash_message']['type'] == "error"){
		$message = $_SESSION['flash_message']['message'];
		clearFlash();
		return $message;
	
	}else{
		return "";
	}
}
function setFlashMessage($message){
	$_SESSION['flash_message'] = array(
		"type" => "message",
		"message" => $message
		);
}
function setFlashError($error,$go_back = true){
	$_SESSION['flash_message'] = array(
		"type" => "error",
		"message" => $error
		);
	if($go_back){
		echo '<script>window.history.back();</script>';
	}
}

function clearFlash(){
	unset($_SESSION['flash_message']);
}
?>