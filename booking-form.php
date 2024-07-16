<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Booking Form</title>
    <link rel="stylesheet" href="css/booking.css">
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<?php
session_start();

$flightNumber = isset($_SESSION['flight']) ? $_SESSION['flight'] : 'Not set';
$flightNumber=intval($flightNumber);
$handler=mysqli_connect("localhost","root","","airline");
$query1="select * from flight where flight_id=$flightNumber;";
$result= mysqli_query($handler,$query1);
$rows=mysqli_num_rows($result);
if($rows>0)
{
       while($record=mysqli_fetch_assoc($result))
       {
		$source=strtoupper($record['source']);
		$dest=strtoupper($record['destination']);
		$date=$record['date'];
		$time=$record['time'];

	}
}
                   
?>



<div >
	<h4 style="color:white; padding:30px">KAT AIRLINES</h4>
</div>
<section id="about" class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-md-0 mb-5">
            <div class="position-relative" >
              <img src="assets/travel.png" class="img">
            </div>
          </div>
          <div class="col-md-8 text-center text-md-start">
		<form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"><!--form-->
			    <h1 class="text-center">Airline Booking Form</h1>

			    <div id="form"><!--form-->
				<h3 class="text-white">Booking Details</h3>

			    	<div id="input"><!--input-->
					<input type="text" name="flightid" id="input-group" value="FLIGHT ID: <?php echo $flightNumber ?>" style="text-align:center" readonly><br>
					<input type="text" name="source" id="input-group" value="SOURCE : <?php echo $source ?>" readonly>
					<input type="text" name="destination" id="input-group" value="DEST : <?php echo $dest ?>" readonly>
					<input type="text" name="date" id="input-group" value="DATE : <?php echo $date ?>" readonly>
					<input type="text" name="time" id="input-group" value="TIME : <?php echo $time ?>" readonly>
					<select  id="input-group" style="background: black;" name="selectSeat" required>
					    <option value="">Preffered Seating</option>
					    <option value="Economy">Economy Class</option>
					    <option value="Bussiness">Business Class</option>
					    <option value="First">First Class</option>
					</select>
					<div class="display" id="seatDisplay">

					</div>
				</div><!--input-->

				<div id="input2"><!--input2-->
				    <input type="number" name="adults" id="input-group" placeholder="Adult" required>
				    <input type="number" name="children" id="input-group" placeholder="Children(2-11years)" required>
				    <input type="number" name="infant" id="input-group" placeholder="infant(under 2years)" required>
				</div><!--input2-->

				<div id="input3"><!--input3-->
				    <span id="input-group" class="text-primary">Select Your Fare</span> 
				    <input type="radio" id="input-group" name="fareType">
				    <label class="text-white" for="input-group">One Way</label>
				    <input type="radio" id="input-group" name="fareType">
				    <label class="text-white" for="input-group">Round Trip</label>
				</div><!--input3-->

				<div id="input4"><!--input4-->
				    <input type="date" name="returndate" id="input-group" placeholder="Return Date" required>
				    <input type="time" name="returntime" id="input-group" placeholder="Return time" required>
				    <input type="text" name="message" id="input-group1" placeholder="Any Message" required>
				</div><!--input4-->

				<div id="input5"><!--input5-->
				    <h3 class="text-white">Personal Details</h3>
				</div><!--input5-->

				<div id="input6"><!--input6-->
				    <input type="text" name="name" id="input-group" placeholder="Full Name" required>
				    <input type="number" name="contact" id="input-group" placeholder="Phone Number" required>
				    <input type="email" name="email" id="input-group1" value=<?php echo $_SESSION['email']; ?> readonly>
				</div><!--input6-->
				<div id="input5"><!--input5-->
                                  	<input type="hidden" name="bmiSubmitted" id="bmiSubmitted" value="1" />
				</div>
				<div clas="button">
					<button type="submit" class="btn btn-warning text-white">Submit Form</button>
					<button type="reset" class="btn btn-primary">Clear Form</button>
				</div>
			  </div>

		</form><!--form-->
          </div>
        </div>
      </div>
    </section>

<?php
    $bmiSubmitted = $_POST['bmiSubmitted'];
    if (isset($bmiSubmitted)) {
        echo "<script>console.log('hello')</script>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedSeat = $_POST['selectSeat'];
	    $adults =$_POST['adults'];
	    $children =$_POST['children'];
	    $infant =$_POST['infant'];
	    $fareType =$_POST['fareType'];
	    $message =$_POST['message'];
	    $name = $_POST['name'];
	    $email =$_POST['email'];
	    $todayDate = date("Y-m-d");

	  

	    



            $handler = mysqli_connect("localhost", "root", "", "airline");

            // Use prepared statements or sanitize and validate input before using it in the query
            $query1 = "INSERT INTO booking VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
            
            $stmt = mysqli_prepare($handler, $query1);

            mysqli_stmt_bind_param($stmt, "ssssssssiiiss", $email, $name, $flightNumber,$source,$dest,$date,$time,$selectedSeat,$adults,$infant,$children,$message,$todayDate);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Your Booking is Successfully Done!..');</script>";
		echo "<script>window.location.href = 'success.php';</script>";
            } else {
                echo "<script>alert('Error While Booking');</script>";
            }
            
            mysqli_stmt_close($stmt);
            mysqli_close($handler);
        }
    }
?>

</body>
</html>
