<?php
include_once("backEnd/admin.php");
if (isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["category"]) && isset($_POST["qty"])){
  $image = $_FILES["image"]["name"];
  $path = "img/";
  $tmp_name = $_FILES["image"]["tmp_name"];
  move_uploaded_file($tmp_name, $path . $image);
  insertProduct($_POST["name"], $_POST["qty"], $_POST["price"], $_POST["category"], $image);
  header("Location: adminIndex.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Product</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <div class="container">
      <form class="form" action="addProduct.php" method="post" enctype="multipart/form-data">
        <form class="container mt-2 needed-validated" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="form-group">
            <label>Image: </label>
            <input type="file" name="image">
          </div>
          <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>price:</label>
            <input type="text" name="price" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Quantity:</label>
            <input type="text" name="qty" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Category:</label>
            <input type="text" name="category" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </body>
</html>
