<html>
<?php
	session_start();
?>
<head>
<title>Profile</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
* {
    margin: 0;
    padding: 0
}

body {
    background-color: #000

}

.card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
.edit:hover{
	background-color:blue;
	color:white;
}
.logout{
	background-color:blue;
	color:white;
	padding:5px;
	border-radius:5px;
	text-decoration:none;

}
.logout:hover{
	background-color:red;
	color:white;
}

</style>
</head>
<body>
<div class="container mt-5 mb-4 p-5 d-flex justify-content-center"> 
	<div class="card p-4"> <div class=" image d-flex flex-column justify-content-center align-items-center">
		<button class="btn btn-secondary"> 
			<img src="assets/profile.jpeg" style="border-radius:50%"; height="100" width="100" />
		</button> 
		<span class="name mt-3"><?php
			$email=$_SESSION['email'];
	 		$handler=mysqli_connect("localhost","root","","airline");
		        $query1="select * from signup where email='$email';";
		        $result= mysqli_query($handler,$query1);
			$record=mysqli_fetch_assoc($result);
			echo $record['username']
		      ?></span> 
		<span class="idd"><?php echo $_SESSION['email'];?></span>

		<div class=" d-flex mt-2"> 
			<a href="update.php"><button class="btn1 btn-dark edit">Edit Profile</button></a>
		</div> 
		<div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
			<span><i class="fa fa-twitter"></i></span> 
			<span><i class="fa fa-facebook-f"></i></span> 
			<span><i class="fa fa-instagram"></i></span> 
			<span><i class="fa fa-linkedin"></i></span> 
		</div> 
		<div class=" px-2 rounded mt-4"> 
			<a href="delete.php" target="self"><button class="logout">LOG OUT</button></a>
		</div> 
	</div> 

</div>
</body>

</html>
