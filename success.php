<?php
	session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Success</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center; /* Center the container */
    }

    h2 {
        color: green;
	font-size:50px;
    }
    h3{
	font-size:30px;
	color:red;
    }
    p{
        color: black;
        text-align: justify;
	padding: 0px 0px 0px 200px;
	word-spacing:10px;

		
    }
    strong{
       color:purple;
    }

    .details {
        margin-top: 20px;
    }

    .footer {
        margin-top: 20px;
        text-align: center;
        color: black;
    }
</style>

</head>
<body>



<?php

                $email=$_SESSION['email'];
   	        $todayDate = date("Y-m-d");
                $handler=mysqli_connect("localhost","root","","airline");
                $query1="select * from booking where email='$email' and today='$todayDate'";
                $result= mysqli_query($handler,$query1);
                $rows=mysqli_num_rows($result);
                if($rows>0)
                {
                    while($record=mysqli_fetch_assoc($result))
                    {
                        $email=$record['email'];
			$name=$record['name'];
			$flight_id=$record['flight_id'];
			$source=$record['source'];
			$destination=$record['destination'];
			$date=$record['date'];
			$time=$record['time'];
			$seating=$record['seating'];
			$adults=$record['adults'];
			$infants=$record['infant'];
			$children=$record['children'];
			$totalcost=$adults*1000+$children*500;
		   }
		  echo "<script>console.log('$flight_id');</script>";
		}


?>


    <div class="container">
        <h2>Booking Successful</h2>
        <h4>Thank you for booking with us,name</h4>

        <div class="details">
            <h3>Booking Details</h3>
            <p><strong>Email: </strong><?php echo $email; ?></p>
            <p><strong>Name: </strong><?php echo $name; ?></p>
            <p><strong>Flight_Id: </strong><?php echo $flight_id; ?></p>
            <p><strong>Source: </strong><?php echo $source;?></p>
            <p><strong>Destination: </strong><?php echo $destination;?></p>
            <p><strong>Date: </strong><?php echo $date;?></p>
            <p><strong>Time: </strong><?php echo $time;?></p>
            <p><strong>Preffered Seating: </strong><?php echo $seating;?></p>
	    <p><strong>Adults: </strong><?php echo $adults;?></p>
            <p><strong>infants: </strong><?php echo $infants;?></p>
            <p><strong>Children: </strong><?php echo $children;?></p>
            <p><strong>Total Cost: </strong><?php echo $totalcost;?></p>
        </div>

	<div class="print-button">
    		<button onclick="printPage()">Print Receipt</button>
	</div>

	<script>
	    function printPage() {
		window.print();
	    }
	</script>

        <div class="footer">
           &copy; 2023 KAT AIRLINES
        </div>
    </div>




</body>
</html>

