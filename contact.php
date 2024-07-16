<?php
	session_start();
?>
<html>

<head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet"href="css/contact.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
</head>

<body>
    <section class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
      			<div>KAT AIRLINES</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-direction-button">
                        <a href="index.php"><i class="fa fa-home"></i>Go Back Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Leave us a message</h2>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" value=<?php echo $_SESSION['email']?> readonly>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                </fieldset>
                            </div>
			    <div class="col-md-12">
                                <fieldset>
                                  	<input type="hidden" name="bmiSubmitted" id="bmiSubmitted" value="1" />
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset>
                                    <input type="submit" id="form-submit" class="btn" value="Submit Your Message">
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="contact-button col-md-12">
                     <a href="contact.php"><i class="fa fa-phone"></i>&nbsp;Contact Us Now</a>
                </div>
 		<div class="col-md-6">
                    <div class="left-side">
                        <div class="tabs-content">
                            <h4>Choose Your Direction:</h4>
                            <ul class="social-links">
                                <li><a href="http://facebook.com">Find us on <em>Facebook</em><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="http://youtube.com">Our <em>YouTube</em> Channel<i class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="http://instagram.com">Follow our <em>instagram</em><i class="fa-brands fa-instagram"></i></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/tooplate"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12 copyright">
                    <p>Copyright &copy; 2023 Airline Reservation System
              
                | Design: <a href="http://www.code-projects.org" target="_parent"><em>RKV STUDENTS</em></a></p>
                </div>
            </div>
        </div>
    </footer>
    

<?php
    $bmiSubmitted = $_POST['bmiSubmitted'];
    if (isset($bmiSubmitted)) {
        echo "<script>console.log('hello')</script>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $message = $_POST['message'];

            $handler = mysqli_connect("localhost", "root", "", "airline");

	   if (!$handler) {
	    	die("Connection failed: " . mysqli_connect_error());
	}

            // Use prepared statements or sanitize and validate input before using it in the query
            $query1 = "INSERT INTO contact VALUES (?, ?, ?)";
            
            $stmt = mysqli_prepare($handler, $query1);

            mysqli_stmt_bind_param($stmt, "sss", $email, $name, $message);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Your message was successfully submitted');</script>";
            } else {
                echo "<script>alert('Error submitting message');</script>";
            }
            
            mysqli_stmt_close($stmt);
            mysqli_close($handler);
        }
    }
?>
</body>
</html>
