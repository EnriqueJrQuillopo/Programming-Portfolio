<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>STAFF PAGE</title>
   <link rel="shortcut icon" type="image" href="images/logo.png">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">STAFF DASHBOARD</h1>

   <div class="box-container">

      <div class="box">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>order placed</p>
      </div>

      <div class="box">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>products added</p>
      </div>

      <div class="box">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>new messages</p>
      </div>

   </div>

</section>

<!-- admin dashboard section ends -->

<section class="dashboard">

<h1 class="title">Sales</h1>

<div class="box-container">

      <div class="box">
      <?php
            
            $select_completed = mysqli_query($conn, "SELECT COUNT(*) as count FROM `orders` WHERE procurement_date>= NOW() - INTERVAL 1 DAY AND payment_status = 'PAID'") or die('query failed');
            $fetch_completed = mysqli_fetch_assoc($select_completed);
            $total= $fetch_completed['count'];
               
         ?>
         <h3><?php echo $total; ?></h3>
         <p>Sales Today</p>
      </div>

      <div class="box">
         <?php

            $select_completed = mysqli_query($conn, "SELECT COUNT(*) as count FROM `orders` WHERE procurement_date>=NOW() - INTERVAL 7 DAY AND payment_status = 'PAID'") or die('query failed');
            $fetch_completed = mysqli_fetch_assoc($select_completed);
            $total= $fetch_completed['count'];
               
         ?>
         <h3><?php echo $total; ?></h3>
         <p>Sales This Week</p>
      </div>

      <div class="box">
      <?php

            $select_completed = mysqli_query($conn, "SELECT COUNT(*) as count FROM `orders` WHERE procurement_date>=NOW() - INTERVAL 1 MONTH AND payment_status = 'PAID'") or die('query failed');
            $fetch_completed = mysqli_fetch_assoc($select_completed);
            $total= $fetch_completed['count'];
               
         ?>
         <h3><?php echo $total; ?></h3>
         <p>Sales This Month</p>
      </div>
   </div>

</section>
<section class="dashboard">
<h1 class="title">STOCKS</h1>
<div class="box-container">
<div class="box">
         <?php 
            $select_items = mysqli_query($conn, "SELECT COUNT(*) as total FROM products where quantity>0") or die('query failed');
            $fetch = mysqli_fetch_assoc($select_items);
            $total= $fetch['total'];
         ?>
         <h3><?php echo $total; ?></h3>
         <p>No. of Item on Stocks</p>
      </div>

      <div class="box">
         <?php 
            $select_items = mysqli_query($conn, "SELECT COUNT(*) as total FROM products where quantity=0") or die('query failed');
            $fetch = mysqli_fetch_assoc($select_items);
            $total= $fetch['total'];
         ?>
         <h3><?php echo $total; ?></h3>
         <p> No. of Out of stock Items</p>
      </div>
</div>
</section>
<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>