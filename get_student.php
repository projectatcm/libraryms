<?php
session_start();
require_once 'libs/Students.php';
$student = new Students();
$student_id = $_GET['student'];
$studData = $student->getStudents($student_id);
$studentInfo = array();
if(!empty($studData)){
	$studData = $studData[0];
	$student_id = $studData['student_id'];
	$name = $studData['name'];
	$year = $studData['year_of_join'];
	$branch = $studData['branch'];

$studentInfo = array(
	"id" => $student_id,
	"name" => ucfirst($name),
	"branch" => $branch,
	"year" => $year,
	);
}


echo json_encode($studentInfo);
