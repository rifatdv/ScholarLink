<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}
?>