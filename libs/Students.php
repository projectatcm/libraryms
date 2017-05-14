<?php

require_once ('DbConnection.php');

class Students extends DbConnection {

  /*  private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "lms";
    public $connection;

    function __construct() {
        $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to conenct to MySQL: " . mysql_connect_error(), E_USER_ERROR);
        }
    }*/
    public function addStudent($student_id,$name, $branch,$year) {
        $query = "INSERT into students set student_id = '$student_id', name = '$name',branch = '$branch',year_of_join = '$year'";
        $output = $this->setData($query);
        
    }
    public function getStudents($student_id = "") {
        if(empty($student_id)){
          $query = "SELECT * FROM students";
      }else{
        $query = "SELECT * FROM students WHERE student_id='$student_id'";
    }
    $output = $this->getData($query);
    return $output;

}

public function getSemesterByAdmissionYear($year) {
    $presentyear = date("Y");
        $presentmonth = 7; //date("m");
        $completedyears = $presentyear - $year;
        if ($presentmonth >= 6) {
            $sem = $completedyears + 1;
        } else {
            $sem = $completedyears + 2;
        }
        return $sem;
    }

    /* ---------- Department ----------------- */

    public function getDepartmentByName($name) {
        $query = "SELECT * FROM departments WHERE name='$name'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAllDepartments($order = 'ASC') {
        $query = "SELECT * FROM departments ORDER BY id $order";
        $output = $this->getData($query);
        return $output;
    }

    public function getDepartmentById($id) {
        $query = "SELECT * FROM departments WHERE id='$id'";
        $output = $this->getData($query);
        return $output;
    }

    public function updateDepoName($id, $name) {
        $query = "UPDATE departments SET name = '$name' WHERE id = '$id'";
        $output = $this->setData($query);
        return $output;
    }

    /* ---------- Courses ------------------- */

    public function getCoursesByNameAndDepo($name, $depoid) {
        $query = "SELECT * FROM courses WHERE course='$name' AND department='$depoid'";
        $output = $this->getData($query);
        return $output;
    }

    public function getCoursesByDepoId($depoid) {
        $query = "SELECT * FROM courses WHERE department='$depoid'";
        $output = $this->getData($query);
        return $output;
    }

    public function addCourse($department, $coursename, $duration, $allotedseats) {
        $query = "INSERT INTO courses SET department='$department', course ='$coursename', course_duration = '$duration', allotedseats = '$allotedseats'";
        $output = $this->setData($query);
        return $output;
    }

    public function getAllCourses($order = 'ASC') {
        $query = "SELECT * FROM courses ORDER BY course $order";
        $output = $this->getData($query);
        return $output;
    }

    public function getCourseById($id) {
        $query = "SELECT * FROM courses WHERE id='$id'";
        $output = $this->getData($query);
        return $output;
    }

    /* ---------- Students -------------- */

    public function getStudentDataByAdmissionNumber($admissionno) {
        $query = "SELECT * FROM students WHERE admissionnumber = '$admissionno'";
        $output = $this->getData($query);
        return $output;
    }

    public function getStudentDataByEmailId($email) {
        $query = "SELECT * FROM students WHERE email = '$email'";
        $output = $this->getData($query);
        return $output;
    }

    public function getStudentDataBYCourseId($courseid, $order = 'ASC') {
        $query = "SELECT * FROM students WHERE course = '$courseid' ORDER BY name $order";
        $output = $this->getData($query);
        return $output;
    }

    public function getStudentDataBYCourseIdOrderById($courseid, $order = 'ASC') {
        $query = "SELECT * FROM students WHERE course = '$courseid' ORDER BY id $order";
        $output = $this->getData($query);
        return $output;
    }

    public function getStudentsById($id) {
        $query = "SELECT * FROM students WHERE student_id = '$id'";
        $output = $this->getData($query);
        return $output;
    }

    public function getAllStudents() {
        $query = "SELECT * FROM students";
        $output = $this->getData($query);
        return $output;
    }


}

?>