<?php
session_start();
$email = $_SESSION['email'];

include 'config.php';

if(isset($_POST['submit']) && isset($_POST['code'])){
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    if($_SESSION['code']==$code){
        $message[] = 'Code Confirm';
        $verifysql = "UPDATE users set verification='verified' where email = '$email'";
        $verifiedsql = mysqli_query($conn,$verifysql);
        echo '<script>alert("Your Email has been Verified")</script>';
        unset($_SESSION['code']);
        unset($_SESSION['email']);
        echo '<script>window.location.href="login.php"</script>';

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
   <title>verify</title>
   <link rel="shortcut icon" type="image" href="images/jbrologo.png">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="form-container">
<form action="" method="post">
      <h3>Email Verification</h3>
      <input type="text" name="code" placeholder="Enter 6 digit code" required class="box">
      <p>Check your email inbox or spam</p>
      <input type="submit" name="submit" value="Submit" class="btn">
   </form>
</div>
</body>
</html>