<?php
	session_start();
	$title = "";
	$desc = "";
	$field = "";
	$id = 0;
	$edit_state = false;
	
	$db = mysqli_connect("localhost", "root", "", "experiment");
	if (!$db) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	
	//insertion
	if(isset($_POST['save'])){
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$field = $_POST['field'];
		
		$query = mysqli_query($db, 
			"INSERT INTO record (record_id, title, description, field)
			VALUES (NULL, '".$title."', '".$desc."', '".$field."')");
		$_SESSION['msg'] = "Experiment record saved."; 
		if($query){
		header("location:records.php");
		}else {
		echo "Failed to add product. Contact the web developer for troubleshooting.";
		exit();
		}	
	}
	
	//update
	if(isset($_POST['update'])){
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$field = $_POST['field'];
		$id = $_POST['id'];
		
		mysqli_query($db, "UPDATE record SET title='".$title."', description='".$desc."', field='".$field."' WHERE record_id=".$id);
		$_SESSION['msg'] = "Experiment record updated!";
		header('location:records.php');
	}
	
	//delete
	if(isset($_GET['del'])){
			$id = $_GET['del'];
			mysqli_query($db, "DELETE FROM record WHERE record_id=".$id);  
			$_SESSION['msg'] = "Experiment record deleted!";
			header('location:records.php');
	}
	
	//read
	$results = mysqli_query($db, "SELECT * FROM record");
	
	
?>