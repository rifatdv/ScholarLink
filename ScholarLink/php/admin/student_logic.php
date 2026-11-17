<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

$students = [];
$showAddForm = false;
$editStudent = null;

// Show Add Form
if (isset($_POST["form_type"]) && $_POST["form_type"] === "show_add_form") {
  $showAddForm = true;
}

// Add Student
if (isset($_POST["form_type"]) && $_POST["form_type"] === "add") {
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $class = trim($_POST["class"]);
  $status = trim($_POST["status"]);
  $date = date("Y-m-d");

  if ($name && $email && $class && $status) {
    $stmt = mysqli_prepare($mysqli, "INSERT INTO students (name, email, class, status, date) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $class, $status, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: student.php");
    exit();
  }
}

// Show Edit Form
if (isset($_POST["edit_id"]) && !isset($_POST["form_type"])) {
  $edit_id = intval($_POST["edit_id"]);
  $stmt = mysqli_prepare($mysqli, "SELECT * FROM students WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $edit_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $editStudent = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
}

// Save Edited Student
if (isset($_POST["form_type"]) && $_POST["form_type"] === "edit") {
  $id = intval($_POST["edit_id"]);
  $name = trim($_POST["edit_name"]);
  $email = trim($_POST["edit_email"]);
  $class = trim($_POST["edit_class"]);
  $status = trim($_POST["edit_status"]);

  if ($name && $email && $class && $status) {
    $stmt = mysqli_prepare($mysqli, "UPDATE students SET name = ?, email = ?, class = ?, status = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $class, $status, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: student.php");
    exit();
  }
}

// Delete Student
if (isset($_POST["delete_id"])) {
  $id = intval($_POST["delete_id"]);
  $stmt = mysqli_prepare($mysqli, "DELETE FROM students WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: student.php");
  exit();
}

// Search Students
if (isset($_POST["form_type"]) && $_POST["form_type"] === "search") {
  $term = "%" . strtolower(trim($_POST["search_term"])) . "%";
  $class = trim($_POST["class_filter"]);
  $status = trim($_POST["status_filter"]);

  $query = "SELECT * FROM students WHERE LOWER(name) LIKE ? OR LOWER(email) LIKE ?";
  $types = "ss";
  $params = [$term, $term];

  if ($class) {
    $query .= " AND class = ?";
    $types .= "s";
    $params[] = $class;
  }

  if ($status) {
    $query .= " AND status = ?";
    $types .= "s";
    $params[] = $status;
  }

  $stmt = mysqli_prepare($mysqli, $query);
  mysqli_stmt_bind_param($stmt, $types, ...$params);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
}

// Load All Students if Not Searching
if (empty($students)) {
  $result = mysqli_query($mysqli, "SELECT * FROM students ORDER BY id ASC");
  $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>