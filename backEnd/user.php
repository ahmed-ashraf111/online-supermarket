<?php
  include_once("basic.php");

  function getUser($email){
    $conn = mysqli_connect('localhost', 'root', '', 'shop');
    $q = "SELECT * FROM user WHERE email = '$email'";
    $user = mysqli_query($conn, $q);
    return mysqli_fetch_assoc($user);
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
 ?>
