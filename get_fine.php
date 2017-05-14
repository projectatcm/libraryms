<?php
session_start();
require_once 'libs/Book.php';
require_once 'libs/Admin.php';
$book = new Book();
$admin = new Admin();

$book_id = $_GET['id'];
$fine_data = $admin->getFine();

$book_data= $book->getLendData($book_id);
if(!empty($book_data)){
	$return_date=date("Y-m-d");
	$lend_date=$book_data[0]['lend_date'];
	$date1=date_create($lend_date);
	$date2=date_create($return_date);
	$diff=date_diff($date1,$date2);
$days =  $diff->days;
$limit = $fine_data[0]['days'];
$amount = $fine_data [0]['amount'];
$fine = 0;
if($days > $limit){
	$fine = ($days - $limit) * $amount;
}
echo $fine;
}



