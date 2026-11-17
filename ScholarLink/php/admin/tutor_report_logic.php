<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert report
if ($_POST['form_type'] === 'add_tutor_report') {
  $name = $_POST['tutor_name'];
  $email = $_POST['email'];
  $title = $_POST['report_title'];
  $desc = $_POST['description'];
  $date = $_POST['report_date'];

  $stmt = mysqli_prepare($mysqli, "INSERT INTO tutor_reports (tutor_name, email, report_title, description, report_date) VALUES (?, ?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $title, $desc, $date);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: tutor_report.php");
  exit;
}

// Delete report
if ($_POST['form_type'] === 'delete_tutor_report' && isset($_POST['report_id'])) {
  $stmt = mysqli_prepare($mysqli, "DELETE FROM tutor_reports WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: tutor_report.php");
  exit;
}

// Fetch reports
$result = mysqli_query($mysqli, "SELECT * FROM tutor_reports ORDER BY report_date DESC");
$reports = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>