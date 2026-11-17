<?php
// $mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

// if (!$mysqli) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// $classes = [];
// $showAddForm = false;
// $editClass = null;

// // Show Add Form
// if (isset($_POST["form_type"]) && $_POST["form_type"] === "show_add_form") {
//   $showAddForm = true;
//}

// Add Class
if (isset($_POST["form_type"]) && $_POST["form_type"] === "add") {
  $title = trim($_POST["title"]);
  $instructor = trim($_POST["instructor"]);
  $date = $_POST["date"];
  $status = $_POST["status"];

  if ($title && $instructor && $date && $status) {
    $stmt = mysqli_prepare($mysqli, "INSERT INTO classes (title, instructor, date, status) VALUES (?, ?, ?, ?)");
        if ($stmt) {
    echo "Insert successful!";
    } else {
    echo "Insert failed: " . mysqli_error($mysqli);
    }
    mysqli_stmt_bind_param($stmt, "ssss", $title, $instructor, $date, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: session.php");
    exit();
  }
}

// Edit Trigger
if (isset($_POST["edit_id"]) && !isset($_POST["form_type"])) {
  $edit_id = intval($_POST["edit_id"]);
  $stmt = mysqli_prepare($mysqli, "SELECT * FROM classes WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $edit_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $editClass = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
}

// Save Edited Class
if (isset($_POST["form_type"]) && $_POST["form_type"] === "edit") {
  $id = intval($_POST["edit_id"]);
  $title = trim($_POST["edit_title"]);
  $instructor = trim($_POST["edit_instructor"]);
  $date = $_POST["edit_date"];
  $status = $_POST["edit_status"];

  if ($title && $instructor && $date && $status) {
    $stmt = mysqli_prepare($mysqli, "UPDATE classes SET title = ?, instructor = ?, date = ?, status = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $instructor, $date, $status, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: class.php");
    exit();
  }
}

// Delete Class
if (isset($_POST["delete_id"])) {
  $id = intval($_POST["delete_id"]);
  $stmt = mysqli_prepare($mysqli, "DELETE FROM classes WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: class.php");
  exit();
}

// Search Classes
if (isset($_POST["form_type"]) && $_POST["form_type"] === "search") {
  $term = "%" . strtolower(trim($_POST["search_term"])) . "%";
  $status = trim($_POST["status_filter"]);

  $query = "SELECT * FROM classes WHERE (LOWER(title) LIKE ? OR LOWER(instructor) LIKE ?)";
  $types = "ss";
  $params = [$term, $term];

  if ($status) {
    $query .= " AND status = ?";
    $types .= "s";
    $params[] = $status;
  }

  $stmt = mysqli_prepare($mysqli, $query);
  mysqli_stmt_bind_param($stmt, $types, ...$params);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $classes = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
}

// Load All Classes if Not Searching
if (empty($classes)) {
  $result = mysqli_query($mysqli, "SELECT * FROM classes ORDER BY id ASC");
  $classes = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>