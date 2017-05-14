<?php

require_once ('DbConnection.php');

class Functions extends DbConnection {
    /*---------------admin-------------*/
 public function loginCheck($username,$password) {
        $query = "SELECT * FROM admin WHERE username = '$username' and password='$password'";
        $output = $this->getData($query);
        return $output;
    }
    /* ---------------------------- Common ----------------------------- */

    //for changing theme
    public function colorchange($color){
        
    }






    public function deleteById($table, $id) {

        $query = "DELETE FROM $table WHERE id='$id'";
        $output = $this->setData($query);
        return $output;
    }

    /* ---------------------------Staff-------------------------- */

    public function addStaff($staffid,$name,$nameid,$dob,$address,$yearjoin,$phone,$email) {
        $query = "INSERT INTO staff SET staffid='$staffid',"."name='$name'," ."nameid='$nameid',". "  dob='$dob'," . "  address='$address'," ."yearjoin='$yearjoin',"."  phone='$phone'," . "  email='$email'" ;
        
        $output = $this->setData($query);
        return $output;
    }

    /* ------------------Book Categories--------------------------- */

    public function addbookcategory($categoryname) {
        $query = "INSERT INTO category SET categoryname='$categoryname'";
        $output = $this->setData($query);
        return $output;
    }

    public function selectCategoryByName($categoryname) {
        $query = "SELECT * FROM category WHERE categoryname='$categoryname'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAllcategory() {
        $query = "SELECT * FROM category";
        $output = $this->getData($query);
        return $output;
    }

    public function getBookCategoryByid($id) {
        $query = "SELECT * FROM category WHERE id = '$id'";
        $output = $this->getData($query);
        return $output;
    }

    public function updateBookCategory($id, $name) {
        $query = "UPDATE category SET categoryname = '$name' WHERE id = $id";
        $output = $this->setData($query);
        return $output;
    }

    /* ------------------ name --------------------------- */

    public function addname($name) {
        $query = "INSERT INTO name SET name='$name'";
        $output = $this->setData($query);
        return $output;
    }

    public function selectnameByName($name) {
        $query = "SELECT * FROM name WHERE name='$name'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAllnames() {
        $query = "SELECT * FROM name";
        $output = $this->getData($query);
        return $output;
    }

    public function getnameByid($id) {
        $query = "SELECT * FROM name WHERE id = '$id'";
        $output = $this->getData($query);
        return $output;
    }

    public function updatename($id, $name) {
        $query = "UPDATE name SET name = '$name' WHERE id = $id";

        $output = $this->setData($query);
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

    /* ------------------Book--------------------------- */

    public function getbookByTitleAuthorCategoryPublicationYear($title, $author, $category, $publication, $publicationyear) {
        $query = "SELECT * FROM book WHERE title='$title' AND author='$author' AND category='$category' AND publication='$publication' AND publication_year='$publicationyear'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAllbook() {
        $query = "SELECT * FROM book order by id desc";
        $output = $this->getData($query);
        return $output;
    }

    public function getBookById($id) {
        $query = "SELECT * FROM book WHERE id='$id'";
        $output = $this->getData($query);
        return $output;
    }
public function getBookByBookId($book_id) {
        $query = "SELECT * FROM book WHERE book_id='$book_id'";
        $output = $this->getData($query);
        return $output;
    }

  /*  public function addbook($book_id,$title, $author, $category, $coverimage, $price, $publication, $publicationyear, $rackno, $reserve,$no_of_book) {
        $query = "Insert into book set book_id = '$book_id',title = '$title', author = '$author',categoryid= '$category',coverimage = '$coverimage',price	= '$price', publication = '$publication', publicationyear = '$publicationyear',rackno='$rackno',reserve='$reserve',no_of_book = '$no_of_book'";
        $output = $this->setDataAndReturnLastInsertId($query);
        return $output;
    }*/

    public function addbookubId($bookid, $bookubid) {
        $query = "Insert into bookubid set bookid 		= '$bookid',"
                . "                     bookubid = '$bookubid'";
        $output = $this->setData($query);
        return $output;
    }
    public function addfine($memberid,$bookid,$date,$amount,$remark)
    {
        $query="Insert into fine set memberid='$memberid',"."bookid='$bookid',"."date='$date',"."amount='$amount',"."remark='$remark'";
//        print_r($query);
        $output= $this->setDataAndReturnLastInsertId($query);
        return $output;
        
        
    }


//fine dispaly
      public function getAllfines() {
        $query = "SELECT * FROM fine ";
        $output = $this->getData($query);
        return $output;
    }
}

?>
