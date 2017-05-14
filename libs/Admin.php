<?php
require_once 'DbConnection.php';

class Admin extends DbConnection{
 public function loginCheck($username,$password) {
        $query = "SELECT * FROM admin WHERE username = '$username' and password='$password'";
        $output = $this->getData($query);
        return $output;
    }
public function deleteById($table, $id) {

        $query = "DELETE FROM $table WHERE id='$id'";
        $output = $this->setData($query);
        return $output;
    }
    /* ------------------ staff --------------------------- */   
    public function addStaff($staffid,$name,$departmentid,$dob,$address,$yearjoin,$phone,$email) {
        $query = "INSERT INTO staff SET staff_id='$staffid',"."name='$name'," ."department='$departmentid',". "  dob='$dob'," . "  address='$address'," ."year_of_join='$yearjoin',"."  phone='$phone'," . "  email='$email'" ;
        $output = $this->setData($query);
        return $output;
    }
public function getAllStaff() {
        $query = "SELECT * FROM staff ";
        $output = $this->getData($query);
        return $output;
    }
    public function updateFine($amount,$days) {
        $fineData = $this->getFine();
        if(empty($fineData)){
            $query = "INSERT into fine set amount = '$amount',days = '$days'";
        }else{
            $query = "UPDATE fine set amount = '$amount',days = '$days'";
        }
        $output = $this->setData($query);
        return $output;
    }
    public function getFine() {
        $query = "select * from fine";
        $output = $this->getData($query);
        return $output;
    }
public function getStaffByID($id) {
        $query = "SELECT * FROM staff where staff_id = '$id'";
        $output = $this->getData($query);
        return $output;
    }
public function add_permission($username,$password) {
        $query = "insert into admin set username = '$username', password = '$password'";
        $output = $this->setData($query);
        return $output;
    }
    public function remove_permission($username) {
        $query = "delete from admin where username = '$username'";
        $output = $this->setData($query);
        return $output;
    }
    public function checkPermission($username) {
        $query = "select * from admin where username = '$username'";
        $output = $this->getData($query);
        return $output;
    }
    /* ------------------ department --------------------------- */

    public function adddepartment($department) {
        $query = "INSERT INTO department SET name='$department'";
        $output = $this->setData($query);
        return $output;
    }

    public function selectdepartmentByName($name) {
        $query = "SELECT * FROM department WHERE name='$name'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAlldepartments() {
        $query = "SELECT * FROM department";
        $output = $this->getData($query);
        return $output;
    }

    public function getdepartmentByid($id) {
        $query = "SELECT * FROM department WHERE id = '$id'";
        $output = $this->getData($query);
        return $output;
    }

    public function updatedepartment($id, $name) {
        $query = "UPDATE department SET name = '$name' WHERE id = $id";

        $output = $this->setData($query);
        return $output;
    }

    /* ------------------ branch --------------------------- */

    public function addbranch($branch) {
        $query = "INSERT INTO branch SET Branch='$branch'";
        $output = $this->setData($query);
        return $output;
    }

    public function selectbranchByName($name) {
        $query = "SELECT * FROM branch WHERE Branch='$name'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAllbranchs() {
        $query = "SELECT * FROM Branch";
        $output = $this->getData($query);
        return $output;
    }

    public function getbranchByid($id) {
        $query = "SELECT * FROM Branch WHERE id = '$id'";
        $output = $this->getData($query);
        return $output;
    }

    public function updatebranch($id, $name) {
        $query = "UPDATE branch SET Branch = '$name' WHERE id = $id";

        $output = $this->setData($query);
        return $output;
    }





}
