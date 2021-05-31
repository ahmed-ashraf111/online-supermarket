<?php
  require_once('PHPMailer/PHPMailerAutoload.php');
  include_once("backEnd/user.php");
  include_once("backEnd/basic.php");
  $x = 0;
  if (isset($_POST["email"])) {
    if (!checkEmail($_POST["email"])) {
      $error = "This email doesn't exist";
    }else {
      $x = rand(100000, 100000000);
      $_SESSION["vcode"] = $x;
      $_SESSION["email"] = $_POST["email"];
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'ssl';
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = '465';
      $mail->isHTML();
      $mail->Username = 'onlinesupermarket04@gmail.com';
      $mail->Password = 'Online@OSM123';
      $mail->SetFrom('onlinesupermarket04@gmail.com');
      $mail->Subject = 'Verification Code';
      $mail->Body = $x;
      $mail->AddAddress($_POST["email"]);
      $mail->Send();
      header("Location :remember.php");
    }
  }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Forget Password</title>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="js/bootstrap.js" charset="utf-8"></script>
     <link rel="stylesheet" href="css/bootstrap.css">
     <link rel="stylesheet" href="css/master.css">
   </head>
   <body>
     <form class="form container" action="forget.php" method="post">
       <div class="form-group">
         <label>Enter your email:</label>
         <input type="text" name="email" class="form-control">
         <?php if(isset($error)){ ?>
         <label class="alert alert-danger"><?php echo $error; ?></label>
       <?php } ?>
       </div>
       <button class="btn btn-primary" type="submit">Send</button>
     </form>
   </body>
 </html>
