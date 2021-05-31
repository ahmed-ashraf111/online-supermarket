<?php
include_once("backEnd/basic.php");
include_once("backEnd/product.php");
include_once("backEnd/cart.php");
if (!isset($_SESSION["name"])) {
  header("Location : userIndex.php");
}
$userProducts = getAll($_SESSION["email"]);
$sum = 0;
if (isset($_POST["button"])) {
  deleteAll();
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cart</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <?php include_once("userHeader.php") ?>
    <div class="container">
      <div class="row">
          <table class="table">
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Actions</th>
            </tr>
            <?php while($product = mysqli_fetch_assoc($userProducts)){
                        $info = viewProduct_id($product["product_id"]);
                        $sum += $info["price"] * $product["qty"];
               ?>
              <tr>
                <td><img src="img/<?php echo $info["img"]; ?>" style="width : 40px"></td>
                <td><?php echo $info["name"]; ?></td>
                <td><?php echo $info["price"] * $product["qty"]; ?></td>
                <td><?php echo $product["qty"]; ?></td>
                <td><a href="removeCart.php?id=<?php echo $info["id"]; ?>" class="btn btn-danger">Remove</td>
              </tr>
            <?php } ?>
            <tr>
              <th></th>
              <th>Total Price</th>
              <th><?php echo $sum; ?></th>
              <th></th>
            </tr>
          </table>
          <?php if ($sum > 0){ ?>
          <a href="clearCart.php" class="btn btn-success" style="margin:auto; width:300px">Make Order !</a>
        <?php }else { ?>
          <h1 class="display-4" style="text-align:center; margin:auto; margin-top:100px">You don't have anything in your cart yet :(</h1>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
