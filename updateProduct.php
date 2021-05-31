<?php
include_once("backEnd/admin.php");
include_once("backEnd/product.php");
if (isset($_GET["id"])) {
  $result = viewProduct_id($_GET["id"]);
}
if (isset($_POST["id"]) &&isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["category"]) && isset($_POST["qty"])){
  /*if (isset($_FILES["image"]["name"])) {
    $image = $_FILES["image"]["name"];
    $path = "img/";
    $tmp_name = $_FILES["image"]["tmp_name"];
    move_uploaded_file($tmp_name, $path . $image);*/
    modifyProduct($_POST["id"], $_POST["name"], $_POST["qty"], $_POST["price"], $_POST["category"]);
    header("Location: adminIndex.php");
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Product</title>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js" charset="utf-8"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <?php include_once("adminHeader.php"); ?>
    <form class="form container" action="updateProduct.php" method="post">
      <div class="form-group">
        <label>ID :</label>
        <input type="number" name="id" class="form-control" value="<?php if(isset($result["id"])){echo $result["id"];} ?>" >
      </div>
      <div class="form-group">
        <label>Name :</label>
        <input type="text" name="name" class="form-control" value="<?php if(isset($result["name"])){echo $result["name"];} ?>">
      </div>
      <div class="form-group">
        <label>Price :</label>
        <input type="number" name="price" class="form-control" value="<?php if(isset($result["price"])){echo $result["price"];} ?>">
      </div>
      <div class="form-group">
        <label>Quantity :</label>
        <input type="number" name="qty" class="form-control" value="<?php if(isset($result["qty"])){echo $result["qty"];} ?>">
      </div>
      <div class="form-group">
        <label>Category :</label>
        <input type="text" name="category" class="form-control" value="<?php if(isset($result["category"])){echo $result["category"];} ?>">
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </body>
</html>
