<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="css/about.css">

</head>
<body>
    <nav>
        <div class="nav__logo">KAT AIRLINES</div>
        <ul class="nav__links">
          <li class="link"><a href="index.php">Home</a></li>
          <li class="link"><a href="">About</a></li>
          <li class="link"><a href="Offers.php">Offers</a></li>
         <li class="link"><a href="review.php">Reviews</a></li>
          <li class="link"><a href="details.php">Search Flight</a></li>
	<li class="link"><a href="#" onclick="checkManagerAccess()">Add Flight</a></li>
        </ul>
        <button class="btn"><a href="contact.php" style="text-decoration:none;color:white" >Contact</a></button>
      <a href="profile.php"><img src="assets/profile.jpeg" style="border-radius:50%"; height="70" width="70" /></a>
      </nav>
      <div class="container">
          <h1>About Us</h1>
          <div class="cards">
            <div>
                <img src="assets/1.jpeg">
            </div>
            <div>
            <p>Are you the next big plane tycoon? Prove yourself in one of the best free airline manager games in the world, and beat your friends and other real life managers to top the airplane games leaderboards by controlling the most aerial routes.In this multiplayer aviation simulation game you have the possibility to become bigger than real businesses such as United Airlines, Emirates, British Airways, Lufthansa, American Airlines and Ryanair.<br><button class="btn btn-primary" style="margin-top:20px;">Read more</button></p>
            
            </div>
          </div>
          <div class="cards">
            <div>
              <p>Many stories from antiquity involve flight, such as the Greek legend of Icarus and Daedalus, and the Vimana in ancient Indian epics. Around 400 BC in Greece, Archytas was reputed to have designed and built the first artificial, self-propelled flying device, a bird-shaped model propelled by a jet of what was probably steam, said to have flown some 200 m (660 ft).[12][13] This machine may have been suspended for its flight.<br><button class="btn btn-primary" style="margin-top:20px;">Read more</button></p>               
            </div>
            <div>
                <img src="css/book.jpg">
            </div>
          </div>
       </div>
       <section class="section__container travellers__container">
        <h2 class="section__header">Our Customers</h2>
        <div class="travellers__grid">
          <div class="travellers__card">
            <img src="assets/traveller-1.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="assets/client-1.jpg" alt="client" />
              <h4>Emily Johnson</h4>
              <p>Dubai</p>
              <p class="rate">*****</p>
            </div>
          </div>
          <div class="travellers__card">
            <img src="assets/traveller-2.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="assets/client-2.jpg" alt="client" />
              <h4>David Smith</h4>
              <p>Paris</p>
              <p class="rate">****</p>
            </div>
          </div>
          <div class="travellers__card">
            <img src="assets/traveller-3.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="assets/client-3.jpg" alt="client" />
              <h4>Olivia Brown</h4>
              <p>Singapore</p>
              <p class="rate">***</p>
            </div>
          </div>
          <div class="travellers__card">
            <img src="assets/traveller-4.jpg" alt="traveller" />
            <div class="travellers__card__content">
              <img src="assets/client-4.jpg" alt="client" />
              <h4>Daniel Taylor</h4>
              <p>Malaysia</p>
              <p class="rate">*****</p>
            </div>
          </div>
        </div>
      </section>
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
          <p>Copyright © 2023 RKV students. All rights reserved.</p>
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
