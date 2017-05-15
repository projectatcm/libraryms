<?php
include './includes/header.php';
require_once './libs/Book.php';
require_once './libs/Admin.php';
include 'libs/flash.php';
$book = new Book();
$admin = new Admin();


?>
<div class="container-fluid">

<h3 class="page-header">Books<a href="book_add.php" class="pull-right text-small text-info"> Add new Book</a></h3>

<?php 
                $errors = getFlashError();
                if (!empty($errors)): ?>
                <div class="alert alert-danger">
                  <strong>Error!</strong> <?=$errors?>
              </div>
       
          <?php endif ?>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title">Add Department</h4>
        </div>
        <div class="content">
            <form action="actions/add_department_action.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Department</label>
                            <input type="Text" class="form-control" placeholder="Department Name" name="department" required="">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Add Department</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
</div>
<br>
<div class="container-fluid">
<br>

<?php
  $alldepartment  = $admin->getAlldepartments();
  foreach($alldepartment as $departments){
    $departmentid = $departments['id'];
    $departmentname = $departments['name'];
    
 ?>
<div class="col-md-4">
    <div class="card">
        <div class="header text-right">
       
          <a href="actions.php?id=<?=$departmentid?>&action=deletedepartment"><i class="fa fa-trash deletedepartmentbtn"></i></a>
        </div>
        <div class="content">
          <h4 class="title datatitles" style="font-weight: 400;"><?=$departmentname?></h4>
        </div>
    </div>
</div>
<?php } ?>
</div>
<br>

<!-- Modal -->
<div class="modal fade" id="editdepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form class="" action="actions.php?action=editdepartment" method="post">

        <div class="modal-body">
          <div class="form-group hidden">
              <label>Id</label>
              <input type="text" class="form-control" name="departmentid" id="departmentRenamId" >
          </div>
          <div class="form-group">
              <label>department Name</label>
              <input type="text" class="form-control" name="departmentname"  id="departmentRnameName">
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

  <div class="modal fade" id="deletedepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content deleteModal">
        <div class="modal-body text-center">
          <h5>Do you really want to delete this category ?</h5>
            <div class="btncontainer">
              <form class="" action="actions.php?action=deletedepartment" method="post">
                                                   <input type="text" name="departmentid" id="departmentDeleteId" hidden catcategoryidfield>
<!--                                                     <input type="text" name="categoryid" class="form-control">-->
                <button type="submit" class="btn btn-danger btn-fill">Delete</button>
                <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Cancel</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php include './includes/footer.php'; ?>
