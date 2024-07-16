<html>
<?php
	session_start();
?>
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="icon" type="icon" href="<i class='fa fa-lock'>" style="border-radius:50%">
    <title>Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
body {
    background: rgb(99, 39, 120)
    
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.save{
	   background-color:blue;
   color:white;
}
.save:hover{
   background-color:green;
   color:white;
}
form{
	display:flex;
	flex-direction:column;
}
</style>
</head>
<body>

<?php
$cmiSubmitted  = $_POST['cmiSubmitted'];
if (isset($cmiSubmitted)) 
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $username=$_POST['username'];
            $email=$_SESSION['email'];
            $password=$_POST['password'];
	    $age=$_POST['age'];
	    $address=$_POST['address'];
		
	    $handler=mysqli_connect("localhost","root","","airline");
	    $query1="update signup set username='$username',password='$password',age=$age,address='$address' where email='$email'";
	    mysqli_query($handler,$query1);

	    echo "<script>alert('your data successfully updated');</script>";
		
            
    }
}
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
		<img class="rounded-circle" width="150px" src="assets/profile.jpeg">
		<span class="font-weight-bold">
			<?php
				$email=$_SESSION['email'];
		 		$handler=mysqli_connect("localhost","root","","airline");
				$query1="select * from signup where email='$email';";
				$result= mysqli_query($handler,$query1);
				$record=mysqli_fetch_assoc($result);
				echo $record['username'];
		      ?>
		</span>
		<span class="text-black-50"><?php echo $_SESSION['email'];?>
		</span>
	     	<span> </span>
	    </div>
        </div>
        <div class="col-md-5 border-right">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
    		<div class="col-md-12">
			<label class="labels">Email ID</label>
			<input type="text" name="email" class="form-control" placeholder="New Email Id" value="<?php echo $_SESSION["email"];?>" disabled>
		</div>
                </div>

 		<div class="col-md-6">
			<label class="labels">User Name</label>
			<input type="text" name ="username" class="form-control" placeholder="New Username" value="">
		</div>
		<div class="col-md-12">
			<label class="labels">Age</label>
			<input type="number" name="age" class="form-control" placeholder="New age" value="">
		</div>
                <div class="row mt-3">
                    <div class="col-md-12">
			<label class="labels">Password</label>
			<input type="password" name="password" class="form-control" placeholder="New contact No" value="">
		    </div>
		</div>
	        <input type="hidden" name="cmiSubmitted" id="cmiSubmitted" value="1" />
                <div class="col-md-12">
			<label class="labels">Address </label>
			<input type="text" name="address" class="form-control" placeholder="New Adress" value="">
		</div>
                <div class="mt-5 text-center p-3 col-md-12 " style="align-items:center;width:150px">
			<input type="submit" class="form-control save"  value="SAVE" >
		</div>
                
            </form>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
