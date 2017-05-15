<?php
include './includes/header.php';
require_once './libs/Book.php';
include 'libs/flash.php';
$book = new Book();
$book_categories = $book->getBookCategories();

?>
<div class="container-fluid">

    <h3 class="page-header">Books<a href="book_add.php" class="pull-right text-small text-info"> Add new Book</a></h3>


    <?php
    $books = $book->getBooks();
     if(!empty($_GET['key'])){
            // searching
        $key = $_GET['key'];
        $books = $book->getData("SELECT * FROM book where title like '%$key%' OR author like '%$key%'");
       
      }
      if(empty($books)){
        ?>
        <h5 class="alert alert-warning">No Books to show</h5>
        <?php
      }
    foreach($books as $data){
      $bookid = $data['id'];
      $title = $data['title'];
      $catid = $data['category'];
      $coverimage = $data['image'];
      $catdata = $book->getBookCategoryByid($catid);
      $catname = $catdata[0]['name'];
      if(!empty($_GET['type'])){
        $type = $_GET['type'];
        if(strtolower($catname) != strtolower($type)){
          continue;
      }

  }
  $titlelength = strlen($title);
  if($titlelength > 25) {
    $title = substr($title, 0, 25);
    $title = $title.'...';
}
?>

<div class="col-md-3" style="padding:15px">
    <div class="col-xs-12" style="background-color:#fff;height:250px;padding:0">
      <img src="<?=$coverimage?>" >
  </div>
  <div class="col-xs-12 text-center" style="height:50px;padding:0;">
      <h5 style="font-size:16px;padding:0;font-weight:600">
        <?=$title?><br>
        <span style="font-size:13px;font-weight:500"><?=$catname?></span><br>
        <span style="font-size:10px;">
          <a href="#" style="outline:none;" data-toggle="modal" class='viewmorebook' data-target="#viewbookdatas" data-bookid="<?=$bookid?>">View More</a>
      </span>
  </h5>
</div>
</div>

<?php } ?>


</div>
<script type="text/javascript">
  $('.viewmorebook').click(function(){
    var id = $(this).data('bookid');
    $('.viewMoreBookDataDiv').load('ajaxData.php?bookid='+id+'&type=viewBookDatas');
  })

</script>
<div class="modal fade" id="viewbookdatas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content deleteModal">
      <div class="modal-body viewMoreBookDataDiv">
      </div>
  </div>
</div>
</div>

<?php include './includes/footer.php'; ?>