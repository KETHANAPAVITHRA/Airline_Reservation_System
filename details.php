<?php
	session_start();
?>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/index.css" />
    <title>Web Design Mastery | Flivan</title>
    <style>


:root {
  --primary-color: #3d5cb8;
  --primary-color-dark: #334c99;
  --text-dark: #0f172a;
  --text-light: #64748b;
  --extra-light: #f1f5f9;
  --white: #ffffff;
  --max-width: 1200px;
}
.booking__container {
  border-radius: 2rem;
  border: 1px solid var(--extra-light);
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
  max-width:1050px;
}

.booking__nav {
  max-width: 600px;
  margin: auto;
  display: flex;
  align-items: center;
  background-color: var(--extra-light);
  border-radius: 5px;
}

.booking__nav span {
  flex: 1;
  padding: 1rem 2rem;
  font-weight: 500;
  color: var(--text-light);
  text-align: center;
  border-radius: 5px;
  cursor: pointer;
}

.booking__nav span:nth-child(2) {
  color: var(--white);
  background-color: var(--primary-color);
}

.booking__container form {
  margin-top: 4rem;
  display: grid;
  grid-template-columns: repeat(4, 1fr) auto;
  gap: 1rem;
}

.booking__container .input__content {
  width: 100%;
}

.booking__container .form__group {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.booking__container .form__group span {
  padding: 10px;
  font-size: 1.5rem;
  color: var(--text-dark);
  background-color: var(--extra-light);
  border-radius: 1rem;
}

.booking__container .input__group {
  width: 100%;
  position: relative;
}



.booking__container input {
  width: 100%;
  padding: 10px 0;
  font-size: 1rem;
  outline: none;
  border: none;
  border-bottom: 1px solid var(--primary-color);
  color: var(--text-dark);
}
.booking__container .form__group p {
  margin-top: 0.5rem;
  font-size: 0.8rem;
  color: var(--text-light);
}

#show-more-button {
  font-size: 1.1rem;
  width:100px;
  height:50px;
  border-radius:50px;
  cursor:pointer;

}
#show-more-button:hover {
 background-color:blue;
 color:white;

}
table{

}
td{
   padding:10px;
   width:200px;

}
#show-table{
padding:3px;

}
h2{

}
.empty{
    padding:0px 0px 100px 0px;
}
.data{
    padding-top:10px;
    padding:0px 0px 100px 0px;
}


#book_btn{
   width:100px;
   height:30px;
   border-radius:5px;
   
}
#book_btn:hover{
  box-shadow:1px 1px 10px gray;
}
    </style>
</head>

<body>
    <nav>
      <div class="nav__logo">KAT AIRLINES</div>
      <ul class="nav__links">
        <li class="link"><a href="index.php">Home</a></li>
        <li class="link"><a href="about.php">About</a></li>
        <li class="link"><a href="Offers.php">Offers</a></li>
        <li class="link"><a href="review.php">Reviews</a></li>
        <li class="link"><a href="details.php">Search Flight</a></li>
	<li class="link"><a href="#" onclick="checkManagerAccess()">Add Flight</a></li>
      </ul>
      <button class="btn"><a href="contact.php" style="text-decoration:none;color:white" target="blank">Contact</a></button>
      <a href="profile.php"><img src="assets/profile.jpeg" style="border-radius:50%"; height="70" width="70" /></a>
    </nav>
    <div class="empty"></div>
    <section class="section__container booking__container">
	<center><h2>Search Flight Here</h2></center>
      <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="form__group">
          <span><i class="ri-map-pin-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" name="source" placeholder="Source" />
            </div>
            <p>Where are you from?</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-map-pin-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" name="dest" placeholder="destination"/>
            </div>
            <p>where are you going to?</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-calendar-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="date" name="date"/>
              <label></label>
            </div>
            <p>Add date</p>
          </div>
        </div>
	<input type="hidden" name="cmiSubmitted" id="cmiSubmitted" value="1" />
        <input type="submit" value="Search" id="show-more-button">
      </form>
    </section>


