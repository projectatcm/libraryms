<?php
session_start();
require_once 'libs/Book.php';
$book = new Book();
// fetching sub id from url
$book_id = $_GET['book_id'];
// fetching book id by sub id
$bookSubID = $book->getBookIdBySubId($book_id);
$bookInfo = array();
if(!empty($bookSubID)){
$book_info_id = $bookSubID[0]['book_id'];
$bookdata = $book->getBooks($book_info_id);

$bookdata = $bookdata[0];
	$title = $bookdata['title'];
	$author = $bookdata['author'];
	$catid = $bookdata['category'];
	$image =  $bookdata['image'];
	$price = $bookdata['price'];
	$publication = $bookdata['publication'];
	$publicationyear = $bookdata['publication_year'];
  $rackno=$bookdata['rack_no'];
	$catdata = $book->getBookCategoryByid($catid);
	$catname = $catdata[0]['name'];
	$lendData = $book->getLendData($book_id);
	if(!empty($lendData )){
		$status = 0;
	}else{
		$status = 1;
	}

$bookInfo = array(
"id" => $book_id,
"title" => ucfirst($title),
"author" => $author,
"image" => $image,
"price" => $price,
"publication" => $publication,
"publication_year" => $publicationyear,
"rack_no" => $rackno,
"category_id" => $catid,
"category"=>$catname,
"status" => $status,
	);

if($status == 0){
$bookInfo['taken_by'] = $lendData[0]['student_id'];
}
}




echo json_encode($bookInfo);
