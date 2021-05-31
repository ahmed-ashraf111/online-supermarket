<?php
include_once("backEnd/basic.php");
if (isset($_POST["vcode"])) {
  if ($_POST["vcode"] == $_SESSION["vcode"]) {
    header("Location : updateUser.php");
  }else {
    $error = "Wrong code";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verification</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <form class="form" action="remember.php" method="post">
      <div class="form-group">
        <label>Enter the Verification code:</label>
        <input type="number" name="vcode">
        <?php if(isset($error)){ ?>
        <label class="alert alert-danger"><?php echo $error; ?></label>
      <?php } ?>
      </div>
      <button type="submit" class="btn btn-success">Reset Password</button>
    </form>
  </body>
</html>
