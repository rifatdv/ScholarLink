<?php
// Connect to MySQL database
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

$tutors = [];
$editTutor = null;

// Handle form actions
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Add tutor
  if (isset($_POST["form_type"]) && $_POST["form_type"] === "add") {
    $date = date("Y-m-d");
    $name = trim($_POST["add_name"]);
    $email = trim($_POST["add_email"]);
    $subject = trim($_POST["add_subject"]);

    if ($name && $email && $subject) {
      $stmt = mysqli_prepare($mysqli, "INSERT INTO tutors (date, name, email, subject, status) VALUES (?, ?, ?, ?, 'Active')");
      mysqli_stmt_bind_param($stmt, "ssss", $date, $name, $email, $subject);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      // ✅ Prevent duplicate insertion on reload
      header("Location: tutor.php");
      exit();
    }
  }

  // Search
  if (isset($_POST["form_type"]) && $_POST["form_type"] === "search") {
    $searchTerm = "%" . strtolower(trim($_POST["search_term"])) . "%";
    $stmt = mysqli_prepare($mysqli, "SELECT * FROM tutors WHERE LOWER(name) LIKE ? OR LOWER(email) LIKE ?");
    mysqli_stmt_bind_param($stmt, "ss", $searchTerm, $searchTerm);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $tutors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
  }

  // Update status
  if (isset($_POST["update_id"], $_POST["new_status"])) {
    $id = intval($_POST["update_id"]);
    $status = $_POST["new_status"];
    $stmt = mysqli_prepare($mysqli, "UPDATE tutors SET status = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  // Load edit form
  if (isset($_POST["edited_id"])) {
    $id = intval($_POST["edited_id"]);
    $stmt = mysqli_prepare($mysqli, "SELECT * FROM tutors WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $editTutor = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
  }

  // Save edit
  if (isset($_POST["form_type"]) && $_POST["form_type"] === "edit_save") {
    $id = intval($_POST["edit_id"]);
    $name = trim($_POST["edit_name"]);
    $email = trim($_POST["edit_email"]);
    $subject = trim($_POST["edit_subject"]);

    $stmt = mysqli_prepare($mysqli, "UPDATE tutors SET name = ?, email = ?, subject = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $subject, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }

  // Delete
  if (isset($_POST["delete_id"])) {
    $id = intval($_POST["delete_id"]);
    $stmt = mysqli_prepare($mysqli, "DELETE FROM tutors WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
}

// Load all tutors if not searching
if (empty($tutors)) {
  $result = mysqli_query($mysqli, "SELECT * FROM tutors ORDER BY id DESC");
  $tutors = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>