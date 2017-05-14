<?php
@session_start();
$log_type = "";
$hid_class = "";
if(empty($_SESSION['lms_log'])){
	echo '<script>'.
      'alert("Login required");'.
      'window.location="index.php'.
      '</script>';
}else{
$log_type = $_SESSION['lms_log_type'];
}
if($log_type != "admin"){
	$hid_class = "hidden";
}
$url = $_SERVER['REQUEST_URI'];
$spliturl = explode('/', $url);
$page = strtolower(end($spliturl));
require './libs/Functions.php';
require './libs/Mails.php';
require './libs/Common.php';
require './libs/Book.php';
$functions 	= new Functions();
$mails 			= new Mails();
$common 		= new Common();
$book  = new Book();
$book_categories = $book->getBookCategories();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title> LMS K.K.M.M.P.T.C</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/animate.min.css" rel="stylesheet"/>
	<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
	<link href="assets/css/demo.css" rel="stylesheet" />
	<link href="assets/css/custom.css" rel="stylesheet" />
	<link href="assets/css/custom_style.css" rel="stylesheet" type="text/css"/>
	<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<script src="assets/js/demo.js"></script>
	<script src="assets/js/webcam.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-book.jpg">
			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="home.php" class="simple-text">
						LMS
					</a>
				</div>
				<ul class="nav">
					<li class="">
						<a href="home.php">
							<i class="pe-7s-home"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="<?=$hid_class?>">
						<a href="bookcategories.php">
							<i class="fa fa-newspaper-o"></i>
							<p>Book Categories</p>
						</a>
					</li>
					<li class="<?=$hid_class?>">
						<a href="book_add.php">
							<i class="fa fa-print"></i>
							<p>Add Book</p>
						</a>
					</li>
					<li>
						<a href="books.php">
							<i class="fa fa-book"></i>
							<p>Books</p>
						</a>
					</li>
					<li class="<?=$hid_class?>">
						<a href="add_department.php">
							<i class="pe-7s-id"></i>
							<p>Add Department</p>
						</a>
					</li>
					<li>
						<a href="fine.php">
							<i class="pe-7s-hourglass"></i>
							<p>Fines</p>
						</a>
					</li>
					
					<li class="<?=$hid_class?>">
						<a href="staff_entry.php">
							<i class="pe-7s-users"></i>
							<p>Add Staff</p>
						</a>
					</li>
					<li>
						<a href="lend.php">
							<i class="pe-7s-note2"></i>
							<p>Lend</p>
						</a>
					</li>
						<li>
						<a href="return.php">
							<i class="pe-7s-note2"></i>
							<p>return</p>
						</a>
					</li>
					<li>
						<a href="lend_history.php">
							<i class="pe-7s-note2"></i>
							<p>Lended Books</p>
						</a>
					</li>
				<li class="<?=$hid_class?>">
						<a href="student_add.php">
							<i class="pe-7s-add-user"></i>
							<p> Add Student</p>
						</a>
					</li>

					<li class="<?=$hid_class?>">
						<a href="permission.php">
							<i class="pe-7s-tools"></i>
							<p>Set Persmmions</p>
						</a>
					</li>
				

				</ul>
			</div>
		</div>
		<nav class="navbar navbar-default navbar-fixed">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand text-warning" href="#" onclick="javascript:window.history.back();">Back</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li>
						<form action="books.php" method="get" class="form-inline" style="margin-top: -5px; margin-bottom: -5px;">
								<input type="text" name="key" class="form-control" placeholder="Key">
								<select name="type" class="form-control">
								<option value="">Select</option>
									<?php foreach ($book_categories as $key => $value): ?>
										<option value="<?=$value['name']?>"><?=$value['name']?></option>
									<?php endforeach ?>
								</select>
								<button class="btn btn-primary"><i  class="fa fa-search"></i> Search</button>
							</form>
						</li>
						<li>
							<a href="actions.php?action=logout" onclick="javascript:if(!confirm('Are you sure to Logout ?')) return false;">
								<p>Log out  &nbsp;<i class="fa fa-sign-out"></i></p>
							</a>
						</li>
						<li class="separator hidden-lg hidden-md"></li>
					</ul>
				</div>
			</div>
		</nav>
<div class="content">
	<div class="container-fluid">
    <div class="row">