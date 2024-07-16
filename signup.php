<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Register</title>
</head>
<body>
<?php
$cmiSubmitted  = $_POST['cmiSubmitted'];
if (isset($cmiSubmitted)) 
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];
	    $age=$_POST['age'];
	    $address=$_POST['address'];

            $handler=mysqli_connect("localhost","root","","airline");
            $query1="select * from signup;";
            $result= mysqli_query($handler,$query1);
            $rows=mysqli_num_rows($result);
            if($rows>0)
            {
                while($record=mysqli_fetch_assoc($result))
                {
                    if($record['email']==$email)
                    {
                        echo "<script>alert('you already have an account check once');</script>";
			$count=1;
			break;
                    }
		    else{
			$count=0;
		   }
    
                }
                if($count==0)
		{
                        $query2="insert into signup values ('$email','$password','$username',$age,'$address');";
                        mysqli_query($handler,$query2);
                        $_SESSION['password']=$password;
                        $_SESSION['email']=$email;
			echo "<script>window.location.href = 'index.php';</script>";
                    
                    }
            }
            else{
                $query3="insert into signup values('$email','$password','$username',$age,'$address');";
                mysqli_query($handler,$query3);
		$_SESSION['password']=$password;
                $_SESSION['email']=$email;
                echo "<script> window.open('index.php');</script>";
            }
            
    }
}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
      <div class="container">
        <div class="box form-box">

            <header>Sign Up</header>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" pattern="[a-zA-Z0-9\S]{16}*"/ title="password must contain a capital letter a small letter and one digit and a special character" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="adress">Address</label>
                    <input type="text" name="address" autocomplete="off" required>
                </div>

	        <input type="hidden" name="cmiSubmitted" id="cmiSubmitted" value="1" />
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
    
      </div>
</body>
</html>
