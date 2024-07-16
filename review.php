<!DOCTYPE html>
<?php
	session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="styles.css" />
  <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <title>review of company</title>
  </head>
<style>
@import url("https://fonts.googleapis.com/css2?family=Noto+Serif:wght@700&family=Poppins:wght@400;500;600&display=swap");
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200&family=Whisper&display=swap');
:root {
  --primary-color: #1a2c50;
  --secondary-color: #f4f7fe;
  --text-dark: #333333;
  --text-light: #767268;
  --extra-light: #ffffff;
}
.btn {
  padding: 0.5rem 1.5rem;
  outline: none;
  border: none;
  font-size: 0.95rem;
  font-weight: 400;
  color: white;
  background-color: #3d5cb8;
  border-radius: 2rem;
  cursor: pointer;
  transition: 0.3s;
}
.btn:hover{
  box-shadow:1px 1px 10px gray;
}
nav {
  max-width: 1200px;
  margin: auto;
  padding: 1rem;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  display:flex;
}

.nav__logo {
  font-size: 1.5rem;
  font-weight: 600;
  color: var(--text-dark);
}

.nav__links {
  list-style: none;
  align-items: center;
  gap: 2rem;
  display:flex;
  
}


.link a {
  font-weight: 500;
  color:#64748b;
  transition: 0.3s;
}

.link a:hover {
  color: #000;
}
.section__container {
  width: 100%;
  max-width: 1200px;
  margin: auto;
  padding: 1rem;
  text-align: center;
  
}
.main_footer {
    background-color:  #334c99;
  }
  
  .main_footer .footer__container {
    display: grid;
    grid-template-columns: 2fr repeat(2, 1fr);
    gap: 5rem;
  }
  
  .main_footer .footer__col h3 {
    font-size: 1.5rem;
    font-weight: 500;
    color: white;
    margin-bottom: 1rem;

  }
  
  .main_footer .footer__col h4 {
    font-size: 1.2rem;
    font-weight: 500;
    color: white;
    margin-bottom: 1rem;
  }
  
  .main_footer .footer__col p {
    color: white;
    margin-bottom: 1rem;
    cursor: pointer;
    transition: 0.3s;
  }
  
  .main_footer .footer__col p:hover {
    color: white;
  }
  
  .main_footer .footer__bar {
    padding: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    border-top: 1px solid white;
  }
  
  .main_footer .footer__bar p {
    font-size: 0.9rem;
    color: white;
  }
.header {
  margin-bottom: 2rem;
}

.header p {
  letter-spacing: 2px;
  font-size: 1rem;
  font-weight: 500;
}

.header h1 {
  font-family: "Noto Serif", serif;
  font-size: 2rem;
  font-weight: 900;
}

.testimonials__grid {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 2rem;
  margin-bottom: 2rem;
}

.card {
  padding: 3rem;
  display: grid;
  gap: 1rem;
  background-color:white;
  border-radius: 5px;
  box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.1);
  cursor: pointer;
}
.card:hover{
	-webkit-transform:translateY(10px);
	tranfsorm:translateY(10px);
        box-shadow:5px 5px 10px gray;
}
.card i {
  font-size: 2.5rem;
  color: gold;
}

.card p {
  font-size: 1rem;
  font-weight: 500;
}

.card hr {
  width: 40px;
  margin: auto;
  color: var(--text-light);
}

.card img {
  width: 60px;
  height: 60px;
  margin: auto;
  border-radius: 100%;
  border: 1px solid var(--primary-color);
}

.card .name {
  font-size: 0.9rem;
  font-weight: 400;
  color: var(--text-light);
  transition: 0.3s;
}

.card .name:hover {
  color: var(--primary-color);
}

.footer h4 {
  font-family: "Noto Serif", serif;
  font-size: 1.25rem;
  font-weight: 900;
  margin-bottom: 1rem;
}

.footer p {
  max-width: 450px;
  margin: auto;
  font-size: 0.9rem;
  line-height: 1.5rem;
  margin-bottom: 2rem;
}

.footer button {
  padding: 1rem 2rem;
  outline: none;
  border: none;
  font-size: 0.8rem;
  font-weight: 600;
  color: var(--extra-light);
  background-color: var(--primary-color);
  border-radius: 5px;
  cursor: pointer;
}

@media (width < 900px) {
  .testimonials__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }
}

