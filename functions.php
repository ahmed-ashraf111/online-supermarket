<?php
include_once("backEnd/admin.php");
include_once("backEnd/product.php");
include_once("backEnd/basic.php");
function checkUser($email ,$pass){
    $user = getUser($email);
    if (!isset($user["Uemail"])) {
      return false;
    }elseif (password_verify($pass , $user["password"]) == 1) {
      return true;
    }else {
      return false;
    }
  }
function is_logged_in(){
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
  }
}
function admin_logged_in(){
  if(!isset($_SESSION["username"])){
    if ($_SESSION["role"] == 0) {
      header("Location: login.php");
    }
  }
}

/*function getCategory(){
  $result = viewAllProduct();
  $x = array("Category");
  for ($i=0; $product = mysqli_fetch_assoc($result); $i++) {
    $x[i] = $product["category"];
  }
  for ($i = 0, $j = 0; $j < $x.size(); $j++) {
  }
}*/
  ?>
