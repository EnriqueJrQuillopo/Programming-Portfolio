<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="https://www.facebook.com/jbroonlineshop" class="fab fa-facebook-f"></a>
            <a onclick="popup2()" class="fab fa-twitter"></a>
            <a onclick="popup2()" class="fab fa-instagram"></a>
            <a onclick="popup2()" class="fab fa-linkedin"></a>
         </div>
         <p> Customer <a href="main/login.php">login</a> | <a href="main/register.php">register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="" class="logo">JBroStorePH</a>

         <nav class="navbar">
            <a href="home.php">HOME</a>
            <a href="about.php">ABOUT</a>
            <a href="shop.php">SHOP</a>
            <a onclick="popup()">CONTACT</a>
            <a onclick="popup()">ORDERS</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <button onclick="popup()"> <i class="fas fa-shopping-cart"></i> <span></span> </button>
         </div>

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

      <script type='text/javascript'>
         function popup2()
         {
            swal({
               title: "NO SOCIAL PAGE IN HERE YET",
               text: "maybe in the future?",
               icon: "warning",
               button: "okay",
               });
         }
      </script>

         <div class="user-box">
            <p>HELLO & WELCOME! <span> GUEST-CUSTOMER</span></p>
            <p>WEBSITE RESTRICTIONS:<span> ORDER, CONTACT, CART DISABLED</span></p>
         </div>
      </div>
   </div>

</header>