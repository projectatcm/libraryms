<?php
session_start();
include '../libs/flash.php';
require_once '../libs/Book.php';
$book = new Book();


if(!empty($_POST)){
	$title = $_POST['title'];
	$category = $_POST['category'];
	$author = $_POST['author'];
	$price = $_POST['price'];
	$rack_no = $_POST['rack_no'];
	$publication = $_POST['publication'];
	$publication_year = $_POST['publication_year'];
	$camera = $_POST['camera'];
	$image_dir = "files/images/books/";
	$image_save_path = "";
	
	if(!empty($camera)){
		list($type, $data) = explode(';', $camera);
		list(, $data)      = explode(',', $camera);
		$data = base64_decode($data);
        $image_save_path = $image_dir.uniqid().time().".jpg";
		file_put_contents('../'.$image_save_path , $data);
	}
	else if(!empty($_FILES['image'])){
		$image = $_FILES['image'];
		$image_name = $image['name'];
		$image_type = $image['type'];
		$image_tmp_name = $image['tmp_name'];
		$image_error = $image['error'];
		
		$image_extn = pathinfo($image_name, PATHINFO_EXTENSION);
		if($image_error == 0){
			// image has no error's and ready to upload

			$image_save_path = $image_dir.uniqid().time().".".$image_extn;
			$image_upload = move_uploaded_file($image_tmp_name, "../".$image_save_path);
			if(!$image_upload){
				// setting image path to null if image upload failed  
				$image_save_path = "";
			}
		}	
	}


	$book_id = $book->addBook($title,$author,$category,$image_save_path,$publication,$publication_year,$rack_no,$price);
	
	setFlashMessage("Book Added");
	header("Location:../add_book_id.php?id=".$book_id);


}else{
	header("Location:../");
}