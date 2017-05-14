<?php
 include './includes/header.php';
	require_once './libs/Book.php';
	$books = new Book();
	$allbooks = $books->getBooks();
 ?>

<div class="col-xs-12">

	<?php
		foreach($allbooks as $book){
			$bookcount = $book['no_of_books'];
			$booktitle = $book['title'];
	 ?>
	<div class="col-xs-12`">
		<h4 class='page-header'><?=$booktitle?></h4>
		<div class="col-xs-3">
		</div>
	</div>
	<?php } ?>


</div>

<?php include './includes/footer.php'; ?>
