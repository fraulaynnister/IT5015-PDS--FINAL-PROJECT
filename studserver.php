<?php 
	//session_start();
	$db = mysqli_connect('localhost', 'root', '', 'experiment');
		if(!$db){
			die("could not connect".mysql_error());
		}

	// initialize variables
	$stud_name = "";
	$group_no = "";
	$id = 0;
	$edit_state = false;

	

	//insert
	if (isset($_POST['save'])) {
		$stud_name = $_POST['stud_name'];
		$group_no = $_POST['group_no'];

		$query = mysqli_query ($db, "INSERT INTO students (stud_name,group_no) VALUES ('".$stud_name."','".$group_no."')") ;
		$_SESSION['msg'] ="Record has been added.";
		//mysqli_query($db,$query); 

		if($query){
			header('location: studrec.php'); //redirect to studrec.php

		}else{
			echo "NO DATA RECORD INSERTED";
		}
		exit();
	}

	//retrieve and display records
	$results = mysqli_query($db, "SELECT * FROM students");

	//update
	if(isset($_POST['update'])){
		$stud_name = $_POST['stud_name'];
		$group_no = $_POST['group_no'];
		$id = $_POST['id'];

		$query = mysqli_query($db, "UPDATE students SET  stud_name='".$stud_name."',  group_no='".$group_no."' WHERE stud_id =".$id);

		$_SESSION['msg'] = "Experiment record has been updated";
		header('location:studrec.php');
	}

	//delete
	if(isset($_GET['del'])){
		$id = $_GET['del'];
		mysqli_query($db,"DELETE FROM students WHERE stud_id=".$id);
		$_SESSION['msg'] = "Experiment record has been deleted";
		header('location:studrec.php');
	}
?>