<?php
$mysqli = mysqli_connect("localhost", "root", "", "scholarlink");

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get classes for the next 14 days
$today = date('Y-m-d');
$endDate = date('Y-m-d', strtotime('+13 days'));

$stmt = mysqli_prepare($mysqli, "SELECT * FROM classes WHERE date BETWEEN ? AND ? ORDER BY date ASC");
mysqli_stmt_bind_param($stmt, "ss", $today, $endDate);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$allClasses = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

// Organize classes by normalized date
$calendarDays = [];
for ($i = 0; $i < 14; $i++) {
  $date = date('Y-m-d', strtotime("+$i days"));
  $calendarDays[$date] = ['date' => $date, 'classes' => []];
}

foreach ($allClasses as $class) {
  $classDate = date('Y-m-d', strtotime($class['date']));
  if (isset($calendarDays[$classDate])) {
    $calendarDays[$classDate]['classes'][] = $class;
  }
}

$calendarDays = array_values($calendarDays); // reset keys for foreach
?>