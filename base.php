<?php
include './includes/header.php';
require_once './libs/Book.php';
include 'libs/flash.php';
$book = new Book();
$book_categories = $book->getBookCategories();

?>
<div class="container-fluid">

<h3 class="page-header">Books<a href="book_add.php" class="pull-right text-small text-info"> Add new Book</a></h3>




</div>
</script>
</html>