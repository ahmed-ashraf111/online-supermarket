<?php
  function getUser($email){
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    $q = "SELECT * FROM user WHERE email = '$email'";
    $user = mysqli_query($conn, $q);
    return mysqli_fetch_assoc($user);
  }
  function getUserId($email){
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    $q = "SELECT * FROM user WHERE email = '$email'";
    $users = mysqli_query($conn, $q);
    $user = mysqli_fetch_assoc($users);
    return $user["id"];
  }
  function getAllUsers(){
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    $q = "SELECT * FROM user";
    $result = mysqli_query($conn, $q);
    return $result;
  }
  function addUser($firstname, $lastname, $role, $phoneNumber, $address, $email, $password){
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    //$newpass = password_hash($password, PASSWORD_BCRYPT);
    $q = "INSERT INTO user(first_name, last_name, role, phone_number, address, email, password) VALUES
     ('$firstname', '$lastname', '$role', '$phoneNumber', '$address', '$email', '$password')";
    mysqli_query($conn, $q);
    $_SESSION["name"] = $firstname;
    $_SESSION["role"] = $role;
    $_SESSION["email"] = $email;
    if($role==1){
        header("Location: adminIndex.php");
    }else{
        header("Location: userIndex.php");
    }
  }
  function checkEmail($email){
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    $q = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $q);
    $user = mysqli_fetch_assoc($result);
    if (isset($user["id"])) {
      return true;
    }else {
      return false;
    }
  }

  function checkUser($email ,$pass){
      $users = getAllUsers();
      $flag = false;
      while ($user = mysqli_fetch_assoc($users)) {
          if ($user["email"] == $email) {
              $flag = true;
              break;
          }
      }
      if ($flag) {
        if ($user["password"] == $pass) {
          return true;
        }else {
          return false;
        }
      }else {
        return false;
      }
    }
    function insertProduct($productId, $userId){
      $conn = mysqli_connect('localhost', 'root', '', 'shop');
      $q = "INSERT INTO user_product (product_id, user_id, qty) VALUES($productId, $userId, 1)";
      mysqli_query($conn, $q);
    }

    function increseQty($productId, $userId){
      $conn = mysqli_connect('localhost', 'root', '', 'shop');
      $q1 = "SELECT * FROM user_product WHERE user_id = $userId AND product_id = $productId";
      $result = mysqli_query($conn, $q1);
      $product = mysqli_fetch_assoc($result);
      $qty = $product["qty"] + 1;
      $q2 = "UPDATE user_product SET qty = $qty WHERE user_id = $userId AND product_id = $productId";
      mysqli_query($conn, $q2);
    }
 ?>
