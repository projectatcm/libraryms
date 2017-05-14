<?php 
session_start();
include '../libs/flash.php';
require_once '../libs/Admin.php';
require_once '../libs/Book.php';
$admin = new Admin();
$book = new Book();

if(!empty($_POST)){
	
	

}else{
	header("Location:../");
}