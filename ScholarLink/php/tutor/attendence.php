<?php
session_start();
// require 'db.php'; 

// if (!isset($_SESSION['tutor_id'])) {
//     header("Location: attendence.php");
//     exit;
// }

// $tutor_id = $_SESSION['tutor_id'];
// $stmt = $conn->prepare("
//     SELECT tutor_name, tutor_email, tutor_since, total_cv_view
//     FROM tutors
//     WHERE tutor_id = ?
// ");
// $stmt->bind_param("s", $tutor_id);
// $stmt->execute();
// $result = $stmt->get_result();

// if($result->num_rows > 0){
//     $row = $result->fetch_assoc();
//     $tutor_name     = $row['tutor_name'];
//     $tutor_email    = $row['tutor_email'];
//     $tutor_since    = $row['tutor_since'];
//     $total_cv_view  = $row['total_cv_view'];
// } else {
//     $tutor_name     = "Unknown";
//     $tutor_email    = "Unknown";
//     $tutor_since    = "-";
//     $total_cv_view  = 0;
// }
// $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarLink</title>
    <link rel="stylesheet" href="../../css/tutor/attendance.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="navdiv">
            <div class="platformname">
                <div class="main"><a href="#" class="logo"><span>Scholar</span>Link</a></div>
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
                    <img src="../image/logo.png" alt="iamgee" class="profileimg" />
                </div>
                <h3><?php echo htmlspecialchars($tutor_name); ?></h3>
                <p><?php echo htmlspecialchars($tutor_email); ?></p>
                <p><small>Tutor ID: <?php echo htmlspecialchars($tutor_id); ?> | Since <?php echo htmlspecialchars($tutor_since); ?></small></p>
                <p><small>Total CV View: <?php echo htmlspecialchars($total_cv_view); ?></small></p>
                <hr />
                <ul>
                    <li><a href="tutor.php">🏛️ Dashboard</a></li>
                    <li><a href="job.php">📋 Job Board</a></li>
                    <li><a href="profile.php">👤Profile</a></li>
                    <li><a href="students.php">🧑‍🎓Students</a></li>
                    <li><a href="attendence.php">📝Attendance</a></li>
                    <li><a href="resources.php">📚Resources</a></li>
                    <li><a href="status.php">🏷️Status</a></li>
                    <li><a href="confrim.php">✉️ Confirmation Letter</a></li>
                    <li><a href="payment.php">🪙 Payment</a></li>
                    <li><a href="certificate.php">📑Certificate</a></li>
                    <li><a href="refer.php">🗞️Refer & Earn</a></li>
                    <li><a href="setting.php">⚙️Settings</a></li>
                    <li><a href="commt.php">🔗Join Tutor Community</a></li>
                    <li><a href="howw.php">🔩How Its Work</a></li>
                </ul>
            </nav>
        </div>

        <div class="content-column">
            <div class="notice">
                <h3>📢 Notice Board</h3>
                <p>
                    Our "Tutor of the Month, August 2025" is
                    <b>Sanzana Rasul (Tutor ID: 307988)</b> and our "Guardian of the
                    Month, August 2025" is <b>Aliza Sultana Mitu (Job ID: 175943)</b>.
                    Heartiest congratulations to both of them; we're glad to work with
                    them.
                </p>
                <small><i>Sep 02, 2025</i></small>
            </div>

            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon applied">🧾</div>
                    <div class="stat-info">
                        <span class="stat-number">02</span>
                        <span class="stat-label">Offline students attendance</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon appointed">📌</div>
                    <div class="stat-info">
                        <span class="stat-number">1</span>
                        <span class="stat-label">Online student attendance</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon confirmed">✅</div>
                    <div class="stat-info">
                        <span class="stat-number">0</span>
                        <span class="stat-label">No attendance</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon cancelled">❌</div>
                    <div class="stat-info">
                        <span class="stat-number">1</span>
                        <span class="stat-label">Cancelled Class</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
      <div class="botdesign">
        <div class="use">
          <div class="use-head">
            <h4>Useful Links</h4>
          </div>
          <div class="use-body">
            <ul>
              <li class="use-li"><a href="">Terms & conditions</a></li>
              <li class="use-li"><a href="">Become Tutor</a></li>
              <li class="use-li"><a href="">Available Resources</a></li>
              <li class="use-li"><a href="">About us</a></li>
            </ul>
          </div>
        </div>

        <div class="social">
          <div class="social-head">
            <h4>ScholarLink social</h4>
          </div>
          <div class="social-body">
            <div class="sociolink">
              <img class="image" src="../image/facebook.png" alt="Facebook" /><a
                href=""
                >Facebook</a
              >
            </div>
            <div class="sociolink">
              <img
                class="image"
                src="../image/instagram.png"
                alt="Instagram"
              /><a href="">Instagram</a>
            </div>
            <div class="sociolink">
              <img class="image" src="../image/x.png" alt="X" /><a href="">X</a>
            </div>
          </div>
        </div>

        <div class="join">
          <div class="join-head">
            <h4>Join our community</h4>
          </div>
          <div class="join-body">
            <div class="joinlink">
              <a href=""
                ><img
                  class="joinimg"
                  src="../image/tutorcommunity.png"
                  alt="Join tutor community"
              /></a>
            </div>
            <div class="joinlink">
              <a href=""
                ><img
                  class="joinimg"
                  src="../image/guardiancommunity.png"
                  alt="Join guardian community"
              /></a>
            </div>
          </div>

          <div class="join-head">
            <h4>Download our app</h4>
          </div>
          <div class="join-body">
            <div class="joinlink">
              <a href=""
                ><img
                  class="joinimg"
                  src="../image/googleplay.jpg"
                  alt="Get it on Google Play Store"
              /></a>
            </div>
            <div class="joinlink">
              <a href=""
                ><img
                  class="joinimg"
                  src="../image/applestore.jpg"
                  alt="Get it on App Store"
              /></a>
            </div>
          </div>
        </div>

        <div class="join">
          <div class="join-head">
            <h4>Stay Connected</h4>
          </div>
          <div class="add-body">
            <h4>ScholarLink</h4>
          </div>
          <div class="add">
            <p>
              Headoffice: Kusholi Bhaban, 2nd Floor,<br />
              238/1 Begum Rokeya Sharani, Agargaon, <br />Dhaka-1207
            </p>
          </div>
        </div>
      </div>
      <div class="version">
        <p>Web App Version : 2.2.21</p>
      </div>
      <div class="copyright">
        <p>Copyright &copy; 2025 ScholarLink. All rights reseved.</p>
      </div>
</footer>

</body>
</html>
