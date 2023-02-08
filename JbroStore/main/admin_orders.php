<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_pstatus'])){

   $payment_update_id = $_POST['pstatus_id'];
   $update_paymentsts = $_POST['update_paymentsts'];
   mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_paymentsts' WHERE id = '$payment_update_id'") or die('query failed');
   $message[] = 'Payment status has been updated!';
}

if(isset($_POST['update_status'])){
   $order_update_id = $_POST['status_id'];
   $user_id = $_POST['user_id'];
   $update_ordersts = $_POST['update_ordersts'];
   $post_date = date('y-m-d h:m:s');
   $ordersql = "SELECT * FROM users WHERE id='$user_id'";
   $order_sql = mysqli_query($conn,$ordersql);
   $fetch_user = mysqli_fetch_assoc($order_sql);
   $products = $_POST['products'];
   $receiver = $fetch_user['email'];
   $name = $fetch_user['name'];
      $subject="ORDER UPDATE";
      $body = 'Hello ' . strval($name) . ' ,'  . ' 
      Your order '.strval($products) . ' status has been changed to "'. strval($update_ordersts) . '"' ;
      $sender = "jbro-ph@outlook.com";
      if(mail($receiver, $subject, $body, $sender)){
        }
      if($update_ordersts == "ORDER SUCCESSFULLY DELIVERED"){
         mysqli_query($conn, "UPDATE `orders` SET order_status = '$update_ordersts', procurement_date = '$post_date' WHERE id = '$order_update_id'") or die('query failed');
      }
      else{
         mysqli_query($conn, "UPDATE `orders` SET order_status = '$update_ordersts' WHERE id = '$order_update_id'") or die('query failed');
      }       
   $message[] = 'Order status has been updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">
      <?php
      $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
      ?>
      <div class="box">
         <p> user id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
         <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> total products : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>₱<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <br>
         <form action="" method="post">
            <p>PAYMENT STATUS:</p>
            <input type="hidden" name="pstatus_id" value="<?php echo $fetch_orders['id']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $fetch_orders['user_id']; ?>">
            <input type="hidden" name="products" value="<?php echo  $fetch_orders['total_products']; ?>">
            <select name="update_paymentsts">
               <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
               <option value="PAID">CUSTOMER PAID THE AMOUNT</option>
               <option value="UNPAID">CUSTOMER DIDN'T PAY</option>
            </select>
            <input type="submit" value="update" name="update_pstatus" class="option-btn">
            <br>
            <br>
            <p>ORDER STATUS:</p>
            <input type="hidden" name="status_id" value="<?php echo $fetch_orders['id']; ?>">
            <select name="update_ordersts">
               <option value="" selected disabled><?php echo $fetch_orders['order_status']; ?></option>
               <option value="TO SHIP">TO SHIP</option>
               <option value="TO RECEIVE">TO RECEIVE</option>
               <option value="ORDER CANCELLED">CUSTOMER CANCELLED</option>
               <option value="ORDER SUCCESSFULLY RETURNED">PRODUCT RETURNED</option>
               <option value="ORDER SUCCESSFULLY DELIVERED">COMPLETED</option>
            </select>
            <input type="submit" value="update" name="update_status" class="option-btn">
            <br>
            <br>
            <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">remove this order</a>
         </form>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>










<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>