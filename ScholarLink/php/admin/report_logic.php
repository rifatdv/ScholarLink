<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert report
if ($_POST['form_type'] === 'add_report') {
  $title = $_POST['report_title'];
  $desc = $_POST['description'];
  $date = $_POST['report_date'];
  $category = $_POST['category'];

  $stmt = mysqli_prepare($mysqli, "INSERT INTO reports (title, description, report_date, category) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "ssss", $title, $desc, $date, $category);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: report.php");
  exit;
}

// Delete report
if ($_POST['form_type'] === 'delete_report' && isset($_POST['report_id'])) {
  $stmt = mysqli_prepare($mysqli, "DELETE FROM reports WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: report.php");
  exit;
}

// Fetch reports
$result = mysqli_query($mysqli, "SELECT * FROM reports ORDER BY report_date DESC");
$reports = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>