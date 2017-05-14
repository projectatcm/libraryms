<?php
include './includes/header.php';
require_once './libs/Admin.php';
include 'libs/flash.php';
$admin = new Admin();
$alldepartments = $admin->getalldepartments();
$fine_data = $admin->getFine();
@$days = $fine_data[0]['days'];
@$amount = $fine_data [0]['amount'];
?>


<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title text-center">Fine</h4>
        </div>
        <div class="content">
        <?php if ($log_type == "admin"): ?>
            
       
            <form action="actions.php?action=updateFine" method="post">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Days</label>
                        <input required  type="text" class="form-control" placeholder="Days" name="days" value="<?=$days?>">
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Amount</label>
                        <input required  type="text" class="form-control" placeholder="Amount" name="amount" value="<?=$amount?>">
                    </div>
                </div>
        </div>
        <button type="submit" id="addBooksBtn"  class="btn btn-info btn-fill pull-right">Update</button>
        <div class="clearfix"></div>
        </form>
         <?php else: ?>
<div class="alert alert-warning">
  <strong>Contact admin to add fine data</strong> fine can't be empty
</div>
<?php endif;?>
    </div>
</div>
</div>


<?php include './includes/footer.php'; ?>
