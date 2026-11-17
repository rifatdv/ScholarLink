<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Add Course
  if ($_POST['form_type'] === 'add_course') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $tutor_name = $_POST['tutor_name'];

    $stmt = mysqli_prepare($mysqli, "INSERT INTO courses (title, description, category, tutor_name) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $category, $tutor_name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: courses.php");
    exit;
  }

  // Delete Course
  if ($_POST['form_type'] === 'delete_course') {
    $course_id = $_POST['course_id'];
    $stmt = mysqli_prepare($mysqli, "DELETE FROM courses WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $course_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: courses.php");
    exit;
  }
}
?>