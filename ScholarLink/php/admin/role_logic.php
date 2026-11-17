<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

$roles = [];
$showAddForm = false;
$editRole = null;

// Toggle Add Role Form
if (isset($_POST["form_type"]) && $_POST["form_type"] === "show_add_form") {
  $showAddForm = true;
}

// Add New Role
if (isset($_POST["form_type"]) && $_POST["form_type"] === "add") {
  $role_name = trim($_POST["role_name"]);
  $access_level = trim($_POST["access_level"]);
  $assigned_users = intval($_POST["assigned_users"]);

  if ($role_name && $access_level) {
    $stmt = mysqli_prepare($mysqli, "INSERT INTO roles (role_name, access_level, assigned_users) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $role_name, $access_level, $assigned_users);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: role.php");
    exit();
  }
}

// Show Edit Form
if (isset($_POST["edit_id"]) && !isset($_POST["form_type"])) {
  $edit_id = intval($_POST["edit_id"]);
  $stmt = mysqli_prepare($mysqli, "SELECT * FROM roles WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $edit_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $editRole = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
}

// Save Edited Role
if (isset($_POST["form_type"]) && $_POST["form_type"] === "edit") {
  $id = intval($_POST["edit_id"]);
  $role_name = trim($_POST["edit_role_name"]);
  $access_level = trim($_POST["edit_access_level"]);
  $assigned_users = intval($_POST["edit_assigned_users"]);

  if ($role_name && $access_level) {
    $stmt = mysqli_prepare($mysqli, "UPDATE roles SET role_name = ?, access_level = ?, assigned_users = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssii", $role_name, $access_level, $assigned_users, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: role.php");
    exit();
  }
}

// Delete Role
if (isset($_POST["delete_id"])) {
  $id = intval($_POST["delete_id"]);
  $stmt = mysqli_prepare($mysqli, "DELETE FROM roles WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: role.php");
  exit();
}

// Search Roles
if (isset($_POST["form_type"]) && $_POST["form_type"] === "search") {
  $term = "%" . strtolower(trim($_POST["search_term"])) . "%";
  $level = trim($_POST["access_filter"]);
  $query = "SELECT * FROM roles WHERE LOWER(role_name) LIKE ?";
  $params = [$term];
  $types = "s";

  if ($level) {
    $query .= " AND LOWER(access_level) = ?";
    $params[] = strtolower($level);
    $types .= "s";
  }

  $stmt = mysqli_prepare($mysqli, $query);
  mysqli_stmt_bind_param($stmt, $types, ...$params);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $roles = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
}

// Load All Roles if Not Searching
if (empty($roles)) {
  $result = mysqli_query($mysqli, "SELECT * FROM roles ORDER BY id ASC");
  $roles = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>