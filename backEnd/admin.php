<?php

function insertProduct($name, $qty	,$price	,$category ,$img)
{
  $conn = mysqli_connect('localhost', 'root', '', 'shop');

  $sql = "INSERT INTO product (name	,qty	,price	,category ,img)
          VALUES ('$name'	,'$qty'	,'$price'	,'$category','$img')";
  $conn->query($sql);
}

function deleteProduct($id)
{
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $sql = "DELETE FROM product WHERE id = $id";
  $conn->query($sql);
}

function modifyProduct($id,	$name	,$qty	,$price	,$category)
{
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $sql = "update product
          set name = '$name'	,qty = '$qty'	,price ='$price'	,category='$category'
          WHERE id = $id";
  $conn->query($sql);
}
function updateUser($email, $fname, $lname, $add, $pnum, $password){
  $conn = mysqli_connect('localhost', 'root', '', 'shop');
  $q = "UPDATE user SET first_name = '$fname', last_name = '$lname', address = '$add', phone_number = '$pnum', password = '$password' WHERE email = '$email'";
  mysqli_query($conn, $q);
  $_SESSION["name"] = $fname;
}

?>
