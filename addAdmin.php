<?php
  include_once("backEnd/user.php");
  if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["pass"])) {

    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["fname"])) {
        $firstNameError = "Only letters and spaces are allowed";
    }elseif (!preg_match("/^[a-zA-Z-' ]*$/",$_POST["lname"])) {
        $lastNameError = "Only letters and spaces are allowed";
    }elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
    }elseif (strlen($_POST["pass"]) < 7) {
        $passError = "The password should be at least 8 characters";
    }elseif (checkEmail($_POST["email"])) {
        $emailError = "This email is used";
    }else {
        addUser($_POST["fname"] ,$_POST["lname"] , 1 ,NULL ,NULL ,$_POST["email"] ,$_POST["pass"]);
    }

  }

 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <form class="container mt-2 is-validated" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <label class="">First Name:</label>
        <input type="text" name="fname" class="form-control" value="<?php if(isset($_POST["fname"])){echo $_POST["fname"];} ?>" required>
        <?php if(!empty($firstNameError)){ ?>
          <label class="alert alert-danger"><?php echo $firstNameError; $firstNameError = "" ?></label>
        <?php } ?>
      </div>
      <div class="form-group">
        <label>Last Name:</label>
        <input type="text" name="lname" class="form-control" value="<?php if(isset($_POST["lname"])){echo $_POST["lname"];} ?>" required>
        <?php if(!empty($lastNameError)){ ?>
          <label class="alert alert-danger"><?php echo $lastNameError; $lastNameError = "" ?></label>
        <?php } ?>
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input type="text" name="email" class="form-control" value="<?php if (isset($_POST["email"])) {echo $_POST["email"];} ?>" required>
        <?php if (!empty($emailError)) { ?>
          <label class="alert alert-danger"> <?php echo $emailError; $emailError = ""; ?></label>
        <?php  }; ?>
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="password" name="pass" class="form-control" value="<?php if (isset($_POST["pass"])) {echo $_POST["pass"];} ?>" required>
        <?php if (!empty($passError)) { ?>
          <label class="alert alert-danger"> <?php echo $passError; $passError = ""; ?></label>
        <?php  }; ?>
      </div>
      <button type="submit" name="button" class="btn btn-success" style="">Register</button>
    </form>
  </body>
</html>
