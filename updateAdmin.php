<?php
include_once("backEnd/admin.php");
include_once("backEnd/basic.php");
include_once("backEnd/user.php");

if (isset($_SESSION["email"])) {
  $result = getUser($_SESSION["email"]);
}

if (isset($_POST["email"]) &&isset($_POST["fname"]) && isset($_POST["lname"])  && isset($_POST["password"])){
    updateUser($_POST["email"], $_POST["fname"], $_POST["lname"], NULL, NULL, $_POST["password"]);
    header("Location: adminIndex.php");
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update user information</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <form class="form container" action="updateAdmin.php" method="post">
      <div class="form-group">
        <label>Email :</label>
        <input type="text" name="email" class="form-control" value="<?php if(isset($result["email"])){echo $result["email"];} ?>">
      </div>
      <div class="form-group">
        <label>first Name :</label>
        <input type="text" name="fname" class="form-control" value="<?php if(isset($result["first_name"])){echo $result["first_name"];} ?>">
      </div>
      <div class="form-group">
        <label>Last Name :</label>
        <input type="text" name="lname" class="form-control" value="<?php if(isset($result["last_name"])){echo $result["last_name"];} ?>">
      </div>
      <div class="form-group">
        <label>Password :</label>
        <input type="text" name="password" class="form-control" value="<?php if(isset($result["password"])){echo $result["password"];} ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </body>
</html>
