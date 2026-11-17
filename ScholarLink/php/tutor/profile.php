<?php
session_start();

//require_once('config/db_connect.php');


// if (!isset($_SESSION['tutor_id'])) {
//     header("Location: profile.php");
//     exit;
// }

// $tutor_id = $_SESSION['tutor_id'];


// $stmt = $conn->prepare("SELECT tutor_name, tutor_email, tutor_since, total_cv_view, phone, gender, facebook, city, location, address, emergency_name, emergency_relation, emergency_contact, emergency_address FROM tutors WHERE tutor_id = ?");
// $stmt->bind_param("i", $tutor_id);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result && $result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $name = $row['tutor_name'];
//     $email = $row['tutor_email'];
//     $since = date('M d, Y', strtotime($row['tutor_since']));
//     $total_cv = $row['total_cv_view'];
//     $phone = $row['phone'];
//     $gender = $row['gender'];
//     $facebook = $row['facebook'];
//     $city = $row['city'];
//     $location = $row['location'];
//     $address = $row['address'];
//     $em_name = $row['emergency_name'];
//     $em_relation = $row['emergency_relation'];
//     $em_contact = $row['emergency_contact'];
//     $em_address = $row['emergency_address'];
// } else {
    
//     $name = "Unknown Tutor";
//     $email = "N/A";
//     $since = "N/A";
//     $total_cv = 0;
//     $phone = $gender = $facebook = $city = $location = $address = $em_name = $em_relation = $em_contact = $em_address = "N/A";
// }

// $stmt->close();
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ScholarLink - Profile</title>
<link rel="stylesheet" href="../../css/tutor/profile.css" />
</head>
<body>
<header>
  <nav class="navbar">
    <div class="navdiv">
      <div class="platformname">
        <div class="main">
          <a href="#" class="logo"><span>Scholar</span>Link</a>
        </div>
        <h5>A Tutoring platform that releases potential</h5>
      </div>
    </div>
    <div class="show">
      <ul>
        <li class="info">Be with us</li>
      </ul>
    </div>
  </nav>
</header>

<section>
<div class="main-content-area">
  <div class="sidebardash">
    <nav>
      <div>
        <img src="image/logo.png" alt="image" class="profileimg" />
      </div>
      <h3><?= $_SESSION['name']; ?></h3>
      <p><?= $_SESSION['email']; ?></p>
      <p><small>Tutor ID: <?= $_SESSION['tutorid']; ?> </small></p>
      <hr />
      <ul>
        <li><a href="tutor.php">🏛️ Dashboard</a></li>
        <li><a href="job.php">📋 Job Board</a></li>
        <li><a href="profile.php">👤 Profile</a></li>
        <li><a href="students.php">🧑‍🎓 Students</a></li>
        <li><a href="attendence.php">📝 Attendance</a></li>
        <li><a href="resources.php">📚 Resources</a></li>
        <li><a href="status.php">🏷️ Status</a></li>
        <li><a href="confrim.php">✉️ Confirmation Letter</a></li>
        <li><a href="payment.php">🪙 Payment</a></li>
        <li><a href="certificate.php">📑 Certificate</a></li>
        <li><a href="refer.php">🗞️ Refer & Earn</a></li>
        <li><a href="setting.php">⚙️ Settings</a></li>
        <li><a href="commt.php">🔗 Join Tutor Community</a></li>
        <li><a href="howw.php">🔩 How It Works</a></li>
      </ul>
    </nav>
  </div>

  <div class="profile-container">
    <div class="profile-card">
      <img src="image/logo.png" alt="Profile Photo" class="avatar" />
      <h3><?$_SESSION($name); ?></h3>
      <p>Guardian/Student ID: <?$_SESSION($tutor_id); ?></p>
      <div class="submit">
        <a href="editprofile.php">Edit Information</a>
      </div>

      <div class="info">
        <div class="line">
          <img src="image/email1.png" alt="" />
          <span>Email:</span> <? $_SESSION($email); ?>
        </div>
        <div class="line">
          <img src="image/call.png" alt="" />
          <span>Phone:</span> <?$_SESSION($phone); ?>
        </div>
        <div class="line">
          <img src="image/address.png" alt="" />
          <span>Address:</span> <?$_SESSION($location . ', ' . $city); ?>
        </div>
      </div>
    </div>

    <div class="info-card">
      <h3><img src="image/personalinfo.jpg" alt="" /> Personal Information</h3>
      <div class="row">
        <div class="label">
          <p>Name</p>
          <p>Contact Number</p>
          <p>Email</p>
          <p>Gender</p>
          <p>Facebook Link</p>
          <p>City</p>
          <p>Location</p>
          <p>Address</p>
        </div>
        <div class="value">
          <p>: <?$_SESSION($name); ?></p>
          <p>: <?$_SESSION($phone); ?></p>
          <p>: <?$_SESSION($email); ?></p>
          <p>: <?$_SESSION($gender); ?></p>
          <p>: <?$_SESSION($facebook); ?></p>
          <p>: <?$_SESSION($city); ?></p>
          <p>: <?$_SESSION($location); ?></p>
          <p>: <?$_SESSION($address); ?></p>
        </div>
      </div>

      <h3><img src="image/emergency.png" alt="" /> Emergency Contact</h3>
      <div class="row">
        <div class="label">
          <p>Name</p>
          <p>Relation</p>
          <p>Contact Number</p>
          <p>Address</p>
        </div>
        <div class="value">
          <p>: <?$_SESSION($em_name); ?></p>
          <p>: <?$_SESSION($em_relation); ?></p>
          <p>: <?$_SESSION($em_contact); ?></p>
          <p>: <?$_SESSION($em_address); ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</body>
</html>
