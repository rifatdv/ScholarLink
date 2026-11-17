<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

$applications = [];
$showManualForm = false;

// Show manual form toggle
if (isset($_POST["form_type"]) && $_POST["form_type"] === "show_manual_form") {
  $showManualForm = true;
}

// Add manual application
if (isset($_POST["form_type"]) && $_POST["form_type"] === "add_application") {
  $date = date("Y-m-d");
  $name = trim($_POST["app_name"]);
  $email = trim($_POST["app_email"]);
  $subject = isset($_POST["app_subject"]) ? implode(", ", $_POST["app_subject"]) : "";
  $status = "Pending";

  if ($name && $email && $subject) {
    $stmt = mysqli_prepare($mysqli, "INSERT INTO applications (date, name, email, subject, status) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $date, $name, $email, $subject, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
}

// Search applications
if (isset($_POST["form_type"]) && $_POST["form_type"] === "search_application") {
  $term = "%" . strtolower(trim($_POST["search_term"])) . "%";
  $stmt = mysqli_prepare($mysqli, "SELECT * FROM applications WHERE LOWER(name) LIKE ? OR LOWER(email) LIKE ? OR LOWER(subject) LIKE ?");
  mysqli_stmt_bind_param($stmt, "sss", $term, $term, $term);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $applications = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
}

// Approve or reject individual application
if (isset($_POST["action"], $_POST["app_id"])) {
  $id = intval($_POST["app_id"]);

  if ($_POST["action"] === "approve") {
    // Fetch application data
    $stmt = mysqli_prepare($mysqli, "SELECT date, name, email, subject FROM applications WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $appData = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($appData) {
      $date = $appData['date'];
      $name = $appData['name'];
      $email = $appData['email'];
      $subject = $appData['subject'];
      $status = "Active";

      // Insert into tutors table
      $stmt = mysqli_prepare($mysqli, "INSERT INTO tutors (date, name, email, subject, status) VALUES (?, ?, ?, ?, ?)");
      mysqli_stmt_bind_param($stmt, "sssss", $date, $name, $email, $subject, $status);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      // Update application status
      $stmt = mysqli_prepare($mysqli, "UPDATE applications SET status = 'Approved' WHERE id = ?");
      mysqli_stmt_bind_param($stmt, "i", $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
    }
  } else {
    // Reject application
    $stmt = mysqli_prepare($mysqli, "UPDATE applications SET status = 'Rejected' WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
}

// Bulk approve/reject
if (isset($_POST["bulk_action"], $_POST["selected_ids"])) {
  $status = $_POST["bulk_action"] === "approve_selected" ? "Approved" : "Rejected";
  foreach ($_POST["selected_ids"] as $id) {
    $id = intval($id);
    $stmt = mysqli_prepare($mysqli, "UPDATE applications SET status = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
}

// Load all applications if not filtered
if (empty($applications)) {
  $result = mysqli_query($mysqli, "SELECT * FROM applications ORDER BY date DESC");
  $applications = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>