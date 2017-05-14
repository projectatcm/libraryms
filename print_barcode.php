   	<html>
   	<head>
   	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/JsBarcode.all.min.js"></script>
<script type="text/javascript">

    $(function () {

$('.barcode').each(function() {
	var code = $(this).data('code');
	 $(this).JsBarcode(code);
});
      
   

    });


 
</script>
</head>
<body>
<?php
include './libs/Book.php';
$book = new Book();
$id = $_GET['id'];
$bookData = $book->getBooks($id);
$bookIds = $book->getBookIds($id);
$book_title = $bookData[0]['title'];
?>
<div class="container">
<h2 class="page-header"><?=ucfirst($book_title)?>
	<button onclick="print()" class="btn pull-right">Print</button>
</h2>
<?php foreach ($bookIds as $id):	?>
<svg class="barcode" data-code="<?=$id['sub_id']?>" style="width:150px; margin:25px;"></svg>
<?php
endforeach;
?>
</div>
</body>

</html>


