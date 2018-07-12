
<?php include('studserver.php');

	//fetch the record to be updated
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db,"SELECT * FROM students WHERE stud_id =".$id);
		$record = mysqli_fetch_array($rec);
		$stud_name = $record['stud_name'];
		$group_no = $record['group_no'];
		$id = $record['stud_id'];	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link href='https://fonts.googleapis.com/css?family=Architects Daughter' rel='stylesheet'>
	<title>Expirement Records</title>
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
  

		}
		.col-6,.col-md-4{
			padding: 10px;
    		background-color:#d3f1fd;
			border: 1px solid #bbbbbb; 
   			border-radius: 5px;
   			width: 47.5%;
   			margin-left: 26.5%;
		}
	</style>
</head>
<body background="img/bg.png">

<?php if(isset($_SESSION['msg'])): ?>
		<div class ="msg">
			
		<?php
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
		</div>
<?php endif ?>

	<form action="studserver.php" method="post" >
		<input type="hidden" name="id" value="<?php echo $id?>">
		<center> <h1> STUDENTS RECORD</h1></center>
		<div class="input-group">
			<label>Student Name</label>
			<input type="text" name="stud_name"  value="<?php echo $stud_name ?>">
		</div>
		<div class="input-group">
			<label>Group Number</label>
			<input type="text" name="group_no" value="<?php echo $group_no?>" >
		</div>
		<div class="input-group">
			<?php if($edit_state == false) :?>
					<center> <button class="btn" type="submit" name="save" >Save</button></center>
			<?php else : ?>
				<center> <button class="btn" type="submit" name="update" >Update</button></center>
			<?php endif?>	
			
		</div>
	</form>
	<div class="container">
		<div class="row"></div>
			<div class ="col-6 col-md-4">
				<table>
			<thead>
				<tr>
					<th>Student Name</th>
					<th>Group Number</th>
					<th colspan ="2">Action</th> 
				</tr>
			</thead>
			<tbody>
				<?php while ($row = mysqli_fetch_array($results)){ ?>

					<tr>
						<td><?php echo $row['stud_name']; ?> </td>
						<td><?php  echo $row['group_no']; ?> </td>
						<td>
							<a class="edit_btn" href="studrec.php?edit=<?php echo $row['stud_id'] ?> ">Edit</a>
						</td>

						<td>
							<a class="del_btn" href="studserver.php?del=<?php echo $row['stud_id']; ?>">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		</div>
	</div>
		

		
</body>
</html>