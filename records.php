<?php include ('recordserver.php'); 
	
	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$edit_state = true;
		$rec =  mysqli_query($db, "SELECT * FROM record WHERE record_id = ".$id);
		$record = mysqli_fetch_array($rec);
		$title = $record['title'];
		$desc = $record['description'];
		$field = $record['field'];
		$id = $record['record_id'];
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

	
	<form method="POST" action="recordserver.php" enctype='multipart/form-data'>
		<center> <h1>EXPERIMENTS RECORD</h1></center>
		<input type="hidden" name="id" value="<?php echo $id; ?>"> 
		<div class="input-group">
			<label>Title</label>
			<input name="title" type="text" value="<?php echo $title; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input name="desc" type="text" value="<?php echo $desc; ?>">
		</div>
		<div class="input-group">
			<label>Field</label>
			<input name="field"  type="text" value="<?php echo $field; ?>">
		</div>
		<div class="input-group">
			<?php if($edit_state == false): ?>
			<center> <button name="save" class="btn" type="submit" >Save</button></center>
			<?php else: ?>
			<center> <button name="update" class="btn" type="submit" >Update</button></center>
			<?php endif?>
			
		</div>
	</form>

	<div class="container">
		<div class="row">
			<div class ="col-6 col-md-4">
				<table>
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>Field</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = mysqli_fetch_array($results)){ ?>
						<tr>
							
							<td><?php echo $row['title'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td><?php echo $row['field'] ?></td>
							<td>
								<a class="edit_btn" href="records.php?edit=<?php echo $row['record_id']; ?>">Edit</a>
							</td>
							<td>
								<a class="del_btn" href="recordserver.php?del=<?php echo $row['record_id']; ?>">Delete</a>
							</td>
						</tr>	
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	
</body>
</html>