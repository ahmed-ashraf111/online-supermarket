<?php
include_once("backEnd/basic.php");
include_once("backEnd/user.php");
function getAll($email){
  $user = getUser($email);
  $userId = $user["id"];
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q = "SELECT * FROM user_product WHERE user_id = $userId";
  $result =  mysqli_query($conn, $q);
  return $result;
}
function isThere($productId, $products){
  while ($product = mysqli_fetch_assoc($products)) {
      if ($productId == $product["product_id"]) {
        return true;
      }
  }
  return false;
}
function removeProduct($productId, $userId){
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q = "DELETE FROM user_product WHERE user_id = $userId AND product_id = $productId";
  mysqli_query($conn, $q);
}

function deleteAll(){
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q = "DELETE FROM user_product";
  mysqli_query($conn, $q);
}

 ?>
