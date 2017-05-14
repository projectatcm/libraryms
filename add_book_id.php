<?php
include './includes/header.php';
require_once './libs/Book.php';
include 'libs/flash.php';

$book = new Book();
if(empty($_GET['id'])){
    header('location:books.php');
}
$book_info_id  =$_GET['id'];
$bookInfo = $book->getBookInfo($book_info_id);
$book_title = $bookInfo[0]['title'];
$book_image = $bookInfo[0]['image'];
$book_category = $bookInfo[0]['category'];
$categoryData =$book->getBookCategoryByid($book_category)[0];
$book_category_name = $categoryData['name'];
$book_rack_no =  $bookInfo[0]['rack_no'];
$book_publication =  $bookInfo[0]['publication'];
$book_publication_year =  $bookInfo[0]['publication_year'];
$book_price =  $bookInfo[0]['price'];
$book_author =  $bookInfo[0]['author'];

?>

<div class="container-fluid">
    <?php
    $errors = getFlashError();
    if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <strong>Error!</strong> <?=$errors?>
  </div>

<?php endif ?>
<br>
<div class="card">
    <div class="header">
        <h3 class="title text-center">Add Book ID's</h3>
    </div>
    <hr>
    <div class="content">
     <div class="row">

         <div class="col-sm-8">
            <form action="actions/book_id_add_action.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="info_id" value="<?=$book_info_id?>">
                <div id="id_wrapper">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Book ID</label>
                            <div class="input-group">
                                <input required type="Text" maxlength="12" class="form-control barcode_input" placeholder="Book ID" name="book_id[]">
                                <span class="input-group-addon" style="background: #f5f5f5;">
                                    <i class="fa fa-camera"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <svg id="barcode" class="barcode-inline"></svg>
                    </div>
                    <div class="col-sm-1">
                    <a class="btn btn-primary" onclick="addRow()" style="margin-top: 25px;">
                        <i class="fa fa-plus"></i>
                    </a>
                    </div>
                </div>

</div>






                <button type="submit" id="addBooksBtn"  class="btn btn-info btn-fill pull-left"> Save  ID's </button>

                <div class="clearfix"></div>
            </form>
        </div>

        <div class="col-sm-4">
         <div class="book_wrapper">
          <table class="table table-responsive table-bordered">
            <tbody>

             <tr>
                <td>Title</td>
                <td><?=$book_title?></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><?=$book_author;?></td>
            </tr>
            <tr>
                <td>Rack No</td>
                <td><?=$book_rack_no;?></td>
            </tr>
            <tr>
                <td>Category</td>
                <td><?=$book_category_name;?></td>
            </tr>
            <tr>
                <td>Publication</td>
                <td><?=$book_publication;?></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><?=$book_price;?></td>
            </tr>
            <tr>

            </tr>
        </tbody>
    </div>

</table>

</div>
</div>
</div>
</div>
</div>
</div>

<?php include './includes/footer.php'; ?>

<div class="clearfix"></div>


</div>
</div>
<script src="assets/js/JsBarcode.all.min.js"></script>
<script type="text/javascript">

    $(function () {

        $("#barcode").JsBarcode("barcode");
        $('body').on('keyup','.barcode_input',function () {
            var id = $(this).val();
            $(this).parents('.row > div').siblings().find("#barcode").JsBarcode(id);

        })
        $("#barcode_scan_btn").click(function () {
            var $target = $("" + $(this).data('target'));
            var $scannerModal = $('#barcodeScanerModal');
            $scannerModal.modal('show');
            $('.stop_reader').click(function () {

            });
        });

    });

    function addRow(){
        var wrapper  = $('#id_wrapper');
        var append_data = '  <div class="row"><div class="col-sm-8"><div class="form-group"><label>Book ID</label><div class="input-group"><input type="Text" maxlength="12" class="form-control barcode_input" placeholder="Book ID" name="book_id[]">  <span class="input-group-addon" style="background: #f5f5f5;"> <i class="fa fa-camera"></i></span></div> </div></div><div class="col-sm-3"> <svg id="barcode" class="barcode-inline"></svg></div><div class="col-sm-1"></div></div>';
        wrapper.append(append_data);
    }
 
</script>
</html>
