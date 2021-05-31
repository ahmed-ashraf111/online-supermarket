<?php
include_once("backEnd/product.php");
include_once("backEnd/basic.php");
$products = viewAllProduct();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>user</title>
    <script type="text/javascript"
            src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <?php
      include_once("userHeader.php"); ?>
    <?php if(isset($_SESSION["name"])){ ?>
        <h1 class="display-4" style="text-align:center">Hello <?php echo $_SESSION["name"]; ?></h1>
    <?php } ?>
    <hr>
    <div class="row mt-5">
      <div class="col-7 pl-5">
        <h1 class="display-4">Check out our new Products !!</h1>
        <?php if(!isset($_SESSION["name"])){ ?>
        <p>If you are a <span class="text-success">NEW</span> customer <span class="text-primary">SIGN UP</span> now</p>
        <a href="register.php" class="btn btn-success">Sign up</a>
        <?php } ?>
      </div>
      <div class="col-5">
        <img src="img/background2.jpg" class="rounded-circle">
      </div>
    </div>
      <div class="container mt-5">
        <div class="row">
        <?php while ($product = mysqli_fetch_assoc($products)) { ?>
            <div class="card col-3">
              <img class="card-img-top" src="img/<?php echo $product["img"]; ?>" alt="Card image" style="height:250px;width:250px">
              <div class="card-body">
                <p class="card-title text-primary" style="text-align:right"><?php echo $product["price"]; ?> EGP</p>
                <p class="card-text" style="text-align:center;height:50px"><?php echo $product["name"]; ?></p>
                <a href="addCart.php?id=<?php echo $product["id"]; ?>" class="btn btn-success " style="margin-left:45px;" >Add To Cart</a>
              </div>
            </div>
      <?php } ?>
        </div>
      </div>
    </body>
</html>