@media (width < 600px) {
  .testimonials__grid {
    grid-template-columns: repeat(1, 1fr);
  }
}
</style>
<style>
body {
    background: white;
    height: 100vh;

    align-items: center;
    justify-content: center;
  }
  .rating {
    display: inline-block;
    font-size: 0;
    position: relative;
    text-transform: capitalize;
    padding: 0 50px 8%;
    color: gray;
  }
    
  label {
    float: right;
    padding: 0;
    font-size: 50px;
    cursor: pointer;
  }   
  label::before {
    content: "\2606";
    padding-bottom: 8px;
    display: inline-block;
    transition: 0.2s;
  } 
  span {
    opacity: 0;
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    height: 20px;
    font-size: 1rem;
    white-space: nowrap;
    transition: 0.15s ease-out;
    pointer-events: none;
    letter-spacing: -2px;
    transform: translateY(-50%);
  } 
  label:hover span {
    opacity: 1;
    transform: none;
    letter-spacing: 0;
  }
  input:checked ~ label::before {
    content: "\2605";
    color: orange;
    filter: drop-shadow(0 0 4px);
    transform: rotate(.2turn);
    transition-delay: calc(0.1 * attr(data-idx integer));
  }
  
</style>
<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Roboto", sans-serif;
}

.wrapper {
  max-width: 75%;
  margin: auto;
}

.wrapper > p,
.wrapper > h1 {
  margin: 1.5rem 0;
  text-align: center;
}

.wrapper > h1 {
  letter-spacing: 3px;
}

.accordion {
  background-color: white;
  color: rgba(0, 0, 0, 0.8);
  cursor: pointer;
  font-size: 1.2rem;
  width: 100%;
  padding: 2rem 2.5rem;
  border: none;
  outline: none;
  transition: 0.4s;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: bold;
}

.accordion i {
  font-size: 1.6rem;
}

.active,
.accordion:hover {
  background-color: #f1f7f5;
}
.pannel {
  padding: 0 2rem 2.5rem 2rem;
  background-color: white;
  overflow: hidden;
  background-color: #f1f7f5;
  display: none;
}
.pannel p {
  color: rgba(0, 0, 0, 0.7);
  font-size: 1.2rem;
  line-height: 1.4;
}

.faq {
  border: 1px solid rgba(0, 0, 0, 0.2);
  margin: 10px 0;
}
.faq.active {
  border: none;
}
</style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

*{
  font-family: 'Poppins', sans-serif;
  margin:0; padding:0; 
  box-sizing: border-box;
  text-transform: capitalize;
  outline: none; border:none;
  text-decoration: none;
}

.container{
  margin:20px auto;
  max-width: 700px;
}

.container .heading{
  text-align: center;
  font-size: 30px;
  padding:20px;
  margin-bottom: 20px;
}

.container .accordion-container{
  padding:0 20px;
}

.container .accordion-container .accordion{
  margin-bottom: 20px;
  cursor: pointer;
}

.container .accordion-container .accordion.active .accordion-heading{
  background: crimson;
}

.container .accordion-container .accordion.active .accordion-heading h3{
  color:#fff;
}

.container .accordion-container .accordion.active .accordion-heading i{
  color:#fff;
  transform: rotate(180deg);
  transition: transform .2s .1s;
}

.container .accordion-container .accordion.active .accordion-content{
  display: block;
}

.container .accordion-container .accordion .accordion-heading{
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap:10px;
  background: #fff;
  border:2px solid #000;
  padding:15px 20px;
}

.container .accordion-container .accordion .accordion-heading h3{
  font-size: 18px;;
}

.container .accordion-container .accordion .accordion-heading i{
  font-size: 25px;;
}

.container .accordion-container .accordion .accordion-content{
  padding:15px 20px;
  border:2px solid #000;
  font-size: 15px;
  background: #fff;
  border-top: 0;
  display: none;
  animation: animate .2s linear backwards;
  line-height: 2;
  transform-origin: top;
}

@keyframes animate {
  0%{
    transform: scaleY(0);
  }
}

