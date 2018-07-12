<?php
	session_start();
	$stud_id = "";
	$record_id = "";
	$grade = "";
	$id = 0;
	$edit_state = false;
	
	$db = mysqli_connect("localhost", "root", "", "experiment");
	if (!$db) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	//insertion
	if(isset($_POST['save'])){
		$stud_id = $_POST['stud_id'];
		$record_id = $_POST['record_id'];
		$grade = $_POST['grade'];
		
		$query = mysqli_query($db, 
			"INSERT INTO grade (stud_id, record_id, grade)
			VALUES ('".$stud_id."', '".$record_id."', '".$grade."')");
		$_SESSION['msg'] = "Grade established."; 
		if($query){
		header("location:grade.php");
		}else {
		$_SESSION['msg'] =  "Something went wrong.Please Check if the student or experiment exist.";
		header("location:grade.php");
		exit();
		}	
	}
	
	//update
	if(isset($_POST['update'])){
		$grade_id= $_POST['grade_id'];
		$stud_id = $_POST['stud_id'];
		$record_id = $_POST['record_id'];
		$grade = $_POST['grade'];
		mysqli_query($db, "UPDATE grade SET stud_id='".$stud_id."', record_id='".$record_id."' ,grade='".$grade."'	 WHERE grade_id='".$grade_id."'");
		$_SESSION['msg'] = "Student Grade Updated!";
		header('location:grade.php');
	}
	
	//delete
	if(isset($_GET['del'])){
			$grade_id= $_GET['del'];
			mysqli_query($db, "DELETE FROM grade WHERE grade_id=".$grade_id);  
			$_SESSION['msg'] = "Student Grade Deleted!";
			header('location:grade.php');
	}
	
	//read
	$results = mysqli_query($db, "SELECT * FROM grade");
	
	
?>