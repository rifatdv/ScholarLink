<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// Handle search
$searchTerm = $_POST['search_term'] ?? '';
$statusFilter = $_POST['status_filter'] ?? '';

$query = "SELECT * FROM payouts WHERE 1=1";
$params = [];
$types = "";

if (!empty($searchTerm)) {
  $query .= " AND (tutor_name LIKE ? OR email LIKE ?)";
  $params[] = "%$searchTerm%";
  $params[] = "%$searchTerm%";
  $types .= "ss";
}

if (!empty($statusFilter)) {
  $query .= " AND status = ?";
  $params[] = $statusFilter;
  $types .= "s";
}

$query .= " ORDER BY date DESC";

$stmt = mysqli_prepare($mysqli, $query);
if (!empty($params)) {
  mysqli_stmt_bind_param($stmt, $types, ...$params);
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$payouts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

// Handle status update
if ($_POST['form_type'] === 'mark_paid' && isset($_POST['payout_id'])) {
  $id = $_POST['payout_id'];
  $update = mysqli_prepare($mysqli, "UPDATE payouts SET status = 'Paid' WHERE id = ?");
  mysqli_stmt_bind_param($update, "i", $id);
  mysqli_stmt_execute($update);
  mysqli_stmt_close($update);
  header("Location: payout.php");
  exit;
}

// Handle add payouts
if ($_POST['form_type'] === 'add_payout') {
  $name = $_POST['tutor_name'];
  $email = $_POST['email'];
  $amount = $_POST['amount'];
  $status = $_POST['status'];

  $stmt = mysqli_prepare($mysqli, "INSERT INTO payouts (tutor_name, email, amount, status) VALUES (?, ?, ?, ?)");
  mysqli_stmt_bind_param($stmt, "ssds", $name, $email, $amount, $status);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: payout.php");
  exit;
}

// Handle delete
if (isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];
  $delete = mysqli_prepare($mysqli, "DELETE FROM payouts WHERE id = ?");
  mysqli_stmt_bind_param($delete, "i", $id);
  mysqli_stmt_execute($delete);
  mysqli_stmt_close($delete);
  header("Location: payout.php");
  exit;
}
?>