.
</style>
  <body>
    <nav class="col-md-12">
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

    <div class="section__container">
      <div class="header">
        <p>Let's see</p>
        <h1 style="font-family: 'Dancing Script', cursive;">What our customers say about our Airlines...</h1><br>
        <h4>Here we go look at our recent customers reviews about our company.</h4>
      </div>
      <div class="testimonials__grid">
        <div class="card">
          <span><i class="ri-double-quotes-l"></i></span>
          <p>
            I've recently booked a ticket from this website.I have very good experience and their services also very good.
          </p>
          <hr />
          <img src="assets/womenreview.jpg" alt="user" />
          <p class="name">mrs.Varalakshmi</p>
        </div>
        <div class="card">
          <span><i class="ri-double-quotes-l"></i></span>
          <p>
            Me and my friends wanted to go for an vacation with our familys so we came to this website and we booked like nearly 7 tickets .We just love it thanks to the team. 
          </p>
          <hr />
          <img src="assets/men1.jpg" alt="user" />
          <p class="name">Mr.Masthan valli</p>
        </div>
        <div class="card">
          <span><i class="ri-double-quotes-l"></i></span>
          <p>
            Iam very glad i found this website because the services they are providing are very appreciable and i had amazing experience  
          </p>
          <hr />
          <img src="assets/women2.jpeg" alt="user" />
          <p class="name">Ms.Sai pallavi</p>
        </div>

	 <?php
	$handler=mysqli_connect("localhost","root","","airline");
	$query1="select * from review;";
	$result=mysqli_query($handler,$query1);
	$rows=mysqli_num_rows($result);
	if($rows>0)
	{
		while($record=mysqli_fetch_assoc($result))
		{
			$image=$record['file_store'];
			$name=$record['name'];
			$comment=$record['comment'];
			echo "<body><div class='card'>
          <span><i class='ri-double-quotes-l'></i></span>
          <p>$comment</p>
          <hr />
          <img src=$image alt='user' />
          <p class='name'>$name</p>
        </div></body>";
	   	}
	}
	?>
      </div>
      <div class="footer">
      <h1> please kindly rate this website</h1>
       <form>
   <div class="rating">
     <input type='radio' hidden name='rate' id='rating-opt5' data-idx='0'>	
     <label for='rating-opt5'><span>Amazing, i love it!</span></label>

     <input type='radio' hidden name='rate' id='rating-opt4' data-idx='1'>
     <label for='rating-opt4'><span>very good</span></label>

     <input type='radio' hidden name='rate' id='rating-opt3' data-idx='2'>
     <label for='rating-opt3'><span>Neutral</span></label>

     <input type='radio' hidden name='rate' id='rating-opt2' data-idx='3'>
     <label for='rating-opt2'><span>Dissatisfied</span></label>

     <input type='radio' hidden name='rate' id='rating-opt1' data-idx='4'>
     <label for='rating-opt1'><span>Very Dissatisfied</span></label>
   </div>
</form>
<div class="container">

    <h1 class="heading">frequently asked questions</h1>

    <div class="accordion-container">

        <div class="accordion ">
            <div class="accordion-heading">
                <h3>Where is this company present?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
               Our KAT AIRLINES company present at Gandhi road,Flay no:53411,Kadapa,Andra pradhesh,India
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>HOW DO I BOOK A TICKET in this website?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
              You can access our website and provide the requested information along with your credit card details. You can also register yourself on our Website. It is mandatory to update your documents (valid Information, PAN, address proof, and credit card details/payment details) to make a reservation or at the time of registration.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>ARE THERE ANY TAXES ON THE Ticket?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
              Yes, GST will be applicable as per the state laws.
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>WHAT MODE OF PAYMENTS ARE ACCEPTED?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
               We accepts payments by credit cards (visa/master card), and net banking. All rental payments are made in advance through our website. However, the Security Deposit should be paid before taking delivery of the car
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>Is all types of ticket classes are available?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
               YES!! Our company has both BUssiness class and general class tickets..
            </p>
        </div>

        <div class="accordion">
            <div class="accordion-heading">
                <h3>ARE THERE ANY TAXES ON THE INCIDENTAL CHARGES ?</h3>
                <i class="fas fa-angle-down"></i>
            </div>
            <p class="accordion-content">
                Any incidental charges to main services will be included in the value of taxable supply for the purpose of charge of GST. Toll, Parking, Challans etc. are incidental charges to the main activity of rent a cab and therefore it is chargeable to GST.

Extract from The Central Goods and Services Tax Act, Section 15 for reference. Value of taxable supply
15.

 The value of a supply of goods or services or both shall be the transaction value, which is the price actually paid or payable for the said supply of goods or services or both where the supplier and the recipient of the supply are not related and the price is the sole consideration for the supply.


        </div>

    </div>

</div>


<script>

let accordions = document.querySelectorAll('.accordion-container .accordion');

accordions.forEach(acco =>{
    acco.onclick = () =>{
        accordions.forEach(subAcco => { subAcco.classList.remove('active') });
        acco.classList.add('active');
    }
})

</script>

<h2>Thank you very much for visting this website, have a nice day!</h2>

<footer class="main_footer" style="width:100%">
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
      </div>
    </div>


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
