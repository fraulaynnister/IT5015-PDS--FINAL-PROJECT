<?php include ('gradeServer.php'); 
	
	if(isset($_GET['edit'])){
		$grade_id = $_GET['edit'];
		$edit_state = true;
		$grd =  mysqli_query($db, "SELECT * FROM grade WHERE grade_id = ".$grade_id);
		$grades = mysqli_fetch_array($grd);
		$stud_id = $grades['stud_id'];
		$record_id = $grades['record_id'];
		$grade = $grades['grade'];
		$grade_id = $grades['grade_id'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
	<title>Experiment Records</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		form{
			background-color:#d3f1fd;
		}
		h1{
			color: black;
			font-family: 'Architects Daughter';
		}
		label{
			font-family: 'Architects Daughter';
		}	
		th{
			font-family: 'Architects Daughter';
		}
		tr{
			font-family: 'Architects Daughter';
		}
		.row {
    		padding: 10px;
		}
		.col-6,.col-md-4{
			background-color:#d3f1fd;
			border: 1px solid #bbbbbb; 
   			border-radius: 5px;
   			width: 47.5%;
   			margin-left: 26.1%;
		}
	</style>
</head>
<body background="img/bg.png">

<?php if(isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		?>
	</div>
<?php endif ?>

	
	<form action="gradeServer.php" method="post" >
		<input type="hidden" name="grade_id" value="<?php echo $grade_id; ?>">
		<center> <h1> Students Grade</h1></center>
		<div class="input-group">
			<label>Student ID</label>
			<input type="text" name="stud_id"  value="<?php echo $stud_id; ?>">
		</div>
		<!---------------------------------------------------------------------------->
		<div class="input-group">
			<label>Record ID</label>
			<input type="text" name="record_id" value="<?php echo $record_id; ?>" >
		</div>
		<!---------------------------------------------------------------------------->
		<div class="input-group">
			<label>Grade</label>
			<input type="text" name="grade" value="<?php echo $grade; ?>" >
		</div>
		<!---------------------------------------------------------------------------->
		<div class="input-group">
			<?php if($edit_state == false) :?>
					<center> <button class="btn" type="submit" name="save" >Save</button></center>
			<?php else : ?>
				<center> <button class="btn" type="submit" name="update" >Update</button></center>
			<?php endif?>	
			
		</div>
		<!---------------------------------------------------------------------------->
	</form>

	<div class="container">
		<div class="row"></div>
			<div class ="col-6 col-md-4">
				<table>
			<thead>
				<tr>
					<th>Student ID</th>
					<th></th>
					<th>Record ID</th>
					<th></th>
					<th>Grade</th>
					<th colspan ="2">Action</th> 
				</tr>
			</thead>
			<tbody>
				<?php while ($row = mysqli_fetch_array($results)){ ?>

					<tr>
						<td><?php echo $row['stud_id']; ?> </td>
						<td></td>
						<td><?php  echo $row['record_id']; ?> </td>
						<td></td>
						<td><?php  echo $row['grade']; ?> </td>
						<td>
							<a class="edit_btn" href="grade.php?edit=<?php echo $row['grade_id'] ?> ">Edit</a>
						</td>

						<td>
							<a class="del_btn" href="gradeServer.php?del=<?php echo $row['grade_id']; ?>">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		</div>	
	</div>
	
</body>
</html>
<script src="js/jquery.min.js"></script>
