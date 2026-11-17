<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

$transactions = [];
$editTxn = null;

// Add new transaction
if (isset($_POST["form_type"]) && $_POST["form_type"] === "add_transaction") {
  $date = date("Y-m-d");
  $user = trim($_POST["txn_user"]);
  $amount = floatval($_POST["txn_amount"]);
  $method = trim($_POST["txn_method"]);
  $status = trim($_POST["txn_status"]);

  if ($user && $amount > 0 && $method && $status) {
    $stmt = mysqli_prepare($mysqli, "INSERT INTO transactions (date, user, amount, method, status) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssdss", $date, $user, $amount, $method, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
  }
}

// Search transactions
if (isset($_POST["form_type"]) && $_POST["form_type"] === "search_transaction") {
  $term = "%" . strtolower(trim($_POST["search_term"])) . "%";
  $stmt = mysqli_prepare($mysqli, "SELECT * FROM transactions WHERE LOWER(user) LIKE ? OR LOWER(status) LIKE ? OR LOWER(method) LIKE ?");
  mysqli_stmt_bind_param($stmt, "sss", $term, $term, $term);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_stmt_close($stmt);
}

// Update status
if (isset($_POST["status"], $_POST["transaction_id"])) {
  $status = $_POST["status"];
  $id = intval($_POST["transaction_id"]);

  $stmt = mysqli_prepare($mysqli, "UPDATE transactions SET status = ? WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "si", $status, $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

// Load edit form
if (isset($_POST["edit_id"])) {
  $id = intval($_POST["edit_id"]);
  $stmt = mysqli_prepare($mysqli, "SELECT * FROM transactions WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $editTxn = mysqli_fetch_assoc($result);
  mysqli_stmt_close($stmt);
}

// Save edited transaction
if (isset($_POST["form_type"]) && $_POST["form_type"] === "edit_transaction") {
  $id = intval($_POST["txn_id"]);
  $user = trim($_POST["txn_user"]);
  $amount = floatval($_POST["txn_amount"]);
  $method = trim($_POST["txn_method"]);
  $status = trim($_POST["txn_status"]);

  $stmt = mysqli_prepare($mysqli, "UPDATE transactions SET user = ?, amount = ?, method = ?, status = ? WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "sdssi", $user, $amount, $method, $status, $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

// Delete transaction
if (isset($_POST["delete_id"])) {
  $id = intval($_POST["delete_id"]);
  $stmt = mysqli_prepare($mysqli, "DELETE FROM transactions WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

// Load all transactions if not filtered
if (empty($transactions)) {
  $result = mysqli_query($mysqli, "SELECT * FROM transactions ORDER BY date DESC");
  $transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>