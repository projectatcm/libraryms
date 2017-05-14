<?php
require_once 'DbConnection.php';

class Book extends DbConnection{

public function deleteById($table, $id) {

        $query = "DELETE FROM $table WHERE id='$id'";
        $output = $this->setData($query);
        return $output;
    }

	public function getBookCategories($category_id = ""){
		if($category_id == ""){
			$query = "SELECT * FROM category";
		}else{
			$query = "SELECT * FROM category where id = '$category_id'";
		}
		return $this->getData($query);
	}
	public function addBook($title,$author,$category,$image,$publication,$publication_year,$rack_no,$price){
		$query = "INSERT INTO book set title = '$title',author = '$author',category = '$category',image = '$image',publication = '$publication',publication_year = '$publication_year',rack_no = '$rack_no',price = '$price'";
		return $this->setData($query);

	}

    public function addBookIds($book_id,$sub_id){
        $query = "INSERT INTO book_ids set book_id = '$book_id',sub_id = '$sub_id'";
        return $this->setData($query);

    }
    public function getBookIds($book_id){
        $query = "SELECT * FROM book_ids where book_id = '$book_id'";
        return $this->getData($query);
    }
    public function getBookIdBySubId($sub_id){
          $query = "SELECT * FROM book_ids where sub_id = '$sub_id'";
        return $this->getData($query);
    }




public function getBookDataFromBookId($book_id){
     $query = "SELECT book_id FROM book_ids where sub_id = '$book_id'";
      $book_id =  $this->getData($query)[0]['book_id'];
      return $this->getBooks($book_id);
}

	public function getBooks($book_id = ""){
        if($book_id == ""){
            $query = "SELECT * FROM book order by id desc";
        }else{
            $query = "SELECT * FROM book where id = '$book_id'";
        }
        return $this->getData($query);
    }
    public function getNewBooks(){
            $query = "SELECT * FROM book order by id desc limit 0,10";
        return $this->getData($query);
    }
    public function getBookInfo($id){
		$query = "SELECT * FROM book where id = '$id'";
		return $this->getData($query);
	}

    public function addbookcategory($categoryname) {
        $query = "INSERT INTO category SET name='$categoryname'";
        $output = $this->setData($query);
        return $output;
    }

    public function selectCategoryByName($categoryname) {
        $query = "SELECT * FROM category WHERE name='$categoryname'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAllBookCategories() {
        $query = "SELECT * FROM category order by name DESC";
        $output = $this->getData($query);
        return $output;
    }

    public function getBookCategoryByid($id) {
        $query = "SELECT * FROM category WHERE id = '$id'";
        $output = $this->getData($query);
        return $output;
    }

    public function updateBookCategory($id, $name) {
        $query = "UPDATE category SET name = '$name' WHERE id = $id";
        $output = $this->setData($query);
        return $output;
    }

    public function getLendBookCount($book_id){
        $book_data = $this->getBooks($book_id);
        $query = "SELECT count(*) as count from lend_student where book_id = '$book_id' AND return_date = ''";
        $lend_count = $this->getData( $query);
        return $lend_count;
    }


        public function retunBook($bookid,$date){
            $query = "Update lend_student SET return_date='$date' WHERE book_id = '$bookid'";
            $output = $this->setData($query);
            return $output;
        }

		public function setLendData($bookid,$studentid,$date){
			$query = "INSERT INTO lend_student SET book_id='$bookid', student_id='$studentid', lend_date='$date'";
			$output = $this->setData($query);
			return $output;
		}

        public function getLendData($book_id){
        $query = "SELECT * FROM lend_student WHERE book_id = '$book_id' and return_date IS NULL";
        $output = $this->getData($query);
        return $output;
        }
         public function getLendHistory(){
            $query = "SELECT * FROM lend_student order by lend_date DESC";
        $output = $this->getData($query);
        return $output;
        }

}
