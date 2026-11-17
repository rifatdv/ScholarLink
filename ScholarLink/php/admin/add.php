<?php
$servername = "localhost";   
$username = "root";         
$password = "";              
$dbname = "scholarlink";     

$conn = mysqli_connect($servername, $username, $password, $dbname);

$stmt = $conn->_prepare($mysqli, "INSERT INTO admins (email, password) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
echo "✅ Admin added.";
?>