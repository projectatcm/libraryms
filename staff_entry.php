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
            <h4 class="title text-center">Add Staff</h4>
        </div>
        <div class="content">
            <form action="actions.php?action=addstaff" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Staff ID</label>
                            <input required type="Text" class="form-control" placeholder="Staff id" name="staffid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Name</label>
                            <input required  type="Text" class="form-control" placeholder="Staff name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department</label>
                            <select required class="form-control" name="departmentid">
                                <option value="">Staff Departement</option>
                                <?php
                                foreach ($alldepartments as $departments) {
                                    $departmentid = $departments['id'];
                                    $departmentname = $departments['name'];
                                    ?>
                                    <option value="<?= $departmentid ?>"><?= $departmentname ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> DOB</label>
                            <input required  type="text" class="form-control" placeholder="DOB" name="dob">
                        </div>
                    </div>
<!--                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Image</label>
                            <input required  type="file" class="form-control" name="staffimage">
                        </div>
                    </div>-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> address</label>
                            <input required  type="text" class="form-control" name="address" placeholder="address">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Year Join</label>
                            <input required  type="text" class="form-control" placeholder="Staff Year Join" name="yearjoin">
                        </div>
                    </div>
<!--                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Gender</label>
                            <input required  type="radio" class="form-control"  name="StaffYearJoin">

                    </div>-->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input required  type="text" class="form-control" placeholder="Staff Phone" name="phone">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> Email address</label>
                        <input required  type="text" class="form-control" placeholder="Staff Email" name="email">
                    </div>
                </div>
        </div>
        <button type="submit" id="addBooksBtn"  class="btn btn-info btn-fill pull-right">Add Staff</button>
        <div class="clearfix"></div>
        </form>
    </div>
</div>
</div>


<?php include './includes/footer.php'; ?>
