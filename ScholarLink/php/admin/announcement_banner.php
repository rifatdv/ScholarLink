<?php
session_start();

// 🔗 Database Connection
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// 🧠 Role Detection
$role = $_SESSION['role'] ?? 'Guest';
$today = date('Y-m-d');

// 📣 Fetch Active Announcements
$result = mysqli_query($mysqli, "
  SELECT * FROM announcements
  WHERE start_date <= '$today'
    AND (end_date IS NULL OR end_date >= '$today')
    AND (visible_to = 'All' OR visible_to = '$role')
  ORDER BY posted_on DESC
  LIMIT 3
");

$active_announcements = mysqli_fetch_all($result, MYSQLI_ASSOC);

// 🖼️ Display Banner
foreach ($active_announcements as $a) {
  echo '<div class="announcement-banner">';
  echo '<strong>' . htmlspecialchars($a['title']) . '</strong>: ' . htmlspecialchars($a['message']);
  echo '</div>';
}
?>