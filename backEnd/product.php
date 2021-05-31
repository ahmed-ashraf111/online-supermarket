<?php
$conn = mysqli_connect('localhost', 'root', '', 'shop');

function viewAllProduct()
{
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q = "SELECT * FROM product";
  $products = mysqli_query($conn, $q);
  return $products;
}

function viewProduct_id($id)
{
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q = "SELECT * FROM product WHERE id = '$id'";
  $result =  mysqli_query($conn, $q);
  return mysqli_fetch_assoc($result);
}

function viewProduct_category($category)
{
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q= "SELECT * FROM product WHERE category ='$category'";
  $result =  mysqli_query($conn, $q);
  return $result;
}
function searchProduct($name){
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $sql = "SELECT * FROM product WHERE name like '%$name%' or category like '%$name%'";
  return mysqli_query($conn, $sql);
}



 ?>
