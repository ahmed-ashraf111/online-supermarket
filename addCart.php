<?php
  include_once("backEnd/basic.php");
  include_once("backEnd/user.php");
  include_once("backEnd/cart.php");
  if (!isset($_SESSION["name"])) {
    header("Location: userIndex.php");
  }
  $products = getAll($_SESSION["email"]);
  $productId = $_GET["id"];
  $userId = getUserId($_SESSION["email"]);
  if (isThere($productId, $products)) {
    increseQty($productId, $userId);
  }else {
    insertProduct($productId, $userId);
  }
  header("Location: userIndex.php");
?>
