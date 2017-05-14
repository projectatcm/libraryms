<?php
session_start();
require './libs/Admin.php';
require './libs/Mails.php';
require './libs/Common.php';
require './libs/Students.php';
require './libs/Book.php';
require './libs/Mail.php';
$admin = new admin();
$mails = new Mails();
$common = new Common();
$students = new Students();
$book = new Book();
$mail = new Mail();
if (!empty($_REQUEST)) {
  $action = $_REQUEST['action'];

  if($action == "login"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $log = $admin->loginCheck($username,$password);
    if(!empty($log)){
      $type = $log[0]['type'];

      $_SESSION['lms_log'] = true;
      $_SESSION['lms_log_type'] = $type;
      if($type == "admin"){
        $fine_data = $admin->getFine();
        if(empty($fine_data)){
         header("location:fine.php");
       }else{
         header("location:home.php");
       }
     }

   }else{
    echo '<script>'.
    'alert("Username or Password Error\nPleae try again");'.
    'history.back(-1);'.
    '</script>';
  }
}
if($action == "logout"){

  unset($_SESSION['lms_log']);
  header("location:index.php");

}
/*---------------------------- Book Category --------------------------*/
if($action === 'addbookcategory'){
  $category = $_POST['categoryname'];
  $checking = $book->selectCategoryByName($category);
  if(empty($checking)){
    $result = $book->addBookCategory($category);
    if($result){
      echo '<script type="text/javascript">';
      echo 'alert("Book Category Added");';
      echo 'window.location="./bookcategories.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
      echo 'window.location="./bookcategories.php";';
      echo '</script>';
    }
  }
  else{
    echo '<script type="text/javascript">';
    echo 'alert("Book Category Already Added");';
    echo 'window.location="./index.php";';
    echo '</script>';
  }
}


if($action === 'deleteBookCategory'){
  $id = $_POST['categoryid'];
  print_r($id);

  $table = 'category';
  $result = $book->deleteById($table,$id);
  echo '<script type="text/javascript">';
  echo 'alert("Book Category deleted");';
  echo 'window.location="./bookcategories.php";';
  echo '</script>';

}
if($action === 'editBookCategory') {
  $id =  $_POST['categoryid'];
  $name = $_POST['categoryname'];
  $result = $book->updateBookCategory($id,$name);
  echo '<script type="text/javascript">';
  echo 'alert("Book Category updated");';
  echo 'window.location="./bookcategories.php";';
  echo '</script>';
}

  //add department
if($action === 'add_department'){
  $department = $_POST['department'];
  $checking = $admin->selectdepartmentByName($department);
  if(empty($checking)){
    $result = $admin->add_department($department);
    if($result){
      echo '<script type="text/javascript">';
      echo 'alert("Department Added");';
      echo 'window.location="add_department.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
      echo 'window.location="add_department.php";';
      echo '</script>';
    }
  }
  else{
    echo '<script type="text/javascript">';
    echo 'alert("departmentname Already Added");';
    echo 'window.location="./index.php";';
    echo '</script>';
  }
}

  //edit department
if($action === 'editdepartment') {
  $id =  $_POST['departmentid'];
  $name = $_POST['departmentname'];
  $result = $admin->updatedepartment($id,$name);
  echo '<script type="text/javascript">';
  echo 'alert("department name updated");';
  echo 'window.location="add_department.php";';
  echo '</script>';

}

  //delete department
if($action === 'deletedepartment'){
  $id = $_POST['departmentid'];


  $table = 'department';
  $result = $admin->deleteById($table,$id);

  echo '<script type="text/javascript">';
  echo 'alert("department name deleted");';
  echo 'window.location="add_department.php";';
  echo '</script>';

}

/*---------------------Branch----------------------------*/
//add branch
if($action === 'addbranch'){
  $branch = $_POST['branch'];
  $checking = $admin->selectbranchByName($branch);
  if(empty($checking)){
    $result = $admin->addbranch($branch);
    if($result){
      echo '<script type="text/javascript">';
      echo 'alert("branch Added");';
      echo 'window.location="branch.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
      echo 'window.location="branch.php";';
      echo '</script>';
    }
  }
  else{
    echo '<script type="text/javascript">';
    echo 'alert("departmentname Already Added");';
    echo 'window.location="./index.php";';
    echo '</script>';
  }
}

  //edit branch
if($action === 'editbranch') {
  $id =  $_POST['branchid'];
  $name = $_POST['branchname'];
  $result = $admin->updatebranch($id,$name);
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Branch name updated");';
    echo 'window.location="branch.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="branch.php";';
    echo '</script>';
  }
}

  //delete branch
if($action === 'deletebranch'){
  $id = $_POST['branchid'];


  $table = 'Branch';
  $result = $admin->deleteById($table,$id);
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("branch name deleted");';
    echo 'window.location="branch.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="branch.php";';
    echo '</script>';
  }
}

/*-------------------Staff----------------------------*/
if($action === 'addstaff')
{
  $name=$_POST['name'];
  $staffid=$_POST['staffid'];
  $yearjoin=$_POST['yearjoin'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $dob=$_POST['dob'];
  $departmentid=$_POST['departmentid'];
  $result = $admin->addStaff($staffid,$name,$departmentid,$dob,$address,$yearjoin,$phone,$email);
  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Staff successfully added");';
    echo 'window.location="staff_entry.php";';
    echo '</script>';
  }
  else
  {
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window location="staff_entry.php";';
    echo '</script>';
  }
}

