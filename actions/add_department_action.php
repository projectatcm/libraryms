<?php 
session_start();
include '../libs/flash.php';
require_once '../libs/Admin.php';
require_once '../libs/Book.php';
$admin = new Admin();
$book = new Book();

if(!empty($_POST)){
	$department = $_POST['department'];
	$checking = $admin->selectdepartmentByName($department);
	if(empty($checking)){
		$result = $admin->adddepartment($department);
		if($result){
			setFlashMessage("Department Added");
			header("location:../add_department.php");
		}else{
			setFlashError("Error");
		}
	}else{
			setFlashError("Duplicate Entry for category");
	}
}else{
	header("Location:../");
}
?>