<html>
<?php
	session_start();
?>
<head>
</head>
<body>
<?php
	$email=$_SESSION['email'];
	$handler=mysqli_connect("localhost","root","","airline");
	$query1="delete from signup where email='$email';";
	mysqli_query($handler,$query1);
        echo "<script> window.open('login.php');</script>";
?>
</body>
</html>
