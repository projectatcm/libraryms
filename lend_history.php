<?php
include './includes/header.php';
require_once './libs/Book.php';
require_once './libs/Students.php';
include 'libs/flash.php';
$book = new Book();
$students = new Students();
$book_categories = $book->getBookCategories();
$lend_data = $book->getLendHistory();
?>

<div class="container-fluid">
	<div class="card">
		<div class="header">
			<h4 class="title text-center">Lended Books</h4>
		</div>
		<div class="content">

		</div>
		<table class="table text-capitalize">
			<tr>
				<td>#</td>
				<td>Book Name</td>
				<td>Student Name</td>
				<td>Lend Rate</td>
				<td>Status</td>
			</tr>
			<?php 
			if(empty($lend_data)){
				?>
<div class="alert alert-warning">
  <strong>No Data Avaliable!</strong> History is empty
</div>

			<?php
			}
			$count = 1;
			foreach ($lend_data as $data){
				$book_id = $data['book_id'];
				$student_id = $data['student_id'];
				$lend_date = $data['lend_date'];
				$return_date = $data['return_date'];
				$student_data = $students->getStudentsById($student_id);
				$book_data = $book->getBookDataFromBookId($book_id);
				if($return_date == "" || $return_date == "0000-00-00"){
					$status = "<span class='label label-info'>lended</span>";
				}else{
					$status = "<span class='label label-success'>Returned</span>";
				}
				?>
				<tr>
					<td><?=$count;?></td>
					<td><?=$book_data[0]['title']?></td>
					<td ><?=$student_data[0]['name']?></td>
					<td><?=$lend_date?></td>
					<td><?=$status?></td>
				</tr>
				<?php 
$count++;
				}?>

			</tr>
		</table>
	</div>
	
</div>
<style type="text/css">
	.modal-backdrop.in{
		display: none !important;
	}
</style>

<?php
include './includes/footer.php';
?>