<?php
$cmiSubmitted  = $_POST['cmiSubmitted'];
if (isset($cmiSubmitted)) 
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $source=$_POST['source'];
	    $dest=$_POST['dest'];
	    $date=$_POST['date'];
	    $source=strtoupper($source);
	    $dest=strtoupper($dest);

            $handler=mysqli_connect("localhost","root","","airline");
            $query1="select * from flight";
            $result= mysqli_query($handler,$query1);
            $rows=mysqli_num_rows($result);
    }
}
?>
<center class="data">
	<table border=2 id="show-table">
		<tr style="text-align:center">
			<td><b>Flight Id</b></td>
			<td><b>Source</b></td>
			<td><b>Destination</b></td>
			<td><b>Take Off Date</b></td>
			<td><b>Take Off Time</b></td>
			<td><b>Book FLight</b></td>
		</tr>
		<?php
			if($rows>0)
			{
			    echo "<script>console.log('hello');</script>";
               		    while($record=mysqli_fetch_assoc($result))
                	     {
				$record0=strtoupper($record['flight_id']);
				$record1=strtoupper($record['source']);
				$record2=strtoupper($record['destination']);
				$record3=$record['date'];
				$record4=$record['time'];
			
				

				if(strval($record1)==strval($source) && strval($record2)==strval($dest))
				{
		?>
					<tr>
						<td><?php echo $record0; ?></td>
						<td><?php echo $record1; ?></td>
						<td><?php echo $record2; ?></td>
						<td><?php echo $record3; ?></td>
						<td><?php echo $record4;?></td>
						<td>
						<center>
						 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    						<input type="submit" name="flightButton" value="<?php echo $record0 ?>" title="Click to set session">
 						 </form>
						</center>
						</td>

					</tr>
		<?php
			   	}
			    }
			}
		?>	
	</table>
</center>
    <footer class="footer ">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>KAT AIRLINES</h3>
          <p>
            Where Excellence Takes Flight. With a strong commitment to customer
            satisfaction and a passion for air travel, Flivan Airlines offers
            exceptional service and seamless journeys.
          </p>
          <p>
            From friendly smiles to state-of-the-art aircraft, we connect the
            world, ensuring safe, comfortable, and unforgettable experiences.
          </p>
        </div>
        <div class="footer__col">
          <h4>INFORMATION</h4>
          <p>Home</p>
          <p>About</p>
          <p>Offers</p>
          <p>Reviews</p>
          <p>Search Flight</p>
          <p>Add Flight</p>
        </div>
        <div class="footer__col">
          <h4>CONTACT</h4>
          <p>Support</p>
          <p>Media</p>
          <p>Socials</p>
        </div>
      </div>
      <div class="section__container footer__bar">
        <p>Copyright © 2023 RKV Students. All rights reserved.</p>
        <div class="socials">
          <span><i class="ri-facebook-fill"></i></span>
          <span><i class="ri-twitter-fill"></i></span>
          <span><i class="ri-instagram-line"></i></span>
          <span><i class="ri-youtube-fill"></i></span>
        </div>
      </div>
    </footer>
	<script>
  function checkManagerAccess() {
    <?php 
      $handler = mysqli_connect("localhost", "root", "", "airline");
      $query1 = "SELECT * FROM manager;";
      $result = mysqli_query($handler, $query1);
      $rows = mysqli_num_rows($result);
      
      if ($rows > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
          if ($_SESSION['email'] == $record['email']) {
            echo "window.location.href = 'addflight.php';";
          } else {
            echo "alert('Only managers have access to add flights');";
          }
        }
      }
    ?>
  }
</script>
</body>

<?php
session_start();

if (isset($_POST['flightButton'])) {
    $flightNumber = $_POST['flightButton'];

    // Store the value in the session
    $_SESSION['flight'] = $flightNumber;
    echo $_SESSION['flight'];

    echo "<script>window.open('booking-form.php');</script>";
}
?>

</html>
