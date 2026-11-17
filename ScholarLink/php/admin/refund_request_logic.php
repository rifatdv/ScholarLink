<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// Fetch refund requests
$query = "SELECT * FROM refund_requests ORDER BY date DESC";
$result = mysqli_query($mysqli, $query);
$refunds = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Handle new request
if ($_POST['form_type'] === 'add_refund') {
  $name = $_POST['student_name'];
  $email = $_POST['email'];
  $reason = $_POST['reason'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];

  $stmt = mysqli_prepare($mysqli, "INSERT INTO refund_requests (student_name, email, reason, amount, status) VALUES (?, ?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "sssds", $name, $email, $reason, $amount, $status);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: refund_request.php");
  exit;
}

// Handle delete
if ($_POST['form_type'] === 'delete_refund' && isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];
  $stmt = mysqli_prepare($mysqli, "DELETE FROM refund_requests WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: refund_request.php");
  exit;
}
?>