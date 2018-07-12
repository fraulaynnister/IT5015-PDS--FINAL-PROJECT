<?php include ('server.php'); 
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
	</style>
</head>
<body background="img/bg.png">


	<form method="post" action="server.php" >
		<center> <h1>EXPERIMENTS RECORD</h1></center>
		<div class="input-group">
			<label>Title</label>
			<input type="text" name="title" value="">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="desc" value="">
		</div>
		<div class="input-group">
			<label>Field</label>
			<input type="text" name="field" value="">
		</div>
		<div class="input-group">
			<center> <button class="btn" type="submit" name="save" >Save</button></center>
		</div>


	</form>
</body>
</html>