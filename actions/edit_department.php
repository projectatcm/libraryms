<?php
session_start();
require_once '../libs/Book.php';
include '../libs/flash.php';
$book = new Book();


if(!empty($_POST)){
	
	 $id =  $_POST['departmentid'];
    $name = $_POST['departmentname'];
    $result = $functions->updatedepartment($id,$name);
    if($result){
     setFlashMessage("Department Added");
			header("location:../add_department.php");
  }else{
     setFlashError("Error");
  }

}else{
	header("Location:../");
}