<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert report
if ($_POST['form_type'] === 'add_student_report') {
  $name = $_POST['student_name'];
  $email = $_POST['email'];
  $title = $_POST['report_title'];
  $desc = $_POST['description'];
  $date = $_POST['report_date'];

  $stmt = mysqli_prepare($mysqli, "INSERT INTO student_reports (student_name, email, report_title, description, report_date) VALUES (?, ?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $title, $desc, $date);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: student_report.php");
  exit;
}

// Delete report
if ($_POST['form_type'] === 'delete_student_report' && isset($_POST['report_id'])) {
  $stmt = mysqli_prepare($mysqli, "DELETE FROM student_reports WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: student_report.php");
  exit;
}

// Fetch reports
$result = mysqli_query($mysqli, "SELECT * FROM student_reports ORDER BY report_date DESC");
$reports = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>