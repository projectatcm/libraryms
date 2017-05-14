 <?php
include './includes/header.php';
  
$bookfunctions = new Book();
 ?>
<div class="col-md-12">
		<div class="card">
				<div class="header">
						<h4 class="title">Add Book Categories</h4>
				</div>
				<div class="content">
						<form action="actions.php?action=addbookcategory" method="post">
								<div class="row">
										<div class="col-md-12">
												<div class="form-group">
														<label>Category Name</label>
														<input type="Text" class="form-control" placeholder="Category Name" name="categoryname" required="">
												</div>
										</div>
								</div>
								<button type="submit" class="btn btn-info btn-fill pull-right">Add Category</button>
								<div class="clearfix"></div>
						</form>
				</div>
		</div>
</div>
<?php
  $allbookcategories  = $bookfunctions->getBookCategories();
  foreach($allbookcategories as $bookcategories){
    $categoryid = $bookcategories['id'];
    $categoryname = $bookcategories['name'];
 ?>
<div class="col-md-4">
		<div class="card">
				<div class="header text-right">
					<i class="fa fa-pencil editcategorybtn" data-toggle="modal" data-target="#editBookCategory" data-catid="<?=$categoryid?>" data-catname="<?=$categoryname?>"></i>
					<!-- <i class="fa fa-trash deletecategorybtn" data-toggle="modal" data-target="#deleteBookCategory" data-catid="<?=$categoryid?>"></i> -->
				</div>
				<div class="content">
					<a href="books.php?type=<?=$categoryname?>"><h4 class="title datatitles" style="font-weight: 400;"><?=$categoryname?></h4></a>
				</div>
		</div>
</div>
<?php } ?>
</div>

<?php include './includes/footer.php'; ?>

<!-- Modal -->
<div class="modal fade" id="editBookCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form class="" action="actions.php?action=editBookCategory" method="post">

        <div class="modal-body">
          <div class="form-group hidden">
              <label>Id</label>
              <input type="text" class="form-control" name="categoryid" id="categoryRenamId">
          </div>
          <div class="form-group">
              <label>Category Name</label>
              <input type="text" class="form-control" name="categoryname"  id="categoryRnameName">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-fill">Update</button>
        </div>
    </form>

    </div>
  </div>
</div>

  <div class="modal fade" id="deleteBookCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content deleteModal">
        <div class="modal-body text-center">
  				<h5>Do you really want to delete this category ?</h5>
  					<div class="btncontainer">
  						<form class="" action="actions.php?action=deleteBookCategory" method="post">
                                                    <input type="text" name="categoryid" id="categoryDeleteId" hidden catcategoryidfield>
<!--                                                     <input type="text" name="categoryid" class="form-control">-->
  							<button type="submit" class="btn btn-danger btn-fill">Delete</button>
  							<button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Cancel</button>
  						</form>
  					</div>
        </div>
      </div>
    </div>
  </div>
