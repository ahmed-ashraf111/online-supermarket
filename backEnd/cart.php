<?php
include_once("backEnd/basic.php");
include_once("backEnd/user.php");
function getAll(){
  $user = getUser($_SESSION["email"]);
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q = "SELECT * FROM user_product WHERE user_id = $user["id"]";
  $result =  mysqli_query($conn, $q);
  return $result;
}

 ?>
