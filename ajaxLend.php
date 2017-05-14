<?php
session_start();
include '../libs/flash.php';
require_once '../libs/Book.php';
$book = new Book();


if(!empty($_POST)){
	
	$action = $_POST['action'];
	if($action == "get_book"){
		
	}


}else{
	header("Location:../");
}