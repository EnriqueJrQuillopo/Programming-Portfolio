<?php

session_start();
unset($_SESSION['code']);
unset($_SESSION['email']);
include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
      unset($_SESSION['code']);
      unset($_SESSION['email']);
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
         unset($_SESSION['code']);
         unset($_SESSION['email']);
      }else{
        $six_digit_random_number = random_int(100000, 999999);
        $_SESSION['code'] = $six_digit_random_number;
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Please Verify your email';
         $_SESSION['email'] = $email;
        $receiver=$email;
        $subject="EMAIL VERIFICATION";
        $body = "Here is your code ". strval($six_digit_random_number);
        $sender = "jbro-ph@outlook.com";
        if(mail($receiver, $subject, $body, $sender)){
            echo '<script>alert("Verification Code has sent to your email")</script>';
            echo '<script>window.location.href="verification.php"</script>';
        }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
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
      <h3>register now</h3>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" id="password" placeholder="enter your password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  onkeyup="check()" class="box">
      <div id="message">
                        <h1>Password must contain the following: </h1>
                        <p id="letter" class="invalid">A <u>lowercase</u> letter</p>
                        <p id="capital" class="invalid">A <u>capital (uppercase)</u> letter</p>
                        <p id="number" class="invalid">A <u>number</u></p>
                        <p id="length" class="invalid">Minimum <u>8 characters</u></p>
                        </h5>
                    </div>
      <input type="password" name="cpassword" id="confirm_password" placeholder="confirm your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="check(this)" required class="box">
      <b><error id="alert"></error></b>
      <select name="user_type" class="box">
         <option value="user">Customer Account</option>
      </select>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>
<script>
  //password strength
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}


//re-enter password
var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('confirm_password').value) {
          document.getElementById('alert').style.color = 'green';
          document.getElementById('alert').innerHTML = 'Passwords matched.';
      } else {
          document.getElementById('alert').style.color = 'red';
          document.getElementById('alert').innerHTML = 'Passwords did not match, try again.';
      }
  }
</script>
</body>
</html>