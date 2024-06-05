<?php

 
 $id=$_GET['book'];
 $con=mysqli_connect("localhost","root","","attendance");
 $data=$con->query("DELETE FROM `user` WHERE  id=$id");



echo "<script>window.location.href = 'index.php';</script>";




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

</body>
</html>