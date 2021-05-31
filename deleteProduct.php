<?php
include_once("backEnd/admin.php");
if (isset($_GET["id"])) {
  deleteProduct($_GET["id"]);
  header("Location: adminIndex.php");
}
 ?>
