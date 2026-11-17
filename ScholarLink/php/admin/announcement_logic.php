<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['form_type'] === 'add_announcement') {
    $title = $_POST['title'];
    $message = $_POST['message'];
    $posted_by = $_SESSION['admin_name'] ?? 'Admin';
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'] ?: null;
    $visible_to = $_POST['visible_to'];

    $stmt = mysqli_prepare($mysqli, "INSERT INTO announcements (title, message, posted_by, start_date, end_date, visible_to) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssssss", $title, $message, $posted_by, $start_date, $end_date, $visible_to);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: announcement.php");
    exit;
  }

  if ($_POST['form_type'] === 'delete_announcement') {
  $id = $_POST['announcement_id']; 
  $stmt = mysqli_prepare($mysqli, "DELETE FROM announcements WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: announcement.php");
  exit;
}
}
?>