
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
  --max-width: 1100px;
}
.booking__container {
  border-radius: 2rem;
  border: 1px solid var(--extra-light);
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
  max-width:1200px;
	
}

.booking__nav {
  max-width: 700px;
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

.booking__container label {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 1.2rem;
  font-weight: 500;
  color: var(--text-dark);
  pointer-events: none;
  transition: 0.3s;
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

.booking__container input:focus ~ label {
  font-size: 0.8rem;
  top: 0;
}

.booking__container .form__group p {
  margin-top: 0.5rem;
  font-size: 0.8rem;
  color: var(--text-light);
}
.addclass{
    padding-top:50px;
    padding-left:100px;
}
#show-more-button {
  font-size: 0.9rem;
  width:150px;
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
    padding:0px 0px 50px 0px;
}
.data{
    padding-top:10px;
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
	    $flight_id=$_POST['flight_id'];
            $source=$_POST['source'];
	    $dest=$_POST['dest'];
	    $date=$_POST['date'];
	    $time=$_POST['time'];
	    echo "<script>console.log('hello');</script>";
            $handler=mysqli_connect("localhost","root","","airline");
            $query1="insert into flight values($flight_id,'$source','$dest','$date','$time');";
	    echo "<script>console.log($flight_id);</script>";
	    echo "<script>console.log('$source');</script>";
	    echo "<script>console.log('$dest');</script>";
	    echo "<script>console.log('$date');</script>";
            $result= mysqli_query($handler,$query1);
	    if($result)
	    {
		  echo "<script>alert('flight successfully added');</script>";
	    }
	    else
	    {
		 echo "<script>alert('flight already exist');</script>";
	    }
	    
    }
}
?>
    <nav>
      <div class="nav__logo">KAT AIRLINES</div>
      <ul class="nav__links">
        <li class="link"><a href="index.php">Home</a></li>
        <li class="link"><a href="about.php">About</a></li>
        <li class="link"><a href="Offers.php">Offers</a></li>
        <li class="link"><a href="review.php">Reviews</a></li>
        <li class="link"><a href="details.php">Flight Details</a></li>
       <li class="link"><a href="addflight.php">Add Flight</a></li>
      </ul>
      <button class="btn"><a href="contact.php" style="text-decoration:none;color:white" target="blank">Contact</a></button>
      <a href="profile.php"><img src="assets/profile.jpeg" style="border-radius:50%"; height="70" width="70" /></a>
    </nav>
<div class="empty"></div>
    <section class="section__container booking__container">
	<center><h2>Add Flight Here</h2></center>
      <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	 <div class="form__group">
		<span><i class="ri-pass-valid-line"></i></span>
		  <div class="input__content">
		    <div class="input__group">
		      <input type="number" name="flight_id" placeholder="Flight Id"/>
		    </div>
		    <p>Flight Id is?</p>
		</div>
	</div>
        <div class="form__group">
          <span><i class="ri-map-pin-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" name="source" placeholder="Source"/>
            </div>
            <p>Flight is going from?</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-map-pin-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="text" name="dest" placeholder="Destination"/>
            </div>
            <p>flight is going to?</p>
          </div>
        </div>
        <div class="form__group">
          <span><i class="ri-calendar-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="date" name="date"/>
              <label></label>
            </div>
            <p>Add Take off Time</p>
          </div>
        </div>
	<div class="form__group">
          <span><i class="ri-calendar-line"></i></span>
          <div class="input__content">
            <div class="input__group">
              <input type="time" name="time"/>
              <label></label>
            </div>
            <p>Add Take off Time</p>
          </div>
        </div><br>
	<div class="addclass">
	<input type="hidden" name="cmiSubmitted" id="cmiSubmitted" value="1" />
        <center><input type="submit" value="ADD FLIGHT" id="show-more-button"></center>

	</div>
      </form>
    </section>
<div class="empty"></div>
<div class="empty"></div>
    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>KAT AIRLINES</h3>
          <p>
            Where Excellence Takes Flight. With a strong commitment to customer
            satisfaction and a passion for air travel, KAT Airlines offers
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
</body>


</html>
