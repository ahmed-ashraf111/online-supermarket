<?php
require_once('backEnd/basic.php');
unset($_SESSION["username"]);
session_unset();
session_destroy();
header("Location: userIndex.php");
 ?>
