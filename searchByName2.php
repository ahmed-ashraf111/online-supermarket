<?php
include_once("backEnd/admin.php");
include_once("backEnd/basic.php");
include_once("backEnd/product.php");
if (isset($_POST["name"])) {
  $products = searchProduct($_POST["name"]);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Search</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <?php
    if (isset($_SESSION["role"])) {
      if($_SESSION["role"] == 1){
        include_once("adminHeader.php"); ?>
        <div class="container">
          <div class="row">
              <table class="table">
                <tr>
                  <th>Image</th>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Quantity</th>
                  <th>Actions</th>
                </tr>
                <?php while($product = mysqli_fetch_assoc($products)){ ?>
                  <tr>
                    <td><img src="img/<?php echo $product["img"]; ?>" style="width : 40px"></td>
                    <td><?php echo $product["id"]; ?></td>
                    <td><?php echo $product["name"]; ?></td>
                    <td><?php echo $product["price"]; ?></td>
                    <td><?php echo $product["category"]; ?></td>
                    <td><?php echo $product["qty"]; ?></td>
                    <td><a href="updateProduct.php?id=<?php echo $product["id"]; ?>" class="btn btn-primary">Update</td>
                    <td><a href="deleteProduct.php?id=<?php echo $product["id"]; ?>" class="btn btn-danger">Delete</td>
                  </tr>
                <?php } ?>
              </table>
          </div>
        </div>
      <?php } ?>
    <?php }else {
      include_once("userHeader.php"); ?>
      <div class="container">
        <div class="row">
        <?php while ($product = mysqli_fetch_assoc($products)) { ?>
            <div class="card col-3">
              <img class="card-img-top" src="img/<?php echo $product["img"]; ?>" alt="Card image" style="max-width: 50%">
              <div class="card-body">
                <p class="card-title"><?php echo $product["price"]; ?> EGP</p>
                <p class="card-text"><?php echo $product["name"]; ?></p>
                <a href="cart.php?" class="btn btn-primary">Add To Cart</a>
              </div>
            </div>
      <?php } ?>
        </div>
      </div>
    <?php } ?>
  </body>
</html>
