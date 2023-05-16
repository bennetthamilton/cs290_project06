<?php
$id = $_GET["id"];
setcookie("favoriteManufacturerId", $id);
header("Location: /manufacturers/");
?>