<?php
include './libs/Book.php';
$book = new Book();

$type = $_POST['type'];

if($type === 'viewBookDatas') {
	$bookid = $_POST['bookid'];
	$bookdata = $book->getBooks($bookid);
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
$bookIds = $book->getBookIds($bookid);
$no_of_books = count($bookIds);

	?>
	<div class="row">
	<div class="col-sm-12" style="margin-top: -40px;">
		<h3 class="page-header">
		<?=$title?>

	</h3>

	</div>
		<div class="col-xs-4">
				<div style="height:250px;width:250px;">
						<img src="<?=$image?>" alt="">
				</div>
		</div>
		<div class="col-xs-4">
			<div class="form-group">
				<label>Book Title</label>
				<p><?=$title?></p>
			</div>
			<div class="form-group">
				<label>Book Author</label>
				<p><?=$author?></p>
			</div>
			<div class="form-group">
				<label>Book Category</label>
				<p><?=$catname?></p>
			</div>
			<div class="form-group">
				<label>Book Price</label>
				<p><?=$price?></p>
			</div>
			<div class="form-group">
				<label>Book publication</label>
				<p><?=$publication?></p>
			</div>
			<div class="form-group">
				<label>Book publication year</label>
				<p><?=$publicationyear?></p>
			</div>
                        <div class="form-group">
				<label>Book Rack No</label>
				<p><?=$rackno?></p>
			</div>
			  <div class="form-group">
				<label>No of Books</label>
				<p><?=$no_of_books?></p>
			</div>


		</div>
		<div class="col-sm-4">
			<div class="page-header">
				<strong>Book ID's</strong>
			</div>		
			<?php foreach ($bookIds as $id): ?>
				<h6><?=$id['sub_id']?></h6>
			<?php endforeach ?>
		</div>
		<div class="col-xs-12 text-right">
		<a class="pull-left" style="color:#262626;" href="print_barcode.php?id=<?=$bookid?>">
			<button type="button" name="button" class='btn btn-primary btn-fill'> Print Barcode </button>
		</a>
		<a class="pull-left" style="color:#262626; margin-left: 10px;" href="add_book_id.php?id=<?=$bookid?>">
			<button type="button" name="button" class='btn btn-info btn-fill'> Add More Books </button>
		</a>
			<button type="button" name="button" data-dismiss="modal"  class='btn btn-info btn-fill'> Close	</button>
		</div>
	</div>


<?php }
