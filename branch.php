<?php
include './includes/header.php';
?>

<div class="col-md-12">
		<div class="card">
				<div class="header">
						<h4 class="title">Add Branch</h4>
				</div>
				<div class="content">
						<form action="actions.php?action=addbranch" method="post">
								<div class="row">
										<div class="col-md-12">
												<div class="form-group">
														<label>Branch</label>
														<input type="Text" class="form-control" placeholder="branch Name" name="branch" required="">
												</div>
										</div>
								</div>
								<button type="submit" class="btn btn-info btn-fill pull-right">Add Branch</button>
								<div class="clearfix"></div>
						</form>
				</div>
		</div>
</div>


<?php
  $allbranch  = $functions->getAllbranchs();
  foreach($allbranch as $branchs){
    $branchid = $branchs['id'];
    $branchname = $branchs['Branch'];
    
 ?>
<div class="col-md-4">
		<div class="card">
				<div class="header text-right">
					<i class="fa fa-pencil editbranchbtn" data-toggle="modal" data-target="#editbranch" data-catid="<?=$branchid?>" data-catname="<?=$branchname?>"></i>
					<i class="fa fa-trash deletebranchbtn" data-toggle="modal" data-target="#deletebranch" data-catid="<?=$branchid?>"></i>
				</div>
				<div class="content">
					<h4 class="title datatitles" style="font-weight: 400;"><?=$branchname?></h4>
				</div>
		</div>
</div>
<?php } ?>

<?php include './includes/footer.php'; ?>

<!-- Modal -->
<div class="modal fade" id="editbranch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form class="" action="actions.php?action=editbranch" method="post">

        <div class="modal-body">
          <div class="form-group hidden">
              <label>Id</label>
              <input type="text" class="form-control" name="branchid" id="branchRenamId" >
          </div>
          <div class="form-group">
              <label>branch Name</label>
              <input type="text" class="form-control" name="branchname"  id="branchRnameName">
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

  <div class="modal fade" id="deletebranch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content deleteModal">
        <div class="modal-body text-center">
  				<h5>Do you really want to delete this branch ?</h5>
  					<div class="btncontainer">
  						<form class="" action="actions.php?action=deletebranch" method="post">
                                                   <input type="text" name="branchid" id="branchDeleteId" hidden catcategoryidfield>
<!--                                                     <input type="text" name="categoryid" class="form-control">-->
  							<button type="submit" class="btn btn-danger btn-fill">Delete</button>
  							<button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Cancel</button>
  						</form>
  					</div>
        </div>
      </div>
    </div>
  </div>