/*--------------------- BOOKS -------------------------*/

if($action === 'addbooks') {
  $book_id = $_POST['bookid'];
  $no_of_books = $_POST['booknumber'];
  $title = $_POST['booktitle'];
  $author = $_POST['bookauthor'];
  $category = $_POST['bookcategory'];
  $price = $_POST['bookprice'];
  $publication = $_POST['bookpublication'];
  $publicationyear = $_POST['bookpublicationyear'];
  $rackno =  $_POST['rackno'];
  $reserve=$_POST['reserve'];
  $imagefile = 'bookcover';
  $dest = './assets/img/books/covers/';
  $checking = $admin->getBooksByTitleAuthorCategoryPublicationYear($title,$author,$category,$publication,$publicationyear);
  if(empty($checking)) {
    $coverimage = $common->uploads($imagefile, $dest);
    if($coverimage){
      $result = $admin->addBooks($book_id,$title,$author,$category,$coverimage,$price,$publication,$publicationyear,$rackno,$reserve,$no_of_books);
      if($result[0]){
        $bookid = $result[1];
        for($i=0;$i<$bookcount;$i++){

          $titlename = substr($title, 0 , 2);
          $titlename = strtolower($titlename);
          $booksubid = $titlename.'_'.$i;
          $addsubid = $admin->addBookSubId($bookid,$booksubid);
        }
        echo '<script type="text/javascript">';
        echo 'alert("Book added");';
      //  echo 'window.location="./addbooks.php";';
        echo '</script>';
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Error");';
    //  echo 'window.location="./addbooks.php";';
        echo '</script>';
      }
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Cover image upload error");';
      echo 'window.location="./addbooks.php";';
      echo '</script>';
    }
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Already Added Book");';
    echo 'window.location="./addbooks.php";';
    echo '</script>';
  }
}

  //add fine
if($action === 'addfine') {
  $memberid = $_POST['memberid'];
  $bookid = $_POST['bookid'];
  $date = $_POST['date'];
  $amount = $_POST['amount'];
  $remark = $_POST['remark'];

  $result = $admin->addfine($memberid,$bookid,$date,$amount,$remark);
  if($result[0]){

    echo '<script type="text/javascript">';
    echo 'alert("fine Recieved");';
    echo 'window.location="fine.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="fine.php";';
    echo '</script>';
  }
}


if($action === 'addbooklend') {

  $bookid = $_POST['lend_bookid'];
  $studentid = $_POST['lend_studentid'];
  $book_data= $book->getLendData($bookid);

  $date=date("Y-m-d");
  if(!empty($book_data)){
   echo '<script type="text/javascript">';
   echo 'alert("Already Lended");';
   echo 'window.location="lend.php";';
   echo '</script>';
 }else{
  $result= $book->setLendData($bookid,$studentid,$date);

  if($result){
    echo '<script type="text/javascript">';
    echo 'alert("Lended");';
    echo 'window.location="lend.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="lend.php";';
    echo '</script>';
  }
}

}


if($action === 'retrunBook') {

  $bookid = $_POST['lend_bookid'];
  $date=date("Y-m-d");
  $book_data= $book->getLendData($bookid);

  if(empty($book_data)){
   echo '<script type="text/javascript">';
   echo 'alert("Book not lended yet");';
   echo 'window.location="home.php";';
   echo '</script>';
 }else{
  $result= $book->retunBook($bookid,$date);

  echo '<script type="text/javascript">';
  echo 'alert("Returned");';
  echo 'window.location="home.php";';
  echo '</script>';
}

}

if($action === 'add_permission') {
  $staff_id = $_GET['id'];
  $password = substr(md5(uniqid(rand(), true)),1,6);
  $staff_data = $admin->getStaffByID($staff_id);
  $email = $staff_data[0]['email'];
  $name = $staff_data[0]['name'];
  $mail->sendVerificationMail($name,$email,$staff_id,$password);
  $admin->add_permission($staff_id,$password);
  echo '<script type="text/javascript">';
  echo 'alert("Action Completed");';
  echo 'window.location="permission.php";';
  echo '</script>';
}
if($action === 'remove_permission') {
  $staff_id = $_GET['id'];
  $admin->remove_permission($staff_id);
  echo '<script type="text/javascript">';
  echo 'alert("Action Completed");';
  echo 'window.location="permission.php";';
  echo '</script>';
}
if($action === 'updateFine') {
 $amount = $_POST['amount'];
 $days = $_POST['days'];
 $admin->updateFine($amount,$days);
 echo '<script type="text/javascript">';
 echo 'alert("Action Completed");';
 echo 'window.location="home.php";';
 echo '</script>';
}



/*-----------student--------*/
if($action == "addstudent"){
  $year = $_POST['year'];
  $branch = $_POST['branch'];
  $file = $_FILES['file'];
  $file_path = $file['tmp_name'];
  $myfile = fopen($file_path, "r");

  while(!feof($myfile)) {
    $line = fgets($myfile);
    $line_split = array_values(array_filter(explode(" ",$line)));
    if(!empty($line_split)){
      $reg_no = $line_split[0];
      $name = $line_split[1];
      $stud_data = $students->getStudents($reg_no);
      if(empty($stud_data)){
        $students->addStudent($reg_no,$name,$branch,$year);
      }
    } 
    echo '<script type="text/javascript">';
    echo 'alert("Action Completed");';
    echo 'window.location="home.php";';
    echo '</script>';
  }
  fclose($myfile);

}




}
