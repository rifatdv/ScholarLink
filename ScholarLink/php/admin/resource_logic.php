<?php
include 'db.php';

if ($_POST['form_type'] === 'upload_resource') {
  $type = $_POST['type'];
  $title = $_POST['title'];
  $description = $_POST['description'] ?? '';
  $link_url = $_POST['link_url'] ?? '';
  $audience = $_POST['audience'];

  // Insert into database
  if ($type === 'Link' || $type === 'Book' || $type === 'File') {
    $sql = "INSERT INTO resources (title, type, link_url, description, audience, uploaded_on)
            VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = mysqli_prepare($mysqli, $sql);
     mysqli_stmt_bind_param($stmt, "sssss", $title, $type, $link_url, $description, $audience);
  } else {
    exit("Invalid resource type.");
  }

  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: resource.php");
  exit;
}