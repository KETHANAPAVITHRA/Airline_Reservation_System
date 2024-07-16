<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/Offers.css">
    <title></title>
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
        <button class="btn"><a href="contact.php" target="blank" style="text-decoration:none;color:white" >Contact</a></button>
      <a href="profile.php"><img src="assets/profile.jpeg" style="border-radius:50%"; height="70" width="70" /></a>
      </nav>
      <div class="booking__nav">
        <a href=""><span>% Special Offers</span></a>
        <a href=""><span>Bank Offers</span></a>
        <a href=""><span>Available Offers</span></a>
        <a href=""><span>Hot Deals</span></a>
        <a href=""><span>Expired Offers</span></a>
      </div>
     <div class="main">
         <div class="heading">
              <p>Amazing Travel Offers and Deals</p>
         </div>
         <div class="card1">
            <div>
               <img src="assets/s_o1.jpg">
            </div>
            <div>
                <h3>New User Offer</h3>
                <p>Get Discount on Booking<br>Flight with us</p>
            </div>
         </div>
     </div>

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
</html>
