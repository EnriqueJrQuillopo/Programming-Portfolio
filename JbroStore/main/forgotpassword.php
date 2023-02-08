<?php
session_start();


include 'config.php';

if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['name'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND name = '$name'") or die('query failed');
    if(mysqli_num_rows($select_users) > 0){
        $six_digit_random_number = random_int(100000, 999999);
        $_SESSION['code'] = $six_digit_random_number;
        $_SESSION['email'] = $email;
        $receiver=$email;
        $subject="Forgot password";
        $body = "Here is your code ". strval($six_digit_random_number);
        $sender = "jbro-ph@outlook.com";
        if(mail($receiver, $subject, $body, $sender)){
            $message[] = 'A code has been sent to your email';
        }
     }
     else{
        unset($_SESSION['code']);
        $message[] = 'User not found!';
     }
}
elseif(isset($_POST['submit']) && isset($_POST['code'])){
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    if($_SESSION['code']==$code){
        $message[] = 'Code Confirm';
        header('location:resetpassword.php');
    }
    else{
        $message[] = 'Incorrect Code';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>reset password</title>
   <link rel="shortcut icon" type="image" href="images/jbrologo.png">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



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
   
<div class="form-container">

   <form action="" method="post">
      <h3>Reset Password</h3>
      <?php 
      if(isset($_SESSION['code'])){
           ?> <input type="text" name="code" placeholder="Enter 6 digit code" required class="box">
      <?php }else{
        ?>
      
        <input type="text" name="name" placeholder="enter your registered name" required class="box">
        <input type="email" name="email" placeholder="enter your registered email" required class="box">
    <?php 
        }?>
      <input type="submit" name="submit" value="Submit" class="btn">
   </form>

</div>
</body>
</html>