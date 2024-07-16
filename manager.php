<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>

<?php

$bmiSubmitted  = $_POST['bmiSubmitted'];
if (isset($bmiSubmitted)) 
{
    $passwordErr="";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
                $email=$_POST['email'];
                $password=$_POST["password"];
                $em=strval($email);
                $pas=strval($password);

            
                $handler=mysqli_connect("localhost","root","","airline");
                $query1="select * from manager;";
                $result= mysqli_query($handler,$query1);
                $rows=mysqli_num_rows($result);
                if($rows>0)
                {
                    while($record=mysqli_fetch_assoc($result))
                    {
                        if($record['email']==$email)
                        {
                            if($record['password']==$password)
                            {
                                $count=1;
                                $_SESSION['password']=$password;
                                $_SESSION['email']=$email;
				echo "<script>window.location.href = 'index.php';</script>";
                                break;
                               
                            }
                            else{
				echo "<script>alert('password incorect check once');</script>";
                                $count=1;
                            }
                        }
                    }
                    if($count!=1)
                    {
                        echo "<script>alert('A manger with proper mail id can login ... sorry you are not allowed to login');</script>";
                    }
                }
                else{
                    echo "<script>alert('A manger with proper mail id can login ...sorry you are not allowed to login');</script>";
                }
            
    }
}
?>
      <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" placeholder="manager email" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required pattern="[a-zA-Z0-9\S]{,16}*"/ title="password must contain a capital letter a small letter and one digit and a special charact>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
	        <input type="hidden" name="bmiSubmitted" id="bmiSubmitted" value="1" />
                <div class="links">
                    Don't have account? <a href="signup.php">Sign Up</a>
                </div>
            </form>
        </div>
       
      </div>
</body>
</html>
