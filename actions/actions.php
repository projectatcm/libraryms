<?php

require 'quries.php';
require '../libs/Common.php';
$enterdata = new quries();
$common = new Common();
if (!empty($_REQUEST)) 
{

    $action = $_REQUEST['action'];


    if ($action === 'updatecategory') 
    {
        $id = $_POST['categoryid'];
        $category = $_POST['category'];
        $result = $enterdata->updateCategory($id, $category);
        if ($result)
        {
            echo "<script type='text/javascript'>";
            echo "alert('updated');";
            echo "window.location= '../category.php';";
            echo "</script>";
        }
        else
        {
            echo "<script type='text/javascript'>";
            echo "alert('error');";
            echo "window.location= '../category.php';";
            echo "</script>";
        }
    }

    if ($action === 'deletecategory')
    {
        $id = $_POST['deleteid'];
        $result = $enterdata->deleteCategory($id);
        if ($result) 
        {
            echo "<script type='text/javascript'>";
            echo "alert('deleted');";
            echo "window.location= '../category.php';";
            echo "</script>";
        }
        else    
        {
            echo "<script type='text/javascript'>";
            echo "alert('error');";
            echo "window.location= '../category.php';";
            echo "</script>";
        }
    }

    if ($action === 'addcategory')
    {
        $category = $_POST['category'];
        $result = $enterdata->addcategory($category);
        if ($result) 
        {
            echo "<script type='text/javascript'>";
            echo "alert('ok');";
            echo "window.location= '../category.php';";
            echo "</script>";
        }
        else
        {
            printr_r("failed");
        }
    }
    if ($action === 'insertstudent')
    {
        $admission_no = $_POST['admissionno'];
        $name = $_POST['name'];
        $class = $_POST['class'];
        $branch = $_POST['branch'];
        $year_join = $_POST['year_join'];
        $address = $_POST['address'];
        $stud_age = $_POST['studentage'];
        $phone = $_POST['phoneno'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $reserve = $_POST['reserve'];

        $myfile = 'stud_pic';
        $dest = '../images/student/';
        $imgpath = $common->uploads($myfile, $dest);
        if ($imgpath)
        {
            
        }
    }
    
    if ($action === 'insertstaff')
    {
        $staff_no = $_POST['staff_no'];
        $staff_name = $_POST['staff_name'];
        $staff_department = $_POST['staff_department'];
        $staff_year_join = $_POST['staff_year_join'];
        $staff_adrs = $_POST['staff_adrs'];
        $staff_dob = $_POST['staff_dob'];
        $staff_phone = $_POST['staff_phone'];
        $staff_email = $_POST['staff_email'];
        $staff_gender = $_POST['staff_gender'];
        

//        $myfile = 'stud_pic';
//        $dest = '../images/student/';
//        $imgpath = $common->uploads($myfile, $dest);
//        if ($imgpath)
//        {
//            
//        }
        $result=$enterdata->insertstaff($staff_no,$staff_name,$staff_gender,$staff_dob,$staff_year_join,$staff_department,$staff_adrs,$staff_phone,$staff_email);
        if ($result) 
        {
            echo "<script type='text/javascript'>";
            echo "alert(' staff registerd');";
            echo "window.location= '../staff_entry.php';";
            echo "</script>";
        }
        else 
        {
            echo '<script type="text/javascript">';
            echo "alert('failed to insert student')";
            echo "window.location= '../staff_entry.php';";
            echo "</script>";       
        }
        
        }
         if ($action === 'insertbook')
    {
                 $book_no=$_POST['book_no'];
                 $book_name=$_POST['book_name'];
                 $book_category=$_POST['book_category'];
                 
                 $book_language=$_POST['book_language'];
                 $book_author=$_POST['book_author'];
                 $book_publisher=$_POST['book_publisher'];
                 $book_year_publ=$_POST['book_year_publ'];
                 $book_price=$_POST['book_price'];        

//        $myfile = 'stud_pic';
//        $dest = '../images/student/';
//        $imgpath = $common->uploads($myfile, $dest);
//        if ($imgpath)
//        {
//            
//        }
        $result=$enterdata->insertbook($book_no,$book_name,$book_category,$book_language,$book_author,$book_publisher,$book_year_publ,$book_price);
        if ($result) 
        {
            echo "<script type='text/javascript'>";
            echo "alert('book added');";
            echo "window.location= '../book.php';";
            echo "</script>";
        }
        else 
        {
            echo '<script type="text/javascript">';
            echo "alert('failed to add book')";
            echo "window.location= '../book.php';";
            echo "</script>";       
        }
        
        }
        
    if ($action === 'addbranch') 
    {
        $branch = $_POST['branch'];
        $result = $enterdata->addbranch($branch);
        if ($result) 
        {
            echo "<script type='text/javascript'>";
            echo "alert('inserted');";
            echo "window.location= '../branch.php';";
            echo "</script>";
        }
        else 
        {
            echo '<script type="text/javascript">';
            echo "alert('failed')";
            echo "window.location= '../branch.php';";
            echo "</script>";       
        }
    }
if ($action === 'updatebranch')
    {
        $id = $_POST['branchid'];
        $branch = $_POST['branch'];
        $result = $enterdata->updatebranch($id, $branch);
        if ($result)
        {
            echo "<script type='text/javascript'>";
            echo "alert('updated');";
            echo "window.location= '../branch.php';";
            echo "</script>";
        }
        else 
        {
            echo "<script type='text/javascript'>";
            echo "alert('error');";
            echo "window.location= '../branch.php';";
            echo "</script>";
        }
    }
    if ($action === 'deletebranch')
    {
        $id = $_POST['deleteid'];
        $result = $enterdata->deletebranch($id);
        if ($result)            
        {
            echo "<script type='text/javascript'>";
            echo "alert('branch removed');";
            echo "window.location= '../branch.php';";
            echo "</script>";
        }
        else 
        {
            echo "<script type='text/javascript'>";
            echo "alert('error');";
            echo "window.location= '../branch.php';";
            echo "</script>";
        }
    }
     else 
    {
        echo 'no request';
    }
}