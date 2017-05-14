<?php
include './includes/header.php';
require_once './libs/Admin.php';
include 'libs/flash.php';
$admin = new Admin();
$alldepartments = $admin->getalldepartments();
//print_r($alldepartments);
?>


<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title text-center">Add Students</h4>
        </div>
        <hr>
        <div class="content">
            <form action="actions.php?action=addstudent" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label>Year of Join</label>
                            <select class="form-control" name="branch">
                               <?php foreach ($alldepartments as $department): ?>
                                   <option value="<?=$department['name']?>"><?=$department['name']?></option>
                               <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Year of Join</label>
                            <input required type="number" class="form-control" placeholder="Year" name="year" required>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input required type="file" class="form-control" name="file" required>
                        </div>
                         <button type="submit" id="addBooksBtn"  class="btn btn-info btn-fill pull-right">Add Studnets</button>
                    </div>
                    
        </div>
       
        <div class="clearfix"></div>
        </form>
    </div>
</div>
</div>


<?php include './includes/footer.php'; ?>
