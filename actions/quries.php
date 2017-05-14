<?php
require_once '../libs/functions.php';
class quries extends DbConnection
{
    public function addcategory($category)
    {
        $query = "insert into category set category = '$category' ";
        return $this->setData($query);
    }
    public function deleteCategory($id) {
        $query = "delete from category where id= '$id'";
        $output = $this->setData($query);
        return $output;
    }
    public function updatecategory($id,$category)
    {
        $query="update category set category='$category' where id = '$id'";
        $output=  $this->setData($query);
        return $output;
    }
    
    public function addbranch($branch)
    {
        $query="insert into branch set branch='$branch'";
        
        $output=  $this->setData($query);
        return $output;
    }
    public function deletebranch($id) 
    {
        $query = "delete from branch where id= '$id'";
        print_r($query);
        exit();
        $output = $this->setData($query);
        return $output;
    }
    public function updatebranch($id,$branch)
    {
        $query="update branch set branch_name='$branch' where id = '$id'";
        $output=  $this->setData($query);
        return $output;
    }
    public function insertstaff($staff_no,$staff_name,$staff_gender,$staff_dob,$staff_year_join,$staff_department,$staff_adrs,$staff_phone,$staff_email)
    {
         $query="insert into staff_dt set "
                 . "staff_qrcode=' '"
                 . ",staff_no='$staff_no'"
                 . ",staff_name='$staff_name'"
                 . ",staff_gender='$staff_gender'"
                 . ",staff_dob='$staff_dob'"
                 . ",staff_history=' '"
                 . ",staff_year_join='$staff_year_join'"
                 . ",staff_department='$staff_department'"
                 . ",staff_adrs='$staff_adrs'"
                 . ",staff_phone='$staff_phone'"
                 . ",staff_email='$staff_email'";
//        print_r($query);
        $output=  $this->setData($query);
        return $output;
    }
    
    public function insertbook($book_no,$book_name,$book_category,$book_language,$book_author,$book_publisher,$book_year_publ,$book_price)
    {
         $query="insert into book_dt set "
                
                
                 . "book_no='$book_no'"
                 . ",book_name='$book_name'"
                 . ",book_category='$book_category'"
                 
                 . ",book_language='$book_language'"
                 . ",book_author='$book_author'"
                 . ",book_publisher='$book_publisher'"
                 . ",book_year_publ='$book_year_publ'"
                 . ",book_price='$book_price' ";
        
        $output=  $this->setData($query);
        return $output;
    }
            
    }

