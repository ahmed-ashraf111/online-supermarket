<?php
  include_once("backEnd/basic.php");
  include_once("backEnd/cart.php");
  include_once("backEnd/user.php");
  if (isset($_GET["id"])) {
    $productId = $_GET["id"];
    $userId = getUserId($_SESSION["email"]);
    removeProduct($productId, $userId);
    header("Location: viewCart.php");
  }else {
    header("Location: viewCart.php");
  }

 ?>
