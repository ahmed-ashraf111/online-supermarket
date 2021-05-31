<?php
include_once("backEnd/product.php");
include_once("backEnd/basic.php");
include_once("functions.php");
admin_logged_in();
$products = viewAllProduct();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <?php include_once("adminHeader.php") ?>
      <h1 class="display-4" style="text-align:center">Hello <?php echo $_SESSION["name"]; ?></h1>
      <hr>
      <div class="container">
        <div class="row">
            <table class="table table-striped table-hover table-bordered">
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
                  <td><img src="img/<?php echo $product["img"]; ?>" style="width : 80px;height:80px"></td>
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
    </body>
</html>
