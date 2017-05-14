<?php
session_start();
include '../libs/flash.php';
require_once '../libs/Book.php';
$book = new Book();


if(!empty($_POST)){
$book_id = $_POST['info_id'];
$sub_id = $_POST['book_id'];
foreach ($sub_id as $id) {
	$book->addBookIds($book_id,$id);
	setFlashMessage("Book Added");
	header("Location:../books.php");
}
}else{
	header("Location:../");
}