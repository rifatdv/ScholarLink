<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert report
if ($_POST['form_type'] === 'add_finance_report') {
  $title = $_POST['report_title'];
  $desc = $_POST['description'];
  $date = $_POST['report_date'];
  $amount = $_POST['total_amount'];
  $category = $_POST['category'];

  $stmt = mysqli_prepare($mysqli, "INSERT INTO finance_reports (report_title, description, report_date, total_amount, category) VALUES (?, ?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sssds", $title, $desc, $date, $amount, $category);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: finance_report.php");
  exit;
}

// Delete report
if ($_POST['form_type'] === 'delete_finance_report' && isset($_POST['report_id'])) {
  $stmt = mysqli_prepare($mysqli, "DELETE FROM finance_reports WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: finance_report.php");
  exit;
}

// Fetch reports
$result = mysqli_query($mysqli, "SELECT * FROM finance_reports ORDER BY report_date DESC");
$reports = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>