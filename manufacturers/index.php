<?php
require '../config/db.php';
$db = new mysqli(
  $database_hostname,
  $database_username,
  $database_password,
  $database_db_name,
  $database_port
);
if ($db->connect_error) {
  die("Error: Could not connect to database. " . $db->connect_error);
}
$sql = "SELECT * FROM manufacturers ORDER BY name;";
$manufacturers = $db->query($sql);

function favoriteButton($manufacturerId, $favoriteManufacturerId) {
  if ($manufacturerId == $favoriteManufacturerId) {
    return "&#11088;";
  } else {
    return "<a class=\"favoriteButton\" title=\"Mark as Favorite\" href=\"/manufacturers/favor.php?id=$manufacturerId\">&#9734;</a>";
  }
}

if (isset($_COOKIE["favoriteManufacturerId"])) {
  $favoriteManufacturerId = $_COOKIE["favoriteManufacturerId"];
} else {
  $favoriteManufacturerId = null;
}
?>
<?php include '../header.php'; ?>
<h2>Manufacturers</h2>
<ul id="manufacturers">
<?php while($manufacturer = $manufacturers->fetch_assoc()) { ?>
  <li><h3><a href="/manufacturers/show.php?id=<?= $manufacturer["id"] ?>"><?= $manufacturer['name'] ?></a> <?= favoriteButton($manufacturer["id"], $favoriteManufacturerId); ?></h3></li>
<?php } ?>
</ul>
<?php mysqli_close($db); ?>
<?php include '../footer.php'; ?>
