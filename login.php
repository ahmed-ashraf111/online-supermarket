<?php
  require_once('backEnd/user.php');
  include_once("backEnd/basic.php");
  if (isset($_POST["email"]) && isset($_POST["pass"])) {
    if(checkUser($_POST["email"] , $_POST["pass"])){
      $result = getUser($_POST["email"]);
      $_SESSION["name"] = $result["first_name"];
      $_SESSION["role"] = $result["role"];
      $_SESSION["email"] = $result["email"];
      if ($_SESSION["role"] == 1) {
        header("Location: adminIndex.php");
      }else {
        header("Location: userIndex.php");
      }
    }else {
          $messege = "Invalid email or password";
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <h1 class="display-4 text-secondary" style="text-align:center;">login</h1>
    <form class="container mt-2 needed-validated" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <label>Email:</label>
        <input type="text" name="email" class="form-control" value="<?php if(isset($_POST["email"])){ echo $_POST["email"];} ?>" required>
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="password" name="pass" class="form-control" value="<?php if(isset($_POST["pass"])){ echo $_POST["pass"];} ?>" required>
        <?php if(isset($messege)){ ?>
          <label class="alert alert-danger"><?php echo $messege; ?></label>
        <?php $messege = "";} ?>
      </div>
      <a href="forget.php" class="alert alert-link">Forget Password ?</a>
      <a href="register.php" class="mx-auto alert alert-link">Don't have an account ?</a>
      <br><br>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

  </body>
</html>
