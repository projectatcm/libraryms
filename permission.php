<?php
include './includes/header.php';
require_once './libs/Admin.php';
require_once './libs/Mail.php';
include 'libs/flash.php';
$admin = new Admin();
$alldepartments = $admin->getalldepartments();
//print_r($alldepartments);
$mail = new Mail();
$staff_data = $admin->getAllStaff();
?>
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <h4 class="title text-center">Permissions</h4>
        </div>
        <div class="content">

            <table class="table table-striped custab">
                <thead>
                    <a href="staff_entry.php" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new Staff</a>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email ID</th>
                        <th>Phone</th>
                        <th class="text-center"></th> 
                        <th class="text-center"></th> 
                    </tr>
                </thead>
                <?php foreach ($staff_data as $staff){
                        $departmentData = $admin->getdepartmentByid($staff['department']);
                    @$department_name = $departmentData[0]['name'];
                    $permission = $admin->checkPermission($staff['staff_id']);

                    ?>
                    <tr>
                        <td>#</td>
                        <td class="text-capitalize"><?=$staff['name']?></td>
                        <td><?=$department_name?></td>
                        <td><?=$staff['email'];?></td>
                        <td><?=$staff['phone'];?></td>
                        <td class="text-center">
                            <?php if (empty($permission)): ?>
                             <a class='btn btn-primary btn-xs' href="actions.php?id=<?=$staff['staff_id']?>&action=add_permission" onclick="javascript:if(!confirm('Are you sure')) return false"><span class="glyphicon glyphicon-edit"></span> ADD PERMISSION  </a> 
                         <?php else: ?>
                              <a class='btn btn-warning btn-xs' href="actions.php?id=<?=$staff['staff_id']?>&action=remove_permission" onclick="javascript:if(!confirm('Are you sure')) return false"><span class="glyphicon glyphicon-edit"></span> REMOVE PERMISSION  </a> 
                         <?php endif;?>
                         <a href="#" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span> </a></td>
                     </tr>  
                     <?php } ?>


                 </table>
             </div>
         </div>
     </div>


     <?php include './includes/footer.php'; ?>
