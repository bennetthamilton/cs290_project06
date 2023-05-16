<?php
session_start();
$id = $_GET["id"];
if (isset($_SESSION["cart"])) {
  $motorcycle_ids = $_SESSION["cart"];
  if (!in_array($id, $motorcycle_ids)) {
    array_push($motorcycle_ids, $id);
  }
  $_SESSION["cart"] = $motorcycle_ids;
} else {
  $_SESSION["cart"] = [$id];
}
header("Location: /motorcycles/show.php?motorcycle_id=$id");
?>