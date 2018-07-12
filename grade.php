<?php include ('recordserver.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Expirement Records</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="post" action="server.php" >
		<div class="input-group">
			<label>Grade</label>
			<input type="text" name="title" value="">
		</div>
		
		<div class="input-group">
			<button class="btn" type="submit" name="save" >Save</button>
		</div>


	</form>
</body>
</html>