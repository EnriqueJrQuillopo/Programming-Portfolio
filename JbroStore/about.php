<?php

include 'config.php';

session_start();

$user_id = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about us</title>
   <link rel="shortcut icon" type="image" href="images/logo.png">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/abt.png" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>JbroPH stores most gaming kind of product from gaming chairs, to skin care, to other medical products</p>
         <p>OUR VISION IS TO BE THE MOST CUSTOMER-CENTRIC COMPANY, WHERE CUSTOMERS IS SATISFIED AS THEY CAN BUY AND DISCOVER ANYTHING THAT THEY WANTED TO BUY.</p>
         <p>AND OUR MISSION IS TO OFFER A WIDE RANGE OF PRODUCTS, FUNCTIONAL PRODUCTS AT PRICES SO LOW THAT AS MANY PEOPLE AS POSSIBLE WILL BE ABLE TO AFFORD THEM.</p>
         <button class="btn" onclick="popup()">contact us</button>
         <script type='text/javascript'>
         function popup()
         {
            swal({
               title: "THIS PAGE IS NOT AVAILABLE",
               text: "please log-in first!",
               icon: "warning",
               button: "I understand",
               });
         }
      </script>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/pic1.png" alt="">
         <p>I love the shop. I will buy again so easy to purchase, wonderful!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Borji Manotoc</h3>
      </div>

      <div class="box">
         <img src="images/pic-2.png" alt="">
         <p>Fast delivery and easy to track, definitely 5 stars for me. I love it!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Raul Luisito</h3>
      </div>

      <div class="box">
         <img src="images/pic-3.jpg" alt="">
         <p>Best shopping website so far, easy to navigate and easy to create an account.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Arman Daman</h3>
      </div>

      <div class="box">
         <img src="images/pic-4.jpg" alt="">
         <p>The site is so secure and I can really feel the effort of the customer service, so fast yet quality!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jhulia Otlum</h3>
      </div>

      <div class="box">
         <img src="images/pic5.jpg" alt="">
         <p>I'm never wrong choosing this shop afterall, the package is so good and has a great quality.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
         <h3>Charizz Zyrus</h3>
      </div>

      <div class="box">
         <img src="images/pic-6.png" alt="">
         <p>My husband robert loves it, omg this shop is so cool. The gaming chair is a top tier quality!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Patricia Camatoy</h3>
      </div>

   </div>

</section>

<section class="authors">

   <h1 class="title">SYSTEM CREATORS</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/author-1.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/Itchan626/" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>CHRISTIAN ACEDILLO</h3>
         <h1>Full Stack Developer</h1>
         <br>
      </div>

      <div class="box">
         <img src="images/author-3.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/Enrique.Jr.Quillopo0105" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>ENRIQUE QUILLOPO</h3>
         <h1>Full Stack Developer</h1>
         <br>
      </div>

      <div class="box">
         <img src="images/author-2.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/gelaiglory" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>ANGELICA JOY GLORY</h3>
         <h1>Front-end Developer</h1>
         <br>
      </div>


      <div class="box">
         <img src="images/author-4.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/sending.again" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>ROBERT CAMATOY</h3>
         <h1>Back-end Developer / Database</h1>
         <br>
      </div>

      <div class="box">
         <img src="images/author-5.jpg" alt="">
         <div class="share">
            <a href="https://www.facebook.com/rosamae.llamas" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>ROSA MAE LLAMAS</h3>
         <h1>Front-end Developer / Documentation</h1>
         <br>
      </div>

      <div class="box">
         <img src="images/abt.png" alt="">
         <div class="share">
            <a href="https://www.facebook.com/rosamae.llamas" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>JBROSTORE TEAM</h3>
         <h1>Funds for the project</h1>
         <br>
      </div>

   </div>

</section>







<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>