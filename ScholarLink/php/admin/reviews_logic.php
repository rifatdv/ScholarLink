<?php
session_start();
include 'db.php';

if ($_POST['form_type'] === 'reply_review') {
  $review_id = $_POST['review_id'];
  $admin_name = $_SESSION['admin_name'] ?? 'Admin';
  $reply = $_POST['reply'];

  $stmt = mysqli_prepare($mysqli, "INSERT INTO review_replies (review_id, admin_name, reply) VALUES (?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "iss", $review_id, $admin_name, $reply);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: reviews.php");
  exit;
}
?>